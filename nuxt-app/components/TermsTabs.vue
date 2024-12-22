<template>
  <div class="max-w-4xl mx-auto">
    <!-- Tab Navigation -->
    <div class="border-b border-gray-200">
      <nav class="-mb-px flex" aria-label="Tabs">
        <button 
          @click="activeTab = 'terms'"
          :class="[
            activeTab === 'terms'
              ? 'border-yellow-500 text-yellow-600'
              : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
            'w-1/2 py-4 px-1 text-center border-b-2 font-medium text-lg'
          ]"
        >
          Terms of Service
        </button>
        <button
          @click="activeTab = 'privacy'"
          :class="[
            activeTab === 'privacy'
              ? 'border-yellow-500 text-yellow-600'
              : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
            'w-1/2 py-4 px-1 text-center border-b-2 font-medium text-lg'
          ]"
        >
          Privacy Policy
        </button>
      </nav>
    </div>

    <!-- Tab Content -->
    <div class="mt-8 prose prose-lg max-w-none">
      <!-- Terms of Service Content -->
      <div v-if="activeTab === 'terms'">
        <h2 class="text-3xl font-bold mb-6">Terms of Service</h2>
        <div v-for="(section, index) in terms" :key="index">
          <h3 class="text-2xl font-bold mt-8 mb-4">{{ section.title }}</h3>
          <div v-html="section.content" class="pl-5 space-y-3 text-gray-600 list-disc marker:text-blue-600" style="list-style: unset;"></div>
        </div>
      </div>

      <!-- Privacy Policy Content -->
      <div v-if="activeTab === 'privacy'">
        <h2 class="text-3xl font-bold mb-6">Privacy Policy</h2>
        <div v-for="(section, index) in privacy" :key="index">
          <h3 class="text-2xl font-bold mt-8 mb-4">{{ section.title }}</h3>
          <div v-html="section.content" class="pl-5 space-y-3 text-gray-600 list-disc marker:text-blue-600"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  terms: {
    type: Array,
    required: true,
    default: () => []
  },
  privacy: {
    type: Array,
    required: true,
    default: () => []
  },
  initialTab: {
    type: String,
    default: 'terms'
  }
})

const activeTab = ref(props.initialTab)
</script>
