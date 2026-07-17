@extends('layouts.public')

@php
    $homeSeoSettings = \Illuminate\Support\Facades\Cache::store(config('cache.public_store', 'file'))->remember('home_seo_settings', 3600, function () {
        return \App\Models\Setting::whereIn('key', ['seo_meta_title', 'seo_meta_description'])->pluck('value', 'key')->toArray();
    });
    $homeTitle = $homeSeoSettings['seo_meta_title'] ?? 'Lanyard Tangerang | Cetak Lanyard Custom Cepat & Berkualitas';
    $homeDesc = $homeSeoSettings['seo_meta_description'] ?? 'Cetak lanyard custom premium di Tangerang dengan pilihan bahan berkualitas, desain profesional, dan layanan pemesanan mudah. Bebas ongkir Tangerang Raya.';
@endphp
@section('title', $homeTitle)
@section('meta_description', $homeDesc)
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/')
@section('seo_og_image', '/uploads/lanyardtangerang-logo.webp')

@push('schema')
@include('components.schema.home')
@endpush

@section('content')
    @include('components.hero')
    @include('components.client-logos')
    @include('components.service-highlights')
    @include('components.product-showcase')
    @include('components.testimonials')
    @include('components.service-locations')
    @include('components.faq')
    @include('components.blog-preview')
    @include('components.cta')
    @include('components.footer')
@endsection
