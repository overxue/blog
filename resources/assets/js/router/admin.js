import Vue from 'vue'
import Router from 'vue-router'
import Login from 'components/login/login'
import Adminpage from 'components/adminpage/adminpage'
import Main from 'components/main/main'
import Tag from 'components/tag/tag'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/admin',
      component: Adminpage,
      redirect: '/admin/main',
      children: [
        {path: '/admin/main', component: Main},
        {path: '/admin/tag', component: Tag}
      ]
    },
    {
      path: '/admin/login',
      component: Login
    }
  ]
})
