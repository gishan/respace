@props([
    'type',
    'faqs'
])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="space-y-4">
        @foreach ($faqs as $faq)
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button
                    @click="open = !open"
                    class="flex justify-between items-center w-full py-4 text-left"
                >
                    <span class="text-lg font-medium text-gray-900">
                        {{ $faq['question'] }}
                    </span>
                    <span class="ml-6 flex-shrink-0">
                        <svg
                            :class="{'rotate-180': open}"
                            class="h-6 w-6 transform transition-transform duration-200"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </span>
                </button>
                <div
                    x-show="open"
                    x-transition:enter="transition-opacity ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="pb-4 prose max-w-none"
                >
                    {!! $faq['answer'] !!}
                </div>
            </div>
        @endforeach
    </div>
</div>
