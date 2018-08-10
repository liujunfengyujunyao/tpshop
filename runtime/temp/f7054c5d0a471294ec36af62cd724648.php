<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:34:"./template/pc/tfs/user\paypwd.html";i:1509018229;s:34:"./template/pc/tfs/user\header.html";i:1512197568;s:32:"./template/pc/tfs/user\menu.html";i:1519984571;s:36:"./template/pc/tfs/public\footer.html";i:1519984596;s:42:"./template/pc/tfs/public\sidebar_cart.html";i:1519984596;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>安全设置</title>
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
                    <a href="<?php echo U('User/index'); ?>">我的商城</a>
			       	<i class="litt-xyb"></i>
			       	<span>安全设置</span>
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
			    		<div class="menumain">
			    			<div class="goodpiece">
								<h1>安全设置</h1>
								<!--<a href=""><span class="co_blue">帮助</span></a>-->
							</div>
				    		<div class="accouun"></div>
				    		<div class="thirset ma-to-20">
				    			<div class="wshef <?php if($step == 1): ?>yellc<?php endif; ?>">1.验证身份<i class="spassw"></i></div>
				    			<div class="wshef <?php if($step == 2): ?>yellc<?php endif; ?>">2.设置支付密码<i class="spassw"></i></div>
				    			<div class="wshef <?php if($step == 3): ?>yellc<?php endif; ?>">3.完成</div>
				    		</div>
				    		<?php if($step == 1): ?>
				    		<div class="personerinfro verifyi">
				    			<form action="" method="post">
				    				<ul class="birth_jz">
										<li class="infor_wi_le"><a href="javascript:void(0);">请选择验证方式：</a></li>
										<li>
											<a href="javascript:void(0);">
												<select name="sender" id="sender" onchange="modify_sender(this)">
													<?php if($user[mobile] != ''): ?><option value="phone" rel="<?php echo $user['mobile']; ?>">手机验证</option><?php endif; if($user[email] != ''): ?><option value="email" rel="<?php echo $user['email']; ?>">邮箱验证</option><?php endif; ?>
												</select>
											</a>
										</li>
									</ul>
									<ul class="name_jz ischecked">
										<?php if($user[mobile] != ''): ?>
											<li class="infor_wi_le"><a href="javascript:void(0);">已验证手机号码：</a></li>
											<li><a href="javascript:void(0);" class="sender"><?php echo $user['mobile']; ?></a></li>
										<?php else: ?>
											<li class="infor_wi_le"><a href="javascript:void(0);">已验证邮箱号码：</a></li>
											<li><a href="javascript:void(0);" class="sender"><?php echo $user['email']; ?></a></li>
										<?php endif; ?>
									</ul>
									<ul class="name_jz checode">
										<li class="infor_wi_le"><a href="javascript:void(0);">验证码：</a></li>
										<li class="teaeu">
											<a href="javascript:void(0);">
												<input class="name_zjxs" type="text" name="tpcode" id="tpcode" value="">
											</a>
											<a href="javascript:void(0);">
												<input class="button_yzm" type="button" name="" onclick="sendcode(this)" value="获取验证码" />
											</a>
										</li>
									</ul>
									<ul class="hobby_jz">
										<li class="infor_wi_le"></li>
										<div class="save_s">
											<input class="save" type="button" id="" onclick="nextstep()" name="" value="下一步">
										</div>
									</ul>
				    			</form>
				    			<p class="las_ver">1.支付密码是购物卡或账户余额的支付凭证，建议不要与其他网站密码相同</p>
				    		</div>
				    		<?php endif; if($step == 2): ?>
				    		<div class="personerinfro verifyi-next">
				    			<form action="" method="post" id="pwdform">
				    				<ul class="name_jz">
										<li class="infor_wi_le"><a href="javascript:void(0);">设置支付密码：</a></li>
										<li class="teaeu">
											<a href="javascript:void(0);">
												<input class="name_zjxs" type="password" name="new_password" id="new_password" value=""placeholder="6-16位字母、数字或符号组合" onkeyup="securityLevel(this.value)">
												<i class="qrzf"></i>
											</a>
											<a class="safebil" href="javascript:void(0);">
												<span>安全程度：</span>
												<span class="lowzg red">低</span>
												<span class="lowzg">中</span>
												<span class="lowzg">高</span>
											</a>
										</li>
									</ul>
									<ul class="name_jz">
										<li class="infor_wi_le"><a href="javascript:void(0);">确认支付密码：</a></li>
										<li class="teaeu">
											<a href="javascript:void(0);">
												<input class="name_zjxs" type="password" name="confirm_password" id="confirm_password" value=""placeholder="6-16位字母、数字或符号组合">
												<i class="qrzf"></i>
											</a>
										</li>
									</ul>
									<ul class="hobby_jz">
										<li class="infor_wi_le"></li>
										<div class="save_s">
											<input type="hidden" name="step" value="3">
											<input class="save" type="button" onclick="checkSubmit()" value="下一步">
										</div>
									</ul>
				    			</form>
				    			<p class="las-nex ma-to-20">1.支付密码是购物卡或账户余额的支付凭证，建议不要与其他网站密码相同</p>
				    			<p class="las-nex">2.定期修改支付密码能让账户资金更安全。</p>
				    		</div>
				    		<?php endif; if($step == 3): ?>
				    		<div class="oversuccen">
				    			<div class="zaiebox">
				    				<div class="fljair">
				    					<img src="__STATIC__/images/flj.png"/>
				    				</div>
				    				<div class="fljfon">
				    					<p>支付密码设置成功</p>
				    					<p>请牢记您设置的支付密码。<a href="<?php echo U('User/safety_settings'); ?>">查看安全设置</a></p>
				    				</div>
				    				<div class="diboback">
				    					<a href="/">去首页</a>
				    					<a href="<?php echo U('Home/Cart/index'); ?>">去购物车</a>
				    				</div>
				    			</div>
				    		</div>
				    		<?php endif; ?>
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>
		<!--footer-s-->
        <div class="footer p">
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
        </div>
		<!--footer-e-->
	</body>
	<script type="text/javascript">
        //显示密码安全等级
        function securityLevel(sValue) {
            var modes = 0;
            //正则表达式验证符合要求的
            if (sValue.length < 6 ) return modes;
            if (/\d/.test(sValue)) modes++; //数字
            if (/[a-z]/.test(sValue)) modes++; //小写
            if (/[A-Z]/.test(sValue)) modes++; //大写
            if (/\W/.test(sValue)) modes++; //特殊字符
            $('.lowzg').eq(modes-1).addClass('red').siblings('.lowzg').removeClass('red');
        };
	function modify_sender(obj){
		$('.ischecked .infor_wi_le').children().html('已验证'+$(obj).val());
		$('.sender').html($(obj).find("option:selected").attr('rel'));
	}
	function sendcode(o){
		$.ajax({
			url:'/index.php?m=Home&c=Api&a=send_validate_code&scene=6&t='+Math.random(),
			type:'get',
			dataType:'json',
			data:{type:$('#sender').val(),send:$('#sender').find("option:selected").attr('rel')},
			success:function(res){
				if(res.status==1){
					layer.alert(res.msg, {icon: 1});
					timer(o);
				}else{
					layer.alert(res.msg, {icon: 2});
				}
			}
		})
	}

	var wait=180;
	function timer(o) {
	    if (wait == 0) {  
	        o.removeAttribute("disabled");            
	        o.value="获取验证码";  
	        wait = <?php echo $tpshop_config['sms_sms_time_out']; ?>;
	    } else {  
	        o.setAttribute("disabled", true);  
	        o.value="重新发送(" + wait + ")";  
	        wait--;  
	        setTimeout(function() {  
	          timer(o)  
	        }, 1000)  
	    }  
	}
	
	function nextstep(){
		var tpcode = $('#tpcode').val();
		if(tpcode == ''){
			layer.alert('验证码不能为空', {icon: 2});
			return false;
		}
		if(tpcode.length != 4){
			layer.alert('验证码错误', {icon: 2});
			return false;
		}
		$.ajax({
			url:'/index.php?m=Home&c=Api&a=check_validate_code&t='+Math.random(),
			type:'post',
			dataType:'json',
			data:{type:$('#sender').val(),code:tpcode,send:$('#sender').find("option:selected").attr('rel'),scene:6},
			success:function(res){
				if(res.status==1){
					is_check = true;
					window.location.href='/index.php?m=Home&c=User&a=paypwd&step=2&t='+Math.random();
				}else{
					layer.alert(res.msg, {icon: 2});
					return false;
				}
			}
		})
	}
	
	function checkSubmit(){
		var new_password = $('#new_password').val();
		var confirm_password = $('#confirm_password').val();
		if(new_password == ''){
			layer.alert('新支付密码不能为空', {icon: 2});
			return false;
		}
		if(new_password.length<6 || new_password.length>18){
			layer.alert('密码长度不符合规范', {icon: 2});
			return false;
		}
		if(new_password != confirm_password){
			layer.alert('两次密码不一致', {icon: 2});
			return false;
		}
		$('#pwdform').submit();
	}
	</script>
</html>