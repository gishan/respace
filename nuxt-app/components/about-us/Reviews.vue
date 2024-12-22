<template>
  <div class="py-10 sm:py-12">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto flow-root max-w-2xl lg:mx-0 lg:max-w-none">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div
            v-for="(review, index) in reviews"
            :key="index"
            class="bg-gray-50 shadow-sm p-6 flex flex-col"
          >
            <div>
              <svg
                fill="#FF4359"
                version="1.1"
                id="Capa_1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                width="40px"
                height="40px"
                viewBox="0 0 351.128 351.128"
                xml:space="preserve"
                stroke="#FF4359"
              >
                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g
                  id="SVGRepo_tracerCarrier"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />

                <g id="SVGRepo_iconCarrier">
                  <g>
                    <path
                      d="M72.326,147.33c4.284-26.928,37.944-55.692,64.26-56.304c1.836,0,3.672-0.612,4.896-1.836 c1.224-0.612,2.448-1.224,3.06-3.06c9.18-17.136,4.284-30.6-11.016-41.616c-17.748-12.852-45.9,0-59.976,11.628 C38.054,85.518,1.946,136.313,3.782,184.662c-6.12,32.437-4.896,67.32,4.284,96.084c6.12,18.36,23.868,27.54,42.228,28.764 c18.36,1.225,56.304,6.732,72.828-4.283c16.524-11.017,17.748-32.437,19.584-50.796c1.836-20.196,7.344-58.141-9.792-74.053 C115.778,165.078,66.818,181.602,72.326,147.33z"
                    />
                    <path
                      d="M274.286,147.33c4.284-26.928,37.943-55.692,64.26-56.304c1.836,0,3.672-0.612,4.896-1.836 c1.225-0.612,2.448-1.224,3.061-3.06c9.18-17.136,4.284-30.6-11.016-41.616c-17.748-12.852-45.9,0-59.977,11.628 c-35.496,29.376-71.604,80.172-69.768,128.52c-6.12,32.437-4.896,67.32,4.283,96.084c6.12,18.36,23.868,27.54,42.229,28.764 c18.36,1.225,56.304,6.732,72.828-4.283c16.523-11.017,17.748-32.437,19.584-50.796c1.836-20.196,7.344-58.141-9.792-74.053 C317.738,165.078,268.166,181.602,274.286,147.33z"
                    />
                  </g>
                </g>
              </svg>
            </div>
            <figure class="rounded-2xl text-sm leading-6 mb-6">
              <div class="text-gray-700 mt-2">
                <p class="text-[14px]">{{ review.content }}</p>
              </div>
            </figure>
            <div>
              <img
                v-if="review.image"
                :src="getImageUrl(review.image)"
                :alt="review.name"
                class="h-20 w-20 bg-gray-50"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  reviews: {
    type: Array,
    default: () => [
      {
        content:
          "ReScape transformed our workspace into a vibrant, productive environment. The attention to detail and flexibility in their spaces is unmatched.",
        image: null,
      },
      {
        content:
          "The perfect blend of professional and creative space. ReScape has been instrumental in our company's growth and team collaboration.",
        image: null,
      },
      {
        content:
          "Working from ReScape has been a game-changer for our remote team. The facilities and community aspect are exactly what we needed.",
        image: null,
      },
      {
        content:
          "As a creative professional, having access to such a well-designed space has boosted my productivity and client interactions significantly.",
        image: null,
      },
      {
        content:
          "ReScape offers the flexibility and professional environment I need as someone who works across different cities. Truly a home away from home.",
        image: null,
      },
    ],
    validator: (value) => {
      return value.every((review) => {
        return review.content;
      });
    },
  },
});

const config = useRuntimeConfig();

const getImageUrl = (path) => {
  return path ? `${config.public.contentBase}${path}` : null;
};
</script>
