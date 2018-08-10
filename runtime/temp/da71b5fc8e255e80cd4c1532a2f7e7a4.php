<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:35:"./template/pc/tfs/order\income.html";i:1509018228;s:34:"./template/pc/tfs/user\header.html";i:1512197568;s:32:"./template/pc/tfs/user\menu.html";i:1519984571;s:36:"./template/pc/tfs/public\footer.html";i:1519984596;s:42:"./template/pc/tfs/public\sidebar_cart.html";i:1519984596;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>推广收益订单</title>
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/myaccount.css" />
		<script src="__STATIC__/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
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
				<a href="<?php echo U('Home/User/index'); ?>">我的商城</a>
				<i class="litt-xyb"></i>
				<span>推广收益订单</span>
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
						<div class="goodpiece">
							<h1>订单列表</h1>
							<!--<a href=""><span class="co_blue">帮助</span></a>-->
							<div class="fr ddd-h2">
				                <h3>
									<span>推广收益订单</span>
									&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;">订单总金额：<?php echo $result['goods_price']; ?>元</span>
									&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;">收益总金额：<?php echo $result['money']; ?>元</span>
								</h3>
				             </div>
						</div>
						<div class="orderbook-list returnmagament">
							<div class="time-sala timsearch p">
								<ul>
									<li <?php if($status == -2): ?>class="red"<?php else: ?>class="mal-l"<?php endif; ?>><a href="<?php echo U('Order/income'); ?>">全部</a></li>
									<li <?php if($status == 0): ?>class="red"<?php else: ?>class="mal-l"<?php endif; ?>><a href="<?php echo U('Order/income',array('status'=>0)); ?>">待付款</a></li>
									<li <?php if($status == 1): ?>class="red"<?php else: ?>class="mal-l"<?php endif; ?>><a href="<?php echo U('Order/income',array('status'=>1)); ?>">已付款</a></li>
									<li <?php if($status == 2): ?>class="red"<?php else: ?>class="mal-l"<?php endif; ?>><a href="<?php echo U('Order/income',array('status'=>2)); ?>">已收货</a></li>
									<li <?php if($status == 3): ?>class="red"<?php else: ?>class="mal-l"<?php endif; ?>><a href="<?php echo U('Order/income',array('status'=>3)); ?>">已分成</a></li>
									<li <?php if($status == 4): ?>class="red"<?php else: ?>class="mal-l"<?php endif; ?>><a href="<?php echo U('Order/income',array('status'=>4)); ?>">已取消</a></li>
								</ul>
                                <form action="" method="POST" id="searchfrom">
                                    <div class="search-ss-lit" class="sea_ol">
                                        <input type="text" value="" name="search_key" placeholder="订单编号">
                                        <i class="litt-sexx" onclick=" $('#searchfrom').submit()"></i>
                                    </div>
                                </form>
							</div>
							<div class="he"></div>
							<div class="returngoods">
								<div class="book-tit">
									<ul>
										<li class="sx3">订单号</li>
										<li class="sx1">订单金额</li>
										<li class="sx4 s5clic">下单时间<!--<i class="jt-x"></i>--></li>
										<li class="sx5">购买会员</li>
										<li class="sx6 s5clic">收益金额<!--<i class="jt-x"></i>--></li>
										<li class="sx6">收益时间</li>
									</ul>
								</div>
                            <?php if(!empty($rebate_log)): ?>
								<div class="book-tit book_content p">
									<?php if(is_array($rebate_log) || $rebate_log instanceof \think\Collection || $rebate_log instanceof \think\Paginator): $i = 0; $__LIST__ = $rebate_log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                                        <ul>
                                            <li class="sx3"><?php echo $list['order_sn']; ?></li>
                                            <li class="sx1"><?php echo $list['goods_price']; ?></li>
                                            <li class="sx4"><?php echo date('Y-m-d H:i:s',$list['create_time']); ?></li>
                                            <li class="sx5"><?php echo $list['nickname']; ?></li>
                                            <li class="sx6"><?php echo $list['money']; ?></li>
                                            <li class="sx6"><?php if($list['confirm_time'] > 0): ?><?php echo date('Y-m-d H:i:s',$list['confirm_time']); else: ?>---<?php endif; ?></li>
                                        </ul>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
                            <?php else: ?>
                                <div class="car-none-pl">
                                    <i class="account-acco1"></i>您还没有分销订单，<a href="/">快去逛逛吧~</a>
                                </div>
                            <?php endif; ?>
								<div class="operating fixed">
									<div class="fn_page clearfix" style="margin-top:10px">
										<?php echo $page; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--footer-s-->
	<div class="footer p"><div id="foot">
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
</div> </div>
	<!--footer-e-->
	<script type="text/javascript">
		$(function () {
			//退货记录和申请退货切换
			$('.time-sala ul li').click(function () {
				var twi = $('.time-sala ul li').index(this);
				$('.returngoods').eq(twi).show().siblings('.returngoods').hide();
				$(this).addClass('red').siblings().removeClass('red');
			})
		})
	</script>
	</body>
</html>