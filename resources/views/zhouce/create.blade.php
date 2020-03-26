<html>
<head>
	<meta charset="utf-8"> 
	<title>文章添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>文章添加<a style="float:right" href="{{url('/zhouce/index')}}" class="btn btn-default">列表</a></h2><hr></center>

<form action="{{url('/zhouce/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control"  name="kao_name" 
				   placeholder="请输入文章标题">
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
        <input type="radio"  name="kao_yao" value="普通">普通
            <input type="radio"  name="kao_yao" value="置顶">置顶
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-10">
			<input type="radio"  name="kao_show" value="1">是
            <input type="radio"  name="kao_show" value="2">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-10">
			<input type="text" class="form-control"  name="kao_tma">
            <b style="color:red">{{$errors->first('kao_tma')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者email</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="kao_email">
            <b style="color:red">{{$errors->first('kao_email')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-10">
			<input type="text" class="form-control"  name="kao_gjz">
            <b style="color:red">{{$errors->first('kao_gjz')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">网页描述</label>
		<div class="col-sm-10">
        <textarea type="text" name="kao_desc" class="form-control" 
				   placeholder="请输入网页描述"></textarea>
                   <b style="color:red">{{$errors->first('kao_desc')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">上传文件</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" name="kao_img">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="button" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

// js验证
<script>
$('input[name="kao_name"]').blur(function(){
    $(this).next().empty();
    var kao_name=$(this).val();
    var reg=/^[u4e00-\u9fa5\w-.]{2,50}$/;
    if(!reg.test(kao_name)){
        $(this).next().text('标题名称需有中文、数字、字母、下划线、-或者.组成长度为2-50位！');
        return;
    }

var obj=$(this);
    // 唯一性验证
    $.ajax({
        url:"/zhouce/checkonly",
        data:{kao_name:kao_name},
        // async:true,
        dataType:'json',
        success:function(result){
            if(result.count>0){
                // alert(123);
                obj.next().text('标题名称已存在！');
            }
        }
    });
});

$('button').click(function(){
    var nameflag=true;
    var kao_name=$('input[name="kao_name"]').val();
    var reg=/^[u4e00-\u9fa5\w-.]{2,50}$/;
    if(!reg.test(kao_name)){
        $('input[name="kao_name"]').next().text(
            '品牌名称需有中文、数字、字母、下划线、-或者.组成长度为2-50位！');
            return;
    }

    // 唯一性验证
    $.ajax({
        url:"/zhouce/checkonly",
        data:{kao_name:kao_name},
        async:false,
        dataType:'json',
        success:function(result){
            if(result.count>0){
                $('input[name="kao_name"]').next().text('标题名称已存在！');
                nameflag=false;
               
            }
        }
    });
    if(!nameflag){
        return;
    }
   
    $('form').submit();
});
</script>
</body>
</html>