<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Cates;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::leftjoin('cates','news.pid','=','cates.pid')->get();
        return view('news.index',['news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate=Cates::all();

        //无限极分类 
        $cate=CreateTree($cate);
        return view('news.create',['cate'=>$cate]);
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
            'new_title'=>'regex:/^[\x{4e00}-\x{9fa5}\w]{2,30}$/u|unique:news',
            'new_tma'=>'required',
            'new_time'=>'required',
          
        ],[
            'new_title.regex'=>'新闻标题可以包含中文，数字，字母，下划线长度范围为2-50位！',
            'new_tma.required'=>'新闻作者必填',
            'new_time.required'=>'时间必填',
            'new_title.unique'=>'新闻标题已存在',
        ]);
        $post=$request->except('_token');
        $res=News::insert($post);
        if($res){
          return redirect('news/index');
      }
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
