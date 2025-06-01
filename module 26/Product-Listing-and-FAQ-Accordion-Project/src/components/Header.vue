<template>
  <nav class="bg-white border-b border-gray-200 shadow-sm px-4 py-3">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <!-- Left: Logo or Brand -->
      <div class="text-xl font-bold text-gray-800">
        MyShop
      </div>

      <!-- Right: Cart Icon -->
      <div class="relative">
        <button class="text-gray-600 hover:text-gray-800 focus:outline-none">
          <!-- Heroicon: Shopping Cart -->
          <img src="https://img.icons8.com/?size=100&id=3337&format=png&color=000000" class="w-7 h-7" alt="Cart" />
        </button>
        <!-- Optional: Cart Badge -->
        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full px-1.5 py-0.5">
          {{ cartItems.length ? cartItems.length : 0 }}
        </span>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { computed } from "vue"
import { useCartStore } from "@/data/cart" // Adjust path as needed

const cartStore = useCartStore()
const cartItems = computed(() => cartStore.items)
</script>

<style scoped>
/* Custom styles if needed */
</style>
