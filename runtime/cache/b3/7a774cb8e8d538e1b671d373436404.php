<?php
//000000000000s:70935:"<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>商品列表</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<link rel="stylesheet" type="text/css" href="/template/pc/rainbow/static/css/tpshop.css" />
	<script src="/template/pc/rainbow/static/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/public/js/layer/layer-min.js"></script>
	<script src="/public/js/global.js"></script>
	<script src="/public/js/pc_common.js"></script>
	<link rel="stylesheet" href="/template/pc/rainbow/static/css/location.css" type="text/css">
    <style>
        @media screen and (max-width: 1260px) {
            .header .ecsc-join{
                display: none;
            }
            .top-ri-header ul li{
                padding: 0 4px;
            }
            .list1 .dd{
                width: 200px !important;
            }
            .footer{
                min-width: inherit;
            }
            .navitems{
                width: 840px;
            }
            .categorys .dt a{
                width: 100px;
            }
            .categorys{
                width: 140px;
            }
            .footer .foot-list-fl{
                width: 608px;
            }
            .footer .foot-list-fl ul{
                width: 120px;
            }
            .categorys .cata-nav-name h3{
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .home_categorys .cata-nav-layer{
                left: 180px !important;
            }
            .categorys .cata-nav-layer{
                width: 840px;
            }
            .categorys .cata-nav-layer .cata-nav-rigth{
                display: none;
            }
            .categorys .dt a:before{
                margin-right: 0;
                width: 0;
            }
            .sendaddress{
                display: none;
            }
            .tp_h_alone .ecsc-search{
                margin: 10px 0 0 66px;
            }
            .tp_h_alone .navitems{
                width: 800px;
            }
            .tp_h_alone .categorys2 .cata-nav-layer .cata-nav-rigth{
                display: none;
            }
            .tp_h_alone .categorys2 .cata-nav-layer{
                width: 800px;
            }
        }
        @media screen and (min-width: 1260px){
            .tp_h_alone .ecsc-search{
               margin: 10px 0 0 290px;
            }
            .u-g-cart{
                width: 160px;
            }
        }
    </style>
</head>
<body>
<!-- 新浪获取ip地址 -start-->
<!--header-s-->
    <div class="tpshop-tm-hander tp_h_alone p">
        <!--导航栏-s-->
        <div class="top-hander p">
            <div class="w1224 pr p">
                <div class="fl">
                    <!-- 收货地址，物流运费 -start-->
                    <div class="sendaddress pr fl">
                        <span>送货至：</span>
                        <span>
                            <ul class="list1">
                                <li class="summary-stock though-line">
                                    <div class="dd" style="border-right:0px;width:200px;">
                                        <div class="store-selector add_cj_p">
                                            <div class="text"><div></div><b></b></div>
                                            <div onclick="$(this).parent().removeClass('hover')" class="close"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </span>
                    </div>
                    <!-- 收货地址，物流运费 -end-->
                        <div class="fl nologin">
                            <a class="red" href="/index.php/Home/user/login.html">Hi.请登录</a>
                            <a href="/index.php/Home/user/reg.html">免费注册</a>
                        </div>
                        <div class="fl islogin">
                            <a class="red userinfo" href="/index.php/Home/user/index.html" ></a>
                            <a  href="/index.php/Home/user/logout.html"  title="退出" target="_self">安全退出</a>
                        </div>
                </div>
                <div class="top-ri-header fr">
                    <ul>
                        <li><a target="_blank" href="/index.php/Home/Order/order_list.html">我的订单</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="/index.php/Home/User/visit_log.html">我的浏览</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="/index.php/Home/User/coupon.html">我的优惠券</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="/index.php/Home/User/goods_collect.html">我的收藏</a></li>
                        <!-- <li class="spacer"></li>
                        <li><a target="_blank" title="点击这里给我发消息" href="/index.php/Home/Article/detail/article_id/22.html" target="_blank">在线客服</a></li>
                        <li class="spacer"></li> -->
                        <!--<li class="hover-ba-navdh">-->
                            <!--<div class="nav-dh">-->
                                <!--<span>网站导航</span>-->
                                <!--<i class="share-a_a1"></i>-->
                                <!--<div class="conta-hv-nav">-->
                                    <!--<ul>-->
                                        <!--<li>-->
                                            <!--<a href="/index.php/Home/Activity/group_list.html">团购</a>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                            <!--<a href="/index.php/Home/Activity/flash_sale_list.html">抢购</a>-->
                                        <!--</li>-->
                                    <!--</ul>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</li>-->
                    </ul>
                </div>
            </div>
        </div>
        <!--导航栏-e-->
        <div class="nav-middan-z p">
            <div class="header w1224 p">
                <div class="ecsc-logo">
                    <a href="/index.php/home/Index/index.html" class="logo"> <img src="/public/upload/logo/2017/09-20/06bef7c5190326d724a8631bc36cf55c.png"></a>
                </div>
                <!--搜索-s-->
                <div class="ecsc-search">
                    <form id="searchForm" name="" method="get" action="/index.php/Home/Goods/search.html" class="ecsc-search-form">
                        <input autocomplete="off" name="q" id="q" type="text" value="" placeholder="搜索关键字" class="ecsc-search-input">
                        <button type="submit" class="ecsc-search-button" onclick="if($.trim($('#q').val()) != '') $('#searchForm').submit();"><i></i></button>
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
                    <div class="keyword">
                        <ul>
                                                            <li>
                                    <a href="/index.php/Home/Goods/search/q/%E9%9C%9C.html" target="_blank">霜</a>
                                </li>
                                                            <li>
                                    <a href="/index.php/Home/Goods/search/q/%E4%B9%B3.html" target="_blank">乳</a>
                                </li>
                                                            <li>
                                    <a href="/index.php/Home/Goods/search/q/%E9%9D%A2%E8%86%9C.html" target="_blank">面膜</a>
                                </li>
                                                            <li>
                                    <a href="/index.php/Home/Goods/search/q/%E5%8E%9F%E6%B6%B2.html" target="_blank">原液</a>
                                </li>
                                                            <li>
                                    <a href="/index.php/Home/Goods/search/q/%E4%BF%AE%E6%8A%A4%E6%B6%B2.html" target="_blank">修护液</a>
                                </li>
                                                            <li>
                                    <a href="/index.php/Home/Goods/search/q/%E5%96%B7%E9%9B%BE.html" target="_blank">喷雾</a>
                                </li>
                                                    </ul>
                    </div>
                </div>
                <!--搜索-e-->
                <!--购物车-s-->
                
                <div class="shopingcar-index fr">
                    <div class="u-g-cart fr fixed" id="hd-my-cart">
                        <a href="/index.php/Home/Cart/cart.html">
                            <div class="c-n fl" >
                                <i class="share-shopcar-index"></i>
                                <span>我的购物车<em class="sc_z" id="cart_quantity"></em></span>
                            </div>
                        </a>
                        <div class="u-fn-cart u-mn-cart" id="show_minicart"></div>
                    </div>
                </div>
                <!--购物车-e-->
            </div>
        </div>
        <!--商品分类-s-->
        <div class="nav p">
            <div class="w1224 p">
                <div class="categorys2 home_categorys">
                    <!--<div class="dt">
                        <a href="/index.php/Home/Goods/all_category.html" target="_blank"><i class="share-a_a2"></i>全部商品分类</a>
                    </div>-->
                    <!--全部商品分类-s-->
                    <!--<div class="dd">
                        <div class="cata-nav">
                            &lt;!&ndash; 外层循环点&ndash;&gt;
                                                        <div class="item fore1">
                                                                <div class="item-left">
                                    <div class="cata-nav-name">
                                        <h3>
                                            <div class="contiw-cer"><span class="share-icon-1"></span></div>
                                            <a href="/index.php/Home/Goods/goodsList/id/1.html" title="肽风尚-护">肽风尚-护</a>
                                        </h3>
                                    </div>
                                    <b>&gt;</b>
                                </div>
                                                                <div class="cata-nav-layer">
                                    <div class="cata-nav-left">
                                        <div class="subitems">
                                                                                            <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/index.php/Home/Goods/goodsList/id/4.html" target="_blank">清洁系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/index.php/Home/Goods/goodsList/id/5.html" target="_blank">补水系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/index.php/Home/Goods/goodsList/id/9.html" target="_blank">粉底系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/index.php/Home/Goods/goodsList/id/10.html" target="_blank">美白系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/index.php/Home/Goods/goodsList/id/11.html" target="_blank">抗衰系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/index.php/Home/Goods/goodsList/id/13.html" target="_blank">喷雾系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/index.php/Home/Goods/goodsList/id/15.html" target="_blank">面膜系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                            &lt;!&ndash;商品分类底部广告-s&ndash;&gt;
                                            <div class="advertisement_down">
                                                <ul>                                                
                                                                                                    
                                                </ul>
                                            </div>
                                            &lt;!&ndash;商品分类底部广告-e&ndash;&gt;
                                        </div>
                                    </div>
                                    &lt;!&ndash;商品分类右侧广告-s&ndash;&gt;
                                    <div class="cata-nav-rigth">
                                                                            </div>
                                    &lt;!&ndash;商品分类右侧广告-e&ndash;&gt;
                                </div>
                            </div>
                                                        <div class="item fore1">
                                                                <div class="item-left">
                                    <div class="cata-nav-name">
                                        <h3>
                                            <div class="contiw-cer"><span class="share-icon-2"></span></div>
                                            <a href="/index.php/Home/Goods/goodsList/id/2.html" title="肽风尚-养">肽风尚-养</a>
                                        </h3>
                                    </div>
                                    <b>&gt;</b>
                                </div>
                                                                <div class="cata-nav-layer">
                                    <div class="cata-nav-left">
                                        <div class="subitems">
                                                                                        &lt;!&ndash;商品分类底部广告-s&ndash;&gt;
                                            <div class="advertisement_down">
                                                <ul>                                                
                                                                                                    
                                                </ul>
                                            </div>
                                            &lt;!&ndash;商品分类底部广告-e&ndash;&gt;
                                        </div>
                                    </div>
                                    &lt;!&ndash;商品分类右侧广告-s&ndash;&gt;
                                    <div class="cata-nav-rigth">
                                                                            </div>
                                    &lt;!&ndash;商品分类右侧广告-e&ndash;&gt;
                                </div>
                            </div>
                                                        <div class="item fore1">
                                                                <div class="item-left">
                                    <div class="cata-nav-name">
                                        <h3>
                                            <div class="contiw-cer"><span class="share-icon-3"></span></div>
                                            <a href="/index.php/Home/Goods/goodsList/id/3.html" title="肽风尚-调">肽风尚-调</a>
                                        </h3>
                                    </div>
                                    <b>&gt;</b>
                                </div>
                                                                <div class="cata-nav-layer">
                                    <div class="cata-nav-left">
                                        <div class="subitems">
                                                                                        &lt;!&ndash;商品分类底部广告-s&ndash;&gt;
                                            <div class="advertisement_down">
                                                <ul>                                                
                                                                                                    
                                                </ul>
                                            </div>
                                            &lt;!&ndash;商品分类底部广告-e&ndash;&gt;
                                        </div>
                                    </div>
                                    &lt;!&ndash;商品分类右侧广告-s&ndash;&gt;
                                    <div class="cata-nav-rigth">
                                                                            </div>
                                    &lt;!&ndash;商品分类右侧广告-e&ndash;&gt;
                                </div>
                            </div>
                                                        <div class="item fore1">
                                                                <div class="item-left">
                                    <div class="cata-nav-name">
                                        <h3>
                                            <div class="contiw-cer"><span class="share-icon-7"></span></div>
                                            <a href="/index.php/Home/Goods/goodsList/id/7.html" title="体验品">体验品</a>
                                        </h3>
                                    </div>
                                    <b>&gt;</b>
                                </div>
                                                                <div class="cata-nav-layer">
                                    <div class="cata-nav-left">
                                        <div class="subitems">
                                                                                        &lt;!&ndash;商品分类底部广告-s&ndash;&gt;
                                            <div class="advertisement_down">
                                                <ul>                                                
                                                                                                    
                                                </ul>
                                            </div>
                                            &lt;!&ndash;商品分类底部广告-e&ndash;&gt;
                                        </div>
                                    </div>
                                    &lt;!&ndash;商品分类右侧广告-s&ndash;&gt;
                                    <div class="cata-nav-rigth">
                                                                            </div>
                                    &lt;!&ndash;商品分类右侧广告-e&ndash;&gt;
                                </div>
                            </div>
                                                    </div>
                    </div>-->
                    <!--全部商品分类-e-->
                </div>
                <!--导航栏-s-->
                 <!--<div class="navitems" id="nav">-->
                     <ul class="navitems clearfix" id="navitems">
                         <li ><a href="/index.php/home/Index/index.html">首页</a></li>
                                                      <li >
                             <a href="/index.php/Home/Goods/goodsList/id/1" target="_blank"  >肽风尚●护</a>
                             </li>
                                                      <li >
                             <a href="/index.php/Home/Goods/goodsList/id/2" target="_blank"  >肽风尚●养</a>
                             </li>
                                                      <li >
                             <a href="/index.php/Home/Goods/goodsList/id/3" target="_blank"  >肽风尚●调</a>
                             </li>
                                                      <li class='selected'>
                             <a href="/index.php/Home/Goods/goodsList/id/7" target="_blank"  >体验品</a>
                             </li>
                                              </ul>
                    <!-- <div class="wrap-line" style="width: 72px; left: 20px;">
                        <span style="left:15px;"></span>
                    </div> -->
                <!--</div>-->
                <!--导航栏-e-->
            </div>
        </div>
        <!--商品分类-e-->
    </div>
    <!--header-e-->
<div class="search-box p">
	<div class="w1430">
		<div class="search-path fl">
			<a href="/index.php/Home/Goods/goodsList/id/7.html">全部商品</a>
			<i class="litt-xyb"></i>
							<a href="/index.php/Home/Goods/goodsList/id/7.html">体验品</a>
							<i class="litt-xyb"></i>
			<!--如果当前分类是三级分类 则二级也要显示-->
						<!--如果当前分类是三级分类 则二级也要显示-->
						<!--当前分类-->
							<div class="havedox">
					<div class="disenk"><span><a href="/index.php/Home/Goods/goodsList/id/7.html">体验品</a></span><i class="litt-xxd"></i></div>
					<div class="hovshz">
						<ul>
													</ul>
					</div>
				</div>
				<i class="litt-xyb"></i>
					</div>
				<div class="search-clear fr">
			<span><a href="/index.php/Home/Goods/goodsList/id/7.html">清空筛选条件</a></span>
		</div>
	</div>
</div>
<!-- 筛选 start -->
<div class="search-opt troblect">
    <div class="w1430">
        <div class="opt-list">
            <!-- 品牌筛选 start -->
                            <dl class="brand-section m-tr">
                    <dt>品牌</dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-box brand-list">
                                <div class="clearfix p">
                                                                            <a href="/index.php/home/Goods/goodsList/id/7/brand_id/1" data-href="/index.php/home/Goods/goodsList/id/7/brand_id/1"  data-key='brand' data-val='1'>
                                            <i class="litt-zd"></i>
                                            <img src="/public/upload/brand/2017/09-20/8eba8f295a37bb9dde1e1236af1626a6.png"/>
                                            <span>品牌-肽风尚</span>
                                        </a>
                                                                    </div>
                                <div class="surclofix p">
                                    <a href="javascript:;" class="u-confirm" onClick="submitMoreFilter('brand',this);">确定</a>
                                    <a href="javascript:;" class="u-cancel">取消</a>
                                </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <a href="javascript:void(0)"><span class="dx_choice">多选</span><i class="litt-pluscr"></i></a>
                                                    </div>
                    </dd>
                </dl>
                        <!-- 品牌筛选 end -->
            <!-- 规格筛选 start -->
                        <!-- 规格筛选 end -->
            <!-- 属性筛选 start -->
                        <!-- 属性筛选 end -->
            <!-- 价格筛选 start -->
                            <dl class="brand-section m-tr">
                    <dt>价格</dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-list">
                                <div class="clearfix p">
                                                                            <a href="/index.php/home/Goods/goodsList/id/7/price/39-52">
                                            <span>39-52元</span>
                                        </a>
                                                                            <a href="/index.php/home/Goods/goodsList/id/7/price/52-65">
                                            <span>52-65元</span>
                                        </a>
                                                                    </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <!--<a href="javascript:void(0)"><span class="dx_choice">多选</span><i class="litt-pluscr"></i></a>-->
                            <!--<a href="javascript:void(0)"><span class="gd_more">更多</span><i class="litt-tcr"></i></a>-->
                            <!--填写筛选价格区间-s-->
                            <form action="/index.php/Home/Goods/goodsList/id/7" method="post" id="price_form">
                                <input type="text" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" name="start_price" id="start_price" value=""/>
                                <span>-</span>
                                <input type="text" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onkeyup="this.value=this.value.replace(/[^\d]/g,'')"  name="end_price" id="end_price" value=""/>
                                <input type="submit" value="确定" onClick="if($('#start_price').val() !='' && $('#end_price').val() !='' ) $('#price_form').submit();"/>
                            </form>
                            <!--填写筛选价格区间-e-->
                        </div>
                    </dd>
                </dl>
                        <!-- 价格筛选 end -->
        </div>
        <p class="moreamore"><a >浏览更多</a></p>
    </div>
</div>
<!-- 筛选 end -->


<div class="shop-list-tour ma-to-20 p">
	<div class="w1430">
		<div class="tjhot fl">
			<div class="sx_topb"><h3>推荐热卖</h3></div>
			<div class="tjhot-shoplist" id="ajax_hot_goods">
                                    <div class="alone-shop">
                        <a href="/index.php/Home/Goods/goodsInfo/id/6.html"><img class="lazy" data-original="/public/upload/goods/thumb/6/goods_thumb_6_180_180.png"/></a>
                        <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/6.html">饱润肽隔离BB霜（自然色）</a></p>
                        <p class="price-tag"><span class="li_xfo">￥</span><span>98.00</span></p>
                        <p class="store-alone"><a href="/index.php/Home/Store/index.html"></a></p>
                    </div>
                                    <div class="alone-shop">
                        <a href="/index.php/Home/Goods/goodsInfo/id/7.html"><img class="lazy" data-original="/public/images/icon_goods_thumb_empty_300.png"/></a>
                        <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/7.html">饱润肽水光精华液</a></p>
                        <p class="price-tag"><span class="li_xfo">￥</span><span>58.00</span></p>
                        <p class="store-alone"><a href="/index.php/Home/Store/index.html"></a></p>
                    </div>
                                    <div class="alone-shop">
                        <a href="/index.php/Home/Goods/goodsInfo/id/8.html"><img class="lazy" data-original="/public/upload/goods/thumb/8/goods_thumb_8_180_180.jpeg"/></a>
                        <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/8.html">饱润肽丝滑精粹原液</a></p>
                        <p class="price-tag"><span class="li_xfo">￥</span><span>238.00</span></p>
                        <p class="store-alone"><a href="/index.php/Home/Store/index.html"></a></p>
                    </div>
                                    <div class="alone-shop">
                        <a href="/index.php/Home/Goods/goodsInfo/id/14.html"><img class="lazy" data-original="/public/images/icon_goods_thumb_empty_300.png"/></a>
                        <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/14.html">饱润肽清爽修护液</a></p>
                        <p class="price-tag"><span class="li_xfo">￥</span><span>138.00</span></p>
                        <p class="store-alone"><a href="/index.php/Home/Store/index.html"></a></p>
                    </div>
                                    <div class="alone-shop">
                        <a href="/index.php/Home/Goods/goodsInfo/id/15.html"><img class="lazy" data-original="/public/images/icon_goods_thumb_empty_300.png"/></a>
                        <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/15.html">饱润肽隔离BB霜（象牙白）</a></p>
                        <p class="price-tag"><span class="li_xfo">￥</span><span>128.00</span></p>
                        <p class="store-alone"><a href="/index.php/Home/Store/index.html"></a></p>
                    </div>
                			</div>
		</div>
		<div class="stsho fr">
			<div class="sx_topb ba-dark-bg">
				<div class="f-sort fl">
					<ul>
						<li class="red">
                            <a href="/index.php/Home/Goods/goodsList/id/7">综合</a>
                        </li>
						<li class="">
                            <a href="/index.php/Home/Goods/goodsList/id/7/sort/sales_sum">销量</a>
                        </li>
													<li class="">
                                <a href="/index.php/Home/Goods/goodsList/id/7/sort/shop_price/sort_asc/desc">价格<i class="litt-zzx1"></i></a>
                            </li>
												<li class="">
                            <a href="/index.php/Home/Goods/goodsList/id/7/sort/comment_count">评论</a>
                        </li>
						<li class="">
                            <a href="/index.php/Home/Goods/goodsList/id/7/sort/is_new">新品</a>
                        </li>
					</ul>
				</div>
				<div class="f-address fl">
					<!--<div class="shd_address">-->
						<!--<div class="shd">收货地：</div>-->
						<!--<div class="add_cj_p"><input type="text" id="city" /></div>-->
					<!--</div>-->
				</div>
				<div class="f-total fr">
										<div class="all-sec">共<span>2</span>个商品</div>
					<div class="all-fy">
						<a >&lt;</a>
							<p class="fy-y"><span class="z-cur">1</span>/<span>1</span></p>
						<a >&gt;</a>
					</div>
				</div>
			</div>
			<div class="shop-list-splb p">
				<ul>
                                                <li>
                                <div class="s_xsall">
                                    <div class="xs_img">
                                        <a href="/index.php/Home/Goods/goodsInfo/id/26.html">
                                            <img class="lazy-list" data-original="/public/images/icon_goods_thumb_empty_300.png"/>
                                        </a>
                                    </div>
                                    <div class="xs_slide">
                                        <div class="small-xs-shop">
                                            <ul>
                                                                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price-tag">
                                        <span class="now"><em class="li_xfo">￥</em><em>50.00</em></span>
                                        <span class="old"><em>￥</em><em>55.00</em></span>
                                    </div>
                                    <div class="shop_name2">
                                        <a href="/index.php/Home/Goods/goodsInfo/id/26.html">
                                            修护液体验装                                        </a>
                                    </div>
                                    <div class="shop_name2">
                                        <a class="co_hchh" href="/index.php/Home/Store/index.html">
                                                                                    </a>
                                    </div>
                                    <div class="J_btn_statu">
                                        <div class="p-num">
                                            <input class="J_input_val" id="number_26" type="text" value="1">
                                            <p class="act">
                                                <a href="javascript:void(0);" onClick="goods_add(26);" class="litt-zzyl1"></a>
                                                <a href="javascript:void(0);" onClick="goods_cut(26);"  class="litt-zzyl2"></a>
                                            </p>
                                        </div>
                                        <div class="p-btn">
                                            <a href="javascript:void(0);" onclick="AjaxAddCart(26,$('#number_'+26).val(),0);">加入购物车</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                                                    <li>
                                <div class="s_xsall">
                                    <div class="xs_img">
                                        <a href="/index.php/Home/Goods/goodsInfo/id/27.html">
                                            <img class="lazy-list" data-original="/public/images/icon_goods_thumb_empty_300.png"/>
                                        </a>
                                    </div>
                                    <div class="xs_slide">
                                        <div class="small-xs-shop">
                                            <ul>
                                                                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price-tag">
                                        <span class="now"><em class="li_xfo">￥</em><em>62.00</em></span>
                                        <span class="old"><em>￥</em><em>65.00</em></span>
                                    </div>
                                    <div class="shop_name2">
                                        <a href="/index.php/Home/Goods/goodsInfo/id/27.html">
                                            精华乳体验装                                        </a>
                                    </div>
                                    <div class="shop_name2">
                                        <a class="co_hchh" href="/index.php/Home/Store/index.html">
                                                                                    </a>
                                    </div>
                                    <div class="J_btn_statu">
                                        <div class="p-num">
                                            <input class="J_input_val" id="number_27" type="text" value="1">
                                            <p class="act">
                                                <a href="javascript:void(0);" onClick="goods_add(27);" class="litt-zzyl1"></a>
                                                <a href="javascript:void(0);" onClick="goods_cut(27);"  class="litt-zzyl2"></a>
                                            </p>
                                        </div>
                                        <div class="p-btn">
                                            <a href="javascript:void(0);" onclick="AjaxAddCart(27,$('#number_'+27).val(),0);">加入购物车</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        
				</ul>
			</div>
			<div class="page p">
				<div class='dataTables_paginate paging_simple_numbers'><ul class='pagination'>    </ul></div>			</div>
		</div>
	</div>
</div>
<div class="underheader-floor p specilike">
	<div class="w1430">
		<div class="layout-title">
			<span class="fl">猜你喜欢</span>
            <span class="update_h fr" onclick="favourite();">
                <i class="litt-hyh"></i>
                换一换
            </span>
		</div>
		<ul class="ul-li-column p" id="favourite_goods">
		</ul>
	</div>
</div>
<script>
	/****猜你喜欢****/
	var favorite_page = 0;
	function favourite()
	{
		favorite_page++;
		$.ajax({
			type: "GET",
			url: "/index.php?m=Home&c=Index&a=ajax_favorite&i=6&p="+favorite_page,//+tab,
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
<!--footer-s-->
<div class="footer p">
    <div class="w1224">
        <div class="footer-ewmcode">
		    <div class="foot-list-fl">
		    		                <ul>
	                    <li class="foot-th">友情链接</li>
	                    	                    <li>
	                        <a href="http://www.nmxintai.com" target="_blank">鑫泰集团</a>
	                    </li>
	                    	                    <li>
	                        <a href="http://www.gztaihao.com" target="_blank">广州肽好</a>
	                    </li>
	                    	                    <li>
	                        <a href="http://www.52tjr.com" target="_blank">肽佳人</a>
	                    </li>
	                    	                    <li>
	                        <a href="http://www.tm368.com" target="_blank">田歌牧韵</a>
	                    </li>
	                    	                    <li>
	                        <a href="http://www.ynax.com.cn" target="_blank">肽好爱心网</a>
	                    </li>
	                    	                    <li>
	                        <a href="http://www.elvision.cn" target="_blank">北京鑫泰亿联视讯</a>
	                    </li>
	                    	                </ul>
	                	                <ul>
	                    <li class="foot-th">&nbsp;</li>
	                    	                    <li>
	                        <a href="http://www.xmthsw.com" target="_blank">锡盟肽好生物</a>
	                    </li>
	                    	                    <li>
	                        <a href="http://www.xmtymg.com" target="_blank">田园牧歌民族用品</a>
	                    </li>
	                    	                    <li>
	                        <a href="http://www.tymglxs.com" target="_blank">田园牧歌旅行社</a>
	                    </li>
	                    	                    <li>
	                        <a href="http://www.nm-cyy.com" target="_blank">我在草原有只羊</a>
	                    </li>
	                    	                    <li>
	                        <a href="http://www.52tlx.com" target="_blank">肽领秀</a>
	                    </li>
	                    	                </ul>
	                		            <ul>
		            			                <li class="foot-th">
		                    新手上路		                </li>
		                		                    <li>
		                    			                    		<a href="/index.php/Home/Article/detail/article_id/1419.html">购物流程</a>
		                    			                    </li>
		                		                    <li>
		                    			                    		<a href="/index.php/Home/Article/detail/article_id/1420.html">售后服务</a>
		                    			                    </li>
		                		            </ul>
		        		            <ul>
		            			                <li class="foot-th">
		                    关于我们		                </li>
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
		        		        <ul class="foot-con continue">
                    <li class="foot-th">联系我们</dt>
                    <li>
                        <span class="cellphone_con">020-86210199</span>
                        <span class="time_con">周一至周日8:00-18:00</span>
                        <span class="cost_con">（仅收市话费）</span>
                        <a class="software_con" href="tencent://message/?uin=123456789&amp;Site=肽风尚商城&amp;Menu=yes" target="_blank">
                            <img src="/template/pc/rainbow/static/images/continue.png"/>
                        </a>
                    </li>
                </ul>
		    </div>
		</div>
		<div class="mod_copyright p">
		    <div class="grid-top">
		        		        <!-- <a href="javascript:void (0);">客服热线:020-86210199</a> -->
		    </div>
		    <p>Copyright © 2016-2025 肽风尚商城 版权所有 保留一切权利 备案号:粤ICP17092251号</p>
		
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
<div class="soubao-sidebar">
    <div class="soubao-sidebar-bg"></div>
    <div class="sidertabs tab-lis-1">
        <div class="sider-top-stra sider-midd-1">
            <div class="icon-tabe-chan">
                <a href="/index.php/Home/User/index.html">
                    <i class="share-side share-side1"></i>
                    <i class="share-side tab-icon-tip triangleshow"></i>
                </a>

                <div class="dl_login">
                    <div class="hinihdk">
                        <img src="/template/pc/rainbow/static/images/dl.png"/>

                        <p class="loginafter nologin"><span>你好，请先</span><a href="/index.php/Home/user/login.html">登录！</a></p>
                        <!--未登录-e--->
                        <!--登录后-s--->
                        <p class="loginafter islogin">
                            <span class="id_jq userinfo">陈xxxxxxx</span>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="/index.php/Home/user/logout.html" title="点击退出">退出！</a>
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
                <a href="/index.php/Home/User/message_notice.html" target="_blank">
                    <i class="share-side share-side1"></i>
                    <!--<i class="share-side tab-icon-tip"></i>-->
                    <span class="tab-tip">消息</span>
                </a>
            </div>
        </div>
        <div class="sider-top-stra sider-midd-2">
            <div class="icon-tabe-chan mmm">
                <a href="/index.php/Home/User/goods_collect.html" target="_blank">
                    <i class="share-side share-side1"></i>
                    <!--<i class="share-side tab-icon-tip"></i>-->
                    <span class="tab-tip">收藏</span>
                </a>
            </div>
            <div class="icon-tabe-chan hostry">
                <a href="/index.php/Home/User/visit_log.html" target="_blank">
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
            <a title="点击这里给我发消息" href="tencent://message/?uin=123456789&amp;Site=肽风尚商城&amp;Menu=yes" target="_blank">
                <i class="share-side share-side1"></i>
                <!--<i class="share-side tab-icon-tip"></i>-->
                <span class="tab-tip">在线咨询</span>
            </a>
        </div>
        <!--<div class="icon-tabe-chan request">-->
            <!--<a href="" target="_blank">-->
                <!--<i class="share-side share-side1"></i>-->
                <!--&lt;!&ndash;<i class="share-side tab-icon-tip"></i>&ndash;&gt;-->
                <!--<span class="tab-tip">意见反馈</span>-->
            <!--</a>-->
        <!--</div>-->
        <div class="icon-tabe-chan qrcode">
            <a href="" target="_blank">
                <i class="share-side share-side1"></i>
                <i class="share-side tab-icon-tip triangleshow"></i>
                <span class="tab-tip qrewm">
                    <img src="/template/pc/rainbow/static/images/qrcode2.jpg"/>
                    关注公众号
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
<script src="/template/pc/rainbow/static/js/common.js"></script>
<!-- <div class="footer p">
	<div class="mod_service_inner"> -->
        <!--只有这个页面的class是w1430-->
		<!-- <div class="w1430">
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
	<div class="w1430">
		<//include file="public/footer_index" />
        <div class="footer-ewmcode">
            <div class="foot-list-fl">
                                    <ul>
                        <li class="foot-th">
                            新手上路                        </li>
                                                    <li>
                                <a href="/index.php/Home/Article/detail/article_id/1419.html">购物流程</a>
                            </li>
                                                    <li>
                                <a href="/index.php/Home/Article/detail/article_id/1420.html">售后服务</a>
                            </li>
                                            </ul>
                                    <ul>
                        <li class="foot-th">
                            关于我们                        </li>
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
                        <li class="foot-th">
                            售后服务                        </li>
                                            </ul>
                            </div>
            <div class="QRcode-fr">
                <ul>
                    <li class="foot-th">客户端</li>
                    <li><img src="/template/pc/rainbow/static/images/qrcode.png"/></li>
                </ul>
                <ul>
                    <li class="foot-th">微信</li>
                    <li><img src="/template/pc/rainbow/static/images/qrcode.png"/></li>
                </ul>
            </div>
        </div>
        <div class="mod_copyright p">
            <div class="grid-top">
                                <a href="javascript:void (0);">客服热线:020-86210199</a>
            </div>
            <p>Copyright © 2016-2025 TPshop商城 版权所有 保留一切权利 备案号:粤00-123456号</p>

            <p class="mod_copyright_auth">
                <a class="mod_copyright_auth_ico mod_copyright_auth_ico_1" href="" target="_blank">经营性网站备案中心</a>
                <a class="mod_copyright_auth_ico mod_copyright_auth_ico_2" href="" target="_blank">可信网站信用评估</a>
                <a class="mod_copyright_auth_ico mod_copyright_auth_ico_3" href="" target="_blank">网络警察提醒你</a>
                <a class="mod_copyright_auth_ico mod_copyright_auth_ico_4" href="" target="_blank">诚信网站</a>
                <a class="mod_copyright_auth_ico mod_copyright_auth_ico_5" href="" target="_blank">中国互联网举报中心</a>
                <a class="mod_copyright_auth_ico mod_copyright_auth_ico_6" href="" target="_blank">网络举报APP下载</a>
            </p>
        </div>
	</div>
</div> -->
<!--footer-e-->
<script src="/template/pc/rainbow/static/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/template/pc/rainbow/static/js/popt.js" type="text/javascript" charset="utf-8"></script>
<script src="/template/pc/rainbow/static/js/headerfooter.js" type="text/javascript" charset="utf-8"></script>
<script src="/template/pc/rainbow/static/js/location.js"></script>
<script type="text/javascript">

//        更多
         $('.gd_more').parent().click(function(){
         	var jed = $(this).parents('.lr-more').siblings();
         	jed.toggleClass('ov-inh').find('.brand-box').toggleClass('ov-inh');
         	if(jed.toggleClass('ov-inh').find('.brand-list')){
         		jed.toggleClass('ov-inh').find('.brand-list').toggleClass('ov-inh');
         	}
         	if(jed.hasClass('ov-inh')){
         		$(this).find('.gd_more').html('收起');
         	}else{
         		$(this).find('.gd_more').html('更多');
         	}
         })
        var cancelBtn = null;
        /***多选 start*****/
        $('.dx_choice').parent().click(function(){
            var _this = this;
            var st = 0;
            var jed = $(_this).parents('.ri-section'); //当前选项层DIV

            //关闭前一个多选框
            if(cancelBtn != null){
                $(cancelBtn).parent().siblings('.clearfix').find('a').each(function(i,o){
                    $(o).removeClass('addhover-js').find('.litt-zd').hide(); //针对品牌筛选的红色边框和右下角对勾隐藏
                    $(o).removeClass('red_hov_cli')    //针对纯文字型选项，隐藏筛选的选中状态
                    .attr('href',$(o).data('href'))  //还原连接
                    .children('input').prop('checked',false).hide(); //隐藏多选框
                    $(o).unbind('click');
                });
                $(cancelBtn).parents('.lf-list').siblings('.lr-more').show(); //显示其它多选按钮
                $(cancelBtn).parents('.ri-section').removeClass('sum_ov_inh'); //移除多选样式

            }
            cancelBtn = jed.find('.u-cancel'); //前一个取消按钮

            //打开多选
            jed.addClass('sum_ov_inh'); //添加这一行的样式
            //遍历a标签
            jed.find('.clearfix>a').each(function(i,o){
                $(o).attr('href','javascript:;'); //移除连接
                $(o).children('input').show();  //显示多选框
                $(o).bind('click',function(){
                    if($(o).hasClass('red_hov_cli')){
                        //取消选中
                        $(o).find('i').toggle()
                        $(o).removeClass('addhover-js'); //针对品牌选项，改变筛选的选中状态
                        $(o).removeClass('red_hov_cli')
                        $(o).children('input').prop("checked",false);
                        $(o).parent().siblings('.surclofix').children('.u-confirm').removeClass('u-confirm01');
                        st--;
                    }else{
                        $(o).addClass('red_hov_cli')
                        $(o).children('input').prop("checked",true);
                        $(o).find('i').toggle()
                        $(o).addClass('addhover-js');
                        $(o).parent().siblings('.surclofix').children('.u-confirm').addClass('u-confirm01');
                        st++;
                    }
                    //如果没有选中项,确定按钮点不了
                    if(st==0){
                        jed.find('.u-confirm').disabled=true;
                    }
                });
            });
            //隐藏当前多选按钮
            $(_this).parent().hide();
        });

        /***多选 end*****/
        //############   取消多选        ###########
        $('.surclofix .u-cancel').each(function(){
            $(this).click(function(){
                var jed = $(this).parents('.ri-section');
                //遍历a标签
                jed.find('.clearfix>a').each(function(i,o){
                    $(o).removeClass('addhover-js').find('.litt-zd').hide(); //针对品牌筛选的红色边框和右下角对勾隐藏
                    $(o).removeClass('red_hov_cli')    //针对纯文字型选项，隐藏筛选的选中状态
                     .attr('href',$(o).data('href'))  //还原连接
                     .children('input').prop('checked',false).hide(); //隐藏多选框
                    $(o).unbind('click');
                });
                jed.find('.lr-more').show(); //显示多选按钮
                jed.removeClass('sum_ov_inh') //移除这一行的样式
                $('.u-confirm').removeClass('u-confirm01'); //移除确定按钮可点击标识
            });
        })

    $(function() {
        favourite();
        //左侧边栏JS
//		ajax_hot_goods();
//		ajax_sales_goods();
    //############   更多类别属性筛选  start     ###########
    $('.moreamore').click(function(){
        $('.m-tr').each(function(i,o){
            if(i >  7){
                var attrdisplay = $(o).css('display');
                if(attrdisplay == 'none'){
                    $(o).css('display','block');
                }
                if(attrdisplay == 'block'){
                    $(o).css('display','none');
                }
            }
        });
        if($(this).hasClass('checked')){
            $(this).removeClass('checked').html('<a class="red">收起</a>');
        }else{
            $(this).addClass('checked').html('<a >更多选项</a>');
        }
    })
    $('.moreamore').trigger('click').html('<a >更多选项</a>'); //  默认点击一下
    //############   更多类别属性筛选   end    ###########

    /***价格排序 start*****/
    var price_i = 0;
    $('.f-sort ul li').click(function(){
        $(this).addClass('red').siblings().removeClass('red').find('i').removeClass('litt-zzx2').removeClass('litt-zzx3').addClass('litt-zzx1');
        var jd = $(this).find('i');
        price_i++;
        if(price_i>2)price_i=1;
        switch(price_i){
            case 1:jd.addClass('litt-zzx2').removeClass('litt-zzx1').removeClass('litt-zzx3');break;
            case 2:jd.addClass('litt-zzx3').removeClass('litt-zzx2').removeClass('litt-zzx1');break;
        }
    })
    /***价格排序 end*******/
    /***地址选择 start*****/
    $("#city").click(function (e) {
        SelCity(this,e);
    });
    /***地址选择 end*****/
    /***是否自营 start****/
    $('.choice-mo-shop ul li').click(function(){
        $(this).find('.litt-zzdg1').toggleClass('litt-zzdg2');
        $(this).find('a').toggleClass('red');
    })
    /***是否自营 end****/
    /***滑过浏览商品 start***/
    $('.small-xs-shop ul li').hover(function(){
        $(this).addClass('bored').siblings().removeClass('bored');
        var small_src = $(this).find('img').attr('src');
        $(this).parents('.s_xsall').find('.xs_img').find('img').attr('src',small_src);
    },function(){

    })
    /***滑过浏览商品 end***/
})

	/****加减购物车数额***/
	function goods_cut($val){
		var num_val=document.getElementById('number_'+$val);
		var new_num=num_val.value;
		var Num = parseInt(new_num);
		if(Num>1)Num=Num-1;
		num_val.value=Num;
	}

	function goods_add($val){
		var num_val=document.getElementById('number_'+$val);
		var new_num=num_val.value;
		var Num = parseInt(new_num);
		Num=Num+1;
		num_val.value=Num;
	}
	/****加减购物车数额***/

        //############   点击多选确定按钮      ############
// t 为类型  是品牌 还是 规格 还是 属性
// btn 是点击的确定按钮用于找位置
get_parment = {"id":"7"};
function submitMoreFilter(t,btn)
{
    // 没有被勾选的时候
    if(!$(btn).hasClass("u-confirm01")){
        return false;
    }

    // 获取现有的get参数
    var key = ''; // 请求的 参数名称
    var val = new Array(); // 请求的参数值
    $(btn).parent().siblings(".clearfix").find(".red_hov_cli").each(function(i,o){
        key = $(o).data('key');
        val.push($(o).data('val'));
    });
    //parment = key+'_'+val.join('_');
//        return false;
    // 品牌
    if(t == 'brand')
    {
        get_parment.brand_id = val.join('_');
    }
    // 规格
    if(t == 'spec')
    {
        if(get_parment.hasOwnProperty('spec'))
        {
            get_parment.spec += '@'+key+'_'+val.join('_');
        }
        else
        {
            get_parment.spec = key+'_'+val.join('_');
        }
    }
    // 属性
    if(t == 'attr')
    {
        if(get_parment.hasOwnProperty('attr'))
        {
            get_parment.attr += '@'+key+'_'+val.join('_');
        }
        else
        {
            get_parment.attr = key+'_'+val.join('_');
        }
    }
    // 组装请求的url
    var url = '';
    for ( var k in get_parment )
    {
        url += "&"+k+'='+get_parment[k];
    }
    console.log('get_parment',get_parment);
    location.href ="/index.php?m=Home&c=Goods&a=goodsList"+url;
}
//媒体查询
$(function(){
    window.onresize=resizeauto;
    resizeauto();
    function resizeauto(){
        var windowW = $(window).width();
        if(windowW > 1447){
            $('.w1430,.w1224,.w1000').addClass('w1430').removeClass('w1224').removeClass('w1000');
        }else if(windowW <= 1447 && windowW > 1241){
            $('.w1430,.w1224,.w1000').addClass('w1224').removeClass('w1430').removeClass('w1000');
        }else if(windowW <= 1241){
            $('.w1430,.w1224,.w1000').addClass('w1000').removeClass('w1224').removeClass('w1430');
        }
    }
})
</script>
</body>
</html>";
?>