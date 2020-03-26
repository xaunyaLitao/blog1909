<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title分类列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品分类列表<a style="float:right" href="{{url('/category/create')}}" class="btn btn-default">添加</a></h2><hr></center>
<div class="table-responsive">
	<table class="table">
		
		<thead>
			<tr>
				<th>分类id</th>
				<th>分类名称</th>
                <th>分类描述</th>
                <th>父分类</th>
                <th>分类是否在导航显示</th>
                <th>操作</th>
			</tr>
		</thead>
		<tbody>
        @foreach($cate as $v)
			<tr>
				<td>{{$v->cate_id}}</td>
				<td>{{$v->cate_name}}</td>
				<td>{{$v->cate_desc}}</td>
                <td>{{$v->pid}}</td>
                <td>{{$v->cate_show}}</td>
                <td>
                <a href="{{url('/category/edit/'.$v->cate_id)}}" class="btn btn-primary">编辑</a>
                <a href="{{url('/category/destroy/'.$v->cate_id)}}" class="btn btn-danger">删除</a>
                </td>
			</tr>
            @endforeach

            <tr><td colspan="6">{{$cate->links()}}</td></tr>
		</tbody>
</table>
</div>  	

</body>
</html>