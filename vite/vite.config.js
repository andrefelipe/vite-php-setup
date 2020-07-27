const cors = require('@koa/cors')

module.exports = {
  emitIndex: false,
  outDir: '../public/dist',

  alias: {
    vue: "vue/dist/vue.esm-bundler.js"
  },

  configureServer: function ({ app }) {
    app.use(cors({ origin: '*' }))
  }
}
