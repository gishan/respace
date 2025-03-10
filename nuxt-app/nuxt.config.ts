// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  ssr: true,
  devtools: { enabled: true },
  modules: ['@nuxtjs/tailwindcss', 'nuxt-lucide-icons'],

  app: {
    head: {
      title: 'Rescape',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' }
      ],
      link: [
        {
          rel: 'stylesheet',
          href: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'
        }
      ]
    }
  },

  runtimeConfig: {
    public: {
      apiBase: process.env.NUXT_PUBLIC_API_BASE || 'http://localhost:8000/api',
      contentBase: process.env.NUXT_PUBLIC_CONTENT_BASE || 'http://localhost:8000/api'
    }
  },

  lucide: {
    namePrefix: 'Icon'
  },

  compatibilityDate: '2024-12-23'
})