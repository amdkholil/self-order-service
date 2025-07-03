<script setup>
import { RouterLink } from 'vue-router';

</script>

<template>
    <div class="flex">
      <div class="flex-auto flex">
        <v-icon name="la-ghost-solid" scale="2" animation="float" color="#f59e0b" speed="slow" />
        <span class="my-auto font-bold text-xl ml-1">
          Ghost Caffe
        </span>
      </div>
      <div class="flex-none my-auto relative">
        <RouterLink to="/cart">
          <div class="rounded-full bg-primary-500 w-9 h-9 text-white flex">
            <v-icon name="la-shopping-cart-solid" scale="1.4" class="m-auto" />
          </div>
        </RouterLink>
        <div class="absolute -top-1 -right-1 text-white text-xs h-4 w-4 bg-accent-500 rounded-full flex">
          <span class="m-auto">3</span>
        </div>
      </div>
    </div>
</template>