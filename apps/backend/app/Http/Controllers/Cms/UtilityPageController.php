<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Services\GoogleAnalyticsService;
use App\Services\GoogleSearchConsoleService;
use App\Support\SecureSettings;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Throwable;

class UtilityPageController extends Controller
{
    public function analytics(GoogleAnalyticsService $analytics, GoogleSearchConsoleService $searchConsole): View
    {
        $settings = SecureSettings::getMany([
            'google_analytics_property_id',
            'google_search_console_site_url',
            'google_service_account_json',
        ]);
        $propertyId = trim($settings['google_analytics_property_id'] ?? '');
        $siteUrl = trim($settings['google_search_console_site_url'] ?? '');
        $hasCredential = trim($settings['google_service_account_json'] ?? '') !== '';
        $cards = [];
        $integrationErrors = [];

        $cards[] = $this->statusCard('GA4 Property ID', $propertyId ?: 'Belum diset', $propertyId !== '', 'chart');
        $cards[] = $this->statusCard('Search Console URL', $siteUrl ?: 'Belum diset', $siteUrl !== '', 'search');
        $cards[] = $this->statusCard('Service Account', $hasCredential ? 'Tersimpan' : 'Belum diset', $hasCredential, 'key');

        if ($propertyId !== '' && $hasCredential) {
            try {
                $ga = Cache::remember('cms.analytics.ga4.'.sha1($propertyId), now()->addMinutes(10), fn () => $analytics->fetch());
                $cards[] = $this->metricCard('Pengguna Aktif', number_format($ga['totals']['activeUsers'] ?? 0, 0, ',', '.'), '30 hari terakhir', 'chart');
                $cards[] = $this->metricCard('Sesi', number_format($ga['totals']['sessions'] ?? 0, 0, ',', '.'), 'Data GA4 tersinkron', 'chart');
                $cards[] = $this->metricCard('Page Views', number_format($ga['totals']['pageViews'] ?? 0, 0, ',', '.'), 'Data GA4 tersinkron', 'chart');
            } catch (Throwable $exception) {
                report($exception);
                $integrationErrors[] = 'GA4: '.$exception->getMessage();
            }
        }

        if ($siteUrl !== '' && $hasCredential) {
            try {
                $gsc = Cache::remember('cms.analytics.gsc.'.sha1($siteUrl), now()->addMinutes(10), fn () => $searchConsole->fetch());
                $cards[] = $this->metricCard('Klik Organik', number_format($gsc['totals']['clicks'] ?? 0, 0, ',', '.'), '30 hari terakhir', 'search');
                $cards[] = $this->metricCard('Impresi', number_format($gsc['totals']['impressions'] ?? 0, 0, ',', '.'), 'Data Search Console tersinkron', 'search');
                $cards[] = $this->metricCard('Posisi Rata-rata', number_format($gsc['totals']['position'] ?? 0, 1, ',', '.'), 'Data Search Console tersinkron', 'search');
            } catch (Throwable $exception) {
                report($exception);
                $integrationErrors[] = 'Search Console: '.$exception->getMessage();
            }
        }

        return view('cms.utility', [
            'title' => 'Analitik',
            'eyebrow' => 'Insights',
            'description' => 'Ringkasan GA4 dan Search Console 30 hari terakhir, dibaca langsung dari integrasi Google di Settings.',
            'cards' => $cards,
            'integrationErrors' => $integrationErrors,
        ]);
    }

    private function statusCard(string $label, string $value, bool $configured, string $icon): array
    {
        return [
            'label' => $label,
            'value' => $value,
            'description' => $configured ? 'Konfigurasi tersimpan dan siap digunakan.' : 'Lengkapi nilainya di CMS Settings.',
            'status' => $configured ? 'Aktif' : 'Perlu setup',
            'icon' => $icon,
            'tone' => $configured ? 'success' : 'warning',
        ];
    }

    private function metricCard(string $label, string $value, string $description, string $icon): array
    {
        return [
            'label' => $label,
            'value' => $value,
            'description' => $description,
            'status' => 'Sinkron',
            'icon' => $icon,
            'tone' => 'success',
        ];
    }

    public function profile(): View
    {
        return view('cms.profile', [
            'user' => auth()->user(),
        ]);
    }
}
