/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./components/**/*.{js,vue,ts}",
    "./layouts/**/*.vue",
    "./pages/**/*.vue",
    "./plugins/**/*.{js,ts}",
    "./app.vue",
    "./error.vue"
  ],
  theme: {
    extend: {
      colors: {
        'brand': {
          'red': '#FF4359',
          'yellow': '#FFD386',
        },
        'surface': {
          'white': '#FFFFFF',
          'cream': '#FAF9F6',
          'black': '#000000',
        },
      },
      backgroundColor: {
        'nav': '#000000',
        'footer': '#000000',
      },
    },
  },
  plugins: [],
}
