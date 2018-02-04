<template>
  <div class="top">
    <div @click="gotop()" class="top-item"></div>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {
    methods: {
      gotop() {
        this.$emit('go')
      }
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  .top
    .top-item
      position: fixed
      bottom: 20px
      right: 20px
      width: 38px
      height: 38px
      cursor: pointer
      background-image: url('./top.png')
      animation: bounceInUp 1s
      @keyframes bounceInUp
        from, 60%, 75%, 90%,
        to {
          animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
        }

        from {
          opacity: 0;
          transform: translate3d(0, 3000px, 0);
        }

        60% {
          opacity: 1;
          transform: translate3d(0, -20px, 0);
        }

        75% {
          transform: translate3d(0, 10px, 0);
        }

        90% {
          transform: translate3d(0, -5px, 0);
        }

        to {
          transform: translate3d(0, 0, 0);
        }
</style>
