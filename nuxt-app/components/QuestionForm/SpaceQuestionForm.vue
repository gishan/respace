<script setup>
import { ref } from 'vue'

const currentStep = ref(0)
const answers = ref({})
const isSubmitting = ref(false)
const submitError = ref(null)
const submitSuccess = ref(false)
const showSuccess = ref(false)

const questions = [
  {
    id: 'space-name',
    title: 'Space Name',
    type: 'text',
    required: true
  },
  {
    id: 'location',
    title: 'Location',
    type: 'text',
    required: true,
    placeholder: 'Enter address'
  },
  {
    id: 'space-type',
    title: 'Space Type',
    type: 'single-select',
    required: true,
    options: [
      { id: 'retail', label: 'Retail Space' },
      { id: 'hospitality', label: 'Hospitality Venue' },
      { id: 'event', label: 'Event Space' },
      { id: 'mixed-use', label: 'Mixed-Use Location' },
      { id: 'specific', label: 'Other (specify)' }
    ]
  },
  {
    id: 'primary-motivation',
    title: 'Primary Motivation for Renting',
    type: 'single-select',
    required: true,
    options: [
      { id: 'revenue', label: 'Generate Additional Revenue' },
      { id: 'traffic', label: 'Increase Foot Traffic' },
      { id: 'community', label: 'Create Community Engagement' },
      { id: 'activate', label: 'Activate Underutilized Space' },
      { id: 'partnerships', label: 'Build Brand Partnerships' },
      { id: 'showcase', label: 'Showcase Space Potential' },
      { id: 'networking', label: 'Networking Opportunities' }
    ]
  },
  {
    id: 'target-demographics',
    title: 'Target Brand Demographics',
    type: 'checkboxes',
    required: true,
    options: [
      { id: 'emerging', label: 'Emerging Brands' },
      { id: 'luxury', label: 'Luxury Brands' },
      { id: 'local', label: 'Local Entrepreneurs' },
      { id: 'tech', label: 'Tech Startups' },
      { id: 'fashion', label: 'Fashion Labels' },
      { id: 'food', label: 'Food & Beverage' },
      { id: 'art', label: 'Art & Design Brands' }
    ]
  },
  {
    id: 'collaboration-style',
    title: 'Preferred Brand Collaboration Style',
    type: 'single-select',
    required: true,
    options: [
      { id: 'short-term', label: 'Short-Term Rentals' },
      { id: 'rotating', label: 'Rotating Brand Experiences' },
      { id: 'long-term', label: 'Exclusive Long-Term Partnerships' },
      { id: 'flexible', label: 'Flexible/Open to Negotiation' }
    ]
  },
  {
    id: 'supported-events',
    title: 'Supported Retail Events',
    type: 'checkboxes',
    required: true,
    options: [
      { id: 'launch', label: 'Product Launch' },
      { id: 'placement', label: 'Product Placement' },
      { id: 'popup', label: 'Pop-Up Store' },
      { id: 'activation', label: 'Brand Activation' },
      { id: 'workshop', label: 'Workshop/Demonstration' },
      { id: 'photoshoot', label: 'Photo Shoot' },
      { id: 'sampling', label: 'Sampling Event' }
    ]
  },
  {
    id: 'contact',
    title: 'Contact Information',
    type: 'contact',
    required: true,
    fields: [
      { id: 'full-name', label: 'Full Name', type: 'text' },
      { id: 'email', label: 'Email Address', type: 'email' },
      { id: 'phone', label: 'Phone Number', type: 'tel' }
    ]
  }
]

function selectOption(questionId, optionId, isMulti = false) {
  if (!answers.value[questionId]) {
    answers.value[questionId] = isMulti ? [] : null
  }

  if (isMulti) {
    const index = answers.value[questionId].indexOf(optionId)
    if (index === -1) {
      answers.value[questionId].push(optionId)
    } else {
      answers.value[questionId].splice(index, 1)
    }
  } else {
    answers.value[questionId] = answers.value[questionId] === optionId ? null : optionId
  }
}

function updateTextInput(questionId, value) {
  answers.value[questionId] = value
}

