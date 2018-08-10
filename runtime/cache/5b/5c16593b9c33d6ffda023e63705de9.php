<?php
//000000000000s:32613:"<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>商品详情</title>
	<link href="/template/pc/tfs/static/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/template/pc/tfs/static/css/style.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="/template/pc/tfs/static/css/jquery.jqzoom.css">
	<script type="text/javascript" src="/template/pc/tfs/static/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="/template/pc/tfs/static/bootstrap/js/bootstrap.min.js"></script>
	<script src="/public/js/global.js"></script>
	<script src="/public/js/pc_common.js"></script>
	<script type="text/javascript" src="/template/pc/tfs/static/js/common.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="/public/upload/logo/2017/09-20/06bef7c5190326d724a8631bc36cf55c.png" media="screen"/>
	<script type="text/javascript" src="/template/pc/tfs/static/js/kxbdSuperMarquee.js"></script>
	<script type="text/javascript" src="/template/pc/tfs/static/js/jquery.jqzoom.js"></script>
	<script type="text/javascript" src="/public/js/layer/layer.js"></script>
	<script src="/template/pc/tfs/static/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="/template/pc/tfs/static/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
	<script src="/template/pc/tfs/static/js/location.js" type="text/javascript"></script>
</head>

<body>
<!--header-s-->
<div id="shortcut">
	<div class="w">
		<ul class="fr">
			<li class="fore1" id="ttbar-login">欢迎进入肽风尚商城，</li>
			<li class="fore1 nologin" id="ttbar-login">
				<a href="/Home/user/login.html" class="link-login style-red">请登录</a>&nbsp;&nbsp;<a href="/Home/user/reg.html" class="link-regist">免费注册</a>
			</li>
			<li class="fore1 islogin">
				<a class="style-red userinfo" href="/Home/user/index.html" ></a>&nbsp;&nbsp;
				<a  href="/Home/user/logout.html"  title="退出" target="_self">安全退出</a>
			</li>
			<li class="kong-a"></li>
			<li class="spacer"></li>
			<li class="fore2">
				<div class="dt"><a href="/Home/Order/order_list.html">我的订单</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore4">
				<div class="dt"><a href="/Home/User/visit_log.html">我的浏览</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore4">
				<div class="dt"><a href="/Home/User/coupon.html">我的优惠券</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore5">
				<div class="dt"><a href="/Home/User/goods_collect.html">我的收藏</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore4">
				<div class="dt"><a href="tencent://message/?uin=123456789&amp;Site=肽风尚商城&amp;Menu=yes">在线客服</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore9 dorpdown" id="ttbar-navs">
				<div class="dt cw-icon">网站导航<i class="iconfont">&#xe605;</i><i class="ci-right"><s>◇</s></i></div>
				<div class="dd dorpdown-layer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Home/Activity/group_list.html">团购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Home/Activity/flash_sale_list.html">抢购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Home/Article/detail/article_id/1415.html">帮助中心</a></div>
			</li>
		</ul>
	</div>
