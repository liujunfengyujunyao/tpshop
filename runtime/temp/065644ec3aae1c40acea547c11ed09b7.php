<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:39:"./template/pc/tfs/order\order_list.html";i:1513818157;s:34:"./template/pc/tfs/user\header.html";i:1512197568;s:32:"./template/pc/tfs/user\menu.html";i:1519984571;s:36:"./template/pc/tfs/public\footer.html";i:1519984596;s:42:"./template/pc/tfs/public\sidebar_cart.html";i:1519984596;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
	<meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
	<title>我的订单-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
	<link href="__STATIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="__STATIC__/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="__STATIC__/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="__STATIC__/js/common.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
	<script src="__PUBLIC__/js/pc_common.js"></script>
	<script src="__STATIC__/js/common.js"></script>
	<script src="__PUBLIC__/js/layer/layer.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $tpshop_config['shop_info_store_logo']; ?>" media="screen" />
</head>
<body>
<div id="order_list">
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


	<div class="container">
		<?php $pid =407;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1520211600 and end_time > 1520211600 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select();
if(!in_array($pid,array_keys($ad_position)) && $pid)
{
  M("ad_position")->insert(array(
         "position_id"=>$pid,
         "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ",
         "is_open"=>1,
         "position_desc"=>CONTROLLER_NAME."页面",
  ));
  delFile(RUNTIME_PATH); // 删除缓存
  \think\Cache::clear();  
}


