<template>
  <div class="blog">
    <div class="pages" ref="blog">
      <div style="min-height: 100%">
        <div class="header">
          <div class="mac">
            <div class="logo">
              <img width="70" height="70" src="./php.jpg" class="avatar-item">
            </div>
            <p>一个不羁的码农,我的世界不只有coding</p>
          </div>
        </div>
        <div class="articleListPage-tags-cnt">
          <div>
            <div class="articleListPage-tags">
              <div class="grid-row">
                <div class="content">
                  <a v-for="(item, index) in categories" href="javascript:void(0)" @click="selectCategory(item.id)" :class="{'active':selectType===item.id}">{{item.name}}<span>{{item.post_count}}</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="article">
          <div class="article-item">
            <div v-for="(item, index) in articles" class="article-list">
              <div class="label" v-show="index == 0 || index == 1"><span>new</span></div>
              <h1 class="title">
                <a href="javascript:void(0)" @click="goDetail(item.id)">{{item.title}}</a>
              </h1>
              <div class="introduction">
                  <i class="icon-user">
                    <span class="user">XueCong</span>
                  </i>
                  <i class="icon-clock">
                    <span class="time">{{item.created_at}}</span>
                  </i>
                  <i class="icon-eye">
                    <span class="view">{{item.view_count}}</span>
                  </i>
              </div>
              <div class="article-content">
                {{item.excerpt}}
              </div>
              <div class="readmore">
                <div class="left">
                  <i class="icon-price-tags"></i>
                  <a href="" class="tage">{{item.category.name}}</a>
                </div>
                <div class="right">
                  <a href="" class="readmore">阅读全文 <span>>></span></a>
                </div>
              </div>
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
  import { getCategory } from 'api/category'
  import { getArticle } from 'api/article'

  export default {
    name: 'Blog',
    data() {
      return {
        scrollY: 0,
        goback: false,
        selectType: 0,
        page: 2, // 下一页
        totalpage: 0, // 总页数
        categories: [],
        articles: []
      }
    },
    created() {
      this._getCategory()
      this._getArticle()
    },
    mounted() {
      setTimeout(() => {
        this._initScroll()
      }, 20)
    },
    methods: {
      _initScroll() {
        this.blogScroll = new BScroll(this.$refs.blog, {
          click: true,
          mouseWheel: {
           speed: 20,
           invert: false
          },
          scrollbar: {
           fade: true,
           interactive: false
          },
          probeType: 3,
          pullUpLoad: {
            threshold: 50
          }
        })

        this.blogScroll.on('scroll', (pos) => {
          if (pos.y <= 0) {
            this.scrollY = Math.abs(Math.round(pos.y))
            this.scrollY > 300 ? this.goback = true : this.goback = false
          }
        })

        this.blogScroll.on('pullingUp', () => {
          if(this.totalpage < this.page){
            this.blogScroll.finishPullUp()
            return
          }
          getArticle(this.selectType, this.page).then((res) => {
            this.articles = this.articles.concat(res.data)
            setTimeout(() => {
              this.page ++
              this.blogScroll.finishPullUp()
            }, 20)
          })
        })
      },
      goDetail(id) {
        this.$router.push(`/blog/${id}`)
      },
      goBack() {
         this.blogScroll.scrollTo(0, 0, 1000)
      },
      selectCategory(category_id) {
        if(this.selectType == category_id) {
          return
        }
        this.selectType = category_id
        getArticle(category_id).then((res) => {
          console.log(res)
          this.totalpage = res.meta.pagination.total_pages
          this.page = 2
          this.articles = res.data
        })
      },
      _getCategory() {
        getCategory().then((res) => {
          res.data.unshift({'id':0, 'name':'全部标签'})
          this.categories = res.data
        })
      },
      _getArticle() {
        getArticle().then((res) => {
          this.totalpage = res.meta.pagination.total_pages
          this.articles = res.data
        })
      }
    },
    components: {
      'v-footer': Footer,
      Top
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  @import "../../../stylus/variable.styl"

  .blog
    position:relative
    min-height:100%
    margin:0
    padding:0
    background: #dee3e7
    .pages
      // position: relative
      // padding-bottom: 50px
      // overflow: hidden
      position: absolute
      top: 0
      bottom: 0
      overflow: hidden
      width: 100%
      .header
        position: relative
        padding: 60px 0 20px
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
            // font-size: 3.5rem
            // color: #000
            img
              overflow: hidden;
              border-radius: 50%;
              background: $color-background
              box-shadow: rgba(255, 255, 255, 0.1) 0 0 0 5px, rgba(0, 0, 0, 0.15) 0 0 5px 4px
              transition: transform .4s ease-out
            img:hover
              transform: rotate(360deg)
          p
            font-size: 13px
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
                span
                  opacity: 0.3
                  padding: 0 0 0 5px
      .article
        margin: 0 10px
        .article-item
          padding-bottom: 55px
          .article-list
            position: relative
            background: #fff
            padding: 20px
            margin-bottom: 15px
            .label
              position: absolute
              top: 0
              right: 0
              width: 30px
              height: 30px
              background: #f70
              box-shadow: -1px 1px 2px #000
              &:before
                position: absolute
                content: ""
                width: 0
                height: 0
                top: 0
                right: 0
                border: 1px solid #fff
                border-width: 0 30px 30px 0
                border-color: transparent transparent #fff
              span
                position: absolute
                display: block
                top: 0
                right: 0
                width: 100%
                height: 100%
                -webkit-transform: rotate(45deg) scale(.8)
                transform: rotate(45deg) scale(.8)
                text-align: center
                line-height: 15px
                color: #fff
            .title
              line-height: 20px
              div
                font-size: 20px
                font-weight: 600
                color: #3d464d!important
                cursor: pointer
            .introduction
              margin: 15px 0
              .icon-user, .icon-clock, .icon-eye
                color: #95a5a6
                font-size: 14px
                line-height: 14px
                margin-right: 10px
                .user, .time, .view
                  margin-left: 5px
                  font-size: 14px
                  line-height: 14px
            .readmore
              width: 100%
              margin-top: 15px
              margin-bottom: 30px
              .left
                float: left
                .icon-price-tags
                  margin-right: 5px
                  font-size: 14px
                  line-height: 15px
                  color: #f70
                .tage
                  color: #333
                  font-size: 14px
                  background: #eee
                  margin: 5px 5px 0 0
                  padding: 1px 5px
                  border-radius: 4px
                  margin-top: 2px
              .right
                float: right
                .readmore
                  color: #f70
                  font-size: 14px
                  font-weight: 600
                  line-height: 14px

  // >= 768
  @media screen and (min-width: 768px)
    .blog
      .pages
        // padding-bottom: 70px
        .header
          padding: 75px 0 20px
        .articleListPage-tags-cnt
          .articleListPage-tags
            .grid-row
              width:750px
        .article
          margin: 0 auto
          width: 750px
          .article-item
            padding-bottom: 65px
            .article-list
              padding: 20px 40px 20px 20px
              margin-bottom: 20px

  // >= 992
  @media screen and (min-width: 992px)
    .blog
      .pages
        .articleListPage-tags-cnt
          .articleListPage-tags
            .grid-row
              width:970px
        .article
          width: 970px

  // 大于等于 1200
  @media screen and (min-width: 1200px)
    .blog
      .pages
        .articleListPage-tags-cnt
          .articleListPage-tags
            .grid-row
              width:1170px
        .article
          width: 1170px
</style>
