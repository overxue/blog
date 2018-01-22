<template>
  <div class="footer">
    <div class="footer-item">
      <p class="pull-left">Powered By Laravel And Vue <span style="color: rgb(226, 117, 117); font-size: 14px;">❤</span></p>
      <p class="pull-right">© Blog 2018. All rights reserved.</p>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {}
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  .footer
    position:absolute
    bottom:0
    left: 0
    width: 100%
    height: 50px
    box-shadow: 0 0 10px #202020
    background: rgba(27,33,34,.92)
    .footer-item
      margin: 0 10px
      line-height: 50px
      text-align: center
      .pull-left
        color: #c1c1c1
        font-size: 14px
      .pull-right
        display: none
  // >= 768
  @media screen and (min-width: 768px)
    .footer
      height: 60px
      .footer-item
        margin: 0 auto
        line-height: 60px
        width: 750px
        .pull-left
          float: left
        .pull-right
          display: block
          float: right
          color: #c1c1c1
          font-size: 14px
  // >= 992
  @media screen and (min-width: 992px)
    .footer
      .footer-item
        width: 970px

  // 大于等于 1200
  @media screen and (min-width: 1200px)
    .footer
      .footer-item
        width: 1170px
</style>
