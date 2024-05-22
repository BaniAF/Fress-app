/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin')
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    plugin(function({ addUtilities, addComponents, e, config }) {
      // Add your custom styles here
    }),
  ],
  theme: {
    fontFamily: {
      'sans': ['Helvetica', 'Arial', 'sans-serif'],
      'display': ['Oswald'],
      'body': ['"Open Sans"'],
    },
    extend: {},
  },
  plugins: [
  ],
}

