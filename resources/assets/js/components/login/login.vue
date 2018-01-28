<template>
  <div class="login">
    <el-form class="login-container" :model="ruleForm" :rules="rules" ref="ruleForm">
      <h3 class="title">后台登录</h3>
      <el-form-item prop="account">
        <el-input type="text" placeholder="请输入账号" clearable v-model="ruleForm.account"></el-input>
      </el-form-item>
      <el-form-item prop="password">
        <el-input type="password" placeholder="请输入密码" clearable v-model="ruleForm.password"></el-input>
      </el-form-item>
      <el-checkbox class="remember">记住密码</el-checkbox>
      <el-form-item>
        <el-button type="primary" style="width:100%;" :loading="logining" @click="submitForm('ruleForm')">登录</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script type="text/ecmascript-6">
  export default {
    data() {
      return {
        logining: false,
        ruleForm: {
          account: '',
          password: ''
        },
        rules: {
          account: [
            { required: true, message: '二逼，快输用户名！', trigger: 'blur,change' },
            { type: 'email', message: '账户名不正确', trigger: 'blur,change' }
          ],
          password: [
            { required: true, message: '二逼，忘了密码了吧！', trigger: 'blur,change' },
            { min: 6, max: 12, message: '密码不正确', trigger: 'blur,change' }
          ]
        }
      }
    },
    methods: {
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            this.logining = true
            alert('submit!')
          } else {
            console.log('error submit!!')
            return false
          }
        });
      },
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  .login
    height: 100%
    background-image: url('./background.jpg')
    .login-container
      position: absolute
      top: 45%
      left: 50%
      margin: 30px auto;
      padding: 35px 35px 15px 35px
      border-radius: 5px
      border: 1px solid #eaeaea
      box-shadow: 0 0 25px #cac6c6
      width: 350px
      transform: translate(-50%, -50%)
      background: #fff
      .title
        margin: 0px auto 40px auto
        text-align: center
        color: #505458
        font-size: 18px
      .remember
        margin: 0px 0px 35px 0px
</style>
