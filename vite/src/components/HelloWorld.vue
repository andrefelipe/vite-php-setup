<template>
  <img alt="Vue logo" src="../assets/logo.png" height="40" />

  <h1>{{ msg }}</h1>

  <p>
    <a href="https://vitejs.dev/guide" target="_blank">
      Vite Documentation
    </a>
    |
    <a href="https://vuejs.org/guide" target="_blank">Vue 3 Documentation</a>
  </p>

  <button type="button" @click="count++">
    count is: {{ count }}
  </button>
  <p>
    Edit
    <code>components/HelloWorld.vue</code> to test hot module replacement.
  </p>
</template>

<script setup>
import { ref } from 'vue'

defineProps({
  msg: String
})

const count = ref(0)
</script>

<style scoped>
a {
  color: #42b983;
}
</style>
