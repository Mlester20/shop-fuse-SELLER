/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",
    "./**/*.html",
  ],
  theme: {
    extend: {
      animation: {
        blob: 'blob 7s infinite',
        pulse: 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
      },
      keyframes: {
        blob: {
          '0%, 100%': {
            transform: 'translate(0, 0) scale(1)',
          },
          '33%': {
            transform: 'translate(30px, -50px) scale(1.1)',
          },
          '66%': {
            transform: 'translate(-20px, 20px) scale(0.9)',
          },
        },
      },
      backdropBlur: {
        xs: '2px',
      },
      colors: {
        'glass-light': 'rgba(255, 255, 255, 0.7)',
        'glass-dark': 'rgba(31, 41, 55, 0.7)',
      },
    },
  },
  plugins: [],
  darkMode: 'class',
}
