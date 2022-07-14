// https://vitejs.dev/config/#build-polyfillmodulepreload
import 'vite/modulepreload-polyfill'

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
const modules = import.meta.glob('./components/*.vue', { eager: true })
const components = {}
for (const path in modules) {
  components[modules[path].default.__name] = modules[path].default
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
