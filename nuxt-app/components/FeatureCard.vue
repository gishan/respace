<script setup>
defineProps({
  icon: String,
  title: String,
  description: String
})
</script>

<template>
  <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
    <div class="w-16 h-16 mb-4">
      <img :src="icon" :alt="title" class="w-full h-full object-contain" />
    </div>
    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ title }}</h3>
    <p class="text-gray-600 text-sm">{{ description }}</p>
  </div>
</template>