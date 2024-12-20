<!-- pages/index.vue -->
<script setup>
import StepForm from './components/QuestionForm/StepForm.vue'
</script>

<template>
  <div class="min-h-screen">
    <!-- Hero Section -->
    <section class="bg-black text-white body-font">
      <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div
          class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium">
            <br class="hidden lg:inline-block">{{ $title }}
          </h1>
          <p class="mb-8 leading-relaxed">Copper mug try-hard pitchfork pour-over freegan heirloom neutra air plant
            cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot chicken authentic
            tumeric truffaut hexagon try-hard chambray.</p>
          <div class="flex justify-center">
            <button
              class="inline-flex text-black bg-yellow-500 border-0 focus:outline-none hover:text-white text-sm py-4 pr-16 pl-8 font-bold">Find
              My Space</button>
          </div>
        </div>
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
          <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
        </div>
      </div>
    </section>

    <!-- Question Form Section -->
    <section class="py-20">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Find Your Perfect Space</h2>
        <ClientOnly>
          <StepForm />
        </ClientOnly>
      </div>
    </section>

    <!-- Newsletter Section -->
    <section class="bg-brand-red py-10">
      <div class="container mx-auto px-6">
        <NewsLetter />
      </div>
    </section>

    <!-- Blog Posts Section -->
    <section class="py-10">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Our Blog</h2>
        <BlogPosts />
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-10">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Our Services</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-4">Space Rental</h3>
            <p class="text-gray-600">Find the perfect space for your next event or meeting.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-4">Event Venues</h3>
            <p class="text-gray-600">Discover unique venues for your special occasions.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-4">Office Spaces</h3>
            <p class="text-gray-600">Flexible workspaces for your business needs.</p>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
