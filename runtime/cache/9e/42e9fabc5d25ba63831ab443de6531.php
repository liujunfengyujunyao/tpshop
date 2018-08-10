<?php
//000000000000s:102332:"<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>商品详情</title>
    <link rel="stylesheet" type="text/css" href="/template/pc/tfs/static/css/tpshop.css" />
    <link rel="stylesheet" type="text/css" href="/template/pc/tfs/static/css/jquery.jqzoom.css">
    <script src="/template/pc/tfs/static/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/public/js/layer/layer-min.js"></script>
    <script type="text/javascript" src="/template/pc/tfs/static/js/jquery.jqzoom.js"></script>
    <script src="/public/js/global.js"></script>
    <script src="/public/js/pc_common.js"></script>
    <link rel="stylesheet" href="/template/pc/tfs/static/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
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
				<div class="dt"><a href="/Home/User/goods_collect.html">我的优惠券</a></div>
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
				<div class="dd dorpdown-layer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Home/Activity/group_list.html">团购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Home/Activity/flash_sale_list.html">抢购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/Home/Article/detail.html">帮助中心</a></div>
			</li>
		</ul>
	</div>
</div>
<!--header start-->
<div id="header">
	<div class="w">
		<div id="logo" class="logo">
			<h1 class="logo_tit"><a href="" class="logo_tit_lk">肽风尚</a></h1>
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
<div class="search-box p">
    <div class="w1224">
        <div class="search-path fl">
                            <a href="/Home/Goods/goodsList/id/16.html">积分兑换</a>
                <i class="litt-xyb"></i>
                        <div class="havedox">
                <span>24K金脸部按摩器</span>
            </div>
        </div>
    </div>
