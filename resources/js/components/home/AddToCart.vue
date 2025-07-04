<script setup>

import {
    Drawer,
    DrawerContent,
    DrawerFooter,
    DrawerHeader,
    DrawerTitle,
} from '@/components/ui/drawer'
import {
    NumberField,
    NumberFieldContent,
    NumberFieldDecrement,
    NumberFieldIncrement,
    NumberFieldInput,
} from '@/components/ui/number-field'
import Button from '../ui/button/Button.vue';
import { useMainStore } from '@/store'
import { storeToRefs } from 'pinia';
import { formatPrice } from '@/helper/format_helper';

const mainStore = useMainStore()
const { isDrawerShow, selectedProduct } = storeToRefs(mainStore)

</script>

<template>
    <Drawer :open="isDrawerShow" @update:open="isDrawerShow = $event" hight="700">
        <DrawerContent>
            <img :src="selectedProduct.image" class="h-48 sm:60 w-full object-cover" />
            <DrawerHeader class="pb-2">
                <DrawerTitle>{{ selectedProduct.name }}</DrawerTitle>
            </DrawerHeader>
            <div class="overflow-y-auto mx-4 text-xs text-gray-500">{{ selectedProduct.description }}</div>
            <DrawerFooter class="pt-3">
                <div class="flex justify-between">
                    <div class="text-accent-600 font-bold my-auto">
                        Rp.{{ formatPrice(selectedProduct.price) }}
                    </div>
                    <div class="w-32 my-auto">
                        <NumberField id="age" :default-value="1" :min="1">
                            <NumberFieldContent>
                                <NumberFieldDecrement />
                                <NumberFieldInput />
                                <NumberFieldIncrement />
                            </NumberFieldContent>
                        </NumberField>
                    </div>
                </div>
                <Button class="mt-1.5">Tambahkan Pesanan</Button>
            </DrawerFooter>
        </DrawerContent>
    </Drawer>
</template>