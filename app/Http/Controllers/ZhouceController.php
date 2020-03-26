<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zhouce;
class ZhouceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kao_name=request()->kao_name;
        $where=[];
        if($kao_name){
            $where[] = ['kao_name','like',"%$kao_name%"];
        }
        $pageSize=config('app.pageSize');
        $zhouce=Zhouce::where($where)->orderby('kao_id','desc')->paginate($pageSize);

        $query=request()->all();
        return view('zhouce.index',['zhouce'=>$zhouce,'kao_name'=>$kao_name,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zhouce.create');
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
            'kao_name'=>'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:zhouce',
           'kao_tma'=>'required',
           'kao_desc'=>'required',
           'kao_email'=>'required',
           'kao_gjz'=>'required',
        ],[
            'kao_name.regex'=>'标题名称可以包含中文，数字，字母，下划线长度范围为2-50位！',
            'kao_name.unique'=>'标题名称已存在！',
            'kao_tma.required'=>'文章作者不能为空',
            'kao_desc.required'=>'文章描述不能为空',
            'kao_email.required'=>'文章email不能为空',
            'kao_gjz.required'=>'关键字不能为空',

        ]);
        $post=$request->except('_token');
    
          // 文件上传
          if ($request->hasFile('kao_img')) {
            $post['kao_img']=$this->upload('kao_img');
            
         }
         $res=Zhouce::insert($post);
         if($res){
           return redirect('zhouce/index');
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
        $zhouce=Zhouce::where('kao_id',$id)->first();
        return view('zhouce.edit',['zhouce'=>$zhouce]);
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
            'kao_name'=>'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:zhouce',
           'kao_tma'=>'required',
           'kao_desc'=>'required',
           'kao_email'=>'required',
           'kao_gjz'=>'required',
        ],[
            'kao_name.regex'=>'标题名称可以包含中文，数字，字母，下划线长度范围为2-50位！',
            'kao_name.unique'=>'标题名称已存在！',
            'kao_tma.required'=>'文章作者不能为空',
            'kao_desc.required'=>'文章描述不能为空',
            'kao_email.required'=>'文章email不能为空',
            'kao_gjz.required'=>'关键字不能为空',

        ]);
        $post=$request->except(['_token']);
        if ($request->hasFile('kao_img')) {
            $post['kao_img']=$this->upload('kao_img');
            
         }
         $res=Zhouce::where('kao_id',$id)->update($post);
         if($res!==false){
            return redirect('/zhouce/index');
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
        $res=Zhouce::destroy($id);
        if($res){
            if(request()->ajax()){
                return json_encode(['code'=>'00000','msg'=>'删除成功']);
            }
            return redirect('/zhouce/index');
        }
    }


    public function checkonly(){
        $kao_name=request()->kao_name;
        $count=Zhouce::where('kao_name',$kao_name)->count();
        
        return json_encode(['code'=>'00000','count'=>$count]);
    }
}
