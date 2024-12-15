<template>
  <div class="divide-y divide-gray-200">
    <div v-for="(faq, index) in faqs" :key="index" class="relative">
      <button
        @click="toggleFaq(index)"
        class="w-full py-4 text-left transition-colors duration-200 hover:bg-gray-50 focus:outline-none px-5"
      >
        <div class="flex items-center justify-between pr-6">
          <h3 class="text-lg font-medium leading-7 text-gray-900">
            {{ faq.question }}
          </h3>
          <span class="ml-6 flex items-center">
            <svg
              :class="[openIndex === index ? 'rotate-180 transform' : '', 'h-6 w-6 transform transition-transform duration-200']"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </span>
        </div>
      </button>
      <div
        v-show="openIndex === index"
        class="pb-6 pr-6 "
      >
        <div class="text-base text-gray-600 px-5 pt-2" v-html="faq.answer"></div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
interface FAQ {
  question: string;
  answer: string;
}

const props = defineProps<{
  faqs: FAQ[]
}>()

const openIndex = ref<number | null>(null)

const toggleFaq = (index: number) => {
  openIndex.value = openIndex.value === index ? null : index
}
</script>
