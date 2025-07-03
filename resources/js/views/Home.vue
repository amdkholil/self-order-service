<template>
  <div class="px-3 sm:px-4 md:px-6">

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
    <ProductCard v-for="(p, i) in products" :key="i" :name="ucWords(p.name)" :image="p.image" :description="p.description"
      :price="p.price" @tambah="openDrawer(p)" />
  </div>

  <AddToCart/>
  
</template>

<script setup>
import ProductCard from '@/components/home/ProductCard.vue';
import { useMainStore } from '@/store'
import { storeToRefs } from 'pinia';
import Carousel from '@/components/home/Carousel.vue';
import AppBar from '@/components/global/AppBar.vue';
import Search from '@/components/home/Search.vue';
import Category from '@/components/home/Category.vue';
import { watch } from 'vue';
import AddToCart from '@/components/home/AddToCart.vue';

const baseUrl = window.baseUrl
const mainStore = useMainStore()
const { isDrawerShow, selectedProduct } = storeToRefs(mainStore)


let i = 1;
function openDrawer(product) {
  console.log(i)
  i = i+1
  isDrawerShow.value = true
  selectedProduct.value = product
}

watch(isDrawerShow,(x)=>{
  console.log(x);
  
})

function ucWords(words) {
  return words.split(' ').map(word =>{
    return word.charAt(0).toUpperCase() + word.slice(1)
    }).join(' ')
}

const products = [
  {
    "name": "Indomie telor",
    "description": "Do amet irure irure duis proident cillum. Ut sint anim nulla voluptate nisi sunt adipisicing. Dolor quis duis commodo est. Culpa labore laborum nostrud enim consequat adipisicing elit magna et amet quis sint non.",
    "price": "Rp. 15.000",
    "image": baseUrl + "/img/menu/indomie-telor.avif"
  },
  {
    "name": "Bakso",
    "description": "Dolore fugiat et Lorem nostrud ex excepteur ut minim exercitation non pariatur enim. Laboris sunt aliquip enim quis. Quis reprehenderit occaecat qui Lorem esse. Excepteur ullamco mollit est fugiat ad et. Ex amet culpa tempor qui anim dolore cupidatat. Deserunt commodo aliquip labore fugiat pariatur officia proident et nisi esse occaecat. Aliquip dolore sit veniam eu.",
    "price": "Rp. 25.000",
    "image": baseUrl + "/img/menu/bakso.avif"
  },
  {
    "name": "Mie Ayam",
    "description": "Mollit nisi nulla deserunt exercitation. Voluptate officia mollit laboris sunt aliquip elit non voluptate aute ut voluptate velit eiusmod. Minim exercitation in cupidatat sint esse. Ea esse adipisicing voluptate exercitation consequat. Irure voluptate officia reprehenderit minim consectetur ut elit est ex dolor excepteur est. Esse non irure veniam in consectetur. Culpa laborum laborum ad sunt fugiat eu laborum ipsum nisi nulla non.",
    "price": "Rp. 27.000",
    "image": baseUrl + "/img/menu/mie-ayam.avif"
  },
  {
    "name": "Mie Goreng",
    "description": "Nostrud deserunt ex dolor esse aute in et velit nisi est velit excepteur magna. Reprehenderit pariatur eu deserunt irure amet sunt sit exercitation nulla nostrud. In ex officia ut esse ea. Est dolor sunt aute dolor aute proident nostrud nostrud minim nisi.",
    "price": "Rp. 20.000",
    "image": baseUrl + "/img/menu/mie-goreng.avif"
  },
  {
    "name": "Soto Ayam",
    "description": "Adipisicing id minim proident elit irure enim magna quis velit laborum. Sit non adipisicing id elit tempor nisi enim incididunt nostrud aliqua consequat. Nostrud non aliquip ea ut proident.",
    "price": "Rp. 25.000",
    "image": baseUrl + "/img/menu/soto-ayam.avif"
  },
  {
    "name": "Sop Iga",
    "description": "Officia ipsum proident pariatur id cillum qui non duis est consequat et. Minim in laborum voluptate in velit cillum ex elit. Ea ut minim consectetur commodo ea dolore amet reprehenderit id tempor ea aliquip excepteur ipsum. Consequat laborum non ullamco ex Lorem nisi culpa.",
    "price": "Rp. 30.000",
    "image": baseUrl + "/img/menu/sop-iga.avif"
  },
]
</script>
