<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title图书列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>图书列表<a style="float:right" href="{{url('/book/create')}}" class="btn btn-default">添加</a></h2><hr></center>
<div class="table-responsive">
<form>
品牌名称<input type="text" name="book_name" placeholder="请输入品牌图书关键字" value="{{$query['name']??''}}">
<button>搜索</button>
</form>
	<table class="table">
		
		<thead>
			<tr>
				<th>图书id</th>
				<th>书名</th>
				<th>图书作者</th>
                <th>售价</th>
                <th>图书封面</th>
                <th>操作</th>
			</tr>
		</thead>
		<tbody>
        @foreach($book as $v)
			<tr>
				<td>{{$v->book_id}}</td>
				<td>{{$v->book_name}}</td>
				<td>{{$v->book_tmn}}</td>
                <td>{{$v->book_price}}</td>
                <td>@if($v->book_logo)<img src="{{env('UPLOADS_URL')}}{{$v->book_logo}}" height="50" with="50">@endif</td>
                <td>
                <a href="{{url('/brand/edit/'.$v->book_id)}}" class="btn btn-primary">编辑</a>
                <a href="{{url('/brand/destroy/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
                </td>
			</tr>
            @endforeach

            <tr><td colspan="6">{{$book->appends($query)->links()}}</td></tr>
		</tbody>
</table>
</div>  	

</body>
</html>