<template>
  <section class="bg-surface-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-surface-black mb-4">
          {{ title }}
        </h2>
        <p class="text-xl text-gray-600">
          {{ subtitle }}
        </p>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 items-center justify-items-center">
        <div 
          v-for="(brand, index) in brands" 
          :key="index"
          class="w-32 h-16 flex items-center justify-center"
        >
          <a 
            v-if="brand.link" 
            :href="brand.link" 
            target="_blank" 
            rel="noopener noreferrer"
            class="hover:opacity-80 transition-opacity"
          >
            <img
              :src="brand.logo"
              :alt="brand.name"
              class="w-full h-full object-contain"
            />
          </a>
          <img
            v-else
            :src="brand.logo"
            :alt="brand.name"
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
    default: 'Trusted by Leading Brands'
  },
  subtitle: {
    type: String,
    default: 'Join the brands that trust us with their retail presence'
  },
  brands: {
    type: Array,
    default: () => [
      {
        logo: null,
        name: 'Brand 1',
        link: "https://dummyimage.com/720x600"
      },
      {
        logo: null,
        name: 'Brand 2',
        link: "https://dummyimage.com/720x600"
      },
      {
        logo: null,
        name: 'Brand 3',
        link: "https://dummyimage.com/720x600"
      },
      {
        logo: null,
        name: 'Brand 4',
        link: "https://dummyimage.com/720x600"
      }
    ]
  }
})
</script>
