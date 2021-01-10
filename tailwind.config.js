const colors = require('@tailwindcss/ui/colors');

module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
    "./vendor/laravel-views/**/*.php",
    "./vendor/livewire/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        gray: colors['cool-gray']
      }
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
    require('@tailwindcss/typography'),
  ]
}
