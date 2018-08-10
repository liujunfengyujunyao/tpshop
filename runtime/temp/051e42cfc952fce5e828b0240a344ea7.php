<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:40:"./template/pc/rainbow/user\recharge.html";i:1512439865;s:38:"./template/pc/rainbow/user\header.html";i:1512439865;s:36:"./template/pc/rainbow/user\menu.html";i:1512439865;s:46:"./template/pc/rainbow/public\footer_index.html";i:1512439865;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>账户余额</title>
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/myaccount.css" />
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/jh.css" />
		<script src="__STATIC__/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<style>
		.topup-money {
			background-color: #ffffff;
			padding: 15px;
		}
		.usermoney {
			border: 1px solid #dedede;
			overflow: hidden;
		}
		.network-topup {
			margin-top: -1px;
			border-top: 1px solid #f3f3f7;
			margin-left: 0px;
		}
		.userdown-top {
			overflow: hidden;
		}
		.network-topup ul {
			overflow: hidden;
			float: left;
		}
		.alllist {
			border-bottom: 2px solid #FFF;
			color: #e63547;
			font-weight: bold;
		}
		.network-topup ul li {
			border-top: 2px solid #e63547;
		}.userdown-top ul li {
			 float: left;
			 cursor: pointer;
			 width: 100px;
			 text-align: center;
			 border: 1px solid #dedede;
			 padding: 8px 2px;
			 margin-left: -1px;
		 }
		.network-topup p {
			padding-right: 10px;
			margin-top: 8px;
			color: #036eb8;
			cursor: pointer;
			float: right;
		}
		.choicetu {
			overflow: hidden;
			padding: 10px;
			margin-top: 16px;
		}
		.choicetu p {
			margin-bottom: 10px;
			font-size: 16px;
			color: #666666;
		}
		.fop-main {
			overflow: hidden;
			margin-bottom: 50px;
		}
		.fop-main::before, .fop-main::after {
			content: '';
			clear: both;
			display: block;
		}
		.m-tagbox {
			margin-bottom: -10px;
			float: left;
		}
		.m-tagbox .tag-define, .m-tagbox .tag-item {
			float: left;
			width: 102px;
			height: 38px;
			line-height: 38px;
			border: 1px solid #e0e0e0;
			margin-right: 10px;
			margin-bottom: 10px;
			text-align: center;
			color: #333;
		}
		.m-tagbox .tag-item {
			position: relative;
			width: 92px;
			padding: 0 5px;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
		}
		.m-tagbox .t-check {
			display: none;
			position: absolute;
			right: 0;
			bottom: 0;
			width: 16px;
			height: 16px;
			background-position: -40px 0;
		}
		.m-tagbox .tptig {
			display: inline-block;
			background-image: url(__STATIC__/images/sprite-operate.png);
			background-repeat: no-repeat;
		}
		.orde-sjyy {
			font-family: 'Tahoma','\5FAE\8F6F\96C5\9ED1';
		}
		.m-tagbox .define-input {
			display: none;
			width: 92px;
			height: 38px;
			line-height: 38px;
			padding: 0 5px;
			border: medium none;
		}
		.m-tagbox .define-label .i-pen {
			display: inline-block;
			background-image: url(__STATIC__/images/sprite-operate.png);
			background-repeat: no-repeat;
		}
		.m-tagbox .define-label .i-pen {
			width: 13px;
			height: 13px;
			margin-top: 13px;
			margin-right: 5px;
			vertical-align: top;
		}
		.titls {
			font-size: 14px;
			border-left: 4px solid #e5e5e5;
			padding-left: 6px;
			line-height: 1.1;
			margin-bottom: 10px;
			font-weight: 400;
		}
		.bsjy-g dl {
			border: 1px solid #dedede;
			border-bottom: 0 none;
		}

	</style>
	<body class="bg-f5">
	<script src="__PUBLIC__/js/global.js" type="text/javascript"></script>
