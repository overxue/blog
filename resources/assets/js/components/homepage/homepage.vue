<template>
  <div class="homepage">
    <div id="particles"></div>
  </div>
</template>

<script type="text/ecmascript-6">
  import particles from 'particles.js'

  export default {
    mounted() {
      particlesJS.load('particles', '/particles/particles.json')
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  .homepage
    position: relative
    height: 100vh
    overflow: hidden
    #particles
      position: absolute
      width: 100%
      height: 100%
</style>
