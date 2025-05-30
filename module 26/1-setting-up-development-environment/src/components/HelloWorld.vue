<script setup>
import { ref } from 'vue';

const text = ref("hello world");

function changeText() {
  text.value = "Good by world";
}

const user = {
  name: 'Imran',
  age: 25,
}

</script>

<template>
  <h1>{{ text }}</h1>
  <button v-on:click="changeText">Submit</button>
  <h1>{{ user.name }} - {{ user.age }}</h1>
</template>

<style scoped></style>
