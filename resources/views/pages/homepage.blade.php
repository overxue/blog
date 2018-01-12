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
    </script>
</html>
