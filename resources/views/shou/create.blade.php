<html>
<head>
	<meta charset="utf-8"> 
	<title>售楼添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>售楼添加<a style="float:right" href="{{url('/shou/index')}}" class="btn btn-default">列表</a></h2><hr></center>

<form action="{{url('/shou/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data"
>
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">小区名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="vi_name" 
				   placeholder="请输入小区名称">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">导购人</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="dname" 
				   placeholder="请输入导购人">
		</div>
	</div>
   
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">导购联系方式</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" id="firstname" name="tel" 
				   placeholder="请输入联系方式">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">房屋面积</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" id="firstname" name="fms" 
				   placeholder="请输入房屋面积">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">房屋图片</label>
		<div class="col-sm-8">
		<input type="file" class="form-control" id="firstname" name="img">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">房屋相册</label>
		<div class="col-sm-8">
		<input type="file" name="imgs">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">售价</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" id="firstname" name="sprice" 
				   placeholder="请输入售价">
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