</div>
<div class="details-bigimg p">
    <div class="w1224">
        <div class="detail-img">
            <div class="product-gallery">
                <div class="product-photo" id="photoBody">
                    <!-- 商品大图介绍 start [[-->
                    <div class="product-img jqzoom">
                        <img id="zoomimg" src="/public/images/icon_goods_thumb_empty_300.png" jqimg="/public/images/icon_goods_thumb_empty_300.png">
                    </div>
                    <!-- 商品大图介绍 end ]]-->
                    <!-- 商品小图介绍 start [[-->
                    <div class="product-small-img fn-clear"> <a href="javascript:;" class="next-left next-btn fl disabled"></a>
                        <div class="pic-hide-box fl">
                            <ul class="small-pic" style="left:0;">
                                                                    <li class="small-pic-li active">
                                    <a href="javascript:;">
                                        <img src="/public/images/icon_goods_thumb_empty_300.png" data-img="/public/images/icon_goods_thumb_empty_300.png" data-big="/public/images/icon_goods_thumb_empty_300.png">
                                        <i></i>
                                    </a>
                                    </li>
                                                                    <li class="small-pic-li ">
                                    <a href="javascript:;">
                                        <img src="/public/images/icon_goods_thumb_empty_300.png" data-img="/public/images/icon_goods_thumb_empty_300.png" data-big="/public/images/icon_goods_thumb_empty_300.png">
                                        <i></i>
                                    </a>
                                    </li>
                                                                    <li class="small-pic-li ">
                                    <a href="javascript:;">
                                        <img src="/public/images/icon_goods_thumb_empty_300.png" data-img="/public/images/icon_goods_thumb_empty_300.png" data-big="/public/images/icon_goods_thumb_empty_300.png">
                                        <i></i>
                                    </a>
                                    </li>
                                                                    <li class="small-pic-li ">
                                    <a href="javascript:;">
                                        <img src="/public/images/icon_goods_thumb_empty_300.png" data-img="/public/images/icon_goods_thumb_empty_300.png" data-big="/public/images/icon_goods_thumb_empty_300.png">
                                        <i></i>
                                    </a>
                                    </li>
                                                            </ul>
                        </div>
                        <a href="javascript:;" class="next-right next-btn fl"></a> </div>
                    <!-- 商品小图介绍 end ]]-->
                </div>
                <!-- 收藏商品 start [[-->
                <div class="collect">
                    <a href="javascript:void(0);" id="collectLink"><i class="collect-ico collect-ico-null"></i>
                        <span class="collect-text">收藏商品</span>
                        <em class="J_FavCount"></em></a>
                    <!--<a href="javascript:void(0);" id="collectLink"><i class="collect-ico collect-ico-ok"></i>已收藏<em class="J_FavCount">(20)</em></a>-->
                </div>
                <!-- 分享商品 -->
                <div class="share">
                    <div class="jiathis_style">
                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt" target="_blank"><img src="http://v3.jiathis.com/code_mini/images/btn/v1/jiathis1.gif" border="0" /></a>
                    </div>
                    <script>
                        var jiathis_config = {
                            url:"http://tests.91tfs.com/index.php?m=Home&c=Goods&a=goodsInfo&id=23",
                            pic:"http://tests.91tfs.com/public/images/icon_goods_thumb_empty_300.png",
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
                </div>
            </div>
        </div>
        <form id="buy_goods_form" name="buy_goods_form" method="post" >
            <input type="hidden" name="goods_prom_type" value="0"/><!-- 活动类型 -->
            <input type="hidden" name="shop_price" value="98.00"/><!-- 活动价格 -->
            <input type="hidden" name="store_count" value="1"/><!-- 活动库存 -->
            <input type="hidden" name="market_price" value="0.00"/><!-- 商品原价 -->
            <input type="hidden" name="start_time" value=""/><!-- 活动开始时间 -->
            <input type="hidden" name="end_time" value=""/><!-- 活动结束时间 -->
            <input type="hidden" name="activity_title" value=""/><!-- 活动标题 -->
            <input type="hidden" name="prom_detail" value=""/><!-- 促销活动的促销类型 -->
            <input type="hidden" name="activity_is_on" value=""/><!-- 活动是否正在进行中 -->
            <input type="hidden" name="item_id" value=""/><!-- 商品规格id -->
            <input type="hidden" name="exchange_integral" value="98"/><!-- 积分 -->
            <input type="hidden" name="point_rate" value="1"/><!-- 积分兑换比 -->
            <div class="detail-ggsl">
                <h1>24K金脸部按摩器</h1>
                <div class="presale-time" style="display: none">
                    <div class="pre-icon fl">
                        <span class="ys"><i class="detai-ico"></i><span id="activity_type">抢购活动</span></span>
                    </div>
                    <div class="pre-icon fr">
                        <span class="per" style="display: none"><i class="detai-ico"></i><em id="order_user_num">0</em>人预定</span>
                        <span class="ti" id="activity_time"><i class="detai-ico"></i>剩余时间：<span id="overTime"></span></span>
                        <span class="ti" id="prom_detail"></span>
                    </div>
                </div>
                <div class="shop-price-cou">
                    <div class="shop-price-le">
                        <ul>
                            <li class="jaj"><span id="goods_price_title">商城价：</span></li>
                            <li>
                                            <span class="bigpri_jj" id="goods_price"><em>￥</em>
                                                <!--<a href=""><em class="sale">（降价通知）</em></a>-->
                                            </span>
                            </li>
                        </ul>
                        <ul>
                            <li class="jaj"><span id="market_price_title">市场价：</span></li>
                            <li class="though-line"><span><em>￥</em><span id="market_price">0.00</span></span></li>
                        </ul>
                        <ul id="activity_title_div" style="display: none">
                            <li class="jaj"><span id="activity_label"></span></li>
                            <li><span id="activity_title" style="color: #df3033;background: 0 0;border: 1px solid #df3033;padding: 2px 3px;"></span></li>
                        </ul>
                                            </div>
                    <div class="shop-cou-ri">
                        <div class="allcomm"><p>累计评价</p><p class="f_blue">0</p></div>
                        <div class="br1"></div>
                        <div class="allcomm"><p>累计销量</p><p class="f_blue">0</p></div>
                    </div>
                </div>
                                    <div class="standard p">
                        <!-- 收货地址，物流运费 -start-->
                        <ul class="list1">
                            <li class="jaj"><span>配&nbsp;&nbsp;送：</span></li>
                            <li class="summary-stock though-line">
                                <div class="dd shd_address">
                                    <!--<div class="addrID"><div></div><b></b></div>-->
                                    <div class="store-selector add_cj_p">
                                        <div class="text" style="width: 150px;"><div></div><b></b></div>
                                        <div onclick="$(this).parent().removeClass('hover')" class="close"></div>
                                    </div>
                                    <span id="dispatching_msg" style="display: none;">可发货</span>
                                    <select id="dispatching_select" style="display: none;">
                                                                        </select>
                                </div>
                            </li>
                        </ul>
                        <script src="/template/pc/tfs/static/js/location.js"></script>
                        <!-- 收货地址，物流运费 -end-->
                    </div>
                                <div class="standard p">
                    <ul>
                        <li class="jaj"><span>服&nbsp;&nbsp;务：</span></li>
                        <li class="lawir"><span class="service">由<a >肽风尚商城</a>发货并提供售后服务</span></li>
                    </ul>
                </div>
                                    <div class="standard p">
                        <ul>
                            <li class="jaj"><span>可&nbsp;&nbsp;用：</span></li>
                            <li class="lawir">
                                <span class="service" id="integral">
                                    0                                    +98积分
                                </span></li>
                        </ul>
                    </div>
                
                <!-- 规格 start [[-->
                                <script>

                </script>
                <!-- 规格end ]]-->
                <div class="standard">
                    <ul class="p">
                        <li class="jaj"><span>数&nbsp;&nbsp;量：</span></li>
                        <li class="lawir">
                            <div class="minus-plus">
                                <a class="mins" href="javascript:void(0);" onclick="altergoodsnum(-1)">-</a>
                                <input class="buyNum" id="number" type="text" name="goods_num" value="1" onblur="altergoodsnum(0)" max=""/>
                                <a class="add" href="javascript:void(0);" onclick="altergoodsnum(1)">+</a>
                            </div>
                            <div class="sav_shop">库存：<span id="spec_store_count">1</span></div>
                        </li>
                    </ul>
                </div>
                <div class="standard p">
                    <input type="hidden" name="goods_id" value="23" />
                                            <a id="join_cart_now" class="paybybill" href="javascript:;"  onclick="buyIntegralGoods(23,1,1);">立即兑换</a>
                        <a id="no_join_cart_now" class="paybybill" style="display:none;background: #ebebeb;color: #999;cursor: not-allowed">立即兑换</a>
                                    </div>
            </div>
        </form>
        <!--看了又看-s-->
        <div class="detail-ry p">
            <div class="type_more" >
                <div class="type-top">
                    <h2>看了又看<a class="update_h fr" href="javascript:;" onclick="replace_look();">换一换</a></h2>
                </div>
                <div id="see_and_see">
                </div>
            </div>
        </div>
        <!--看了又看-s-->
    </div>
</div>
<div class="detail-main p">
    <div class="w1224">
        <div class="deta-le-ma">
            <div class="type_more">
                <div class="type-top">
                    <h2>热搜推荐</h2>
                </div>
                <div class="type-bot">
                    <ul class="xg_typ">
                                                    <li><a href="/Home/Goods/search/q/%E9%9C%9C.html">霜</a></li>
                                                    <li><a href="/Home/Goods/search/q/%E4%B9%B3.html">乳</a></li>
                                                    <li><a href="/Home/Goods/search/q/%E9%9D%A2%E8%86%9C.html">面膜</a></li>
                                                    <li><a href="/Home/Goods/search/q/%E5%8E%9F%E6%B6%B2.html">原液</a></li>
                                                    <li><a href="/Home/Goods/search/q/%E4%BF%AE%E6%8A%A4%E6%B6%B2.html">修护液</a></li>
                                                    <li><a href="/Home/Goods/search/q/%E5%96%B7%E9%9B%BE.html">喷雾</a></li>
                                            </ul>
                </div>
            </div>
            <div class="type_more ma-to-20">
                <div class="type-top">
                    <h2>推荐热卖</h2>
                </div>
                <div class="tjhot-shoplist type-bot">
                                            <div class="alone-shop">
                            <a href="/Home/Goods/goodsInfo/id/21.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                            <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/21.html">简约水洗棉四件套   </a></p>
                            <p class="price-tag"><span class="li_xfo">￥</span><span>488.00</span></p>
                            <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                        </div>
                                            <div class="alone-shop">
                            <a href="/Home/Goods/goodsInfo/id/20.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                            <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/20.html">饱润肽冰爽夏日喷雾</a></p>
                            <p class="price-tag"><span class="li_xfo">￥</span><span>10.00</span></p>
                            <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                        </div>
                                            <div class="alone-shop">
                            <a href="/Home/Goods/goodsInfo/id/19.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                            <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/19.html">饱润肽雪肌焕彩素颜霜</a></p>
                            <p class="price-tag"><span class="li_xfo">￥</span><span>168.00</span></p>
                            <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                        </div>
                                            <div class="alone-shop">
                            <a href="/Home/Goods/goodsInfo/id/18.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                            <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/18.html">饱润肽焕颜亮肤面膜</a></p>
                            <p class="price-tag"><span class="li_xfo">￥</span><span>188.00</span></p>
                            <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                        </div>
                                            <div class="alone-shop">
                            <a href="/Home/Goods/goodsInfo/id/17.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                            <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/17.html">饱润肽水漾修护面膜</a></p>
                            <p class="price-tag"><span class="li_xfo">￥</span><span>168.00</span></p>
                            <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                        </div>
                                            <div class="alone-shop">
                            <a href="/Home/Goods/goodsInfo/id/16.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                            <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/16.html">饱润肽雪肌精华乳</a></p>
                            <p class="price-tag"><span class="li_xfo">￥</span><span>218.00</span></p>
                            <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                        </div>
                                            <div class="alone-shop">
                            <a href="/Home/Goods/goodsInfo/id/15.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                            <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/15.html">饱润肽隔离BB霜（象牙白）</a></p>
                            <p class="price-tag"><span class="li_xfo">￥</span><span>128.00</span></p>
                            <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                        </div>
                                            <div class="alone-shop">
                            <a href="/Home/Goods/goodsInfo/id/14.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                            <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/14.html">饱润肽清爽修护液</a></p>
                            <p class="price-tag"><span class="li_xfo">￥</span><span>138.00</span></p>
                            <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                        </div>
                                            <div class="alone-shop">
                            <a href="/Home/Goods/goodsInfo/id/8.html"><img src="/public/upload/goods/thumb/8/goods_thumb_8_206_206.jpeg" style="display: inline;"></a>
                            <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/8.html">饱润肽丝滑精粹原液</a></p>
                            <p class="price-tag"><span class="li_xfo">￥</span><span>238.00</span></p>
                            <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                        </div>
                                            <div class="alone-shop">
                            <a href="/Home/Goods/goodsInfo/id/7.html"><img src="/public/upload/goods/thumb/7/goods_thumb_7_206_206.png" style="display: inline;"></a>
                            <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/7.html">饱润肽水光精华液</a></p>
                            <p class="price-tag"><span class="li_xfo">￥</span><span>58.00</span></p>
                            <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                        </div>
                                    </div>
            </div>
        </div>
        <div class="deta-ri-ma">
            <div class="introduceshop">
                <div class="datail-nav-top">
                    <ul>
                        <li class="red"><a href="javascript:void(0);">商品介绍</a></li>
                        <li><a href="javascript:void(0);">规格及包装</a></li>
                        <li><a href="javascript:void(0);">评价<em>(0)</em></a></li>
                        <li><a href="javascript:void(0);" onclick="getconsult(0,1)">售后服务</a></li>
                    </ul>
                </div>
                <!--<div class="he-nav"></div>-->
                <div class="shop-describe shop-con-describe p">
                    <div class="deta-descri">
                        <p class="shopname_de"><span>商品名称：</span><span>24K金脸部按摩器</span></p>
                        <div class="ma-d-uli p">
                            <ul>
                                <!--<li><span>品牌：</span><span></span></li>-->
                                <li><span>货号：</span><span>TP0000023</span></li>
                                                            </ul>
                        </div>

                        <div class="moreparameter">
                            <!--
                            <a href="">跟多参数<em>>></em></a>
                            -->
                        </div>
                    </div>
                    <div class="detail-img-b">
                        <p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: center;"><span style="font-size: 22pt;"><span style="font-weight: 700;"><img alt="K%6W}U)LI[93QUZ1~EIXHLQ" src="/public/upload/remote/59e067ed08538.png"/><br/><br/><img alt="9Z0EV62_P}4))GMNSA)2M%W" src="/public/upload/remote/59e067ed86029.png"/><br/><br/><img alt="@PAP@20]2WQEL2P0Q5K$%1B" src="/public/upload/remote/59e067ede539a.png"/><br/><br/></span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><br/><img alt="8" src="/public/upload/remote/59e067ee7662b.png"/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><img alt="16" src="/public/upload/remote/59e067ef0f29c.png"/><br/><br/><img alt="17" src="/public/upload/remote/59e067efbe5bd.png"/><br/><br/><img alt="18" src="/public/upload/remote/59e067f05353e.png"/><br/><br/><br/><br/><img alt="undefined" src="/public/upload/remote/59e067ede539a.png"/><br/><br/><img alt="K%6W}U)LI[93QUZ1~EIXHLQ" src="/public/upload/remote/59e067ed08538.png"/><br/><br/><img alt="9Z0EV62_P}4))GMNSA)2M%W" src="/public/upload/remote/59e067ed86029.png"/><br/><br/><span style="font-size: 15pt;">名称：魔法棒、T字仪、祛皱 美眼袋黑眼圈细纹美容棒</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 颜色：金</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 按摩方式：电动振动</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 规格：17*141mm</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">适合人群：美颜棒(Beauty Bar)不分男女，年龄在12周岁以上都可以使用;电视</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;明星、广告模特儿、节目主持人等面对长期坐在电脑前的人;肩部酸</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;痛，疲劳时的人;脸部胖的人;眼纹，皱纹明显的人色斑多，毛敢大，</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 皮肤松懈下垂的人;皮肤精燥无光泽的人。 产品特点：镀有24K金的</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 按摩棒头部与半导体金属锗一起通过旋转震动按摩。 功能效果：</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 面部肌肉的弹力活性，促进面部血液循环和新陈代谢，从而延缓和</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 改善了因年龄增长而引起的皮肤松驰、皱纹、色斑、眼袋和多重下颌</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 等自然现象的发生。</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;"><span style="font-weight: 700;">美颜小插曲：</span>T字型美容棒是款很热销的产品，它的T字型设计与独特的</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 美容功效，深受美容爱好者的青睐，T字型美颜棒采</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 用防水设计，沐浴时使用不必担心产品进水而用不了。由于美容</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 功效显著。市面上美容棒</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;产品种类很多，市场多元化让相关产品的质量参差不齐，而我们&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;的愿景是缔造中国美颜器，全心全意让你享受</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 健康快乐的时尚生活，质量绝对保证。</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;"><span style="font-weight: 700;">&nbsp;产品功能：</span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 脸部紧致，松弛改善，面部提升；</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 抚平皱纹，法令纹，鱼尾纹；</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;淡化色斑，肌肤亮白有光泽；</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 肌肤紧弹，、光滑、 &nbsp; &nbsp; &nbsp;&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><table><tbody><tr class="firstRow"><td style="margin: 0px; padding: 0px; cursor: text;"><br/></td><td style="margin: 0px; padding: 0px; cursor: text; text-align: left;"><span style="font-size: 15pt;">产地：中国</span></td><td style="margin: 0px; padding: 0px; cursor: text;"><br/></td></tr></tbody></table><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">1：直接提升护肤品的护肤效果，护肤品重在吸收，吸收好了，皮肤的保养效果才会好。用与不用T字棒，护肤效果真的是天壤之别。</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">2：越贵的护肤品越要用T字棒，买那么贵的护肤品不就是为了更好的护肤吗，不用T字棒强化导入，不仅浪费了钞票，还浪费了情感。</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;"><span style="font-weight: 700;">就算买个导入仪，这个价格也赚到了！更何况——</span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">&nbsp;</span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;"><span style="font-weight: 700;">第一次使用，可保持3小时左右。</span></span></p><p style="margin-top: 0px; margin-bottom: 0px; padding: 0px; line-height: 1.5; clear: both; color: rgb(51, 51, 51); font-family: &quot;Hiragino Sans GB&quot;, Tahoma, Arial, 宋体, sans-serif; font-size: 13.3333px; white-space: normal; widows: 1; text-align: left;"><span style="font-size: 15pt;">每天坚持使用1-2次，坚持做脸部按摩运动，您会慢慢发现，脸部保持美丽的时间会越来越久，从第一次的3小时，到6小时、12小时、18小时，直至更久、永久。只要坚持面部运动，美丽就能长久定型。这与身体运动的效果是一样的，坚持！坚持就是胜利，坚持就能美丽！</span></p><p><br/></p>                    </div>
                </div>
                <div class="shop-describe shop-con-describe p" style="display: none;">
                    <div class="deta-descri">
                        <!--
                        <p class="shopname_de"><span>如果您发现商品信息不准确，<a class="de_cb" href="">欢迎纠错</a></span></p>
                        -->
                        <h2 class="shopname_de">属性</h2>
                                            </div>
                </div>
                <div class="shop-con-describe p" style="display: none;">
                    <div class="shop-describe p">
                        <div class="comm_stsh ma-to-20">
                            <div class="deta-descri">
                                <h2>商品评价</h2>
                            </div>
                        </div>
                        <div class="deta-descri p">
                            <ul class="tebj">
                                <li class="percen"><span>100%</span></li>
                                <li class="co-cen">
                                    <div class="comm_gooba">
                                        <div class="gg_c">
                                            <span class="hps">好评</span>
                                            <span class="hp">（100%）</span>
                                            <span class="zz_rg"><i style="width: 100%;"></i></span>
                                        </div>
                                        <div class="gg_c">
                                            <span class="hps">中评</span>
                                            <span class="hp">（0%）</span>
                                            <span class="zz_rg"><i style="width: 0%;"></i></span>
                                        </div>
                                        <div class="gg_c">
                                            <span class="hps">差评</span>
                                            <span class="hp">（0%）</span>
                                            <span class="zz_rg"><i style="width: 0%;"></i></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="tjd-sum">
                                    <!--<p class="tjd">推荐点：</p>-->
                                    <div class="tjd-a">
                                        买家评论事项：购买后有什么问题, 满意, 或者不不满, 都可以在这里评论出来, 这里评论全部源于真实的评论.
                                    </div>
                                </li>
                                <li class="te-cen">
                                    <div class="nchx_com">
                                        <p>您可以对已购的商品进行评价</p>
                                        <a class="jfnuv" href="/Home/User/comment.html">发表评论</a>
                                        <!--<p class="xja"><span>详见</span><a class="de_cb" href="">积分规则</a></p>-->
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="deta-descri p">
                            <div class="cte-deta">
                                <ul id="fy-comment-list">
                                    <li data-t="1" class="red">
                                        <a href="javascript:void(0);" class="selected">全部评论（0）</a>
                                    </li>
                                    <li data-t="2">
                                        <a href="javascript:void(0);">好评（0）</a>
                                    </li>
                                    <li data-t="3">
                                        <a href="javascript:void(0);">中评（0）</a>
                                    </li>
                                    <li data-t="4">
                                        <a href="javascript:void(0);">差评（0）</a>
                                    </li>
                                    <li data-t="5">
                                        <a href="javascript:void(0);">有图（0）</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="line-co-sunall"  id="ajax_comment_return">
                        </div>
                    </div>
                </div>
                <div class="shop-con-describe p" style="display: none;">
                    <div class="shop-describe p">
                        <div class="comm_stsh ma-to-20">
                            <div class="deta-descri">
                                <h2>售后保障</h2>
                            </div>
                        </div>
                        <div class="deta-descri p">
                            <div class="securi-afr">
                                <ul>
                                    <li class="frhe"><i class="detai-ico msz1"></i></li>
                                    <li class="wnuzsuhe">
                                        <h2>卖家服务</h2>
                                        <p>全国联保一年</p>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="frhe"><i class="detai-ico msz2"></i></li>
                                    <li class="wnuzsuhe">
                                        <h2>商城承诺</h2>
                                        <p>商城平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！
                                            注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。
                                            只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="frhe"><i class="detai-ico msz3"></i></li>
                                    <li class="wnuzsuhe">
                                        <h2>正品行货</h2>
                                        <p>商城向您保证所售商品均为正品行货，商城自营商品开具机打发票或电子发票。</p>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="frhe"><i class="detai-ico msz4"></i></li>
                                    <li class="wnuzsuhe">
                                        <h2>全国联保</h2>
                                        <p>凭质保证书及商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由联系保修，享受法定三包售后服务），与您亲临商场选购的商品享
                                            受相同的质量保证。商城还为您提供具有竞争力的商品价格和运费政策，请您放心购买！ </p>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="frhe"><i class="detai-ico msz5"></i></li>
                                    <li class="wnuzsuhe">
                                        <h2>退货无忧</h2>
                                        <p>客户购买商城自营商品7日内（含7日，自客户收到商品之日起计算），在保证商品完好的前提下，可无理由退货。（部分商品除外，详情请见各商品细则）</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="comm_stsh ma-to-20">
                            <div class="deta-descri">
                                <h2>退款说明</h2>
                            </div>
                        </div>
                        <div class="deta-descri p">
                            <div class="fetbajc">
                                <p>1.若您购买的家电商品已经拆封过，需要退换货，需请联系原厂开具鉴定检测单</p>
                                <p>2.签收商品隔日起七日内提交退货申请，2-3天快递员与您联系安排取回商品</p>
                                <p>3.商品退回检验，且必须附上检测单</p>
                                <p>5.若退回商品有缺件、影响二次销售状况时，退款作业将暂时停止，飞牛网会依商品状况报价，后由客服人员与您联系说明并于订单内扣除费用后退回剩余款项，
                                    或您可以取消退货申请；若符合退货条件者将于商品取回后约1-2个工作日内完成退款</p>
                                <p>4.通过线上支付的订单办理退货，商品退回检验无误后，商城将提交退款申请, 实际款项会依照各银行作业时间返还至您原支付方式 若您采用货到付款，请于
                                    办理退货时提供退款账户，亦于商品退回检验无误后，将退款汇至您的银行账户中</p>
                            </div>
                        </div>
                    </div>
                    <!--商品咨询-status-->
                    <div class="consult-h" id="consult-h">
                        <div class="consult-menus">
                            <a class="consult-ac" href="javascript:;" onclick="getconsult(0,1)">全部咨询</a>
                            <a href="javascript:;" onclick="getconsult(1,1)">商品咨询</a>
                            <a href="javascript:;" onclick="getconsult(2,1)">支付</a>
                            <a href="javascript:;" onclick="getconsult(3,1)">配送</a>
                            <a href="javascript:;" onclick="getconsult(4,1)">售后</a>
                            <input type="hidden" name="type" id="type" value="0"/>
                        </div>
                        <div class="consult-cont">
                            <div class="consult-item">
                                <div class="consult-tips"><span class="c-orange">温馨提示：</span> 因产线可能更改商品包装、产地、附配件等未及时通知，且每位咨询者购买、提问时间等不同。为此，客服给到的回复仅对提问者3天内有效，其他网友仅供参考！给您带来的不便还请谅解，谢谢！</div>
                                <div id="consult_content">
                                </div>
                                <div class="publish-title">发表咨询</div>
                                <form method="post" id="consultForm" action="/home/Goods/goodsConsult.html">
                                    <input type="hidden" name="goods_id" value="23"/>
                                    <input type="hidden" name="store_id" value=""/>
                                    <div class="publish-cont">
                                        <p class="check-consult-tpye">
                                            商品咨询：
                                            <label> <input  type="radio" name="consult_type" value="1"  checked/>商品咨询</label>
                                            <label> <input  type="radio" name="consult_type" value="2"/>支付</label>
                                            <label> <input  type="radio" name="consult_type" value="3"/>配送</label>
                                            <label> <input  type="radio" name="consult_type" value="4"/>售后</label>
                                        </p>
                                        <div class="nickname">
                                            昵称:
                                                                                            <input type="text" name="username" placeholder="请输入昵称"  value=""/>
                                                                                    </div>
                                        <textarea class="publish-des" placeholder="请在这里输入你要描述的信息" name="content"></textarea>
                                        <p class="v-code">
                                            验证码:
                                            <input type="text" name="verify_code" maxlength="4"/>
                                            <img id="verify_code" width="80" height="40"  onclick="verify()">
                                        </p>
                                        <input class="publish-btn" type="submit" value="提交" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--商品咨询-end-->
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
            <!--联系电话：020-86210199<br/>地址：<br/>-->
            Copyright &copy; 肽风尚商城 版权所有，保留一切权利。备案号：<a
                href="http://www.miibeian.gov.cn" target="_blank">粤ICP17092251号</a>
        </p>
    </div>