<link rel="stylesheet" href="__STATIC__/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
<script src="__PUBLIC__/static/js/layer/layer.js" type="text/javascript"></script>
<style>
	.list1 li{float:left;}
</style>
<div class="top-hander home-index-top p">
	<div class="w1224 pr">
		<div class="fl">
			<?php if(!(empty($user) || (($user instanceof \think\Collection || $user instanceof \think\Paginator ) && $user->isEmpty()))): ?>
			<div class="fl ler">
				<a href="<?php echo U('Home/User/index'); ?>"><?php echo $user['nickname']; ?></a>
			</div>
			<div class="fl ler">
				<a href="<?php echo U('Home/User/message_notice'); ?>">
					消息<?php if($user_message_count > 0): ?>（<span class="red"> <?php echo $user_message_count; ?> </span>）<?php endif; ?>
				</a>
			</div>
			<div class="fl ler">
				<a href="<?php echo U('Home/User/logout'); ?>">退出</a>
			</div>
			<?php else: ?>
			<div class="fl ler">
		        <a class="red" href="<?php echo U('Home/user/login'); ?>">登录</a>
		        <span class="spacer"></span>
		        <a href="<?php echo U('Home/user/reg'); ?>">注册</a>
		    </div>
			<?php endif; ?>
			<div class="fl spc"></div>
			<div class="sendaddress pr fl">
				<!-- 收货地址，物流运费 -start-->
				<ul class="list1">
					<li class="jaj"><span>配&nbsp;&nbsp;送：</span></li>
					<li class="summary-stock though-line" style="margin-top:2px">
						<div class="dd" style="border-right:0px;">
							<div class="store-selector add_cj_p">
								<div class="text" style="width: 150px;background: inherit;top: 2px;border-left: 0"><div></div><b style="top: 2px"></b></div>
								<div onclick="$(this).parent().removeClass('hover')" class="close"></div>
							</div>
						</div>
					</li>
				</ul>
				<!--<i class="jt-x"></i>-->
				<!-- 收货地址，物流运费 -end-->
				<!--<span>深圳<i class="jt-x"></i></span>-->
			</div>
		</div>
		<div class="top-ri-header fr">
			<ul>
				<li><a href="<?php echo U('/Home/Order/order_list'); ?>">我的订单</a></li>
				<li class="spacer"></li>
				<li><a href="<?php echo U('/Home/User/visit_log'); ?>">我的浏览</a></li>
				<li class="spacer"></li>
				<li><a href="<?php echo U('Home/User/goods_collect'); ?>">我的收藏</a></li>
				<li class="spacer"></li>
				<li><a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq']; ?>&amp;Site=肽风尚商城&amp;Menu=yes" target="_blank">客户服务</a></li>
				<!--<li class="spacer"></li>-->
				<!--<li class="hover-ba-navdh">
					<div class="nav-dh">
						<span>网站导航</span>
						<i class="jt-x"></i>
						<div class="conta-hv-nav">
							<ul>
								<li>
									<a href="<?php echo U('/Home/Activity/group_list'); ?>">团购</a>
								</li>
								<li>
									<a href="<?php echo U('Home/Activity/flash_sale_list'); ?>">抢购</a>
								</li>
							</ul>
						</div>
					</div>
				</li>-->
			</ul>
		</div>
	</div>
