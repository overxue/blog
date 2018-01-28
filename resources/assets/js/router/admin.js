import Vue from 'vue'
import Router from 'vue-router'
import Login from 'components/login/login'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/admin/login',
      component: Login
    }
  ]
})