</div>
<!--header start-->
<div id="header">
	<div class="w">
		<div id="logo" class="logo">
			<h1 class="logo_tit"><a href="/" class="logo_tit_lk">肽风尚</a></h1>
		</div>

		<div id="search">
			<div class="search-m">
				<div class="form">
				<form id="searchForm" name="" method="get" action="/Home/Goods/search.html" class="ecsc-search-form">
					<input name="q" type="text" autocomplete="off" id="key" accesskey="s" class="text" value="" placeholder="请输入搜索关键字"/>
					<button type="submit" class="button"><i class="iconfont"><img src="/template/pc/tfs/static/images/search.png" /></i></button>
					<div class="candidate p">
						<ul id="search_list"></ul>
					</div>
					<script type="text/javascript">
						;(function($){
							$.fn.extend({
								donetyping: function(callback,timeout){
									timeout = timeout || 1e3;
									var timeoutReference,
											doneTyping = function(el){
												if (!timeoutReference) return;
												timeoutReference = null;
												callback.call(el);
											};
									return this.each(function(i,el){
										var $el = $(el);
										$el.is(':input') && $el.on('keyup keypress',function(e){
											if (e.type=='keyup' && e.keyCode!=8) return;
											if (timeoutReference) clearTimeout(timeoutReference);
											timeoutReference = setTimeout(function(){
												doneTyping(el);
											}, timeout);
										}).on('blur',function(){
											doneTyping(el);
										});
									});
								}
							});
						})(jQuery);

						$('.ecsc-search-input').donetyping(function(){
							search_key();
						},500).focus(function(){
							var search_key = $.trim($('#q').val());
							if(search_key != ''){
								$('.candidate').show();
							}
						});
						$('.candidate').mouseleave(function(){
							$(this).hide();
						});

						function searchWord(words){
							$('#q').val(words);
							$('#searchForm').submit();
						}
						function search_key(){
							var search_key = $.trim($('#q').val());
							if(search_key != ''){
								$.ajax({
									type:'post',
									dataType:'json',
									data: {key: search_key},
									url:"/Home/Api/searchKey.html",
									success:function(data){
										if(data.status == 1){
											var html = '';
											$.each(data.result, function (n, value) {
												html += '<li onclick="searchWord(\''+value.keywords+'\');"><div class="search-item">'+value.keywords+'</div><div class="search-count">约'+value.goods_num+'个商品</div></li>';
											});
											html += '<li class="close"><div class="search-count">关闭</div></li>';
											$('#search_list').empty().append(html);
											$('.candidate').show();
										}else{
											$('#search_list').empty();
										}
									}
								});
							}
						}
					</script>
				</form>
				</div>
			</div>

		</div>

		<div id="settleup">
			<div class="cw-icon">
				<i class="iconfont">&#xe607;</i>
				<a href="/Home/Cart/cart.html">我的购物车<b>&nbsp;&nbsp;<span>(<em class="sc_z" id="cart_quantity"></em>)</span></b></a>
			</div>
		</div>

		<div id="hotwords">
			<ul class="tfsclassify">
									<li><a href="/Home/Goods/search/q/%E9%9C%9C.html" target="_blank">霜</a></li>
									<li><a href="/Home/Goods/search/q/%E4%B9%B3.html" target="_blank">乳</a></li>
									<li><a href="/Home/Goods/search/q/%E9%9D%A2%E8%86%9C.html" target="_blank">面膜</a></li>
									<li><a href="/Home/Goods/search/q/%E5%8E%9F%E6%B6%B2.html" target="_blank">原液</a></li>
									<li><a href="/Home/Goods/search/q/%E4%BF%AE%E6%8A%A4%E6%B6%B2.html" target="_blank">修护液</a></li>
									<li><a href="/Home/Goods/search/q/%E5%96%B7%E9%9B%BE.html" target="_blank">喷雾</a></li>
							</ul>
		</div>

		<!-- navitems start -->
		<div id="navitems">
			<ul id="navitems-group1">
				<li ><a href="/home/Index/index.html">首页</a></li>
									<li >
					<a href="/index.php/Home/Goods/goodsList/id/1" target="_blank"  >肽风尚●护</a>
					</li>
									<li >
					<a href="/index.php/Home/Goods/goodsList/id/2" target="_blank"  >肽风尚●养</a>
					</li>
									<li >
					<a href="/index.php/Home/Goods/goodsList/id/3" target="_blank"  >肽风尚●调</a>
					</li>
									<li >
					<a href="/index.php/Home/Goods/goodsList/id/7" target="_blank"  >体验品</a>
					</li>
							</ul>
		</div>
		<!-- navitems end -->
	</div>
</div>
<!--header-e-->

