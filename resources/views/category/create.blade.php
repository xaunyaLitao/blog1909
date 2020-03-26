<html>
<head>
	<meta charset="utf-8"> 
	<title>商品分类添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品分类添加<a style="float:right" href="{{url('/category/index')}}" class="btn btn-default">列表</a></h2><hr></center>

<form action="{{url('/category/store')}}" method="post" class="form-horizontal" role="form"
>
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="cate_name">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">父级分类</label>
		<div class="col-sm-8">
		<select name="pid" id="">
			<option value="">--请选择--</option>
			<option value="">男装</option>
			<option value="">女装</option>
			<option value="">生鲜水果</option>
			<option value="">家电</option>
			</select>
		</div>
	</div>
   
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类描述</label>
		<div class="col-sm-8">
			<textarea type="text" name="cate_desc" class="form-control" id="firstname" ></textarea>
		</div>
	</div>
	 <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否在导航栏显示</label>
		<div class="col-sm-8">
			<input type="radio" name="cate_show" value="1">是
			<input type="radio" name="cate_show" value="2">否
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