</div>
<div class="soubao-sidebar">
    <div class="soubao-sidebar-bg"></div>
    <div class="sidertabs tab-lis-1">
        <div class="sider-top-stra sider-midd-1">
            <div class="icon-tabe-chan">
                <a href="/Home/User/index.html">
                    <i class="share-side share-side1"></i>
                    <i class="share-side tab-icon-tip triangleshow"></i>
                </a>

                <div class="dl_login">
                    <div class="hinihdk">
                        <img src="/template/pc/tfs/static/images/dl.png"/>

                        <p class="loginafter nologin"><span>你好，请先</span><a href="/Home/user/login.html">登录！</a></p>
                        <!--未登录-e--->
                        <!--登录后-s--->
                        <p class="loginafter islogin">
                            <span class="id_jq userinfo">陈xxxxxxx</span>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="/Home/user/logout.html" title="点击退出">退出！</a>
                        </p>
                        <!--未登录-s--->
                    </div>
                </div>
            </div>
            <div class="icon-tabe-chan shop-car">
                <a href="javascript:void(0);" onclick="ajax_side_cart_list()">
                    <div class="tab-cart-tip-warp-box">
                        <div class="tab-cart-tip-warp">
                            <i class="share-side share-side1"></i>
                            <i class="share-side tab-icon-tip"></i>
                            <span class="tab-cart-tip">购物车</span>
                            <span class="tab-cart-num J_cart_total_num" id="tab_cart_num">0</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="icon-tabe-chan massage">
                <a href="/Home/User/message_notice.html" target="_blank">
                    <i class="share-side share-side1"></i>
                    <!--<i class="share-side tab-icon-tip"></i>-->
                    <span class="tab-tip">消息</span>
                </a>
            </div>
        </div>
        <div class="sider-top-stra sider-midd-2">
            <div class="icon-tabe-chan mmm">
                <a href="/Home/User/goods_collect.html" target="_blank">
                    <i class="share-side share-side1"></i>
                    <!--<i class="share-side tab-icon-tip"></i>-->
                    <span class="tab-tip">收藏</span>
                </a>
            </div>
            <div class="icon-tabe-chan hostry">
                <a href="/Home/User/visit_log.html" target="_blank">
                    <i class="share-side share-side1"></i>
                    <!--<i class="share-side tab-icon-tip"></i>-->
                    <span class="tab-tip">足迹</span>
                </a>
            </div>
            <!--<div class="icon-tabe-chan sign">-->
                <!--<a href="" target="_blank">-->
                    <!--<i class="share-side share-side1"></i>-->
                    <!--&lt;!&ndash;<i class="share-side tab-icon-tip"></i>&ndash;&gt;-->
                    <!--<span class="tab-tip">签到</span>-->
                <!--</a>-->
            <!--</div>-->
        </div>
    </div>
    <div class="sidertabs tab-lis-2">
        <div class="icon-tabe-chan advice">
            <a title="点击这里给我发消息" href="tencent://message/?uin=123456789&amp;Site=TPshop商城&amp;Menu=yes" target="_blank">
                <i class="share-side share-side1"></i>
                <!--<i class="share-side tab-icon-tip"></i>-->
                <span class="tab-tip">在线咨询</span>
            </a>
        </div>
        <div class="icon-tabe-chan request">
            <a href="" target="_blank">
                <i class="share-side share-side1"></i>
                <!--<i class="share-side tab-icon-tip"></i>-->
                <span class="tab-tip">意见反馈</span>
            </a>
        </div>
        <div class="icon-tabe-chan qrcode">
            <a href="" target="_blank">
                <i class="share-side share-side1"></i>
                <i class="share-side tab-icon-tip triangleshow"></i>
                <span class="tab-tip qrewm">
                    <img src="/template/pc/tfs/static/images/qrcode.png"/>
                    扫一扫下载APP
                </span>
            </a>
        </div>
        <div class="icon-tabe-chan comebacktop">
            <a href="" target="_blank">
                <i class="share-side share-side1"></i>
                <!--<i class="share-side tab-icon-tip"></i>-->
                <span class="tab-tip">返回顶部</span>
            </a>
        </div>
    </div>
    <div class="shop-car-sider">

    </div>
