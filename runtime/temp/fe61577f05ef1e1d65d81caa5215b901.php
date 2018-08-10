<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:45:"./application/admin/view2/store\delivery.html";i:1512439955;s:44:"./application/admin/view2/public\layout.html";i:1519984569;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="__PUBLIC__/static/css/main.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/css/page.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/font/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="__PUBLIC__/static/font/css/font-awesome-ie7.min.css">
<![endif]-->
<link href="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="__PUBLIC__/static/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<style type="text/css">html, body { overflow: visible;}</style>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
<script type="text/javascript" src="__PUBLIC__/static/js/admin.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.mousewheel.js"></script>
<script src="__PUBLIC__/js/myFormValidate.js"></script>
<script src="__PUBLIC__/js/myAjax2.js"></script>
<script src="__PUBLIC__/js/global.js"></script>
    <script type="text/javascript">
    function delfunc(obj){
    	layer.confirm('确认删除？', {
    		  btn: ['确定','取消'] //按钮
    		}, function(){
    		    // 确定
   				$.ajax({
   					type : 'post',
   					url : $(obj).attr('data-url'),
   					data : {act:'del',del_id:$(obj).attr('data-id')},
   					dataType : 'json',
   					success : function(data){
						layer.closeAll();
   						if(data==1){
   							layer.msg('操作成功', {icon: 1});
   							$(obj).parent().parent().parent().remove();
   						}else{
   							layer.msg(data, {icon: 2,time: 2000});
   						}
   					}
   				})
    		}, function(index){
    			layer.close(index);
    			return false;// 取消
    		}
    	);
    }
    
    function selectAll(name,obj){
    	$('input[name*='+name+']').prop('checked', $(obj).checked);
    }   
    
    function get_help(obj){
        layer.open({
            type: 2,
            title: '帮助手册',
            shadeClose: true,
            shade: 0.3,
            area: ['70%', '80%'],
            content: $(obj).attr('data-url'), 
        });
    }
    
    function delAll(obj,name){
    	var a = [];
    	$('input[name*='+name+']').each(function(i,o){
    		if($(o).is(':checked')){
    			a.push($(o).val());
    		}
    	})
    	if(a.length == 0){
    		layer.alert('请选择删除项', {icon: 2});
    		return;
    	}
    	layer.confirm('确认删除？', {btn: ['确定','取消'] }, function(){
    			$.ajax({
    				type : 'get',
    				url : $(obj).attr('data-url'),
    				data : {act:'del',del_id:a},
    				dataType : 'json',
    				success : function(data){
						layer.closeAll();
    					if(data == 1){
    						layer.msg('操作成功', {icon: 1});
    						$('input[name*='+name+']').each(function(i,o){
    							if($(o).is(':checked')){
    								$(o).parent().parent().remove();
    							}
    						})
    					}else{
    						layer.msg(data, {icon: 2,time: 2000});
    					}
    				}
    			})
    		}, function(index){
    			layer.close(index);
    			return false;// 取消
    		}
    	);	
    }
</script>  

</head>
<style>
	body {overflow-x: hidden;}
	.express {padding: 0 0 10px 10px}
	.bot {text-align: center;}
	.sign {cursor: pointer;}
	input[type='number'] {-moz-appearance:textfield;}
</style>
<form class="form-horizontal" id="handleForm" method="post">
	<input type="hidden" value="<?php echo $count_value; ?>" id="count_value">
	<div class="flexigrid">
		<div class="hDiv">
			<div class="hDivBox">
				<table cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th axis="col0">
								<div style="width: 50px;"></div>
							</th>
							<th align="center" axis="col4" class="">
								<div style="text-align: center; width: 420px;" class="">商品名称</div>
							</th>
							<th align="center" axis="col4" class="">
								<div style="text-align: center; width: 200px;" class="">本店单价</div>
							</th>
							<th align="center" axis="col5" class="">
								<div style="text-align: center; width: 155px;" class="">商品数量</div>
							</th>
							<th style="width:100%" axis="col7">
								<div></div>
							</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	
		<div class="bDiv" style="height: auto;">
			<div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
				<table>
					<tbody>
						<?php if(count($info) == 0): ?>
							<tr>
								<td class="f-sign" axis="col0">
									<div style="text-align: center; width: 50px;">
										<a title="添加行" onclick="addLine()" class="plus"><span class="fa fa-plus"></span></a>
										<a title="删除行" onclick="delLine(this)" class="minus"><span class="fa fa-minus"></span></a>
									</div>
								</td>
								<td align="left" class="">
									<div style="text-align: center; width: 420px;">
										<select onchange="getId(this)">
											<option value="">请选择</option>
											<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
											<option value="<?php echo $v['goods_id']; ?>" price="<?php echo $v['shop_price']; ?>"><?php echo $v['goods_name']; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</td>

								<td align="left" class="">
									<div style="text-align: center; width: 200px;">
										<input type="text" class="price" readonly="readonly" value="" />
									</div>
								</td>

								<td align="left" class="">
									<div style="text-align: center; width: 155px;">
										<input type="text" class="number" value="1" onchange="count_price()" onkeyup='this.value=this.value.replace(/\D/gi,"")' />
									</div>
								</td>
								<td align="" class="" style="width: 100%;">
									<div>&nbsp;</div>
								</td>
							</tr>
						<?php else: if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$vo): ?>
								<tr>
									<td class="f-sign" axis="col0">
										<div style="text-align: center; width: 50px;">
											<a title="添加行" onclick="addLine()" class="plus"><span class="fa fa-plus"></span></a>
											<a title="删除行" onclick="delLine(this)" class="minus"><span class="fa fa-minus"></span></a>
										</div>
									</td>
									<td align="left" class="">
										<div style="text-align: center; width: 420px;">
											<select onchange="getId(this)" name="goods['<?php echo $vo['goods_id']; ?>'][goods_id]">
												<option value="">请选择</option>
												<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
												<option value="<?php echo $v['goods_id']; ?>" price="<?php echo $v['shop_price']; ?>" <?php if($v['goods_id'] == $vo['goods_id']): ?>selected<?php endif; ?>><?php echo $v['goods_name']; ?></option>
												<?php endforeach; endif; else: echo "" ;endif; ?>
											</select>
										</div>
									</td>

									<td align="left" class="">
										<div style="text-align: center; width: 200px;">
											<input type="text" class="price" readonly="readonly" value="￥<?php echo $vo['shop_price']; ?>" />
										</div>
									</td>

									<td align="left" class="">
										<div style="text-align: center; width: 155px;">
											<input type="text" class="number" name="goods['<?php echo $vo['goods_id']; ?>'][number]" value="<?php echo $vo['goods_num']; ?>" onchange="count_price()" onkeyup='this.value=this.value.replace(/\D/gi,"")' />
										</div>
									</td>
									<td align="" class="" style="width: 100%;">
										<div>&nbsp;</div>
									</td>
								</tr>
							<?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="bot">
		<span style="float:left; margin-left:150px; margin-top:8px; font-size:14px;">总价: ￥<span class="a" id="count_price">0.00</span></span>
		<input type="hidden" id="input_count_price" name="goods_value" value="0">
			<a onclick="checkForm();" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认配货</a>
		</div>
	</div>
