<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use App\Brand;
use App\Category;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods_name=request()->goods_name;
        $where=[];
        if($goods_name){
            $where[]=['goods_name','like',"%$goods_name%"];
        }
        DB::connection()->enableQueryLog();
        $goods=Goods::select('goods.*','brand.brand_name','category.cate_name')
                    ->leftjoin('category','goods.goods_cate','=','category.cate_id')
                    ->leftjoin('brand','goods.goods_pp','=','brand.brand_id')
                    ->where($where)
                    ->get();
                    $logs = DB::getQueryLog();
                    // dd($logs);
        return view('goods.index',['goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 品牌
        $brand=Brand::all();
        // 分类
        $cate=Category::all();

        // 无限极分类
        $cate=CreateTree($cate);
        // dd($cate);
        return view('goods.create',['brand'=>$brand,'cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'goods_name'=>'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:goods',
         
            'goods_hao'=>'required',
            'goods_cate'=>'required',
            'goods_pp'=>'required',
            'goods_price'=>'required',
            'goods_price'=>'numeric',
            'goods_number'=>'numeric',
            'goods_number'=>'required|digits_between:1,8',
        ],[
            'goods_name.regex'=>'商品名称可以包含中文，数字，字母，下划线长度范围为2-50位！',
            'goods_name.unique'=>'商品名称已存在！',
           
            'goods_hao.required'=>'商品货号必填',
            'goods_hao.unique'=>'商品货号不能重复!',
            'goods_cate.required'=>'商品分类必选!',
            'goods_pp.required'=>'商品品牌必选!',
            'goods_price.required'=>'商品价格必填!',
            'goods_number.required'=>'商品库存必填!',
            'goods_number.digits_between'=>'库存输入必须1-8位！',
            'goods_price.numeric'=>'商品价格必须是数字',
            'goods_number.numeric'=>'商品库存必须是数字',

        ]);
        $post=$request->except('_token');
        //  dd($post);
          // 文件上传
          if ($request->hasFile('img')) {
            $post['img']=$this->upload('img');
            
         }
 
          // 多文件上传
          if ($request->hasFile('goods_imgs')) {
             $post['goods_imgs']=$this->Moreupload('goods_imgs');
             $post['goods_imgs']=implode('|',$post['goods_imgs']);
          }
          $res=Goods::insert($post);
          if($res){
            return redirect('goods/index');
        }
    }
     // 文件上传
     public function upload($img){
        // 接收文件
        $file= request()->$img;
            // 判断上传过程中有无错误
            if($file->isValid()){
            $store_result=$file->store('uploads');
            return $store_result;
    }
    exit('未获取到上传文件或上传过程出错');
}


// 多文件上传
  public function Moreupload($img){
//  接收文件
    $file= request()->$img;

    foreach($file as $k=>$v){
         // 判断上传过程中有无错误
        if($v->isValid()){
            $store_result[$k]=$v->store('uploads');
        }else{
            $store_result[$k]='未获取到上传文件或上传过程出错';
        }
    }
    return $store_result;
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goods=Goods::where('goods_id',$id)->first();
        return view('goods.edit',['goods'=>$goods]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'goods_name'=>'required|unique:goods|max:20',
            'goods_hao'=>'required',
            'goods_cate'=>'required',
            'goods_pp'=>'required',
            'goods_price'=>'required',
            'goods_number'=>'required|digits_between:1,8',
        ],[
            'goods_name.required'=>'商品名称必填！',
            'goods_name.unique'=>'商品名称已存在！',
            'brand_name.max'=>'商品名称最大长度不超过20位！',
            'goods_hao.required'=>'商品货号必填',
            'goods_hao.unique'=>'商品货号不能重复!',
            'goods_cate.required'=>'商品分类必选!',
            'goods_pp.required'=>'商品品牌必选!',
            'goods_price.required'=>'商品价格必填!',
            'goods_number.required'=>'商品库存必填!',
            'goods_number.digits_between'=>'库存输入必须1-8位！',

        ]);
        $post=$request->except(['_token']);
        if ($request->hasFile('img')) {
            $post['img']=$this->upload('img');
            
         }
         $res=Goods::where('goods_id',$id)->update($post);
         if($res!==false){
            return redirect('/goods/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Goods::destroy($id);
        if($res){
            return redirect('/goods/index');
        }
    }
    
    public function checkonly(){
        $goods_name=request()->goods_name;
        $count=Goods::where('goods_name',$goods_name)->count();
        
        return json_encode(['code'=>'00000','count'=>$count]);
    }
}
