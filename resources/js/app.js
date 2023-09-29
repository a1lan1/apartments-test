import axios from 'axios'
import App from './App.vue'
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import 'element-plus/dist/index.css'
import 'element-plus/theme-chalk/dark/css-vars.css'

window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const app = createApp(App)
const pinia = createPinia()

app.use(pinia)
app.mount('#app')
