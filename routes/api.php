<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => ['serializer:array', 'bindings']
], function($api) {
    // 游客可以访问的接口
    // 博文分类列表
    $api->get('categories', 'CategoriesController@index')
        ->name('api.categories.index');
    // 需要 token 验证的接口
    // 添加博文分类
    $api->post('categories', 'CategoriesController@store')
        ->name('api.categories.store');
    // 修改博文分类
    $api->patch('categories/{category}', 'CategoriesController@update')
        ->name('api.categories.update');
    // 删除博文分类
    $api->delete('categories/{category}', 'CategoriesController@destory')
        ->name('api.categories.destory');
});
