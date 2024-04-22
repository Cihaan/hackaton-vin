// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: ["@nuxt/ui","@hypernym/nuxt-anime", "@nuxt/image"],
  css: ['~/assets/css/main.css'],
  postcss: {
    plugins: {
      tailwindcss: {
        exposeConfig: true
      },
      autoprefixer: {},
    },
  },
  tailwindcss: {
    config : {
      theme: {
        extend: {
          colors: {
            'venice-blue': {
              DEFAULT : '#085984',
              '50': '#f0f9ff',
              '100': '#e0f2fe',
              '200': '#bbe6fc',
              '300': '#7ed3fb',
              '400': '#3abcf6',
              '500': '#085984',
              '600': '#0483c5',
              '700': '#0469a0',
              '800': '#085984',
              '900': '#0d4a6d',
              '950': '#092f48',
            },

          }
        }
      },
    },
  },
  ui: {
    global: true,
    icons: ['mdi'],
  },

})