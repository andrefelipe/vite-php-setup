module.exports = {
  emitIndex: true,
  outDir: '../public/dist',

  proxy: {
    '/src': {
      target: 'http://localhost:3000',
    },
    '/vite': {
      target: 'http://localhost:3000',
    },
    '/@modules': {
      target: 'http://localhost:3000',
    },
    '/': {
      target: 'http://vite-php-setup.test',
      changeOrigin: true
    }
  }
}
