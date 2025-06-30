<template>
  <div class="px-6">
    <div class="flex">
      <div class="flex-auto flex">
        <v-icon name="la-ghost-solid" scale="2" animation="float" speed="slow" />
        <span class="my-auto font-bold text-xl ml-1">
          Ghost Caffe
        </span>
      </div>
      <div class="flex-none my-auto relative">
        <RouterLink to="/cart">
          <div class="rounded-full bg-primary w-9 h-9 text-white flex">
            <v-icon name="la-shopping-cart-solid" scale="1.4" class="m-auto" />
          </div>
        </RouterLink>
        <div class="absolute -top-1 -right-1 text-white text-xs h-4 w-4 bg-accent-500 rounded-full flex">
          <span class="m-auto">3</span>
        </div>
      </div>
    </div>
  
    <div class="mt-6 relative">
      <input type="text" class="border border-gray-400 shadow-lg w-full h-9 rounded-full pl-3 pr-8 ring-0 outline-0" />
      <v-icon name="la-search-solid" class="absolute top-2.5 right-2.5" color="gray" />
    </div>
  
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

  <!-- Tab -->
   <div class="mt-6 flex w-full snap-x pl-6 overflow-x-auto">
      <div class="h-12 w-32 border border-gray-300 shadow rounded-xl shrink-0 snap-start mr-3 flex mb-3"
        v-for="category in categories"
        :key="category">
        <div class="m-auto text-sm">
          <img src="" alt="">
          {{ category }}
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


const categories = ['All', 'Chicken', 'Soup', 'Coffee', 'Tea', 'hamburger'];
</script>
