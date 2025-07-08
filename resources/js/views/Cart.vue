<script setup>
import NumberField from '@/components/ui/number-field/NumberField.vue';
import NumberFieldContent from '@/components/ui/number-field/NumberFieldContent.vue';
import NumberFieldDecrement from '@/components/ui/number-field/NumberFieldDecrement.vue';
import NumberFieldIncrement from '@/components/ui/number-field/NumberFieldIncrement.vue';
import NumberFieldInput from '@/components/ui/number-field/NumberFieldInput.vue';
import { formatPrice } from '@/helper/format_helper';
import { useCartStore } from '@/store/cart_store';
import { Minus } from 'lucide-vue-next';
import { storeToRefs } from 'pinia';
import { onBeforeMount, toRaw } from 'vue';

const cartStore = useCartStore()

const { cart } = storeToRefs(cartStore)

function updateQty(c, value) {
    if(value===0){
        return cartStore.deleteCart(c.id)
    }
    c.qty = value
    return cartStore.updateCart(c.id, toRaw(c))
}

onBeforeMount(() => {
    cartStore.loadCart()
})

</script>

<template>
    <div class="relative">
        <div class="py-3 bg-primary-700 text-white border-b flex justify-between px-4">
            <div>
                <RouterLink to="/">
                    <v-icon name="la-chevron-left-solid" />
                </RouterLink>
            </div>
            <div class="font-bold text-white text-lg">
                Daftar Pesanan
            </div>
            <div></div>
        </div>

        <div class="px-4 mt-4">
            <div class="my-2 border rounded-xl flex gap-2 bg-white" v-for="c in cart" key="c.id">
                <img :src="c.image" class="h-24 w-24 object-cover flex-none rounded-l-xl bg-" alt="">
                <div class="p-1.5 sm:p-2">
                    <div class="font-semibold">{{ c.name }}</div>
                    <div class="text-xs text-black/70 font-light line-clamp-1">{{ c.description }}</div>
                    <div class="flex justify-between gap-1.5 mt-1">
                        <div class="text-accent-600 text-sm font-semibold">Rp.{{ formatPrice(c.qty * c.price) }}</div>
                        <div class="w-24 text">
                            <NumberField id="qty" :default-value="1" :min="0" :model-value="c.qty"
                                @update:model-value="v => updateQty(c, v)">
                                <NumberFieldContent>
                                    <NumberFieldDecrement>
                                        <Minus class="h-4 w-4" v-if="c.qty > 1" />
                                        <v-icon name="la-trash-alt" color="red" v-else />
                                    </NumberFieldDecrement>
                                    <NumberFieldInput />
                                    <NumberFieldIncrement />
                                </NumberFieldContent>
                            </NumberField>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-28"></div>

        <div class="fixed w-full bottom-0 left-0 right-0 flex z-10">
            <div class="m-auto max-w-xl bg-black/50 w-full backdrop-blur flex justify-between p-2" style="box-shadow: 0 -2px 5px #00000099;">
                <div class="text-accent-600 my-auto p-3 bg-white rounded font-bold">
                    Rp.{{ formatPrice(500000) }},-
                </div>
                    <button class="my-auto px-6 py-3 bg-primary-500 text-white rounded-xl font-bold shadow/50">
                        PESAN
                    </button>
            </div>
        </div>
    </div>
</template>