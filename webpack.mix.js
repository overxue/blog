let mix = require('laravel-mix');

mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      'components': 'assets/js/components',
      'api': 'assets/js/api',
      'common': 'assets/js/common'
    },
    modules: [
      'node_modules',
      path.resolve(__dirname, "resources")
    ]
  },
})

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/admin.js', 'public/js')
   .stylus('resources/assets/stylus/app.styl', 'public/css');
