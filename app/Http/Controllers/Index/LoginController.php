<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admins;

// 手机
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

//邮箱
 use App\Mail\SendCode;
 use Illuminate\Support\Facades\Mail;


class LoginController extends Controller
{
    // 登录
    public function log(){
        return view('index.login');
    }

    // 注册
    public function reg(){
        return view('index.reg');
    }

    public function sendSMS(){
        $name=request()->name;
        // php验证手机号
        $reg='/^1[3|5|6|7|8|9]\d{9}$/';
        if(!preg_match($reg,$name)){
            return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或者邮箱']);
        }
        $code=rand(100000,999999);

        $result=$this->send($name,$code);
        // 发送成功
        if($result['Message']=='OK'){
            session(['code'=>$code]);
            return json_encode(['code'=>'00000','msg'=>'发送成功!']);
        }
        // 发送失败
        return json_encode(['code'=>'00000','msg'=>$result['Message']]);
    }
    
     // 发送邮箱
     public function sendEmail(){
        $name=request()->name;
        // php验证邮箱
        $reg='/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/';
        if(!preg_match($reg,$name)){
            return json_encode(['code'=>'00001','msg'=>'请输入正确的手机号或者邮箱']);
        }
        // 生成随机验证码
        $code=rand(000000,999999);
        // 发送邮件
        Mail::to($name)->send(new SendCode($code));
        // 发送成功存入session
        session(['code'=>$code]);
        return json_encode(['code'=>'00000','msg'=>'发送成功!']);
      
    }

    // 发送短息验证码
    public function send($name,$code){
 

// Download：https://github.com/aliyun/openapi-sdk-php
// Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

AlibabaCloud::accessKeyClient('LTAI4Fmo3mBBrXFMikJJKWRW', 'WGAbGIvQy1svcyDfJaaMCphadsfEcP')
                        ->regionId('cn-hangzhou')
                        ->asDefaultClient();

try {
    $result = AlibabaCloud::rpc()
                          ->product('Dysmsapi')
                          // ->scheme('https') // https | http
                          ->version('2017-05-25')
                          ->action('SendSms')
                          ->method('POST')
                          ->host('dysmsapi.aliyuncs.com')
                          ->options([
                                        'query' => [
                                          'RegionId' => "cn-hangzhou",
                                          'PhoneNumbers' => $name,
                                          'SignName' => "新天地商店",
                                          'TemplateCode' => "SMS_183241756",
                                          'TemplateParam' => "{code:$code}",
                                        ],
                                    ])
                          ->request();
   return $result->toArray();
} catch (ClientException $e) {
    return $e->getErrorMessage() . PHP_EOL;
} catch (ServerException $e) {
    return $e->getErrorMessage() . PHP_EOL;
}
    }


    public function doreg(){
        $post=request()->except(['_token','repassword']);

        $codes=session('code');
        if(!($post['code']==$codes)){
            return redirect('/reg')->with('msg','验证码错误');
        }
        $posts=request()->except(['_token','repassword','code']);
        $admin=new Admins();
        $res=$admin::insert($posts);
        session('code',null);
        if($res){
            return redirect('/log');
        }
        return redirect('/reg')->with('msg','注册失败');
    }

    public function dolog(){
        $post=request()->except('_token');
        // dd($post);
        $admin=new Admins();
        $user=$admin::where('name',$post['name'])->first();

        if($user->password!=$post['password']){
            return redirect('/log')->with('msg','用户名或者密码错误,请重新登录');
        }
        session(['user'=>$user]);
        if($post['refer']){
            return redirect($post['refer']);
        }
        return redirect('/');
    }

   
    
}
