// View your website at your own local server
// for example http://vite-php-setup.test

// http://localhost:3000 is serving Vite on development
// but accessing it directly will be empty

// IMPORTANT image urls in CSS works fine
// BUT you need to create a symlink on dev server to map this folder during dev
// on production everything will work just fine:
// ln -s {path_to_project}/src/assets {path_to_public_html}/assets

import vue from '@vitejs/plugin-vue'
import liveReload from 'vite-plugin-live-reload'
const { resolve } = require('path')


// https://vitejs.dev/config
export default {

  plugins: [
    vue(),
    liveReload(__dirname+'/(app|config|views)/**/*.php')
    // edit according to your source code
  ],

  // config
  root: 'src',
  base: process.env.APP_ENV === 'development'
    ? '/'
    : '/dist/',

  build: {
    // output dir for production build
    outDir: resolve(__dirname, '../public/dist'),
    emptyOutDir: true,

    // emit manifest so PHP can find the hashed files
    manifest: true,

    // esbuild target
    target: 'es2018',

    // our entry
    rollupOptions: {
      input: '/main.js'
    }
  },

  server: {
    // required to load scripts from custom host
    cors: true,

    // we need a strict port to match on PHP side
    strictPort: true,
    port: 3000
  },

  // required for in-browser template compilation
  // https://v3.vuejs.org/guide/installation.html#with-a-bundler
  alias: {
    vue: 'vue/dist/vue.esm-bundler.js'
  },
}
