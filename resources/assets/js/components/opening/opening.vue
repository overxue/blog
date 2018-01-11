<template>
  <div class="opening">
    <div class="app_mask" :class="{'app_mask_out':mask}">
      <div class="app_mask_cnt">
        <span class="l-loading"></span>
      </div>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {
    data() {
      return {
        mask: false
      }
    },
    created() {
      setTimeout(() => {
        this.mask = true
      }, 500)
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  @import "../../../stylus/variable.styl"

  .opening
    .app_mask
      position: fixed
      top: 0
      left: 0
      z-index: 2
      width: 100%
      height: 100%
      background: $color-background
      &:before
        content: ""
        position: absolute
        width: 104%
        height: 1px
        top: 50%
        left: -2%
        background: $color-index-item
        transform: rotate(-15deg)
      &.app_mask_out
        opacity: 0
        transition: all .2s ease-in
        transition-delay: .6s
        z-index: 0
        &:before
          width: 0
          left: 50%
          transition: all .3s ease
          transition-delay: .2s
        .app_mask_cnt
          transform: scale(0)
          transition: all .15s ease-in
      .app_mask_cnt
        position: absolute
        top: 50%
        left: 50%
        width: 50px
        height: 50px
        margin: -25px 0 0 -25px
        .l-loading
          position: relative
          display: block
          margin: auto
          height: 50px
          width: 50px
          border: 1px solid $color-index-item
          border-radius: 50%
          background: #fff
          animation: loading-rond 1s infinite
          @keyframes loading-rond
            0% {
                transform: rotate(0deg)
            }to {
                transform: rotate(0.5turn)
            }
          &:after
            content: ""
            position: absolute
            height: 10px
            width: 10px
            top: 5px
            left: 0
            background: $color-index
            border-radius: 50%
</style>
