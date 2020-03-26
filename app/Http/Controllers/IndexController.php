<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        echo '我是首页';
    }
    public function goods(){
        echo '我是商品';
    }

    public function add(){
//        dump(request()->isMethod('get'));
        if(request()->isMethod('get')){
            return view('add');
        }
        if(request()->isMethod('post')) {
            echo request()->name;
        }
    }


    public function adddo(){
        echo request()->name;
        return redirect('/goods');
    }

    public function show($goods_id,$goods_name){
        echo $goods_id."==".$goods_name;
    }

    public function news($goods_id=null){
        echo "啦啦啦";
        echo $goods_id;
    }
    
    public function cate($goods_id,$goods_name){
       echo "分类";
       echo $goods_id."==".$goods_name;
    }
}
