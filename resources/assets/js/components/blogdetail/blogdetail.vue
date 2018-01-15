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

              <p>这是一种比较常规的解决方案，也比较容易实行。具体做法是：View Model 内部去监听 project，每当值发生改变时，主动更新自身数据。</p>

              <p>监听方案可以用 vuex，也可以通过全局的自定义事件来实现，如：</p>

              <div class="highlight javascript"><div><span class="keywords">var</span> bus = <span class="keywords">new</span> Vue();</div><div><span class="comment">// project 模块触发事件</span></div><div>bus.$emit(<span class="string">'project-switched'</span>, <span class="string">'nanjin-1'</span>);</div><div></div><div><span class="comment">// 在 View Model 中监听事件</span></div><div>bus.$on(<span class="string">'project-switched'</span>, <span class="keywords">function</span> (projectName) {</div><div>  <span class="comment">// ...</span></div><div>});</div></div>

              <p>看起来很美好的实现方案，分析之后发现其仍然存在不少弊端，如：</p>

              <ul>
              <li>无论是 vuex 还是自定义事件，其监听都是全局的，也就是 View Model 被销毁时监听仍然存在，需要手动在 View Model 生命周期结束的时候解除监听；</li>
              <li>每个 View Model 都需要进行监听、解除监听的重复操作，实现起来相对冗余；</li>
              <li>事件处理相对分散，不利于排查问题，且后期维护成本较高</li>
              </ul>

              <p>分析之后发现，此方案虽然可以很好的解决问题，粒度也较细，但是存在一些弊端，可以作为备选方案。</p>

              <h3 id="3projectrouterviewmodel">3、project 切换后通过 router 去重载当前 View Model</h3>

              <p>此方案是借鉴了在 angular 项目中的经验，当 view 需要重载时，直接执行 <code>$route.reload()</code> 即可重新初始化当前视图。</p>

              <p>虽然重载 router 下整个 view 这种方案粒度较粗，但优势在于改动范围小，只需要在 project 切换时执行重载即可。</p>

              <p>可以算是一种简单、高效、易维护方案，在这三个方案中算是一个相对最优解。</p>

              <h2 id="">问题就这样解决了 ？</h2>

              <p>本以为到这儿问题就已经轻松愉快地解决了，在翻阅 <a href="https://router.vuejs.org/zh-cn/">vue-router文档</a> 后眉头一皱，却发现事情并不简单。</p>

              <p>因为 vue router 不支持 reload 方法。</p>

              <p>按照惯例，这类使用场景较高 API 一般在 issue 中都会有人去反馈。于是小剧分别在 vue、vue-router 两个项目中去找反馈。</p>

              <p>结果正如小剧预料，有不少反馈表示需要 reload 或者替代方案。比较主流的讨论集中在这个 issue 中：<a href="https://github.com/vuejs/vue-router/issues/296">[Feature] #296</a> 「A reload method like location.reload() 」。</p>

              <p>尤大神及其他 Contributor 均表示数据驱动的模型下不需要 reload 方法，更倾向于小剧前面提到的第二种方案。</p>

              <p>虽然听起来很有道理，但小剧还是想要可以直接 reload 的方法。</p>

              <h2 id="routerreload">有哪些 router reload 的替代方法</h2>

              <p>终于到了点题的时候了，VUE 项目下如何重载当前 router 对应的视图？</p>

              <p>结合自己的思考和 issue 中其他同仁的讨论，小剧总结大致有这么几种方法可以作为替代：</p>

              <ul>
              <li>简单粗暴型：location.reload</li>
              <li>数据驱动型：通过将 View Model 的数据重置到初始化前来实现</li>
              <li>曲线救国型：先将 history replace 至一个中转页面，再 replace 回最初页面</li>
              </ul>

              <p>第一种方案可谓粗暴至极，单页应用中异步通信相对较多，刷新页面也会引起用户直观的刷新感知，因此不建议使用此操作。</p>

              <p>第二种方案看起来并无不妥，因为 vue 本身是数据驱动，控制了数据也就控制了视图表现，但是实际处理中却会丢失各个生命周期中进行的一些操作，因此也并不靠谱儿。</p>

              <p>第三种方案看起来略显猥琐，实际使用起来却非常简单，既不会增加额外的历史记录，也不存在体验上的问题。</p>

              <p>因此，在官方暂不提供 reload 方法支持的情况下，第三种方案可以视为最佳解决方案。</p>

              <h2 id="">那该如何操作呢 ？</h2>

              <blockquote>
                <p>曲线救国型：先将 history replace 至一个中转页面，再 replace 回最初页面</p>
              </blockquote>

              <p>先来看下小剧上面的描述，简单来看其实只有两次跳转而已，关键点在于跳转方法的选用上。push 方法会在浏览器的历史记录中增加一次访问记录，而 replace 不会。我们引入的这一次跳转本质上不希望引起用户的感知，所以 replace 方法在这里再合适不过了。</p>

              <p>另外就是中转页的处理上，如果你配置了通配符 <code>path: '*'</code> 并且有重定向，那么中转页的 path 必须在路由中做对应配置。如果没有，中转页的 path 你可以写路由配置中任何不存在的路径。</p>

              <p>还有就是两次 replace 操作在一个调用栈中进行，而且开始和结束的 path 也相同，极大可能会被浏览器忽略，所以可以引入一个定时器进行延时操作。</p>

              <p>方法大致如下方代码所示。</p>

              <div class="highlight javascript"><div><span class="keywords">function</span> reloadRoute($router) {</div><div>  <span class="keywords">var</span> curruntPath = $router.history.current.fullPath;</div><div>  $router.<span class="keywords">replace</span>({</div><div>    path: <span class="string">'/_empty'</span></div><div>  });</div><div>  <span class="global">setTimeout</span>(<span class="keywords">function</span> () {</div><div>    $router.<span class="keywords">replace</span>({</div><div>      path: curruntPath</div><div>    });</div><div>  });</div><div>}</div></div>

              <p>写到这儿，我们已经解决了 VUE 项目下重载当前 router 对应的视图的问题，猥琐但有效。</p>

              <hr>

              <p>PS：视图重载这类需求的场景其实蛮多的，举几个例子：</p>

              <ul>
                <li>本文列举的 project 切换的场景</li>
                <li>全局刷新交互，如设计可用于强制刷新内容的按钮</li>
                <li>一个登录、匿名均可访问的应用，在弹窗登录后统一刷新当前视图</li>
                <li>其他因全局、基础数据变动而需要刷新视图的场景</li>
              </ul>

              <p>最后，期待官方提供 reload 方法。</p>
            </div>
            <div class="sns-share" data-text="今天小剧来分享在使用 vue 时遇到一个问题，困扰小剧比较长时间。概括下来就是：vue 项目如何在不修改 URL 的前提下主动 reload 当前 router？" data-url="http://bh-lay.com/blog/15f0084b4b0" data-title="VUE如何重载当前视图" data-img="">
              <a href="#" title="分享至新浪微博" data-shareto="weibo">
                <i class="l-icon l-icon-weibo"></i>
                <span>分享</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {}
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  .blogdetail
    height: 100%
    background: #dee3e7
    .page
      .blog-detail
        padding: 80px 0
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



</style>
