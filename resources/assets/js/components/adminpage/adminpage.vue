<template>
  <el-container style="height: 100%">
    <el-aside width="220px">
      <el-menu router :default-active="$route.path" background-color="rgb(57,53,88)" text-color="#fff" active-text-color="#fff" class="el-menu-bar" style="height: 100%">
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
    <el-main>
      <router-view></router-view>
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
  .is-active
    background: #30304D !important
</style>
