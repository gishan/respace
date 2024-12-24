<!-- layouts/default.vue -->
<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Navbar -->
    <header class="fixed w-full z-50">
      <nav class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <NuxtLink to="/" class="text-2xl font-bold text-yellow-500">
              {{ logoText }}
            </NuxtLink>
          </div>
          <div class="hidden md:flex items-center space-x-8">
            <NuxtLink 
              v-for="link in navLinks" 
              :key="link.url"
              :to="link.url" 
              class="text-white hover:text-yellow-500 transition-colors"
            >
              {{ link.label }}
            </NuxtLink>
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
            <NuxtLink 
              v-for="link in navLinks" 
              :key="link.url"
              :to="link.url" 
              class="block px-3 py-2 text-white hover:text-yellow-500 transition-colors"
            >
              {{ link.label }}
            </NuxtLink>
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
            <h3 class="text-2xl font-bold text-yellow-500">{{ footerCompanyName }}</h3>
            <p class="text-gray-400">{{ footerCompanyDescription }}</p>
          </div>
          
          <!-- Quick Links -->
          <div class="space-y-4">
            <h4 class="text-lg font-semibold">Quick Links</h4>
            <ul class="space-y-2">
              <li v-for="link in quickLinks" :key="link.url">
                <NuxtLink 
                  :to="link.url" 
                  class="text-gray-400 hover:text-yellow-500 transition-colors"
                >
                  {{ link.label }}
                </NuxtLink>
              </li>
            </ul>
          </div>

          <!-- Services -->
          <div class="space-y-4">
            <h4 class="text-lg font-semibold">Services</h4>
            <ul class="space-y-2">
              <li v-for="service in services" :key="service.url">
                <a 
                  :href="service.url" 
                  class="text-gray-400 hover:text-yellow-500 transition-colors"
                >
                  {{ service.label }}
                </a>
              </li>
            </ul>
          </div>

          <!-- Contact Info -->
          <div class="space-y-4">
            <h4 class="text-lg font-semibold">Contact Us</h4>
            <ul class="space-y-2">
              <li class="text-gray-400">{{ contactAddressLine1 }}</li>
              <li class="text-gray-400">{{ contactAddressLine2 }}</li>
              <li class="text-gray-400">{{ contactEmail }}</li>
              <li class="text-gray-400">{{ contactPhone }}</li>
            </ul>
          </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800 mt-12 pt-8">
          <div class="flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400">&copy; {{ new Date().getFullYear() }} {{ footerCompanyName }}. All rights reserved.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
              <a 
                v-for="social in socialLinks" 
                :key="social.url"
                :href="social.url" 
                class="text-gray-400 hover:text-yellow-500 transition-colors"
                target="_blank"
                rel="noopener noreferrer"
              >
                <span class="sr-only">{{ social.platform }}</span>
                <i :class="social.icon" class="h-6 w-6"></i>
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

const config = useRuntimeConfig();
const { data: layoutData } = await useFetch(`${config.public.apiBase}/pages/layout`, {
  server: true,
  onError(error) {
    console.error("Fetch error:", error);
  },
});

const data = layoutData?.value?.["data"]["blocks"][0].data;

const logoText = data["logo_text"];
const navLinks = data["nav_links"];
const footerCompanyName = data["footer_company_name"];
const footerCompanyDescription = data["footer_company_description"];
const quickLinks = data["quick_links"];
const services = data["services"];
const contactAddressLine1 = data["contact_address_line1"];
const contactAddressLine2 = data["contact_address_line2"];
const contactEmail = data["contact_email"];
const contactPhone = data["contact_phone"];
const socialLinks = data["social_links"];

</script>

<style>
header {
  background-color: rgba(0, 0, 0, 0.9);
}
</style>
