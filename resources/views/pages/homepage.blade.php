<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Blog</title>
        <meta name="description" content="" />
        <meta name="keyword" content="" />

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>

        <!--emojione v2.1.1 使用bootstrap的cdn-->
        <link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/emojione/2.1.1/assets/sprites/emojione.sprites.css">
        <script type="text/javascript" src="http://cdn.bootcss.com/emojione/2.1.1/lib/js/emojione.min.js"></script>

        <!--emojionearea-->
        <link rel="stylesheet" type="text/css" href="/css/emojionearea-2.1.3.min.css">
        <script type="text/javascript" src="/js/emojionearea-2.1.3.min.js"></script>
    </head>
    <body>
        <div id="app"></div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
    <script type="text/javascript">
        document.addEventListener('visibilitychange', function() {
          document.title = document.hidden ? '出BUG了，快看！':'Blog'
        });
        $(document).ready(function() {
          $("#id_comment").emojioneArea();
        });
    </script>
</html>
