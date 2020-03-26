<html>
<head>
	<meta charset="utf-8"> 
	<title>商品品牌添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>添加表</h2><hr></center>

<form action="{{url('/student/store')}}" method="post" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生姓名</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" name="s_name" 
				   placeholder="请输入学生姓名">
		</div>
	
   
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生性别</label>
		<div class="col-sm-10">
            <input type="radio" value="男" name="s_sex">男
            <input type="radio" value="女" name="s_sex">女

		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生班级</label>
		<div class="col-sm-8">
			<textarea type="text" name="s_class" class="form-control" id="firstname" 
				   placeholder="请输入学生班级"></textarea>
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