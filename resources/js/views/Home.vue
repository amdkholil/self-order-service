<template>
  <div class="px-6">

    <!-- Appbar -->
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
  
    <!-- Search form -->
    <div class="mt-6 relative">
      <input type="text" class="border border-gray-400 shadow-lg w-full h-9 rounded-full pl-3 pr-8 ring-0 outline-0" />
      <v-icon name="la-search-solid" class="absolute top-2.5 right-2.5" color="gray" />
    </div>
  
    <!-- Carousel -->
    <div class="mt-6">
      <Carousel>
        <CarouselContent>
          <CarouselItem v-for="i in 4" :key="i">
            <AspectRatio :ratio="16/9">
              <img :src="`https://picsum.photos/id/${i}/400/300`"
                class="object-cover h-full w-full rounded-lg"/>
            </AspectRatio>
          </CarouselItem>
        </CarouselContent>
        <CarouselPrevious class="absolute left-2 top-1/2" />
        <CarouselNext  class="absolute right-2 top-1/2" />
      </Carousel>
    </div>
  </div>

  <!-- Tab Category -->
   <div class="mt-6 flex w-full snap-x overflow-x-auto scroll-pl-6">
      <button :class="`h-12 w-32 border  shadow rounded-xl 
        cursor-pointer shrink-0 snap-start flex mb-3.5 first:ml-6 mr-3 `+
        (category==categorySelected?
        'bg-primary-200 border-primary-500 text-primary-800 font-bold':
        'bg-gray-200 border-primary-200')"
        v-for="(category, i) in categories"
        @click="categorySelected=category"
        :key="i">
        <div class="m-auto text-sm flex">
          <img 
            :src="baseUrl+'/img/category/'+category.toLocaleLowerCase()+'.png'" 
            class="w-6 mr-2 flex-none"
            alt=""/>
            <span class="flex-auto my-auto">
              {{ category }}
            </span>
        </div>
      </button>
   </div>

   <!-- List Menu/Product -->
    <div class="px-6 mt-6 grid grid-cols-2 gap-5">
      <div v-for="(p, i) in products" :key="i"
      class="border border-gray-500 rounded-xl shadow-lg"
      >
      <img :src="baseUrl+'/img/menu/'+p+'.avif'" alt=""
      class="w-full h-32 object-cover rounded-t-xl">
      <div class="p-3">
        {{ p.replace('-', ' ') }}
      </div>
      </div>
    </div>
</template>

<script setup>
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from '@/components/ui/carousel'
import { AspectRatio } from 'reka-ui';
import { ref } from 'vue';
const baseUrl = window.baseUrl

const categories = ['All', 'Chicken', 'Soup', 'Coffee', 'Tea', 'hamburger'];
const categorySelected = ref('All')

const products=[
  'ayam-garlic',
  'bakso',
  'burger',
  'capucino',
  'es-teh',
  'espresso',
  'kebab',
]
</script>
