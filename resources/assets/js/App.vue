<template>
  <div id="app">
    <navigation ref="navigation"></navigation>
    <music></music>
    <transition name="fade">
      <keep-alive include="Homepage,Blog,Me">
        <router-view></router-view>
      </keep-alive>
    </transition>
  </div>
</template>

<script type="text/ecmascript-6">
  import Navigation from 'components/navigation/navigation'
  import Music from 'components/music/music'

  export default {
    created() {
      document.addEventListener('visibilitychange', function() {
        document.title = document.hidden ? '出BUG了，快看！':'Blog'
      })
      console.log("一个人到底多无聊\r\n 才会把 console 当成玩具\r\n一个人究竟多堕落\r\n 才会把大好青春荒废在博客上\r\n\r\n\r\n%cfollow me %c https://github.com/overxue","color:red","color:green")
    },
    components: {
      Navigation,
      Music
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  #app
    height: 100%
    overflow:hidden
    .fade-enter-active, .fade-leave-active
      transition: opacity .5s
    .fade-enter, .fade-leave-to
      opacity: 0
</style>
