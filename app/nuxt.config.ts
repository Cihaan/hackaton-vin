// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  css: ['~/assets/css/main.css'],
  modules: ["@nuxt/ui", "@nuxt/image","@pinia/nuxt"],
  ui: {
    global: true,
  },
  routeRules: {
    '/administration/calendrier': { ssr: false },
  },
   ssr: false,
  colorMode: {
    fallback: 'light',
    preference: 'light'
  },

})