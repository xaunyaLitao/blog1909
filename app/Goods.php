<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';
    public $timestamps = false;

    // 黑名单
    protected $guarded = [];


    // 获取首页幻灯片数据
    public static function getSlideData(){
        $ishuan = goods::select('goods_id','img')->where('ishuan',1)->orderBy('goods_id','desc')->take(5)->get();
        return $ishuan;
    }
}
