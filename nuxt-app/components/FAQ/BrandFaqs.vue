<template>
  <div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
          Frequently Asked Questions for Brands
        </h2>
        <p class="mt-4 text-lg leading-6 text-gray-600">
          Everything you need to know about partnering with Rescape as a brand
        </p>
      </div>
      <div class="mt-12">
        <FaqAccordion :faqs="faqs" />
      </div>
    </div>
  </div>
</template>

<script setup>
import FaqAccordion from './FaqAccordion.vue'

const props = defineProps({
  faqs: {
    type: Array,
    required: true
  }
})
</script>