<div id="goodsInfo">
	<div class="inner_banner">
					<a href="javascript:void(0);"><img src="/public/upload/ad/2017/11-07/52faa53fbfe32c7e388f9a269025952f.jpg" width="100%"/></a>
			</div>

	<div class="inner_nav">
		<p>
							<a href="/Home/Goods/goodsList/id/1.html">肽风尚-护</a>
				<span> > </span>
							<a href="/Home/Goods/goodsList/id/11.html">抗衰系列</a>
				<span> > </span>
						<span>饱润肽丝滑精粹原液</span>
		</p>
	</div>

	<section>
		<div class="inner_sec">
			<div class="section_left">
				<div class="pic">
					<div id="marquee">
						<ul>
															<li class="jqzoom"><img id="zoomimg" src="/public/upload/goods/thumb/8/goods_sub_thumb_8_425_425.jpeg" jqimg="/public/upload/goods/thumb/8/goods_sub_thumb_8_600_600.jpeg" width="425" height="425" /></li>
													</ul>
					</div>
					<div id="marqueeNav">
						<ul>
															<li><img src="/public/upload/goods/thumb/8/goods_sub_thumb_8_80_80.jpeg" width="80" height="80" /></li>
													</ul>
					</div>
				</div>
				<div class="detail-ggsl">
					<form id="buy_goods_form" name="buy_goods_form" method="post" >
						<h2>饱润肽丝滑精粹原液</h2>
						<h3></h3>

						<!--商品抢购 start-->
												<!--商品抢购  end-->

						<div class="price">
															<div class="pri_send">
									<span class="pri_l">市场价：</span><span class="pri_m">￥0.00</span>
								</div>
								<div class="pri_send">
									<span class="pri_l">商城价：</span><span class="pri_r" id="goods_price">￥238.00</span>
								</div>
														<div class="clearfix"></div>
														<div class="pri_txt">本商品由肽风尚商城直接发货 并且提供售后服务</div>
						</div>

						<div class="freight">
							<div class="fre_one"><p>配送</p></div>
							<div class="fre_two list1">
								<div class="store-selector">
									<div class="text">
										<div></div>
										<b></b>
									</div>
									<div onclick="$(this).parent().removeClass('hover')" class="close"></div>
								</div>
							</div>
							<select id="dispatching_select" style="display: none;"></select>
						</div>

						<div class="sale">
							<div class="sale_one"><h5>累计销量</h5><h6>1</h6></div>
							<div class="sale_one"><h5>累计评价</h5><h6>0</h6></div>
							<div class="sale_thr"><h5>赠送积分</h5><h6><span>0</span></h6></div>
						</div>
						<div class="content">
							<!-- 规格 Start -->
														<!-- 规格 End -->
							<div class="clearfix"></div>

							<div class="cont_sl">
								<div><h5>数量</h5></div>
								<input class="cont_cho" id="number" type="text" name="goods_num" value="1" onblur="altergoodsnum(0)" onkeyup="this.value=this.value.replace(/[^\d]/g, '')" max="973" />
								<div class="cont_bnt">
									<a href="javascript:void(0);" onclick="altergoodsnum(1)"><div class="bnt_top"></div></a>
									<a href="javascript:void(0);" onclick="altergoodsnum(-1)"><div class="bnt_bot"></div></a>
								</div>
								<div class="cont_txt">
									<p>件</p>
									<p>库存<span id="store_count">972</span>件</p>
								</div>
							</div>
						</div>
						<div class="bnt_shop">
							<input type="hidden" name="goods_id" value="8" />
															<a class="bnt bnt_shop_l" href="javascript:;" onclick="AjaxAddCart(8,1,1);">立即购买</a>
								<a class="bnt bnt_shop_r" href="javascript:;" onclick="AjaxAddCart(8,1,0);"><i class="glyphicon glyphicon-shopping-cart"></i> 加入购物车</a>
													</div>
						<div class="promise">
							<div class="pro_l"><p>服务承诺</p></div>
							<div class="pro_m">
								<span>过敏无忧</span>
								<span>品质保证</span>
								<span>极速退款</span>
								<span>七天无理由退换</span>
							</div>
						</div>
						<div class="share">
							<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt" target="_blank">分享</a>
							<script>
								var jiathis_config = {
									url:"http://tests.91tfs.com/index.php?m=Home&c=Goods&a=goodsInfo&id=8",
									pic:"http://tests.91tfs.com/public/upload/goods/thumb/8/goods_thumb_8_400_400.jpeg",
								}
								var is_distribut = getCookie('is_distribut');
								var user_id = getCookie('user_id');
								// 如果已经登录了, 并且是分销商
								if(parseInt(is_distribut) == 1 && parseInt(user_id) > 0)
								{
									jiathis_config.url = jiathis_config.url + "&first_leader="+user_id;
								}
							</script>
							<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
							<a href="javascript:void(0);" id="collectLink">收藏商品（20人气）</a>
						</div>
					</form>
				</div>
				<div class="clearfix"></div>
				<!-- 热销宝贝 Start -->
				<div class="selling">
					<div class="sell_txt"><p>热销宝贝</p></div>
					<div class="sell_pic">
											</div>
				</div>
				<!-- 热销宝贝 End -->
				<div class="sec_two_main">
					<div class="introduceshop">
						<ul class="tab_ul">
							<li class="tab_one"><a href="#new1" class="gal">商品详情</a></li>
							<li><a href="#new2">累计评价 <span>0</span></a></li>
						</ul>
						<div class="cont" id="new1">
							<div class="cont_one">
								<h6>产品名称：饱润肽丝滑精粹原液</h6>

								<div class="cont_txet">
									<ul>
																					<li style="width:100%"><span>成分：</span><span>水、丙二醇、甘油、尿囊素、水解胎盘（羊）提取物、透明质酸钠</span></li>
																					<li ><span>产地：</span><span>广州</span></li>
																					<li style="width:100%"><span>功效：</span><span>轻抚细纹，缓解粗燥，滋养皮肤</span></li>
																					<li ><span>产品规格：</span><span>30g</span></li>
																					<li ><span>化妆品品类：</span><span>抗衰系列</span></li>
																			</ul>
								</div>
							</div>
							<div class="cont_detail">
								<p style="text-align: center;"><img src="/public/upload/temp/2017/09-26/2f2baaae4f6f13f7b15c37ff2ae96b68.jpg" title="2f2baaae4f6f13f7b15c37ff2ae96b68.jpg" alt="2f2baaae4f6f13f7b15c37ff2ae96b68.jpg"/></p>							</div>
						</div>
						<div class="cont" id="new2">
							<div class="evaluate">
								<div class="eva_title"><h3>商品评价</h3></div>
								<div class="eva_praise">
									<div class="eva_praise_l"><p>好评度</p><h5>100</h5><h6>%</h6></div>
									<div class="eva_praise_r">
																					该商品暂无买家印象
																			</div>
								</div>
								<div class="eva_main cte-deta">
									<div class="eva_mian_nav">
										<ul>
											<li data-t="1" class="red"><a href="javascript:void(0);">全部评价(0)</a></li>
											<li data-t="5"><a href="javascript:void(0);">晒图(0)</a></li>
											<li data-t="2"><a href="javascript:void(0);">好评(0)</a></li>
											<li data-t="3"><a href="javascript:void(0);">中评(0)</a></li>
											<li data-t="4"><a href="javascript:void(0);">差评(0)</a></li>
										</ul>
									</div>
									<div id="ajax_comment_return"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- 看了又看 Start -->
			<div class="section_right">
				<div class="other">
					<div class="other_txt"><p><span class="other_dot">······</span><span>看了又看</span><span class="other_dot">······</span></p></div>
					<div class="other_pic" id="see_and_see"></div>
					<div class="text-center"><a href="javascript:void(0)" onclick="replace_look()"><img src="/template/pc/tfs/static/images/other.png" /></a></div>
				</div>
			</div>
			<!-- 看了又看 End -->
		</div>
	</section>
