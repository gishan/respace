<template>
  <section class="bg-white px-4 sm:px-6 lg:px-8">
    <div class="container px-5 py-24 mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
        <div 
          v-for="(feature, index) in block.data.features" 
          :key="index"
          class="space-y-4 border border-gray-200 rounded-lg p-6"
        >
          <div class="flex justify-center">
            <i :class="feature.icon" class="text-4xl"></i>
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
        features: [
          {
            icon: 'fa fa-store',
            title: 'EXCLUSIVITY',
            description: '90% of the spaces on our platform are exclusive to Appear Here and unique in the world.'
          },
          {
            icon: 'fa fa-shield',
            title: 'SAFETY AND SECURITY',
            description: 'The booking process is managed securely online. From standardised legals to payments.'
          },
          {
            icon: 'fa fa-headphones',
            title: 'EXPERT SERVICE AT EVERY STEP',
            description: 'Our concierge team are here to guide you through the booking process.'
          },
          {
            icon: 'fa fa-users',
            title: 'OUR LANDLORDS LIKE TO CHAT',
            description: 'Through our direct chat, you can coordinate the details of your tenancy.'
          }
        ]
      }
    })
  }
});
</script>
