<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>薛聪的博客</title>
        <meta name="description" content="薛聪的博客,开源爱好者,laravel爱好者,从事PHP开发,热爱分享" />
        <meta name="keyword" content="薛聪的博客,php,Laravel,ThinkPHP,小程序,微信小程序,centos,Linux,ubuntu,vagrant,javascript,nginx,mysql,redis,面向对象,lnmp,php7,html,css,vuejs,composer" />
        <link rel="icon" type="image/x-icon" href="images/avatar.jpg" />
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="people/hello.css" type="text/css" media="all">
        <script src="people/js/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <div id="app"></div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript">
            var isindex=true;var title="";var visitor="游客";
        </script>
        <script src="people/js/spig.js" type="text/javascript"></script>
    </body>
</html>
