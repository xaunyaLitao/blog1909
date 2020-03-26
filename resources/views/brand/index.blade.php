<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title品牌列表</title>
	<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
	<script src="/static/admin/js/jquery.min.js"></script>
	<script src="/static/admin/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品品牌列表<a style="float:right" href="{{url('/brand/create')}}" class="btn btn-default">添加</a></h2><hr></center>
<div class="table-responsive">
<form action="">
品牌名称<input type="text" name="name" placeholder="请输入品牌关键字" value="{{$query['name']??''}}">
品牌网址<input type="text" name="brand_url" placeholder="请输入网址关键字" value="{{$query['brand_url']??''}}">
<button>搜索</button>
</form>
	<table class="table">
		
		<thead>
			<tr>
				<th>品牌id</th>
				<th>品牌名称</th>
				<th>品牌网址</th>
                <th>品牌logo</th>
				<th>品牌相册</th>
                <th>品牌描述</th>
                <th>操作</th>
			</tr>
		</thead>
		<tbody>
        @foreach($brand as $v)
			<tr>
				<td>{{$v->brand_id}}</td>
				<td>{{$v->brand_name}}</td>
				<td>{{$v->brand_url}}</td>
                <td>@if($v->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$v->brand_logo}}" height="50" with="50">@endif</td>
				<td>
				@if($v->brand_imgs)
				@php $brand_imgs=explode('|',$v->brand_imgs);  @endphp
				@foreach($brand_imgs as $vv)
				<img src="{{env('UPLOADS_URL')}}{{$vv}}" height="50" with="50">
				@endforeach
				@endif
				</td>
                <td>{{$v->brand_desc}}</td>
                <td>
                <a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn btn-primary">编辑</a>
                <a href="{{url('/brand/destroy/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
                </td>
			</tr>
            @endforeach           
			 <tr><td colspan="6">{{$brand->appends($query)->links()}}</td></tr>

		</tbody>

</table>
</div>  	
<script>
// 无刷新分页
$(document).on('click','.pagination a',function(){
var url=$(this).attr('href');
$.get(url,function(result){
	// alert(result);
$('tbody').html(result);
});
return false;
});
</script>
</body>
</html>
