<template>
  <div>
    <MainHero :title="mainHero.title" :description="mainHero.description" :icons="mainHero.icons" :background-image="mainHero.background_image" />
    <FirstHero :title="firstHero.title" :description="firstHero.description" :icons="firstHero.icons" :background-image="firstHero.background_image" />
    <Hero :title="hero.title" :description="hero.description" :icons="hero.icons" :background-image="hero.background_image" />
    <PopupBenefits
      v-if="popupBenefits?.benefits?.length"
      :benefits="popupBenefits.benefits"
      :title="popupBenefits.title || 'WHY DO A POP UP SHOP?'"
      :cta-text="popupBenefits.cta_text || 'GET A FREE POP UP QUOTE'"
    />
  </div>
</template>

<script setup>
// Components are auto-imported by Nuxt
import MainHero from "~/components/for-brands/MainHero.vue";
import FirstHero from "~/components/for-brands/FirstHero.vue";
import Hero from "~/components/for-brands/Hero.vue";
import PopupBenefits from "~/components/for-brands/PopupBenefits.vue";

const config = useRuntimeConfig();
const { data } = await useFetch(`${config.public.apiBase}/pages/for-brands`);

const popupBenefits = computed(() => {
  const blocks = data.value?.data?.blocks || [];
  const block = blocks.find((block) => block.type === "popup_benefits");
  return block?.data || null;
});

const hero = computed(() => {
  const blocks = data.value?.data?.blocks || [];
  const block = blocks.find((block) => block.type === "for_brands_hero");
  return block?.data || null;
});

const firstHero = computed(() => {
  const blocks = data.value?.data?.blocks || [];
  const block = blocks.find((block) => block.type === "for_brands_first_hero");
  return block?.data || null;
});

const mainHero = computed(() => {
  const blocks = data.value?.data?.blocks || [];
  const block = blocks.find((block) => block.type === "for_brands_main_hero");
  return block?.data || null;
});

</script>
