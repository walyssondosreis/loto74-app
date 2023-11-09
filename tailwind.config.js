/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            roxo: {
                claro: '#6b4866',
                escuro: '#361d33',
                light: '#a48da0',
            },
        },
        fontFamily: {
            inter: ['Inter', 'sans-serif']
        },
    },
  },
  plugins: [],
}

