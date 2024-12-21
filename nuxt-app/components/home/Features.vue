<template>
  <section class="bg-white px-4 sm:px-6 lg:px-8">
    <div class="container px-5 py-24 mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
        <div class="space-y-4 border border-gray-200 rounded-lg p-6">
          <div class="flex justify-center">
            <IconStar :size="40" />
          </div>
          <h3 class="text-xl font-semibold text-surface-black text-center">
            EXCLUSIVITY
          </h3>
          <p class="text-gray-600 text-center">
            90% of the spaces on our platform are exclusive to Appear Here and
            unique in the world.
          </p>
        </div>
        <div class="space-y-4 border border-gray-200 rounded-lg p-6">
          <div class="flex justify-center">
            <IconShield :size="40" />
          </div>
          <h3 class="text-xl font-semibold text-surface-black text-center">
            SAFETY AND SECURITY
          </h3>
          <p class="text-gray-600 text-center">
            The booking process is managed securely online. From standardised
            legals to payments.
          </p>
        </div>

        <div class="space-y-4 border border-gray-200 rounded-lg p-6">
          <div class="flex justify-center">
            <IconHeadphones :size="40" />
          </div>
          <h3 class="text-xl font-semibold text-surface-black text-center">
            EXPERT SERVICE AT EVERY STEP
          </h3>
          <p class="text-gray-600 text-center">
            Our concierge team are here to guide you through the booking
            process.
          </p>
        </div>
        <div class="space-y-4 border border-gray-200 rounded-lg p-6">
          <div class="flex justify-center">
            <IconUsers :size="40" />
          </div>
          <h3 class="text-xl font-semibold text-surface-black text-center">
            OUR LANDLORDS LIKE TO CHAT
          </h3>
          <p class="text-gray-600 text-center">
            Through our direct chat, you can coordinate the details of your
            tenancy
          </p>
        </div>
      </div>
    </div>
  </section>
</template>
