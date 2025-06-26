// tailwind.config.js
export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './resources/js/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#e0fafa',
          100: '#b3f0ef',
          200: '#80e5e3',
          300: '#4ddad8',
          400: '#26cfcd',
          500: '#0ABAB5', // base
          600: '#099f9b',
          700: '#08837f',
          800: '#066964',
          900: '#044d48',
          DEFAULT: '#0ABAB5',
        },
        secondary: {
          50: '#f2f5f4',
          100: '#dfe5e2',
          200: '#c4d1cb',
          300: '#a9bcb4',
          400: '#90a79e',
          500: '#819A91', // base
          600: '#6c857c',
          700: '#576f67',
          800: '#435953',
          900: '#2f433f',
          DEFAULT: '#819A91',
        },
        accent: {
          50: '#fffbea',
          100: '#fef3c7',
          200: '#fde68a',
          300: '#fcd34d',
          400: '#fbbf24',
          500: '#f59e0b',  // DEFAULT
          600: '#d97706',
          700: '#b45309',
          800: '#92400e',
          900: '#78350f',
          DEFAULT: '#f59e0b',
        },
      },
    },
  },
  plugins: [],
}
