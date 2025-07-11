<script setup>

import {
    Drawer,
    DrawerContent,
    DrawerFooter,
    DrawerHeader,
    DrawerTitle,
} from '@/components/ui/drawer'
import {
    NumberField,
    NumberFieldContent,
    NumberFieldDecrement,
    NumberFieldIncrement,
    NumberFieldInput,
} from '@/components/ui/number-field'
import Button from '../ui/button/Button.vue';
import { useMainStore } from '@/store'
import { storeToRefs } from 'pinia';
import { formatPrice } from '@/helper/format_helper';
import {useCartStore} from '@/store/cart_store';
import { ref, watch } from 'vue';

const mainStore = useMainStore()
const cartStore = useCartStore()
const { isDrawerShow, selectedProduct } = storeToRefs(mainStore)
const { cart } = storeToRefs(cartStore)

const qty = ref(1)
const notes = defineModel()

function addToCart(){
    const product = selectedProduct.value
    
    if(cart.value.some(v=> v.id===product.id)){
        const inCart = cart.value.find(v=>v.id===product.id)
        inCart.qty = inCart.qty + qty.value
        inCart.notes = notes.value??inCart.notes
        cartStore.updateCart(product.id, inCart)
    }else{
        product.qty = qty.value
        product.notes = notes.value
        cartStore.addToCart(product)
    }
    isDrawerShow.value=false
}
</script>

<template>
    <Drawer :open="isDrawerShow" @update:open="isDrawerShow = $event" hight="700" class="max-w-xl">
        <DrawerContent>
            <div class="max-h-[60vh] overflow-y-auto ">
                <img :src="selectedProduct.image" class="h-48 sm:60 w-full object-cover" />
                <DrawerHeader class="pb-2">
                    <DrawerTitle>{{ selectedProduct.name }}</DrawerTitle>
                </DrawerHeader>
                <div class="mx-4 text-xs text-gray-500">{{ selectedProduct.description }}</div>
                <textarea 
                name="notes" 
                v-model="notes"
                class="border border-gray-500/50 mx-4 my-2 text-xs py-1 px-1.5 w-72 rounded"
                placeholder="catatan (opsional)"
                rows="2"></textarea>
            </div>
            <DrawerFooter class="pt-3 border-t border-t-gray-500/10 shadow">
                <div class="flex justify-between">
                    <div class="text-accent-600 font-bold my-auto">
                        Rp.{{ formatPrice(selectedProduct.price * qty) }}
                    </div>
                    <div class="w-24 my-auto">
                        <NumberField id="qty" :default-value="1" :min="1" @update:model-value="(v)=>qty=v">
                            <NumberFieldContent>
                                <NumberFieldDecrement />
                                <NumberFieldInput />
                                <NumberFieldIncrement />
                            </NumberFieldContent>
                        </NumberField>
                    </div>
                </div>
                <Button class="mt-1" @click="addToCart()">Tambahkan Pesanan</Button>
            </DrawerFooter>
        </DrawerContent>
    </Drawer>
</template>

<style scoped>

</style>