// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  css: ['~/assets/css/main.css'],
  modules: ["@nuxt/ui", "@nuxt/image","@pinia/nuxt"],
  tailwindcss: {
    config : {
      theme: {
        extend: {
          colors: {
            'red-wine': {
              '50': '#fdf4f3',
              '100': '#fce8e7',
              '200': '#f8d4d3',
              '300': '#f2afaf',
              '400': '#ea8284',
              '500': '#de555b',
              '600': '#bc313e',
              '700': '#a92737',
              '800': '#8e2334',
              '900': '#7a2131',
              '950': '#430e16',
            },
            'background' : '#FFFEED',
            'black' : '#051822'
          }
        }
      },
    },
  },
  ui: {
    global: true,
    icons: [],
  },
})