<template>
  <el-container style="height: 100%">
    <el-aside width="220px">
      <el-menu router :default-active="$route.path" background-color="rgb(57,53,88)" text-color="#fff" class="el-menu-bar" style="height: 100%;border-right: none">
        <div class="header">
          <div class="logo">XueCong's blog</div>
          <div class="bar">
            <i class="bar el-icon-location"></i>
          </div>
        </div>
        <div class="user-info">
          <img src="./avatar.jpg">
          <div class="info">
            <span class="username">XueCong</span>
            <span class="email">409771385@qq.com</span>
          </div>
        </div>
        <el-menu-item-group title="你是猪啊">
          <el-menu-item index="/admin/main">
            <i class="el-icon-location"></i>
            <span>首页</span>
          </el-menu-item>
          <el-menu-item index="/admin/tag">
            <i class="el-icon-location"></i>
            <span>标签</span>
          </el-menu-item>
          <el-menu-item index="/admin/blog">
            <i class="el-icon-location"></i>
            <span>博文</span>
          </el-menu-item>
          <el-menu-item index="/admin/comment">
            <i class="el-icon-location"></i>
            <span>评论</span>
          </el-menu-item>
          <el-menu-item index="/admin/users">
            <i class="el-icon-location"></i>
            <span>用户</span>
          </el-menu-item>
        </el-menu-item-group>
      </el-menu>
    </el-aside>
    <el-main style="padding: 0">
      <div class="el-content">
        <div class="el-content-inner">
          <router-view></router-view>
        </div>
      </div>
    </el-main>
  </el-container>
</template>

<script type="text/ecmascript-6"></script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  .header
    height: 60px
    line-height: 60px
    padding: 0 10px 0 20px
    font-size: .9rem
    font-weight: bold
    background-color: #30304D
    color: #fff
    position: relative
    div
      display: inline-block
      font-size: 16px
      font-weight: 600
    .bar
      position: absolute
      right: 10px
      font-size: 18px
      cursor: pointer
      line-height: 60px
  .user-info
    height: 100px
    img
      float: left
      width: 40px
      height: 40px
      border-radius: 50%
      display: inline-block
      vertical-align: middle
      margin: 30px 15px 30px 20px
    .info
      display: inline-block
      font-size: 12px
      color: #fff
      height: 50px
      margin-top: 25px
      margin-bottom: 25px
      padding-top: 5px
      padding-bottom: 5px
      span
        display: block
        line-height: 20px
      .email
        font-weight: 200
  .el-menu-item-group
    .el-menu-item:hover
      background-color: #30304D !important
    .is-active
      background: #30304D !important
  .pull-right
    float: right
    z-index: 99
    height: 60px
    width: 100%
    background: red
  .el-content
    background: url('https://pigjian.com/uploads/bg.png')
    background-position: 0% 0%
    background-repeat: no-repeat
    background-size: 100%
    position: relative
    bottom: 0
    min-height: 350px
    padding: 0 25px
    overflow: hidden
    .el-content-inner
      background-color: #fff
      min-height: 600px
      margin-bottom: 20px
      border-top-left-radius: 5px
      border-top-right-radius: 5px
      margin-top: 70px
      overflow: hidden
</style>
