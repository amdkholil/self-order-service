<script setup>
import { ref } from 'vue';
import { useMainStore } from '@/store';
import { storeToRefs } from 'pinia';

const store = useMainStore()
const { categories, selectedCategory } = storeToRefs(store)
</script>

<template>

  <div class="mt-6 flex w-full snap-x overflow-x-auto scroll-pl-3 sm:scroll-pl-4 md:scroll-pl-6">
    <button :class="`h-12 w-32 border  shadow rounded-lg
        cursor-pointer shrink-0 snap-start flex mb-3.5 first:ml-3 first:sm:ml-4 first:md:ml-6 mr-3 `+
      (null == selectedCategory ?
        'bg-primary-500 border-primary-500 text-white font-bold' :
        'bg-white border-primary-200')" @click="store.setCategory(null)"
      :key="'all'">
      <div class="m-auto text-sm flex">
        <img src="/storage/category/all.png" class="w-6 mr-2 flex-none"
          alt="" />
        <span class="flex-auto my-auto">
          All
        </span>
      </div>
    </button>
    <button :class="`h-12 w-32 border  shadow rounded-lg
        cursor-pointer shrink-0 snap-start flex mb-3.5 first:ml-3 first:sm:ml-4 first:md:ml-6 mr-3 `+
      (category.id == selectedCategory ?
        'bg-primary-500 border-primary-500 text-white font-bold' :
        'bg-white border-primary-200')" v-for="(category, i) in categories" @click="store.setCategory(category.id)"
      :key="i">
      <div class="m-auto text-sm flex">
        <img :src="category.image" class="w-6 mr-2 flex-none"
          alt="" />
        <span class="flex-auto my-auto">
          {{ category.name }}
        </span>
      </div>
    </button>
  </div>
</template>