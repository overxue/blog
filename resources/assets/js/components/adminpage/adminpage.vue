<template>
  <div class="adminpage">
    <el-container>
      <el-header>
        <el-row>
          <el-col :span="10" class="logo" :class="collapsed ? 'logo-collapse-width' : 'logo-width'">{{collapsed ? '':'XueCong\'s blog'}}</el-col>
          <el-col :span="10">
            <div class="icon" @click="collapse">
              <i class="el-icon-caret-left"></i>
            </div>
          </el-col>
          <el-col :span="4" class="userinfo">
            <el-dropdown trigger="hover">
              <span class="el-dropdown-link userinfo-inner">
                薛聪<img src="./avatar.jpg" width="40" height="40">
              </span>
              <el-dropdown-menu slot="dropdown">
                <el-dropdown-item>退出</el-dropdown-item>
              </el-dropdown-menu>
            </el-dropdown>
          </el-col>
        </el-row>
      </el-header>
      <el-container>
        <el-aside style="width:230px">
          侧边
        </el-aside>
        <el-main>Main</el-main>
      </el-container>
    </el-container>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {
    data() {
      return {
        collapsed: false
      }
    },
    methods: {
      collapse() {
        this.collapsed = !this.collapsed
      }
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  .adminpage
    height: 100%
    .el-header
      background-color: #20a0ff
      color: #fff
      line-height: 60px
      padding: 0
      .logo
        padding: 0 20px
        border-right: 1px solid rgba(238,241,146,0.3)
        height: 60px
        font-size: 20px
        &.logo-width
          width: 230px
        &.logo-collapse-width
          width: 60px
      .icon
        padding: 0 20px
        width: 14px
        cursor: pointer
      .userinfo
        float: right
        text-align: right
        padding-right: 35px
        color: #fff
        .userinfo-inner
          cursor: pointer
          color: #fff
          img
            border-radius: 20px
            margin: 10px 0px 10px 10px
            float: right
</style>
