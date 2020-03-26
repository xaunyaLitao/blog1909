<html>
<head>
	<meta charset="utf-8"> 
	<title>文章修改</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>文章添加<a style="float:right" href="{{url('/zhouce/index')}}" class="btn btn-default">列表</a></h2><hr></center>

<form action="{{url('/zhouce/update/'.$zhouce->kao_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="kao_name" 
				   placeholder="请输入文章标题" value="{{$zhouce->kao_name}}">
				   <b style="color:red">{{$errors->first('kao_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章分类</label>
		<div class="col-sm-8">
			<select name="kao_cate" id="">
            <option value="0">--请选择--</option>
            <option value="国际">国际</option>
            <option value="都市">都市</option>
            <option value="农村">农村</option>
            <option value="城市">城市</option>
            </select>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-10">
        <input type="radio"  id="firstname" checked name="kao_yao" value="1">普通
            <input type="radio"  id="firstname"  name="kao_yao" value="2">置顶
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-10">
			<input type="radio"  id="firstname" checked name="kao_show" value="1">是
            <input type="radio"  id="firstname" name="kao_show" value="2">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" name="kao_tma" value="{{$zhouce->kao_tma}}">
            <b style="color:red">{{$errors->first('kao_tma')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者email</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" name="kao_email" value="{{$zhouce->kao_email}}">
            <b style="color:red">{{$errors->first('kao_email')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="firstname" name="kao_gjz" value="{{$zhouce->kao_gjz}}">
            <b style="color:red">{{$errors->first('kao_gjz')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">网页描述</label>
		<div class="col-sm-10">
        <textarea type="text" name="kao_desc" class="form-control" id="firstname" 
				   placeholder="请输入网页描述">{{$zhouce->kao_desc}}</textarea>
                   <b style="color:red">{{$errors->first('kao_desc')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">上传文件</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="firstname" name="kao_img">
            @if($zhouce->kao_img)<img src="{{env('UPLOADS_URL')}}{{$zhouce->kao_img}}" height="50" with="50">@endif
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>