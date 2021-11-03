// https://vitejs.dev/config/#build-polyfillmodulepreload
// using workaround https://github.com/vitejs/vite/issues/4786
if (import.meta.env.MODE !== 'development') {
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
// Note our lookup is a wrapping div with .vue-app class
import HelloWorld from './components/HelloWorld.vue'

for (const el of document.getElementsByClassName('vue-app')) {

  createApp({
    template: el.innerHTML,
    components: {
      HelloWorld
      // add here all components that should be available to in-browser template compilation
    }
  }).mount(el)

}
