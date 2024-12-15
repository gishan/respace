<template>
  <div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-2xl font-semibold text-indigo-600">HI, WE'RE MABLE</h2>
        <p class="mt-4 text-4xl font-bold text-gray-900">
          We offer direct distribution of innovative, emerging brands.
        </p>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        <div v-for="n in 8" :key="n" class="bg-white rounded-lg shadow-md p-4">
          <div class="aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden">
            <img src="https://via.placeholder.com/150" class="w-full h-full object-cover" alt="Brand" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>