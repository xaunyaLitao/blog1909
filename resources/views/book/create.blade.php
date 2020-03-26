<html>
<head>
	<meta charset="utf-8"> 
	<title>图书添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>图书添加<a style="float:right" href="{{url('/book/index')}}" class="btn btn-default">列表</a></h2><hr></center>

<form action="{{url('/book/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data"
>
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">书名</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="book_name" 
				   placeholder="请输入书名">
				   <b style="color:red">{{$errors->first('book_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="book_tmn" 
				   placeholder="请输入图书作者">
				   <b style="color:red">{{$errors->first('book_tmn')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">售价</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="book_price" 
				   placeholder="请输入售价">
				   <b style="color:red">{{$errors->first('book_price')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书封面</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="firstname" name="book_logo">
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