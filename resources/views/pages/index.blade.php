<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>薛聪的博客</title>
        <meta name="description" content="薛聪的博客--分享原创技术文章，记录生活点滴；专注于CentOS系统运维、服务端PHP开发、前端HTML、Css、Js开发，点滴的积累，你也可以成为那个曾经你羡慕的人，你的坚持终将美好" />
        <meta name="keyword" content="薛聪的博客,php,Laravel,ThinkPHP,小程序,微信小程序,centos,Linux,ubuntu,vagrant,javascript,nginx,mysql,redis,面向对象,lnmp,php7,html,css,vuejs,composer" />
        <link rel="icon" type="image/x-icon" href="images/avatar.jpg" />
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app"></div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