function updateContactField(questionId, fieldId, value) {
  if (!answers.value[questionId]) {
    answers.value[questionId] = {}
  }
  answers.value[questionId][fieldId] = value
}

function nextStep() {
  if (questions[currentStep.value].type === 'supported-events' || canProceed(questions[currentStep.value].id)) {
    currentStep.value++
  }
}

function prevStep() {
  if (currentStep.value > 0) {
    currentStep.value--
  }
}

function isOptionSelected(questionId, optionId) {
  return answers.value[questionId] === optionId
}

function isMultiSelected(questionId, optionId) {
  return answers.value[questionId]?.includes(optionId)
}

function canProceed(questionId) {
  const currentQuestion = questions[currentStep.value]
  const answer = answers.value[questionId]

  if (currentQuestion.type === 'text') {
    return answer && answer.trim() !== ''
  }

  if (currentQuestion.type === 'single-select') {
    return answer !== undefined
  }

  if (currentQuestion.type === 'multi-select') {
    return Array.isArray(answer) && answer.length > 0
  }

  if (currentQuestion.type === 'contact-form') {
    // Add validation for contact form
    const requiredFields = ['name', 'email', 'phone']
    return requiredFields.every(field => answers.value[field] && answers.value[field].trim() !== '')
  }

  return true
}

async function handleSubmit() {
  if (!canProceed(questions[currentStep.value].id)) return

  isSubmitting.value = true
  submitError.value = null

  try {
    // Here you would typically make an API call to submit the form data
    console.log('Form submitted:', answers.value)
    
    const formData = {
      space_name: answers.value['space-name']?.trim(),
      contact_name: answers.value['full-name']?.trim(),
      contact_email: answers.value['email']?.trim(),
      contact_phone: answers.value['phone']?.trim(),
      location: answers.value['location']?.trim(),
      space_type: answers.value['space-type']?.trim(),
      primary_motivation: answers.value['primary-motivation']?.trim(),
      supported_events: answers.value['supported-events']?.filter(Boolean),
      collaboration_style: answers.value['collaboration-style']?.trim(),
      industries: answers.value['industries']?.filter(Boolean),
      target_demographics: answers.value['target-demographics'],
    }

    console.log('Formatted data:', formData);
    const config = useRuntimeConfig();
    const response = await fetch(`${config.public.apiBase}/space-submissions`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify(formData)
    })

    if (!response.ok) {
      const errorData = await response.json()
      throw new Error(errorData.message || 'Failed to submit form')
    }
    
    submitSuccess.value = true
    showSuccess.value = true
    // Reset form after successful submission
    answers.value = {}
    setTimeout(() => {
      showSuccess.value = false
      currentStep.value = 0
    }, 5000)
  } catch (error) {
    console.error('Form submission error:', error);
    submitError.value = error.message || 'An error occurred while submitting the form. Please try again.'
  } finally {
    isSubmitting.value = false
  }
}

function isLastStep() {
  return currentStep.value === questions.length - 1
}
</script>

