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

// /demo01/add  them-moi-tai-khoan
//  controller/action
// cách 1: in trực tiếp trong hàm callback
Route::get('/demo01/add',      function (){
                echo "Chức năng thêm mới";
        });

// cách 2: Điều hướng vào action trong controller
//Route::get('/demo01/add', 'Demo01Controller@add')
//            ->name('Demo01.add');

Route::match(['get','post'],'/demo01/add','Demo01Controller@add')
            ->name('Demo01.add');



//Route::get('/demo01/edit/{iduser}', 'Demo01Controller@edit');
Route::get('/demo01/edit/{iduser}', 'Demo01Controller@edit')
        ->where(['iduser'=>'[0-9]+'])
        ->name('Demo01.edit') ;

Route::redirect('/abc','https://vnexpres.net');
// thử nghiệm truy cập vào website địa chỉ /abc

Route::get('/demo01/bang-du-lieu-demo.html',
            'Demo01Controller@BangDuLieuDemo')
            ->name('Demo01.BangDuLieuDemo');

Route::get('/demo01/them-du-lieu',
    'Demo01Controller@ThemDuLieu');

Route::get('/user','UserController@index')->name('User.index');
Route::get('/user/add','UserController@add')->name('User.add');
Route::post('/user/save-new',
        'UserController@saveNew')
        ->name('User.saveNew');


Route::match(['get', 'post'],'/demo01/edit/{id}', 'Demo01Controller@edit')
    ->where(['id'=>'[0-9]+'])
    ->name('Demo01.edit');

Route::get('demo01/bang-demo','');









