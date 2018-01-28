import Vue from 'vue'
import Router from 'vue-router'
import Login from 'components/login/login'
import Adminpage from 'components/adminpage/adminpage'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/admin',
      component: Adminpage
    },
    {
      path: '/admin/login',
      component: Login
    }
  ]
})
