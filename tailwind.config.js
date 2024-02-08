/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // look for the public folder to find the files to watch
    "./public/**/*.{html,js,php}",
    "./app/Views/**/*.{html,js,php}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