</div>
<script src="/template/pc/tfs/static/js/common.js"></script>
<!--看了又看-s-->
<div style="display: none" id="look_see">
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/3.html"><img class="wiahides" src="/public/upload/goods/thumb/3/goods_thumb_3_206_206.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/3.html">饱润肽柔肤洁面乳</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>88.00</span>
                </p>
            </div>
        </div>
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/7.html"><img class="wiahides" src="/public/upload/goods/thumb/7/goods_thumb_7_206_206.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/7.html">饱润肽水光精华液</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>58.00</span>
                </p>
            </div>
        </div>
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/14.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/14.html">饱润肽清爽修护液</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>138.00</span>
                </p>
            </div>
        </div>
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/4.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/4.html">A套餐-美人柜</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>900.00</span>
                </p>
            </div>
        </div>
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/9.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/9.html">B套餐-美人柜</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>1200.00</span>
                </p>
            </div>
        </div>
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/10.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/10.html">C套餐-美人柜</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>1500.00</span>
                </p>
            </div>
        </div>
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/26.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/26.html">修护液体验装</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>50.00</span>
                </p>
            </div>
        </div>
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/27.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/27.html">精华乳体验装</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>62.00</span>
                </p>
            </div>
        </div>
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/28.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/28.html">测试赠品</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>0.00</span>
                </p>
            </div>
        </div>
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/1.html"><img class="wiahides" src="/public/upload/goods/thumb/1/goods_thumb_1_206_206.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/1.html">饱润肽焕颜气垫CC霜（自然色）</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>178.00</span>
                </p>
            </div>
        </div>
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/2.html"><img class="wiahides" src="/public/upload/goods/thumb/2/goods_thumb_2_206_206.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/2.html">饱润肽焕颜气垫CC霜（象牙白）</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>198.00</span>
                </p>
            </div>
        </div>
            <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="/Home/Goods/goodsInfo/id/5.html"><img class="wiahides" src="/public/upload/goods/thumb/5/goods_thumb_5_206_206.png" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="/Home/Goods/goodsInfo/id/5.html">饱润肽活力滋养霜</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>158.00</span>
                </p>
            </div>
        </div>
        <!--看了又看-s-->
