<html>
<head>
	<meta charset="utf-8"> 
	<title>商品修改</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品修改<a style="float:right" href="{{url('/goods/index')}}" class="btn btn-default">列表</a></h2><hr></center>

<form action="{{url('/goods/update/'.$goods->goods_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data"
>
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_name" 
				   placeholder="请输入商品名称" value="{{$goods->goods_name}}">
				   <b style="color:red">{{$errors->first('goods_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品货号</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_hao" 
				   placeholder="请输入商品货号" value="{{$goods->goods_hao}}">
				   <b style="color:red">{{$errors->first('goods_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品分类</label>
		<div class="col-sm-8">
		<select name="goods_cate" id="">
        <option value="">--请选择--</option>
        <option value="衣服">衣服</option>
		<option value="生鲜水果">生鲜水果</option>
		<option value="肉类">肉类</option>
        </select>
		<b style="color:red">{{$errors->first('goods_cate')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品品牌</label>
		<div class="col-sm-8">
        <select name="goods_pp" id="">
        <option value="">--请选择--</option>
        <option value="耐克">耐克</option>
		<option value="富贵鸟">富贵鸟</option>
		<option value="七匹狼">七匹狼</option>
        </select>
		<b style="color:red">{{$errors->first('goods_pp')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_price" 
				   placeholder="请输入商品价格" value="{{$goods->goods_price}}">
				   <b style="color:red">{{$errors->first('goods_price')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">库存</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_number" 
				   placeholder="请输入商品库存" value="{{$goods->goods_number}}">
				   <b style="color:red">{{$errors->first('goods_number')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-8">
		<input type="radio" checked name="goods_show"  value="1">是
        <input type="radio"  name="goods_show"  value="2">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-8">
        <input type="radio" checked name="goods_new"  value="1">是
        <input type="radio" name="goods_new"  value="2">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-8">
        <input type="radio"  name="goods_best"  value="1">是
        <input type="radio" checked name="goods_best"  value="2">否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品主图</label>
		<div class="col-sm-8">
        @if($goods->img)<img src="{{env('UPLOADS_URL')}}{{$goods->img}}" height="50" with="50">@endif
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
				   placeholder="请输入商品描述">{{$goods->goods_desc}}</textarea>
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