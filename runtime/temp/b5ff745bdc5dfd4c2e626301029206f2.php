<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:43:"./template/pc/rainbow/order\order_list.html";i:1512439866;s:38:"./template/pc/rainbow/user\header.html";i:1512439865;s:36:"./template/pc/rainbow/user\menu.html";i:1512439865;s:46:"./template/pc/rainbow/public\footer_index.html";i:1512439865;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的订单</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/myaccount.css" />
    <script src="__STATIC__/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/layer/layer.js" type="text/javascript"></script>
    <script type="text/javascript" src="__ROOT__/public/static/js/layer/laydate/laydate.js"></script>
</head>
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
            <span>我的订单</span>
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
                <div class="menumain p">
                    <div class="navitems p" id="nav">
                        <ul>
                            <li>
                                <a href="<?php echo U('Order/order_list'); ?>" class="<?php if(\think\Request::instance()->param('type') == ''): ?>selected<?php endif; ?>">全部订单</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Order/order_list',array('type'=>'WAITPAY')); ?>" class="<?php if(\think\Request::instance()->param('type') == 'WAITPAY'): ?>selected<?php endif; ?>">待付款</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Order/order_list',array('type'=>'WAITSEND')); ?>" class="<?php if(\think\Request::instance()->param('type') == 'WAITSEND'): ?>selected<?php endif; ?>">待发货</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Order/order_list',array('type'=>'WAITRECEIVE')); ?>" class="<?php if(\think\Request::instance()->param('type') == 'WAITRECEIVE'): ?>selected<?php endif; ?>">待收货</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Order/comment',array('status'=>'0')); ?>" class="<?php if(\think\Request::instance()->param('type') == 'WAITCCOMMENT'): ?>selected<?php endif; ?>">待评论</a>
                            </li>
                            <!--<li>-->
                            <!--<a href="javascript:void(0);" class="">预售订单</a>-->
                            <!--</li>-->
                        </ul>
                        <div class="wrap-line" <?php if(\think\Request::instance()->param('type') == 'WAITPAY'): ?>style="width: 130px; left: 140px;"<?php elseif(\think\Request::instance()->param('type') == 'WAITSEND'): ?>style="width: 130px; left: 270px;"<?php elseif(\think\Request::instance()->param('type') == 'WAITRECEIVE'): ?>style="width: 130px; left: 400px;"<?php else: ?>style="width: 130px; left: 10px;"<?php endif; ?> >
                        <span style="left:15px;"></span>
                    </div>
                </div>
                <div class="menu_search p">
                    <form id="search_order" action="<?php echo U('Order/order_list'); ?>" method="get">
                        <input class="sea_ol" type="text" name="search_key" id="search_key" value="<?php echo \think\Request::instance()->param('search_key'); ?>"  placeholder="商品名称，订单编号" />
                        <input class="sea_et" type="submit" value="查询" style="cursor: pointer;"/>
                    <!--    <span class="coice">
                            更多筛选条件
                            <i class="jt-x"></i>
                        </span>
                        <div class="time-qjc">
                            下单时间：<input id="start_time" name="start_time" value="" style="width:150px;padding:7px 10px;border:1px solid #ccc;outline: none;"/>
                            <span>至</span>
                            <input id="end_time" name="end_time" style="width:150px;padding:7px 10px;border:1px solid #ccc;outline: none;" />
                            <div class="nearl-zj">
                                <ul>
                                    <li><a onclick="time_for_one_month();">最近一个月</a></li>
                                    <li><a onclick="time_for_three_month();">最近三个月</a></li>
                                    <li><a onclick="time_for_one_year();">最近一年</a></li>
                                </ul>
                            </div>
                            <div class="mu-btn">
                                <a onclick="check_search_order();" href="jsvascript:">查询</a>
                            </div>
                        </div>-->
                    </form>
                </div>
                <div class="orderbook-list">
                    <div class="book-tit">
                        <ul>
                            <li class="sx1">商品信息</i></li>
                            <li class="sx2">单价</li>
                            <li class="sx3">数量</li>
                            <li class="sx4">支付总金额</li>
                            <li class="sx5 s5clic">订单状态<i class="jt-x"></i></li>
                            <li class="sx6">操作</li>
                        </ul>
                    </div>
                    <div class="hid-derei">
                        <ul>
                            <li><a href="<?php echo U('Order/order_list'); ?>">全部订单</a></li>
                            <li><a href="<?php echo U('Order/order_list',array('type'=>'WAITPAY')); ?>">待付款</a></li>
                            <li><a href="<?php echo U('Order/order_list',array('type'=>'WAITSEND')); ?>">待发货</a></li>
                            <li><a href="<?php echo U('Order/order_list',array('type'=>'WAITRECEIVE')); ?>">待收货</a></li>
                            <li><a href="<?php echo U('Order/comment',array('status'=>'0')); ?>">待评论</a></li>
                            <li><a href="<?php echo U('Order/order_list',array('type'=>'FINISH')); ?>">已完成</a></li>
				    		<li><a href="<?php echo U('Order/order_list',array('type'=>'CANCEL')); ?>">已取消</a></li>
                            <!--<li><a href="">预售订单</a></li>-->
                        </ul>
                    </div>
                </div>
                <div class="order-alone-li lastset_cm">
                    <?php if(empty($lists) || (($lists instanceof \think\Collection || $lists instanceof \think\Paginator ) && $lists->isEmpty())): ?>
                        <div class="car-none-pl">
                            <i class="account-acco1"></i>您还没有订单，<a href="/">快去逛逛吧~</a>
                        </div>
                        <?php else: if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                            <table width="100%" border="" cellspacing="" cellpadding="">
                                <tr class="time_or">
                                    <td colspan="6">
                                        <div class="fl_ttmm">
                                            <span class="time-num">下单时间：<em class="num"><?php echo date('Y-m-d H:i:s',$list['add_time']); ?></em></span>
                                            <span class="time-num">订单编号：<em class="num"><?php echo $list['order_sn']; ?></em></span>
                                            <!--<span class="time-num">卖家：<a href="tencent://message/?uin=<?php echo $store_list[$list[store_id]][store_qq]; ?>&Site=TPshop商城&Menu=yes"><em class="num"><?php echo $store_list[$list[store_id]][store_name]; ?><i class="ear"></i></em></a></span>-->
                                            <div class="paysoon">
                                                <?php if($list['pay_btn'] == 1): ?>
                                                    <a class="ps_lj" href="<?php echo U('Home/Cart/cart4',array('order_id'=>$list[order_id])); ?>"  target="_blank">立即支付</a>
                                                <?php endif; if($list['cancel_info'] == 1): ?>
                                                     <a class="consoorder" href="<?php echo U('Order/cancel_order_info',array('order_id'=>$list[order_id])); ?>">取消详情</a>
                                                <?php endif; if($list['shop_way'] == 1): if(($list['order_status'] == 1) and ($list['shipping_status'] == 1)): ?>
                                                        <a class="ps_lj" href="javascript:;" onclick="order_confirm(<?php echo $list['order_id']; ?>);">确认收货</a>
                                                    <?php endif; elseif($list['order_status'] == 6): ?>
                                                    <a class="ps_lj" href="javascript:;" onclick="order_confirm(<?php echo $list['order_id']; ?>);">确认收货</a>
                                                <?php endif; if($list['cancel_btn'] == 1): if($list[pay_status] == 0): ?>
                                                    <a class="consoorder" href="javascript:void(0);" onClick="cancel_order(<?php echo $list['order_id']; ?>)" >取消订单</a>
                                                	<?php else: ?>
                                                	<a class="consoorder" href="javascript:void(0);" data-url="<?php echo U('Home/Order/refund_order',array('order_id'=>$list[order_id])); ?>" onClick="refund_order(this)" >取消订单</a>
                                                	<?php endif; else: ?>
                                                    <!--<div class="dele" onclick="verConfirm('确认删除该订单?','<?php echo U('Home/Order/del_order',array('order_id'=>$list['order_id'], 'type'=>\think\Request::instance()->param('type'))); ?>')"></div>-->
                                                <?php endif; ?>
                                                <!--<div class="dele"></div>-->
                                            </div>
                                        </div>
                                        <div class="fr_ttmm"></div>
                                    </td>
                                </tr>
                                <?php if(is_array($list['goods_list']) || $list['goods_list'] instanceof \think\Collection || $list['goods_list'] instanceof \think\Paginator): $k = 0; $__LIST__ = $list['goods_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($k % 2 );++$k;if($k == 1): ?>
                                        <tr class="conten_or">
                                            <td class="sx1">
                                                <div class="shop-if-dif">
                                                    <div class="shop-difimg">
                                                        <img src="<?php echo goods_thum_images($goods['goods_id'],60,60); ?>" width="60" height="60" />
                                                    </div>
                                                    <div class="shop_name"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>"><?php echo $goods['goods_name']; ?></a></div>
                                                </div>
                                            </td>
                                            <td class="sx2"><span>￥</span><span><?php echo $goods['member_goods_price']; ?></span></td>
                                            <td class="sx3">
                                                <span>x<?php echo $goods['goods_num']; ?></span>
                                                <?php if($goods[is_send] > 1): ?>
                                                    <a class="applyafts">已申请售后</a>
                            					<?php else: if(($list[return_btn] == 1) and ($list[shipping_status] == 1)): ?>
	                                                    <a href="<?php echo U('Home/Order/return_goods',array('rec_id'=>$goods['rec_id'])); ?>" class="applyafts">申请售后</a>
	                                                <?php endif; endif; ?>
                                            </td>
                                            <td class="sx4" rowspan="<?php echo count($list['goods_list']); ?>">
                                                <div class="pric_rhz">
                                                    <p class="d_pri"><span>￥</span><span><?php echo $list['order_amount']; ?></span></p>
                                                    <p class="d_yzo">
                                                        <spna>含运费：</spna>
                                                        <span><?php echo $list['shipping_price']; ?></span></p>
                                                    <p class="d_yzo"><a href="javascript:void(0);"><?php echo $list['pay_name']; ?></a></p>
                                                </div>
                                            </td>
                                            <td class="sx5" rowspan="<?php echo count($list['goods_list']); ?>">
                                                <div class="detail_or">
                                                    <p class="d_yzo">
                                                        <?php echo $list['order_status_desc']; ?>
                                                    </p>
                                                    <p>
                                                        <?php if($list[order_prom_type] == 5): ?>
                                                            <a href="<?php echo U('Order/virtual_order',array('order_id'=>$list['order_id'])); ?>">查看详情</a>
                                                        <?php else: ?>
                                                            <a href="<?php echo U('Order/order_detail',array('id'=>$list['order_id'])); ?>">查看详情</a>
                                                        <?php endif; ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="sx6" rowspan="<?php echo count($list['goods_list']); ?>">
                                                <div class="rbac">
                                                    <p class=""><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>">再次购买</a></p>
                                                    <?php if(($list[comment_btn] == 1) and ($goods[is_comment] == 0)): ?>
                                                        <p class="inspect">
                                                            <a href="<?php echo U('Home/Order/comment',array('status'=>0)); ?>">评价</a>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <tr class="conten_or">
                                            <td class="sx1">
                                                <div class="shop-if-dif">
                                                    <div class="shop-difimg">
                                                        <img src="<?php echo goods_thum_images($goods['goods_id'],60,60); ?>" width="60" height="60"/>
                                                    </div>
                                                    <div class="shop_name"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>"><?php echo $goods['goods_name']; ?></a></div>
                                                </div>
                                            </td>
                                            <td class="sx2"><span>￥</span><span><?php echo $goods['member_goods_price']; ?></span></td>
                                            <td class="sx3">
                                                <span>x<?php echo $goods['goods_num']; ?></span>
                                                <?php if(($list[return_btn] == 1) and ($goods[is_send] < 2)): ?>
                                                    <a href="<?php echo U('Home/Order/return_goods',array('rec_id'=>$goods['rec_id'])); ?>" class="applyafts">申请售后</a>
                                                <?php endif; if($goods[is_send] > 1): ?>
                                                    <a class="applyafts">已申请售后</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </table>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </div>
            </div>
            <div class="operating fixed" id="bottom">
                <div class="fn_page clearfix">
                    <?php echo $page; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--footer-s-->
<div class="footer p">
    <!-- <div class="mod_service_inner">
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
</script>
</div>
<!--footer-e-->
<script type="text/javascript">
    $(function(){
        $('.s5clic').click(function(){
            $('.hid-derei').slideToggle(400);
            $(this).animate({opacity:"1"},200,function(){
                $(this).toggleClass('sxbb')
            })
        })
    })

    $(function() {
        var speed = 380;
        $('#nav ul li').click(function() {
            $(this).find('a').addClass('selected').parent().siblings().find('a').removeClass('selected')
            var pl = $(this).position().left;
            var liw = $(this).width();
            $('.wrap-line').stop().animate({
                left: pl,
                width: liw
            }, speed);
        })
    });
    //取消订单
    function cancel_order(id){
        layer.confirm('确定取消订单?', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    // 确定
                    location.href = "/index.php?m=Home&c=Order&a=cancel_order&id="+id;
                }, function(index){
                    layer.close(index);
                }
        );
    }

    function jump()
    {
        var max_page = "<?php echo $page_array['total_page']; ?>";
        var jump_page = $('#jump_page').val();
        if(jump_page>0 && jump_page<=max_page){
            location.href = "<?php echo urldecode(U('Home/Order/order_list',$get_no_p,''));?>"+"/p/"+$('#jump_page').val();
        }else{
            layer.alert('请输入正确的页数', {icon: 2});
        }
    }
    //确定收货
    function order_confirm(order_id){
        layer.confirm("你确定收到货了吗?",{
            btn:['确定','取消']
        },function(){
            $.ajax({
                type : 'post',
                url : '/index.php?m=Home&c=Order&a=order_confirm&order_id='+order_id,
                dataType : 'json',
                success : function(data){
                    if(data.status == 1){
                        window.location.href = data.url;
                    }else{
                        layer.open({content:data.msg,time:2});
                        verify();
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
    
	function refund_order(obj){
		layer.open({
			type: 2,
			title: '<b>订单取消申请</b>',
			skin: 'layui-layer-rim',
			shadeClose: true,
			shade: 0.5,
			area: ['600px', '500px'],
			content: $(obj).attr('data-url'),
		});
	}
</script>
</body>
</html>
