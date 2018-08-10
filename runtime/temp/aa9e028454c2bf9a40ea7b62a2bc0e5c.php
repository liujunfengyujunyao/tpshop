<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:36:"./template/pc/tfs/cart\integral.html";i:1512113416;s:41:"./template/pc/tfs/public\sign-header.html";i:1513580608;s:36:"./template/pc/tfs/public\footer.html";i:1519984596;s:42:"./template/pc/tfs/public\sidebar_cart.html";i:1519984596;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>积分商品结算-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
	<meta name="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>"/>
	<meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>"/>
	<link href="__STATIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="__STATIC__/css/style.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="__STATIC__/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
	<script src="__PUBLIC__/js/pc_common.js"></script>
	<script src="__STATIC__/js/common.js"></script>
	<script src="__PUBLIC__/js/layer/layer.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $tpshop_config['shop_info_store_logo']; ?>" media="screen"/>
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

<!--order start-->
<div id="order">
	<div class="container carta">
		<div class="row mycar">
			<div class="col-md-5 car"><img src="__STATIC__/images/gou.png" />&nbsp;&nbsp;填写并核对订单信息</div>
			<div class="col-md-6 cara"><img src="__STATIC__/images/step2.png" /></div>
		</div>
	</div>
	<!--carta end-->
	<form name="cart2_form" id="cart2_form" method="post">
		<input type="hidden" name="goods_id" value="<?php echo \think\Request::instance()->param('goods_id'); ?>">
		<input type="hidden" name="item_id" value="<?php echo \think\Request::instance()->param('item_id'); ?>">
		<input type="hidden" name="goods_num" value="<?php echo \think\Request::instance()->param('goods_num'); ?>">
		<div class="container">
			<div class="row receive">
				<div class="col-xs-6 confirm">确认收货地址</div>
				<div class="col-xs-6 new"><a href="javascript:void(0);" onClick="add_edit_address(0);">新增收货地址</a></div>
			</div>
			<div id="ajax_address"><!--ajax 返回收货地址--></div>
			<div class="row receivea">
				<a href="javascript:void(0)" onclick="moreAddress(this)">更多地址<img src="__STATIC__/images/duo.png" /></a>
			</div>
		</div>
		<!--container end-->
		<div class="container factory">
			<div class="row work">
				配送方式<span>（建议选择附近工厂店并选择工厂店配送或者自提）</span>
			</div>
			<div class="row" id="shop_way">
				<div class="pays">
					<select class="mySelect" name="shop_way" onchange="change_way(this)">
						<option value="0" selected>请选择配送方式</option>
						<option value="2">工厂店配送</option>
						<option value="3">工厂店自提</option>
						<option value="1">合作快递</option>
					</select>
				</div>
				<p class="pay"><span class="a">注：<span class="yellow">推荐选择工厂店配送或者工厂店自提方式，合作快递主要指和商城合作的快递</span></span></p>
			</div>

			<div id="wuliu">
				<div class="row work">选择物流</div>
				<div class="row shipping">
					<ul class="list-inline">
						<input type="radio" name="shipping_code" value="store" class="hidden" checked />
						<?php if(is_array($shippingList) || $shippingList instanceof \think\Collection || $shippingList instanceof \think\Paginator): if( count($shippingList)==0 ) : echo "" ;else: foreach($shippingList as $k4=>$v4): ?>
							<li>
								<label>
									<input type="radio" value="<?php echo $v4['code']; ?>" name="shipping_code" onclick="ajax_order_price();"/>&nbsp;&nbsp;<?php echo $v4['name']; ?>
								</label>
							</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>

			<div id="store">
				<div class="row work">
					工厂店（选择推荐店可得积分）
				</div>
				<div id="ajax_pickup"><!--ajax 返回自提点--></div>
			</div>

			<div class="clear"></div>
		</div><!--factory end-->
		<!--merch start-->
		<div class="container merch">
			<div class="row top">
				<div class="col-xs-4">商品</div>
				<div class="col-xs-2">单价（元）</div>
				<div class="col-xs-3">数量</div>
				<div class="col-xs-3">小计（元）</div>
			</div>
			<div class="row list">
				<div class="col-xs-4">
					<dl>
						<dt><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods[goods_id])); ?>"><img src="<?php echo goods_thum_images($goods['goods_id'],80,80); ?>" width="100%" /></a></dt>
						<dd><?php echo $goods['goods_name']; ?></dd>
					</dl>
				</div>
				<div class="col-xs-2 tai">¥<?php echo $goods_price; ?></div>
				<div class="col-xs-3 tai"><?php echo $goods_num; ?></div>
				<div class="col-xs-3 tai">￥<?php echo $goods_price * $goods_num; ?></div>
			</div>

			<!--vouchers end-->

			<div class="row excellent">
				<div class="delivery">
					发票信息<span>（请谨慎填写发票信息，订单出库后无法修改）</span>
				</div>
				<div class="row vouchers">
					<div class="col-xs-12">
						发票抬头：<input type="text" placeholder="请在发票抬头后填写纳税人编号" class="longtext" name="invoice_title" />
					</div>
				</div>

				<div class="delivery">其他信息</div>
				<div class="col-xs-12 vouchers">积分支付：<input type="text" id="pay_points" name="pay_points" disabled="disabled"/>&nbsp;&nbsp;
					&nbsp;&nbsp;您的可用积分：<?php echo $user['pay_points']; ?> 分
				</div>
				<input style="display:none" type="password" name="pwd"/>
				<!--解决google浏览器识别text+password,自动填充已保存的账户密码-->
				<div class="col-xs-12 vouchers">支付密码：<input type="password" id="pwd" placeholder="请输入支付密码"/>&nbsp;&nbsp;<?php if(empty($user['paypwd'])): ?>请先<a href="<?php echo U('User/paypwd'); ?>" class="cipher">设置支付密码</a><?php endif; ?>
				</div>
				<div class="col-xs-12 vouchers">
					<p class="leave">给卖家留言：<input class="longtext tapassa" type="text" name="user_note" onkeyup="checkfilltextarea('.tapassa','50')" placeholder="请输入留言内容" />&nbsp;<em id="zero">50</em>/50</p>
				</div>
			</div>
			<!--excellent end-->
		</div>
		<!--merch end-->
		<div class="container checks">
			<div class="row mention">
				<p>商品总金额：<span id="order-cost-area">￥<?php echo $goods_price * $goods_num; ?></span></p>
				<p>运费：<span>￥</span><span id="postFee">0</span></p>
				<p>使用积分：<span>-￥</span><span id="pointsFee">0</span></p>
				<p>应付金额：<span>￥</span><span id="payables">￥0</span></p>
				</br>
				<p><a href="javascript:void(0);" onClick="submit_order();" class="btn btn-danger">提交订单</a></p>
			</div>
		</div>
	</form>
