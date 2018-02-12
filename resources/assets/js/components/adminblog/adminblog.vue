<template>
  <el-row :gutter="20" style="margin-top: 100px">
    <el-col :span="12" :offset="4">
      <el-form label-width="80px" :model="ruleForm" :rules="rules" ref="ruleForm">
        <el-form-item label="文章标题" prop="title">
          <el-input type="text" v-model="ruleForm.title" placeholder="请输入文章标题"></el-input>
        </el-form-item>
        <el-form-item label="文章分类" prop="category">
          <el-select v-model="ruleForm.category" placeholder="请选择分类">
            <el-option v-for="(category,index) in categories" :label="category.name" :value="category.id" :key="index"></el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="文章摘要" prop="excerpt">
          <el-input type="textarea" v-model="ruleForm.excerpt" placeholder="请输入文章摘要"></el-input>
        </el-form-item>
        <el-form-item label="文章内容" prop="content">
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
  import { getCategory } from 'api/category'
  import { insertArticle } from 'api/article'

  export default {
    data() {
      return {
        logining: false,
        categories: [],
        ruleForm: {
          title: '',
          category: '',
          excerpt: '',
          content: '',
        },
        rules: {
          title: [
            { required: true, message: '请输入文章标题', trigger: 'blur' },
            { min: 2, max: 15, message: '长度在 2 到 15 个字符', trigger: 'blur' }
          ],
          category: [
            { required: true, message: '请选择文章分类', trigger: 'change' }
          ],
          excerpt: [
            { required: true, message: '请输入文章摘要', trigger: 'blur' }
          ],
          content: [
            { required: true, message: '请输入文章内容', trigger: 'blur' }
          ]
        }
      }
    },
    created() {
      this._getCategory()
    },
    computed: {
      simplemde () {
        return this.$refs.markdownEditor.simplemde
      }
    },
    methods: {
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            this.logining = true
            var params = { title: this.ruleForm.title, category_id: this.ruleForm.category, body: this.simplemde.markdown(this.ruleForm.content), excerpt: this.ruleForm.excerpt};
            insertArticle(params)
          }
        });
      },
      _getCategory() {
        getCategory().then((res) => {
          this.categories = res.data
        })
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
