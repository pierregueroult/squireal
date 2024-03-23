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
        popdarkgreen: "4px 6px 0px 0px #297265",
      },
      fontFamily: {
        title: ["Joygist", "Arial", "sans-serif"],
        main: ["Raleway", "Arial", "sans-serif"],
      },
      fontSize: {
        "4.5xl": "2.5rem",
      },
      width: {
        "near-full": "95%",
      },
      maxWidth: {
        128: "32rem",
      },
      height: {
        "100vh": "100vh",
      },
      lineHeight: {
        12: "3rem",
        13: "3.25rem",
      },
      borderRadius: {
        "5xl": "3rem",
      },
      aspectRatio: {
        threequarters: "3/4",
        fourthirds: "4/3",
      },
    },
  },
  plugins: [],
};
