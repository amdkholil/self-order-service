<script setup>
import { Button } from '../ui/button';
import { formatPrice } from '@/helper/format_helper';
const { image, name, description, price } = defineProps(['image', 'name', 'description', 'price'])

</script>

<template>
    <div class="border border-gray-400 rounded-xl shadow-lg bg-white">
        <img :src="image" alt="" class="w-full h-32 sm:h-36 md:h-40 object-cover rounded-t-xl">
        <div class="p-3 grid grid-cols-1 gap-1.5">
            <div class="font-semibold text-sm">
                {{ name }}
            </div>
            <div class="line-clamp-2 text-xs text-secondary-500">
                {{ description }}
            </div>
            <div class="flex justify-between">
                <div class="text-accent-500 text-shadow-secondary-300 font-semibold my-auto text-xs sm:text-sm">
                    <span class="font-light" style="font-size: 7pt;">Rp.</span>{{ formatPrice(price) }}
                </div>
                <div>
                    <Button class="px-2 h-7 text-xs" @click="$emit('tambah')">
                        Tambah
                    </Button>
                </div>
            </div>
        </div>
    </div>
</template>