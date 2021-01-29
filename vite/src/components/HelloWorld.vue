<template>
  <h1>Vue {{ msg }}</h1>
  <img alt="Vue logo" src="../assets/logo.png" />
  <button @click="count++">count is: {{ count }}</button>
  <p>Edit <code>components/HelloWorld.vue</code> to test hot module replacement.</p>
</template>

<script>
export default {
  name: 'HelloWorld',

  props: {
    msg: String,
    default: ''
  },

  data() {
    return {
      count: 0
    }
  }
}
</script>