</div>
<div class="nav-middan-z p home-index-head">
	<div class="header w1224">
		<div class="ecsc-logo">
			<a href="/" class="logo"> <img src="__STATIC__/images/logo2.png" height="69"></a>
		</div>
		<div class="m-index">
			<a href="<?php echo U('Home/User/index'); ?>" class="index">我的商城</a>
			<a href="/" class="home">返回商城首页</a>
		</div>
		<div class="m-navitems">
			<ul class="fixed p">
				<li><a href="<?php echo U('Home/Index/index'); ?>">首页</a></li>
				<li>
					<div class="u-dl">
						<div class="u-dt">
							<span>账户设置</span>
							<i></i>
						</div>
						<div class="u-dd">
							<a href="<?php echo U('Home/User/info'); ?>">个人信息</a>
							<!--<a href="<?php echo U('Home/User/safety_settings'); ?>">安全设置</a>-->
							<a href="<?php echo U('Home/User/address_list'); ?>">收货地址</a>
						</div>
					</div>
				</li>
				<li class="u-msg"><a class="J-umsg" href="<?php echo U('Home/User/message_notice'); ?>">消息<span><?php if($user_message_count > 0): ?><?php echo $user_message_count; endif; ?></span></a></li>
				<li><a href="<?php echo U('Home/Goods/integralMall'); ?>">积分商城</a></li>
				<li class="search_li">
				   <form id="sourch_form" id="sourch_form" method="post" action="<?php echo U('Home/Goods/search'); ?>">
		           	<input class="search_usercenter_text" name="q" id="q" type="text" value="<?php echo \think\Request::instance()->param('q'); ?>"/>
		           	<a class="search_usercenter_btn" href="javascript:;" onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();">搜索</a>
		           </form>
		        </li>
			</ul>
		</div>
		<div class="shopingcar-index fr">
			<div class="u-g-cart fr fixed" id="hd-my-cart">
				<a href="<?php echo U('Home/Cart/cart'); ?>">
					<p class="c-n fl">我的购物车</p>

					<p class="c-num fl">(<span class="count cart_quantity" id="cart_quantity">0</span>)
						<i class="i-c oh"></i>
					</p>
				</a>

				<div class="u-fn-cart u-mn-cart" id="show_minicart">
					<div class="minicartContent" id="minicart">
					</div>
					<!--有商品时-e-->
				</div>
			</div>
		</div>
	</div>