</div>
<!--order end-->


<!-- 提示切换省份 -->
<div id="changeProvince" style="display: none;">
	<div class="mask mask-cs-05 mask-4">
		<div class="mk-title">
			<h3>温馨提示</h3>
			<i data-x="1" class="mask-close-x changeAddrX"></i></div>
		<div class="mk-adc">
			<div class="cs-01"> 您目前所在的省份为<strong>上海</strong>，选择<strong>安徽省</strong>的收货地址后，您购买的商品及价格将发生变化。</div>
			<div class="cs-03">
				<button class="btn btn-red confirmChangeCity">切换省份</button>
				<button class="btn mask-close-x changeAddrX" data-x="1">取消</button>
			</div>
		</div>
	</div>
</div>
<!-- end 提示切换省份 -->
<!-- 提示配送商品 -->
<div id="sorryTipLayer" style="display:none;">
	<div class="tipLayerCont">
		<p class="tip">对不起，以下商品暂时无法送达至<b>江苏省</b><b>无锡市</b><b>锡山区</b></p>

		<div class="tipLayerList">
			<div class="listHead"><span class="name">商品名称</span> <span class="spec">规格</span> <span class="num">数量</span> <span class="price">金额</span></div>
			<div class="listCont"></div>
		</div>
	</div>
