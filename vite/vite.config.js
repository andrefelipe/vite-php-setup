module.exports = {
  emitIndex: true,
  outDir: '../public/dist',

  proxy: {
    // '/src': {
    //   target: 'http://localhost:3000',
    //   toProxy: true
    // },
    // '/vite': {
    //   target: 'http://localhost:3000',
    //   ws: true
    // },
    // '/@modules': {
    //   target: 'http://localhost:3000',
    //   ws: true
    // },

    '/': {
      target: 'http://vite-php-setup.test',
      changeOrigin: true
    }
  }
}
