<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=Admin::all();
        return view('admin/index',['admin'=>$admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'admin_name'=>'regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u|unique:admin',
            'admin_hao'=>'required',
            'admin_tel'=>'numeric',
            'admin_tel'=>'required',
            'admin_pwd'=>'required',
            'admin_pwd'=>'regex:/^\d{6,}$/u',
            'admin_hao'=>'required|email',
        ],[
            'admin_name.regex'=>'管理员名称可以包含中文，数字，字母，下划线长度范围为2-16位！',
            'admin_name.unique'=>'管理员名称已存在！',
            // 'brand_name.max'=>'商品名称最大长度不超过20位！',
            'admin_hao.required'=>'管理员邮箱账号必填',
            'admin_pwd.required'=>'管理员密码必填!',
            'admin_tel.required'=>'管理员手机号必填!',
            'admin_pwd.regex'=>'管理员密码输入必须6位以上！',
            'admin_tel.numeric'=>'手机号必须是数字',
            'admin_hao.email'=>'管理员邮箱账号输入必须6位以上！',

        ]);
        $post=$request->except('_token');
        if ($request->hasFile('admin_logo')) {
            $post['admin_logo']=$this->upload('admin_logo');
            
         }
         $res=Admin::insert($post);
         if($res){
           return redirect('admin/index');
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
        $admin=Admin::where('admin_id',$id)->first();
        return view('admin.edit',['admin'=>$admin]);
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
            'admin_name'=>'regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u|unique:admin',
            'admin_hao'=>'required',
            'admin_tel'=>'numeric',
            'admin_tel'=>'required',
            'admin_pwd'=>'required',
            'admin_pwd'=>'regex:/^\d{6,}$/u',
            'admin_hao'=>'required|email',
        ],[
            'admin_name.regex'=>'管理员名称可以包含中文，数字，字母，下划线长度范围为2-16位！',
            'admin_name.unique'=>'管理员名称已存在！',
            // 'brand_name.max'=>'商品名称最大长度不超过20位！',
            'admin_hao.required'=>'管理员邮箱账号必填',
            'admin_pwd.required'=>'管理员密码必填!',
            'admin_tel.required'=>'管理员手机号必填!',
            'admin_pwd.regex'=>'管理员密码输入必须6位以上！',
            'admin_tel.numeric'=>'手机号必须是数字',
            'admin_hao.email'=>'管理员邮箱账号输入必须6位以上！',

        ]);

        $post=$request->except(['_token']);
        if ($request->hasFile('img')) {
            $post['img']=$this->upload('img');
            
         }
         $res=Admin::where('admin_id',$id)->update($post);
         if($res!==false){
            return redirect('/admin/index');
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
        $res=Admin::destroy($id);
        if($res){
            return redirect('/admin/index');
        }
    }
}
