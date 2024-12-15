@props([
    'title',
    'description',
    'button_text',
    'success_message',
    'placeholder_text'
])

<div class="bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ $title }}
            </h2>
            <p class="text-lg text-gray-600 mb-8">
                {{ $description }}
            </p>
        </div>

        <div 
            x-data="{ 
                email: '', 
                submitted: false,
                loading: false,
                error: null,
                submit() {
                    if (!this.email) {
                        this.error = 'Please enter your email address';
                        return;
                    }
                    this.loading = true;
                    this.error = null;
                    
                    // Here you would typically make an API call to your backend
                    // For now, we'll simulate a successful submission
                    setTimeout(() => {
                        this.loading = false;
                        this.submitted = true;
                        this.email = '';
                    }, 1000);
                }
            }"
            class="max-w-lg mx-auto"
        >
            <form 
                x-show="!submitted" 
                @submit.prevent="submit"
                class="flex flex-col sm:flex-row gap-4"
            >
                <div class="flex-grow">
                    <label for="email" class="sr-only">Email address</label>
                    <input
                        type="email"
                        x-model="email"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500"
                        :class="{ 'border-red-300': error }"
                        placeholder="{{ $placeholder_text }}"
                    >
                    <div 
                        x-show="error" 
                        x-text="error" 
                        class="mt-2 text-sm text-red-600"
                    ></div>
                </div>
                <button
                    type="submit"
                    :disabled="loading"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <span x-show="!loading">{{ $button_text }}</span>
                    <svg 
                        x-show="loading"
                        class="animate-spin h-5 w-5" 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24"
                    >
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </button>
            </form>

            <div 
                x-show="submitted"
                x-transition
                class="text-center p-6 bg-green-50 rounded-lg"
            >
                <svg 
                    class="mx-auto h-12 w-12 text-green-400" 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="mt-4 text-lg font-medium text-green-800">
                    {{ $success_message }}
                </p>
            </div>
        </div>
    </div>
</div>
