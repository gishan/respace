<template>
  <section class="bg-surface-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-surface-black mb-4">
          {{ block.data.title }}
        </h2>
        <p class="text-xl text-gray-600">
          {{ block.data.subtitle }}
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
        <div 
          v-for="(feature, index) in block.data.features" 
          :key="index"
          class="space-y-4"
        >
          <div class="flex justify-center">
            <img
              v-if="feature.icon"
              :src="feature.icon"
              :alt="feature.title"
              class="w-12 h-12 text-brand-red"
            />
          </div>
          <h3 class="text-xl font-semibold text-surface-black text-center">
            {{ feature.title }}
          </h3>
          <p class="text-gray-600 text-center">
            {{ feature.description }}
          </p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
defineProps({
  block: {
    type: Object,
    required: true,
    default: () => ({
      data: {
        title: 'Why Choose Our Spaces',
        subtitle: 'Everything you need for a successful brand activation',
        features: [
          {
            icon: null,
            title: 'Increase traffic to your venue',
            description: 'Drive more footfall to your location'
          },
          {
            icon: null,
            title: 'Opportunity to upsell',
            description: 'Increase your revenue with additional sales'
          },
          {
            icon: null,
            title: 'Build customer loyalty',
            description: 'Create lasting relationships with your customers'
          },
          {
            icon: null,
            title: 'Free advertising',
            description: 'Get exposure through our marketing channels'
          },
          {
            icon: null,
            title: 'Higher average spend',
            description: 'Customers tend to spend more on unique experiences'
          },
          {
            icon: null,
            title: 'Free marketing',
            description: 'Benefit from our extensive marketing efforts'
          }
        ]
      }
    })
  }
})
</script>