</div>
<script src="__STATIC__/js/common.js"></script>
<!--------收货地址，物流运费-开始-------------->
<script src="__STATIC__/js/location.js"></script>
<!--------收货地址，物流运费--结束-------------->

		<div class="home-index-middle">
			<div class="w1224">
				<div class="g-crumbs">
			       	<a href="<?php echo U('Home/User/index'); ?>">我的商城</a>
			       	<i class="litt-xyb"></i>
			       	<span>账户余额</span>
			    </div>
			    <div class="home-main">
					<div class="le-menu fl">
	<div class="menu-ul">
		<?php if($user['level'] == 9): ?>
		<ul>
			<li class="ma"><i class="account-acc6"></i>工厂店</li>
			<li><a href="<?php echo U('Home/Store/order_list'); ?>">工厂店订单</a></li>
			<li><a href="<?php echo U('Home/Store/return_goods_list'); ?>">退换货管理</a></li>
			<li><a href="<?php echo U('Home/Store/store_stock_list'); ?>">工厂店库存</a></li>
			<li><a href="<?php echo U('Home/Store/stock_log'); ?>">库存日志</a></li>
			<li><a href="<?php echo U('Home/Store/apply'); ?>">补货申请记录</a></li>
			<li><a href="<?php echo U('Home/Store/delivery'); ?>">发货单</a></li>
		</ul>
		<ul>
			<li class="ma"><i class="account-acc6"></i>会员管理</li>
			<li><a href="<?php echo U('Home/Order/lower_list'); ?>">店会员</a></li>
			<!-- <li><a href="<?php echo U('Home/Order/income'); ?>">我的收益</a></li> -->
		</ul>
		<?php endif; ?>
		<ul>
			<li class="ma"><i class="account-acc1"></i>交易中心</li>
			<li><a href="<?php echo U('Home/Order/order_list'); ?>">我的订单</a></li>
			<!--<li><a href="">我的预售</a></li>-->
			<li><a href="<?php echo U('Home/Order/comment'); ?>">我的评价</a></li>
		</ul>
		<ul>
			<li class="ma"><i class="account-acc2"></i>资产中心</li>
			<li><a href="<?php echo U('Home/User/coupon'); ?>">我的优惠券</a></li>
			<!--<li><a href="">我的购物卡</a></li>-->
			<li><a href="<?php echo U('Home/User/recharge'); ?>">账户余额</a></li>
			<li><a href="<?php echo U('Home/User/account'); ?>">我的积分</a></li>
			<!--<li><a href="">积分换券明细</a></li>-->
		</ul>
		<ul>
			<li class="ma"><i class="account-acc3"></i>关注中心</li>
			<li><a href="<?php echo U('Home/User/goods_collect'); ?>">我的收藏</a></li>
			<!--<li><a href="">曾经购买</a></li>-->
			<li><a href="<?php echo U('Home/User/visit_log'); ?>">我的足迹</a></li>
		</ul>
		<ul>
			<li class="ma"><i class="account-acc4"></i>个人中心</li>
			<li><a href="<?php echo U('Home/User/info'); ?>">个人信息</a></li>
			<li><a href="<?php echo U('Home/User/bind_auth'); ?>">账号绑定</a></li>
			<li><a href="<?php echo U('Home/User/address_list'); ?>">地址管理</a></li>
			<li><a href="<?php echo U('Home/User/safety_settings'); ?>">安全设置</a></li>
		</ul>
		<ul>
			<li class="ma"><i class="account-acc5"></i>服务中心</li>
			<!--<li><a href="">我的发票</a></li>-->
			<li><a href="<?php echo U('Home/Order/return_goods_list'); ?>">退货管理</a></li>
		</ul>

		<?php if($user['level'] == 8): ?> <!-- 用户等级为合伙人 -->
		<ul>
			<li class="ma"><i class="account-acc6"></i>工厂店管理</li>
			<li><a href="<?php echo U('Home/Partner/storeList'); ?>">工厂店列表</a></li>
			<li><a href="<?php echo U('Home/Partner/orderList'); ?>">工厂店订单</a></li>
			<li><a href="<?php echo U('Home/Partner/store_apply'); ?>">工厂店补货申请</a></li>
			<li><a href="<?php echo U('Home/Partner/delivery'); ?>">配货单</a></li>
		</ul>
		<ul>
			<li class="ma"><i class="account-acc7"></i>库存管理</li>
			<li><a href="<?php echo U('Home/Partner/stockList'); ?>">库存列表</a></li>
			<li><a href="<?php echo U('Home/Partner/stockLog'); ?>">库存日志</a></li>
			<li><a href="<?php echo U('Home/Partner/apply'); ?>">补货申请</a></li>
			<li><a href="<?php echo U('Home/Partner/invoiceList'); ?>">发货单</a></li>
		</ul>
		<?php endif; ?>
	</div>
