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


const count = ref(0)
</script>

<template>
  <h1>{{ text }}</h1>
  <button v-on:click="changeText">Submit</button>
  <h1>{{ user.name }} - {{ user.age }} - {{ count }}</h1>
   <button @click="count++">click </button>
   <button v-if="count !== 0" @click="count--">click </button>
</template>

<style scoped></style>