$c = 1- count($result); //  如果要求数量 和实际数量不一样 并且编辑模式
if($c > 0 && I("get.edit_ad"))
{
    for($i = 0; $i < $c; $i++) // 还没有添加广告的时候
    {
      $result[] = array(
          "ad_code" => "/public/images/not_adv.jpg",
          "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid",
          "title"   =>"暂无广告图片",
          "not_adv" => 1,
          "target" => 0,
      );  
    }
}
foreach($result as $key=>$v):       
    
    $v[position] = $ad_position[$v[pid]]; 
    if(I("get.edit_ad") && $v[not_adv] == 0 )
    {
        $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; // 广告半透明的样式
        $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]";        
        $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name];
        $v[target] = 0;
    }
    ?>
			<a href="<?php echo $v['ad_link']; ?>"><img src="<?php echo $v['ad_code']; ?>" width="100%" /></a>
		<?php endforeach; ?>
	</div>

	<div class="container mine">
		<div class="row my_mall">
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
			<div class="col-md-10 col-sm-9 col-lg-10">
				<div>
					<ol class="breadcrumb">
						<li><i class="glyphicon glyphicon-home"></i></li>
						<li><a href="<?php echo U('Home/User/index'); ?>">用户中心</a></li>
						<li class="active">我的订单</li>
					</ol>
				</div>
				<div class="my_right">
					<div class="per_main_r">
						<ul class="list-inline order_title">
							<li>
								<a href="<?php echo U('Order/order_list'); ?>" class="<?php if(\think\Request::instance()->param('type') == ''): ?>selected<?php endif; ?>"><span>全部订单</span></a>
							</li>
							<li>
								<a href="<?php echo U('Order/order_list',array('type'=>'WAITPAY')); ?>" class="<?php if(\think\Request::instance()->param('type') == 'WAITPAY'): ?>selected<?php endif; ?>"><span>待付款</span></a>
							</li>
							<li>
								<a href="<?php echo U('Order/order_list',array('type'=>'WAITSEND')); ?>" class="<?php if(\think\Request::instance()->param('type') == 'WAITSEND'): ?>selected<?php endif; ?>"><span>待发货</span></a>
							</li>
							<li>
								<a href="<?php echo U('Order/order_list',array('type'=>'WAITRECEIVE')); ?>" class="<?php if(\think\Request::instance()->param('type') == 'WAITRECEIVE'): ?>selected<?php endif; ?>""><span>待收货</span></a>
							</li>
							<li><a href="<?php echo U('Order/comment',array('status'=>'0')); ?>"><span>待评价</span></a></li>
							<li><a href="<?php echo U('Order/return_goods_list'); ?>"><span>退货</span></a></li>
						</ul>

						<form id="search_order" action="<?php echo U('Order/order_list'); ?>" method="post">
							<ul class="good_back">
								<li>
									<label>订单编号:</label>
									<input type="text" class="form-control" value="<?php echo \think\Request::instance()->param('search_key'); ?>" name="search_key" />
								</li>
								<li>
									<label>下单时间:</label>
									<select class="form-control" name="time">
										<option value="0">全部</option>
										<option value="1" <?php if(\think\Request::instance()->param('time') == 1): ?>selected<?php endif; ?>>近三个月</option>
										<option value="2" <?php if(\think\Request::instance()->param('time') == 2): ?>selected<?php endif; ?>>三个月以前</option>
									</select>
								</li>
								<li><input type="submit" value="搜索" class="btn btn-danger" /></li>
							</ul>
						</form>
						<div class="stock_list_main">
							<ul class="text-center order_list_title">
								<li class="fx1">商品信息</li>
								<li class="fx2">单价</li>
								<li class="fx3">数量</li>
								<li class="fx4">订单总金额</li>
								<li class="fx5">订单状态</li>
							</ul>
							<?php if(empty($lists) || (($lists instanceof \think\Collection || $lists instanceof \think\Paginator ) && $lists->isEmpty())): ?>
								<h5 class="text-center">
									您还没有订单，<a href="/">快去逛逛吧~</a>
								</h5>
							<?php else: if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
									<div class="goods_list">
										<table class="table order_list_goods">
											<tr class="active">
												<td colspan="5">
													<div class="pull-left">
														<span>
															订单编号：
															<?php if($list[order_prom_type] == 5): ?>
																<a href="<?php echo U('Order/virtual_order',array('order_id'=>$list['order_id'])); ?>"><?php echo $list['order_sn']; ?></a>
																<?php else: ?>
																<a href="<?php echo U('Order/order_detail',array('id'=>$list['order_id'])); ?>"><?php echo $list['order_sn']; ?></a>
															<?php endif; ?>
														</span>
														<span>下单时间：<?php echo date('Y-m-d H:i:s',$list['add_time']); ?></span>
													</div>

													<div class="pull-right order-btn">
														<?php if($list['pay_btn'] == 1): ?>
															<a class="btn btn-danger" href="<?php echo U('Home/Cart/cart4',array('order_id'=>$list[order_id])); ?>" target="_blank">立即支付</a>
														<?php endif; if($list['shop_way'] == 1): if(($list['order_status'] == 1) and ($list['shipping_status'] == 1)): ?>
																<a class="btn btn-danger" href="javascript:;" onclick="order_confirm(<?php echo $list['order_id']; ?>);">确认收货</a>
															<?php endif; elseif($list['shop_way'] != 1): if($list['order_status'] == 6): ?>
																<a class="btn btn-danger" href="javascript:;" onclick="order_confirm(<?php echo $list['order_id']; ?>);">确认收货</a>
															<?php endif; endif; if($list['cancel_btn'] == 1): if($list[pay_status] == 0): ?>
																<a href="javascript:void(0);" onClick="cancel_order(<?php echo $list['order_id']; ?>)">取消订单</a>
															<?php else: ?>
																<a href="javascript:void(0);" data-url="<?php echo U('Home/Order/refund_order',array('order_id'=>$list[order_id])); ?>" onClick="refund_order(this)">取消订单</a>
															<?php endif; endif; if($list['cancel_info'] == 1): ?>
															<a href="<?php echo U('Order/cancel_order_info',array('order_id'=>$list[order_id])); ?>">取消详情</a>
														<?php endif; if(($list[comment_btn] == 1) and ($goods[is_comment] == 0)): ?>
															<a href="<?php echo U('Home/Order/comment',array('status'=>0)); ?>" class="style-red">评价晒单</a>
														<?php endif; ?>
													</div>
												</td>
											</tr>

											<?php if(is_array($list['goods_list']) || $list['goods_list'] instanceof \think\Collection || $list['goods_list'] instanceof \think\Paginator): $k = 0; $__LIST__ = $list['goods_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($k % 2 );++$k;if($k == 1): ?>
													<tr>
														<td width="36%" align="left">
															<div class="goods_img">
																<div class="goods_img_pic">
																	<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>"><img src="<?php echo goods_thum_images($goods['goods_id'],60,60); ?>" width="60" height="60" /></a>
																</div>
																<div class="goods_img_title">
																	<p>
																		<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>"><?php echo $goods['goods_name']; ?></a>
																	</p>
																</div>
																<div class="clearfix"></div>
																<div class="text-left goods_sn">商品货号：<?php echo $goods['goods_sn']; ?></div>
															</div>
														</td>
														<td width="17%"><p>￥<?php echo $goods['member_goods_price']; ?></p></td>
														<td width="17%">
															<p>x<?php echo $goods['goods_num']; ?></p>
															<?php if($goods[is_send] > 1): ?>
																<p class="fsx-1">已申请售后</p>
															<?php elseif(($list[return_btn] == 1) and ($list[shipping_status] == 1)): ?>
																<p><a href="<?php echo U('Home/Order/return_goods',array('rec_id'=>$goods['rec_id'])); ?>" class="fsx-1">申请售后</a></p>
															<?php endif; ?>
														</td>
														<td width="15%" rowspan="<?php echo count($list['goods_list']); ?>" class="sx1">
															<p>￥<?php echo $list['total_amount']; ?></p>
															<p class="fsx-1"><?php echo $list['pay_name']; ?></p>
														</td>
														<td width="15%" rowspan="<?php echo count($list['goods_list']); ?>" class="sx1">
															<p class="fsx-1"><?php echo $list['order_status_desc']; ?></p>
															<p>
																<?php if($list[order_prom_type] == 5): ?>
																	<a href="<?php echo U('Order/virtual_order',array('order_id'=>$list['order_id'])); ?>">订单详情</a>
																<?php else: ?>
																	<a href="<?php echo U('Order/order_detail',array('id'=>$list['order_id'])); ?>">订单详情</a>
																<?php endif; ?>
															</p>
														</td>
													</tr>
												<?php else: ?>
													<tr>
														<td width="36%" align="left">
															<div class="goods_img">
																<div class="goods_img_pic">
																	<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>"><img src="<?php echo goods_thum_images($goods['goods_id'],60,60); ?>" width="60" height="60" /></a>
																</div>
																<div class="goods_img_title">
																	<p>
																		<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>"><?php echo $goods['goods_name']; ?></a>
																	</p>
																</div>
																<div class="clearfix"></div>
																<div class="text-left goods_sn">商品货号：<?php echo $goods['goods_sn']; ?></div>
															</div>
														</td>
														<td width="17%"><p>￥<?php echo $goods['member_goods_price']; ?></p></td>
														<td width="17%">
															<p>x<?php echo $goods['goods_num']; ?></p>
															<?php if($goods[is_send] > 1): ?>
																<p class="fsx-1">已申请售后</p>
															<?php elseif(($list[return_btn] == 1) and ($list[shipping_status] == 1)): ?>
																<p><a href="<?php echo U('Home/Order/return_goods',array('rec_id'=>$goods['rec_id'])); ?>" class="fsx-1">申请售后</a></p>
															<?php endif; ?>
														</td>
													</tr>
												<?php endif; endforeach; endif; else: echo "" ;endif; ?>
										</table>
									</div>
								<?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</div>
					</div>
					<div class="eva_page">
						<?php echo $page; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--footer-s-->
<div id="foot">
    <div class="gray">
        <div class="Promise">
            <dl>
                <dt><img src="__STATIC__/images/xing.png" /></dt>
                <dd class="pin">品质保障</dd>
                <dd>Quality assurance</dd>
            </dl>
            <dl>
                <dt><img src="__STATIC__/images/hua.png" /></dt>
                <dd class="pin">联系客服</dd>
                <dd>Contact Customer Service</dd>
            </dl>
            <dl class="shou">
                <dt><img src="__STATIC__/images/you.png" /></dt>
                <dd class="pin">售后无忧</dd>
                <dd>Worry free after sale</dd>
            </dl>
        </div>
    </div>
    <div class="clear"></div>
    <div class="footend">
        <div class="endone">
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
                    <?php if($v['show_in_nav'] == 1): ?>
                        <li class="Shopping"><?php echo $v[cat_name]; ?></li>
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
                                <?php if($v2['link']): ?>
                                    <a href="<?php echo $v2['link']; ?>"><?php echo $v2[title]; ?></a>
                                <?php else: ?>
                                    <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id])); ?>"><?php echo $v2[title]; ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; endif; ?>
                </ul>
            <?php endforeach; ?>

            <p class="code"><img src="__STATIC__/images/qrcode.jpg" width="50%"/></br>手机扫码注册</p>
            <div class="clear"></div>
        </div>
        <p class="write"></p>
        <p class="bjtfs">
            <!--联系电话：<?php echo $tpshop_config['shop_info_phone']; ?><br/>地址：<?php echo $shop_info_address; ?><br/>-->
            Copyright &copy; <?php echo (isset($tpshop_config['shop_info_store_name']) && ($tpshop_config['shop_info_store_name'] !== '')?$tpshop_config['shop_info_store_name']:'肽风尚商城'); ?> 版权所有，保留一切权利。备案号：<a
                href="http://www.miibeian.gov.cn" target="_blank"><?php echo $tpshop_config['shop_info_record_no']; ?></a>
        </p>
    </div>
