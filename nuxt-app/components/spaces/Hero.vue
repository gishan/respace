<template>
  <section class="bg-surface-cream py-16 px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center">
    <div class="container mx-auto">
      <!-- Left Content -->
      <div class="md:w-1/2 space-y-6">
        <h1 class="text-5xl font-bold text-surface-black">
          {{ title }}
        </h1>
        <p class="text-xl text-gray-600">
          {{ subtitle }}
        </p>
        <NuxtLink 
          :to="buttonLink" 
          class="inline-block bg-brand-red text-surface-white px-8 py-3 hover:bg-opacity-90 transition-colors"
        >
          {{ buttonText }}
        </NuxtLink>
      </div>

      <!-- Right Content -->
      <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">
        <div class="relative w-64 h-128">
          <img
            v-if="image"
            :src="image"
            :alt="title"
            class="w-full h-full object-contain"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
defineProps({
  title: {
    type: String,
    default: 'Find Your Perfect Space'
  },
  subtitle: {
    type: String,
    default: 'Discover unique retail spaces for your brand'
  },
  buttonText: {
    type: String,
    default: 'Get Started'
  },
  buttonLink: {
    type: String,
    default: '/contact'
  },
  image: {
    type: String,
    default: "https://dummyimage.com/720x600"
  }
})
</script>