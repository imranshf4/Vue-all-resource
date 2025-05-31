<script setup>

import { ref } from 'vue'
const count = ref(0);

defineProps({
  msg: {
    type: String,
    required: true,
  },
})

</script>

<template>
  <div class="greetings">
    <h1 class="green">{{ msg }} + {{ count }}</h1>
    <button @click="count++">Click</button>
  </div>
</template>

<style scoped>

</style>
