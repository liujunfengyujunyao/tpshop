<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:48:"./application/admin/view2/order\return_info.html";i:1512439955;s:44:"./application/admin/view2/public\layout.html";i:1519984569;}*/ ?>
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
 
<style type="text/css">
html, body {
	overflow: visible;
}
</style>  
<body style="background-color: #FFF; overflow: auto;">
<div id="toolTipLayer" style="position: absolute; z-index: 9999; display: none; visibility: visible; left: 95px; top: 573px;"></div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title"><a class="back" href="<?php echo U('/Admin/Order/return_list'); ?>" title="微信公众号配置"><i class="fa fa-arrow-circle-o-left"></i></a>
      <div class="subject">
        <h3>退换货详情</h3>
        <h5>用户提交退换货详情</h5>
      </div>
    </div>
  </div>
<?php if($return_goods['status'] == 0): ?>
    <form class="form-horizontal" method="post" id="return_form"  name="return_form" action="<?php echo U('Admin/Order/return_info'); ?>">
            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label>订单编号</label>
                    </dt>
                    <dd class="opt">
                        <a href="<?php echo U('Admin/order/detail',array('order_id'=>$return_goods['order_id'])); ?>"><?php echo $return_goods['order_sn']; ?></a>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="cate_id">用户</label>
                    </dt>
                    <dd class="opt">
                        <?php echo $user['nickname']; ?>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>申请日期</label>
                    </dt>
                    <dd class="opt">
                        <?php echo date("Y-m-d H:i",$return_goods['addtime']); ?>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label >商品名称</label>
                    </dt>
                    <dd class="opt">
                        <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$return_goods[goods_id])); ?>" target="_blank"><?php echo $goods[goods_name]; ?></a>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>服务类型</label>
                    </dt>
                    <dd class="opt">
                    	<?php if($return_goods['type'] == 0): ?> 仅退款<?php endif; if($return_goods['type'] == 1): ?> 退货退款<?php endif; if($return_goods['type'] == 2): ?> 换货<?php endif; ?>
                    </dd>
                </dl>
                <?php if($return_goods['type'] < 2): ?>
                <dl class="row">
                    <dt class="tit">
                        <label>退款详情</label>
                    </dt>
                    <dd class="opt">
                    	<?php if($return_goods['refund_money'] > 0): ?> <label>需退还金额 ：<input type="text" name="refund_money" value="<?php echo $return_goods['refund_money']; ?>"></label><?php endif; if($return_goods['refund_deposit'] > 1): ?> <label>需退还余额 ：<input type="text" name="refund_deposit" value="<?php echo $return_goods['refund_deposit']; ?>"></label><?php endif; if($return_goods['refund_integral'] > 2): ?> <label>需退还积分：<input type="text" name="refund_integral" value="<?php echo $return_goods['refund_integral']; ?>"></label><?php endif; ?>
                    </dd>
                </dl>
                <?php endif; ?>
                <dl class="row">
                    <dt class="tit">
                        <label>退货原因</label>
                    </dt>
                    <dd class="opt">
                     <?php echo $return_goods['reason']; ?>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>退货描述</label>
                    </dt>
                    <dd class="opt">
                     <?php echo $return_goods['describe']; ?>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>用户上传照片</label>
                    </dt>
                    <dd class="opt">
                        <?php if(is_array($return_goods[imgs]) || $return_goods[imgs] instanceof \think\Collection || $return_goods[imgs] instanceof \think\Paginator): $i = 0; $__LIST__ = $return_goods[imgs];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                            <a target="_blank" href="<?php echo $item; ?>"><img src="<?php echo $item; ?>" width="85" height="85" /></a>&nbsp;&nbsp;&nbsp;
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dd>
                </dl>
                <?php if($return_goods['is_receive'] == 1 and $return_goods['status'] == 1): ?>
                    <dl class="row">
                        <dt class="tit">
                            <label>换货物流信息</label>
                        </dt>
                        <dd class="opt">
                           	 快递公司：<input type="text" name="seller_delivery[express_name]">
                           	 快递单号：<input type="text" name="seller_delivery[express_sn]">
                        </dd>
                    </dl>
                <?php endif; if($return_goods['status'] == 0): ?>
                <dl class="row">
                    <dt class="tit">
                        <label>审核意见</label>
                    </dt>
                    <dd class="opt">
                        <label><input type="radio" name="status" checked value="1">审核通过</label>
                        <label><input type="radio" name="status" value="-1">拒绝通过</label>
                    </dd>
                </dl>
                <?php endif; ?>
                <dl class="row">
                    <dt class="tit">
                        <label>处理备注</label>
                    </dt>
                    <dd class="opt">
                        <textarea name="remark" id="remark" style="width:300px; height:120px;"  placeholder="退货描述" class="tarea" id="subject_desc"><?php echo $return_goods['remark']; ?></textarea>
                    </dd>
                </dl>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="bot"><a href="JavaScript:;" onClick="document.return_form.submit()" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
            </div>
        </form>
