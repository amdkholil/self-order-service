<script setup>
import { ChevronRight } from "lucide-vue-next";
import { cn } from "@/lib/utils";
import { Button } from '@/components/ui/button';
import { useCarousel } from "./useCarousel";

const props = defineProps({
  variant: { type: null, required: false, default: "outline" },
  size: { type: null, required: false, default: "icon" },
  class: { type: null, required: false },
});

const { orientation, canScrollNext, scrollNext } = useCarousel();
</script>

<template>
  <Button
    data-slot="carousel-next"
    :disabled="!canScrollNext"
    :class="
      cn(
        'absolute size-8 rounded-full',
        orientation === 'horizontal'
          ? 'top-1/2 -right-12 -translate-y-1/2'
          : '-bottom-12 left-1/2 -translate-x-1/2 rotate-90',
        props.class,
      )
    "
    :variant="variant"
    :size="size"
    @click="scrollNext"
  >
    <slot>
      <ChevronRight />
      <span class="sr-only">Next Slide</span>
    </slot>
  </Button>
</template>