</div>
<div class="hidden" id="look_see">
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/1.html"><img src="/public/upload/goods/thumb/1/goods_thumb_1_150_150.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/1.html">饱润肽焕颜气垫CC霜（自然色）</a></div>
			<p>￥178.00</p>
		</div>
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/2.html"><img src="/public/upload/goods/thumb/2/goods_thumb_2_150_150.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/2.html">饱润肽焕颜气垫CC霜（象牙白）</a></div>
			<p>￥198.00</p>
		</div>
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/3.html"><img src="/public/upload/goods/thumb/3/goods_thumb_3_150_150.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/3.html">饱润肽柔肤洁面乳</a></div>
			<p>￥88.00</p>
		</div>
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/4.html"><img src="/public/images/icon_goods_thumb_empty_300.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/4.html">A套餐-美人柜</a></div>
			<p>￥900.00</p>
		</div>
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/5.html"><img src="/public/upload/goods/thumb/5/goods_thumb_5_150_150.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/5.html">饱润肽活力滋养霜</a></div>
			<p>￥158.00</p>
		</div>
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/6.html"><img src="/public/upload/goods/thumb/6/goods_thumb_6_150_150.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/6.html">饱润肽隔离BB霜（自然色）</a></div>
			<p>￥98.00</p>
		</div>
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/7.html"><img src="/public/images/icon_goods_thumb_empty_300.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/7.html">饱润肽水光精华液</a></div>
			<p>￥58.00</p>
		</div>
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/9.html"><img src="/public/images/icon_goods_thumb_empty_300.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/9.html">B套餐-美人柜</a></div>
			<p>￥1200.00</p>
		</div>
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/10.html"><img src="/public/images/icon_goods_thumb_empty_300.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/10.html">C套餐-美人柜</a></div>
			<p>￥1500.00</p>
		</div>
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/14.html"><img src="/public/images/icon_goods_thumb_empty_300.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/14.html">饱润肽清爽修护液</a></div>
			<p>￥138.00</p>
		</div>
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/15.html"><img src="/public/images/icon_goods_thumb_empty_300.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/15.html">饱润肽隔离BB霜（象牙白）</a></div>
			<p>￥128.00</p>
		</div>
			<div class="otherpic_one">
			<div>
				<a href="/Home/Goods/goodsInfo/id/16.html"><img src="/public/images/icon_goods_thumb_empty_300.png" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="/Home/Goods/goodsInfo/id/16.html">饱润肽雪肌精华乳</a></div>
			<p>￥218.00</p>
		</div>
	</div>

