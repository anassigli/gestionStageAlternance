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
        'yellow-mustard' : 'rgba(217,198,28,0.42)',
        'card-bg-normal' : '#F4F2FF',
        'card-bg-accepted' : '#56b267',
        'card-bg-rejected' : '#FFB4C3',
        'card-bg-onHold' : 'rgba(217,198,28,0.42)',

      },
    },
  },
  plugins: [],
}

