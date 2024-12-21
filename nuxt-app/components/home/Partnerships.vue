<!-- five cards with image as background and a small title on top of the left bottom corner of the image -->
<template>
  <div class="text-white body-font">
    <div
      class="container mx-auto flex px-5 pt-10 md:flex-row flex-col items-center gap-2"
    >
      <div 
        v-for="(partnership, index) in block.data.partnerships" 
        :key="index"
        class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0 relative"
      >
        <img
          :src="partnership.image || 'https://dummyimage.com/720x600'"
          class="object-cover object-center rounded-3xl"
          :alt="partnership.title"
        />
        <div
          class="absolute bottom-2 left-2 text-white p-2 px-4"
        >
          <h2 class="text-sm font-bold">{{ partnership.title }}</h2>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  block: {
    type: Object,
    required: true,
    default: () => ({
      data: {
        partnerships: Array.from({ length: 5 }, (_, i) => ({
          image: null,
          title: `Partnership ${i + 1}`
        }))
      }
    })
  }
});
</script>
