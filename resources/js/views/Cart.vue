<script setup>
import AlertDialog from '@/components/ui/alert-dialog/AlertDialog.vue';
import AlertDialogAction from '@/components/ui/alert-dialog/AlertDialogAction.vue';
import AlertDialogCancel from '@/components/ui/alert-dialog/AlertDialogCancel.vue';
import AlertDialogContent from '@/components/ui/alert-dialog/AlertDialogContent.vue';
import AlertDialogDescription from '@/components/ui/alert-dialog/AlertDialogDescription.vue';
import AlertDialogFooter from '@/components/ui/alert-dialog/AlertDialogFooter.vue';
import AlertDialogHeader from '@/components/ui/alert-dialog/AlertDialogHeader.vue';
import AlertDialogTitle from '@/components/ui/alert-dialog/AlertDialogTitle.vue';
import NumberField from '@/components/ui/number-field/NumberField.vue';
import NumberFieldContent from '@/components/ui/number-field/NumberFieldContent.vue';
import NumberFieldDecrement from '@/components/ui/number-field/NumberFieldDecrement.vue';
import NumberFieldIncrement from '@/components/ui/number-field/NumberFieldIncrement.vue';
import NumberFieldInput from '@/components/ui/number-field/NumberFieldInput.vue';
import { formatPrice } from '@/helper/format_helper';
import { useCartStore } from '@/store/cart_store';
import { ChevronLeft, Minus, Pencil, Plus, Trash } from 'lucide-vue-next';
import { storeToRefs } from 'pinia';
import { computed, onBeforeMount, ref, toRaw } from 'vue';

const cartStore = useCartStore()

const { cart } = storeToRefs(cartStore)

const showDeleteConfirm = ref(false)
const showNoteDialog = ref(false)
const selectedCart = ref()
const notes = defineModel()

function updateQty(c, value) {
    if (value === 0) {
        selectedCart.value = c
        return showDeleteConfirm.value=true
    }
    c.qty = value
    return cartStore.updateCart(c.id, toRaw(c))
}

function deleteC(){
    cartStore.deleteCart(selectedCart.value.id)
    showDeleteConfirm.value=false
    selectedCart.value=null
}

const totalPrice = computed(() => {
    return cart.value.reduce((init, val) => init + (val.price * val.qty), 0)
})

function showNote(c){
    notes.value=c.notes
    selectedCart.value=c
    showNoteDialog.value=true
}

function updateNotes() {
    selectedCart.value.notes = notes.value.trim()===""?null:notes.value.trim()
    cartStore.updateCart(selectedCart.value.id, toRaw(selectedCart.value))
    selectedCart.value=null
    showNoteDialog.value=false
}

onBeforeMount(() => {
    cartStore.loadCart()
})

</script>

<template>
    <div class="relative">
        <div class="py-3 bg-primary-700 text-white border-b flex justify-between px-4">
            <div>
                <RouterLink to="/">
                    <ChevronLeft size="24" />
                </RouterLink>
            </div>
            <div class="font-bold text-white text-lg">
                Daftar Pesanan
            </div>
            <div></div>
        </div>

        <div class="px-2 mt-4">
            <div class="my-2 border rounded-xl flex gap-2 bg-white" v-for="c in cart" key="c.id">
                <img :src="c.image" class="h-28 w-24 object-cover flex-none rounded-l-xl bg-gray-500/50" alt="">
                <div class="p-1.5 sm:p-2  w-full content-between grid">
                    <div>
                        <div class="text-sm font-semibold line-clamp-2">{{ c.name }}</div>
                        <div class="text-xs text-black/90 line-clamp-1">{{ c.description }}</div>
                        <div v-if="c.notes" class="text-xs italic text-gray-500 mt-1 line-clamp-2">
                            {{ c.notes }}
                            <button  @click="showNote(c)" class="ml-1 w-5 h-5 border border-primary-500 rounded">
                                <Pencil size="12" class="inline fill-secondary-700" />
                            </button>
                        </div>
                        <button class=" text-gray-500 border border-gray-400 px-1.5 py-0.5 rounded"
                            @click="showNote(c)"
                            style="font-size: 8pt;" 
                            v-else>
                            <Pencil size="12" class="inline" />
                            tambah catatan
                        </button>
                    </div>
                    <div class="flex justify-between gap-1.5 mt-1 w-full">
                        <div class="text-accent-600 text-sm font-semibold my-auto">Rp.{{ formatPrice(c.qty * c.price) }}
                        </div>
                        <div class="w-16">
                            <NumberField id="qty" :default-value="1" :min="0" :model-value="c.qty"
                                @update:model-value="v => updateQty(c, v)">
                                <NumberFieldContent class="py-0">
                                    <NumberFieldDecrement class="p-2">
                                        <Minus size="12" class="w-3" v-if="c.qty > 1" />
                                        <Trash size="12" v-else color="red" />
                                    </NumberFieldDecrement>
                                    <NumberFieldInput class="text-xs h-7" />
                                    <NumberFieldIncrement class="p-2">
                                        <Plus size="12" />
                                    </NumberFieldIncrement>
                                </NumberFieldContent>
                            </NumberField>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-28"></div>

        <div class="fixed w-full bottom-0 left-0 right-0 flex z-10">
            <div class="m-auto max-w-xl bg-black/50 w-full backdrop-blur flex justify-between p-2"
                style="box-shadow: 0 -2px 5px #00000099;">
                <div class="text-accent-600 my-auto p-3 bg-white rounded font-bold">
                    Rp.{{ formatPrice(totalPrice) }},-
                </div>
                <button class="my-auto px-8 py-3 bg-primary-500 text-white rounded-xl font-bold shadow/50">
                    PESAN
                </button>
            </div>
        </div>
        
        <!-- Delete Alert -->
        <AlertDialog :open="showDeleteConfirm">
            <AlertDialogContent>
                <AlertDialogHeader>
                    <AlertDialogTitle>Hapus pesanan?</AlertDialogTitle>
                    <AlertDialogDescription class="text-xs">
                        anda bisa menambahkan pesanan kembali setelah menghapusnya melalui halaman awal.
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <AlertDialogCancel
                    @click="showDeleteConfirm=false"
                    >Batal</AlertDialogCancel>
                    <AlertDialogAction
                    @click="deleteC"
                     class="bg-red-500">Hapus</AlertDialogAction>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>

        <!-- Notes -->
        <AlertDialog :open="showNoteDialog">
            <AlertDialogContent>
                <AlertDialogHeader>
                    <AlertDialogTitle class="text-base">Catatan</AlertDialogTitle>
                    <AlertDialogDescription class="text-sm">
                        <textarea 
                        class="border border-gray-500/50 w-full py-0.5 px-1.5 rounded"
                        v-model="notes"
                        placeholder="tambahkan catatan"
                        rows="2"></textarea>
                    </AlertDialogDescription>
                </AlertDialogHeader>
                <AlertDialogFooter>
                    <AlertDialogCancel
                    @click="showNoteDialog=false"
                    >Batal</AlertDialogCancel>
                    <AlertDialogAction
                    @click="updateNotes()"
                     class="bg-primary-500">Simpan</AlertDialogAction>
                </AlertDialogFooter>
            </AlertDialogContent>
        </AlertDialog>
    </div>
</template>