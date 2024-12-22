<template>
  <section class="bg-[#FAF9F7] py-20">
    <div class="container mx-auto px-4">
      <h2 class="text-4xl font-serif font-medium text-gray-800 mb-6">
        {{ title }}      </h2>
      <div class="flex flex-col lg:flex-row items-center gap-12">
        <!-- Text Content -->
        <div class="lg:w-1/2">
          <div class="flex">
            <div
              class="[writing-mode:vertical-lr] rotate-180 text-lg underline-offset-1 px-4"
            >
              For Brands
            </div>
            <div class="flex-1 space-y-4 text-gray-600">
              {{ description }}
            </div>
          </div>

           <!-- grid of icons -->
           <div class="grid grid-cols-4 gap-4 mt-10">
              <div class="flex bg-white text-black h-[100px] w-[100px] rounded-full justify-center items-center" v-for="icon in icons">
                <i
                  :class="`${icon.icon} text-4xl`"
                  aria-hidden="true"
                />
              </div>
            </div>
        </div>

        <!-- Mobile Mockups -->
        <div class="lg:w-1/2 flex gap-4">
          <img
            :src="backgroundImage"
            alt="Mobile app screenshot 1"
          />
        </div>
      </div>
    </div>
  </section>
</template>


<script setup lang="ts">
defineProps<{
  title: string;
  description: string;
  icons: { icon: string }[];
  backgroundImage: string;
}>();
</script>