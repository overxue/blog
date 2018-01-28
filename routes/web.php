<?php

// 后台
Route::view('/admin/{name1?}', 'pages.admin');

// 网站首页
Route::view('/{name?}/{name1?}', 'pages.index');
