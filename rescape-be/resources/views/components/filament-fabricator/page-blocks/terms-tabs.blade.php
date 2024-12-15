@props([
    'sections'
])

<div x-data="{ activeTab: 'terms' }" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    {{-- Tabs Navigation --}}
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
            @foreach ($sections as $section)
                <button
                    @click="activeTab = '{{ $section['id'] }}'"
                    :class="{ 'border-yellow-500 text-yellow-600': activeTab === '{{ $section['id'] }}', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== '{{ $section['id'] }}' }"
                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors"
                >
                    {{ $section['title'] }}
                </button>
            @endforeach
        </nav>
    </div>

    {{-- Tab Content --}}
    <div class="mt-8">
        @foreach ($sections as $section)
            <div
                x-show="activeTab === '{{ $section['id'] }}'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-x-2"
                x-transition:enter-end="opacity-100 transform translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-x-0"
                x-transition:leave-end="opacity-0 transform translate-x-2"
                class="prose max-w-none"
            >
                {!! $section['content'] !!}
            </div>
        @endforeach
    </div>
</div>
