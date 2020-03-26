<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shou;
class ShouController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shou.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=$request->except('_token');
        // dd($post);

        // 文件上传
        if ($request->hasFile('img')) {
            $post['img']=$this->upload('img');
            
         }
         $res=Shou::insert($post);
         if($res){
            return redirect('shou/index');
        }
    }
     // 文件上传
     public function upload($img){
        // 判断上传过程中有无错误
        if (request()->file($img)->isValid()){
            // 接收文件
            $file = request()->$img;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
