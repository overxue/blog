<template>
  <div class="homepage">
    <opening></opening>
    <div id="particles"></div>
    <div class="content">
      <div class="avatar">
        <img width="120" height="120" src="./avatar.jpg" class="avatar-item">
      </div>
      <h1 class="description">Nothing is impossible.</h1>
      <ul class="tab">
        <li class="tab-item">
          <router-link class="tab-link" to="/blog">Blog</router-link>
        </li>
        <li class="tab-item">
          <a class="tab-link" href="https://weibo.com/3090183841/profile?topnav=1&wvr=6&is_all=1" target="_blank">Weibo</a>
        </li>
        <li class="tab-item">
          <a class="tab-link" href="https://github.com/overxue" target="_blank">GitHub</a>
        </li>
        <li class="tab-item">
          <router-link class="tab-link" to="/me">About Me</router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
  import particles from 'particles.js'
  import Opening from 'components/opening/opening'

  export default {
    'name': 'Homepage',
    mounted() {
      particlesJS.load('particles', '/particles/particles.json')
    },
    components: {
      Opening
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  @import "../../../stylus/variable.styl"

  .homepage
    position: relative
    height: 100vh
    overflow: hidden
    background: #fff
    z-index: 3
    #particles
      position: absolute
      width: 100%
      height: 100%
    .content
      position :absolute
      top: 0
      left: 0
      width: 100%
      height: 100%
      display: flex
      flex-direction: column
      align-items: center
      justify-content: center
      z-index: 3
      text-align: center
      .avatar
        margin-bottom: 20px
        img
          overflow: hidden;
          border-radius: 50%;
          background: $color-background
          box-shadow: rgba(255, 255, 255, 0.1) 0 0 0 5px, rgba(0, 0, 0, 0.1) 0 0 5px 4px
          transition: transform .4s ease-out
        img:hover
          transform: rotate(360deg)
      .description
        margin-bottom: 20px
        font-weight: bold
        color: $color-index
        font-size: $font-size-large-x
      .tab
        .tab-item
          height: 40px
          line-height: 40px
          text-align: center
          list-style: none
          .tab-link
            padding: 10px
            color: $color-index-item
            font-size: $font-size-medium
            font-weight: 600
          a:hover
            color: $color-index
            font-weight: 700
</style>
