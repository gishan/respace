<script setup>
import { ref } from 'vue'
import QuestionCard from './QuestionCard.vue'

const currentStep = ref(0)
const answers = ref({})
const isSubmitting = ref(false)
const submitError = ref(null)
const submitSuccess = ref(false)

const questions = [
  {
    id: 'brand-name',
    title: 'Brand Name',
    type: 'text',
    subtitle: null
  },
  {
    id: 'product-category',
    title: 'Primary Product Category',
    type: 'single-select',
    subtitle: null,
    options: [
      { id: 'fashion', label: 'Fashion & Apparel', icon: '/icons/fashion.svg' },
      { id: 'beauty', label: 'Beauty & Cosmetics', icon: '/icons/beauty.svg' },
      { id: 'food', label: 'Food & Beverage', icon: '/icons/food.svg' },
      { id: 'home', label: 'Home & Lifestyle', icon: '/icons/home.svg' },
      { id: 'tech', label: 'Tech & Electronics', icon: '/icons/tech.svg' },
      { id: 'art', label: 'Art & Design', icon: '/icons/art.svg' },
      { id: 'other', label: 'Other (please specify)', icon: '/icons/other.svg', hasInput: true }
    ]
  },
  {
    id: 'brand-stage',
    title: 'Brand Stage',
    type: 'single-select',
    subtitle: null,
    options: [
      { id: 'startup', label: 'Startup (0-2 years)', icon: '/icons/startup.svg' },
      { id: 'growing', label: 'Growing (3-5 years)', icon: '/icons/growth.svg' },
      { id: 'established', label: 'Established (5+ years)', icon: '/icons/established.svg' },
      { id: 'emerging', label: 'Emerging/Indie Brand', icon: '/icons/emerging.svg' },
      { id: 'corporate', label: 'Corporate/Enterprise', icon: '/icons/corporate.svg' }
    ]
  },
  {
    id: 'activation-purpose',
    title: 'Primary Activation Purpose',
    type: 'single-select',
    subtitle: 'Space Activation Goals',
    options: [
      { id: 'launch', label: 'Product Launch' },
      { id: 'popup', label: 'Pop-Up Retail' },
      { id: 'awareness', label: 'Brand Awareness' },
      { id: 'sales', label: 'Direct Sales' },
      { id: 'testing', label: 'Market Testing' },
      { id: 'engagement', label: 'Customer Engagement' },
      { id: 'feedback', label: 'Customer Feedback' },
      { id: 'seasonal', label: 'Seasonal Campaign' },
      { id: 'demo', label: 'Product Demo' },
      { id: 'sampling', label: 'Product Sampling' }
    ]
  },
  {
    id: 'experience-type',
    title: 'Desired Experience Type',
    type: 'single-select',
    subtitle: 'Space Activation Goals',
    options: [
      { id: 'boutique', label: 'Intimate Boutique Space' },
      { id: 'retail', label: 'High-Traffic Retail Location' },
      { id: 'workshop', label: 'Creative Workshop Area' },
      { id: 'hospitality', label: 'Hospitality Venue' },
      { id: 'community', label: 'Community Event Space' },
      { id: 'gallery', label: 'Art Gallery/Exhibition Space' },
      { id: 'mixed', label: 'Mixed-Use Environment' }
    ]
  },
  {
    id: 'showcase-preference',
    title: 'Your Brand Is Best Showcased On',
    type: 'single-select',
    subtitle: 'Space Activation Goals',
    options: [
      { id: 'floor', label: 'Floorspace' },
      { id: 'table', label: 'Tablespace' },
      { id: 'shelf', label: 'Shelfspace' },
      { id: 'wall', label: 'Wallspace' }
    ]
  },
  {
    id: 'target-demographic',
    title: 'Target Customer Demographic',
    type: 'multi-select',
    subtitle: 'Space Activation Goals',
    options: [
      { id: 'genz', label: 'Gen Z (13-25)' },
      { id: 'millennials', label: 'Millennials (26-41)' },
      { id: 'genx', label: 'Gen X (42-57)' },
      { id: 'boomers', label: 'Baby Boomers (58-76)' },
      { id: 'highend', label: 'High-End Consumers' },
      { id: 'budget', label: 'Budget-Conscious Consumers' },
      { id: 'specific', label: 'Specific Lifestyle Group', hasInput: true }
    ]
  },
  {
    id: 'location-type',
    title: 'Preferred Location Type',
    type: 'single-select',
    subtitle: 'Space Requirements',
    options: [
      { id: 'retail', label: 'Retail Space' },
      { id: 'hotels', label: 'Hotels' },
      { id: 'fnb', label: 'F&B Spaces' },
      { id: 'coworking', label: 'Coworking Spaces' },
      { id: 'wellness', label: 'Wellness (Spa/Gym/Pilates)' },
      { id: 'college', label: 'College/University Area' },
      { id: 'resort', label: 'Resort/Tourist Location' },
      { id: 'none', label: 'No Preference' }
    ]
  },
  {
    id: 'space-size',
    title: 'Space Size Requirement',
    type: 'single-select',
    subtitle: 'Space Requirements',
    options: [
      { id: 'micro', label: 'Micro Space (under 200 sq ft)' },
      { id: 'small', label: 'Small Space (200-500 sq ft)' },
      { id: 'medium', label: 'Medium Space (500-1000 sq ft)' },
      { id: 'large', label: 'Large Space (1000-2000 sq ft)' },
      { id: 'flexible', label: 'Flexible/Variable Needs' }
    ]
  },
  {
    id: 'amenities',
    title: 'Desired Amenities',
    type: 'single-select',
    subtitle: 'Space Requirements',
    options: [
      { id: 'kitchen', label: 'Kitchen/Food Prep Area' },
      { id: 'shelving', label: 'Display Shelving' },
      { id: 'changing', label: 'Changing Rooms' },
      { id: 'storage', label: 'Storage Space' },
      { id: 'tech', label: 'Tech/WiFi Capabilities' },
      { id: 'av', label: 'Audio/Visual Equipment' },
      { id: 'lighting', label: 'Natural Lighting' },
      { id: 'visibility', label: 'Street Visibility' },
      { id: 'parking', label: 'Parking Access' }
    ]
  },
  {
    id: 'budget',
    title: 'Budget Range for Space Rental',
    type: 'single-select',
    subtitle: 'Financial & Timing Details',
    options: [
      { id: 'budget1', label: '$500-$1,000/month' },
      { id: 'budget2', label: '$1,000-$2,500/month' },
      { id: 'budget3', label: '$2,500-$5,000/month' },
      { id: 'budget4', label: '$5,000-$10,000/month' },
      { id: 'budget5', label: '$10,000+/month' },
      { id: 'flexible', label: 'Flexible/Negotiable' }
    ]
  },
  {
    id: 'timeline',
    title: 'Desired Launch/Activation Timeline',
    type: 'single-select',
    subtitle: 'Financial & Timing Details',
    options: [
      { id: 'immediate', label: 'Immediate (0-30 days)' },
      { id: 'short', label: '1-3 Months' },
      { id: 'medium', label: '3-6 Months' },
      { id: 'long', label: '6-12 Months' },
      { id: 'flexible', label: 'Flexible Timing' }
    ]
  },
  {
    id: 'duration',
    title: 'Activation Duration',
    type: 'single-select',
    subtitle: 'Financial & Timing Details',
    options: [
      { id: 'oneday', label: 'One-Day Event' },
      { id: 'weekend', label: 'Weekend Pop-Up' },
      { id: 'month1', label: '1 Month' },
      { id: 'month3', label: '3 Months' },
      { id: 'month6', label: '6 Months' },
      { id: 'year1', label: '1 Year' },
      { id: 'flexible', label: 'Flexible Duration' }
    ]
  },
  {
    id: 'special-requirements',
    title: 'Special Requirements/Notes',
    type: 'textarea',
    subtitle: 'Additional Considerations',
    placeholder: 'Enter any unique needs, accessibility requirements, or specific preferences'
  },
  {
    id: 'contact',
    title: 'Brand Contact Information',
    type: 'contact-form',
    subtitle: 'Additional Considerations',
    fields: [
      { id: 'name', label: 'Name', type: 'text' },
      { id: 'email', label: 'Email', type: 'email' },
      { id: 'phone', label: 'Phone Number', type: 'tel' },
      { id: 'website', label: 'Company Website', type: 'url' }
    ]
  },
  {
    id: 'consent',
    title: 'Consent & Next Steps',
    type: 'checkboxes',
    subtitle: null,
    options: [
      { id: 'contact-consent', label: 'I agree to be contacted by space matching representatives' },
      { id: 'understand', label: 'I understand that submission does not guarantee space placement' }
    ]
  }
]

