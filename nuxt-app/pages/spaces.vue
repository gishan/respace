<template>
  <div>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center">
        <SpaceQuestionForm />
    </div>
    <SpacesHero />
    <SpacesFeatures />
    <SpacesTrusted />
    <SpacesBusiness />
  </div>
</template>

<script setup>
// Components are auto-imported by Nuxt
import SpaceQuestionForm from '~/components/QuestionForm/SpaceQuestionForm.vue'
</script>
