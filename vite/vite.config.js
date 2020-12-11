export default {

  // our entry file
  entry: 'src/index.js',

  // output dir for production build
  outDir: '../public/dist',

  // emit manifest so PHP can find the hashed files
  emitManifest: true,

  // required to load scripts from custom host
  cors: true,

  // esbuild is faster but creates slight larger files
  // test and choose with you prefer
  minify: 'esbuild', // terser (default) | esbuild
  esbuildTarget: 'es2018',

  // required for in-browser template compilation
  // https://v3.vuejs.org/guide/installation.html#with-a-bundler
  alias: {
    vue: "vue/dist/vue.esm-bundler.js"
  }
}
