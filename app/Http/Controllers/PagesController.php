<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    // 网站首页
    public function homepage()
    {
        return view('pages.homepage');
    }
}
