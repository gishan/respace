<header class="fixed w-full z-50">
    <nav class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-yellow-500">
                    Rescape
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-white hover:text-yellow-500 transition-colors">Home</a>
                <a href="#" class="text-white hover:text-yellow-500 transition-colors">About</a>
                <a href="#" class="text-white hover:text-yellow-500 transition-colors">Services</a>
                <a href="#" class="text-white hover:text-yellow-500 transition-colors">Contact</a>
            </div>
            <div class="md:hidden">
                <button class="text-white focus:outline-none" @click="mobileMenuOpen = !mobileMenuOpen">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div class="md:hidden" x-show="mobileMenuOpen" x-transition>
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 text-white hover:text-yellow-500 transition-colors">Home</a>
                <a href="#" class="block px-3 py-2 text-white hover:text-yellow-500 transition-colors">About</a>
                <a href="#" class="block px-3 py-2 text-white hover:text-yellow-500 transition-colors">Services</a>
                <a href="#" class="block px-3 py-2 text-white hover:text-yellow-500 transition-colors">Contact</a>
            </div>
        </div>
    </nav>
</header>
