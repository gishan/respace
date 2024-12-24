<template>
  <section class="bg-surface-cream py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-surface-black mb-4">
          {{ title }}
        </h2>
        <p class="text-xl text-gray-600">
          {{ subtitle }}
        </p>
      </div>

      <div class="flex flex-col md:flex-row items-center justify-between gap-12">
        <div class="md:w-1/2 space-y-6">
          <p class="text-lg text-gray-600">
            {{ description }}
          </p>
          <NuxtLink 
            :to="buttonLink"
            class="inline-block bg-brand-red text-surface-white px-8 py-3 hover:bg-opacity-90 transition-colors"
          >
            {{ buttonText }}
          </NuxtLink>
        </div>

        <div class="md:w-1/2">
          <img
            v-if="image"
            :src="image"
            :alt="title"
            class="w-full rounded-lg aspect-video object-cover"
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
    default: 'Ready to Get Started?'
  },
  subtitle: {
    type: String,
    default: 'Take the first step towards your perfect retail space'
  },
  description: {
    type: String,
    default: 'Connect with our team to find the ideal space for your brand.'
  },
  buttonText: {
    type: String,
    default: 'Contact Us'
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
