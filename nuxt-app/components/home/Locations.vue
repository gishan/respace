<template>
  <div class="text-white body-font">
    <div class="container mx-auto px-5 pb-10">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div 
          v-for="(location, index) in block.data.locations" 
          :key="index"
          class="relative h-[300px]"
          :class="{ 
            'md:col-span-2': location.col_span === 'col-span-2',
            'md:col-span-3': location.col_span === 'col-span-3'
          }"
        >
          <img
            :src="location.image ? `${config.public.contentBase}/${location.image}` : 'https://dummyimage.com/720x600'"
            class="object-cover h-full w-full relative object-center"
            :alt="location.title1"
          />
          <div
            class="absolute top-1 left-1 bg-black bg-opacity-10 text-white p-2 px-4"
          >
            <h2 class="text-sm font-bold">{{ location.title1 }}</h2>
          </div>
          <div class="absolute bottom-0 left-0 w-full text-white">
            <div class="m-1 p-2 px-4 bg-black bg-opacity-10 text-center">
              <h2 class="text-sm font-bold">{{ location.title2 }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const config = useRuntimeConfig();

defineProps({
  block: {
    type: Object,
    required: true,
    default: () => ({
      data: {
        locations: [
          {
            image: null,
            title1: 'Location Title 1',
            title2: 'Location Description 1',
            col_span: 'col-span-2'
          },
          {
            image: null,
            title1: 'Location Title 2',
            title2: 'Location Description 2',
            col_span: 'col-span-1'
          },
          {
            image: null,
            title1: 'Location Title 3',
            title2: 'Location Description 3',
            col_span: 'col-span-3'
          }
        ]
      }
    })
  }
});
</script>
