@props([
    'section_title',
    'section_description',
    'posts',
    'view_all_text',
    'view_all_link'
])

<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $section_title }}</h2>
            <p class="text-lg text-gray-600">{{ $section_description }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($posts as $post)
                <article class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                    {{-- Image --}}
                    <div class="relative h-48 w-full overflow-hidden">
                        <div 
                            class="absolute inset-0 bg-gray-200 bg-cover bg-center"
                            style="background-image: url('{{ Storage::url($post['image']) }}')"
                        ></div>
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-yellow-500 text-black text-sm font-medium rounded-full">
                                {{ $post['category'] }}
                            </span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <span>{{ \Carbon\Carbon::parse($post['date'])->format('F j, Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $post['read_time'] }}</span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            {{ $post['title'] }}
                        </h3>

                        <div class="text-gray-600 mb-4 line-clamp-3">
                            {!! $post['excerpt'] !!}
                        </div>

                        {{-- Author --}}
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-600 font-medium">
                                        @php
                                            $initials = collect(explode(' ', $post['author']))
                                                ->map(fn($part) => substr($part, 0, 1))
                                                ->join('');
                                        @endphp
                                        {{ $initials }}
                                    </span>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ $post['author'] }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Read More Link --}}
                    <div class="px-6 pb-6">
                        <a 
                            href="{{ $post['link'] }}" 
                            class="text-yellow-500 hover:text-yellow-600 font-medium inline-flex items-center transition-colors"
                        >
                            Read More
                            <svg 
                                class="w-4 h-4 ml-2" 
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24"
                            >
                                <path 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    stroke-width="2" 
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- View All Posts Button --}}
        <div class="text-center mt-12">
            <a 
                href="{{ $view_all_link }}" 
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 transition-colors"
            >
                {{ $view_all_text }}
                <svg 
                    class="ml-2 -mr-1 w-5 h-5" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24"
                >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        stroke-width="2" 
                        d="M17 8l4 4m0 0l-4 4m4-4H3"
                    />
                </svg>
            </a>
        </div>
    </div>
</div>

<style>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