</div>
<div id="sidebar">
	<div class="sidebar-bg"></div>
	<div class="sidertabs tab-lis-1">
		<div class="sider-top-stra sider-midd-1">
			<div class="icon-tabe-chan icon-tabe-user">
				<a href="<?php echo U('Home/User/index'); ?>">
					<i class="share-side share-side1"></i>
					<span class="tab-tip">会员中心</span>
				</a>
			</div>
			<div class="icon-tabe-chan shop-car">
				<a href="javascript:void(0);" onclick="ajax_side_cart_list()">
					<div class="tab-cart-tip-warp-box">
						<div class="tab-cart-tip-warp">
							<i class="share-side share-side1"></i>
							<span class="tab-cart-tip">购物车</span>
							<span class="tab-cart-num J_cart_total_num" id="tab_cart_num">0</span>
						</div>
					</div>
				</a>
			</div>
			<div class="icon-tabe-chan massage">
				<a href="<?php echo U('Home/User/message_notice'); ?>" target="_blank">
					<i class="share-side share-side1"></i>
					<span class="tab-tip">消息</span>
				</a>
			</div>
		</div>
		<div class="sider-top-stra sider-midd-2">
			<div class="icon-tabe-chan collect">
				<a href="<?php echo U('Home/User/goods_collect'); ?>" target="_blank">
					<i class="share-side share-side1"></i>
					<span class="tab-tip">收藏</span>
				</a>
			</div>
			<div class="icon-tabe-chan hostry">
				<a href="<?php echo U('Home/User/visit_log'); ?>" target="_blank">
					<i class="share-side share-side1"></i>
					<span class="tab-tip">足迹</span>
				</a>
			</div>
		</div>
	</div>
	<div class="sidertabs tab-lis-2">
		<div class="icon-tabe-chan advice">
			<a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq2']; ?>&amp;Site=肽风尚商城&amp;Menu=yes" target="_blank">
				<i class="share-side share-side1"></i>
				<span class="tab-tip">在线咨询</span>
			</a>
		</div>
		<div class="icon-tabe-chan qrcode">
				<i class="share-side share-side1"></i>
                <span class="tab-tip qrewm">
                    <img src="__STATIC__/images/qrcode.jpg" width="100" height="100"/>关注公众号
                </span>
		</div>
		<div class="icon-tabe-chan comebacktop">
			<a href="">
				<i class="share-side share-side1"></i>
				<span class="tab-tip">返回顶部</span>
			</a>
		</div>
	</div>
	<div class="shop-car-sider"></div>
