<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Blog后台</title>
        <!-- 引入样式 -->
        <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://unpkg.com/mditor@1.0.5/dist/css/mditor.min.css" />
        <script src="https://unpkg.com/mditor@1.0.5/dist/js/mditor.min.js"></script>
    </head>
    <body>
        <div id="app"></div>

        <!-- Scripts -->
        <script src="{{ asset('js/admin.js') }}"></script>
    </body>
    <script type="text/javascript">
        var mditor =  Mditor.fromTextarea(document.getElementById('editor'));

        //获取或设置编辑器的值
        mditor.on('ready',function(){
          console.log(mditor.value);
          mditor.value = '** hello **';
        });
    </script>
</html>
