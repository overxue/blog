<template>
  <div id="app">
    <transition name="fade">
      <keep-alive>
        <router-view></router-view>
      </keep-alive>
    </transition>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {}
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
