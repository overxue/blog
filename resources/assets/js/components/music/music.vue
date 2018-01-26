<template>
  <div class="music" :class="{'hide': hide}">
    <div class="music-item" :class="{'rotate': listen}" @click="playMusic">
      <audio loop src="/music/The Rose.mp3" id="media" autoplay="" preload="" ref="audio"></audio>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {
    data() {
      return {
        listen: true,
        hide: false
      }
    },
    created() {
      // 判断设备
      let isMobile = !!navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i)
      if(!isMobile){
        this.$nextTick(() => {
          this.hide = true
          this.listen = false
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
      width: 30px
      height: 30px
      background-image: url(music.png)
      background-size: 30px 30px
      background-repeat: no-repeat
      z-index: 100
      &.rotate
        animation: rotating 1.2s linear infinite
        @keyframes rotating
            from {
                transform: rotate(0)
            }to {
                transform: rotate(360deg)
            }
</style>
