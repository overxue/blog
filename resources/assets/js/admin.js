import App from './Admin.vue'
import Vue from 'vue'
import router from './router/admin'
import ElementUI from 'element-ui'

Vue.use(ElementUI)

Vue.config.productionTip = false

const app = new Vue({
    el: '#app',
    router,
    render: (h) => h(App)
});
