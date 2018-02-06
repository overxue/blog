<template>
  <div class="music" :class="{'hide': hide}">
    <div class="music-item" :class="{'rotate': listen}" @click="playMusic">
      <audio loop :src=link id="media" autoplay="" preload="" ref="audio"></audio>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {
    data() {
      return {
        listen: true,
        hide: false,
        link: 'http://music.163.com/song/media/outer/url?id=38358214.mp3'
      }
    },
    created() {
      // 判断设备
      let isMobile = !!navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i)
      if(!isMobile){
        this.$nextTick(() => {
          this.hide = true
          this.listen = false
          this.link = ''
          this.$refs.audio.pause()
        })
      }
    },
    methods: {
      playMusic() {
        if (this.listen) {
          this.listen = false
          this.$refs.audio.pause()
          return
        }
        this.listen = true
        this.$refs.audio.play()
      }
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  .music
    position: relative
    &.hide
      display: none
    .music-item
      position: absolute
      top: 10px
      right: 10px
      width: 36px
      height: 36px
      background-image: url(music_pause.png)
      background-size: 36px 36px
      background-repeat: no-repeat
      z-index: 100
      &.rotate
        background-image: url(music.gif)
        // 不是gif图，让图片自己转动
      //   animation: rotating 1.2s linear infinite
      //   @keyframes rotating
      //       from {
      //           transform: rotate(0)
      //       }to {
      //           transform: rotate(360deg)
      //       }
</style>
