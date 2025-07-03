import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useMainStore = defineStore('main', ()=>{
    const isDrawerShow = ref(false)
    const selectedProduct = ref({})
    const cart = ref([])


    return {
        isDrawerShow,
        selectedProduct,
        cart,
    }

})
