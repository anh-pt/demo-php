<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    function index($ten)
    {
        return "xin chào:".$ten;
    }
    function form1(Request $post)
    {
        echo $post->hoten;
    }
}
