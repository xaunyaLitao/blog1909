<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理员列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>管理员列表<a style="float:right" href="{{url('/admin/create')}}" class="btn btn-default">添加</a></h2><hr></center>
<div class="table-responsive">
	<table class="table">
		
		<thead>
			<tr>
                <th>管理员id</th>
				<th>管理员名称</th>
				<th>管理员密码</th>
				<th>管理员手机号</th>
                <th>管理员邮箱</th>
				<th>管理员头像</th>
                <th>操作</th>
			</tr>
		</thead>
		<tbody>
        @foreach($admin as $v)
			<tr>
				<td>{{$v->admin_id}}</td>
				<td>{{$v->admin_name}}</td>
				<td>{{$v->admin_pwd}}</td>
                <td>{{$v->admin_tel}}</td>
                <td>{{$v->admin_hao}}</td>
                <td>@if($v->admin_logo)<img src="{{env('UPLOADS_URL')}}{{$v->admin_logo}}" height="50" with="50">@endif</td>
                <td>
                <a href="{{url('/admin/edit/'.$v->admin_id)}}" class="btn btn-primary">编辑</a>
                <a href="{{url('/admin/destroy/'.$v->admin_id)}}" class="btn btn-danger">删除</a>
                </td>
			</tr>
            @endforeach

		</tbody>
</table>
</div>  	

</body>
</html>