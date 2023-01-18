/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "/index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
    'node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx}',
    'node_modules/flowbite/**/*.{js,jsx,ts,tsx}'
  ],
  theme: {
    extend: {},
    fontSize: {
      'navbar-font': '1.27rem',
        sm: '0.8rem',
        base: '1rem',
        xl: '1.25rem',
        '2xl': '1.563rem',
        '3xl': '1.853rem',
        '4xl': '2.441rem',
        '5xl': '3.052rem',
    }
    
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('flowbite/plugin')
  ],
}