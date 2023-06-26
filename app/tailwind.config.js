/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        'nav-black': '#353A3F',
        'blue-first': '#1C9DD9',
        'blue-second': '#2467BC',
        'yellow-mustard' : '#D9C61C'
      },
    },
  },
  plugins: [],
}

