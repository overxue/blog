import App from './Admin.vue'
import Vue from 'vue'
import router from './router/admin'
import ElementUI from 'element-ui'

Vue.use(ElementUI)

Vue.config.productionTip = false

router.beforeEach((to, from, next) => {
  if(!localStorage.getItem('token') && to.path != '/admin/login') {
    next({ path: '/admin/login' })
  } else {
    next()
  }
})

const app = new Vue({
    el: '#app',
    router,
    render: (h) => h(App)
});