<template>
  <div class="max-w-4xl mx-auto px-4 py-12">
    <div v-if="showSuccess" class="mb-8 p-4 bg-green-100 text-green-700 rounded-lg text-center">
      Thank you for your submission! We'll get back to you soon.
    </div>
    
    
    <div v-else class="mb-12 min-w-[400px]">
      <!-- Subtitle if exists -->
      <div v-if="questions[currentStep].subtitle" class="text-sm uppercase tracking-wider text-gray-600 mb-4 text-center">
        {{ questions[currentStep].subtitle }}
      </div>
      
      <h2 class="text-3xl font-bold text-center mb-16">
        {{ questions[currentStep].title }}
      </h2>
      
      <!-- Text Input -->
      <div v-if="questions[currentStep].type === 'text'" class="max-w-xl mx-auto">
        <div class="relative">
          <input
            type="text"
            v-model="answers[questions[currentStep].id]"
            class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors"
            :class="{
              'border-gray-200': !answers[questions[currentStep].id],
              'border-brand-red': answers[questions[currentStep].id]
            }"
            :placeholder="questions[currentStep].placeholder || 'Enter your answer'"
          >
          <div v-if="questions[currentStep].icon" class="absolute left-4 top-1/2 transform -translate-y-1/2">
            <img :src="questions[currentStep].icon" :alt="questions[currentStep].label" class="w-6 h-6 object-contain">
          </div>
        </div>
      </div>

      <!-- Textarea -->
      <div v-else-if="questions[currentStep].type === 'textarea'" class="max-w-xl mx-auto">
        <textarea
          v-model="answers[questions[currentStep].id]"
          rows="4"
          class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors"
          :class="{
            'border-gray-200': !answers[questions[currentStep].id],
            'border-brand-red': answers[questions[currentStep].id]
          }"
          :placeholder="questions[currentStep].placeholder"
        ></textarea>
      </div>

      <!-- Contact Form -->
      <div v-else-if="questions[currentStep].type === 'contact-form'" class="max-w-xl mx-auto space-y-4">
        <!-- Name -->
        <div class="space-y-2">
          <label class="block text-sm font-medium text-gray-700">Full Name</label>
          <input
            type="text"
            v-model="answers['full-name']"
            class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors"
            :class="{
              'border-gray-200': !answers['full-name'],
              'border-brand-red': answers['full-name']
            }"
            placeholder="Enter your full name"
          >
        </div>

        <!-- Email -->
        <div class="space-y-2">
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input
            type="email"
            v-model="answers['email']"
            class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors"
            :class="{
              'border-gray-200': !answers['email'],
              'border-brand-red': answers['email']
            }"
            placeholder="Enter your email"
          >
        </div>

        <!-- Phone -->
        <div class="space-y-2">
          <label class="block text-sm font-medium text-gray-700">Phone Number</label>
          <input
            type="tel"
            v-model="answers['phone']"
            class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors"
            :class="{
              'border-gray-200': !answers['phone'],
              'border-brand-red': answers['phone']
            }"
            placeholder="Enter your phone number"
          >
        </div>
      </div>

      <!-- Single Select Options -->
      <div v-else-if="questions[currentStep].type === 'single-select'" class="w-full">
        <div class="flex justify-center gap-8 flex-wrap mb-4">
          <div
            v-for="option in questions[currentStep].options"
            :key="option.id"
            @click="selectOption(questions[currentStep].id, option.id)"
            class="relative flex flex-col items-center p-6 border rounded-lg cursor-pointer transition-all hover:shadow-lg w-48"
            :class="{
              'border-brand-red': isOptionSelected(questions[currentStep].id, option.id),
              'border-gray-200': !isOptionSelected(questions[currentStep].id, option.id)
            }"
          >
            <!-- Icon -->
            <div v-if="option.icon" class="mb-4">
              <img :src="option.icon" :alt="option.label" class="w-12 h-12 object-contain">
            </div>

            <span class="text-lg font-medium text-center">{{ option.label }}</span>

            <!-- Radio button at bottom -->
            <div class="mt-auto pt-4">
              <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center"
                :class="{
                  'border-brand-red': isOptionSelected(questions[currentStep].id, option.id),
                  'border-gray-300': !isOptionSelected(questions[currentStep].id, option.id)
                }"
              >
                <div v-if="isOptionSelected(questions[currentStep].id, option.id)" 
                  class="w-3 h-3 rounded-full bg-brand-red">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Other input field shown below all options -->
        <div v-if="isOptionSelected(questions[currentStep].id, 'other')" class="max-w-xl mx-auto mt-6">
          <input
            type="text"
            v-model="answers[`${questions[currentStep].id}_other`]"
            class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-red"
            placeholder="Please specify"
          >
        </div>
      </div>

      <!-- Multi Select Options -->
      <div v-else-if="questions[currentStep].type === 'multi-select'" class="w-full">
        <div class="flex justify-center gap-8 flex-wrap mb-4">
          <div
            v-for="option in questions[currentStep].options"
            :key="option.id"
            @click="selectOption(questions[currentStep].id, option.id, true)"
            class="relative flex flex-col items-center p-6 border rounded-lg cursor-pointer transition-all hover:shadow-lg w-48"
            :class="{
              'border-brand-red': isMultiSelected(questions[currentStep].id, option.id),
              'border-gray-200': !isMultiSelected(questions[currentStep].id, option.id)
            }"
          >
            <!-- Icon -->
            <div v-if="option.icon" class="mb-4">
              <img :src="option.icon" :alt="option.label" class="w-12 h-12 object-contain">
            </div>

            <span class="text-lg font-medium text-center">{{ option.label }}</span>

            <!-- Checkbox at bottom -->
            <div class="mt-auto pt-4">
              <div class="w-5 h-5 border-2 rounded flex items-center justify-center"
                :class="{
                  'border-brand-red bg-brand-red': isMultiSelected(questions[currentStep].id, option.id),
                  'border-gray-300': !isMultiSelected(questions[currentStep].id, option.id)
                }"
              >
                <svg v-if="isMultiSelected(questions[currentStep].id, option.id)" 
                  class="w-3 h-3 text-white" 
                  fill="none" 
                  stroke="currentColor" 
                  viewBox="0 0 24 24"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>
            </div>

            <!-- Other input field shown below all options -->
            <div v-if="isOptionSelected(questions[currentStep].id, 'specific')" class="max-w-xl mx-auto mt-6">
              <input
                type="text"
                v-model="answers[`target_demographic_specific`]"
                class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-red"
                placeholder="Please specify"
              >
            </div>
          </div>
        </div>

        <!-- Other input field shown below all options -->
        <div v-if="isMultiSelected(questions[currentStep].id, 'other')" class="max-w-xl mx-auto mt-6">
          <input
            type="text"
            v-model="answers[`${questions[currentStep].id}_other`]"
            class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-red"
            placeholder="Please specify"
          >
        </div>
      </div>

      <!-- Contact form -->
      <div v-else-if="questions[currentStep].type === 'contact'" class="max-w-xl mx-auto space-y-4">
        <div v-for="field in questions[currentStep].fields" :key="field.id" class="space-y-2">
          <label :for="field.id" class="block text-sm font-medium text-gray-700">{{ field.label }}</label>
          <input
            :type="field.type"
            :id="field.id"
            v-model="answers[questions[currentStep].id][field.id]"
            class="w-full px-4 py-2 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-red"
          >
        </div>
      </div>

      <!-- Checkboxes -->
      <div v-else-if="questions[currentStep].type === 'checkboxes'" class="max-w-xl mx-auto space-y-3">
        <div
          v-for="option in questions[currentStep].options"
          :key="option.id"
          class="flex items-center space-x-4 p-3 rounded-lg hover:bg-gray-50 cursor-pointer"
          @click="selectOption(questions[currentStep].id, option.id, true)"
        >
          <div class="w-5 h-5 border-2 rounded flex items-center justify-center"
            :class="{
              'border-brand-red bg-brand-red': isMultiSelected(questions[currentStep].id, option.id),
              'border-gray-300': !isMultiSelected(questions[currentStep].id, option.id)
            }"
          >
            <svg v-if="isMultiSelected(questions[currentStep].id, option.id)" 
              class="w-3 h-3 text-white" 
              fill="none" 
              stroke="currentColor" 
              viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
          </div>

          <!-- Icon -->
          <div v-if="option.icon" class="flex-shrink-0">
            <img :src="option.icon" :alt="option.label" class="w-6 h-6 object-contain">
          </div>

          <label class="flex-grow text-gray-700 cursor-pointer">{{ option.label }}</label>
        </div>
      </div>
    </div>

    <div class="flex justify-between max-w-2xl mx-auto">
      <button
        @click="prevStep"
        :disabled="currentStep === 0"
        class="px-6 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 disabled:opacity-50 disabled:cursor-not-allowed"
      >
        Back
      </button>
      
      <button
        @click="isLastStep() ? handleSubmit() : nextStep()"
        :disabled="!canProceed(questions[currentStep].id) || isSubmitting || showSuccess"
        class="px-6 py-2 bg-gray-200 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed"
      >
        {{ isLastStep() ? 'Submit' : 'Next' }}
      </button>
    </div>
  </div>
</template>
