import Vue from 'vue'
import Router from 'vue-router'
import Homepage from 'components/homepage/homepage'
import Blog from 'components/blog/blog'
import Me from 'components/me/me'
import Test from "components/test/test";

Vue.use(Router)

export default new Router({
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
      path: '/test',
      component: Test
    }
  ]
})
