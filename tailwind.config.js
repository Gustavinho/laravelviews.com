const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
    "./vendor/laravel-views/**/*.php",
    "./vendor/livewire/**/*.php",
  ],
  jit: false,
  theme: {
    extend: {
      colors: {
        gray: colors.slate,
        primary: colors.sky,
      },
      maxWidth: {
        '8xl': '90rem',
      },
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/typography'),
  ]
}
