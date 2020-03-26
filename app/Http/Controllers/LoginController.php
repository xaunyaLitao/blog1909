<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function logindo(){
        $post=request()->except('_token');
     
        $adminuser=Admin::where('admin_name',$post['admin_name'])->first();
        dd(decrypt($adminuser->admin_pwd));
        dd($adminuser);

        if($adminuser){
            session(['adminuser'=>$adminuser]);
            return redirect('/brand/index');
        }
        return redirect('/login')->with('msg','用户名或者密码有误！');
    }
}
