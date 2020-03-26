<html>
<head>
	<meta charset="utf-8"> 
	<title>新闻分类添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>新闻分类添加<a style="float:right" href="{{url('/news/index')}}" class="btn btn-default">列表</a></h2><hr></center>

<form action="{{url('/news/store')}}" method="post" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="new_title" 
				   placeholder="请输入新闻标题">
				   <b style="color:red">{{$errors->first('new_title')}}</b>
		</div>
	</div>
   
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻分类</label>
		<div class="col-sm-8">
		<select name="pid" id="">
        <option value="0">--请选择--</option>
		@foreach($cate as $v)
		<option value="{{$v->pid}}">{{str_repeat('|——',$v->level)}}{{$v->pname}}</option>
		@endforeach
        </select>
		<b style="color:red">{{$errors->first('pname')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻作者</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="new_tma" 
				   placeholder="请输入新闻作者">
				   <b style="color:red">{{$errors->first('new_tma')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">发布时间</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="new_time" 
				   placeholder="请输入发布时间">
				   <b style="color:red">{{$errors->first('new_time')}}</b>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>