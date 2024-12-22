<template>
  <div class="container mx-auto">
    <!-- Before Section -->
    <div class="mb-20">
      <h2 class="text-4xl font-bold text-gray-900 mb-8">{{ beforeTitle }}</h2>
      <div class="flex flex-col lg:flex-row items-center gap-12">
        <div class="lg:w-1/2">
          <p class="text-xl text-gray-700">{{ beforeContent }}</p>
        </div>
        <div class="lg:w-1/2">
          <img :src="getImageUrl(beforeImage)" :alt="title" class="w-full max-w-md mx-auto" />
        </div>
      </div>
    </div>

    <!-- After Section -->
    <div>
      <h2 class="text-4xl font-bold text-gray-900 mb-8">{{ afterTitle }}</h2>
      <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
        <div class="lg:w-1/2">
          <p class="text-xl text-gray-700">{{ afterContent }}</p>
        </div>
        <div class="lg:w-1/2">
          <img :src="getImageUrl(afterImage)" :alt="title" class="w-full max-w-md mx-auto" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  beforeTitle: {
    type: String,
    default: 'Life at Rescape'
  },
  beforeContent: {
    type: String,
    default: 'Our automated discovery engine helps you find and organise relevant partners quickly, all in one place.'
  },
  beforeImage: {
    type: String,
    default: null
  },
  afterTitle: {
    type: String,
    default: 'Life at Rescape'
  },
  afterContent: {
    type: String,
    default: 'Our automated discovery engine helps you find and organise relevant partners quickly, all in one place.'
  },
  afterImage: {
    type: String,
    default: null
  }
});

const config = useRuntimeConfig();

const getImageUrl = (path) => {
  return path ? `${config.public.contentBase}${path}` : 'https://dummyimage.com/720x600';
};
</script>