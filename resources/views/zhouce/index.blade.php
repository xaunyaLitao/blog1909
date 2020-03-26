<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文章列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>文章列表<a style="float:right" href="{{url('/zhouce/create')}}" class="btn btn-default">添加</a></h2><hr></center>
<div class="table-responsive">
<form>
文章标题<input type="text" name="kao_name" placeholder="请输入文章关键字">
<button>搜索</button>
</form>
	<table class="table">
		
		<thead>
			<tr>
                <th>标题id</th>
				<th>文章标题</th>
				<th>文章分类</th>
				<th>文章重要性</th>
                <th>是否显示</th>
				<th>文章作者</th>
                <th>作者emali</th>
                <th>关键字</th>
                <th>网页描述</th>
                <th>上传文件</th>
                <th>操作</th>
			</tr>
		</thead>
		<tbody>
        @foreach($zhouce as $v)
			<tr>
				<td>{{$v->kao_id}}</td>
				<td>{{$v->kao_name}}</td>
				<td>{{$v->kao_cate}}</td>
                <td>{{$v->kao_yao}}</td>
                <td>{{$v->kao_show?'√':'×'}}</td>
                <td>{{$v->kao_tma}}</td>
                <td>{{$v->kao_email}}</td>
                <td>{{$v->kao_desc}}</td>
                <td>@if($v->kao_img)<img src="{{env('UPLOADS_URL')}}{{$v->kao_img}}" height="50" with="50">@endif</td>
                <td>
                <a href="{{url('/zhouce/edit/'.$v->kao_id)}}" class="btn btn-primary">编辑</a>
                <a href="javascript:void(0)" id="{{$v->kao_id}}" class="btn btn-danger">删除</a>
                </td>
			</tr>
            @endforeach
            <tr><td colspan="6">{{$zhouce->appends($query)->links()}}</td></tr>
		</tbody>
</table>
</div>  	
<script>
// ajax删除
$('.btn-danger').click(function(){
var id=$(this).attr('id');
if(confirm('确认要删除吗？')){
    $.get('/zhouce/destroy/'+id,function(result){
        if(result.code=='00000'){
            location.reload();
            // alert(123);
        }
    },'json');
}
});
</script>
</body>
</html>