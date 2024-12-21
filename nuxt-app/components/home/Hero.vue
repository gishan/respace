<script setup>
defineProps({
  block: {
    type: Object,
    required: true,
    default: () => ({
      data: {
        title: "Activate Your\nExcess Space.",
        description: "WeStock is the one-stop platform for connecting your brand directly with your audience, so your community online can translate to your success on store shelves and beyond.",
        button_text: "Find My Space",
        button_link: "/contact",
        image: null
      }
    })
  }
});
</script>

<template>
  <div class="relative min-h-screen w-full overflow-hidden bg-white">
    <!-- Left section with oval background -->
    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-[70%] w-1/2">
      <div
        class="absolute inset-0 bg-[#FFE4B0] rounded-[100%] transform translate-x-[-30%] translate-y-[20%] scale-150"
      ></div>
    </div>

    <!-- Content container -->
    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
      <div class="grid grid-cols-2 gap-8 items-center">
        <!-- Left content -->
        <div class="z-10">
          <h1 class="text-5xl font-serif font-medium tracking-tight text-gray-900 mb-6">
            {{ block.data.title }}
          </h1>
          <p class="text-lg text-gray-700 mb-8 max-w-xl">
            {{ block.data.description }}
          </p>
          <NuxtLink
            :to="block.data.button_link"
            class="inline-flex text-black bg-yellow-500 border-0 focus:outline-none hover:text-white text-sm py-4 pr-16 pl-8 font-bold"
          >
            {{ block.data.button_text }}
          </NuxtLink>
        </div>

        <!-- Right content - overlapping image -->
        <div>
          <div class="relative overflow-hidden">
            <img
              :src="block.data.image || 'https://dummyimage.com/720x600'"
              alt="Retail Space"
              class="w-full h-[600px] object-cover"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>