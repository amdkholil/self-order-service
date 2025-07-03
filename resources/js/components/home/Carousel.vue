<script setup>
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious,
} from '@/components/ui/carousel'
import { AspectRatio } from 'reka-ui';

</script>

<template>
    <div class="mt-6">
      <Carousel>
        <CarouselContent>
          <CarouselItem v-for="i in 4" :key="i">
            <AspectRatio :ratio="16 / 9">
              <img :src="`https://picsum.photos/id/${i}/400/300`" class="object-cover h-full w-full rounded-lg" />
            </AspectRatio>
          </CarouselItem>
        </CarouselContent>
        <CarouselPrevious class="absolute left-2 top-1/2" />
        <CarouselNext class="absolute right-2 top-1/2" />
      </Carousel>
    </div>
</template>