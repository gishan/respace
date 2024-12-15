@props([
    'before_title',
    'before_content',
    'before_image',
    'before_highlight',
    'after_title',
    'after_content',
    'after_image',
    'after_highlight'
])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid md:grid-cols-2 gap-8 lg:gap-16">
        {{-- Before Section --}}
        <div class="space-y-6">
            <div class="relative">
                <img 
                    src="{{ Storage::url($before_image) }}" 
                    alt="{{ $before_title }}"
                    class="w-full h-64 object-cover rounded-lg shadow-lg"
                >
                @if($before_highlight)
                    <div class="absolute top-4 left-4 bg-yellow-500 text-black px-4 py-2 rounded-full text-sm font-medium">
                        {{ $before_highlight }}
                    </div>
                @endif
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $before_title }}</h3>
                <div class="prose max-w-none">
                    {!! $before_content !!}
                </div>
            </div>
        </div>

        {{-- After Section --}}
        <div class="space-y-6">
            <div class="relative">
                <img 
                    src="{{ Storage::url($after_image) }}" 
                    alt="{{ $after_title }}"
                    class="w-full h-64 object-cover rounded-lg shadow-lg"
                >
                @if($after_highlight)
                    <div class="absolute top-4 left-4 bg-yellow-500 text-black px-4 py-2 rounded-full text-sm font-medium">
                        {{ $after_highlight }}
                    </div>
                @endif
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $after_title }}</h3>
                <div class="prose max-w-none">
                    {!! $after_content !!}
                </div>
            </div>
        </div>
    </div>
</div>
