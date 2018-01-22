<template>
  <div class="blogdetail">
    <div class="page">
      <div class="blog-detail">
        <div class="blog-detail-contaner">
          <div class="header">
            <div class="header-cover no-cover"></div>
            <div class="header-body">
              <div class="tit">VUE如何重载当前视图</div>
              <div class="article-info">
                <span>今天小剧来分享在使用 vue 时遇到一个问题，困扰小剧比较长时间。概括下来就是：vue 项目如何在不修改 URL 的前提下主动 reload 当前 router？
                </span>
              </div>
            </div>
          </div>
          <div class="article-section">
            <div class="caption">
              <h1 class="titl">VUE如何重载当前视图</h1>
              <p class="time">发布时间：<span>2017-10-09 </span></p>
            </div>
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

              <h3 id="2viewmodelproject">2、View Model 监听 project 变动</h3>
            </div>
            <div class="sns-share" data-text="今天小剧来分享在使用 vue 时遇到一个问题，困扰小剧比较长时间" data-url="http://bh-lay.com/blog/15f0084b4b0" data-title="VUE如何重载当前视图" data-img="">
              <a href="#" title="分享至新浪微博" data-shareto="weibo">
                <i class="l-icon icon-sina-weibo"></i>
                <span>分享</span>
              </a>
              <a href="#" title="微信,支付宝打赏" @click.prevent="showDetail()">
                <i class="l-icon icon-money"></i>
                <span>打赏</span>
              </a>
            </div>
          </div>
          <div class="comments-section">
            <div class="comments_frame">
              <div class="l_comments">
                <div class="l_com_sendBox">
                  <div class="l_sendBox">
                    <textarea name="content" id="id_comment" placeholder="评论屌一点，BUG少一点！"></textarea>
                    <div class="l_send_footer">
                      <div class="l_send_right">
                        <a href="" class="l_send_submit">评论</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="l_com_list">
                  <div class="l_com_list_cnt">
                    <div class="l_com_item">
                      <div class="avatar">
                        <img src="https://dn-lay.qbox.me/build/single-page/images/my-avatar_0b91c8c.jpg" onerror="L.gravatar_error_fn(this)">
                      </div>
                      <div class="content">
                        <div class="caption">剧中人 </div>
                        <div class="text">@梦梦&nbsp;卧槽神思路啊！是个粗暴的好方法，看起来比我这个方案好多了，可以尝试。
                        </div>
                        <div class="footer">
                          <div class="time">22:35 2017-11-28</div>
                          <a href="javascript:void(0)" class="btn-reply">回复</a>
                        </div>
                      </div>
                    </div>


                    <div class="l_com_item">
                      <div class="avatar">
                        <img src="https://dn-lay.qbox.me/build/single-page/images/my-avatar_0b91c8c.jpg" onerror="L.gravatar_error_fn(this)">
                      </div>
                      <div class="content">
                        <div class="caption">剧中人 </div>
                        <div class="text">@梦梦&nbsp;卧槽神思路啊！是个粗暴的好方法，看起来比我这个方案好多了，可以尝试。
                        </div>
                        <div class="footer">
                          <div class="time">22:35 2017-11-28</div>
                          <a href="javascript:void(0)" class="btn-reply">回复</a>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="many" v-show="detailShow" @click="hideDetail">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" @click="hideDetail">
              <i class="icon-cross"></i>
            </div>
            <div class="modal-boday">
              <div class="title">如果觉得我的文章对您有用，请随意打赏。你的支持将鼓励我继续创作！</div>
              <div class="img">
                <img src="./wechat.jpg" width="300" height="300">
                <!-- <img src="./alipay.jpg" width="300" height="300"> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <v-footer></v-footer>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
  import Footer from 'components/footer/footer'

  export default {
    data() {
      return {
        detailShow: false
      }
    },
    methods: {
      showDetail() {
        this.detailShow = true
      },
      hideDetail() {
        this.detailShow = false
      }
    },
    components: {
      'v-footer': Footer
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  .blogdetail
    position:relative
    min-height:100%
    margin:0
    padding:0
    background: #dee3e7
    .page
      padding-bottom: 50px
      .blog-detail
        padding: 0
        background: #dee3e7
        .blog-detail-contaner
          max-width: 1000px
          margin: 0 auto
          background: #fff
          .header
            position: relative
            padding-top: 44%
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
              &.no-cover
                background: #1f3747
                background-image: -webkit-linear-gradient(left,#1f3747,#293d31)
            .header-body
              display: none
          .article-section
            padding: 1em 0
            .caption
              padding: 0 20px
              .titl
                margin-bottom: .4em;
                font-size: 1.8rem;
              .time
                font-size: 14px
            .article
              padding: 40px 20px;
              font-size: 1rem;
              line-height: 1.6;
              word-wrap: break-word;
              background: #fff;
              &:before
                display: table;
                content: "";
            .sns-share
              padding: 2em 0 2em
              text-align: center
              a
                display: inline-block;
                width: 80px;
                height: 80px;
                margin: 0 1em;
                border-radius: 50%;
                font-size: 1.2rem;
                color: #fff;
                background: #fa7d3c;
                i
                  display: block;
                  padding-top: 10px;
                  line-height: 30px;
                  font-size: 30px;
                .l-icon
                  font-family: layIcon;
                  font-style: normal;
                span
                  display: block;
                  line-height: 30px;
                  font-size: 14px;
          .comments-section
            position: relative
            padding: 2em 1em;
            background: #f5f8fa
            border: 1px solid #edf0f3
            &:before
              position: absolute
              content: ""
              top: -1rem
              left: 50%
              margin-left: -2rem
              width: 0
              height: 0
              border-style: solid
              border-color: transparent transparent #f5f8fa
              border-width: 0 2rem 1rem
            .comments_frame
              .l_comments
                .l_com_sendBox
                  margin-bottom: 20px
                  background: #fff
                  border-radius: 2px
                  box-shadow: 0 0 2px rgba(0,0,0,.2)
                  .l_sendBox
                    padding: 20px 20px 20px 20px
                    background: #fff
                    .l_send_footer
                      height: 30px
                      padding-top: 10px
                      .l_send_right
                        float: right
                        .l_send_submit
                          display: inline-block;
                          padding: 0 20px;
                          font-size: 12px;
                          height: 30px;
                          line-height: 30px;
                          color: #fff;
                          background: #f90;
                          border-radius: 2px;
                          transition: all .1s linear;
                .l_com_list
                  .l_com_list_cnt
                    overflow: hidden
                    background: #fff
                    border-radius: 2px
                    box-shadow: 0 0 2px rgba(0,0,0,.2)
                    .l_com_item
                      position: relative
                      padding: 15px
                      border-top: 1px solid #eee
                      cursor: default
                      overflow: hidden
                      transition: all .1s linear
                      &:first-child
                        border: none
                      .avatar
                        float: left
                        width: 50px
                        height: 50px
                        border-radius: 12px
                        overflow: hidden
                        background: #ddd
                        img
                          width: 100%
                          height: 100%
                      .content
                        margin-left: 60px
                        .caption
                          margin-bottom: 10px
                          line-height: 18px
                          font-size: .85rem
                          font-weight: 500
                        .text
                          min-height: 20px
                          margin-bottom: 10px
                          line-height: 1.5
                          font-size: .85rem
                          color: #333
                          word-wrap: break-word
                          word-break: break-all
                        .footer
                          height: 20px
                          line-height: 20px
                          font-size: .85rem
                          .time
                            float: left
                            color: #aaa
                          .btn-reply
                            color: #aaa
                            float: right
      .many
        display: block;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        outline: 0;
        background-color: hsla(0,0%,100%,.7);
        text-align: center;
        overflow-x: hidden;
        overflow-y: auto;
        .modal-dialog
          width: 350px;
          position: absolute;
          top: 45%;
          left: 50%;
          transform: translate(-50%,-50%);
          margin: 30px auto
          .modal-content
            box-shadow: 0 5px 25px rgba(0,0,0,.1);
            border: 1px solid rgba(0,0,0,.1);
            overflow: hidden;
            position: relative;
            background-color: #fff;
            border-radius: 6px;
            background-clip: padding-box;
            outline: 0;
            .modal-header
              float: right
              font-size: 15px
              margin-top: 20px
              margin-right: 20px
            .modal-boday
              padding: 20px 20px 10px 20px
              .title
                margin-top: 40px
                font-size: 16px
                line-height: 18px

  @media screen and (min-width: 768px)
    .blogdetail
      .page
        padding-bottom: 30px
        .blog-detail
          padding: 80px 0
          .blog-detail-contaner
            .header
              .header-body
                display: block
                position: absolute
                top: 70px
                left: 70px
              .tit
                margin-bottom: 15px
                line-height: 1.2
                font-size: 26px
                font-weight: 500
                color: #fff;
              .article-info
                width: 50%
                margin-bottom: 50px
                color: #fff
                opacity: .8
            .article-section
              padding: 5em 8em
            .comments-section
              padding: 2em 8em 4em
  // >= 992
  // @media screen and (min-width: 992px)

  // 大于等于 1200
  // @media screen and (min-width: 1200px)
</style>
