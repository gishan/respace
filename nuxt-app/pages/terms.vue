<!-- pages/terms.vue -->
<template>
  <div class="min-h-screen">
    <!--Terms Tabs Section -->
    <section class="py-20">
      <div class="container mx-auto px-6">
        <TermsTabs :terms="terms" :privacy="privacy" />
      </div>
    </section>
  </div>
</template>

<script setup>
definePageMeta({
  ssr: true,
});

const config = useRuntimeConfig();
const { data } = await useFetch(`${config.public.apiBase}/pages/terms`);

const terms = computed(() => data.value.data.blocks.find(block => block.type === 'terms_tabs').data.terms || {})
const privacy = computed(() => data.value.data.blocks.find(block => block.type === 'terms_tabs').data.privacy || {})

</script>
