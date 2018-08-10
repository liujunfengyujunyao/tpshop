<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:46:"./template/pc/tfs/order\return_goods_info.html";i:1509018228;s:34:"./template/pc/tfs/user\header.html";i:1512197568;s:32:"./template/pc/tfs/user\menu.html";i:1519984571;s:36:"./template/pc/tfs/public\footer.html";i:1519984596;s:42:"./template/pc/tfs/public\sidebar_cart.html";i:1519984596;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>进度跟踪</title>
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/myaccount.css" />
		<script src="__STATIC__/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/return.add.css" />
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
			       	<span>进度跟踪</span>
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
				    		<div class="menu-ri-t progse p">
				    			<div class="goodpiece p">
									<h1>售后服务详情</h1>
									<div class="twibtn_r">
										<?php
                                   
                                $md5_key = md5("select * from `__PREFIX__article` where cat_id = 6  and is_open=1 limit 1");
                                $result_name = $sql_result_v2 = S("sql_".$md5_key);
                                if(empty($sql_result_v2))
                                {                            
                                    $result_name = $sql_result_v2 = \think\Db::query("select * from `__PREFIX__article` where cat_id = 6  and is_open=1 limit 1"); 
                                    S("sql_".$md5_key,$sql_result_v2,1);
                                }    
                              foreach($sql_result_v2 as $k2=>$v2): ?>
			                                <a class="shhear" href="<?php echo U('Home/Article/detail',array('article_id'=>13)); ?>">售后政策</a>
			                            <?php endforeach; ?>
										<a class="shhear" href="tencent://message/?uin=<?php echo $store[store_qq]; ?>&Site=TPshop商城&Menu=yes"><i class="earp"></i>联系卖家</a>
									</div>
								</div>
								<div class="fu_serdetail ma-to-20">
									<div class="serft_fl">
										<span>本次售后服务由<a class="red"><?php echo $tpshop_config['shop_info_store_name']; ?></a>为您提供</span>
									</div>
									<div class="serft_fr">
										<div class="shop-if-dif">
			    							<div class="shop-difimg">
												<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>">
			    									<img src="<?php echo goods_thum_images($goods['goods_id'],100,100); ?>">
												</a>
			    							</div>
			    							<div class="cebigeze">
			    								<p class="may_zco"><span>订单编号：</span><span><a href="<?php echo U('Home/Order/order_detail',array('id'=>$return_goods['order_id'])); ?>"><?php echo $return_goods['order_sn']; ?></a></span></p>
			    								<p class="may_zco"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>"><?php echo $goods['goods_name']; ?></a></p>
			    							</div>
			    						</div>
									</div>
								</div>
				    		</div>
			    		</div>
			    		<div class="menumain p ma-to-20">
			    			<div class="goodpiece">
								<h1>售后信息</h1>
								<!--<a href=""><span class="co_blue">成长值说明<em class="thoma">></em></span></a>-->
							</div>
							<div class="diffenprp">
                                <!--服务进度-s-->
								<div class="shencharsub p">
									<ul>
                                        <li class="conduct"><!--增加conduct，图标变成绿色，下同-->
                                            <div class="sumapply">
                                                <i class="tjsq"></i>
                                                <p>提交申请</p>
                                            </div>
                                        </li>
                                        <li class="guccent">
                                            <div class="checkuoz">
                                                <span class="shwa">待审核</span>
                                                <div class="barchar"><i style="width:100%"></i></div>
                                            </div>
                                        </li>
										<?php if($return_goods[status] == -2): ?>  <!--服务单状态为已取消-->
											<li class="littyua conduct">
												<div class="thirdchackup">
													<i class="tjsq"></i>
													<p>服务单已取消</p>
												</div>
											</li>
										<?php elseif($return_goods[status] == -1): ?><!--服务单状态为审核失败-->
											<li class="littyua">
												<div class="thirdchackup">
													<i class="tjsq"></i>
													<p style="color:red;">审核未通过</p>
												</div>
											</li>
										<?php else: ?> <!--服务单状态为审核成功-->
                                            <?php if($return_goods[status] == -1): ?>
                                                <li class="littyua conduct">
                                                    <div class="thirdchackup">
                                                        <i class="tjsq"></i>
                                                        <p>审核未通过</p>
                                                    </div>
                                                </li>
                                            <?php endif; if($return_goods[status] >= 1): ?>
                                                <li class="littyua conduct">
                                                    <div class="thirdchackup">
                                                        <i class="tjsq"></i>
                                                        <p>审核通过</p>
                                                    </div>
                                                </li>
                                                <li class="guccent">
                                                    <div class="checkuoz">
                                                        <span class="shwa">
                                                            <?php if($return_goods[type] == 1): ?>
                                                                待客服发货中
                                                            <?php else: ?>
                                                                待客服退款
                                                            <?php endif; ?>
                                                        </span>
                                                        <div class="barchar"><i style="width:100%"></i></div>
                                                    </div>
                                                </li>
											<?php endif; if(($return_goods[status] >= 2) and ($return_goods['type'] == 1)): ?>
                                                <li class="littyua conduct">
                                                    <div class="thirdchackup">
                                                        <i class="tjsq"></i>
                                                        <p>卖家重新发货</p>
                                                    </div>
                                                </li>
                                                <li class="guccent">
                                                    <div class="checkuoz">
                                                        <span class="shwa">已发货</span>
                                                        <div class="barchar"><i style="width:100%"></i></div>
                                                    </div>
                                                </li>
                                            <?php endif; if(($return_goods[status] == 3)): ?>
                                                <li class="littyua conduct">
                                                    <div class="thirdchackup">
                                                        <i class="tjsq"></i>
                                                        <p>完成</p>
                                                    </div>
                                                </li>
											<?php endif; endif; ?>
									</ul>
								</div>
                                <!--服务进度-s-->

                                <!--进度说明-s-->
								<div class="sheefshjk">
									<div class="jindudoc">
										<h2>进度说明：</h2>
										<?php if($return_goods[status] == 0): ?>
										<p>亲爱的客户，您的服务单已经提交成功，请您耐心等待客服审核</p>
										<?php endif; if($return_goods[status] == 1): ?>
                                            <p>尊敬的客户，很抱歉出现这样的情况，如情况属实且非人为因素造成损坏，我们可以为您办理。请将商品全套及发票原件自行返回，
                                            如属商品质量问题，运费会以余额方式返还到您的商城账户；如非质量问题（误购），运费将由您承担(拒收到付及邮政包裹），
                                            寄回商品时请附上您的订单号及收货人姓名电话、发货单详情（运单号、快递公司、快递费用），以便我们在收到返回商品时及时为您处理，感谢您的支持，谢谢！
                                            </p>
										<?php endif; if($return_goods[status] == -1): ?>审核未通过，原因：<?php echo $return_goods['remark']; endif; if($return_goods[status] == 2 and $return_goods['type'] == 1): ?>
                                            尊敬的客户，您的换货快递已寄出。
                                        <?php endif; if($return_goods[status] ==  3): ?>
                                            尊敬的客户，您的服务单已完成，感谢您对<?php echo $tpshop_config['shop_info_store_name']; ?>的大力支持
                                        <?php endif; if($return_goods[status] == -2): ?>
                                            尊敬的客户，您的服务单已取消，感谢您对<?php echo $tpshop_config['shop_info_store_name']; ?>的大力支持
                                        <?php endif; ?>
									</div>
                                    <?php if($return_goods[status] == 2 and $return_goods['type'] == 1): ?>
                                        <a class="cancellserv" href="<?php echo U('Order/receiveConfirm',array('return_id'=>$return_goods[id])); ?>">确认收货</a>
                                    <?php endif; if($return_goods[status] != -2 and $return_goods[status] < 1): ?>
                                        <a class="cancellserv returngoodscancel"  data-href="<?php echo U('Order/return_goods_cancel',array('id'=>$return_goods[id])); ?>">取消服务单</a>
                                    <?php endif; ?>
								</div>
                                <!--进度说明-e-->
							</div>

                            <!--处理环节-s-->
							<div class="liaduebox">
								<div class="sheefshjk firshe">
									<span class="kediorse">处理环节</span>
									<div class="jindudoc">
										<h2>进度说明：</h2>
										<p>您的服务单已申请成功，等待售后审核中</p>
										<p class="caozpero"><span class="boldjh">操作人：</span><span>系统（<?php echo date('Y-m-d H:i:s',$return_goods['addtime']); ?>）</span></p>
									</div>
										<p class="cilckmor" id="cilckstart"><a href="javascript:void(0);" onclick="show_more();">查看更多</a></p>
								</div>
								<?php if($return_goods['status'] > 0): ?>
                                    <div class="sheefshjk">
                                        <div class="jindudoc">
                                            <h2>进度说明：</h2>
                                            <p>亲爱的客户，您的服务单已通过审核</p>
                                            <p class="caozpero"><span class="boldjh">操作人：</span><span>卖家</span></p>
                                        </div>
                                    </div>
								<?php endif; if($return_goods['status'] == -1): ?>
                                    <div class="sheefshjk">
                                        <div class="jindudoc">
                                            <h2>进度说明：</h2>
                                            <p>亲爱的客户，很抱歉！您的服务单未通过审核</p>
                                            <p class="caozpero"><span class="boldjh">操作人：</span><span>卖家</span></p>
                                        </div>
                                    </div>
                                <?php endif; if($return_goods['status'] > 1 and $return_goods['type'] == 1): ?>
                                    <div class="sheefshjk">
                                        <div class="jindudoc">
                                            <h2>进度说明：</h2>
                                            <p>亲爱的客户，卖家已收到您寄回的物品</p>
                                            <p class="caozpero"><span class="boldjh">操作人：</span><span>卖家</span></p>
                                        </div>
                                    </div>
                                    <div class="sheefshjk">
                                        <div class="jindudoc">
                                            <h2>进度说明：</h2>
                                            <p>亲爱的客户，卖家已重新发货,快递公司：<?php echo $return_goods[seller_delivery][express_name]; ?>,快递单号：<?php echo $return_goods[seller_delivery][express_sn]; ?></p>
                                            <p class="caozpero"><span class="boldjh">操作人：</span><span>卖家（<?php echo $return_goods[seller_delivery][express_time]; ?>）</span></p>
                                        </div>
                                    </div>
								<?php endif; if($return_goods['status'] == 3): ?>
                                    <div class="sheefshjk">
                                        <div class="jindudoc">
                                            <h2>进度说明：</h2>
                                            <p>亲爱的客户，您的服务单完成</p>
                                        </div>
                                    </div>
                                <?php endif; if($return_goods['status'] == -2): ?>
                                    <div class="sheefshjk">
                                        <div class="jindudoc">
                                            <h2>进度说明：</h2>
                                            <p>亲爱的客户，您的服务单已经取消</p>
                                        </div>
                                    </div>
								<?php endif; ?>
								<div class="sheefshjk">
									<div class="jindudoc">
										<p class="cilckmor" id="cilckstop"><a href="javascript:void(0);" onclick="show_stop();">收起</a></p>
									</div>
								</div>
							</div>
                            <!--处理环节-e-->

							<h2 class="Important-reminder"><em>重要提醒</em>：商城平台及销售不会以  <em>任何理由</em> ，要求您点击  <em>任何网址链接</em>  进行退款操作。</h2>
			    		</div>
			    		<div class="menumain p ma-to-20 serverschdule" style="">
			    			<div class="goodpiece">
								<h1>服务单信息</h1>
							</div>
							<div class="ma-to-20">								
								<div class="duwentdis">
									<div class="uploadpt">
										<p class="imgmes">图片信息：</p>
										<div class="rigdetaque">
											<div class="saveimgbox">
												<?php if(is_array($return_goods[imgs]) || $return_goods[imgs] instanceof \think\Collection || $return_goods[imgs] instanceof \think\Paginator): if( count($return_goods[imgs])==0 ) : echo "" ;else: foreach($return_goods[imgs] as $key=>$v): ?>
												<a href="<?php echo $v; ?>" target="_blank"><img src="<?php echo $v; ?>" width="100" height="100"/></a>
												<?php endforeach; endif; else: echo "" ;endif; ?>
											</div>
										</div>
									</div>
								</div>							
							</div>
							<div class="sheet manone">
		    					 <table border="1" width="100%" cellspacing="" cellpadding="">
		    					 	<?php if(($return_goods[status] == 3) and ($return_goods[type] == 0)): ?>
                                        <tr>
                                            <td><span>退款方式</span></td>
                                            <td class="lastd"><span>退回至用户余额()</span></td>
                                        </tr>
		    					 	<?php endif; ?>
		    					 	<tr>
		    					 		<td><span>商品返回方式</span></td>
		    					 		<td class="lastd"><span>若客户已收货，则由客户自行寄回给卖家</span></td>
		    					 	</tr>
		    					 	<tr>
		    					 		<td><span>商品处理方式</span></td>
                                        <td class="lastd"><span>客户期望处理方式“<?php if($return_goods[type] == 0): ?>退货<?php elseif($return_goods[type] == 1): ?>换货<?php else: ?>维修<?php endif; ?>”</span></td>
		    					 	</tr>
		    					 	<tr>
		    					 		<td><span>问题描述</span></td>
		    					 		<td class="lastd"><span><?php echo $return_goods['reason']; ?></span></td>
		    					 	</tr>
                                     <tr>
                                         <td><span>服务备注</span></td>
                                         <td class="lastd"><span><?php echo $return_goods['remark']; ?></span></td>
                                     </tr>
		    					 	<tr>
		    					 		<td><span>卖家收货信息</span></td>
		    					 		<td class="lastd">
		    					 		<strong>
		    					 			收货地址：<?php echo $tpshop_config['shop_info_address']; ?><br>
		    					 			收件人：<?php echo $tpshop_config['shop_info_store_name']; ?>(收)<br>
		    					 			电话：<?php echo $tpshop_config['shop_info_phone']; ?>
		    					 		</strong>
		    					 		</td>
		    					 	</tr>
		    					</table>
		    				</div>
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
		<script type="text/javascript">
			$('#express_time').layDate();
			function show_more(){
				$('.liaduebox').css('overflow','inherit').css('height','inherit');
				$('#cilckstart').hide();
			}
			function show_stop(){
				$('.liaduebox').css('overflow','hidden').css('height','160px');
				$('#cilckstart').show();
			}
			
			$(function(){
				$('.clickonlid').click(function(){
					$('.fileset').click();
				})
			})
			$(function(){
				$('.tuodate').click(function(){
					$('.serverschdule').show();
				})
				$('.stjaoheqx a').click(function(){
					$('.serverschdule').hide();
				})
			})
			
			function submit_form()
		    {
				var flag = true;
		       	$('input[name*="delivery"]').each(function(i,o){
		       		if($(o).val() == '' && flag){
			            layer.alert('请输入完整的快递信息!', {icon: 2});
			            flag = false;
		       		}
		       	})
		       	if(flag){
		       	 	$('#return_form').submit();
		       	}else{
		       		return false;
		       	}
		    }
            $('document').on('click','.returngoodscancel',function(){
                layer.confirm('确定取消订单?', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                        $.ajax({
                            url:$(this).data('href'),
                            method:'POST',
                            dataType:'json',
                            error: function () {
                                layer.alert("服务器繁忙, 请联系管理员!");
                            },
                            success: function (data) {
                                if (data.status === 1) {
                                    layer.msg(data.msg, {icon: 1,time: 1000}, function() {
                                        window.parent.location.href = data.url;
                                    });
                                } else {
                                    layer.msg(data.msg, {icon: 2,time: 1000});
                                }
                            }
                        });
                }, function(index){
                    layer.close(index);
                });
            })
		</script>
	</body>
</html>