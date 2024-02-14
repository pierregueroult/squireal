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
      boxShadow: {
        pop: "4px 6px 0px 0px #000000",
      },
      fontFamily: {
        title: ["Joygist", "Arial", "sans-serif"],
        main: ["Inter", "Arial", "sans-serif"],
      },
      fontSize: {
        "4.5xl": "2.5rem",
      },
    },
  },
  plugins: [],
};
