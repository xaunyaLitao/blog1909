<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>新闻列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>新闻列表<a style="float:right" href="{{url('/news/create')}}" class="btn btn-default">添加</a></h2><hr></center>
<div class="table-responsive">

	<table class="table">
		
		<thead>
			<tr>
                <th>分类id</th>
				<th>分类标题</th>
				<th>新闻作者</th>
				<th>添加时间</th>
                <th>父分类</th>
                <th>操作</th>
			</tr>
		</thead>
		<tbody>
        @foreach($news as $v)
			<tr>
				<td>{{$v->new_id}}</td>
				<td>{{$v->new_title}}</td>
				<td>{{$v->new_tma}}</td>
                <td>{{$v->new_time}}</td>
                <td>{{$v->pid}}</td>
                <td>
                <a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn btn-primary">编辑</a>
                <a href="{{url('/goods/destroy/'.$v->goods_id)}}" class="btn btn-danger">删除</a>
                </td>
			</tr>
            @endforeach

		</tbody>
</table>
</div>  	

</body>
</html>