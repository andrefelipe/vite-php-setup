// https://vitejs.dev/config/#build-polyfillmodulepreload
// using workaround https://github.com/vitejs/vite/issues/4786
/* eslint-disable import/first */
if (import.meta.env.MODE !== 'development') {
  // @ts-expect-error
  import('vite/modulepreload-polyfill')
}

// Styles
import './styles'

// Vue
import { createApp } from 'vue'

// If you are build a SPA with a single <div id="app"></div> entry you would:
// import App from './App.vue'
// createApp(App).mount('#app')

// The example here is to have multiple Vue apps sprinkled throughout your page
// So we would instantiate any known components by their own


// First let's load all components that should be available to in-browser template compilation

// Example of how to import **all** components
// https://dev.to/jakedohm_34/auto-registering-all-your-components-in-vue-3-with-vite-4884

const modules = import.meta.globEager('./components/*.vue')
const components = {}
for (const path in modules) {
  const name = path
    .split('/')
    .pop()
    .replace(/\.\w+$/, '')

  components[name] = modules[path].default
}

// if importing all is too much you can always do it manually
// import HelloWorld from './components/HelloWorld.vue'
// const components = {
//   HelloWorld,
// }

// instantiate the Vue apps
// Note our lookup is a wrapping div with .vue-app class

for (const el of document.getElementsByClassName('vue-app')) {
  createApp({
    template: el.innerHTML,
    components
  }).mount(el)
}
