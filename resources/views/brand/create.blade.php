<html>
<head>
	<meta charset="utf-8"> 
	<title>商品品牌添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品品牌添加<a style="float:right" href="{{url('/brand/index')}}" class="btn btn-default">列表</a></h2><hr></center>

<form action="{{url('/brand/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data"
>
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="brand_name" 
				   placeholder="请输入品牌名称">
				   <b style="color:red">{{$errors->first('brand_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="brand_url" 
				   placeholder="请输入品牌网址">
				   <b style="color:red">{{$errors->first('brand_url')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌logo</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="firstname" name="brand_logo"
				   >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌相册</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="firstname" name="brand_imgs[]" multiple="multiple">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌描述</label>
		<div class="col-sm-8">
			<textarea type="text" name="brand_desc" class="form-control" id="firstname" 
				   placeholder="请输入品牌描述"></textarea>
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
$('input[name="brand_name"]').blur(function(){
    $(this).next().empty();
    var brand_name=$(this).val();
    var reg=/^[u4e00-\u9fa5\w-.]{2,50}$/;
    if(!reg.test(brand_name)){
        $(this).next().text('商品名称需有中文、数字、字母、下划线、-或者.组成长度为2-50位！');
        return;
    }

var obj=$(this);
    // 唯一性验证
    $.ajax({
        url:"/brand/checkonly",
        data:{brand_name:brand_name},
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
    var brand_name=$('input[name="brand_name"]').val();
    var reg=/^[u4e00-\u9fa5\w-.]{2,50}$/;
    if(!reg.test(brand_name)){
        $('input[name="brand_name"]').next().text(
            '商品名称需有中文、数字、字母、下划线、-或者.组成长度为2-50位！');
            return;
    }

    // 唯一性验证
    $.ajax({
        url:"/brand/checkonly",
        data:{brand_name:brand_name},
        async:false,
        dataType:'json',
        success:function(result){
            if(result.count>0){
                $('input[name="brand_name"]').next().text('商品名称已存在！');
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