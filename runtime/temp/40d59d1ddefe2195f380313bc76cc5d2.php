<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:41:"./template/pc/tfs/partner\apply_info.html";i:1504950247;s:34:"./template/pc/tfs/user\header.html";i:1512197568;s:32:"./template/pc/tfs/user\menu.html";i:1519984571;s:42:"./template/pc/tfs/public\footer_index.html";i:1509018228;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>补货申请详情-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
<meta name="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
<meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
<link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/css/myaccount.css" />
<link rel="shortcut  icon" type="image/x-icon" href="__STATIC__/images/favicon.ico" media="screen"  />
<script src="__STATIC__/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
<style>
.com-topyue .wacheng {width: 14%}
.com-topyue .wacheng2 {width: 83%; padding: 30px 5px;}
.liuchaar {margin-top: 40px;}
.order-alone-li th {background: #f9f9f9; height: 40px;}
.order-alone-li tr {border-bottom: 1px solid #f5f5f5;}
</style>
</head>

<body class="bg-f5">
<div class="container jf-header">
	<div class="row">
		<div class="col-md-6 col-sm-6 jf-top">
			<ul>
				<div class="islogin">
					<li class="user"><a class="red userinfo" href="<?php echo U('Home/user/index'); ?>"></a></li>
					<li><a href="<?php echo U('Home/User/message_notice'); ?>">消息</a></li>
					<li><a href="<?php echo U('Home/user/logout'); ?>">退出</a></li>
				</div>
				<div class="nologin">
					<li><a href="<?php echo U('Home/user/login'); ?>">请登录</a></li>
					<li><a href="<?php echo U('Home/user/reg'); ?>">免费注册</a></li>
				</div>
				<li>|</li>
				<li>
					<?php if(strtolower(ACTION_NAME) != 'goodsinfo'): ?>
						<link rel="stylesheet" href="__STATIC__/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
						<div class="sendaddress pr fl">
							<span style="float: left;">配 送：</span>
							<span class="list1">
								<div class="store-selector" style="margin-top: 2px;">
									<div class="text">
										<div></div>
										<b></b>
									</div>
									<div onclick="$(this).parent().removeClass('hover')" class="close"></div>
								</div>
							</span>
						</div>
						<script src="__STATIC__/js/location.js"></script>
					<?php endif; ?>
				</li>
			</ul>
			<script>
				$(function () {
					var uname = getCookie('uname');
					if (uname == '') {
						$('.islogin').remove();
						$('.nologin').show();
					} else {
						$('.nologin').remove();
						$('.islogin').show();
						$('.userinfo').html(decodeURIComponent(uname));
					}
				})
			</script>
		</div>
		<div class="col-md-6 col-sm-6 w shortcut">
			<ul class="fr">
				<li><a href="<?php echo U('Home/Order/order_list'); ?>">我的订单</a></li>
				<li class="spacer"></li>
				<li><a href="<?php echo U('Home/User/visit_log'); ?>">我的浏览</a></li>
				<li class="spacer"></li>
				<li><a href="<?php echo U('Home/User/goods_collect'); ?>">我的优惠券</a></li>
				<li class="spacer"></li>
				<li><a href="<?php echo U('Home/User/goods_collect'); ?>">我的收藏</a></li>
				<li class="spacer"></li>
				<li><a href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq2']; ?>&amp;Site=<?php echo $tpshop_config['shop_info_store_name']; ?>&amp;Menu=yes">在线客服</a></li>
				<li class="spacer"></li>
				<li class="dorpdown" id="ttbar-navs">
					<div class="dt cw-icon">网站导航<i class="iconfont">&#xe605;</i></div>
					<div class="dd dorpdown-layer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Activity/group_list'); ?>">团购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Activity/flash_sale_list'); ?>">抢购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Article/detail'); ?>">帮助中心</a></div>
				</li>
			</ul>
		</div>
	</div>
</div>
<div id="my">
	<div class="container mymall">
		<div class="row">
			<div class="col-md-3 col-sm-4">
				<dl>
					<dt><a href="<?php echo U('Home/Index/index'); ?>"><img src="__STATIC__/images/mall.png" /></a></dt>
					<dd class="one">我的商城</dd>
					<dd><a href="<?php echo U('Home/Index/index'); ?>" class="return">返回商城首页</a></dd>
				</dl>
			</div>
			<div class="col-md-3 col-sm-4 account">
				<span class="u-dl">
					<span class="u-dt text-center">
						<a href="#">账户设置 <i class="glyphicon glyphicon-chevron-down"></i></a>
					</span>
					<span class="u-dd">
						<a href="<?php echo U('Home/User/info'); ?>">个人信息</a>
						<a href="<?php echo U('Home/User/address_list'); ?>">收货地址</a>
					</span>
				</span>
				<a href="<?php echo U('Home/User/message_notice'); ?>" style="margin-left: 10%">消息</a>
				<a href="<?php echo U('Home/Goods/integralMall'); ?>" style="margin-left: 10%">积分商城</a>
			</div>
			<div class="col-md-3 col-sm-2">
				<div class="search">
					<div class="search-m">
						<div class="form">
							<form id="sourch_form" id="sourch_form" method="post" action="<?php echo U('Home/Goods/search'); ?>">
								<input type="text" id="q" name="q" class="text" value="<?php echo \think\Request::instance()->param('q'); ?>" />
								<button onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();" class="button"><i class="iconfont"><img src="__STATIC__/images/search.png" /></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-2">
				<div class="settleup">
					<div class="cw-icon">
						<i class="iconfont"><img src="__STATIC__/images/che.png" /></i>
						<a href="<?php echo U('Home/Cart/cart'); ?>">我的购物车<b>&nbsp;&nbsp;<span>(<em class="sc_z" id="cart_quantity"></em>)</span></b></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--mymall end-->
</div>
<!--my end-->

<div class="home-index-middle">
	<div class="w1224">
		<div class="g-crumbs">
			<?php if(is_array($navigate_user) || $navigate_user instanceof \think\Collection || $navigate_user instanceof \think\Paginator): $i = 0; $__LIST__ = $navigate_user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<a href="<?php echo $vo; ?>"><?php echo $key; ?></a><?php if($i != count($navigate_user)): ?><i class="litt-xyb"></i><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="home-main">
			<div class="col-md-2 col-sm-3 col-lg-2 my_left">
	<ul>
		<p class="top"><img src="__STATIC__/images/xiaoren.png" /> 我的商城</p>

		<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>交易中心</li>
		<li><a href="<?php echo U('Home/Order/order_list'); ?>">我的订单</a></li>
		<li><a href="<?php echo U('Home/Order/comment'); ?>">我的评价</a></li>

		<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>资产中心</li>
		<li><a href="<?php echo U('Home/User/recharge'); ?>">账户余额</a></li>
		<li><a href="<?php echo U('Home/User/account'); ?>">我的积分</a></li>
		<li><a href="<?php echo U('Home/User/coupon'); ?>">我的优惠券</a></li>

		<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>关注中心</li>
		<li><a href="<?php echo U('Home/User/goods_collect'); ?>">我的收藏</a></li>
		<li><a href="<?php echo U('Home/User/visit_log'); ?>">我的足迹</a></li>

		<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>个人中心</li>
		<li><a href="<?php echo U('Home/User/info'); ?>">个人信息</a></li>
		<li><a href="<?php echo U('Home/User/address_list'); ?>">地址管理</a></li>
		<li><a href="<?php echo U('Home/User/safety_settings'); ?>">安全设置</a></li>

		<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>服务中心</li>
		<li><a href="<?php echo U('Home/Order/return_goods_list'); ?>">退货管理</a></li>
	</ul>

	<?php if($user['level'] == 9 || $user['level'] == 8): ?>
	<ul>
		<p class="top"> 管理中心</p>

		<?php if($user['level'] == 9): ?>
			<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>工厂店管理</li>
			<li><a href="<?php echo U('Home/Store/order_list'); ?>">工厂店订单</a></li>
			<li><a href="<?php echo U('Home/Store/return_goods_list'); ?>">退换货管理</a></li>
			<li><a href="<?php echo U('Home/Store/store_stock_list'); ?>">工厂店库存</a></li>
			<li><a href="<?php echo U('Home/Store/stock_log'); ?>">库存日志</a></li>
			<li><a href="<?php echo U('Home/Store/apply'); ?>">补货申请记录</a></li>
			<li><a href="<?php echo U('Home/Store/delivery'); ?>">发货单</a></li>
			<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>会员管理</li>
			<li><a href="<?php echo U('Home/Order/lower_list'); ?>">店会员</a></li>
		<?php endif; if($user['level'] == 8): ?> <!-- 用户等级为合伙人 -->
			<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>工厂店管理</li>
			<li><a href="<?php echo U('Home/Partner/storeList'); ?>">工厂店列表</a></li>
			<li><a href="<?php echo U('Home/Partner/orderList'); ?>">工厂店订单</a></li>
			<li><a href="<?php echo U('Home/Partner/store_apply'); ?>">工厂店补货申请</a></li>
			<li><a href="<?php echo U('Home/Partner/delivery'); ?>">配货单</a></li>

			<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>库存管理</li>
			<li><a href="<?php echo U('Home/Partner/stockList'); ?>">库存列表</a></li>
			<li><a href="<?php echo U('Home/Partner/stockLog'); ?>">库存日志</a></li>
			<li><a href="<?php echo U('Home/Partner/apply'); ?>">补货申请</a></li>
			<li><a href="<?php echo U('Home/Partner/invoiceList'); ?>">发货单</a></li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
</div>
			<div class="ri-menu fr">
				<div class="menumain p">
					<div class="com-topyue">
						<div class="wacheng fl">
							<?php if($info['status'] == 0): ?>
								<h3 style="font: 700 16px/34px 'Microsoft YaHei';color: #e4393c; padding-top:65px;">等待管理员审核</h3>
							<?php endif; if(($info['status'] == 1) AND (empty($info['confirm_time']))): ?>
								<p class="ddn1"><span>物流名称：</span><span><?php echo $info['express_name']; ?></span></p>
								<p class="ddn1"><span>物流单号：</span><span><?php echo $info['express_code']; ?></span></p>
								<a class="ddn3" style="margin-top:20px;" href="javascript:;" onclick="order_confirm(<?php echo $info['delivery_id']; ?>)">确认收货</a>
							<?php endif; if(($info['status'] == 1) AND ($info['confirm_time'])): ?>
								<p class="ddn1"><span>物流名称：</span><span><?php echo $info['express_name']; ?></span></p>
								<p class="ddn1"><span>物流单号：</span><span><?php echo $info['express_code']; ?></span></p>
								<h3 class="ddn2">已完成</h3>
							<?php endif; if($info['status'] == 2): ?>
								<h3 style="font: 700 24px/34px 'Microsoft YaHei';color: #e4393c; padding-top:20px;">申请失败</h3>
							<?php endif; ?>
						</div>

						<div class="wacheng2 fr">
							<div class="liuchaar p">
								<ul>
									<li>
										<div class="aloinfe">
											<i class="y-comp"></i>
											<div class="ddfon">
												<p>提交申请</p>
												<p><?php echo date('Y-m-d',$info['addtime']); ?></p>
												<p><?php echo date('H:i:s',$info['addtime']); ?></p>
											</div>
										</div>
									</li>
									<li><i class='y-comp91 <?php if($info[status] != 1): ?>top322<?php endif; ?>'></i></li>
									<li>
										<div class="aloinfe fime1">
											<i class='y-comp2 <?php if($info[status] != 1): ?>lef64<?php endif; ?>'></i>
											<div class="ddfon">
												<p>审核通过</p>
												<?php if($info['status'] == 1): ?>
												<p><?php echo date('Y-m-d',$info['edittime']); ?></p>
												<p><?php echo date('H:i:s',$info['edittime']); ?></p>
												<?php endif; ?>
											</div>
										</div>
									</li>
									<li><i class='y-comp91 <?php if(empty($info[express_code]) == true): ?>top322<?php endif; ?>'></i></li>
									<li>
										<div class="aloinfe fime2">
											<i class='y-comp3 <?php if(empty($info[express_code]) == true): ?>lef64<?php endif; ?>'></i>
											<div class="ddfon">
												<p>管理员发货</p>
												<?php if($info[express_code]): ?>
													<p><?php echo $info['delivery_time']; ?></p>
												<?php endif; ?>
											</div>
										</div>
									</li>
									<li><i class='y-comp91 <?php if(empty($info[express_code]) == true): ?>top322<?php endif; ?>'></i></li>
									<li>
										<div class="aloinfe fime3">
											<i class='y-comp4 <?php if(empty($info[express_code]) == true): ?>lef64<?php endif; ?>'></i>
											<div class="ddfon">
												<p>等待收货</p>
												<?php if($info[delivery_time] > 0): ?>
													<p><?php echo $info['delivery_time']; ?></p>
												<?php endif; ?>
											</div>
										</div>
									</li>
									<li><i class='y-comp91 <?php if(empty($info[confirm_time]) == true): ?>top322<?php endif; ?>'></i></li>
									<li>
										<div class="aloinfe fime4">
											<i class='y-comp5 <?php if(empty($info[confirm_time]) == true): ?>lef64<?php endif; ?>'></i>
											<div class="ddfon">
												<p>完成</p>
												<?php if($info[confirm_time]): ?>
													<p><?php echo $info['confirm_time']; ?></p>
												<?php endif; ?>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="beenovercom">
						<div class="shoptist">
							<span><?php echo $tpshop_config['shop_info_store_name']; ?><a href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq']; ?>&Site=<?php echo $tpshop_config['shop_info_store_name']; ?>&Menu=yes" target="_blank"><i class="y-comp9"></i></a></span>
						</div>
						<div class="order-alone-li">
							<table width="100%">
								<thead>
									<tr>
										<th>商品名称</th>
										<th>商品编号</th>
										<th>数量</th>
									</tr>
								</thead>
								<tbody>
									<?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<tr class="conten_or">
										<td class="sx1">
											<div class="shop-if-dif">
												<div class="shop-difimg">
													<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$vo['goods_id'])); ?>"><img src="<?php echo goods_thum_images($vo['goods_id'],78,78); ?>"></a>
												</div>
												<div class="cebigeze">
													<div class="shop_name"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$vo['goods_id'])); ?>"><?php echo $vo['goods_name']; ?></a></div>
													<p class="mayxl"><?php echo $vo['spec_key_name']; ?></p>
												</div>
											</div>
										</td>
										<td class="sx2"><?php echo $vo['goods_sn']; ?></td>
										<td class="sx3">
											<span><?php echo $vo['goods_num']; ?></span>
										</td>
									</tr>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--footer-s-->
