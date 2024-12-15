@props(['page'])
@vite('resources/css/app.css')
<x-filament-fabricator::layouts.base :title="$page->title">
    @include('components.filament-fabricator.layouts.partials.navbar')
    
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />

    @include('components.filament-fabricator.layouts.partials.footer')
</x-filament-fabricator::layouts.base>