<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;

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
}

