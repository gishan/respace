<template>
    <div class="flex flex-col items-center text-center p-6">
        <i :class="icon" class="text-4xl mb-4 text-gray-600"></i>
        <h3 class="text-lg font-semibold text-gray-700 uppercase tracking-wider mb-2">
            {{ title }}
        </h3>
        <p class="text-gray-600 text-sm leading-relaxed">
            {{ description }}
        </p>
    </div>
</template>

<script setup lang="ts">
defineProps<{
    icon: string
    title: string
    description: string
}>()
</script>