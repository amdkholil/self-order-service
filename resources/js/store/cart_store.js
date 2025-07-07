
import { addCart, getAllCart, rmCart, update } from '@/db_cart'
import { defineStore } from 'pinia'
import { ref, toRaw } from 'vue'

export const useCartStore = defineStore('cartStore', () => {
    const cart = ref([])

    async function loadCart() {
        cart.value = await getAllCart()
        console.log(toRaw(cart.value));
        
    }

    async function addToCart(product) {
        await addCart(toRaw(product))
        await loadCart()
    }

    async function deleteCart(id) {
        await rmCart(id)
        await loadCart()
    }

    async function updateCart(id, value){
        await update(id, value)
        await loadCart()
    }

    return {
        cart,
        loadCart,
        addToCart,
        deleteCart,
        updateCart,
    }
})