<!-- pages/about.vue -->
<script setup>
import BeforeAfter from "./components/about-us/BeforeAfter.vue";
import Reviews from "./components/about-us/Reviews.vue";

definePageMeta({
  ssr: true,
});

const config = useRuntimeConfig();
const { data } = await useFetch(`${config.public.apiBase}/pages/about`, {
  server: true,
  onError(error) {
    console.error("Fetch error:", error);
  },
});

const reviews = computed(
  () =>
    data?.value.data.blocks.find((block) => block.type === "about_us_reviews")
      ?.data?.reviews || []
);
const afterBefore = computed(
  () =>
    data?.value.data.blocks.find(
      (block) => block.type === "about_us_before_after"
    )?.data || []
);
</script>

<template>
  <div class="min-h-screen">
    <!-- Hero Section -->
    <section
      class="text-white py-20 bg-[url('https://dummyimage.com/1600x900')]"
    >
      <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center">
          <h1 class="text-4xl md:text-6xl font-bold mb-6">About Respace</h1>
          <p class="text-xl text-gray-300">
            Transforming how people find and book spaces.
          </p>
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
        <BeforeAfter
          :before-title="afterBefore.before_title"
          :after-title="afterBefore.after_title"
          :before-content="afterBefore.before_content"
          :after-content="afterBefore.after_content"
          :before-image="afterBefore.before_image"
          :after-image="afterBefore.after_image"
        />
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
