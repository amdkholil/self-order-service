<script setup>
import { ReceiptText } from 'lucide-vue-next';
import { useCartStore } from '@/store/cart_store';
import { storeToRefs } from 'pinia';

const { cart } = storeToRefs(useCartStore())
</script>

<template>
    <div class="fixed bottom-8 right-8 md:right-32 lg:right-64 xl:right-96">
       <RouterLink to="/cart" class="w-16 h-16 rounded-full bg-primary-500 text-white shadow-xl border border-white flex relative">
        <ReceiptText class="m-auto" stroke-width="1" size="36"/>
        <div class="bg-accent-600 text-white text-xs w-5 h-5 border border-white rounded-full absolute -right-1 -top-0.5 flex">
          <span class="m-auto">{{ cart.length }}</span>
        </div>
       </RouterLink>
     </div>
</template>