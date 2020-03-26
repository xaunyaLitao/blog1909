<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Admin;
use App\Category;
use App\Goods;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    public function index(){
        $goods = new Goods();

        // 先去缓存读取数据
        // Redis::flushall();
        // $ishuan=Cache::get('ishuan');
        $ishuan=Redis::get('ishuan');
        // dump($ishuan);
        if(!$ishuan){
            // echo "DB";
            // 如果缓存没有则读取数据库
            $ishuan=Goods::getSlideData();

        // 存入memcache
        // Cache::put('ishuan',$ishuan,60*60*24);

        $ishuan=serialize($ishuan);
        Redis::setex('ishuan',60*60*24,$ishuan);
    }
    $ishuan=unserialize($ishuan);
    
        $isshu = $goods::count();
        $cate = Category::where('pid',0)->get();
        $ishot = $goods::where('goods_new',1)->take(8)->get();
        $ishcuo = $goods::where('iscuo',1)->take(3)->get();
        return view('index.index',['ishuan'=>$ishuan,'isshu'=>$isshu,'cate'=>$cate,'ishot'=>$ishot,'ishcuo'=>$ishcuo]);
    }
    
}
