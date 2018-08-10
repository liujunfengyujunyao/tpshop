<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:51:"./application/admin/view2/partner\stock_config.html";i:1512439953;s:44:"./application/admin/view2/public\layout.html";i:1519984569;}*/ ?>
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
<script src="__ROOT__/public/static/js/layer/laydate/laydate.js"></script>
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
	<div class="fixed-bar">
		<div class="item-title">
			<div class="subject">
				<h3>库存配置</h3>
				<h5>网站系统合伙人库存配置</h5>
			</div>
		</div>
	</div>

	<!-- 操作说明 -->
	<div id="explanation" class="explanation" style="color: rgb(44, 188, 163); background-color: rgb(237, 251, 248); width: 99%; height: 100%;">
		<div id="checkZoom" class="title"><i class="fa fa-lightbulb-o"></i>
			<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
			<span title="收起提示" id="explanationZoom" style="display: block;"></span>
		</div>
		<ul>
			<li>合伙人默认的商品最大库存量，在此配置</li>
		</ul>
	</div>

	<!-- 商品默认的最大库存量 -->
	<div class="flexigrid" id="ajax_return">
		<div class="mDiv">
			<div class="ftitle">
				<h3>库存配置</h3>
				<h5>(共<?php echo $pager->totalRows; ?>条记录)</h5>
			</div>
			<div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
		</div>
		<div class="hDiv">
			<div class="hDivBox">
				<table cellspacing="0" cellpadding="0" width="100%">
					<thead>
						<tr>
							<th class="sign" axis="col0">
								<div style="width: 24px;"><i class="ico-check"></i></div>
							</th>
							<th align="center" axis="col3" class="">
								<div style="text-align: center; width: 50px;" class="">编号</div>
							</th>
							<th align="center" axis="col4" class="">
								<div style="text-align: center; width: 650px;" class="">商品名称</div>
							</th>
							<th align="center" axis="col5" class="">
								<div style="text-align: center; width: 100px;" class="">配额</div>
							</th>
							<th align="center" axis="col1" class="handle">
								<div style="text-align: center; width: 170px;">操作</div>
							</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		<div class="tDiv">
			<div class="tDiv2">
				<div class="fbutton">
					<a href="javascript:void(0)" onclick="show('0')">
						<div class="add" title="添加">
							<span><i class="fa fa-plus"></i>添加</span>
						</div>
					</a>
				</div>
			</div>
			<div style="clear:both"></div>
		</div>
		<div class="bDiv" style="height: auto;">
			<div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
				<table>
					<tbody>
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<tr>
							<td class="sign">
								<div style="width: 24px;"><i class="ico-check"></i></div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 50px;"><?php echo $key+1; ?></div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 650px;"><?php echo getSubstr($vo['goods_name'],0,60); ?></div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 100px;"><?php echo $vo['stock']; ?></div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 170px;">
									<a class="btn green" href="javascript:void(0)" onclick="show(<?php echo $vo['goods_id']; ?>)"><i class="fa fa-pencil"></i>编辑</a>
									<a class="btn red" href="javascript:void(0)" onclick="del(<?php echo $vo['goods_id']; ?>)"><i class="fa fa-trash-o"></i>删除</a>
								</div>
							</td>
						</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		<!--分页位置-->
		<?php echo $page; ?>
	</div>
</div>
<script>
$(document).ready(function() {
	// 点击刷新数据
	$('.fa-refresh').click(function() {
		location.href = location.href;
	});

	// 表格行点击选中切换
	$('#flexigrid > table>tbody >tr').click(function(){
		$(this).toggleClass('trSelected');
	});
});

/* 显示添加、编辑弹出层 */
function show(id) {
	layer.open({
		type: 2,
		skin: 'layui-layer-rim',
		title: '商品库存配置',
		area: ['900px', '550px'],
		content: "/index.php?m=Admin&c=Partner&a=add_config&id="+id
	})
}

// 删除操作
function del(id) {
	layer.confirm('确定要删除吗？', {btn: ['确定', '取消']}, function(index){
		layer.close(index);
		$.ajax({
			url:"/index.php?m=Admin&c=Partner&a=del_config&id="+id,
			success: function(v){
				var v = eval('('+v+')');
				if(v.hasOwnProperty('status') && (v.status == 1)){
					layer.msg(v.msg, {icon: 1});
					location.href = location.href;
				}else {
					layer.msg(v.msg, {icon: 2,time: 1000});
				}
			}
		});
	});
}
</script>
</body>
</html>