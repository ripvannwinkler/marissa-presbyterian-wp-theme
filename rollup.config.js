import scss from "rollup-plugin-scss";

export default [
  {
    input: "src/js/app.js",
    output: {
      file: "dist/app.js",
      format: "iife"
    },
    plugins: [
      scss({
        output: "dist/app.css"
      })
    ]
  }
];
