/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.js",
  ],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        primary: "#e53734",
        "background-light": "#f8f6f6",
        "background-dark": "#211111",
      },
      fontFamily: {
        display: ["'Public Sans'", "system-ui", "sans-serif"],
      },
    },
  },
  plugins: [],
};
