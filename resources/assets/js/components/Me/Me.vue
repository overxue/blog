<template>
  <div class="me">
    <div class="page" ref="aboutme">
      <div class="blog-detail">
        <div class="blog-detail-contaner">
          <div class="header">
            <div class="header-cover no-cover">
              <div class="header-body">
                <div class="avatar">
                  <img width="120" height="120" src="./avatar.jpg" class="avatar-item">
                </div>
                <div class="tit">薛聪</div>
              </div>
            </div>
          </div>
          <div class="article-section">
            <div class="article">
              <p>今天小剧来分享在使用 vue 时遇到一个问题，困扰小剧比较长时间。</p>
              <p>概括下来就是：vue 项目如何在不修改 URL 的前提下主动 reload 当前 router？</p>
              <h2 id="">先来说下场景</h2>

              <p>项目的业务模型中有一个独立的模块，用于处理全局数据：project，首先 project list 是一个可以进行切换的列表，其次还有一个当前选中的 project 项。所有 View Model 在初始化时都会依赖当前选中的 project。</p>

              <h2 id="">那么问题来了</h2>

              <p>一个 View Model 已经被渲染完毕后，切换 project 时该如何操作？</p>

              <p>仔细思考之后，发现有三个可行性较高的方案：</p>

              <h3 id="1">1、重新设计路由规则</h3>

              <p>通过场景分析可以看出来 project 是一个基础性字段，因此可以考虑将 project 字段显式地体现在 URL 上。在切换 project 时直接更新当前路由即可实现 View Model 的更新。</p>

              <p>然而实际项目中此类基础字段还不少，如果全部体现在路由上既会导致 URL 冗长，又需要处理各种字符转码的问题。所以此方案暂不考虑。</p>

              <h3 id="2viewmodelproject">2、View Model 监听 project 变动sfsldfjls数量开房记录时代峻峰了基拉水电费垃圾地方了设计费暗杀令肌肤；大楼附近；阿萨德飞机；阿拉丁会计；阿来得及；阿萨德积分；阿萨德积分；奥斯卡大家；啊速度快解放；大框架房；阿萨德积分来得及发；阿萨德积分；阿萨德积分；阿萨德积分</h3>
            </div>
          </div>
        </div>
        <v-footer></v-footer>
      </div>
    </div>
    <top v-show="goback" @go="goBack"></top>
  </div>
</template>

<script type="text/ecmascript-6">
  import BScroll from 'better-scroll'
  import Footer from 'components/footer/footer'
  import Top from 'components/top/top'

  export default {
    data() {
      return {
        scrollY: 0,
        goback: false
      }
    },
    created(){
      this.$nextTick(() => {
        this._initScroll()
      })
    },
    methods: {
      _initScroll() {
        this.meScroll = new BScroll(this.$refs.aboutme, {
          click: true,
          mouseWheel: {
           speed: 20,
           invert: false
          },
          probeType: 3
        })

        this.meScroll.on('scroll', (pos) => {
          if (pos.y <= 0) {
            this.scrollY = Math.abs(Math.round(pos.y))
            this.scrollY > 300 ? this.goback = true : this.goback = false
          }
        })
      },
      goBack() {
         this.meScroll.scrollTo(0, 0, 1000)
      }
    },
    components: {
      'v-footer': Footer,
      Top
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  .me
    position:relative
    min-height:100%
    margin:0
    padding:0
    background: #dee3e7
    .page
      // padding-bottom: 30px
      position: absolute
      top: 0
      bottom: 0
      overflow: hidden
      width: 100%
      .blog-detail
        padding: 0
        background: #dee3e7
        min-height: 100%
        .blog-detail-contaner
          max-width: 1000px
          margin: 0 auto
          background: #fff
          padding-bottom: 30px
          .header
            position: relative
            padding-top: 55%
            background-color: #eee
            background-size: cover
            background-position: 50%
            .header-cover
              position: absolute
              width: 100%
              height: 100%
              top: 0
              left: 0
              overflow: hidden
              text-align: center
              &.no-cover
                background: #1f3747
                background-image: -webkit-linear-gradient(left,#1f3747,#293d31)
              .header-body
                display: block
                margin-top: 20px
                .avatar
                  img
                    overflow: hidden;
                    border-radius: 50%;
                    background: $color-background
                    box-shadow: rgba(255, 255, 255, 0.1) 0 0 0 5px, rgba(0, 0, 0, 0.15) 0 0 5px 4px
                    transition: transform .4s ease-out
                  img:hover
                    transform: rotate(360deg)
                .tit
                  margin-top: 15px
                  line-height: 1.2
                  font-size: 26px
                  font-weight: 500
                  color: #fff
          .article-section
            padding: 1em 0
            .caption
              padding: 0 20px
              .titl
                margin-bottom: .4em
                font-size: 1.8rem
              .time
                font-size: 14px
            .article
              padding: 40px 20px
              font-size: 1rem
              line-height: 1.6
              word-wrap: break-word
              background: #fff
              &:before
                display: table
                content: ""

  @media screen and (min-width: 768px)
    .me
      .page
        .blog-detail
          padding: 80px 0
          .blog-detail-contaner
            padding-bottom: 0
            .header
              padding-top: 44%
              .header-cover
                .header-body
                  margin-top: 100px
                  .avatar
                    margin-bottom: 30px
                  .tit
                    margin-top: 20px
            .article-section
              padding: 5em 8em

  // >= 992
  // @media screen and (min-width: 992px)

  // 大于等于 1200
  // @media screen and (min-width: 1200px)
</style>
