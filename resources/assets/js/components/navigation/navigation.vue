<template>
  <div class="navigation">
    <div class="top-bar"></div>
    <div class="nav-item" v-show="showNavigation">
      <div class="navigation-left" @click="showNav">
        <router-link to="/">XueCong's blog</router-link>
      </div>
      <div class="navigation-right">
        <div @click="showNav">
          <router-link class="nav-list" to="/blog">博文</router-link>
        </div>
        <div @click="showNav">
          <a class="nav-list" href="https://weibo.com/3090183841/profile?topnav=1&wvr=6&is_all=1" target="_blank">微博</a>
        </div>
        <div @click="showNav">
          <a class="nav-list" href="https://github.com/overxue" target="_blank">GitHub</a>
        </div>
        <div @click="showNav">
          <router-link class="nav-list" to="/me" @click="showNav">关于我</router-link>
        </div>
      </div>
    </div>
    <div class="nav-more-btn" @click="showNav">
      <i :class="{'first':first}"></i>
      <i :class="{'second':first}"></i>
      <i :class="{'three':first}"></i>
    </div>
    <transition name="fade">
      <!-- 遮罩层 -->
      <div class="hide" v-show="showNavigation" @click="showNav"></div>
    </transition>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {
    data() {
      return {
        first:false,
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
    .nav-item
      position: relative
      width: 100%
      height: 100%
      margin: 0 auto
      box-shadow: 0px 1px 11px 2px rgba(42, 42, 42, 0.1)
      transition: all 0.3s ease-out
      background: #fff
      animation: bounceInDown 1.2s
      @keyframes bounceInDown
        from, 60%, 75%, 90%, to {
          animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
        }

        0% {
          opacity: 0;
          transform: translate3d(0, -3000px, 0);
        }

        60% {
          opacity: 1;
          transform: translate3d(0, 25px, 0);
        }

        75% {
          transform: translate3d(0, -10px, 0);
        }

        90% {
          transform: translate3d(0, 5px, 0);
        }

        to {
          transform: none;
        }
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
    .hide
      position: fixed
      top: 0
      right: 0
      bottom: 0
      left: 0
      background-color: hsla(0,0%,100%,.7)
      z-index: -1
      &.fade-enter-active, &.fade-leave-active
        transition: opacity .5s
      &.fade-enter, &.fade-leave-to
        opacity: 0

  @media screen and (min-width: 768px)
    .navigation
      box-shadow: 0px 1px 11px 2px rgba(42, 42, 42, 0.1)
      background: $color-background
      .top-bar
        background: url('top-bar.png') top
        height: 3px
        width: 100%
      .nav-item
        width: 750px
        box-shadow: none
        display: block !important
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
          display: flex
          .nav-list
            display: inline-block
            height: 56px
            line-height: 55px
      .nav-more-btn
        display: none
      .hide
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
