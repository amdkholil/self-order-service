<script setup>
import { RouterLink } from 'vue-router';
import { useCartStore } from '@/store/cart_store';
import { storeToRefs } from 'pinia';
import { ReceiptText } from 'lucide-vue-next';

const cartStore = useCartStore()

const { cart } = storeToRefs(cartStore)

</script>

<template>
    <div class="flex">
      <div class="flex-auto flex">
        <v-icon name="la-ghost-solid" scale="2" animation="float" color="#f59e0b" speed="slow" />
        <span class="my-auto font-bold text-xl ml-1">
          Ghost Caffe
        </span>
      </div>
      <!-- <div class="flex-none my-auto relative">
        <RouterLink to="/cart">
          <div class="rounded-full bg-primary-500 w-9 h-9 text-white flex">
            <ReceiptText class="m-auto w-5 h-5"/>
          </div>
        </RouterLink>
        <div class="absolute -top-1 -right-1 text-white text-xs h-4 w-4 bg-accent-500 rounded-full flex">
          <span class="m-auto">{{ cart.length }}</span>
        </div>
      </div> -->
    </div>
</template>