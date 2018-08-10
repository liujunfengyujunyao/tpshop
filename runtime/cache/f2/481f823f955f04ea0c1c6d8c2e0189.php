<?php
//000000000000s:56322:"<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>首页-肽风尚｜官方商城｜</title>
    <meta name="keywords" content="肽风尚 商城 官方 面膜"/>
    <meta name="description" content="肽风尚官方商城"/>
    <link rel="stylesheet" href="/template/pc/rainbow/static/css/tpshop.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/template/pc/rainbow/static/css/alone_index.css"/>
    <script src="/template/pc/rainbow/static/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/public/js/global.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="/public/static/images/favicon.ico" media="screen"/>
    <link rel="stylesheet" href="/template/pc/rainbow/static/css/location.css" type="text/css">
    <!-- 新浪获取ip地址 -start-->
            <script src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=127.0.0.1"></script>
        <script type="text/JavaScript">
            doCookieArea(remote_ip_info);
        </script>
    </head>
<body>
<!-- 新浪获取ip地址 -start-->
    <script src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=127.0.0.1"></script>
    <script type="text/JavaScript">
        doCookieArea(remote_ip_info);
    </script>
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
                            <a class="red" href="/Home/user/login.html">Hi.请登录</a>
                            <a href="/Home/user/reg.html">免费注册</a>
                        </div>
                        <div class="fl islogin">
                            <a class="red userinfo" href="/Home/user/index.html" ></a>
                            <a  href="/Home/user/logout.html"  title="退出" target="_self">安全退出</a>
                        </div>
                </div>
                <div class="top-ri-header fr">
                    <ul>
                        <li><a target="_blank" href="/Home/Order/order_list.html">我的订单</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="/Home/User/visit_log.html">我的浏览</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="/Home/User/coupon.html">我的优惠券</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="/Home/User/goods_collect.html">我的收藏</a></li>
                        <!-- <li class="spacer"></li>
                        <li><a target="_blank" title="点击这里给我发消息" href="/Home/Article/detail/article_id/22.html" target="_blank">在线客服</a></li>
                        <li class="spacer"></li> -->
                        <!--<li class="hover-ba-navdh">-->
                            <!--<div class="nav-dh">-->
                                <!--<span>网站导航</span>-->
                                <!--<i class="share-a_a1"></i>-->
                                <!--<div class="conta-hv-nav">-->
                                    <!--<ul>-->
                                        <!--<li>-->
                                            <!--<a href="/Home/Activity/group_list.html">团购</a>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                            <!--<a href="/Home/Activity/flash_sale_list.html">抢购</a>-->
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
                    <a href="/home/Index/index.html" class="logo"> <img src="/public/upload/logo/2017/09-20/06bef7c5190326d724a8631bc36cf55c.png"></a>
                </div>
                <!--搜索-s-->
                <div class="ecsc-search">
                    <form id="searchForm" name="" method="get" action="/Home/Goods/search.html" class="ecsc-search-form">
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
                    <div class="keyword">
                        <ul>
                                                            <li>
                                    <a href="/Home/Goods/search/q/%E9%9C%9C.html" target="_blank">霜</a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/search/q/%E4%B9%B3.html" target="_blank">乳</a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/search/q/%E9%9D%A2%E8%86%9C.html" target="_blank">面膜</a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/search/q/%E5%8E%9F%E6%B6%B2.html" target="_blank">原液</a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/search/q/%E4%BF%AE%E6%8A%A4%E6%B6%B2.html" target="_blank">修护液</a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/search/q/%E5%96%B7%E9%9B%BE.html" target="_blank">喷雾</a>
                                </li>
                                                    </ul>
                    </div>
                </div>
                <!--搜索-e-->
                <!--购物车-s-->
                
                <div class="shopingcar-index fr">
                    <div class="u-g-cart fr fixed" id="hd-my-cart">
                        <a href="/Home/Cart/cart.html">
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
                        <a href="/Home/Goods/all_category.html" target="_blank"><i class="share-a_a2"></i>全部商品分类</a>
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
                                            <a href="/Home/Goods/goodsList/id/1.html" title="肽风尚-护">肽风尚-护</a>
                                        </h3>
                                    </div>
                                    <b>&gt;</b>
                                </div>
                                                                <div class="cata-nav-layer">
                                    <div class="cata-nav-left">
                                        <div class="subitems">
                                                                                            <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/Home/Goods/goodsList/id/4.html" target="_blank">清洁系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/Home/Goods/goodsList/id/5.html" target="_blank">补水系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/Home/Goods/goodsList/id/9.html" target="_blank">粉底系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/Home/Goods/goodsList/id/10.html" target="_blank">美白系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/Home/Goods/goodsList/id/11.html" target="_blank">抗衰系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/Home/Goods/goodsList/id/13.html" target="_blank">喷雾系列<i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                                                                            </dd>
                                                </dl>
                                                                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="/Home/Goods/goodsList/id/15.html" target="_blank">面膜系列<i>&gt;</i></a>
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
                                            <a href="/Home/Goods/goodsList/id/2.html" title="肽风尚-养">肽风尚-养</a>
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
                                            <a href="/Home/Goods/goodsList/id/3.html" title="肽风尚-调">肽风尚-调</a>
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
                                            <a href="/Home/Goods/goodsList/id/7.html" title="体验品">体验品</a>
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
                         <li class="selected"><a href="/home/Index/index.html">首页</a></li>
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

    <!--轮播图-s-->
    <div id="myCarousel" class="carousel slide p header-tp" data-ride="carousel">
        <ol class="carousel-indicators">

        </ol>
        <div class="carousel-inner">
        	                <div class="item active" style="background:;">
                    <a href=""  >
                        <img  src="/public/upload/ad/2017/11-03/10921e0e7d2e1868038545466d699bb3.jpg" title="" style="">
                    </a>
                </div>
                            <div class="item " style="background:;">
                    <a href=""  >
                        <img  src="/public/upload/ad/2017/11-03/a531ecf9ba6c07e9ccd031db430fc4e2.jpg" title="" style="">
                    </a>
                </div>
                            <div class="item " style="background:;">
                    <a href=""  >
                        <img  src="/public/upload/ad/2017/11-03/d9d69fd6ee43937480ea6d44c4a75a05.jpg" title="" style="">
                    </a>
                </div>
                    </div>
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        <!--轮播图右侧广告-s-->
        <!-- <div class="adcertiserment_head">
            <div class="w1224">
                <ul>
                                    </ul>
            </div>
        </div> -->
        <!--轮播图右侧广告-e-->
    </div>
    <!--轮播图-e-->
    <!--轮播图底部广告-s-->
    <div class="adv3 p">
        <div class="w1224">
            <ul>
                            </ul>
        </div>
    </div>
    <!--轮播图底部广告-e-->
    <div class="adver_line">
        <div class="w1224">
                    </div>
    </div>

