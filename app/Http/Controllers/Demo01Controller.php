<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

class Demo01Controller extends Controller
{
    function add()
    {
        echo "</br>Gọi hàm: ".__METHOD__;
        return view ('demo01.add');
    }
    function edit($iduser)
    {
        $dataView = [];
        echo "</br>Gọi hàm: ".__METHOD__;
        $hoten = '<b>Phan Tuấn Anh</b>';

        $dataView['ten'] = $hoten;
        $dataView['id'] = $iduser;

        return view('demo01.edit',$dataView);

    }
    function sinh($id)
    {
        $dataView = [];

        $dataView['id'] = $id;

        return view('demo01.sinh',$dataView);

    }
    function BangDuLieuDemo()
    {
        $dataView = [];
        $bang = DB::table('bang_demo')->get();
        // echo "<pre>";
        // foreach($bang as $objRow)
        // {
        //     // print_r($objRow);
        // }
        // Lấy danh sách
        $query = DB::table('bang_demo')
        ->where('id','>=',2)
        ->orderBy('id','desc');
        //in ra màn hình
        echo '<br>'.$query->toSql();
        $bang = $query->get();

        // ->get();

        $dataView['ds'] = $bang;
        return view('bang-demo',$dataView);
    }
    function ThemDuLieu()
    {
        echo __METHOD__;
        $dataInsert = ['name'=>'Bài viết giới thiệu','dess'=>'Mô tả giới thiệu'];
        //insert ko có lấy ID
        DB::table('bang_demo')->insert($dataInsert);
        //insert có lấy id
        // $id_moi = DB::table('bang_demo')->insertGetId($dataInsert);
        // echo '<br>ID mới thêm:'.$id_moi;
    }
}

