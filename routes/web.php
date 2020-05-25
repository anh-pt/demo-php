<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//thếm mới
//in trực tiệp trong hàm callback
Route::get('/controller/add',function(){
    echo "chức năng thêm mới";
});
route::get('/controller/add','Demo01Controller@add');
//jjsahdsjad
// Route::get('/controller/edit/{iduser}','Demo01Controller@edit');
Route::get('/controller/edit/{iduser}','Demo01Controller@edit')
->where(['iduser'=>'[0-9]+'])->name('Demo01.edit');


Route::get('chuc-mung-sinh-nhat-bac-{id}.html','Demo01Controller@sinh');
Route::get('demo/{ten}',"MyController@index");

Route::get('GetForm',function(){
     return view('form1');
});
Route::post('form1',['as'=>'form1','uses'=>'MyController@form1']);

Route::get('demo2/add','Demo01Controller@add')->name('Demo01.add');

route::redirect('/adc','https://vnexpres.net');
//thử nghiệm truy cập vào wed site