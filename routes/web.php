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
->where(['iduser'=>'[0-9]+']);
Route::get('chuc-mung-sinh-nhat-bac-{id}.html','Demo01Controller@sinh');