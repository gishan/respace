<template>
  <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">
          {{ title }}
        </h2>
        <div class="w-24 h-1 bg-orange-500 mx-auto"></div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <BenefitCard
          v-for="benefit in benefits"
          :key="benefit.title"
          :icon="benefit.icon"
          :title="benefit.title"
          :description="benefit.description"
        />
      </div>

      <div class="text-center mt-12">
        <button
          class="px-8 py-3 border-2 border-gray-700 text-gray-700 font-medium rounded-md hover:bg-gray-700 hover:text-white transition-colors"
        >
          {{ ctaText }}
        </button>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
 import BenefitCard from './BenefitCard.vue';


interface Benefit {
  icon: string;
  title: string;
  description: string;
} 

defineProps<{
  benefits: Benefit[];
  title?: string;
  ctaText?: string;
}>();

</script>
