<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Cart;
use App\Order;
use App\Admins;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{
    public function index($id){
         // 统计访问量
   

    // $count=Cache::add('count_'.$id,1)?Cache::get('count_'.$id):
    // Cache::increment('count_'.$id);

    $count=Redis::setnx('count_'.$id,1)?Redis::get('count_'.$id):
    Redis::incr('count_'.$id);

        $goods=Goods::find($id);
        // dd($goods);
        return view('index.goods',['goods'=>$goods,'count'=>$count]);
    }

    

    // 添加购物车
    public function addcart(Request $request){
        // 判断用户是否登录
        $user=session('user');
        if(!$user){
            return json_encode(['code'=>'00003','msg'=>'用户未登录']);
        }
        $goods_id=$request->goods_id;
        $buy_number=$request->buy_number;

        // 根据商品id查询商品信息
        $goods=Goods::find($goods_id);
        // 判断库存
        if($goods->goods_number<$buy_number){
            return json_encode(['code'=>'00004','msg'=>'库存不足']);
        }
      
        // 判断用户之前是否添加国此商品 如果添加过则更改购买数量即可
        $cart=Cart::where(['user_id'=>$user->admin_id,'goods_id'=>$goods_id])->first();
        // dd($cart);
        if($cart){
            // 判断库存
            $buy_number=$cart->buy_number+$buy_number;
            if($goods->goods_number<$buy_number){
                $buy_number=$goods->goods_number;
            }
            // 更新购买数量
            $res=Cart::where('cart_id',$cart->cart_id)->update(['buy_number'=>$buy_number]);
        }else{
        // 添加入购物车
        $data=[
            'user_id'=>$user->admin_id,
            'goods_id'=>$goods_id,
            'buy_number'=>$buy_number,
            'goods_name'=>$goods->goods_name,
            'goods_price'=>$goods->goods_price,
            'img'=>$goods->img,
            'addtime'=>time()
        ];
        $res=Cart::create($data);
    }
        if($res){
            return json_encode(['code'=>'00000','msg'=>'添加成功']);
        }
}


//购物车列表
public function cartlist(){
    $count = Cart::count();
    $cart = Cart::join('Goods','Goods.goods_id','=','Cart.goods_id')
     ->join('Admins','Admins.admin_id','=','Cart.user_id')->get();
    return view('index.cartlist',['cart'=>$cart,'count'=>$count]);
} 

public function pay(request $request){
    $goods_ids = $request->ids;
    $goods_id = explode(',',$goods_ids);
    $goods = Goods::whereIn('goods_id',$goods_id)->get();
   return view('index.pay',['goods'=>$goods,'goods_id'=>$goods_id]);
}

public function success($id){
    $goods_id = $id;
    // $user_id = cookie('user_id');
   
    $user_id = 11;
    $order_no = rand(1000,9999).time();
      $order_id = $id;

    $data = [
        'user_id'=>$user_id,
        'create_time'=>time(),
        'order_no'=>$order_no
    ];
    $ret = Order::create($data);
    if($ret){

        return view('index.success',['order_no'=>$order_no]);
    }
}
public function prolist(){
    $goods =  Goods::all();
 return view('index/prolist',['goods'=>$goods]);
}

}