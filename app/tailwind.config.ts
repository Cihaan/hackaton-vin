import type { Config } from 'tailwindcss'
import defaultTheme from 'tailwindcss/defaultTheme'

export default <Partial<Config>>{
    theme: {
        extend: {
            colors: {
                'wine': {
                    '50': '#bc313e',
                    '100': '#bc313e',
                    '200': '#bc313e',
                    '300': '#bc313e',
                    '400': '#bc313e',
                    '500': '#bc313e',
                    '600': '#bc313e',
                    '700': '#bc313e',
                    '800': '#bc313e',
                    '900': '#bc313e',
                    '950': '#bc313e',
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
            },
        },
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '4rem',
                xl: '5rem',
                '2xl': '6rem',
            },
        },
    }
}
