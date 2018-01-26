import Vue from 'vue'
import Router from 'vue-router'
import Homepage from 'components/homepage/homepage'
import Blog from 'components/blog/blog'
import Me from 'components/me/me'
import BlogDetail from 'components/blogdetail/blogdetail'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      component: Homepage
    },
    {
      path: '/blog',
      component: Blog
    },
    {
      path: '/me',
      component: Me
    },
    {
      path: '/blog/:id',
      component: BlogDetail
    }
  ]
})
