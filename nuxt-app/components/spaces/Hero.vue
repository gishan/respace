<template>
  <section class="bg-surface-cream py-16 px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center">
    <div class="container mx-auto">
      <!-- Left Content -->
      <div class="md:w-1/2 space-y-6">
        <h1 class="text-5xl font-bold text-surface-black">
          {{ block.data.title }}
        </h1>
        <p class="text-xl text-gray-600">
          {{ block.data.subtitle }}
        </p>
        <NuxtLink 
          :to="block.data.button_link" 
          class="inline-block bg-brand-red text-surface-white px-8 py-3 hover:bg-opacity-90 transition-colors"
        >
          {{ block.data.button_text }}
        </NuxtLink>
      </div>

      <!-- Right Content -->
      <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">
        <div class="relative w-64 h-128">
          <img
            v-if="block.data.image"
            :src="block.data.image"
            :alt="block.data.title"
            class="w-full h-full object-contain"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
defineProps({
  block: {
    type: Object,
    required: true,
    default: () => ({
      data: {
        title: 'Find Your Perfect Space',
        subtitle: 'Discover unique retail spaces for your brand',
        button_text: 'Get Started',
        button_link: '/contact',
        image: null
      }
    })
  }
})
</script>