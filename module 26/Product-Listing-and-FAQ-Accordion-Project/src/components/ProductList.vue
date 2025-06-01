<script setup>
import { ref } from "vue";
import { products as productList } from "../data/product";
import { useCartStore } from "@/data/cart";

const products = ref(productList);

const cartStore = useCartStore() // Initialize store

// Add to cart handler
function addToCart(product) {
  cartStore.addToCart(product);
   localStorage.setItem('cart', JSON.stringify(cartStore.items));
}


</script>

<template>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">
            Product Showcase
        </h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Product Card 1 -->
            <div v-for="product in products" :key="product.id"
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img :src="product.image" alt="Product Name" class="rounded-t-lg w-full h-48 object-cover" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ product.name }}
                        </h5>
                    </a>
                    <p class="mb-2 font-normal text-gray-700 dark:text-gray-400">
                        Price:
                        <span class="font-semibold text-blue-700">
                            <span class="text-red-500 line-through">${{ product.price }}</span>
                            ${{ product.price - (product.price * product.discount) / 100 }}
                        </span>
                    </p>
                    <p class="mb-2 text-sm text-green-600 dark:text-green-400">
                        Discount: {{ product.discount }}%
                    </p>
                    <p v-if="product.inStock" class="mb-4 text-sm font-medium text-green-600">
                        ✅ In Stock
                    </p>
                    <p v-else class="mb-4 text-sm font-medium text-green-600">
                        ❌ Out of Stock
                    </p>
                    <button v-if="product.inStock"
                    @click="addToCart(product)"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Add to Cart
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Add more as needed -->
        </div>
    </div>
</template>

<style scoped></style>
