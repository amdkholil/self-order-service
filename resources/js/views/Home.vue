<template>
  <div class="flex">
    <div class="flex-auto flex">
      <v-icon name="la-ghost-solid" scale="2" animation="float" speed="slow" /> 
      <span class="my-auto font-bold text-xl ml-1">
        Ghost Cafe
      </span>
    </div>
    <div class="flex-none my-auto">
      <RouterLink to="/cart" class="rounded-full bg-primary w-">
        <v-icon name="la-shopping-cart-solid" scale="1.5"/>
      </RouterLink>
    </div>
  </div>
</template>

<script setup>
</script>
