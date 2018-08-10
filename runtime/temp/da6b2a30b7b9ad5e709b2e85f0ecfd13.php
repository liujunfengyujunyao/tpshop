<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:47:"./application/admin/view2/store\remittance.html";i:1512439955;s:44:"./application/admin/view2/public\layout.html";i:1519984569;}*/ ?>
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
				<h3>工厂店汇款记录</h3>
				<h5>网站系统工厂店负责人汇款索引与管理</h5>
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
			<li>工厂店汇款记录历史明细</li>
		</ul>
	</div>
	<div class="flexigrid">
		<div class="mDiv">
			<div class="ftitle">
				<h3>工厂店汇款记录列表</h3>
				<h5>(共<?php echo $pager->totalRows; ?>条记录)</h5>
			</div>
			<div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
			<form class="navbar-form form-inline" id="search-form" method="post" action="<?php echo U('/Admin/Store/remittance'); ?>" onsubmit="return check_form();">
				<input type="hidden" name="create_time" id="create_time" value="<?php echo $create_time; ?>">
				<div class="sDiv">
					起始时间：
					<div class="sDiv2" style="margin-right: 5px;">
						<input type="text" size="30" id="start_time" value="<?php echo $start_time; ?>" placeholder="起始时间" class="qsbox">
					</div>
					截止时间：
					<div class="sDiv2" style="margin-right: 5px;">
						<input type="text" size="30" id="end_time" value="<?php echo $end_time; ?>" placeholder="截止时间" class="qsbox">
					</div>
					<div class="sDiv2" style="margin-right: 5px;">
						<input size="30" placeholder="收款账号" value="<?php echo \think\Request::instance()->request('account_bank'); ?>" name="account_bank" class="qsbox" type="text">
					</div>
					<div class="sDiv2">
						<input size="30" placeholder="工厂店名称" value="<?php echo \think\Request::instance()->request('store_name'); ?>" name="store_name" class="qsbox" type="text">
						<input class="btn" value="搜索" type="submit">
					</div>
				</div>
			</form>
		</div>
		<div class="hDiv">
			<div class="hDivBox">
				<table cellspacing="0" cellpadding="0" width="100%">
					<thead>
					<tr>
						<th class="sign" axis="col0">
							<div style="width: 24px;"><i class="ico-check"></i></div>
						</th>
						<th align="center" abbr="article_title" axis="col3" class="">
							<div style="text-align: center; width: 50px;" class="">ID</div>
						</th>
						<th align="center" abbr="article_show" axis="col5" class="">
							<div style="text-align: center; width: 100px;" class="">工厂店名称</div>
						</th>
						<th align="center" abbr="article_time" axis="col6" class="">
							<div style="text-align: center; width: 80px;" class="">银行名称</div>
						</th>
						<th align="center" abbr="article_time" axis="col6" class="">
							<div style="text-align: center; width: 180px;" class="">银行账号</div>
						</th>
						<th align="center" abbr="article_time" axis="col6" class="">
							<div style="text-align: center; width: 100px;" class="">银行账户</div>
						</th>
						<th align="center" abbr="article_time" axis="col6" class="">
							<div style="text-align: center; width: 100px;" class="">申请金额</div>
						</th>
						<th align="center" abbr="article_time" axis="col6" class="">
							<div style="text-align: center; width: 80px;" class="">状态</div>
						</th>
						<th align="center" abbr="article_time" axis="col6" class="">
							<div style="text-align: center; width: 120px;" class="">操作时间</div>
						</th>
						<th align="center" abbr="article_time" axis="col6" class="">
							<div style="text-align: center; width: 100px;" class="">备注</div>
						</th>
					</tr>
					</thead>
				</table>
			</div>
		</div>
		<div class="bDiv" style="height: auto;" id="ajax_return">
			<div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
				<table width="100%">
					<tbody>
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<tr data-id="<?php echo $list['user_id']; ?>">
							<td class="sign">
								<div style="width: 24px;"><i class="ico-check"></i></div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 50px;"><?php echo $v['id']; ?></div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 100px;"><?php echo $v['store_name']; ?></div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 80px;"><?php echo $v['bank_name']; ?></div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 180px;">
									<?php echo $v['account_bank']; ?>
								</div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 100px;"><?php echo $v['account_name']; ?></div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 100px;"><?php echo $v['money']; ?></div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 80px;">已处理</div>
							</td>
							<td align="left" class="">
								<div style="text-align: center; width: 120px;">
									<?php echo date("Y-m-d H:i",$v['create_time']); ?>
								</div>
							</td>
							<td align="center" class="">
								<div style="text-align: center; width: 100px;"><?php echo $v['remark']; ?></div>
							</td>
						</tr>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
		</div>
		<!--分页位置-->
		<?php echo $page; ?> </div>
</div>
<script>
	$(document).ready(function(){
		// 点击刷新数据
		$('.fa-refresh').click(function(){
			location.href = location.href;
		});
		$('#flexigrid >table>tbody>tr').click(function(){
			$(this).toggleClass('trSelected');
		});

		// 选择起始日期、截止日期
		var start = {
			elem: '#start_time',
			format: 'YYYY/MM/DD',
			istime: false, //是否开启时间选择
			choose: function(datas){
				end.min = datas; //开始日选好后，重置结束日的最小日期
				end.start = datas //将结束日的初始值设定为开始日
			}
		};
		var end = {
			elem: '#end_time',
			format: 'YYYY/MM/DD',
			istime: false, //是否开启时间选择
			choose: function(datas){
				start.max = datas; //结束日选好后，重置开始日的最大日期
			}
		};

		laydate(start);
		laydate(end);
	});

	function check_form(){
		var start_time = $.trim($('#start_time').val());
		var end_time =  $.trim($('#end_time').val());

		if(start_time == '' ^ end_time == ''){
			layer.alert('请选择完整的时间间隔', {icon: 2});
			return false;
		}
		if(start_time !== '' && end_time !== ''){
			$('#create_time').val(start_time + "-" + end_time);
		}
		if(start_time == '' && end_time == ''){
			$('#create_time').val('');
		}
		return true;
	}
</script>
</body>
</html>