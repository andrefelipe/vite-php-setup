// View your website at your own local server
// for example http://vite-php-setup.test

// http://localhost:5133 is serving Vite on development
// but accessing it directly will be empty
// TIP: consider changing the port for each project, see below

// Update the server config below accordingly

// IMPORTANT image urls in CSS works fine
// BUT you need to create a symlink on dev server to map this folder during dev:
// ln -s {path_to_project_source}/src/assets {path_to_public_html}/assets
// on production everything will work just fine
// (this happens because our Vite code is outside the server public access,
// if it were, we could use https://vitejs.dev/config/server-options.html#server-origin)

// more info:
// https://vite.dev/guide/backend-integration.html

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import liveReload from 'vite-plugin-live-reload'
import { resolve } from 'node:path'

// https://vitejs.dev/config/
export default defineConfig({

  plugins: [
    vue(),
    liveReload([
      // edit live reload paths according to your source code
      // for example:
      __dirname + '/(app|config|views)/**/*.php',
      // using this for our example:
      __dirname + '/../public/*.php',
    ]),
  ],

  // config
  root: 'src',
  base: process.env.APP_ENV === 'development'
    ? '/'
    : '/dist/',

  build: {
    // output dir for production build
    outDir: '../../public/dist',
    emptyOutDir: true,

    // emit manifest so PHP can find the hashed files
    manifest: true,

    // our entry
    rollupOptions: {
      input: resolve(__dirname, 'src/main.js'),
      output: {
        manualChunks(id) {
          // all third-party code will be in vendor chunk
          if (id.includes('node_modules')) {
            return 'vendor'
          }
          // example on how to create another chunk
          // if (id.includes('src/'components')) {
          //   return 'components'
          // }
          // console.log(id)
        },
      },
    }
  },

  server: {
    // we need a strict port to match on PHP side
    // change freely, but update on PHP to match the same port
    // tip: choose a different port per project to run them at the same time
    strictPort: true,
    port: 5133,
    cors: {
      origin: 'http://vite-php-setup.test',
    }
  },

  // required for in-browser template compilation
  // https://vuejs.org/guide/scaling-up/tooling.html#note-on-in-browser-template-compilation
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm-bundler.js'
    }
  }
})
