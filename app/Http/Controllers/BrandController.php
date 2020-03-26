<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use App\Brand;
use App\Http\Requests\StoreBrandPost;
use Illuminate\Support\Facades\Redis;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 存储session
        session(['name'=>'zhangsan']);
        request()->session()->put('number',100);
        // request()->session()->save();
        // 删除
        // session(['name'=>null]);
        // request()->session()->put('number');


        // 删除所有
        // request()->session()->flush();

        // 获取session
        // echo session('name');
        // echo request()->session()->get('number');

        // 获取所有
        // dump(request()->session()->all());
        $name=request()->name;
        $brand_url=request()->brand_url;
        $where=[];
        // Redis::flushall();
        $query=request()->all();
        if($name){
            $where[] = ['brand_name','like',"%$name%"];
        }
        if($brand_url){
            $where[] = ['brand_url','like',"%$brand_url%"];
        }
        $page=request()->page;
        // Redis::del('goodslist');
        $brand= Redis::get('goodslist'.$page);
        // dd($brand);
        if(!$brand){
            echo "db====";
       

        $pageSize=config('app.pageSize');
        // $brand=DB::table('brand')->get();
        //ORM
         $brand=Brand::where($where)->orderby('brand_id','desc')->paginate($pageSize);
              $brand=serialize($brand);
           Redis::setex('goodslist',5*60,$brand);
       }

     $brand=unserialize($brand);

        // ajax分页
        if(request()->ajax()){
            return view('brand.ajaxpage',['brand'=>$brand,'name'=>$name,'query'=>$query]);
        }             

     
   
   
        return view('brand.index',['brand'=>$brand,'name'=>$name,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加界面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *添加执行
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)

    // 第二种验证
    public function store(StoreBrandPost $request)
    {

        // 第一种验证
        // $validatedData=$request->validate([
        //     'brand_name'=>'required|unique:brand|max:20',
        //     'brand_url'=>'required',
        // ],[
        //     'brand_name.required'=>'品牌名称必填！',
        //     'brand_name.unique'=>'品牌名称已存在！',
        //     'brand_name.max'=>'品牌名称最大长度不超过20位！',
        //     'brand_url.required'=>'品牌网址必填',

        // ]);

        $post=$request->except('_token');
        // dd($post);

        // 文件上传
        if ($request->hasFile('brand_logo')) {
           $post['brand_logo']=upload('brand_logo');
           
        }

         // 多文件上传
         if ($request->hasFile('brand_imgs')) {
            $post['brand_imgs']=Moreupload('brand_imgs');
            $post['brand_imgs']=implode('|',$post['brand_imgs']);
         }
        // $res=DB::table('brand')->insert($post);

        // ORM第一种
        // $brand= new Brand;
        // $brand->brand_name=$request->brand_name;
        // $brand->brand_url=$request->brand_url;
        // $brand->brand_logo=$request->brand_logo;
        // $brand->brand_desc=$request->brand_desc;
        // $res=$brand->save();

        //ORM第二种 
        // $res=Brand::create($post);

        // ORM第三种 
        $res=Brand::insert($post);

        // dd($res);
        if($res){
            return redirect('brand/index');
        }
    }

 



    /**
     * Display the specified resource.
     *详情页 预览
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑展示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $brand=DB::table('brand')->where('brand_id',$id)->first();

        // ORM
        // $brand=Brand::find($id);

        // ORM的
        $brand=Brand::where('brand_id',$id)->first();
        return view('brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *修改执行
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 排除接收谁
        $post=$request->except(['_token']);
        if ($request->hasFile('brand_logo')) {
            $post['brand_logo']=$this->upload('brand_logo');
            
         }
        // dd($post);
        // $res=DB::table('brand')->where('brand_id',$id)->update($post);

        // ORM 第一种save
        // $brand=Brand::find($id);
        // $brand->brand_name=$request->brand_name;
        // $brand->brand_url=$request->brand_url;
        // $brand->brand_logo=$request->brand_logo;
        // $brand->brand_desc=$request->brand_desc;
        // $res=$brand->save();
        $res=Brand::where('brand_id',$id)->update($post);

        if($res!==false){
            return redirect('/brand/index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $res=DB::table('brand')->where('brand_id',$id)->delete();

        // ORM
        $res=Brand::destroy($id);
        if($res){
            return redirect('/brand/index');
        }
    }


    public function checkonly(){
        $brand_name=request()->brand_name;
        $count=Brand::where('brand_name',$brand_name)->count();
        
        return json_encode(['code'=>'00000','count'=>$count]);
    }
}