<?php else: ?>
    <div class="ncap-form-default">
        <dl class="row">
            <dt class="tit">
                <label>订单编号</label>
            </dt>
            <dd class="opt">
                <a href="<?php echo U('Admin/order/detail',array('order_id'=>$return_goods['order_id'])); ?>"><?php echo $return_goods['order_sn']; ?></a>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label for="cate_id">用户</label>
            </dt>
            <dd class="opt">
                <?php echo $user['nickname']; ?>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label>申请日期</label>
            </dt>
            <dd class="opt">
                <?php echo date("Y-m-d H:i",$return_goods['addtime']); ?>
            </dd>
        </dl>
        <?php if($return_goods['type'] < 2): ?>
         <dl class="row">
             <dt class="tit">
                 <label>退款详情</label>
             </dt>
             <dd class="opt">
                 <form method="post" id='return_money' action="">
                     <input hidden name="user_id" value="<?php echo $return_goods[user_id]; ?>"/>
                     <input hidden name="return_id" value="<?php echo $return_goods[id]; ?>"/>
                    <?php if($return_goods['refund_money'] > 0): ?>
                        <label>需退还金额 ：<input type="text" name="refund_money" value="<?php echo $return_goods['refund_money']; ?>"></label>
                    <?php endif; if($return_goods['refund_deposit'] > 0): ?>
                        <label>需退还余额 ：<input type="text" name="refund_deposit" value="<?php echo $return_goods['refund_deposit']; ?>"></label>
                    <?php endif; if($return_goods['refund_integral'] > 0): ?>
                        <label>需退还积分：<input type="text" name="refund_integral" value="<?php echo $return_goods['refund_integral']; ?>"></label>
                    <?php endif; ?>
                 </form>
             </dd>
         </dl>
         <?php endif; ?>
        <dl class="row">
            <dt class="tit">
                <label >商品名称</label>
            </dt>
            <dd class="opt">
                <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$return_goods[goods_id])); ?>" target="_blank"><?php echo $goods[goods_name]; ?></a>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label>处理方式</label>
            </dt>
            <dd class="opt">
                <?php if($return_goods['type'] < 2 and $return_goods['status'] == 1): if(($order[pay_code] == 'alipay') or ($order[pay_code] == 'alipayMobile')  or ($order[pay_code] == 'weixin')): ?>
	                    <a class="ncap-btn ncap-btn-green"  href="<?php echo U('Admin/Order/refund_back',array('id'=>$return_goods[id])); ?>">支付原路退回</a>
	                <?php else: ?>
	                	<a class="ncap-btn ncap-btn-green return_money" data-href="<?php echo U('Admin/Order/account_edit'); ?>">退款到用户余额</a>
	                <?php endif; endif; ?>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label>售后申请原因</label>
            </dt>
            <dd class="opt">
               <?php echo $return_goods['reason']; ?>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label>售后申请描述</label>
            </dt>
            <dd class="opt">
             <?php echo $return_goods['describe']; ?>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label>用户上传照片</label>
            </dt>
            <dd class="opt">
                <?php if(is_array($return_goods[imgs]) || $return_goods[imgs] instanceof \think\Collection || $return_goods[imgs] instanceof \think\Paginator): $i = 0; $__LIST__ = $return_goods[imgs];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                    <a target="_blank" href="<?php echo $item; ?>"><img src="<?php echo $item; ?>" width="85" height="85" /></a>&nbsp;&nbsp;&nbsp;
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dd>
        </dl>
        <dl class="row">
            <dt class="tit">
                <label>状态</label>
            </dt>
            <dd class="opt">
                <?php if($return_goods[status] == -2): ?>已取消<?php endif; if($return_goods[status] == -1): ?>审核未通过<?php endif; if($return_goods[status] == 1): ?>审核通过<?php endif; if($return_goods[status] == 2): ?>已发货<?php endif; if($return_goods[status] == 3): ?>已完成<?php endif; ?>
            </dd>
        </dl>
        <?php if($return_goods[type] == 1 and $return_goods[status] > 1): ?>
            <dl class="row">
                <dt class="tit">
                    <label>换货物流信息</label>
                </dt>
                <dd class="opt">
                   <p>快递公司：<?php echo $return_goods[seller_delivery][express_name]; ?></p>
                    <p>快递单号：<?php echo $return_goods[seller_delivery][express_sn]; ?></p>
                    <p>发货时间：<?php echo $return_goods[seller_delivery][express_time]; ?></p>
                </dd>
            </dl>
        <?php endif; ?>
        <dl class="row">
            <dt class="tit">
                <label>处理备注</label>
            </dt>
            <dd class="opt">
               <?php echo $return_goods['remark']; ?>
            </dd>
        </dl>
        <?php if($return_goods['type'] == 2 and $return_goods[status] == 1): ?>
            <form class="form-horizontal" method="post"  name="return_form" action="<?php echo U('Admin/Order/return_info'); ?>">
                <dl class="row">
                    <dt class="tit">
                        <label>换货物流信息</label>
                    </dt>
                    <dd class="opt">
                        <p>快递公司：<input type="text" id="express_name" name="seller_delivery[express_name]"></p>
                        <p>快递单号：<input type="text" id="express_sn" name="seller_delivery[express_sn]" onkeyup="this.value=this.value.replace(/[^\d]/g,'')"></p>
                    </dd>
                </dl>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="status" value="3">
                <div class="bot"><a href="JavaScript:;" onClick="returnform()" class="ncap-btn-big ncap-btn-green" >确认提交</a></div>
            </form>
            <script>
                function returnform(){
                   var express_name = $.trim($('#express_name').val());
                   var express_sn = $.trim($('#express_sn').val());
                    if(express_name == '' || express_sn == '' ){
                        layer.msg('请填写物流信息',{icon:3});
                        return false;
                    }
                    document.return_form.submit();
                }
            </script>
        <?php endif; ?>
    </div>
<?php endif; ?>
</div>
<script>
   $(document).on('click','.return_money',function(){
        $.ajax({
            type : "POST",
            url: $(this).data('href'),
            data:$('#return_money').serialize(),
            dataType:'json',
            async:false,
            success: function(data){
                if(data.status ==1){
                    layer.alert(data.msg, {icon: 1});
                    window.location.href=data.url;
                }else{
                    layer.alert(data.msg, {icon: 2});
                }
            },
            error:function(){
                layer.alert('网络连接失败，请稍后再试！',{icon: 2});
            }
        });
    })
</script>
</body>
</html>