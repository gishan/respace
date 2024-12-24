<template>
  <section class="bg-surface-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-surface-black mb-4">
          {{ title }}
        </h2>
        <p class="text-xl text-gray-600">
          {{ subtitle }}
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
        <div 
          v-for="(feature, index) in features" 
          :key="index"
          class="space-y-4"
        >
          <div class="flex justify-center">
            <i 
              v-if="feature.icon" 
              :class="feature.icon" 
              class="text-4xl text-brand-red"
            ></i>
            <!-- <img
              v-if="feature.icon"
              :src="feature.icon"
              :alt="feature.title"
              class="w-12 h-12 text-brand-red"
            /> -->
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
  title: {
    type: String,
    default: 'Why Choose Our Spaces'
  },
  subtitle: {
    type: String,
    default: 'Everything you need for a successful brand activation'
  },
  features: {
    type: Array,
    default: () => [
      {
        icon: "fa fa-store",
        title: 'Increase traffic to your venue',
        description: 'Drive more footfall to your location'
      },
      {
        icon: "fa fa-truck",
        title: 'Opportunity to upsell',
        description: 'Increase your revenue with additional sales'
      },
      {
        icon: "fa fa-users",
        title: 'Build customer loyalty',
        description: 'Create lasting relationships with your customers'
      },
      {
        icon: "fa fa-calendar",
        title: 'Free advertising',
        description: 'Get exposure through our marketing channels'
      },
      {
        icon: "fa fa-car",
        title: 'Higher average spend',
        description: 'Customers tend to spend more on unique experiences'
      },
      {
        icon: "fa fa-bell",
        title: 'Free marketing',
        description: 'Benefit from our extensive marketing efforts'
      }
    ]
  }
})
</script>
