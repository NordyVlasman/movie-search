module.exports = {
  content: [
    "./resources/**/*.blade.php",
  ],
  darkMode: 'media',
  theme: {
    extend: {},
  },
  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/aspect-ratio')],
}