const selectOption = (questionId, optionId, isMulti = false) => {
  if (isMulti) {
    if (!answers.value[questionId]) {
      answers.value[questionId] = []
    }
    const index = answers.value[questionId].indexOf(optionId)
    if (index === -1) {
      answers.value[questionId].push(optionId)
    } else {
      answers.value[questionId].splice(index, 1)
    }
  } else {
    answers.value[questionId] = optionId
  }
}

const updateTextInput = (questionId, value) => {
  answers.value[questionId] = value
}

const updateContactField = (questionId, fieldId, value) => {
  if (!answers.value[questionId]) {
    answers.value[questionId] = {}
  }
  answers.value[questionId][fieldId] = value
}

const nextStep = () => {
  if (currentStep.value < questions.length - 1) {
    currentStep.value++
  } else {
    console.log('Form completed:', answers.value)
  }
}

const prevStep = () => {
  if (currentStep.value > 0) {
    currentStep.value--
  }
}

const isOptionSelected = (questionId, optionId) => {
  return answers.value[questionId] === optionId
}

const isMultiSelected = (questionId, optionId) => {
  return answers.value[questionId] && answers.value[questionId].includes(optionId)
}

const canProceed = (questionId) => {
  const question = questions.find(q => q.id === questionId)
  const answer = answers.value[questionId]

  if (!answer) return false

  switch (question.type) {
    case 'text':
    case 'textarea':
      return answer.trim().length > 0
    case 'single-select':
      return !!answer
    case 'multi-select':
    case 'checkboxes':
      return Array.isArray(answer) && answer.length > 0
    case 'contact-form':
      return Object.values(answer).every(value => value && value.trim().length > 0)
    default:
      return true
  }
}

