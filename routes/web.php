<?php

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


Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
	Route::get('/','IndexController@index');
	Route::get('/cate','CategoryController@index');
	Route::any('/cate/add','CategoryController@add');
	Route::any('/cate/edit/{id}','CategoryController@edit');
	Route::any('/cate/del/{id}','CategoryController@del');
	Route::resource('brand','BrandController');
	Route::get('/brand/{id}/delete',[
		'as'=>'brand.delete',
		'uses'=>'BrandController@destroy',
	]);
	Route::resource('type','TypeController');
	Route::get('/type/{id}/delete',[
		'as'=>'type.delete',
		'uses'=>'TypeController@destroy',
	]);
	Route::any('/attr/getAttrs','AttrController@getAttrs');
	Route::resource('attr','AttrController');
	Route::get('/attr/{id}/delete',[
		'as'=>'attr.delete',
		'uses'=>'AttrController@destroy',
	]);

	Route::any('/goods/product/{id}','GoodsController@product');
	Route::resource('goods','GoodsController');
	Route::get('/goods/{id}/delete',[
		'as'=>'goods.delete',
		'uses'=>'GoodsController@destroy',
	]);
});
Route::group(['namespace'=>'Index','prefix'=>'index'],function (){

});

Route::get('/','Index\IndexController@index');
