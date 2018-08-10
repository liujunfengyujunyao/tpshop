<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:55:"./application/admin/view2/order\partner_order_info.html";i:1512439955;s:44:"./application/admin/view2/public\layout.html";i:1519984569;}*/ ?>
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
.ncap-order-style .ncap-order-details { margin: 20px auto;}
.ncap-order-style .ncap-order-details .text-red { color: #f00; }
</style>
<div class="page">
	<div class="fixed-bar">
		<div class="item-title"><a class="back" href="javascript:history.go(-1)" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
			<div class="subject">
				<h3>配货单详情</h3>
			</div>
		</div>
	</div>
	<div class="ncap-order-style">
		<div class="titile">
			<h3></h3>
		</div>
		<div class="ncap-order-details">
			<div class="tabs-panels">
				<div class="misc-info">
					<h3>基本信息</h3>
					<dl>
						<dt>操作用户：</dt>
						<dd><?php echo $info['user_name']; ?></dd>
						<dt>配给合伙人：</dt>
						<dd><?php echo $info['name']; ?></dd>
					</dl>
					<dl>
						<dt>联系方式：</dt>
						<dd><span class="text-red"><?php echo $info['phone']; ?></span></dd>
						<dt>收货地址：</dt>
						<dd><?php echo $info['province_name']; ?> <?php echo $info['city_name']; ?> <?php echo $info['town_name']; ?></dd>
					</dl>
					<dl>
						<dt>发货时间：</dt>
						<dd><?php echo date('Y-m-d H:i:s',$info['addtime']); ?></dd>
						<dt>收货时间：</dt>
						<dd><?php echo (isset($info['confirm_time']) && ($info['confirm_time'] !== '')?$info['confirm_time']:'未确认收货'); ?></dd>
					</dl>
					<dl>
						<dt>物流名称：</dt>
						<dd><?php echo $info['express_name']; ?></dd>
						<dt>物流单号：</dt>
						<dd><span class="text-red"><?php echo $info['express_code']; ?></span></dd>
					</dl>
				</div>
				<div class="goods-info">
					<h4>商品信息</h4>
					<table>
						<thead>
							<tr>
								<th colspan="2">商品</th>
								<th>发货数量</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($orderGoods) || $orderGoods instanceof \think\Collection || $orderGoods instanceof \think\Paginator): $i = 0; $__LIST__ = $orderGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?>
							<tr>
								<td class="w30"><div class="goods-thumb"><a href="<?php echo U('Goods/addEditGoods',array('id'=>$goods['goods_id'])); ?>" target="_blank"><img src="<?php echo goods_thum_images($goods['goods_id'],200,200); ?>" /> </a></div></td>
								<td style="text-align: left;"><a href="<?php echo U('Goods/addEditGoods',array('id'=>$goods['goods_id'])); ?>" target="_blank"><?php echo $goods['goods_name']; ?></a><br/></td>
								<td class="w240"><?php echo $goods['goods_num']; ?></td>
							</tr>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>