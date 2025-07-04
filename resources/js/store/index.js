import axios from 'axios'
import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useMainStore = defineStore('main', ()=>{
    const isDrawerShow = ref(false)
    const selectedProduct = ref({})
    const cart = ref([])
    const menus = ref([])
    const filteredMenu = ref({})
    const categories = ref([])
    const selectedCategory = ref(null)
    const tables = ref([])

    function getMenus(){
        axios.get('/api/menus?per_page=50')
        .then(resp=>{
            menus.value = resp.data.data
            filteredMenu.value = menus.value
        })
        .catch(err=>{
            console.log('error getting menu', err)
        })
    }

    function getCategories(){
        axios.get('/api/categories?per_page=20')
        .then(resp=>{
            categories.value = resp.data.data
        })
        .catch(err=>{
            console.log('error getting categories', err)
        })
    }

    function getTables(){
        axios.get('/api/d-tables?per_page=50')
        .then(resp=>{
            tables.value = resp.data.data
        })
        .catch(err=>{
            console.log('error getting tables', err)
        })
    }

    function setCategory(id){
        filteredMenu.value = id==null? menus.value: menus.value.filter(menu=> menu.category_id==id)
        selectedCategory.value = id
    }

    function init(){
        getMenus()
        getCategories()
        getTables()
        
        setInterval(()=>{
            getMenus()
            getCategories()
            getTables()
        }, 120000)
    }

    return {
        isDrawerShow,
        selectedProduct,
        cart,
        menus,
        filteredMenu,
        categories,
        selectedCategory,
        setCategory,
        tables,
        init
    }

})
