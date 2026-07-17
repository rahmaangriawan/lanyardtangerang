<?php

namespace App\Observers;

use App\Models\CityPage;
class CityPageObserver
{
    private function clearCache(): void
    {
        // No city-page runtime cache currently depends on this model.
    }

    /**
     * Handle the CityPage "created" event.
     */
    public function created(CityPage $cityPage): void
    {
        $this->clearCache();
    }

    /**
     * Handle the CityPage "updated" event.
     */
    public function updated(CityPage $cityPage): void
    {
        $this->clearCache();
    }

    /**
     * Handle the CityPage "deleted" event.
     */
    public function deleted(CityPage $cityPage): void
    {
        $this->clearCache();
    }

    /**
     * Handle the CityPage "restored" event.
     */
    public function restored(CityPage $cityPage): void
    {
        $this->clearCache();
    }

    /**
     * Handle the CityPage "force deleted" event.
     */
    public function forceDeleted(CityPage $cityPage): void
    {
        $this->clearCache();
    }
}
