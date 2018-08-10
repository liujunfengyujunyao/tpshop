<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:39:"./template/pc/tfs/user\withdrawals.html";i:1509018229;s:34:"./template/pc/tfs/user\header.html";i:1512197568;s:32:"./template/pc/tfs/user\menu.html";i:1519984571;s:36:"./template/pc/tfs/public\footer.html";i:1519984596;s:42:"./template/pc/tfs/public\sidebar_cart.html";i:1519984596;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>申请提现</title>
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/myaccount.css" />
		<link rel="shortcut  icon" type="image/x-icon" href="<?php echo $tpshop_config['shop_info_store_logo']; ?>" media="screen"  />
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
			       	<a href="/">我的商城</a>
			       	<i class="litt-xyb"></i>
			       	<span>账户余额</span>
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
								<h1>提现申请</h1>
								<!--<a href=""><span class="co_blue">账户余额说明</span></a>-->
								<input type="hidden" id="openid" value="<?php echo $user['openid']; ?>">
							</div>
							<div class="personerinfro tixbox">
								<form action="" method="post" id="distribut_form">
									<ul class="hend_jz">
										<li class="infor_wi_le"><a href="javascript:void(0);"><i class="star">*</i>提现金额：</a></li>
										<li class="infor_img">
											<div class="duleyuan">
												<input type="text" name="money" id="money" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')"/>
												<span>元</span>
											</div>
											<span class="keyj">(最低提现额度<?php echo $tpshop_config['basic_min']; ?>，当前账户金额：<em><?php echo $user['user_money']; ?></em>元)</span>
										</li>
									</ul>
								<!--	<ul class="name_jz">
										<li class="infor_wi_le"><a href="javascript:void(0);"><i class="star">*</i>提现账户类型：</a></li>
										<li class="paydegs">
											<span><i class="chek"></i><label>支付宝</label></span>
											<span><i></i><label>微信</label></span>
											<span><i></i><label>银行卡</label></span>
										</li>
									</ul>-->
									<ul class="name_jz">
										<li class="infor_wi_le"><a href="javascript:void(0);"><i class="star">*</i>收款银行：</a></li>
										<li>
											<a href="javascript:void(0);">
											<input class="name_zjxs" type="text" name="bank_name" id="bank_name" value="<?php echo $user['bank_name']; ?>" placeholder="如:支付宝,农业银行,工商银行等..." /></a>
											<p class="adviceql">建议填写4大银行（中国银行、中国建设银行、中国工商银行和中国农业银行）请填写详细的开户银行分行名称，虚拟账户如支付宝、微信填写”支付宝“、”微信“即可。</p>
										</li>
									</ul>
									<ul class="name_jz">
										<li class="infor_wi_le"><a href="javascript:void(0);"><i class="star">*</i>收款账号：</a></li>
										<li>
											<a href="javascript:void(0);"><input class="name_zjxs" type="text" name="bank_card" id="bank_card" value="" /></a>
											<p class="adviceql">银行账号或虚拟账号（支付宝、微信等账号），微信提现时需要绑定微信账号，收款账号为openid</p>
										</li>
									</ul>
									<ul class="name_jz">
										<li class="infor_wi_le"><a href="javascript:void(0);"><i class="star">*</i>开户人姓名：</a></li>
										<li>
											<a href="javascript:void(0);"><input class="name_zjxs wisd" type="text" name="realname" id="realname" value="" /></a>
											<p class="adviceql">收款账号的开户人姓名</p>
										</li>
									</ul>
									<ul class="name_jz">
										<li class="infor_wi_le"><a href="javascript:void(0);"><i class="star">*</i>验证码：</a></li>
										<li class="name_jz">
											<a href="javascript:void(0);">
                                                <input class="name_zjxs wisd" type="text" name="verify_code" id="verify_code" value="" placeholder="请输入验证码"/>
                                            </a>
										</li>
                                        <li>
                                            <a href="javascript:void(0);"><img src="<?php echo U('User/verify',array('type'=>'withdrawals')); ?>" id="verify_code_img" width="120" heigth="38" onclick="verify(this)"/></a>
                                        </li>
									</ul>
                                    <ul class="name_jz">
                                        <li class="infor_wi_le"><a href="javascript:void(0);"><i class="star">*</i>支付密码：</a></li>
                                        <li>
                                            <a href="javascript:void(0);"><input class="name_zjxs wisd" type="password" name="paypwd" id="paypwd" value="" /></a>
                                            <?php if(empty($user['paypwd'])): ?>
                                                <p class="haiew">还未设置支付密码</p>
                                                <a class="ha-re" style="cursor:pointer" href="<?php echo U('User/paypwd'); ?>">马上设置</a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
									<ul class="hobby_jz">
										<li class="infor_wi_le"><a href="javascript:void(0);"></a></li>
										<li class="infor_wi_ri">
											<div class="save_s">
												<input class="save" type="button" onclick="checkSubmit()" value="确认提现" />
												<input class="save closoff" type="reset" onclick="location.href='<?php echo U('User/recharge'); ?>'" value="取消并返回" />
											</div>
										</li>
									</ul>
								</form>
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
            function verify(){
                $('#verify_code_img').attr('src','/index.php?m=Home&c=User&a=verify&type=withdrawals&r='+Math.random());
            }
			$(function(){
				$('.paydegs span').click(function(){
					if($(this).find('label').html()=='微信'){
						if($('#openid').val() == ''){
							layer.alert('请在用户中心账号绑定里先扫码绑定微信账号',{icon:2});
							return false;
						}else{
							$('.paydegs span').find('i').removeClass('chek');
							$('#bank_name').val($('#openid').val());
							$(this).find('i').addClass('chek');
						}
					}else{
						$('.paydegs span').find('i').removeClass('chek');
						$('#bank_name').val($(this).find('label').html());
						$(this).find('i').addClass('chek');
					}
				})
			})
			// 表单验证提交
			function checkSubmit(){
				var money = $.trim($('#money').val());
				var bank_name = $.trim($('#bank_name').val());
				var bank_card = $.trim($('#bank_card').val());
				var realname = $.trim($('#realname').val());
				var verify_code = $.trim($('#verify_code').val());
				
				if(money == '')
				{
					layer.alert('提现金额必填',{icon:2});
					return false;
				}
				if(bank_name == '')
				{
					layer.alert('银行名称必填',{icon:2});
					return false;
				}
				if(bank_card == '')
				{
					layer.alert('收款账号必填',{icon:2});
					return false;
				}
				if(realname == '')
				{
					layer.alert('开户名必填',{icon:2});
					return false;
				}
				if(verify_code == '')
				{
					layer.alert('验证码必填',{icon:2});
					return false;
				}
                $.ajax({
                    type: "post",
                    url :"<?php echo U('User/withdrawals'); ?>",
                    dataType:'json',
                    data:$('#distribut_form').serialize(),
                    success: function(data)
                    {
                        if(data.status == 1){
                            layer.alert(data.msg,{icon:1});
                            window.location.href=data.url;
                        } else {
                            layer.alert(data.msg,{icon:2});
                            verify();
                        }
                    }
                });
			}
		</script>
	</body>
</html>