</div>
			    	<div class="ri-menu fr">
						<div class="menumain p mywallets" style="display: block;">
							<div class="goodpiece">
								<h1>账户余额</h1>
								<!--<a href=""><span class="co_blue">账户余额说明</span></a>-->
							</div>
							<div class="shopcard frozen-cha ma-to-20 p">
								<div class="cuschan">
									<span class="kycha"><i class="money"></i>可用余额</span><br />
									<span class="co"><em>￥</em><?php echo $user['user_money']; ?></span>
								</div>
								<div class="cuschan">
									<span class="kycha"><i class="frozen"></i>冻结金额</span><br />
									<span class="co"><em>￥</em><?php echo $user['frozen_money']; ?></span>
								</div>
								<div class="cuschan jhove">
									<span class="kycha">
										账户状态：<em><?php if($user['is_lock'] == 1): ?>被冻结<?php else: ?>已激活<?php endif; ?></em>
									</span>
								</div>
								<div class="cuschan tc-uic">
									<a class="topup-mom" href="<?php echo U('Home/User/withdrawals'); ?>">提现</a>
									<!-- <a class="topup-mom" href="javascript:" onclick="mywalletstopup()">充值</a> -->
								</div>
							</div>
							<div class="time-sala">
								<ul>
                                   <!--  <li <?php if(\think\Request::instance()->param('type') == ''): ?>class="red"<?php else: ?>class="mal-l"<?php endif; ?>><a href="<?php echo U('Home/User/recharge',array('')); ?>">充值记录</a></li> -->
                                    <li <?php if(\think\Request::instance()->param('type') == 1 || \think\Request::instance()->param('type') == ''): ?>class="red"<?php else: ?>class="mal-l"<?php endif; ?>><a href="<?php echo U('Home/User/recharge',array('type'=>1)); ?>">消费记录</a></li>
                                    <li <?php if(\think\Request::instance()->param('type') == 2): ?>class="red"<?php else: ?>class="mal-l"<?php endif; ?>><a href="<?php echo U('Home/User/recharge',array('type'=>2)); ?>">提现记录</a></li>
								</ul>
							</div>
							<div class="he"></div>
							<div class="card-list accbala">
								<ul>
									<li><a href="javascript:void(0);">日期</a></li>
									<li><a href="javascript:void(0);">金额</a></li>
									<?php if(\think\Request::instance()->get('type') == '' || \think\Request::instance()->get('type') == 2): ?><li><a href="javascript:void(0);">状态</a></li><?php else: ?><li><a href="javascript:void(0);">订单号</a></li><?php endif; ?>
									<li><a href="javascript:void(0);">备注</a></li>
								</ul>
							</div>
							<?php if(\think\Request::instance()->get('type') == ''): ?>
                                <!--无记录时-s-->
                                <!-- <?php if(empty($lists) || (($lists instanceof \think\Collection || $lists instanceof \think\Paginator ) && $lists->isEmpty())): ?>
                                    <p class="ncyekjl">--暂无记录--</p>
                                <?php endif; ?> -->
                                <!--无记录时-e-->
								<!-- <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): if( count($lists)==0 ) : echo "" ;else: foreach($lists as $key=>$vo): ?>
									<div class="card-list c_contan accbala-list">
										<ul>
											<li><a href="javascript:void(0);"><?php echo date('Y-m-d H:i:s',$vo['ctime']); ?></a></li>
											<li><a href="javascript:void(0);"><?php echo $vo['account']; ?></a></li>
											<li>
												<a href="javascript:void(0);">
													<?php if($vo[pay_status] == 0): ?>待支付
														<?php else: ?>
														已支付
													<?php endif; ?>
												</a>
											</li>
											<li><a href="javascript:void(0);"><?php echo $vo['pay_name']; ?></a></li>
										</ul>
									</div>
								<?php endforeach; endif; else: echo "" ;endif; ?> -->
							<?php endif; ?>
                        <!--消费记录-s-->
							<?php if(\think\Request::instance()->get('type') == 1 || \think\Request::instance()->get('type') == ''): ?>

                                <!--无记录时-s-->
                                <?php if(empty($lists) || (($lists instanceof \think\Collection || $lists instanceof \think\Paginator ) && $lists->isEmpty())): ?>
                                    <p class="ncyekjl">--暂无记录--</p>
                                <?php endif; ?>
                                <!--无记录时-e-->
								<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): if( count($lists)==0 ) : echo "" ;else: foreach($lists as $key=>$vv): ?>
									<div class="card-list c_contan accbala-list">
										<ul>
											<li><a href="javascript:void(0);"><?php echo date('Y-m-d H:i:s',$vv['change_time']); ?></a></li>
											<li><a href="javascript:void(0);"><?php echo $vv['user_money']; ?></a></li>
											<li><a href="javascript:void(0);"><?php echo (isset($vv['order_sn']) && ($vv['order_sn'] !== '')?$vv['order_sn']:"--"); ?></a></li>
											<li><a href="javascript:void(0);"><?php echo $vv['desc']; ?></a></li>
										</ul>
									</div>
								<?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <!--消费记录-e-->

                        <!--提现记录-s-->
                            <?php if(\think\Request::instance()->param('type') == 2): ?>
                                <!--无记录时-s-->
                                <?php if(empty($lists) || (($lists instanceof \think\Collection || $lists instanceof \think\Paginator ) && $lists->isEmpty())): ?>
                                    <p class="ncyekjl">--暂无记录--</p>
                                <?php endif; ?>
                                <!--无记录时-e-->
                                <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): if( count($lists)==0 ) : echo "" ;else: foreach($lists as $key=>$vv): ?>
                                    <div class="card-list c_contan accbala-list">
                                        <ul>
                                            <li><a href="javascript:void(0);"><?php echo date('Y-m-d H:i:s',$vv['create_time']); ?></a></li>
                                            <li><a href="javascript:void(0);"><?php echo $vv['money']; ?></a></li>
                                            <!--<li><a href="javascript:void(0);"><?php echo $vv['id']; ?></a></li>-->
											<li>
												<?php if($v[status] == -2): ?>无效作废<?php endif; if($v[status] == -1): ?>审核失败<?php endif; if($v[status] == 0): ?>申请中<?php endif; if($v[status] == 1): ?>审核通过<?php endif; if($v[status] == 2): ?>提现完成<?php endif; if($v[status] == 3): ?>转款失败<?php endif; ?>
											</li>
                                            <li><a href="javascript:void(0);"><?php echo $vv['remark']; ?></a></li>
                                        </ul>
                                    </div>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <!--提现记录-e-->
						</div>
                        <!--充值-s-->
						<div class="aboutmoney addmon" style="display:none">
							<div class="usermoney topup-money">
								<div class="userdown-top network-topup">
									<ul>
										<li class="alllist" style="margin-left: -1px">网银充值</li>
									</ul>
									<p onclick="mywalletsa();">返回我的钱包</p>
								</div>
								<hr style="height: 1px; background: #dedede; border: none; margin-top: -2px;" />
								<div class="choicetu">
									<p>选择充值金额：</p>
                                    <form method="post"  id="recharge_form" action="">
									<div class="monettu">
										<div class="fop-main">
											<div class="m-tagbox m-multi-tag">
												<a href="javascript:void(0)" rel="50" class="tag-item">￥50.00<i class="t-check tptig"></i></a>

												<a href="javascript:void(0)" rel="100" class="tag-item">￥100.00<i class="t-check"></i></a>

												<a href="javascript:void(0)" rel="200" class="tag-item">￥200.00<i class="t-check"></i></a>

												<a href="javascript:void(0)" rel="500" class="tag-item">￥500.00<i class="t-check"></i></a>
												<div class="tag-define" data_id="tag_157">
													<span class="define-label" style="display: block;"><i class="i-pen"></i><em>输入金额</em></span>
													<input type="text" name="account" class="define-input" value="50" id="input_val" style="display: none;">
												</div>
											</div>
										</div>
                                    <div class="fop-choice">
                                            <div class="orde-sjyy">
                                                <h3 class="titls">选择支付方式</h3>
                                                <div class="bsjy-g">
                                                    <dl>
                                                        <dd>
                                                            <div class="order-payment-area">
                                                                <div class="dsfzfpte">
                                                                    <b>选择支付方式</b>
                                                                </div>
                                                                <div class="po-re dsfzf-ee">
                                                                    <ul>
                                                                        <?php if(is_array($paymentList) || $paymentList instanceof \think\Collection || $paymentList instanceof \think\Paginator): if( count($paymentList)==0 ) : echo "" ;else: foreach($paymentList as $k=>$v): ?>
                                                                            <li>
                                                                                <div class="payment-area">
                                                                                    <input type="radio"  value="pay_code=<?php echo $v['code']; ?>" class="radio vam" name="pay_radio" <?php if($k == 'alipay'): ?>checked<?php endif; ?>>
                                                                                    <label for="">
                                                                                        <img src="/plugins/<?php echo $v['type']; ?>/<?php echo $v['code']; ?>/<?php echo $v['icon']; ?>" width="120" height="40" onClick="change_pay(this);" />
                                                                                    </label>
                                                                                </div>
                                                                            </li>
                                                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!--第三方网银支付 start-->
                                                            <?php if(is_array($bankCodeList) || $bankCodeList instanceof \think\Collection || $bankCodeList instanceof \think\Paginator): if( count($bankCodeList)==0 ) : echo "" ;else: foreach($bankCodeList as $k=>$v): ?>
                                                                <div class="order-payment-area">
                                                                    <div class="dsfzfpte">
                                                                        <b><?php echo $paymentList[$k]['name']; ?></b>
                                                                        <em>网银支付</em>
                                                                    </div>
                                                                    <div class="po-re dsfzf-ee">
                                                                        <ul>
                                                                            <?php if(is_array($v) || $v instanceof \think\Collection || $v instanceof \think\Paginator): if( count($v)==0 ) : echo "" ;else: foreach($v as $k2=>$v2): ?>
                                                                                <li>
                                                                                    <div class="payment-area">
                                                                                        <input type="radio" name="pay_radio" class="radio vam" value="pay_code=<?php echo $k; ?>&bank_code=<?php echo $v2; ?>" id="input-ALIPAY-1">
                                                                                        <label for="">
                                                                                            <img src="__STATIC__/images/images-out/<?php echo $bank_img[$k2]; ?>" width="120" height="40" onClick="change_pay(this);"/>
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            <!--第三方网银支付 end -->
                                                        </dd>
                                                    </dl>
                                                    <input type="hidden" name="account" id="add_money" value="50">
                                                    <div class="order-payment-action-area">
                                                        <a class="button-style-5 button-confirm-payment" href="javascript:void(0);" onclick="recharge_submit();">确认支付方式</a>
                                                    </div>
                                                </div>
                                        </div>
										</div>
									</div>
                                    </form>
								</div>
							</div>
						</div>
                        <!--充值-e-->
						<div class="operating fixed consume_log" id="bottom">
							<div class="fn_page clearfix">
                                <?php echo $page; ?>
							</div>
						</div>
			    	</div>
			    </div>
			</div>
		</div>
		<!--footer-s-->
		<div class="footer p"><!-- <div class="mod_service_inner">
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
                <li><img src="__STATIC__/images/qrcode1.jpg"/></li>
            </ul>
            <ul>
                <li class="foot-th">微信</li>
                <li><img src="__STATIC__/images/qrcode2.jpg"/></li>
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
</div> -->
<div class="footer p">
    <div class="w1224">
        <div class="footer-ewmcode">
            <div class="foot-list-fl">
                <?php if($link): ?>
                    <ul>
                        <li class="foot-th">友情链接</li>
                        <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($link) ? array_slice($link,0,6, true) : $link->slice(0,6, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="<?php echo $item['link_url']; ?>" <?php if($item['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $item['link_name']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <?php if(count($link) > 6): ?>
                    <ul>
                        <li class="foot-th">&nbsp;</li>
                        <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($link) ? array_slice($link,6,6, true) : $link->slice(6,6, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="<?php echo $item['link_url']; ?>" <?php if($item['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $item['link_name']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <?php endif; endif; 
                                   
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
                                <?php if($v2['link']): ?>
                                    <a href="<?php echo $v2['link']; ?>"><?php echo $v2[title]; ?></a>
                                <?php else: ?>
                                    <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id])); ?>"><?php echo $v2[title]; ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; endif; ?>
                    </ul>
                <?php endforeach; ?>
                <ul class="foot-con continue">
                    <li class="foot-th">联系我们</dt>
                    <li>
                        <span class="cellphone_con"><?php echo $tpshop_config['shop_info_phone']; ?></span>
                        <span class="time_con">周一至周日8:00-18:00</span>
                        <span class="cost_con">（仅收市话费）</span>
                        <a class="software_con" href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq2']; ?>&amp;Site=肽风尚商城&amp;Menu=yes" target="_blank">
                            <img src="__STATIC__/images/continue.png"/>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mod_copyright p">
            <p>Copyright © 2016-2025 <?php echo (isset($tpshop_config['shop_info_store_name']) && ($tpshop_config['shop_info_store_name'] !== '')?$tpshop_config['shop_info_store_name']:'肽风尚商城'); ?> 版权所有 保留一切权利 备案号:<?php echo $tpshop_config['shop_info_record_no']; ?></p>
        
            <p class="mod_copyright_auth">
                <a class="mod_copyright_auth_ico mod_copyright_auth_ico_1" href="javascript:void(0)">经营性网站备案中心</a>
                <!-- <a class="mod_copyright_auth_ico mod_copyright_auth_ico_2" href="" target="_blank">可信网站信用评估</a>
                <a class="mod_copyright_auth_ico mod_copyright_auth_ico_3" href="" target="_blank">网络警察提醒你</a>
                <a class="mod_copyright_auth_ico mod_copyright_auth_ico_4" href="" target="_blank">诚信网站</a>
                <a class="mod_copyright_auth_ico mod_copyright_auth_ico_5" href="" target="_blank">中国互联网举报中心</a>
                <a class="mod_copyright_auth_ico mod_copyright_auth_ico_6" href="" target="_blank">网络举报APP下载</a> -->
            </p>
        </div>
    </div>
</div>
<script type="text/javascript">
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?6ab0b9cb68d35fe3b6c45d2930dcc8f2";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script> </div>
		<!--footer-e-->
		<script type="text/javascript">
            //切换充值记录，消费记录
			$(function(){
				$('.time-sala ul li').click(function(){
					$(this).addClass('red').siblings().removeClass('red');
				})
                //选择充值金额
                $('.m-multi-tag a').click(function(){
                    $('#input_val').val($(this).attr('rel'));
                })
			})

			$(document).ready(function() {
				$(document).on('click','.tag-item',function(){
					$(this).find('.t-check').addClass('tptig').parent().siblings().find('.t-check').removeClass('tptig');
					$('#add_money').val($(this).attr('rel'));
				});
				$('.tag-define').click(function(){
					var goods_id = $(this).attr('data_id').substr(4);
					$(this).find('.define-label').hide();
					$(this).find('.define-input').show().focus();
					$(this).find('.define-input').blur(function(){
						var ce = $(this).val();
						ce = ce.replace(/\D|^0/g,'')

						$(this).parent('.tag-define').siblings('.tag-item').each(function(){
							var a_text = $(this).text();
							if(ce == a_text && ce != ''){
								layer.alert('已有该标签!',{icon:2});
								ce = '';
								$('.define-input').val('');
							}
						});
						if(ce == ''){
							$(this).prev('.define-label').show();
							$(this).hide();
						}else{
							//remark[<?php echo $goods_list['goods_id']; ?>][rank]
							//$(this).parent('.tag-define').prev('.tag-item').after('<input type="hidden" name="remark['+goods_id+'][tag][]" value="'+ce+'"/><a href="javascript:void(0)" class="tag-item">'+'￥'+ ce +'<i class="t-check"></i></a>');
							//$(this).prev('.define-label').show();
							//$(this).hide();
							//$(this).val('');
						}
					})
				});
			});
            function mywalletstopup() {
                $('.addmon').show();
                $('.mywallets').hide();
                $('#bottom').hide();
            }
            //返回我的钱包
            function mywalletsa() {
                $('.mywallets').show();
                $('#bottom').show();
                $('.addmon').hide();
            }
			function recharge_submit(){
				var input_val = parseInt($('#input_val').val());
				if(input_val>0){
					$('#add_money').val(input_val);
				}
				var account = $('#add_money').val();
				if(isNaN(account) || parseInt(account)<=0 || account==''){
					layer.alert('请输入正确的充值金额',{icon:2});
					return false;
				}
				$('#recharge_form').submit();
			}
            //选择支付方式
            function change_pay(obj)
            {
                $(obj).parent().siblings('input[name="pay_radio"]').trigger('click');
            }
		</script>
	</body>
</html>