<!--------楼层-开始-------------->
        <!--商品楼层-s-->
        <div class="layer-floor " id="floor1">
            <div class="w1224">
            <div class="top_title_layer p">
                <div class="part-title">肽风尚-护</div>
                <div class="part-hot">
                    <ul>
                                                    <li>
                                <a href="/Home/Goods/goodsList/id/4.html">清洁系列</a>
                            </li>
                                                    <li>
                                <a href="/Home/Goods/goodsList/id/5.html">补水系列</a>
                            </li>
                                                    <li>
                                <a href="/Home/Goods/goodsList/id/9.html">粉底系列</a>
                            </li>
                                                    <li>
                                <a href="/Home/Goods/goodsList/id/10.html">美白系列</a>
                            </li>
                                                    <li>
                                <a href="/Home/Goods/goodsList/id/11.html">抗衰系列</a>
                            </li>
                                                    <li>
                                <a href="/Home/Goods/goodsList/id/13.html">喷雾系列</a>
                            </li>
                                                    <li>
                                <a href="/Home/Goods/goodsList/id/15.html">面膜系列</a>
                            </li>
                                            </ul>
                </div>
            </div>
            <div class="main_layer p">
                <div class="hoste_le">  
					                    
                </div>
                <div class="hoste_ri">
                    <ul>
                                                        <li>
                                    <a href="/Home/Goods/goodsInfo/id/1.html">
                                        <img class="picture_main" src="/public/upload/goods/thumb/1/goods_thumb_1_200_200.png"/>
                                        <span class="name_main">饱润肽焕颜气垫CC霜（自然色）</span>
                                        <!--<span class="intro_main">粉底系列</span>-->
                                        <span class="price_main"><i>￥</i>178.00</span>
                                    </a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/goodsInfo/id/20.html">
                                        <img class="picture_main" src="/public/images/icon_goods_thumb_empty_300.png"/>
                                        <span class="name_main">饱润肽冰爽夏日喷雾</span>
                                        <!--<span class="intro_main">喷雾系列</span>-->
                                        <span class="price_main"><i>￥</i>0.01</span>
                                    </a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/goodsInfo/id/19.html">
                                        <img class="picture_main" src="/public/images/icon_goods_thumb_empty_300.png"/>
                                        <span class="name_main">饱润肽雪肌焕彩素颜霜</span>
                                        <!--<span class="intro_main">粉底系列</span>-->
                                        <span class="price_main"><i>￥</i>168.00</span>
                                    </a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/goodsInfo/id/18.html">
                                        <img class="picture_main" src="/public/images/icon_goods_thumb_empty_300.png"/>
                                        <span class="name_main">饱润肽焕颜亮肤面膜</span>
                                        <!--<span class="intro_main">面膜系列</span>-->
                                        <span class="price_main"><i>￥</i>188.00</span>
                                    </a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/goodsInfo/id/17.html">
                                        <img class="picture_main" src="/public/images/icon_goods_thumb_empty_300.png"/>
                                        <span class="name_main">饱润肽水漾修护面膜</span>
                                        <!--<span class="intro_main">面膜系列</span>-->
                                        <span class="price_main"><i>￥</i>168.00</span>
                                    </a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/goodsInfo/id/16.html">
                                        <img class="picture_main" src="/public/images/icon_goods_thumb_empty_300.png"/>
                                        <span class="name_main">饱润肽雪肌精华乳</span>
                                        <!--<span class="intro_main">美白系列</span>-->
                                        <span class="price_main"><i>￥</i>218.00</span>
                                    </a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/goodsInfo/id/15.html">
                                        <img class="picture_main" src="/public/images/icon_goods_thumb_empty_300.png"/>
                                        <span class="name_main">饱润肽隔离BB霜（象牙白）</span>
                                        <!--<span class="intro_main">粉底系列</span>-->
                                        <span class="price_main"><i>￥</i>128.00</span>
                                    </a>
                                </li>
                                                            <li>
                                    <a href="/Home/Goods/goodsInfo/id/7.html">
                                        <img class="picture_main" src="/public/images/icon_goods_thumb_empty_300.png"/>
                                        <span class="name_main">饱润肽水光精华液</span>
                                        <!--<span class="intro_main">补水系列</span>-->
                                        <span class="price_main"><i>￥</i>58.00</span>
                                    </a>
                                </li>
                                                </ul>
                </div>
            </div>
        </div>
        </div>
    <!--商品楼层-e-->
        <!--商品楼层-s-->
        <div class="layer-floor " id="floor2">
            <div class="w1224">
            <div class="top_title_layer p">
                <div class="part-title">肽风尚-养</div>
                <div class="part-hot">
                    <ul>
                                            </ul>
                </div>
            </div>
            <div class="main_layer p">
                <div class="hoste_le">  
					                    
                </div>
                <div class="hoste_ri">
                    <ul>
                                            </ul>
                </div>
            </div>
        </div>
        </div>
    <!--商品楼层-e-->
        <!--商品楼层-s-->
        <div class="layer-floor " id="floor3">
            <div class="w1224">
            <div class="top_title_layer p">
                <div class="part-title">肽风尚-调</div>
                <div class="part-hot">
                    <ul>
                                            </ul>
                </div>
            </div>
            <div class="main_layer p">
                <div class="hoste_le">  
					                    
                </div>
                <div class="hoste_ri">
                    <ul>
                                            </ul>
                </div>
            </div>
        </div>
        </div>
    <!--商品楼层-e-->
        <!--商品楼层-s-->
        <div class="layer-floor " id="floor4">
            <div class="w1224">
            <div class="top_title_layer p">
                <div class="part-title">体验品</div>
                <div class="part-hot">
                    <ul>
                                            </ul>
                </div>
            </div>
            <div class="main_layer p">
                <div class="hoste_le">  
					                    
                </div>
                <div class="hoste_ri">
                    <ul>
                                            </ul>
                </div>
            </div>
        </div>
        </div>
    <!--商品楼层-e-->
        <!--楼层导航-s-->
    <div class="floornav_left">
        <ul>
                            <li class="elevators">
                    <a >1F<span class="cofin_floor">肽风尚-护</span></a>
                </li>
                            <li class="elevators">
                    <a >2F<span class="cofin_floor">肽风尚-养</span></a>
                </li>
                            <li class="elevators">
                    <a >3F<span class="cofin_floor">肽风尚-调</span></a>
                </li>
                            <li class="elevators">
                    <a >4F<span class="cofin_floor">体验品</span></a>
                </li>
                    </ul>
    </div>
    <!--楼层导航-e-->
