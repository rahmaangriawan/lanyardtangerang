@extends('layouts.meridian')

@section('title', 'Laporan 404')

@section('content')
  <header class="page__header">
    <div class="page__headline">
      <h1 class="page__title">Laporan URL 404</h1>
      <p class="page__description">URL halaman publik yang tidak ditemukan. Data disimpan maksimal 90 hari dan dibatasi satu catatan per URL per menit.</p>
    </div>
  </header>

  <div class="page__body">
    <section class="page__section">
      <div class="card">
        <div class="card__header flex-wrap gap-3">
          <form class="flex flex-wrap items-end gap-3" method="get" action="{{ route('cms.not-found-report') }}">
            <div>
              <label class="form-label" for="days">Periode</label>
              <select id="days" class="input" name="days">
                @foreach([7 => '7 hari', 30 => '30 hari', 90 => '90 hari'] as $value => $label)
                  <option value="{{ $value }}" @selected($days === $value)>{{ $label }}</option>
                @endforeach
              </select>
            </div>
            <div>
              <label class="form-label" for="q">Cari URL</label>
              <input id="q" class="input" type="search" name="q" value="{{ $search }}" placeholder="Contoh: /blog/artikel-lama" />
            </div>
            <button class="button button--primary" type="submit">Terapkan</button>
          </form>
        </div>

        <div class="table-responsive">
          <table class="table table--hover table--align-middle">
            <thead class="table__head--alt">
              <tr>
                <th scope="col">URL</th>
                <th scope="col" class="text-end">Kejadian</th>
                <th scope="col">Pertama terlihat</th>
                <th scope="col">Terakhir terlihat</th>
                <th scope="col" class="text-end"><span class="sr-only">Aksi</span></th>
              </tr>
            </thead>
            <tbody>
              @forelse($items as $item)
                <tr>
                  <td><code class="text-sm font-semibold">{{ $item->path }}</code></td>
                  <td class="text-end font-bold">{{ number_format($item->occurrences, 0, ',', '.') }}</td>
                  <td>{{ \Illuminate\Support\Carbon::parse($item->firstSeenAt)->translatedFormat('d M Y H:i') }}</td>
                  <td>{{ \Illuminate\Support\Carbon::parse($item->lastSeenAt)->translatedFormat('d M Y H:i') }}</td>
                  <td class="text-end">
                    <a class="button button--sm button--outline button--neutral" href="{{ route('cms.create', 'redirects') }}?sourcePath={{ urlencode($item->path) }}">Buat Redirect</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="py-10 text-center text-muted-foreground">Belum ada URL 404 yang tercatat pada periode ini.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="card__footer">
          <div class="ms-auto">{{ $items->links() }}</div>
        </div>
      </div>
    </section>
  </div>
@endsection
