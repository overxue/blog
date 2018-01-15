<template>
  <div id="app">
    <navigation></navigation>
    <router-view></router-view>
  </div>
</template>

<script type="text/ecmascript-6">
  import Navigation from 'components/navigation/navigation'

  export default {
    components: {
      Navigation
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  #app
    height: 100%
</style>