<!--------楼层-结束-------------->

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
		                    			                    		<a href="/Home/Article/detail/article_id/1419.html">购物流程</a>
		                    			                    </li>
		                		                    <li>
		                    			                    		<a href="/Home/Article/detail/article_id/1420.html">售后服务</a>
		                    			                    </li>
		                		            </ul>
		        		            <ul>
		            			                <li class="foot-th">
		                    关于我们		                </li>
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

    <!-- <div class="foot-alone tp_h_alone">
        <div class="foot-banner">
            <div class="w1224">
                <div class="sum_baner">
                    <div class="baner-item">
                        <a href="">
                            <i class="icon1">7</i>
                            7天无理由退货
                        </a>
                    </div>
                    <div class="baner-item">
                        <a href="">
                            <i class="icon1">15</i>
                            15天免费换货
                        </a>
                    </div>
                    <div class="baner-item">
                        <a href="">
                            <i class="icon1">99</i>
                            满99元包邮
                        </a>
                    </div>
                    <div class="baner-item">
                        <a href="">
                            <i class="icon1">服</i>
                            手机特色服务
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot-main">
            <div class="w1224">
                <div class="sum_main">
                                            <dl class="foot-con">
                            <dt>新手上路</dt>
                                                        <dd>
                                                                <a href="/Home/Article/detail/article_id/1419.html">购物流程</a>
                                 -->
                                <!-- <a target="_blank" href="/Home/Article/detail/article_id/1419.html">购物流程</a> -->
                           <!--  </dd>
                                                        <dd>
                                                                <a href="/Home/Article/detail/article_id/1420.html">售后服务</a>
                                 -->
                                <!-- <a target="_blank" href="/Home/Article/detail/article_id/1420.html">售后服务</a> -->
                           <!--  </dd>
                                                    </dl>
                                            <dl class="foot-con">
                            <dt>关于我们</dt>
                                                        <dd>
                                                                <a href="/Home/Article/detail/article_id/1416.html">公司简介</a>
                                 -->
                                <!-- <a target="_blank" href="/Home/Article/detail/article_id/1416.html">公司简介</a> -->
                           <!--  </dd>
                                                        <dd>
                                                                <a href="/Home/Article/detail/article_id/1417.html">发展历程</a>
                                 -->
                                <!-- <a target="_blank" href="/Home/Article/detail/article_id/1417.html">发展历程</a> -->
                           <!--  </dd>
                                                        <dd>
                                                                <a href="/Home/Article/detail/article_id/1418.html">品牌荣誉</a>
                                 -->
                                <!-- <a target="_blank" href="/Home/Article/detail/article_id/1418.html">品牌荣誉</a> -->
                           <!--  </dd>
                                                    </dl>
                                            <dl class="foot-con">
                            <dt>售后服务</dt>
                                                    </dl>
                                        <dl class="foot-con continue">
                        <dt>联系我们</dt>
                        <dd>
                            <span class="cellphone_con">020-86210199</span>
                            <span class="time_con">周一至周日8:00-18:00</span>
                            <span class="cost_con">（仅收市话费）</span>
                            <a class="software_con" href="tencent://message/?uin=123456789&amp;Site=TPshop商城&amp;Menu=yes" target="_blank">
                                <img src="/template/pc/rainbow/static/images/continue.png"/>
                            </a>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="foot-bottom">
            <p>Copyright © 2016-2025 肽风尚商城 版权所有 保留一切权利 备案号:粤ICP17092251号</p>
        </div>
    </div> -->
    <!--侧边栏-s-->
    <div class="tp_h_alone">
        <div class="slidebar_alo">
            <ul>
                <li class="re_cuso"><a title="点击这里给我发消息" href="tencent://message/?uin=123456789&amp;Site=TPshop商城&amp;Menu=yes" target="_blank">客服服务</a></li>
                <li class="re_wechat">
                    <a target="_blank" href="" >微信关注</a>
                    <div class="rtipscont" style="">
                        <span class="arrowr-bg"></span>
                        <span class="arrowr"></span>
                        <img src="/template/pc/rainbow/static/images/qrcode1.jpg" />
                        <p class="tiptext">扫码关注官方微信<br>先人一步知晓促销活动</p>
                    </div>
                </li>
                <li class="re_phone">
                    <a target="_blank" href="/Mobile/Index/index.html" >手机商城</a>
                    <div class="rtipscont rstoretips" style="">
                        <span class="arrowr-bg"></span>
                        <span class="arrowr"></span>
                        <img src="/template/pc/rainbow/static/images/qrcode2.jpg" />
                        <p class="tiptext">扫码关注官方微信<br>先人一步知晓促销活动</p>
                    </div>
                </li>
                <li class="re_top"><a target="_blank" href="javascript:void(0);" >回到顶部</a></li>
            </ul>
        </div>
    </div>
    <!--侧边栏-e-->
    <!--footer-e-->
    <script src="/template/pc/rainbow/static/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script src="/template/pc/rainbow/static/js/carousel.js" type="text/javascript" charset="utf-8"></script>
    <script src="/template/pc/rainbow/static/js/transition.js" type="text/javascript" charset="utf-8"></script>
    <script src="/template/pc/rainbow/static/js/headerfooter_alone.js" type="text/javascript" charset="utf-8"></script>
    <!--------收货地址，物流运费-开始-------------->
    <script src="/template/pc/rainbow/static/js/location.js"></script>
    <!--------收货地址，物流运费--结束-------------->
    <script type="text/javascript">
        // $(function() {
        //     //首页商品分类显示
        //     $('.categorys2 .dd').show();

        //         var uname= getCookie('uname');
        //         if(uname == ''){
        //             $('.islogin').hide();
        //             $('.nologin').show();
        //         }else{
        //             $('.nologin').hide();
        //             $('.islogin').show();
        //             //获取用户名
        //             $('.userinfo').html(decodeURIComponent(uname));
        //         }
        // })
        $(function() { //轮播自动播放
            $(".carousel").carousel({interval: 2000});
        });
        $(function() { //floor分类鼠标滑动
            $(".f_tab li").each(function() {
                $(this).hoverDelay({
                    hoverEvent: function() {
                        $(this).addClass('ft');
                        $(this).siblings().removeClass('ft');
                    },
//			    		outEvent: function(){
//			        		$(this).siblings().removeClass('ft'); 
//			    		}
                });
            })
        });
        /**
         * 鼠标移动端到头部购物车上面 就ajax 加载
         */
        // 鼠标是否移动到了上方
        var header_cart_list_over = 0;
        $("#hd-my-cart > .c-n").hover(function(){
            if(header_cart_list_over == 1)
                return false;
            header_cart_list_over = 1;
            $.ajax({
                type : "GET",
                url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
                success: function(data){
                    $("#show_minicart").html(data);
                }
            });
        }).mouseout(function(){

            (typeof(t) == "undefined") || clearTimeout(t);
            t = setTimeout(function () {
                header_cart_list_over = 0; /// 标识鼠标已经离开
            }, 1000);
        });
    //楼层按钮
        //楼层添加data-mid
    $(function(){
        var Dum = {};
        Dum.brand = {
            i:0,
            ri:function(e){
                $(e).each(function(){
                    $(this).attr('id','brand_' + Dum.brand.i);
                    Dum.brand.i++
                })
                Dum.brand.i = 0;
                return Dum.brand.i;
            },
        }
        Dum.brand.ri(".layer-floor");
    })
    //侧边导航
    $(function(){
        $(window).scroll(function(){
            var main_brand = $('.adv3').offset().top;
            var scr = $(document).scrollTop();
            if(scr >= main_brand){
                $('.floornav_left').addClass('showfloornav');
            }else{
                $('.floornav_left').removeClass('showfloornav');
            }
        })

        var _index=0;
        var scr = $(document).scrollTop();
        $(".floornav_left ul li").click(function(){
            _index=$(this).index();
            //通过拼接字符串获取元素，再取得相对于文档的高度
            var _top=$("#brand_"+_index).offset().top + 1;//Firefox有1px的误差
            //scrollTop滚动到对应高度
            $("body,html").animate({scrollTop:_top},500);
        });
        $(window).scroll(function(){
            var tj = [];
            var strlength = $('.layer-floor').length;
            var stheigh = $('.layer-floor').eq(strlength - 1).height();//最后一个楼层的高度
            var scr = $(document).scrollTop();
            $('.layer-floor').each(function(i){
                var sthei = $(this).offset().top;
                tj.push(sthei);//楼层距离顶部的高度添加进数组
            })
            for(var n = 0;n < strlength;n++){
                if(scr >= tj[n] && scr <= tj[n] + stheigh){
                    $(".floornav_left ul li").eq(n).addClass("darkshow").siblings().removeClass("darkshow");
                }
            }
        });
    })
    </script>
</body>
</html>
";
?>