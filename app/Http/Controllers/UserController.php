<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {   
        $query = DB::table('users');
        
        $query->orderBy('id','desc');
        $table = $query->get();
        return view('layout.index',['list'=>$table]);
    }
    function add()
    {
        return view('layout.add');
    }
    // function database()
    // {
    //     $data = [];
    //     $table = DB::table('users')->get();
    //     $query = DB::table('users');
    //     $query->toSql();
    //     $table = $query->get();
    //     $data['list'] = $table;
    //     return view('layout.index',$data);

    // }
    function save(Request $request)
    {
        print_r($request->all());
    }
    
}
