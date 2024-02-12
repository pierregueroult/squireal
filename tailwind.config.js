/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // look for the public folder to find the files to watch
    "./public/**/*.{html,js,php}",
    "./app/Views/**/*.{html,js,php}",
  ],
  theme: {
    extend: {
      colors: {
        background: "#FEFEDE",
        foreground: "#FFFFFF",
        text: "#000000",
        mainlightgreen: "#CCDD89",
        maindarkgreen: "#297265",
        mainlightblue: "#A9D1E7",
        mainorange: "#FB9341",
        mainyellow: "#FFD882",
        mainbrown: "#431000",
      },
    },
  },
  plugins: [],
};