<!--footer-s-->
<div id="foot">
    <div class="gray">
        <div class="Promise">
            <dl>
                <dt><img src="/template/pc/tfs/static/images/xing.png" /></dt>
                <dd class="pin">品质保障</dd>
                <dd>Quality assurance</dd>
            </dl>
            <dl>
                <dt><img src="/template/pc/tfs/static/images/hua.png" /></dt>
                <dd class="pin">联系客服</dd>
                <dd>Contact Customer Service</dd>
            </dl>
            <dl class="shou">
                <dt><img src="/template/pc/tfs/static/images/you.png" /></dt>
                <dd class="pin">售后无忧</dd>
                <dd>Worry free after sale</dd>
            </dl>
        </div>
    </div>
    <div class="clear"></div>
    <div class="footend">
        <div class="endone">
                            <ul>
                                            <li class="Shopping">新手上路</li>
                                                    <li>
                                                                    <a href="/Home/Article/detail/article_id/1419.html">购物流程</a>
                                                            </li>
                                                    <li>
                                                                    <a href="/Home/Article/detail/article_id/1420.html">售后服务</a>
                                                            </li>
                                        </ul>
                            <ul>
                                            <li class="Shopping">关于我们</li>
                                                    <li>
                                                                    <a href="/Home/Article/detail/article_id/1416.html">公司简介</a>
                                                            </li>
                                                    <li>
                                                                    <a href="/Home/Article/detail/article_id/1417.html">发展历程</a>
                                                            </li>
                                                    <li>
                                                                    <a href="/Home/Article/detail/article_id/1418.html">品牌荣誉</a>
                                                            </li>
                                        </ul>
                            <ul>
                                    </ul>
            
            <p class="code"><img src="/template/pc/tfs/static/images/qrcode.jpg" width="50%"/></br>手机扫码注册</p>
            <div class="clear"></div>
        </div>
        <p class="write"></p>
        <p class="bjtfs">
            <!--联系电话：020-86210199<br/>地址：广东省广州市白云区嘉禾鹤龙一横路28号金泰创意园H栋3楼<br/>-->
            Copyright &copy; 肽风尚商城 版权所有，保留一切权利。备案号：<a
                href="http://www.miibeian.gov.cn" target="_blank">粤ICP17092251号</a>
        </p>
    </div>
</div>
<div id="sidebar">
	<div class="sidebar-bg"></div>
	<div class="sidertabs tab-lis-1">
		<div class="sider-top-stra sider-midd-1">
			<div class="icon-tabe-chan icon-tabe-user">
				<a href="/Home/User/index.html">
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
				<a href="/Home/User/message_notice.html" target="_blank">
					<i class="share-side share-side1"></i>
					<span class="tab-tip">消息</span>
				</a>
			</div>
		</div>
		<div class="sider-top-stra sider-midd-2">
			<div class="icon-tabe-chan collect">
				<a href="/Home/User/goods_collect.html" target="_blank">
					<i class="share-side share-side1"></i>
					<span class="tab-tip">收藏</span>
				</a>
			</div>
			<div class="icon-tabe-chan hostry">
				<a href="/Home/User/visit_log.html" target="_blank">
					<i class="share-side share-side1"></i>
					<span class="tab-tip">足迹</span>
				</a>
			</div>
		</div>
	</div>
	<div class="sidertabs tab-lis-2">
		<div class="icon-tabe-chan advice">
			<a title="点击这里给我发消息" href="tencent://message/?uin=123456789&amp;Site=肽风尚商城&amp;Menu=yes" target="_blank">
				<i class="share-side share-side1"></i>
				<span class="tab-tip">在线咨询</span>
			</a>
		</div>
		<div class="icon-tabe-chan qrcode">
				<i class="share-side share-side1"></i>
                <span class="tab-tip qrewm">
                    <img src="/template/pc/tfs/static/images/qrcode.jpg" width="100" height="100"/>关注公众号
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

