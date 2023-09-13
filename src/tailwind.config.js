/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
  colors: {
      'primary': '#0284c7'
  },
  container: {
      center: true,
  },
    extend: {},
  },
  plugins: [],
}

