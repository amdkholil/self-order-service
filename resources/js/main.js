import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { createPinia } from 'pinia'
import { addIcons, OhVueIcon } from 'oh-vue-icons'
import * as LineAwesomeIcons from 'oh-vue-icons/icons/la'
import VueSimpleAlert from 'vue3-simple-alert'

const la = Object.values(LineAwesomeIcons)
addIcons(...la)

const app = createApp(App)
app.use(createPinia())
app.use(router)
app.component('v-icon', OhVueIcon)
app.use(VueSimpleAlert)
app.mount('#app')

