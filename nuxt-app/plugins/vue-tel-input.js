import { VueTelInput } from 'vue-tel-input'

export default defineNuxtPlugin((nuxtApp) => {
  if (process.client) {
    nuxtApp.vueApp.component('VueTelInput', VueTelInput)
  }
})
