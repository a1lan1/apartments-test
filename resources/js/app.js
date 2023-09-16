import axios from 'axios'
import App from './App.vue'
import { createApp } from 'vue'

window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const app = createApp(App)

app.mount('#app')
