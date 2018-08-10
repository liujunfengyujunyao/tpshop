<?php
//000000000000s:15234:"<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>商品列表</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link href="/template/pc/tfs/static/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/template/pc/tfs/static/css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/template/pc/tfs/static/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="/template/pc/tfs/static/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/js/global.js"></script>
    <script type="text/javascript" src="/template/pc/tfs/static/js/common.js"></script>
    <script src="/template/pc/tfs/static/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/public/upload/logo/2017/09-20/06bef7c5190326d724a8631bc36cf55c.png" media="screen"/>
</head>
<body>
<!--header-s-->
<div id="shortcut">
	<div class="w">
		<ul class="fr">
			<li class="fore1" id="ttbar-login">欢迎进入肽风尚商城，</li>
			<li class="fore1 nologin" id="ttbar-login">
				<a href="/index.php/Home/user/login.html" class="link-login style-red">请登录</a>&nbsp;&nbsp;<a href="/index.php/Home/user/reg.html" class="link-regist">免费注册</a>
			</li>
			<li class="fore1 islogin">
				<a class="style-red userinfo" href="/index.php/Home/user/index.html" ></a>&nbsp;&nbsp;
				<a  href="/index.php/Home/user/logout.html"  title="退出" target="_self">安全退出</a>
			</li>
			<li class="kong-a"></li>
			<li class="spacer"></li>
			<li class="fore2">
				<div class="dt"><a href="/index.php/Home/Order/order_list.html">我的订单</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore4">
				<div class="dt"><a href="/index.php/Home/User/visit_log.html">我的浏览</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore4">
				<div class="dt"><a href="/index.php/Home/User/coupon.html">我的优惠券</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore5">
				<div class="dt"><a href="/index.php/Home/User/goods_collect.html">我的收藏</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore4">
				<div class="dt"><a href="tencent://message/?uin=123456789&amp;Site=肽风尚商城&amp;Menu=yes">在线客服</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore9 dorpdown" id="ttbar-navs">
				<div class="dt cw-icon">网站导航<i class="iconfont">&#xe605;</i><i class="ci-right"><s>◇</s></i></div>
				<div class="dd dorpdown-layer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Activity/group_list.html">团购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Activity/flash_sale_list.html">抢购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/index.php/Home/Article/detail.html">帮助中心</a></div>
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
				<form id="searchForm" name="" method="get" action="/index.php/Home/Goods/search.html" class="ecsc-search-form">
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
									url:"/index.php/Home/Api/searchKey.html",
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
				<a href="/index.php/Home/Cart/cart.html">我的购物车<b>&nbsp;&nbsp;<span>(<em class="sc_z" id="cart_quantity"></em>)</span></b></a>
			</div>
		</div>

		<div id="hotwords">
			<ul class="tfsclassify">
									<li><a href="/index.php/Home/Goods/search/q/%E9%9C%9C.html" target="_blank">霜</a></li>
									<li><a href="/index.php/Home/Goods/search/q/%E4%B9%B3.html" target="_blank">乳</a></li>
									<li><a href="/index.php/Home/Goods/search/q/%E9%9D%A2%E8%86%9C.html" target="_blank">面膜</a></li>
									<li><a href="/index.php/Home/Goods/search/q/%E5%8E%9F%E6%B6%B2.html" target="_blank">原液</a></li>
									<li><a href="/index.php/Home/Goods/search/q/%E4%BF%AE%E6%8A%A4%E6%B6%B2.html" target="_blank">修护液</a></li>
									<li><a href="/index.php/Home/Goods/search/q/%E5%96%B7%E9%9B%BE.html" target="_blank">喷雾</a></li>
							</ul>
		</div>

		<!-- navitems start -->
		<div id="navitems">
			<ul id="navitems-group1">
				<li ><a href="/index.php/home/Index/index.html">首页</a></li>
									<li >
					<a href="/index.php/Home/Goods/goodsList/id/1" target="_blank"  >肽风尚●护</a>
					</li>
									<li class='selected'>
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
<div id="tfs-hu">
    <div class="container tfs-screen">
        <div class="row screen">
                            <a href="javascript:void(0);"><img src="/public/upload/ad/2017/11-07/52faa53fbfe32c7e388f9a269025952f.jpg" width="100%"/></a>
                        <div class="seat">
                <span class="float"> 全部结果 > </span>
                                    <a href="/index.php/Home/Goods/goodsList/id/2.html" class="float">肽风尚-养</a>
                                <!--如果当前分类是三级分类 则二级也要显示-->
                                <!--当前分类-->
                                <div class="clear"></div>
            </div>
            <!-- 品牌筛选 start -->
                        <!-- 品牌筛选 end -->
            <!-- 价格筛选 start -->
                        <!-- 价格筛选 end -->
            <div class="clear"></div>
            <!-- 规格筛选 start -->
                        <!-- 规格筛选 end -->
            <!-- 属性筛选 start -->
                        <!-- 属性筛选 end -->
        </div>
        <div class="clear"></div>
        <div class="container">
            <div class="row volume">
                <div class="col-xs-10">
                    <ul>
                        <li>
                            <a href="/index.php/Home/Goods/goodsList/id/2" class="current">综合</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Goods/goodsList/id/2/sort/sales_sum" >销量</a>
                        </li>
                                                    <li>
                                <a href="/index.php/Home/Goods/goodsList/id/2/sort/shop_price/sort_asc/desc" ">价格<i class="glyphicon glyphicon-chevron-down"></i></a>
                            </li>
                                                <li>
                            <a href="/index.php/Home/Goods/goodsList/id/2/sort/comment_count" >评论</a>
                        </li>
                        <li>
                            <a href="/index.php/Home/Goods/goodsList/id/2/sort/is_new" >新品</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-2">
                                        <div class="commodity">共0件商品
                        &nbsp;&nbsp;&nbsp;1/1&nbsp;&nbsp;&nbsp;
                        <a >&lt;</a>
                        <a >&gt;</a>
                    </div>
                </div>
            </div><!--volume-->
            <div class="row general">
                                    <div class="noGoods">
                        抱歉，没有找到您要搜索的商品！
                    </div>
                            </div><!--general-->
            <div class="clear"></div>
            <div class="container like">
                <div class="row liketop">
                    <div class="col-xs-11 left">猜你喜欢</div>
                    <div class="col-xs-1 right">
                        <img src="/template/pc/tfs/static/images/huan.png" /><a href="javascript:void(0)" onclick="favourite();">换一批</a>
                    </div>
                </div>
                <div class="row likedown">
                    <div class="tfsgeneral" id="favourite_goods"></div><!--tfsgeneral-->
                </div>
            </div>

                            <div class="row purple">
                    <a href="javascript:void(0);"><img src="/public/upload/ad/2017/11-04/98b2009db85c0e9f37e21690f3d2eec3.jpg" width="100%"/></a>
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
                                                                    <a href="/index.php/Home/Article/detail/article_id/1419.html">购物流程</a>
                                                            </li>
                                                    <li>
                                                                    <a href="/index.php/Home/Article/detail/article_id/1420.html">售后服务</a>
                                                            </li>
                                        </ul>
                            <ul>
                                            <li class="Shopping">关于我们</li>
                                                    <li>
                                                                    <a href="/index.php/Home/Article/detail/article_id/1416.html">公司简介</a>
                                                            </li>
                                                    <li>
                                                                    <a href="/index.php/Home/Article/detail/article_id/1417.html">发展历程</a>
                                                            </li>
                                                    <li>
                                                                    <a href="/index.php/Home/Article/detail/article_id/1418.html">品牌荣誉</a>
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
<!--footer-e-->
<script type="text/javascript">
$(function() {
    favourite();
});
/****猜你喜欢****/
var favorite_page = 0;
function favourite()
{
    favorite_page++;
    $.ajax({
        type: "GET",
        url: "/index.php?m=Home&c=Index&a=ajax_favorite&i=5&p="+favorite_page,//+tab,
        success: function (data) {
            if(data == ''){
                favorite_page = 0;
                favourite();
            }else{
                $('#favourite_goods').html(data);
                lazy_ajax();
            }
        }
    });
}
</script>
</body>
</html>";
?>