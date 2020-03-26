<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // getArray();
        $book_name=request()->book_name;
        $where=[];
        if($book_name){
            $where[] = ['book_name','like',"%$book_name%"];
        }
        $pageSize=config('app.pageSize');
        $book=Book::where($where)->orderby('book_id','desc')->paginate($pageSize);
        $query=request()->all();
        return view('book.index',['book'=>$book,'query'=>$query,'book_name'=>$book_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
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
                'book_name'=>'required|unique:book|max:20',
                'book_tmn'=>'required',
            ],[
                'book_name.required'=>'书名必填！',
                'book_name.unique'=>'书名称已存在！',
                'book_name.max'=>'图书名称最大长度不超过20位！',
                'book_tmn.required'=>'图书作者必填',
    
            ]);
        $post=$request->except('_token');

        // 文件上传
        if ($request->hasFile('book_logo')) {
            $post['book_logo']=$this->upload('book_logo');
            
         }
         $res=Book::insert($post);

         // dd($res);
         if($res){
             return redirect('book/index');
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
