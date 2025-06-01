<template>
  <div class="max-w-6xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Your Cart</h1>
    <div v-if="cartItems.length" class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-200 rounded shadow">
        <thead class="bg-gray-100">
          <tr>
            <th class="text-left p-4 border-b">Product</th>
            <th class="text-left p-4 border-b">Quantity</th>
            <th class="text-left p-4 border-b">Price</th>
            <th class="text-left p-4 border-b">Total</th>
            <th class="text-left p-4 border-b">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in cartItems" :key="item.id" class="hover:bg-gray-50">
            <td class="p-4 border-b">{{ item.name }}</td>
            <td class="p-4 border-b flex items-center gap-2">
              <button @click="decreaseQuantity(item)" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300"
                :disabled="item.quantity <= 1">
                -
              </button>
              <span class="px-2">{{ item.quantity }}</span>
              <button @click="increaseQuantity(item)" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">
                +
              </button>
            </td>
            <td class="p-4 border-b">${{ item.price.toFixed(2) - ((item.price * item.discount) / 100) }}</td>
            <td class="p-4 border-b">
              ${{ (item.quantity * item.price).toFixed(2) - ((item.quantity * item.price * item.discount) / 100) }}
            </td>
            <td class="p-4 border-b">
              <button @click="removeItem(index)" class="text-red-600 hover:underline text-sm">
                Remove
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="text-right mt-4 text-lg font-semibold text-gray-800">
        Total: ${{ cartTotal }}
      </div>
    </div>

    <div v-else class="text-gray-600 mt-4">Your cart is empty.</div>
  </div>
</template>

<script setup>
import { useCartStore } from "@/data/cart"
import { computed } from "vue"

const cartStore = useCartStore()
const cartItems = computed(() => cartStore.items)

function removeItem(index) {
  cartStore.removeFromCart(index)
  localStorage.setItem('cart', JSON.stringify(cartStore.items))
}

function increaseQuantity(item) {
  item.quantity++;
  localStorage.setItem('cart', JSON.stringify(cartStore.items))
}

function decreaseQuantity(item) {
  if (item.quantity > 1) {
    item.quantity--;
    localStorage.setItem('cart', JSON.stringify(cartStore.items))
  }
}

const cartTotal = computed(() => {
  return cartStore.items.reduce((total, item) => {
    const discountedPrice = item.price * item.quantity - ((item.price * item.discount) / 100) * item.quantity;
    return total + discountedPrice;
  }, 0);
})

</script>
