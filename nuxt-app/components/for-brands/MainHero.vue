<script setup>
const config = useRuntimeConfig();

defineProps({
  title: {
    type: String,
    default: "Activate Your\nExcess Space."
  },
  description: {
    type: String,
    default: "WeStock is the one-stop platform for connecting your brand directly with your audience, so your community online can translate to your success on store shelves and beyond."
  },
  buttonText: {
    type: String,
    default: "Find My Space"
  },
  buttonLink: {
    type: String,
    default: "/contact"
  },
  image: {
    type: String,
    default: null
  },
  bgImage: {
    type: String,
    default: null
  }
});
</script>

<template>
  <div :class="`relative min-h-screen w-full overflow-hidden bg-[img(url('${config.public.contentBase}/${bgImage}')]`">
    <!-- Content container -->
    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
      <div class="grid grid-cols-2 gap-8 items-center">
        <!-- Left content -->
        <div class="z-10">
          <h1 class="text-5xl font-serif font-medium tracking-tight text-gray-900 mb-6">
            {{ title }}
          </h1>
          <p class="text-lg text-gray-700 mb-8 max-w-xl">
            {{ description }}
          </p>
          <NuxtLink
            :to="buttonLink"
            class="inline-flex text-black bg-yellow-500 border-0 focus:outline-none hover:text-white text-sm py-4 pr-16 pl-8 font-bold"
          >
            {{ buttonText }}
          </NuxtLink>
        </div>

        <!-- Right content - overlapping image -->
        <div>
          <div class="relative overflow-hidden">
            <img
              :src="image ? `${config.public.contentBase}/${image}` : 'https://dummyimage.com/720x600'"
              alt="Retail Space"
              class="w-full h-[600px] object-cover"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>