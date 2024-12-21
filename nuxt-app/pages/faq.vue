<template>
  <div class="min-h-screen">
    <!-- Hero Section -->
    <!-- <section class="bg-black text-white py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h1 class="text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl">
            Frequently Asked Questions
          </h1>
          <p class="mt-6 text-xl text-gray-300 max-w-3xl mx-auto">
            Find answers to common questions about Rescape's platform for both brands and spaces
          </p>
        </div>
      </div>
    </section> -->

    <!-- FAQ Sections -->
    <div class="divide-y divide-gray-200">
      <BrandFaqs :faqs="brandFaqs" />
      <SpaceFaqs :faqs="spaceFaqs" />
    </div>

    <!-- Contact Section -->
    <section class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900">
            Still have questions?
          </h2>
          <p class="mt-4 text-lg text-gray-600">
            Can't find the answer you're looking for? We're here to help.
          </p>
          <div class="mt-8">
            <NuxtLink
              to="/contact"
              class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-colors duration-200"
            >
              Contact Us
            </NuxtLink>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import BrandFaqs from '~/components/FAQ/BrandFaqs.vue'
import SpaceFaqs from '~/components/FAQ/SpaceFaqs.vue'

definePageMeta({
  ssr: true
})

const config = useRuntimeConfig();
const { data: faqData } = await useFetch(`${config.public.apiBase}/pages/faq`)

const brandFaqs = computed(() => faqData?.value.data.blocks.find(block => block.data.type === 'brand').data.faqs || [])
const spaceFaqs = computed(() => faqData?.value.data.blocks.find(block => block.data.type === 'space').data.faqs || [])
</script>
