<script setup>
import FeatureCard from './FeatureCard.vue'

const features = [
  {
    icon: '/icons/tasks.svg',
    title: 'Add Tasks',
    description: 'Add your tasks for the day & update them. Check them once they\'re done.'
  },
  {
    icon: '/icons/time.svg',
    title: 'Time Boxing',
    description: 'Allocate time for each task for better time management & organization.'
  },
  {
    icon: '/icons/priority.svg',
    title: 'Prioritisation',
    description: 'Prioritise the most important tasks of the day to the top, so you do what needs to be done first.'
  },
  {
    icon: '/icons/video.svg',
    title: 'Video Calls',
    description: 'Hop on video calls, present your screen, invite external guests & collaborate with your entire team.'
  }
]
</script>

<template>
  <section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Who is Breezy for?</h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
          Our customers are a diverse range of partnership managers, marketing managers, CEOs, growth managers and founders who are looking to self-grow their business.
        </p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <FeatureCard 
          v-for="feature in features" 
          :key="feature.title"
          v-bind="feature"
        />
      </div>
    </div>
  </section>
</template>