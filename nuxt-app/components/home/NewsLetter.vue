<!-- components/NewsLetter -->
<script setup>
import { ref } from 'vue'

const props = defineProps({
  title: {
    type: String,
    default: 'Subscribe to Our Newsletter'
  },
  description: {
    type: String,
    default: 'Stay updated with our latest spaces and exclusive offers. Join our community today!'
  },
  buttonText: {
    type: String,
    default: 'Subscribe'
  },
  inputPlaceholder: {
    type: String,
    default: 'Enter your email'
  },
  successMessage: {
    type: String,
    default: 'Thank you for subscribing! 🎉'
  },
  errorMessage: {
    type: String,
    default: 'Oops! Something went wrong. Please try again.'
  },
  loadingText: {
    type: String,
    default: 'Subscribing...'
  }
});

const email = ref('')
const isSubmitting = ref(false)
const showSuccess = ref(false)
const showError = ref(false)

const handleSubmit = async () => {
  if (!email.value) return

  try {
    isSubmitting.value = true
    // Here you would typically make an API call to your backend
    // await $fetch('/api/newsletter', {
    //   method: 'POST',
    //   body: { email: email.value }
    // })
    
    // Simulating API call
    await new Promise(resolve => setTimeout(resolve, 1000))
    
    showSuccess.value = true
    email.value = ''
  } catch (error) {
    showError.value = true
  } finally {
    isSubmitting.value = false
    setTimeout(() => {
      showSuccess.value = false
      showError.value = false
    }, 3000)
  }
}
</script>

<template>
  <div class="bg-black py-16">
    <div class="container mx-auto px-6">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-white mb-4">
          {{ title }}
        </h2>
        <p class="text-gray-400 mb-8">
          {{ description }}
        </p>
        
        <form @submit.prevent="handleSubmit" class="max-w-md mx-auto">
          <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-grow">
              <input
                v-model="email"
                type="email"
                :placeholder="inputPlaceholder"
                class="w-full px-4 py-3 rounded-lg bg-gray-800 text-white border border-gray-700 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 transition-colors"
                required
              />
            </div>
            <button
              type="submit"
              :disabled="isSubmitting"
              class="px-6 py-3 bg-yellow-500 text-black font-semibold rounded-lg hover:bg-yellow-400 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
            >
              <span v-if="isSubmitting">
                {{ loadingText }}
              </span>
              <span v-else>
                {{ buttonText }}
              </span>
            </button>
          </div>
          
          <!-- Success Message -->
          <div
            v-if="showSuccess"
            class="mt-4 p-3 bg-green-500 text-white rounded-lg"
          >
            {{ successMessage }}
          </div>
          
          <!-- Error Message -->
          <div
            v-if="showError"
            class="mt-4 p-3 bg-red-500 text-white rounded-lg"
          >
            {{ errorMessage }}
          </div>
        </form>
      </div>
    </div>
  </div>
</template>