</div>
<!-- end 提示配送商品 -->
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
	/**
	 * 留言字数限制
	 * tea ：要限制数字的class名
	 * nums ：允许输入的最大值
	 * zero ：输入时改变数值的ID
	 */
	function checkfilltextarea(tea, nums) {
		var len = $(tea).val().length;
		if (len > nums) {
			$(tea).val($(tea).val().substring(0, nums));
		}
		var num = nums - len;
		num <= 0 ? $("#zero").text(0) : $("#zero").text(num);  //防止出现负数
	}
	$(document).ready(function () {
		ajax_address(); // 获取用户收货地址列表
		$("#wuliu").hide();
		$("#store").hide();
	});

	$(document).on('keyup','#pwd',function(){
		$('input[name="pwd"]').val(this.value);
	});

	function wield(obj) {
		if ($.trim($(obj).prev().val()) != '') {
			layer.msg('正在计算金额...', {icon: 1});
			ajax_order_price(); // 计算订单价钱
		}
	}
	/**
	 * 新增修改收货地址
	 * id 为零 则为新增, 否则是修改
	 *  使用 公共的 layer 弹窗插件  参考官方手册 http://layer.layui.com/
	 */
	function add_edit_address(id) {
		if (id > 0)
			var url = "/index.php?m=Home&c=User&a=edit_address&scene=1&call_back=call_back_fun&id=" + id; // 修改地址  '<?php echo U('Home/User/add_address',array('scene'=>'1','call_back'=>'call_back_fun','id'=>id)); ?>' //iframe的url /index.php/Home/User/add_address
		else
			var url = "/index.php?m=Home&c=User&a=add_address&scene=1&call_back=call_back_fun";	// 新增地址
		layer.open({
			type: 2,
			title: '添加收货地址',
			shadeClose: true,
			shade: 0.8,
			area: ['880px', '580px'],
			content: url,
		});
	}
	// 添加修改收货地址回调函数
	function call_back_fun(v) {
		layer.closeAll(); // 关闭窗口
		ajax_address(); // 刷新收货地址
	}

	// 删除收货地址
	function del_address(id) {
		layer.confirm('确定要删除吗？', {
			btn: ['确定', '取消'] //按钮
		}, function (index) {
			layer.close(index);
			// 确定
			$.ajax({
				url: "/index.php?m=Home&c=User&a=del_address&id=" + id,
				success: function (data) {
					ajax_address(); // 刷新收货地址
					$('#ajax_pickup .order-address-list').removeClass('address_current');
				}
			});
			layer.closeAll(); // 关闭窗口
		}, function (index) {
			layer.close(index);
		});
	}

	/*
	 * ajax 获取当前用户的收货地址列表
	 */
	function ajax_address() {
		$.ajax({
			url: "<?php echo U('Home/Cart/ajaxAddress'); ?>",//+tab,
			success: function (data) {
				$("#ajax_address").html('');
				$("#ajax_address").append(data);
				if (data != '') {
					// 有收货地址列表 再计算价钱
					ajax_order_price(); // 计算订单价钱
				} else {
					add_edit_address(0);
				}
			}
		});
	}

	// 切换收货地址
	function swidth_address(obj) {
		var province_id = $(obj).attr('data-province-id');
		var city_id = $(obj).attr('data-city-id');
		var district_id = $(obj).attr('data-district-id');
		if (typeof($(obj).attr('data-province-id')) != 'undefined') {
			ajax_pickup(province_id, city_id, district_id, 0);
		}
		$(".order-address-list").removeClass('address_current');
		$('.order-address-list').find('img').attr('src', '__STATIC__/images/weizhi.png');
		$(obj).parents('.order-address-list').addClass('address_current');
		$(obj).parents('.order-address-list').find('img').attr('src', '__STATIC__/images/weizhi-red.png');
		ajax_order_price(); // 计算订单价格
	}
	/**
	 * 获取用户自提点和推荐自提点
	 * @param type 1：用户自提点 ，0：用户自提点和推荐自提点
	 * @param province_id 省
	 * @param city_id 市
	 * @param district_id 区
	 */
	function ajax_pickup(province_id, city_id, district_id, show) {
		$.ajax({
			type: 'GET',
			url: "<?php echo U('Home/Cart/ajaxPickup'); ?>",//+tab,
			data: {province_id: province_id, city_id: city_id, district_id: district_id, show: show},
			success: function (data) {
				$("#ajax_pickup").html('');
				$("#ajax_pickup").append(data);
				ajax_order_price();
			}
		});
	}
	//更换自提点
	function replace_pickup(province_id, city_id, district_id) {
		var url = "/index.php?m=Home&c=Cart&a=replace_pickup&call_back=call_back_pickup&province_id=" + province_id + "&city_id=" + city_id + "&district_id=" + district_id;
		layer.open({
			type: 2,
			title: '添加收货地址',
			shadeClose: true,
			shade: 0.8,
			area: ['880px', '580px'],
			content: url,
		});
	}
	// 添加自提点地址回调函数
	function call_back_pickup(province_id, city_id, district_id) {
		layer.closeAll(); // 关闭窗口
		ajax_pickup(province_id, city_id, district_id, 1);
	}
	// 获取订单价格
	function ajax_order_price() {
		$.ajax({
			type : "POST",
			url:"<?php echo U('Home/Cart/integral2'); ?>",//+tab,g
			data : $('#cart2_form').serialize()+"&act=order_price",// 你的formid
			dataType: "json",
			success: function(data){
				if(data.status != 1)
				{
					//执行有误
					layer.alert(data.msg, {icon: 2});
					// 登录超时g
					if(data.status == -100)
						location.hrgef ="<?php echo U('Home/User/login'); ?>";
					return false;
				}

				$("#postFee").text(data.result.postFee); // 物流费
				$("#shipping_price").text(data.result.postFee); // 物流费
				$("#balance").text(data.result.balance);// 余额
				$("#pointsFee").text(data.result.pointsFee);// 积分支付
				$("#pay_points").val(data.result.points);// 积分支付
				$("#payables").text(data.result.payables);// 应付
			}
		});
	}

	// 提交订单
	var ajax_return_status = 1;
	function submit_order()
	{
		if(ajax_return_status == 0)
			return false;
		ajax_return_status = 0;
		$.ajax({
			type : "POST",
			url:"<?php echo U('Home/Cart/integral2'); ?>",//+tab,
			data : $('#cart2_form').serialize()+"&act=submit_order",// 你的formid
			dataType: "json",
			success: function(data){

				if(data.status != '1')
				{
					// alert(data.msg); //执行有误
					layer.alert(data.msg, {icon: 2});
					// 登录超时
					if(data.status == -100)
						location.href ="<?php echo U('Home/User/login'); ?>";

					ajax_return_status = 1; // 上一次ajax 已经返回, 可以进行下一次 ajax请求

					return false;
				}
				layer.msg('订单提交成功，正在跳转!', {
					icon: 1,   // 成功图标
					time: 2000 //2秒关闭（如果不配置，默认是3秒）
				}, function(){ // 关闭后执行的函数
					location.href = "/index.php?m=Home&c=Cart&a=cart4&order_id="+data.result; // 跳转到结算页
				});
			}
		});
	}

	//更换配送方式 BY DH 2017-11-30
	function change_way(obj) {
		var shop_way = $(obj).val();
		if (shop_way == 1) {
			$("#wuliu").show();
			$("#store").hide();
		} else if (shop_way == 2 || shop_way == 3) {
			$("#store").show();
			$("#wuliu").hide();
		}
	}
	function moreAddress(obj) {
		$("#ajax_address .hidden-address").slideToggle("slow");
		$(obj).toggleClass("active");
		if ($(obj).hasClass('active')) {
			$(obj).text('收起');
		}else {
			$(obj).html("更多地址<img src='__STATIC__/images/duo.png' />");
		}
	}
</script>
</body>
</html>