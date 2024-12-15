<!-- pages/contact.vue -->
<template>
  <div class="min-h-screen">
    <!-- Hero Section -->
    <section class="bg-black text-white py-20">
      <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center">
          <h1 class="text-4xl md:text-6xl font-bold mb-6">Contact Us</h1>
          <p class="text-xl text-gray-300">Get in touch with our team</p>
        </div>
      </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-20 bg-gray-50">
      <div class="container mx-auto px-6">
        <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8 md:p-10">
          <form @submit.prevent="handleSubmit" class="space-y-8">
            <!-- Name Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="space-y-2">
                <label for="firstName" class="block text-sm font-medium text-gray-700">
                  First Name
                </label>
                <input
                  type="text"
                  id="firstName"
                  v-model="formData.firstName"
                  class="block w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-900 text-base transition duration-200 ease-in-out hover:border-yellow-400 placeholder-gray-400"
                  placeholder="John"
                  required
                />
              </div>
              <div class="space-y-2">
                <label for="lastName" class="block text-sm font-medium text-gray-700">
                  Last Name
                </label>
                <input
                  type="text"
                  id="lastName"
                  v-model="formData.lastName"
                  class="block w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-900 text-base transition duration-200 ease-in-out hover:border-yellow-400 placeholder-gray-400"
                  placeholder="Doe"
                  required
                />
              </div>
            </div>

            <!-- Email -->
            <div class="space-y-2">
              <label for="email" class="block text-sm font-medium text-gray-700">
                Email Address
              </label>
              <input
                type="email"
                id="email"
                v-model="formData.email"
                class="block w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-900 text-base transition duration-200 ease-in-out hover:border-yellow-400 placeholder-gray-400"
                placeholder="john.doe@example.com"
                required
              />
            </div>

            <!-- Phone Number -->
            <div class="space-y-2">
              <label class="block text-sm font-medium text-gray-700">
                Phone Number
              </label>
              <ClientOnly>
                <vue-tel-input
                  v-model="phoneNumber"
                  mode="international"
                  @validate="validatePhone"
                  required
                >
                </vue-tel-input>
              </ClientOnly>
              <p v-if="!isPhoneValid && phoneNumber" class="mt-1 text-sm text-red-600">
                Please enter a valid phone number
              </p>
            </div>

            <!-- Company Name -->
            <div class="space-y-2">
              <label for="companyName" class="block text-sm font-medium text-gray-700">
                Company Name
              </label>
              <input
                type="text"
                id="companyName"
                v-model="formData.companyName"
                class="block w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-900 text-base transition duration-200 ease-in-out hover:border-yellow-400 placeholder-gray-400"
                placeholder="Example Inc."
              />
            </div>

            <!-- Message -->
            <div class="space-y-2">
              <label for="message" class="block text-sm font-medium text-gray-700">
                Message
              </label>
              <textarea
                id="message"
                v-model="formData.message"
                rows="4"
                class="block w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-gray-900 text-base transition duration-200 ease-in-out hover:border-yellow-400 placeholder-gray-400 resize-none"
                placeholder="Tell us about your project..."
              ></textarea>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-4">
              <button
                type="submit"
                class="inline-flex items-center justify-center px-8 py-3.5 text-base font-medium text-white bg-yellow-600 rounded-lg shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200 ease-in-out disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-yellow-600"
                :disabled="isSubmitting || !isPhoneValid"
              >
                <span v-if="isSubmitting" class="inline-flex items-center">
                  <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  Sending...
                </span>
                <span v-else>Send Message</span>
              </button>
            </div>
          </form>

          <!-- Success Message -->
          <div v-if="showSuccess" class="mt-6 rounded-lg bg-green-50 p-4">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-green-800">
                  Thank you for your message! We'll get back to you soon.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import '@/assets/css/vue-tel-input.css'
import { ref, reactive } from 'vue'

const formData = reactive({
  firstName: '',
  lastName: '',
  email: '',
  phone: '',
  companyName: '',
  message: ''
})

const isSubmitting = ref(false)
const showSuccess = ref(false)
const isPhoneValid = ref(true)
const phoneNumber = ref('+945427283')

const validatePhone = ({ isValid, number }) => {
  // isPhoneValid.value = isValid
  if (isValid) {
    formData.phone = number
  }
}

const handleSubmit = async () => {
  try {
    isSubmitting.value = true
    
    const response = await fetch('http://127.0.0.1:8000/api/contact', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        ...formData,
        phone: phoneNumber.value ?? '+921323123'
      })
    })

    if (!response.ok) {
      throw new Error('Failed to submit form')
    }

    showSuccess.value = true
    formData.firstName = ''
    formData.lastName = ''
    formData.email = ''
    formData.phone = ''
    formData.companyName = ''
    formData.message = ''
    phoneNumber.value = ''
  } catch (error) {
    console.error('Error submitting form:', error)
    alert('Failed to submit form. Please try again.')
  } finally {
    isSubmitting.value = false
  }
}
</script>
