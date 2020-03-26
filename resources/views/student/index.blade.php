<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title品牌列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>学生列表<a style="float:right" href="{{url('/student/create')}}" class="btn btn-default">添加</a></h2><hr></center>
<div class="table-responsive">
	<table class="table">
		
		<thead>
			<tr>
				<th>学生id</th>
				<th>学生姓名</th>
				<th>学生性别</th>
                <th>学生班级</th>
                <th>操作</th>
			</tr>
		</thead>
		<tbody>
        @foreach($brand as $v)
			<tr>
				<td>{{$v->s_id}}</td>
				<td>{{$v->s_name}}</td>
				<td>{{$v->s_sex}}</td>
                <td>{{$v->s_class}}</td>
                <td><button type="button" class="btn btn-primary">编辑</button>
                <button type="button" class="btn btn-danger">删除</button>
                </td>
			</tr>
            @endforeach
		</tbody>
</table>
</div>  	

</body>
</html>