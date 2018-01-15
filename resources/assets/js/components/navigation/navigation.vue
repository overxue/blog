<template>
  <div class="navigation">
    <div class="nav-item" :class="{'show': showNavigation}">
      <div class="navigation-left">
        <router-link to="/">XueCong's blog</router-link>
      </div>
      <div class="navigation-right">
        <router-link class="nav-list" to="/blog">博文</router-link>
        <a class="nav-list" href="https://weibo.com/3090183841/profile?topnav=1&wvr=6&is_all=1" target="_blank">微博</a>
        <a class="nav-list" href="https://github.com/overxue" target="_blank">GitHub</a>
        <router-link class="nav-list" to="/me">关于我</router-link>
      </div>
    </div>
    <div class="nav-more-btn" @click="showNav">
      <i :class="{'first':first}"></i>
      <i :class="{'second':first}"></i>
      <i :class="{'three':first}"></i>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {
    data() {
      return {
          first:false,
          second:false,
          three:false,
          showNavigation: false
      }
    },
    methods: {
      showNav() {
        this.first = !this.first
        this.showNavigation = !this.showNavigation
      }
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  @import "../../../stylus/variable.styl"

  .navigation
    position: fixed
    top: 0
    left: 0
    width: 100%
    z-index: 1
    background: #fff
    .nav-item
      position: relative
      width: 100%
      height: 100%
      margin: 0 auto
      box-shadow: 0px 1px 11px 2px rgba(42, 42, 42, 0.1)
      display: none
      transition: all 0.3s ease-out
      &.show
        display: block
      .navigation-left
        height: 55px
        text-align: center
        line-height: 55px
        a
          display: inline-block
          font-size: $font-size-large
          font-weight: 700
      .navigation-right
        margin: 10px 80px 20px
        text-align: center
        .nav-list
          display: block
          height: 40px
          line-height: 40px
          padding: 0 20px
          text-align: center
          font-size: $font-size-medium
          color: #333
          &:hover
            color: #ff9800
          &.router-link-active
            border-bottom: 2px solid #ff9800
            color: #ff9800
    .nav-more-btn
      position: absolute
      top: 10px
      left: 10px
      width: 42px
      height: 42px
      border-radius: 4px
      box-shadow: 1px 1px 4px rgba(0,0,0,0.2)
      z-index: 1
      background: #fff
      &>i
        position: absolute
        left: 8px
        display: block
        width: 26px
        height: 4px
        transition: all 0.2s linear
        border-radius: 4px
        background: #444
      &>i:first-child
        top:10px
      &>i:nth-child(2)
        top:19px
      &>i:nth-child(3)
        top:28px
      .first
        transform: translateY(9px) rotate(-45deg)
      .second
        opacity: 0
      .three
        transform: translateY(-9px) rotate(45deg)
  @media screen and (min-width: 768px)
    .navigation
      height: 58px
      box-shadow: 0px 1px 11px 2px rgba(42, 42, 42, 0.1)
      border-top: 4px solid #ff9800
      background: $color-background
      .nav-item
        width: 750px
        box-shadow: none
        display: block
        .navigation-left
          float: left
          height: 58px
          line-height: 58px
          a
            display: block
        .navigation-right
          margin: 0
          float: right
          font-size: 0
          .nav-list
            display: inline-block
            height: 56px
            line-height: 55px
      .nav-more-btn
        display: none
  // >= 992
  @media screen and (min-width: 992px)
    .navigation
      .nav-item
        width: 970px
  // 大于等于 1200
  @media screen and (min-width: 1200px)
    .navigation
      .nav-item
        width: 1170px
</style>
</style>