</div>
<!--footer-e-->
<script src="/template/pc/tfs/static/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/template/pc/tfs/static/js/headerfooter.js" ></script>
<script type="text/javascript">
    var commentType = 1;// 默认评论类型
    var spec_goods_price = [];//规格库存价格
    $(document).ready(function () {
        /*商品缩略图放大镜*/
        $(".jqzoom").jqueryzoom({
            xzoom: 500,
            yzoom: 500,
            offset: 1,
            position: "right",
            preload: 1,
            lens: 1
        });
        replace_look();
        initSpec();
        initGoodsPrice();
    });
    //有规格id的时候，解析规格id选中规格
    function initSpec(){
        var item_id = $("input[name='item_id']").val();
        $.each(spec_goods_price,function(i, o){
            if(o.item_id == item_id){
                var spec_key_arr = o.key.split("_");
                $.each(spec_key_arr,function(index,item){
                    var spec_radio = $("#goods_spec_"+item);
                    var goods_spec_a = $("#goods_spec_a_"+item);
                    spec_radio.attr("checked","checked");
                    goods_spec_a.addClass('red');
                })
            }
        })
        if(item_id > 0 && !$.isEmptyObject(spec_goods_price)){
            var item_arr = [];
            $.each(spec_goods_price,function(i, o){
                item_arr.push(o.item_id);
            })
            //规格id不存在商品里
            if($.inArray(parseInt(item_id), item_arr) < 0){
                initFirstSpec();
            }else{
                $.each(spec_goods_price,function(i, o){
                    if(o.item_id == item_id){
                        var spec_key_arr = o.key.split("_");
                        $.each(spec_key_arr,function(index,item){
                            var spec_radio = $("#goods_spec_"+item);
                            var goods_spec_a = $("#goods_spec_a_"+item);
                            spec_radio.attr("checked","checked");
                            goods_spec_a.addClass('red');
                        })
                    }
                })
            }
        }else{
            initFirstSpec();
        }
    }

    //默认让每种规格第一个选中
    function initFirstSpec(){
        $('.spec_goods_price_div').each(function (i, o) {
            var firstSpecRadio = $(this).find("input[type='radio']").eq(0);
            firstSpecRadio.attr('checked','checked').prop('checked','checked');
            firstSpecRadio.parent().find('a').eq(0).addClass('red');
        })
    }

    /**
     * 切换规格
     */
    function select_filter(obj)
    {
        $(obj).addClass('red').siblings('a').removeClass('red');
        $(obj).siblings('input').removeAttr('checked');
        $(obj).prev('input').attr('checked','checked').prop('checked','checked');
        // 更新商品价格
        initGoodsPrice();
    }

    //看了又看切换
    var tmpindex = 0;
    var look_see_length = $('#look_see').children().length;
    function replace_look(){
        var listr='';
        if(tmpindex*2>=look_see_length) tmpindex = 0;
        $('#look_see').children().each(function(i,o){
            if((i>=tmpindex*2) && (i<(tmpindex+1)*2)){
                listr += '<div class="tjhot-shoplist type-bot">'+$(o).html()+'</div>';
            }
        });
        tmpindex++;
        $('#see_and_see').empty().append(listr);
    }
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
    $(function(){
        $("#area").click(function (e) {
            SelCity(this,e);
        });
    })

    $(function() {
        ajaxComment(1,1);
        // 好评差评 切换
        $('.cte-deta ul li').click(function(){
            $(this).addClass('red').siblings().removeClass('red');
            commentType = $(this).data('t');// 评价类型   好评 中评  差评
            ajaxComment(commentType,1);
        })
    });
    $(function(){
        $('.datail-nav-top ul li').click(function(){
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
    function altergoodsnum(n){
        var num = parseInt($('#number').val());
        var maxnum = parseInt($('#number').attr('max'));
        if(maxnum > 200){
            maxnum = 200;
        }
        num += n;
        num <= 0 ? num = 1 :  num;
        if(num >= maxnum){
            $(this).addClass('no-mins');
            num = maxnum;
        }
        $('#store_count').text(maxnum-num); //更新库存数量
        $('#number').val(num);
        initGoodsPrice();
    }

    //初始化商品价格库存
    function initGoodsPrice() {
        var goods_id = $('input[name="goods_id"]').val();
        var goods_num = parseInt($('#number').val());
        if (!$.isEmptyObject(spec_goods_price)) {
            var goods_spec_arr = [];
            $("input[name^='goods_spec']").each(function () {
                if($(this).attr('checked') == 'checked'){
                    goods_spec_arr.push($(this).val());
                }
            });
            var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key
            var item_id = spec_goods_price[spec_key]['item_id'];
            $('input[name=item_id]').val(item_id);
        }
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: {goods_id: goods_id, item_id: item_id, goods_num : goods_num},
            url: "/Home/Goods/activity.html",
            success: function (data) {
                if (data.status == 1) {
                    $('input[name="goods_prom_type"]').attr('value', data.result.goods.prom_type);//商品活动类型
                    $('input[name="shop_price"]').attr('value', data.result.goods.shop_price);//商品价格
                    $('input[name="store_count"]').attr('value', data.result.goods.store_count);//商品库存
                    $('input[name="market_price"]').attr('value', data.result.goods.market_price);//商品原价
                    $('input[name="start_time"]').attr('value', data.result.goods.start_time);//活动开始时间
                    $('input[name="end_time"]').attr('value', data.result.goods.end_time);//活动结束时间
                    $('input[name="activity_title"]').attr('value', data.result.goods.activity_title);//活动标题
                    $('input[name="prom_detail"]').attr('value', data.result.goods.prom_detail);//促销详情
                    $('input[name="activity_is_on"]').attr('value', data.result.goods.activity_is_on);//活动是否正在进行中
                    goods_activity_theme();
                }
            }
        });
    }

    //商品价格库存显示
    function goods_activity_theme(){
        var goods_prom_type = $('input[name="goods_prom_type"]').attr('value');
        var activity_is_on = $('input[name="activity_is_on"]').attr('value');
        if(activity_is_on == 0){
            setNormalGoodsPrice();
        }else{
            if(goods_prom_type == 0){
                //普通商品
                setNormalGoodsPrice();
            }else if(goods_prom_type == 1){
                //抢购
                setFlashSaleGoodsPrice();
            }else if(goods_prom_type == 2){
                //团购
                setGroupByGoodsPrice();
            }else if(goods_prom_type == 3){
                //优惠促销
                setPromGoodsPrice();
            }else{

            }
        }
        var buy_num  = parseInt($('#number').val());//购买数
        var store = parseInt($('input[name="store_count"]').val());//实际库存数量
        if(store<= 0){
            joinCart(false);
        }else{
            joinCart(true);
        }
        if(buy_num > store){
            $('.buyNum').val(store);
        }
    }

    //普通商品库存和价格
    function setNormalGoodsPrice(){
        var goods_price,store_count;//商品价,商品库存
        var market_price =  $("input[name='market_price']").attr('value');// 商品市场价
        var exchange_integral = $("input[name='exchange_integral']").attr('value');// 兑换积分
        var point_rate = $("input[name='point_rate']").attr('value');// 积分金额比
        // 如果有属性选择项
        if(!$.isEmptyObject(spec_goods_price))
        {
            var goods_spec_arr = [];
            $("input[name^='goods_spec']").each(function () {
                if($(this).attr('checked') == 'checked'){
                    goods_spec_arr.push($(this).val());
                }
            });
            var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key
            goods_price = spec_goods_price[spec_key]['price']; // 找到对应规格的价格
            store_count = spec_goods_price[spec_key]['store_count']; // 找到对应规格的库存
            $("input[name='shop_price']").attr('value',goods_price);
            $("input[name='store_count']").attr('value',store_count);
        }
        goods_price =  $("input[name='shop_price']").attr('value');// 商品本店价
        store_count = $("input[name='store_count']").attr('value');// 商品库存
        $('#market_price_title').empty().html('市场价：');
        $('#market_price').empty().html(market_price);
        $("#goods_price").html("<em>￥</em>"+goods_price); //变动价格显示
        var integral = round(goods_price - (exchange_integral / point_rate),2);
        $("#integral").html(integral + '+' +exchange_integral + '积分'); //积分显示
        $('#spec_store_count').html(store_count);
        $('.presale-time').hide();
        $('#number').attr('max',store_count);
    }

    //秒杀商品库存和价格
    function setFlashSaleGoodsPrice(){
        var flash_sale_price = $("input[name='shop_price']").attr('value');
        var flash_sale_count = $("input[name='store_count']").attr('value');
        var market_price = $("input[name='market_price']").attr('value');
        var start_time = $("input[name='start_time']").attr('value');
        var end_time = $("input[name='end_time']").attr('value');
        var activity_title = $("input[name='activity_title']").attr('value');
        $("#goods_price").html("<em>￥</em>"+flash_sale_price); //变动价格显示
        $('#spec_store_count').html(flash_sale_count);
        $('#goods_price_title').html('抢购价：');
        $('#market_price_title').empty().html('原&nbsp;&nbsp;价：');
        $('#activity_label').empty().html('抢&nbsp;&nbsp;购：');
        $('#activity_title').empty().html(activity_title);
        $('#activity_title_div').show();
        $('#market_price').empty().html(market_price);
        $('.presale-time').show();
        $('#prom_detail').hide();
        $('#number').attr('max',flash_sale_count);
        setInterval(activityTime, 1000);
    }

    //团购商品库存和价格
    function setGroupByGoodsPrice(){
        var group_by_price = $("input[name='shop_price']").attr('value');
        var group_by_count = $("input[name='store_count']").attr('value');
        var market_price = $("input[name='market_price']").attr('value');
        var start_time = $("input[name='start_time']").attr('value');
        var end_time = $("input[name='end_time']").attr('value');
        var activity_title = $("input[name='activity_title']").attr('value');
        $("#goods_price").empty().html("<em>￥</em>"+group_by_price); //变动价格显示
        $('#spec_store_count').empty().html(group_by_count);
        $('#activity_type').empty().html('团购');
        $('#goods_price_title').empty().html('团购价：');
        $('#market_price_title').empty().html('原&nbsp;&nbsp;价：');
        $('#activity_label').empty().html('团&nbsp;&nbsp;购：');
        $('#activity_title').empty().html(activity_title);
        $('#activity_title_div').show();
        $('#market_price').empty().html(market_price);
        $('.presale-time').show();
        $('#prom_detail').hide();
        $('#number').attr('max',group_by_count);
        setInterval(activityTime, 1000);
    }

    //促销商品库存和价格
    function setPromGoodsPrice(){
        var prom_goods_price = $("input[name='shop_price']").attr('value');
        var prom_goods_count = $("input[name='store_count']").attr('value');
        var market_price = $("input[name='market_price']").attr('value');
        var start_time = $("input[name='start_time']").attr('value');
        var end_time = $("input[name='end_time']").attr('value');
        var activity_title = $("input[name='activity_title']").attr('value');
        var prom_detail = $("input[name='prom_detail']").attr('value');
        $("#goods_price").empty().html("<em>￥</em>"+prom_goods_price); //变动价格显示
        $('#spec_store_count').empty().html(prom_goods_count);
        $('#activity_type').empty().html('促销');
        $('.presale-time').show();
        $('#prom_detail').empty().html(prom_detail).show();
        $('#activity_time').hide();
        $('#goods_price_title').empty().html('促销价：');
        $('#market_price_title').empty().html('原&nbsp;&nbsp;价：');
        $('#activity_label').empty().html('促&nbsp;&nbsp;销：');
        $('#activity_title').empty().html(activity_title);
        $('#activity_title_div').show();
        $('#market_price').empty().html(market_price);
        $('#number').attr('max',prom_goods_count);
    }

    // 倒计时
    function activityTime() {
        var end_time = parseInt($("input[name='end_time']").attr('value'));
        var timestamp = Date.parse(new Date());
        var now = timestamp/1000;
        var end_time_date = formatDate(end_time*1000);
        var text = GetRTime(end_time_date);
        //活动时间到了就刷新页面重新载入
        if(now > end_time){
            layer.msg('该商品活动已结束',function(){
                location.reload();
            });
        }
        $("#overTime").text(text);
    }
    //时间戳转换
    function add0(m){return m<10?'0'+m:m }
    function  formatDate(now)   {
        var time = new Date(now);
        var y = time.getFullYear();
        var m = time.getMonth()+1;
        var d = time.getDate();
        var h = time.getHours();
        var mm = time.getMinutes();
        var s = time.getSeconds();
        return y+'/'+add0(m)+'/'+add0(d)+' '+add0(h)+':'+add0(mm)+':'+add0(s);
    }

    /***用作 sort 排序用*/
    function sortNumber(a,b)
    {
        return a - b;
    }

    /***收藏商品**/
    $('#collectLink').click(function(){
        if(getCookie('user_id') == ''){
            layer.msg('请先登录！', {icon: 1});
        }else{
            $.ajax({
                type:'post',
                dataType:'json',
                data:{goods_id:$('input[name="goods_id"]').val()},
                url:"/Home/Goods/collect_goods.html",
                success:function(res){
                    if(res.status == 1){
                        layer.msg('成功添加至收藏夹', {icon: 1});
                    }else{
                        layer.msg(res.msg, {icon: 3});
                    }
                }
            });
        }
    });
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
    /***用ajax分页显示评论**/
    function ajaxComment(commentType,page){
        $.ajax({
            type : "GET",
            url:"/index.php?m=Home&c=goods&a=ajaxComment&goods_id=23&commentType="+commentType+"&p="+page,//+tab,
            success: function(data){
                $("#ajax_comment_return").html('').append(data);
            }
        });
    }
    /**
     * 切换图片
     */
    function switch_zooming(img)
    {
        if(img != ''){
            $('#zoomimg').attr('jqimg', img).attr('src', img);
        }
    }
</script>
<!--商品咨询JS-->
<script>
    // 普通 图形验证码
    function verify(){
        $('#verify_code').attr('src','/index.php?m=Home&c=User&a=verify&type=consult&r='+Math.random());
    }
    var consult=$('#consult-h');
    consult.find('.consult-item').eq(0).addClass('consult-ac');
    consult.find('.consult-menus>a').click(function () {
        $(this).addClass('consult-ac').siblings().removeClass('consult-ac');
        consult.find('.consult-item').eq($(this).index())
                .addClass('consult-ac').siblings().removeClass('consult-ac');
        $('.check-consult-tpye').find('a').eq($(this).index())
    });
    $(document).ready(function () {
        verify();
    });
    $(document).on('click','.pagination  a',function(){
        var page = $(this).data('p');
        var type = $('#type').val();
        getconsult(type,page)
    });
    /**
     * 获取商品咨询
     * @param type  //咨询类型
     * @param page  //分页
     */
    function getconsult(type,page){
        var goods_id = 23;
        var url = "/index.php?m=Home&c=Goods&a=ajax_consult";
        $.ajax({
            type : "Post",
            url  : url,
            data : {goods_id:goods_id,consult_type:type,p:page},
            dataType: "html",
            success: function(data){
                $('#consult_content').html('');
                $('#consult_content').append(data);
            }
        });
    }
</script>
</body>
</html>";
?>