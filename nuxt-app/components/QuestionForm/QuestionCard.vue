<script setup>
defineProps({
  icon: {
    type: String,
    required: true
  },
  label: {
    type: String,
    required: true
  },
  selected: {
    type: Boolean,
    default: false
  }
})

defineEmits(['select'])
</script>

<template>
  <div 
    @click="$emit('select')"
    class="relative w-64 h-72 border-2 rounded-lg p-6 cursor-pointer transition-all duration-200 flex flex-col items-center justify-center gap-4"
    :class="[
      selected 
        ? 'border-blue-500 bg-blue-50' 
        : 'border-gray-200 hover:border-gray-300 bg-white'
    ]"
  >
    <img :src="icon" :alt="label" class="w-20 h-20 object-contain" />
    <h3 class="text-xl font-medium text-center">{{ label }}</h3>
    
    <!-- Radio circle -->
    <div 
      class="absolute bottom-6 w-6 h-6 rounded-full border-2 flex items-center justify-center"
      :class="[
        selected 
          ? 'border-blue-500' 
          : 'border-gray-300'
      ]"
    >
      <div 
        v-if="selected"
        class="w-3 h-3 rounded-full bg-blue-500"
      ></div>
    </div>
  </div>
</template>