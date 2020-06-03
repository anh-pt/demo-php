<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BangDemo extends Model
{
    protected $table = 'bang_demo';
    public $timestamps = false;

    public function SaveNew($data = []){
        $id = DB::table($this->table)->insertGetId($data);
        return $id;
    }

    public function SaveUpdate($id,$dataSave){
        //........
        DB::table($this->table)
            ->where('id',$id)
            ->update($dataSave);
    }


}
