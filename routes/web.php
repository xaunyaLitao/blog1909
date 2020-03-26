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
//闭包路由
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/goods','IndexController@goods');
Route::get('/index','IndexController@index');

//Route::get('/add',function (){
//    echo '<form action="/adddo" method="post">'.csrf_field().'<input type="text" name="name"><button>提交</button></button></form>';
//});
//Route::post('/adddo',function (){
//    echo request()->name;
//});

Route::get('/add','IndexController@add');
Route::post('/adddo','IndexController@adddo');

//一个路由支持多种请求方式
//Route::match(['get','post'],'/add','IndexController@add');
//Route::any('/add','IndexController@add');

//路由视图
//Route::view('/add','welcome');



// 必填路由参数
// Route::get('/show/{id}/{name}',function($id,$goods_name){
// echo $id."==".$goods_name;
// });

// Route::get('/show/{id}/{name}','IndexController@show');

// 可选路由参数

// Route::get('/news/{id}/{name?}',function($id,$goods_name=null){
//     echo $id."==".$goods_name;
//     });
// Route::get('/news/{id?}','IndexController@news');


// 正则约束
// Route::get('/news/{id?}','IndexController@news')->where('id',"[0-9]+");

// Route::get('/news/{id?}','IndexController@news')->where('id',"\d+");

Route::get('/cate/{id}/{name}','IndexController@cate')->where(['id'=>'\d+','name'=>'[a-zA-Z]+']);

// 学生模块的CURD
Route::get('/student/create','StudentController@create');
Route::post('/student/store','StudentController@store');
Route::get('/student/index','StudentController@index');



// 品牌模块的CURD
Route::prefix('brand')->group(function(){
    Route::get('create','BrandController@create');
    Route::post('store','BrandController@store');
    Route::get('index','BrandController@index');
    Route::get('edit/{id}','BrandController@edit');
    Route::post('update/{id}','BrandController@update');
    Route::get('destroy/{id}','BrandController@destroy');
    Route::get('checkonly','BrandController@checkonly');
});



// 分类模块的CURD
Route::get('/category/create','CategoryController@create');
Route::post('/category/store','CategoryController@store');
Route::get('/category/index','CategoryController@index');
Route::get('/category/edit/{id}','CategoryController@edit');
Route::post('/category/update/{id}','CategoryController@update');
Route::get('/category/destroy/{id}','CategoryController@destroy');



//售楼模块的CURD
Route::get('/shou/create','ShouController@create');
Route::post('/shou/store','ShouController@store');



// 商品添加
Route::prefix('goods')->group(function(){
    Route::get('create','GoodsController@create');
    Route::post('store','GoodsController@store');
    Route::get('index','GoodsController@index');
    Route::get('edit/{id}','GoodsController@edit');
    Route::post('update/{id}','GoodsController@update');
    Route::get('destroy/{id}','GoodsController@destroy');
    Route::get('checkonly','GoodsController@checkonly');
});


// 图书
Route::prefix('book')->group(function(){
    Route::get('create','BookController@create');
    Route::post('store','BookController@store');
    Route::get('index','BookController@index');
});


// 管路员
Route::prefix('admin')->group(function(){
    Route::get('create','AdminController@create');
    Route::post('store','AdminController@store');
    Route::get('index','AdminController@index');
    Route::get('edit/{id}','AdminController@edit');
    Route::post('update/{id}','AdminController@update');
    Route::get('destroy/{id}','AdminController@destroy');
});


// 新闻
Route::prefix('news')->group(function(){
    Route::get('create','NewsController@create');
    Route::post('store','NewsController@store');
    Route::get('index','NewsController@index');
});

Route::get('login','LoginController@login');
Route::post('logindo','LoginController@logindo');


// 周测
Route::prefix('zhouce')->group(function(){
    Route::get('create','ZhouceController@create');
    Route::post('store','ZhouceController@store');
    Route::get('index','ZhouceController@index');
    Route::get('edit/{id}','ZhouceController@edit');
    Route::post('update/{id}','ZhouceController@update');
    Route::get('destroy/{id}','ZhouceController@destroy');
    Route::get('checkonly','ZhouceController@checkonly');
    
});


Route::get('/','Index\IndexController@Index')->name('index');
Route::get('/log','Index\LoginController@log');
Route::get('/reg','Index\LoginController@reg');
Route::get('/reg/sendSMS','Index\LoginController@sendSMS');
Route::post('/doreg','Index\LoginController@doreg');
Route::post('/dolog','Index\LoginController@dolog');
Route::get('/reg/sendEmail','Index\LoginController@sendEmail');

// 商品详情
Route::get('/goods/{id}','Index\GoodsController@index')->name('goods');
Route::post('/addcart','Index\GoodsController@addcart');

// 购物车
Route::get('cart/cartlist','Index\GoodsController@cartlist');
Route::get('/pay','Index\GoodsController@pay');
Route::get('/success/{id}','Index\GoodsController@success');



Route::get('/pays/{order_id}','Index\PayController@pays');
Route::get('/return_url','Index\PayController@return_url');
Route::post('/notify_url','Index\PayController@notify_url');


Route::get('/prolist','Index\GoodsController@prolist');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