</div>
<!--footer-e-->
</body>
</html>

<script type="text/javascript">
	//取消订单
	function cancel_order(id) {
		layer.confirm('确定取消订单?', {
					btn: ['确定', '取消'] //按钮
				}, function () {
					// 确定
					location.href = "/index.php?m=Home&c=Order&a=cancel_order&id=" + id;
				}, function (index) {
					layer.close(index);
				}
		);
	}

	//确定收货
	function order_confirm(order_id) {
		layer.confirm("你确定收到货了吗?", {
			btn: ['确定', '取消']
		}, function () {
			$.ajax({
				type: 'post',
				url: '/index.php?m=Home&c=Order&a=order_confirm&order_id=' + order_id,
				dataType: 'json',
				success: function (data) {
					if (data.status == 1) {
						window.location.href = data.url;
					} else {
						layer.open({content: data.msg, time: 2});
						verify();
					}
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					layer.alert('网络失败，请刷新页面后重试', {icon: 2});
				}
			})
		}, function (index) {
			layer.close(index);
		});
	}

	function refund_order(obj) {
		layer.open({
			type: 2,
			title: '<b>订单取消申请</b>',
			shadeClose: true,
			shade: 0.5,
			area: ['600px', '500px'],
			content: $(obj).attr('data-url'),
		});
	}
</script>