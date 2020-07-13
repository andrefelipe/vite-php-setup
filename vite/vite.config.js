// const prefresh = require('@prefresh/vite')
const cors = require('@koa/cors')

module.exports = {
  emitIndex: false,
  outDir: '../public/dist',

  // plugins: [prefresh()],

  configureServer: function ({ app }) {
    app.use(cors({ origin: '*' }))
  }
}
