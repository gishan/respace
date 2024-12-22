<!-- pages/index.vue -->
<script setup>
import Hero from "./components/home/Hero.vue";
import Features from "./components/home/Features.vue";
import Partnerships from "./components/home/Partnerships.vue";
import Locations from "./components/home/Locations.vue";
import NewsLetter from "./components/home/NewsLetter.vue";
import StepForm from "./components/QuestionForm/StepForm.vue";

definePageMeta({
  ssr: true,
});

const config = useRuntimeConfig();
const { data } = await useFetch(`${config.public.apiBase}/pages/home`);

const hero = computed(() => data?.value.data.blocks.find(block => block.type === 'home_hero').data || {})
const locations = computed(() => data?.value.data.blocks.find(block => block.type === 'home_locations').data || {})

// const spaceFaqs = computed(() => data?.value.data.blocks.find(block => block.data.type === 'space').data.faqs || [])

</script>

<template>
  <div class="min-h-screen">
    <!-- Hero Section -->
    <Hero 
      :title="hero.title" 
      :description="hero.description"
      :button-text="hero.button_text"
      :button-link="hero.button_link"
      :image="hero.image"
    />
    <!-- Question Form Section -->
    <!-- <section class="py-20">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">
          Find Your Perfect Space
        </h2>
        <StepForm />
      </div>
    </section> -->

    <!-- Features Section -->
    <section class="py-5">
      <Features />
    </section>

    <!-- Partnership Section -->
    <section class="py-5">
      <Partnerships />
    </section>

    <div
      class="container mx-auto flex px-5 py-10 md:flex-row flex-col items-center gap-2"
    >
      <h1 class="text-3xl font-bold text-center mb-12">Where will you activate next?</h1>
    </div>

    <!-- Locations Section -->
    <section class="py-5">
      <Locations :block="{ data: locations }" />
    </section>

    <!-- Blog Posts Section -->
    <section class="py-10">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Our Blog</h2>
        <BlogPosts />
      </div>
    </section>

     <!-- Newsletter Section -->
     <section class="bg-black py-5">
      <div class="container mx-auto px-6">
        <NewsLetter />
      </div>
    </section>
  </div>
</template>
