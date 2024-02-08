/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            height: {
                'bilhete':'26.8rem'
            },
            maxHeight: {
                'bilhete':'26.8rem'
            },
            colors: {
                roxo: {
                    claro: '#6b4866',
                    escuro: '#361d33',
                    light: '#a48da0',
                },
            },
            fontFamily: {
                barcade: ['barcade', 'sans-serif'],

            },
            keyframes: {
                balanco_kf: {
                    '0%': { transform: 'rotate(0deg)' },
                    '50%': { transform: 'rotate(-4deg)' },
                    '100%': { transform: 'rotate(0deg)' },
                }
            },
            animation: {
                'balanco': 'balanco_kf 1s ease-in-out infinite alternate',
            }
        }
    },
    plugins: [
        function ({ addUtilities }) {
            const newUtilities = {
                '.writing-mode-vertical-left': {
                    writingMode: 'vertical-rl',
                    textOrientation: 'sideways',
                    whiteSpace: 'nowrap',
                    transform: 'rotate(180deg)',
                },
                '.writing-mode-vertical-right': {
                    writingMode: 'vertical-rl',
                    textOrientation: 'sideways',
                    whiteSpace: 'nowrap',
                },
            };

            addUtilities(newUtilities, ['responsive', 'hover']);
        },
    ],
}

