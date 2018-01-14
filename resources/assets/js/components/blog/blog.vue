<template>
  <div class="blog">
    <div class="nav">
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
    <div class="pages">
      <div class="header">
        <div class="mac">
          <div class="logo">
            <i class="l-icon l-icon-layLogo"></i>
          </div>
          <p>哈哈哈哈哈哈哈哈哈</p>
        </div>
      </div>
      <div class="articleListPage-tags-cnt">
        <div>
          <div class="articleListPage-tags">
            <div class="grid-row">
              <div class="content">
                <a href="" class="active">全部标签</a>
                <a href="">作品<span>19</span></a>
                <a href="">作品<span>19</span></a>
                <a href="">作品<span>19</span></a>
                <a href="">作品<span>19</span></a>
                <a href="">作品<span>19</span></a>
                <a href="">作品<span>19</span></a>
                <a href="">作品<span>19</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="article">
        <div class="article-item">
          <div class="article-list">
            <h1 class="title">
              <a href="">诡异的 java.io.IOException</a>
            </h1>
            <div class="introduction">
              <span class="author">作者：薛聪</span>
            </div>
            <div class="article-content">
              背景 上一篇我们讲到如何获取全民K歌歌曲信息（上一篇：这是一个获取全民K歌歌曲信息的composer包），那么这一篇我将继续带领大家实现一个开箱即用全民K歌版网页播放器。这里我们主要使用的一个开源网页播放器APlayer（github.com/MoePlayer/APlayer）。为了方便我们这里直接使用cdn外链的方式来使用。 代码 [……
            </div>
            <div class="readmore">
              <a href="">阅读更多</a>
            </div>
          </div>
          <div class="article-list">
            <h1 class="title">
              <a href="">诡异的 java.io.IOException</a>
            </h1>
            <div class="introduction">
              <span class="author">作者：薛聪</span>
            </div>
            <div class="article-content">
              背景 上一篇我们讲到如何获取全民K歌歌曲信息（上一篇：这是一个获取全民K歌歌曲信息的composer包），那么这一篇我将继续带领大家实现一个开箱即用全民K歌版网页播放器。这里我们主要使用的一个开源网页播放器APlayer（github.com/MoePlayer/APlayer）。为了方便我们这里直接使用cdn外链的方式来使用。 代码 [……
            </div>
            <div class="readmore">
              <a href="">阅读更多</a>
            </div>
          </div>
          <div class="article-list">
            <h1 class="title">
              <a href="">诡异的 java.io.IOException</a>
            </h1>
            <div class="introduction">
              <span class="author">作者：薛聪</span>
            </div>
            <div class="article-content">
              背景 上一篇我们讲到如何获取全民K歌歌曲信息（上一篇：这是一个获取全民K歌歌曲信息的composer包），那么这一篇我将继续带领大家实现一个开箱即用全民K歌版网页播放器。这里我们主要使用的一个开源网页播放器APlayer（github.com/MoePlayer/APlayer）。为了方便我们这里直接使用cdn外链的方式来使用。 代码 [……
            </div>
            <div class="readmore">
              <a href="">阅读更多</a>
            </div>
          </div>

        </div>
      </div>
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

  .blog
    .nav
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
        transition: all 0.3s ease-out;
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
    .pages
      .header
        position: relative
        padding: 75px 0 20px
        background: #fafafa
        &:before
          content: ""
          position: absolute
          left: 0
          bottom: 0
          width: 100%
          height: 50px
          background: #fff
          background-image: linear-gradient(#fafafa,#fff)
        .mac
          position: relative
          width: 15rem
          height: 7.5rem
          margin: auto
          padding-top: 1.5rem
          text-align: center
          background: #fafafa
          background: linear-gradient(to right bottom,#fff,#eee)
          border: 6px solid #222
          border-width: 6px 6px 8px
          border-radius: 8px 8px 0 0
          &:after
            content: ""
            position: absolute
            width: 134%
            left: -17%
            bottom: -14px
            height: 6px
            border-radius: 0 0 40px 40px/0 0 5px 5px
            background: #ccc
          .logo
            margin-bottom: 10px
            font-size: 3.5rem
            color: #000
            .l-icon
              font-family: layIcon
              font-style: normal
              &:after
                content: "E"
          p
            font-size: 1rem
            color: #333
      .articleListPage-tags-cnt
        margin-bottom: 20px
        .articleListPage-tags
          position: static!important
          width: 100%
          background: #fff
          border-bottom: 1px solid #c4cdd4
          z-index: 5
          .grid-row
            width: 100%
            position: relative
            margin: auto
            zoom: 1
            transition: all .3s ease-out
            &:after
              content: "."
              display: block
              height: 0
              clear: both
              visibility: hidden
            .content
              padding: 12px 0 5px 10px
              a
                position: relative
                display: inline-block
                max-width: 100%
                height: 24px
                margin: 0 10px 5px 0
                line-height: 24px
                padding: 0 8px 0 18px
                border-radius: 0 4px 4px 0
                background: #eee
                font-size: 12px
                color: #333
                overflow: hidden
                text-overflow: ellipsis
                white-space: nowrap
                box-sizing: border-box
                &:before
                  position: absolute
                  content: ""
                  top: 0
                  left: 0
                  width: 0
                  height: 0
                  border-width: 12px 12px 12px 0
                  border-color: #fff transparent
                  border-style: solid
                &:after
                  position: absolute
                  content: ""
                  width: 4px
                  height: 4px
                  top: 10px
                  left: 8px
                  border-radius: 100%
                  background: #fff
                &.active
                  background: #f70
                  color: #fff
      .article
        margin: 0 10px
        .article-item
          margin-bottom: 20px
          .article-list
            background: #fff
            padding: 20px
            margin-bottom: 20px
            .title
              line-height: 20px
              a
                font-size: 20px
                font-weight: 600
                color: #3d464d!important
            .introduction
              margin: 10px 0
            .readmore
              width: 80px
              line-height: 40px
              margin-top: 10px
              text-align: center





  // >= 768
  @media screen and (min-width: 768px)
    .blog
      .nav
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
      .pages
        .articleListPage-tags-cnt
          .articleListPage-tags
            .grid-row
              width:750px
        .article
          margin: 0 auto
          width: 750px
          .article-item
            .article-list
              padding: 20px 40px 20px 20px


  // >= 992
  @media screen and (min-width: 992px)
    .blog
      .nav
        .nav-item
          width: 970px
      .pages
        .articleListPage-tags-cnt
          .articleListPage-tags
            .grid-row
              width:970px
        .article
          margin: 0 auto
          width: 970px
          .article-item
            .article-list
              padding: 20px 40px 20px 20px
  // 大于等于 1200
  @media screen and (min-width: 1200px)
    .blog
      .nav
        .nav-item
          width: 1170px
      .pages
        .articleListPage-tags-cnt
          .articleListPage-tags
            .grid-row
              width:1170px
        .article
          margin: 0 auto
          width: 1170px
          .article-item
            .article-list
              padding: 20px 40px 20px 20px
</style>
