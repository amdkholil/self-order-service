<script setup>
import { ref } from 'vue';

const baseUrl = window.baseUrl
const categories = ['All', 'Chicken', 'Soup', 'Coffee', 'Tea', 'hamburger'];
const categorySelected = ref('All')
</script>

<template>

  <div class="mt-6 flex w-full snap-x overflow-x-auto scroll-pl-3 sm:scroll-pl-4 md:scroll-pl-6">
    <button :class="`h-12 w-32 border  shadow rounded-xl 
        cursor-pointer shrink-0 snap-start flex mb-3.5 first:ml-3 first:sm:ml-4 first:md:ml-6 mr-3 `+
      (category == categorySelected ?
        'bg-primary-500 border-primary-500 text-white font-bold' :
        'bg-white border-primary-200')" v-for="(category, i) in categories" @click="categorySelected = category"
      :key="i">
      <div class="m-auto text-sm flex">
        <img :src="baseUrl + '/img/category/' + category.toLocaleLowerCase() + '.png'" class="w-6 mr-2 flex-none"
          alt="" />
        <span class="flex-auto my-auto">
          {{ category }}
        </span>
      </div>
    </button>
  </div>
</template>