<script type="text/javascript">
	var commentType = 1;// 默认评论类型
	$(document).ready(function () {
		/*商品缩略图放大镜*/
		$(".jqzoom").jqueryzoom(
		{xzoom:300,yzoom:300}
		);
		get_goods_price();
		ajaxComment(commentType, 1);// ajax 加载评价列表
		replace_look();

		$('#marquee').kxbdSuperMarquee({
			navId: '#marqueeNav'
		});

	});

	//商品详情与评论切换
	$('.tab_ul li a').click(function () {
		$('.cont').hide();
		$($(this).attr('href')).show();
		$('.tab_ul li a').removeClass('gal');
		$(this).addClass('gal');
		return false;
	});

	/**
	 * 切换规格
	 */
	function select_filter(obj) {
		$(obj).addClass('red').siblings('li').removeClass('red');
		$(obj).siblings('input').prop('checked', false);
		$(obj).prev('input').prop('checked', true);	 // 让隐藏的 单选按钮选中
		// 更新商品价格
		get_goods_price();
	}

	//看了又看切换
	var tmpindex = 0;
	var look_see_length = $('#look_see').children().length;
	function replace_look() {
		var listr = '';
		if (tmpindex * 3 >= look_see_length) tmpindex = 0;
		$('#look_see').children().each(function (i, o) {
			if ((i >= tmpindex * 3) && (i < (tmpindex + 1) * 3)) {
				listr += '<div class="otherpic_one">' + $(o).html() + '</div>';
			}
		});
		tmpindex++;
		$('#see_and_see').empty().append(listr);
	}

	var store_count = 973; // 商品起始库存
	//缩略图切换
	$('.small-pic-li').each(function (i, o) {
		var lilength = $('.small-pic-li').length;
		$(o).hover(function () {
			$(o).siblings().removeClass('active');
			$(o).addClass('active');
			$('#zoomimg').attr('src', $(o).find('img').attr('data-img'));
			$('#zoomimg').attr('jqimg', $(o).find('img').attr('data-big'));

			$('.next-btn').removeClass('disabled');
			if (i == 0) {
				$('.next-left').addClass('disabled');
			}
			if (i + 1 == lilength) {
				$('.next-right').addClass('disabled');
			}
		});
	})

	//前一张缩略图
	$('.next-left').click(function () {
		var newselect = $('.small-pic>.active').prev();
		$('.small-pic>.active').removeClass('active');
		$(newselect).addClass('active');
		$('#zoomimg').attr('src', $(newselect).find('img').attr('data-img'));
		$('#zoomimg').attr('jqimg', $(newselect).find('img').attr('data-big'));
		var index = $('.small-pic>li').index(newselect);
		if (index == 0) {
			$('.next-left').addClass('disabled');
		}
		$('.next-right').removeClass('disabled');
	})

	//后前一张缩略图
	$('.next-right').click(function () {
		var newselect = $('.small-pic>.active').next();
		$('.small-pic>.active').removeClass('active');
		$(newselect).addClass('active');
		$('#zoomimg').attr('src', $(newselect).find('img').attr('data-img'));
		$('#zoomimg').attr('jqimg', $(newselect).find('img').attr('data-big'));
		var index = $('.small-pic>li').index(newselect);
		if (index + 1 == $('.small-pic>li').length) {
			$('.next-right').addClass('disabled');
		}
		$('.next-left').removeClass('disabled');
	})
	$(function () {
		$("#area").click(function (e) {
			SelCity(this, e);
		});
	})
	$(function () {
		// 好评差评 切换
		$('.cte-deta ul li').click(function () {
			$(this).addClass('red').siblings().removeClass('red');
			commentType = $(this).data('t');// 评价类型   好评 中评  差评
			ajaxComment(commentType, 1);
		})
	});
	$(function () {
		$('.datail-nav-top ul li').click(function () {
			$(this).addClass('red').siblings().removeClass('red');
			var er = $('.datail-nav-top ul li').index(this);
			$('.shop-con-describe').eq(er).show().siblings('.shop-con-describe').hide();
		})
	})

	/**
	 * 加减数量
	 * n 点击一次要改变多少
	 * maxnum 允许的最大数量(库存)
	 * number ，input的id
	 */
	function altergoodsnum(n) {
		var num;
		if($('#number').val() == ''){
			num = 0;
		}else {
			num = $("#number").val();
		}
		num = parseInt(num);
		var maxnum = parseInt($('#number').attr('max'));
		num += n;
		num <= 0 ? num = 1 : num;
		if (num >= maxnum) {
			$(this).addClass('no-mins');
			num = maxnum;
		}
		$('#store_count').text(maxnum - num); //更新库存数量
		$('#number').val(num)
	}

	function get_goods_price() {
		var goods_price = 238.00; // 商品起始价
		var store_count = 973; // 商品起始库存
		var spec_goods_price = [];  // 规格 对应 价格 库存表   //alert(spec_goods_price['28_100']['price']);
		// 优先显示抢购活动库存
				// 如果有属性选择项
		if (spec_goods_price != null && spec_goods_price != '') {
			goods_spec_arr = new Array();
			$("input[name^='goods_spec']:checked").each(function () {
				goods_spec_arr.push($(this).val());
			});
			var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key
			goods_price = spec_goods_price[spec_key]['price']; // 找到对应规格的价格
			store_count = spec_goods_price[spec_key]['store_count']; // 找到对应规格的库存
		}

		var goods_num = parseInt($("#goods_num").val());
		// 库存不足的情况
		if (goods_num > store_count) {
			goods_num = store_count;
			layer.alert('库存仅剩 ' + store_count + ' 件', {icon: 2});
			$("#goods_num").val(goods_num);
		}
		$('#store_count').html(store_count);    //对应规格库存显示出来
		$('#number').attr('max', store_count); //对应规格最大库存
		$("#goods_price").html('<span>￥</span><span>' + goods_price + '</span>'); // 变动价格显示
	}
	/***用作 sort 排序用*/
	function sortNumber(a, b) {
		return a - b;
	}

	/***收藏商品**/
	$('#collectLink').click(function () {
		if (getCookie('user_id') == '') {
			layer.msg('请先登录！', {icon: 1});
		} else {
			$.ajax({
				type: 'post',
				dataType: 'json',
				data: {goods_id: $('input[name="goods_id"]').val()},
				url: "/Home/Goods/collect_goods.html",
				success: function (res) {
					if (res.status == 1) {
						layer.msg('成功添加至收藏夹', {icon: 1});
					} else {
						layer.msg(res.msg, {icon: 3});
					}
				}
			});
		}
	});

	/***用ajax分页显示评论**/
	function ajaxComment(commentType, page) {
		$.ajax({
			type: "GET",
			url: "/index.php?m=Home&c=goods&a=ajaxComment&goods_id=8&commentType=" + commentType + "&p=" + page,//+tab,
			success: function (data) {
				$("#ajax_comment_return").html('');
				$("#ajax_comment_return").append(data);
			}
		});
	}

	/**
	 * 切换图片
	 */
	function switch_zooming(img) {
		if (img != '') {
			$('#zoomimg').attr('jqimg', img);
			$('#zoomimg').attr('src', img);
		}
	}

	function virtual_buy() {
		var store_count = $("input[name='store_count']").attr('value');// 商品原始库存
		var buynum = parseInt($('.buyNum').val());
		var virtual_limit = parseInt($('#virtual_limit').val());
		if ((buynum <= store_count && buynum <= virtual_limit) || (buynum < store_count && virtual_limit == 0)) {
			$('#buy_goods_form').submit();
		} else {
			layer.msg('购买数量超过此商品购买上限', {icon: 3});
		}
	}
</script>
</body>
</html>";
?>