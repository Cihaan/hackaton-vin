// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    devtools: {enabled: true},
    css: ['~/assets/css/main.css'],
    modules: ["@nuxt/ui", "@nuxt/image"],
    tailwindcss: {
        config: {
            theme: {
                extend: {
                    colors: {
                        'wine': {
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
                        'secondary': {
                            '50': '#FFFEED',
                            '100': '#FFFEED',
                            '200': '#FFFEED',
                            '300': '#FFFEED',
                            '400': '#FFFEED',
                            '500': '#FFFEED',
                            '600': '#FFFEED',
                            '700': '#FFFEED',
                            '800': '#FFFEED',
                            '900': '#FFFEED',
                            '950': '#FFFEED',
                        },
                        'background': '#FFFEED',
                        'black': '#051822'
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