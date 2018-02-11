<template>
  <el-row :gutter="20" style="margin-top: 100px">
    <el-col :span="12" :offset="4">
      <el-form label-width="80px" :model="ruleForm" ref="ruleForm">
        <el-form-item label="文章标题">
          <el-input type="text" v-model="ruleForm.title"></el-input>
        </el-form-item>
        <el-form-item label="文章分类">
          <el-select v-model="ruleForm.category" placeholder="请选择分类">
            <el-option label="区域一" value="shanghai"></el-option>
            <el-option label="区域二" value="beijing"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="文章内容">
          <markdown-editor v-model="ruleForm.content" ref="markdownEditor" preview-class="markdown-body"></markdown-editor>
        </el-form-item>
        <el-form-item>
          <el-button type="primary" :loading="logining" @click="submitForm('ruleForm')">立即创建</el-button>
        </el-form-item>
      </el-form>
    </el-col>
  </el-row>
</template>

<script type="text/ecmascript-6">
  import markdownEditor from 'vue-simplemde/src/markdown-editor'

  export default {
    data() {
      return {
        logining: false,
        ruleForm: {
          title: '',
          category: '',
          content: '',
        }
      }
    },
    computed: {
      simplemde () {
        return this.$refs.markdownEditor.simplemde
      }
    },
    methods: {
      submitForm(formName) {
        console.log(this.ruleForm.title)
        console.log(this.ruleForm.category)
        console.log(this.simplemde.markdown(this.ruleForm.content))
      }
    },
    components: {
      markdownEditor
    }
  }
</script>

<style scoped lang="stylus" rel="stylesheet/stylus">
  @import '../../../../../node_modules/simplemde/dist/simplemde.min.css'
  @import '../../../../../node_modules/github-markdown-css/github-markdown.css'
</style>
