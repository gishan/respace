<!-- layouts/default.vue -->
<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Navbar -->
    <header class="fixed w-full z-50">
      <nav class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <NuxtLink to="/" class="text-2xl font-bold text-yellow-500">
              Rescape
            </NuxtLink>
          </div>
          <div class="hidden md:flex items-center space-x-8">
            <NuxtLink to="/" class="text-white hover:text-yellow-500 transition-colors">Home</NuxtLink>
            <NuxtLink to="/about" class="text-white hover:text-yellow-500 transition-colors">About</NuxtLink>
            <NuxtLink to="/terms" class="text-white hover:text-yellow-500 transition-colors">Terms & Privacy</NuxtLink>
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
        <div class="md:hidden" v-show="mobileMenuOpen">
          <div class="px-2 pt-2 pb-3 space-y-1">
            <NuxtLink to="/" class="block px-3 py-2 text-white hover:text-yellow-500 transition-colors">Home</NuxtLink>
            <NuxtLink to="/about" class="block px-3 py-2 text-white hover:text-yellow-500 transition-colors">About</NuxtLink>
            <NuxtLink to="/terms" class="block px-3 py-2 text-white hover:text-yellow-500 transition-colors">Terms & Privacy</NuxtLink>
          </div>
        </div>
      </nav>
    </header>

    <!-- Main Content -->
    <main class="pt-10">
      <slot />
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white">
      <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <!-- Company Info -->
          <div class="space-y-4">
            <h3 class="text-2xl font-bold text-yellow-500">Rescape</h3>
            <p class="text-gray-400">Your ultimate destination for finding the perfect space for your needs.</p>
          </div>
          
          <!-- Quick Links -->
          <div class="space-y-4">
            <h4 class="text-lg font-semibold">Quick Links</h4>
            <ul class="space-y-2">
              <li><NuxtLink to="/about" class="text-gray-400 hover:text-yellow-500 transition-colors">About Us</NuxtLink></li>
              <li><NuxtLink to="/terms" class="text-gray-400 hover:text-yellow-500 transition-colors">Terms & Privacy</NuxtLink></li>
            </ul>
          </div>

          <!-- Services -->
          <div class="space-y-4">
            <h4 class="text-lg font-semibold">Services</h4>
            <ul class="space-y-2">
              <li><a href="#" class="text-gray-400 hover:text-yellow-500 transition-colors">Space Rental</a></li>
              <li><a href="#" class="text-gray-400 hover:text-yellow-500 transition-colors">Event Venues</a></li>
              <li><a href="#" class="text-gray-400 hover:text-yellow-500 transition-colors">Office Spaces</a></li>
              <li><a href="#" class="text-gray-400 hover:text-yellow-500 transition-colors">Meeting Rooms</a></li>
            </ul>
          </div>

          <!-- Contact Info -->
          <div class="space-y-4">
            <h4 class="text-lg font-semibold">Contact Us</h4>
            <ul class="space-y-2">
              <li class="text-gray-400">123 Business Street</li>
              <li class="text-gray-400">City, State 12345</li>
              <li class="text-gray-400">contact@rescape.com</li>
              <li class="text-gray-400">(123) 456-7890</li>
            </ul>
          </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800 mt-12 pt-8">
          <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400">&copy; {{ new Date().getFullYear() }} Rescape. All rights reserved.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
              <a href="#" class="text-gray-400 hover:text-yellow-500 transition-colors">
                <span class="sr-only">Facebook</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
              </a>
              <a href="#" class="text-gray-400 hover:text-yellow-500 transition-colors">
                <span class="sr-only">Instagram</span>
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058z"/></svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
const mobileMenuOpen = ref(false)
</script>

<style>
header {
  background-color: rgba(0, 0, 0, 0.9);
}
</style>