<div class="footer p">
	<div class="mod_service_inner">
        <div class="w1224">
            <ul>
                <li>
                    <div class="mod_service_unit">
                        <h5 class="mod_service_duo">多</h5>
                        <p>品类齐全，轻松购物</p>
                    </div>
                </li>
                <li>
                    <div class="mod_service_unit">
                        <h5 class="mod_service_kuai">快</h5>
                        <p>多仓直发，极速配送</p>
                    </div>
                </li>
                <li>
                    <div class="mod_service_unit">
                        <h5 class="mod_service_hao">好</h5>
                        <p>正品行货，精致服务</p>
                    </div>
                </li>
                <li>
                    <div class="mod_service_unit">
                        <h5 class="mod_service_sheng">省</h5>
                        <p>天天低价，畅选无忧</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
<div class="w1224">
    <div class="footer-ewmcode">
        <div class="foot-list-fl">
            <?php
                                   
                                $md5_key = md5("select * from `__PREFIX__article_cat` where parent_id = 2");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from `__PREFIX__article_cat` where parent_id = 2"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>
                <ul>
                    <li class="foot-th">
                        <?php echo $v[cat_name]; ?>
                    </li>
                    <?php
                                   
                                $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1");
                                $result_name = $sql_result_v2 = S("sql_".$md5_key);
                                if(empty($sql_result_v2))
                                {                            
                                    $result_name = $sql_result_v2 = \think\Db::query("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1"); 
                                    S("sql_".$md5_key,$sql_result_v2,1);
                                }    
                              foreach($sql_result_v2 as $k2=>$v2): ?>
                        <li>
                            <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id])); ?>"><?php echo $v2[title]; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </div>
        <div class="QRcode-fr">
            <ul>
                <li class="foot-th">客户端</li>
                <li><img src="__STATIC__/images/qrcode.png"/></li>
            </ul>
            <ul>
                <li class="foot-th">微信</li>
                <li><img src="__STATIC__/images/qrcode.png"/></li>
            </ul>
        </div>
    </div>
    <div class="mod_copyright p">
        <div class="grid-top">
            <?php
                                   
                                $md5_key = md5("select * from `__PREFIX__article` where cat_id = 5 and is_open=1");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from `__PREFIX__article` where cat_id = 5 and is_open=1"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>
                <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v[article_id])); ?>"><?php echo $v[title]; ?></a>
                <span>|</span>
            <?php endforeach; ?>
            <a href="javascript:void (0);">客服热线:<?php echo $tpshop_config['shop_info_phone']; ?></a>
        </div>
        <p>Copyright © 2016-2025 <?php echo (isset($tpshop_config['shop_info_store_name']) && ($tpshop_config['shop_info_store_name'] !== '')?$tpshop_config['shop_info_store_name']:'TPshop商城'); ?> 版权所有 保留一切权利 备案号:<?php echo $tpshop_config['shop_info_record_no']; ?></p>

        <p class="mod_copyright_auth">
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_1" href="" target="_blank">经营性网站备案中心</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_2" href="" target="_blank">可信网站信用评估</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_3" href="" target="_blank">网络警察提醒你</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_4" href="" target="_blank">诚信网站</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_5" href="" target="_blank">中国互联网举报中心</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_6" href="" target="_blank">网络举报APP下载</a>
        </p>
    </div>
</div>
</div>
<!--footer-e-->
</body>
</html>
<script>
//确定收货
function order_confirm(id){
	layer.confirm("你确定收到货了吗?",{
		btn:['确定','取消']
	},function(){
		$.ajax({
			type : 'post',
			url : '/index.php?m=Home&c=Partner&a=invoice_confirm&id='+id,
			dataType : 'json',
			success : function(data){
				if(data.status == 1){
					showErrorMsg(data.msg);
					location.reload();
				}else{
					showErrorMsg(data.msg);
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				showErrorMsg('网络失败，请刷新页面后重试');
			}
		})
	}, function(index){
		layer.close(index);
	});
}
</script>