async function handleSubmit() {
  if (!isLastStep()) return nextStep()
  
  try {
    isSubmitting.value = true
    submitError.value = null

    console.log('Form submitted:', answers.value);
    
    // Format the data according to the API requirements
    const formData = {
      brand_name: answers.value['brand-name'],
      product_category: answers.value['product-category']?.id,
      product_category_other: answers.value['product-category']?.other,
      brand_stage: answers.value['brand-stage']?.id,
      activation_purpose: answers.value['activation-purpose']?.id,
      experience_type: answers.value['experience-type']?.id,
      showcase_preference: answers.value['showcase-preference']?.id,
      target_demographic: answers.value['target-demographic']?.map(item => item.id) || [],
      target_demographic_specific: answers.value['target-demographic']?.find(item => item.id === 'specific')?.other,
      location_type: answers.value['location-type']?.id,
      space_size: answers.value['space-size']?.id,
      amenities: answers.value['amenities']?.map(item => item.id) || [],
      budget: answers.value['budget']?.id,
      timeline: answers.value['timeline']?.id,
      duration: answers.value['duration']?.id,
      special_requirements: answers.value['special-requirements'],
      contact_name: answers.value['contact']?.name,
      contact_email: answers.value['contact']?.email,
      contact_phone: answers.value['contact']?.phone,
      contact_company: answers.value['contact']?.company,
      contact_role: answers.value['contact']?.role
    }

    const response = await fetch(`${process.env.NUXT_PUBLIC_API_BASE}/brand-inquiries`, {
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
    // Reset form after successful submission
    answers.value = {}
    currentStep.value = 0
  } catch (error) {
    console.error('Form submission error:', error);
    submitError.value = error.message || 'An error occurred while submitting the form. Please try again.'
  } finally {
    isSubmitting.value = false
  }
}

const isLastStep = () => currentStep.value === questions.length - 1
</script>

<template>
  <div class="max-w-4xl mx-auto px-4 py-12">
    <div class="mb-12">
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
        <div v-for="field in questions[currentStep].fields" :key="field.id" class="space-y-2">
          <label :for="field.id" class="block text-sm font-medium text-gray-700">{{ field.label }}</label>
          <div class="relative">
            <input
              :type="field.type"
              :id="field.id"
              v-model="answers[questions[currentStep].id][field.id]"
              class="w-full px-4 py-3 border-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand-red focus:border-brand-red transition-colors"
              :class="{
                'border-gray-200': !answers[questions[currentStep].id]?.[field.id],
                'border-brand-red': answers[questions[currentStep].id]?.[field.id]
              }"
            >
            <div v-if="field.icon" class="absolute left-4 top-1/2 transform -translate-y-1/2">
              <img :src="field.icon" :alt="field.label" class="w-6 h-6 object-contain">
            </div>
          </div>
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
        @click="handleSubmit"
        :disabled="!canProceed(questions[currentStep].id) || isSubmitting"
        class="px-6 py-2 bg-gray-200 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed"
      >
        {{ isLastStep() ? 'Submit' : 'Next' }}
      </button>
    </div>
  </div>
</template>