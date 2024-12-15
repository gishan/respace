<script setup>
defineProps({
  title: {
    type: String,
    default: 'Unlock Omnichannel'
  },
  description: {
    type: String,
    default: 'WeStock is the one-stop platform for connecting your brand directly with your audience, so your community online can translate to your success on store shelves and beyond.'
  }
})
</script>

<template>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
      <div class="mb-8 lg:mb-0">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
          {{ title }}
        </h1>
        <p class="text-xl text-gray-600 mb-8">
          {{ description }}
        </p>
        <button class="bg-orange-500 text-white px-8 py-3 rounded-lg font-medium hover:bg-orange-600 transition-colors">
          Book A Demo
        </button>
      </div>
      <div class="relative">
        <ChatBubbles />
      </div>
    </div>
  </div>
</template>