<script setup>
import NumberField from '@/components/ui/number-field/NumberField.vue';
import NumberFieldContent from '@/components/ui/number-field/NumberFieldContent.vue';
import NumberFieldDecrement from '@/components/ui/number-field/NumberFieldDecrement.vue';
import NumberFieldIncrement from '@/components/ui/number-field/NumberFieldIncrement.vue';
import NumberFieldInput from '@/components/ui/number-field/NumberFieldInput.vue';
import { formatPrice } from '@/helper/format_helper';
import { useCartStore } from '@/store/cart_store';
import { storeToRefs } from 'pinia';
import { onBeforeMount, toRaw } from 'vue';

const cartStore = useCartStore()

const { cart } = storeToRefs(cartStore)

function updateQty(c, value) {
    c.qty = value
    cartStore.updateCart(c.id, toRaw(c))
}

function trash(id, c) {
    if(c.qty===1){
        cartStore.deleteCart(id)
    }
}

onBeforeMount(() => {
    cartStore.loadCart()
})

</script>

<template>
    <div>
        <div class="h-11 border-b flex justify-between px-4">
            <div>
                <RouterLink to="/">
                    <v-icon name="la-chevron-left-solid" />
                </RouterLink>
            </div>
            <div class="font-bold text-gray-700 text-lg">
                Daftar Pesanan
            </div>
            <div></div>
        </div>

        <div class="px-4">
            <div class="my-3 border rounded-xl flex gap-2 bg-white" v-for="c in cart" key="c.id">
                <img :src="c.image" class="h-24 w-24 object-cover flex-none rounded-l-xl" alt="">
                <div class="p-1.5 sm:p-2">
                    <div class="font-semibold">{{ c.name }}</div>
                    <div class="text-xs text-black/70 font-light line-clamp-1">{{ c.description }}</div>
                    <div class="flex justify-between gap-1.5 mt-1">
                        <div class="text-accent-600">Rp.{{ formatPrice(c.qty * c.price) }}</div>
                        <div class="w-24 text">
                            <NumberField id="qty" :default-value="1" :min="1" :model-value="c.qty"
                                @update:model-value="v => updateQty(c, v)">
                                <NumberFieldContent>
                                    <NumberFieldDecrement v-if="c.qty > 1" />
                                    <button
                                        class="absolute top-1/2 -translate-y-1/2 left-0 p-3 disabled:cursor-not-allowed disabled:opacity-20"
                                        @click="trash(c.id, c)" v-else>
                                        <v-icon name="la-trash-alt" />
                                    </button>
                                    <NumberFieldInput />
                                    <NumberFieldIncrement />
                                </NumberFieldContent>
                            </NumberField>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>