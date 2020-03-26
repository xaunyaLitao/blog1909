<html>
<head>
	<meta charset="utf-8"> 
	<title>管理员修改</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>管理员修改<a style="float:right" href="{{url('/admin/index')}}" class="btn btn-default">列表</a></h2><hr></center>

<form action="{{url('/admin/update/'.$admin->admin_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data"
>
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="admin_name" 
				   placeholder="请输入管理员名称" value="{{$admin->admin_name}}">
				   <b style="color:red">{{$errors->first('admin_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员密码</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="admin_pwd" 
				   placeholder="请输入管理员密码" value="{{$admin->admin_pwd}}">
				   <b style="color:red">{{$errors->first('admin_pwd')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">邮箱账号</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="admin_hao" 
				   placeholder="请输入管理员邮箱账号" value="{{$admin->admin_hao}}">
				   <b style="color:red">{{$errors->first('admin_hao')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">手机号</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="admin_tel" 
				   placeholder="请输入管理员手机号" value="{{$admin->admin_tel}}">
				   <b style="color:red">{{$errors->first('admin_tel')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">头像</label>
		<div class="col-sm-10">
        @if($admin->admin_logo)<img src="{{env('UPLOADS_URL')}}{{$admin->admin_logo}}" height="50" with="50">@endif
			<input type="file" class="form-control" id="firstname" name="admin_logo">
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>