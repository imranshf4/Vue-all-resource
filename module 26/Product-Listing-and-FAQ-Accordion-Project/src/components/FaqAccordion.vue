<script setup>
import { faqs as faqList } from '@/data/faqs';
import { ref } from 'vue';

const faqs = ref(faqList);
const activeId = ref(null);

function toggle(id){
    activeId.value = activeId.value === id ? null : id;
}
</script>

<template>
  <div class="max-w-4xl mx-auto my-12 px-6 font-sans">
    <h2 class="text-3xl font-bold text-center mb-8 dark:text-white-800">
      Frequently Asked Questions
    </h2>

    <!-- FAQ Item -->
    <div
      v-for="faq in faqs"
      :key="faq.id"
      class="bg-white rounded-xl shadow-md mb-4 overflow-hidden transition-all duration-300"
    >
      <div
         @click="toggle(faq.id)"
        class="flex justify-between items-center px-6 py-4 cursor-pointer hover:bg-gray-50 transition-colors"
      >
        <h3 class="text-lg font-semibold text-gray-800">
          {{  faq.question }}
        </h3>
        <div
          class="w-8 h-8 flex items-center justify-center pb-1 rounded-full bg-blue-100 text-blue-600 text-2xl font-extrabold leading-none"
        >
          {{ activeId === faq.id ? "-" : "+" }}
        </div>
      </div>

      <div v-if="activeId === faq.id" class="px-6 pb-4 text-gray-600">
        <p class="pt-2 leading-relaxed">
          {{ faq.answer }}
        </p>
      </div>
      <!-- Item grouping with template element -->
      <!-- <template v-if="activeId === faq.id">
        <h1>Demo 1</h1>
        <h2>demo 2</h2>
      </template> -->
    </div>
  </div>
</template>

<style lang="">
    
</style>