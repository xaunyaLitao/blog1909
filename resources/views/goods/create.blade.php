<html>
<head>
	<meta charset="utf-8"> 
	<title>商品添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品添加<a style="float:right" href="{{url('/goods/index')}}" class="btn btn-default">列表</a></h2><hr></center>

<form action="{{url('/goods/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data"
>
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_name" 
				   placeholder="请输入商品名称">
				   <b style="color:red">{{$errors->first('goods_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品货号</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_hao" 
				   placeholder="请输入商品货号">
				   <b style="color:red">{{$errors->first('goods_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品分类</label>
		<div class="col-sm-8">
		<select name="goods_cate" id="">
        <option value="0">--请选择--</option>
		@foreach($cate as $v)
		<option value="{{$v->cate_id}}">{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</option>
		@endforeach
        </select>
		<b style="color:red">{{$errors->first('goods_cate')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品品牌</label>
		<div class="col-sm-8">
        <select name="goods_pp" id="">
        <option value="0">--请选择--</option>
		@foreach($brand as $v)
        <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
	@endforeach
        </select>
		<b style="color:red">{{$errors->first('goods_pp')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_price" 
				   placeholder="请输入商品价格">
				   <b style="color:red">{{$errors->first('goods_price')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">库存</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_number" 
				   placeholder="请输入商品库存">
				   <b style="color:red">{{$errors->first('goods_number')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-8">
		<input type="radio" name="goods_show"  value="1">是
        <input type="radio" checked name="goods_show"  value="2">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-8">
        <input type="radio" name="goods_new"  value="1">是
        <input type="radio" checked name="goods_new"  value="2">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-8">
        <input type="radio" name="goods_best"  value="1">是
        <input type="radio" checked name="goods_best"  value="2">否
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否幻灯片推荐</label>
		<div class="col-sm-8">
        <input type="radio" name="ishuan"  value="1">是
        <input type="radio" checked name="ishuan"  value="2">否
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否促销</label>
		<div class="col-sm-8">
        <input type="radio" name="iscuo"  value="1">是
        <input type="radio" checked name="iscuo"  value="2">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品主图</label>
		<div class="col-sm-8">
			<input type="file" name="img">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品相册</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="firstname" name="goods_imgs[]" multiple="multiple">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品详情</label>
		<div class="col-sm-8">
			<textarea type="text" name="goods_desc" class="form-control" id="firstname" 
				   placeholder="请输入商品描述"></textarea>
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
$('input[name="goods_name"]').blur(function(){
    $(this).next().empty();
    var goods_name=$(this).val();
    var reg=/^[u4e00-\u9fa5\w-.]{2,50}$/;
    if(!reg.test(goods_name)){
        $(this).next().text('商品名称需有中文、数字、字母、下划线、-或者.组成长度为2-50位！');
        return;
    }

var obj=$(this);
    // 唯一性验证
    $.ajax({
        url:"/goods/checkonly",
        data:{goods_name:goods_name},
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
    var goods_name=$('input[name="goods_name"]').val();
    var reg=/^[u4e00-\u9fa5\w-.]{2,50}$/;
    if(!reg.test(goods_name)){
        $('input[name="goods_name"]').next().text(
            '商品名称需有中文、数字、字母、下划线、-或者.组成长度为2-50位！');
            return;
    }

    // 唯一性验证
    $.ajax({
        url:"/goods/checkonly",
        data:{goods_name:goods_name},
        async:false,
        dataType:'json',
        success:function(result){
            if(result.count>0){
                $('input[name="goods_name"]').next().text('商品名称已存在！');
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