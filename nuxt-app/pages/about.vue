<!-- pages/about.vue -->
<script setup>
import Reviews from "./components/about-us/Reviews.vue";

definePageMeta({
  ssr: true,
});

const config = useRuntimeConfig();
const { data: allPagesData } = await useFetch(`${config.public.apiBase}/pages`);
const { data } = await useFetch(`${config.public.apiBase}/pages/about`);

const faqData = computed(
  () => allPagesData?.value.find((page) => page.slug === "/")?.data || {}
);

const reviews = computed(() => data?.value.data.blocks.find(block => block.type === 'about_us_reviews')?.data?.reviews || []);

// console.log(faqData.value);
</script>

<template>
  <div class="min-h-screen">
    <!-- Hero Section -->
    <section class=" text-white py-20 bg-[url('https://dummyimage.com/1600x900')]">
      <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center">
          <h1 class="text-4xl md:text-6xl font-bold mb-6">About Respace</h1>
          <p class="text-xl text-gray-300">Transforming how people find and book spaces.</p>
        </div>
      </div>
    </section>

    <!-- About Content -->
    <section class="py-20">
      <div class="container mx-auto px-6">
        <Hero />
      </div>
    </section>

    <!-- Before-After Section -->
    <section class="py-20">
      <div class="container mx-auto px-6">
        <BeforeAfter />
      </div>
    </section>

    <!-- Reviews Section -->
    <section class="py-20">
      <div class="container mx-auto px-6">
        <Reviews :reviews="reviews" />
      </div>
    </section>
  </div>
</template>
