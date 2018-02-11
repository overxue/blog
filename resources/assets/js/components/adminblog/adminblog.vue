<template>
  <el-row :gutter="20" style="margin-top: 100px">
    <el-col :span="12" :offset="4">
      <el-form label-width="80px">
        <el-form-item label="文章标题">
          <el-input type="text"></el-input>
        </el-form-item>
        <el-form-item label="文章分类">
          <el-select v-model="value5" multiple placeholder="请选择" size="100%">
            <el-option v-for="item in options" :key="item.value" :label="item.label" :value="item.value">
            </el-option>
          </el-select>
        </el-form-item>
        <el-form-item label="文章内容">
          <!-- <el-input type="textarea"></el-input> -->
          <markdown-editor v-model="content" ref="markdownEditor" preview-class="markdown-body"></markdown-editor>
        </el-form-item>
        <el-form-item>
          <el-button type="primary">立即创建</el-button>
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
        content: '',
        options: [
          {
            value: '选项1',
            label: '黄金糕'
          },
          {
            value: '选项2',
            label: '双皮奶'
          },
          {
            value: '选项3',
            label: '蚵仔煎'
          },
          {
            value: '选项4',
            label: '龙须面'
          },
          {
            value: '选项5',
            label: '北京烤鸭'
          }
        ],
        value5: [],
        value11: []
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