</form>
<script type="text/javascript">
window.onload = count_price;

function addLine(){
	var content = $("#flexigrid table tr:first").html();
	content = "<tr>" + content + "</tr>";
	$("#flexigrid table tr:last").after(content);
	$("#flexigrid table tr:last").find(".number").css('border', '1px solid #dfdfdf');
}
function delLine(obj){
	var length = $("#flexigrid tr").length;
	if (length == 1) {
		layer.alert('请至少保留一项！');
	}else {
		$(obj).parents('tr').remove();
	}
}
function getId(opt) {
	var id = $(opt).val();
	var name1 = "goods['" + id + "'][goods_id]";
	var name2 = "goods['" + id + "'][number]";
	$(opt).attr('name', name1);
	$(opt).parents('tr').find('.number').attr('name', name2);
	var store_price = $(opt).find('option:selected').attr('price');
	$(opt).parents('tr').find('.price').val("￥"+store_price);
	count_price();
}
//更改商品和数量时候自动计算价格
function count_price(){
	var count_price = 0;
	$("#flexigrid tr").each(function(index, el) {
		var goods = $(el).find('select').val();
		var price = $(el).find("option:selected").attr("price");
		var val = $(el).find(".number").val();
		var el_price;
		price == null ? el_price = 0 : el_price = price * val;
		count_price += el_price;
	});

	$('#count_price').text(count_price.toFixed(2));
	$('#input_count_price').val(count_price.toFixed(2));
}
function checkForm(){
	var count_value = $("#count_value").val();
	var count_price = $('#count_price').text();

	if (Number(count_price) > Number(count_value)) {
		alert('商品总价值已超出！');
		return false;
	}

	var arr = [];
	var res = 0;
	//var storeage = "<?php echo $storeage; ?>";
	$("#flexigrid tr").each(function(index, el) {
		var goods = $(el).find('select').val();
		var max = $(el).find("option:selected").attr("max");
		//max = (max != false )? max : storeage;
		var val = $(el).find(".number").val();
		$(el).find('.number').css("border", '1px solid #dfdfdf');

		if ($.inArray(goods, arr) == -1) {
			if (goods != false) {
				arr.push(goods);
			}
		}else {
			res = 1;	//重复选择商品
			return false;
		}

		if (parseInt(max) < parseInt(val)) {
			res = 2;	//当前商品补货数量超过最大库存
			$(el).find('.number').css("border", '1px solid #f00');
			return false;
		}
	});

	if (arr.length == 0) {
		layer.alert('请至少选择一项商品！');
	}else if (res == 1) {
		layer.alert('请勿重复添加商品！');
	}else if (res == 2) {
		layer.alert('补货数量超过最大库存量！');
	}else {
		var id = "<?php echo $type_id; ?>";
		$.ajax({
			type: "POST",
			url: "/index.php?m=Admin&c=Store&a=delivery&id="+id,
			data: $('#handleForm').serialize(),
			dataType: "json",
			error: function () {
				layer.alert("服务器繁忙, 请联系管理员!");
			},
			success: function (data) {
				if (data.status == 1) {
					layer.msg(data.msg, {icon: 1, time: 2000}, function() {
						//关闭iframe页面
						var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
						parent.layer.close(index);
						parent.location.href = "<?php echo U('Admin/Store/typeList'); ?>";
					});
				} else {
					layer.msg(data.msg, {icon: 2});
				}
			}
		});
	}
}
</script>
