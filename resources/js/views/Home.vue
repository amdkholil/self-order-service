<template>
  <div class="relative">
    <div class="px-3 sm:px-4 md:px-6 py-2">
  
      <!-- Appbar -->
       <AppBar/>
  
      <!-- Search form -->
       <Search/>
  
      <!-- Carousel -->
      <Carousel/>
      
    </div>
  
    <!-- Tab Category -->
     <Category/>
  
    <!-- List Menu/Product -->
    <div class="px-3 sm:px-4 md:px-6 mt-3 grid grid-cols-2 gap-2 md:gap-3 lg:gap-4">
      <ProductCard v-for="(p, i) in filteredMenu" :key="i" :name="ucWords(p.name)" :image="p.image" :description="p.description"
        :price="p.price" @tambah="openDrawer(p)" />
    </div>

    <!-- floating action button -->
     <Fab/>
  </div>

  <AddToCart/>
  
</template>

<script setup>
import ProductCard from '@/components/home/ProductCard.vue';
import { useMainStore } from '@/store'
import { useCartStore } from '@/store/cart_store'
import { storeToRefs } from 'pinia';
import Carousel from '@/components/home/Carousel.vue';
import AppBar from '@/components/global/AppBar.vue';
import Search from '@/components/home/Search.vue';
import Category from '@/components/home/Category.vue';
import { onMounted } from 'vue';
import AddToCart from '@/components/home/AddToCart.vue';
import Fab from '@/components/home/Fab.vue';

const mainStore = useMainStore()
const cartStore = useCartStore()
const { isDrawerShow, selectedProduct, filteredMenu } = storeToRefs(mainStore)


let i = 1;
function openDrawer(product) {
  i = i+1
  isDrawerShow.value = true
  selectedProduct.value = product
}

function ucWords(words) {
  if(words==null) return
  return words.split(' ').map(word =>{
    return word.charAt(0).toUpperCase() + word.slice(1)
    }).join(' ')
}

onMounted(()=>{
  mainStore.init()
  cartStore.loadCart()
})

</script>
