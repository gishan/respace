<script setup>
// defineProps({
//   title: {
//     type: String,
//     default: "Activate Your\nExcess Space.",
//   },
//   description: {
//     type: String,
//     default:
//       "WeStock is the one-stop platform for connecting your brand directly with your audience, so your community online can translate to your success on store shelves and beyond.",
//   },
// });
</script>

<template>
    <div className="relative min-h-screen w-full overflow-hidden bg-white">
      <!-- {/* Left section with oval background */} -->
      <div className="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 h-[70%] w-1/2">
        <div
          className="absolute inset-0 bg-[#FFE4B0] rounded-[100%] transform translate-x-[-30%] translate-y-[20%] scale-150"
        ></div>
      </div>
  
      <!-- {/* Content container */} -->
      <div className="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div className="grid grid-cols-2 gap-8 items-center">
          <!-- {/* Left content */} -->
          <div className="z-10">
            <h1
              className="text-5xl font-serif font-medium tracking-tight text-gray-900 mb-6"
            >
                Activate Your\nExcess Space.
            </h1>
            <p className="text-lg text-gray-700 mb-8 max-w-xl">
                WeStock is the one-stop platform for connecting your brand directly with your audience, so your community online can translate to your success on store shelves and beyond.
            </p>
            <button
              class="inline-flex text-black bg-yellow-500 border-0 focus:outline-none hover:text-white text-sm py-4 pr-16 pl-8 font-bold"
            >
              Find My Space
            </button>
          </div>
  
          <!-- {/* Right content - overlapping image */} -->
          <div>
            <div className="relative overflow-hidden">
              <img
                src="https://dummyimage.com/720x600"
                alt="Retail Space"
                className="w-full h-[600px] object-cover"
              />
              <!-- <div
                className="absolute bottom-0 left-0 right-0 bg-white/90 backdrop-blur-sm p-4"
              >
                <div className="flex items-center justify-between">
                  <p className="text-gray-700">starting at $25/day</p>
                  <div
                    className="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center"
                  >
                    <span className="text-yellow-800">🏷️</span>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  