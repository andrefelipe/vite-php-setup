const cors = require('@koa/cors')
import outputManifest from 'rollup-plugin-output-manifest'

export default {

  // our output dir for production build
  outDir: '../public/dist',

  // output our manifest
  rollupInputOptions: {
    plugins: [outputManifest({
      outputPath: '../public/dist/_assets',
      filter: a => !!a
    })]
  },

  // we don't need to output the index.html
  emitIndex: false,

  // required for in-browser template compilation
  // https://v3.vuejs.org/guide/installation.html#with-a-bundler
  alias: {
    vue: "vue/dist/vue.esm-bundler.js"
  },

  // required to load scripts from localhost
  configureServer: ({ app }) => {
    app.use(cors({ origin: '*' }))
  }
}
