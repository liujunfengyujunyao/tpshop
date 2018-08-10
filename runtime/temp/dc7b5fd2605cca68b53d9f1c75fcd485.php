<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:33:"./template/pc/tfs/cart\cart4.html";i:1512041371;s:41:"./template/pc/tfs/public\sign-header.html";i:1513580608;s:36:"./template/pc/tfs/public\footer.html";i:1519984596;s:42:"./template/pc/tfs/public\sidebar_cart.html";i:1519984596;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>订单支付-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
	<meta name="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
	<meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
	<link rel="stylesheet" href="__STATIC__/css/pay.min.css">
	<link href="__STATIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="__STATIC__/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="__STATIC__/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
	<script src="__PUBLIC__/js/pc_common.js"></script>
	<script src="__STATIC__/js/common.js"></script>
	<script src="__PUBLIC__/js/layer/layer.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $tpshop_config['shop_info_store_logo']; ?>" media="screen" />
</head>
<body>
<!-- 头部顶栏 start -->
<div class="container jf-header">
	<div class="row">
		<div class="col-md-6 jf-top">
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
		<div class="col-md-6 w shortcut">
			<ul class="fr">
				<li><a href="<?php echo U('Home/Order/order_list'); ?>">我的订单</a></li>
				<li class="spacer"></li>
				<li><a href="<?php echo U('Home/User/visit_log'); ?>">我的浏览</a></li>
				<li class="spacer"></li>
				<li><a href="<?php echo U('Home/User/coupon'); ?>">我的优惠券</a></li>
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
			<div class="col-md-3">
				<dl>
					<dt><a href="<?php echo U('Home/Index/index'); ?>"><img src="__STATIC__/images/mall.png" /></a></dt>
					<dd class="one">我的商城</dd>
					<dd><a href="<?php echo U('Home/Index/index'); ?>" class="return">返回商城首页</a></dd>
				</dl>
			</div>
			<div class="col-md-3 account">
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
			<div class="col-md-3">
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
			<div class="col-md-3">
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

<!-- 头部顶栏 end -->

<div id="pay">
	<div class="container carta">
		<div class="row mycar">
			<div class="col-md-5 car"></div>
			<div class="col-md-6 cara"><img src="__STATIC__/images/step3.png" /></div>
		</div>
	</div>
	<div class="container par">
		<div class="row pay_top">
			<h1></h1>

			<div class="think">
				<?php if($master_order_sn != ''): ?>
					<img src="__STATIC__/images/succesful.png" />&nbsp;&nbsp;感谢您在本店购物，您的订单
					<a href="<?php echo U('Home/Order/order_list'); ?>" title="点击查看订单详情"><span><?php echo $master_order_sn; ?></span></a> 提交成功，请尽快付款！</br>
				<?php else: ?>
					<img src="__STATIC__/images/succesful.png" />&nbsp;&nbsp;感谢您在本店购物，您的订单
					<a href="<?php echo U('Home/Order/order_detail',array('id'=>$order['order_id'])); ?>" title="点击查看订单详情"><span><?php echo $order['order_sn']; ?></span></a> 提交成功，请尽快付款！</br>
				<?php endif; ?>
				<p class="plase">请在<span><?php echo $pay_date; ?></span>之前完成支付，否则订单将自动取消。</p>
			</div>
		</div>
		<form action="<?php echo U('Home/Payment/getCode'); ?>" method="post" name="cart4_form" id="cart4_form">
			<div class="row payment">
				<div class="pay_you">
					<span><b>支付方式</b></span>
				</div>
				<div class="zhi">
					<ul class="list-inline">
						<?php if(is_array($paymentList) || $paymentList instanceof \think\Collection || $paymentList instanceof \think\Paginator): if( count($paymentList)==0 ) : echo "" ;else: foreach($paymentList as $k=>$v): ?>
							<li>
								<!--<input type="radio" value="pay_code=<?php echo $v['code']; ?>" class="vam" name="pay_radio">-->
								<a href="javascript:void(0)" onClick="change_pay(this);" code="<?php echo $v['code']; ?>">
									<img src="/plugins/<?php echo $v['type']; ?>/<?php echo $v['code']; ?>/<?php echo $v['icon']; ?>" width="120" height="40"/>
								</a>
							</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<input type="hidden" name="pay_radio" />
				</div>
			</div>
			<!--第三方网银支付 start-->
			<?php if($bankCodeList): ?>
				<div class="row payment">
					<?php if(is_array($bankCodeList) || $bankCodeList instanceof \think\Collection || $bankCodeList instanceof \think\Paginator): if( count($bankCodeList)==0 ) : echo "" ;else: foreach($bankCodeList as $k=>$v): ?>
						<div class="bank <?php echo $k; ?>">
							<?php if($v): ?>
								<div class="pay_you">
									<span>
										<b><?php echo $paymentList[$k]['name']; ?></b>
										<em>/网银支付</em>
									</span>
								</div>
								<div class="zhi">
									<ul class="list-inline">
										<?php if(is_array($v) || $v instanceof \think\Collection || $v instanceof \think\Paginator): if( count($v)==0 ) : echo "" ;else: foreach($v as $k2=>$v2): ?>
											<li>
												<a href="javascript:void(0)" onclick="changeBank(this)">
													<input type="radio" name="pay_radio" class="hidden" value="pay_code=<?php echo $k; ?>&bank_code=<?php echo $v2; ?>" >
													<img src="__STATIC__/images/images-out/<?php echo $bank_img[$k2]; ?>" width="120" />
												</a>
											</li>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			<?php endif; ?>
			<!--第三方网银支付 end -->
			<div class="yes">
				<a href="javascript:void(0);" onClick="$('#cart4_form').submit();" class="btn btn-danger">确认支付</a>
			</div>
			<input type="hidden" name="master_order_sn" value="<?php echo $master_order_sn; ?>" />
			<input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>" />
		</form>
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
<script>
	$(document).ready(function () {
		$(".bank").hide();
		$("#pay .payment .zhi li:first a").click();
		$("." + code).show();
	});
	// 切换支付方式
	function change_pay(obj) {
		$(obj).parent('li').addClass('active').siblings('li').removeClass('active');
		var code = $(obj).attr('code');
		$(".bank").hide();
		$("." + code).show();
		var val = "pay_code=" + code;
		$("input[name='pay_radio']").val(val);
	}

//	function changeBank(obj) {
//		$(obj).parent().siblings('input[name="pay_radio"]').trigger('click');
//		$(obj).parent('li').addClass('active').siblings('li').removeClass('active');
//	}
</script>
</body>
</html>
