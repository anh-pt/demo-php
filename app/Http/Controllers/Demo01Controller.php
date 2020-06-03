<?php
namespace App\Http\Controllers;
use App\BangDemo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Demo01Controller extends Controller{
    public function  add(Request $request){
        echo "<br> Gọi hàm: " . __METHOD__;

        // kiểm tra phương thức nếu là post thì lưu csdl
        if($request->isMethod('post')){
            // là phương thức post
            // kiểm tra hợp lệ dữ liệu
            $rule = 
            [
                'txt_name'=>'required|min:5|max:10',
                'txt_dess' =>'required'
            ];
            $msgE = 
            [
                'txt_name.required' =>'Bạn cần nhập Name',
                'txt_name.min' =>'Name ít nhất là 5 ký tự'
            ];


            $validator = Validator::make( $request->all(), $rule,$msgE );
            if($validator->fails()){
                // có lỗi xảy ra: dữ liệu không hợp lệ
                echo '<pre>';
                print_r($validator->errors());
                echo '</pre>';
            }else
            {
                // không có lỗi: Lưu CSDL
                $objModel = new BangDemo();
                $dataSave = [];
                $dataSave['name'] = $request->get('txt_name');
                $dataSave['dess'] = $request->get('txt_dess');
                $new_id = $objModel->SaveNew($dataSave);
                echo '<br>ID mới thêm: ' . $new_id;
            }

        }

        return view('demo01.add');
    }

    public function edit($id, Request $request){
        $dataView = [];
        //1. lấy dữ liệu đưa lên form
        //2. xử lý post: kiểm tra hợp lệ
        $objDemo = BangDemo::where('id',$id)->first();
        $dataView['objDemo'] = $objDemo;
        // xử lý post:
        if($request->isMethod('post')){
            $rule = [
                'txt_name'=>'required|min:5|max:10',
                'txt_dess' =>'required'
            ];
            $msgE = [
                'txt_name.required' =>'Bạn cần nhập Name',
                'txt_name.min' =>'Name ít nhất là 5 ký tự'
            ];

            $validator = Validator::make($request->all(),$rule,$msgE);
            // kiểm tra
            if($validator->fails()){
                $dataView['err'] = $validator->errors()->toArray();
            }else{
                // ghi DB
                $dataSave = [
                    'name'=> $request->get('txt_name'),
                    'dess' => $request->get('txt_dess')
                ];

                $objModel = new BangDemo();
                $objDemo->SaveUpdate($id,$dataSave);
                $dataView['msg'] = 'Kết thúc cập nhật!';
                // load lại dữ liệu mới đưa ra view để không bị hiển thị dữ liệu cũ
                // hoặc bạn có thể viết lệnh chuyển trang về trang danh sách.
                // Dùng 1 trong 2 lệnh sau nhé:

                $dataView['objDemo'] =  BangDemo::where('id',$id)->first();

//                return redirect()->route('Demo01.BangDuLieuDemo');
            }

        }


        return view('demo01.edit',$dataView);
    }



    public function ThemDuLieu(){
        echo __METHOD__;
        //khi thêm dữ liệu thì cần mảng dữ liệu, key của mảng là tên các cột trong bảng
        //vd:
        $dataInsert = ['name'=>'Bài viết giới thiệu', 'des'=>'Mô tả giới thiệu'];
            // insert không lấy ID
//        DB::table('bang_demo')->insert($dataInsert);
        // insert có lấy ID
        $id_moi = DB::table('bang_demo')->insertGetId($dataInsert);
        echo '<br>ID mới thêm: ' . $id_moi;

    }


    public function BangDuLieuDemo(){
        $dataView = [];
        $bang = DB::table('bang_demo') -> get();
        // lấy danh sách bài viết với điều kiện id >=2
        $query = DB::table('bang_demo')
                ->where('id','>=',2)
                ->orderBy('id','desc');
        // in câu lệnh SQL ra màn hình:
        echo '<br>'. $query->toSql();

        $bang =  $query->get();



//        echo '<pre>';
//        foreach ($bang as $objRow){
//            print_r($objRow);
//        }








        $dataView['ds'] = $bang;
        return view('demo01.bang-demo', $dataView);
    }



    public function  edit_bak($iduser){
        $dataView = [];
//               echo "<br> Gọi hàm: " . __METHOD__;
//
//        $hoTen = '<b>Nguyen Van A</b>';
//        // dùng biến iduser để làm việc
//        $dataView ['ten'] = $hoTen;
//        $dataView ['id'] = $iduser;

        return view('demo01.edit',$dataView);

//        return view('demo01.edit',['ten'=>$hoTen]);
    }

}