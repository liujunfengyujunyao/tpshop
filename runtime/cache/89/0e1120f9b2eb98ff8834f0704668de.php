<?php
//000000000000s:92605:"<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>商品详情</title>
    <link rel="stylesheet" type="text/css" href="/template/pc/rainbow/static/css/tpshop.css" />
    <link rel="stylesheet" type="text/css" href="/template/pc/rainbow/static/css/jquery.jqzoom.css">
    <script src="/template/pc/rainbow/static/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/public/js/layer/layer-min.js"></script>
    <script type="text/javascript" src="/template/pc/rainbow/static/js/jquery.jqzoom.js"></script>
    <script src="/public/js/global.js"></script>
    <script src="/public/js/pc_common.js"></script>
    <link rel="stylesheet" href="/template/pc/rainbow/static/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
</head>

<body>
<!--header-s-->
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
    <!--header-e-->
    <div class="search-box p">
        <div class="w1224">
            <div class="search-path fl">
                                    <a href="/index.php/Home/Goods/goodsList/id/1.html">肽风尚-护</a>
                    <i class="litt-xyb"></i>
                                    <a href="/index.php/Home/Goods/goodsList/id/9.html">粉底系列</a>
                    <i class="litt-xyb"></i>
                                <div class="havedox">
                    <span>饱润肽焕颜气垫CC霜（自然色）</span>
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
                            <img id="zoomimg" src="/public/upload/goods/thumb/1/goods_thumb_1_400_400.png" jqimg="/public/upload/goods/thumb/1/goods_thumb_1_800_800.png">
                        </div>
                        <!-- 商品大图介绍 end ]]-->
                        <!-- 商品小图介绍 start [[-->
                        <div class="product-small-img fn-clear"> <a href="javascript:;" class="next-left next-btn fl disabled"></a>
                            <div class="pic-hide-box fl">
                                <ul class="small-pic" style="left:0;">
                                                                            <li class="small-pic-li active">
                                        <a href="javascript:;">
                                            <img src="/public/upload/goods/thumb/1/goods_sub_thumb_2_60_60.png" data-img="/public/upload/goods/thumb/1/goods_sub_thumb_2_400_400.png" data-big="/public/upload/goods/thumb/1/goods_sub_thumb_2_800_800.png">
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
                                url:"http://tests.91tfs.com/index.php?m=Home&c=Goods&a=goodsInfo&id=1",
                                pic:"http://tests.91tfs.com/public/upload/goods/thumb/1/goods_thumb_1_400_400.png",
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
                <div class="detail-ggsl">
                <h1>饱润肽焕颜气垫CC霜（自然色）</h1>
                <!--商品抢购 start-->
                                <!--商品抢购  end-->
                <div class="shop-price-cou">
                    <div class="shop-price-le">
                        <ul>
                            <li class="jaj"><span>商城价：</span></li>
                            <li>
                                <span class="bigpri_jj" id="goods_price"><em>￥</em>178.00                                <!--<a href=""><em class="sale">（降价通知）</em></a>-->
                                </span>
                            </li>
                        </ul>
                        <ul>
                            <li class="jaj"><span>市场价：</span></li>
                            <li class="though-line"><span><em>￥</em>0.00</span></li>
                        </ul>
                                                    <ul>
                                <li class="jaj ls4"><span>赠送积分：</span></li>
                                <li><span class="fullminus">20</span></li>
                            </ul>
                                                <!-- 赠品展示 -->
                                            </div>
                    <div class="shop-cou-ri">
                        <div class="allcomm"><p>累计评价</p><p class="f_blue">1</p></div>
                        <div class="br1"></div>
                        <div class="allcomm"><p>累计销量</p><p class="f_blue">9</p></div>
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
                                <!--<span id="dispatching_msg" style="display: none;">有货</span>-->
                                <select id="dispatching_select" style="display: none;"></select>
                            </div>
                        </li>

                    </ul>
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
                            <li class="lawir"><span class="service">78+100积分</span></li>
                        </ul>
                    </div>
                
                <!-- 规格 start [[-->
                                <script>
                    /**
                     * 切换规格
                     */
                    function select_filter(obj)
                    {
                        $(obj).addClass('red').siblings('a').removeClass('red');
                        $(obj).siblings('input').prop('checked',false);
                        $(obj).prev('input').prop('checked',true);;	 // 让隐藏的 单选按钮选中
                        // 更新商品价格
                        get_goods_price();
                    }
                </script>
                <!-- 规格end ]]-->
                <div class="standard p">
                    <ul>
                        <li class="jaj"><span>数&nbsp;&nbsp;量：</span></li>
                        <li class="lawir">
                            <div class="minus-plus">
                                <a class="mins" href="javascript:void(0);" onclick="altergoodsnum(-1)">-</a>
                                <input class="buyNum" id="number" type="text" name="goods_num" value="1" onblur="altergoodsnum(0)" max="30"/>
                                <a class="add" href="javascript:void(0);" onclick="altergoodsnum(1)">+</a>
                            </div>
                            <div class="sav_shop">剩余库存：<span id="store_count">29</span></div>
                        </li>
                    </ul>
                    <script>
                        $('#number').val(1);
                    </script>
                </div>
                <div class="standard p">
                    <input type="hidden" name="goods_id" value="1" />
                                            <a id="join_cart_now" class="paybybill" href="javascript:;"  onclick="buyIntegralGoods(1,1,1);">立即兑换</a>
                        <a id="no_join_cart_now" class="paybybill" style="display:none;background: #ebebeb;color: #999;cursor: not-allowed">立即兑换</a>
                                        <!--<a class="paybybill" href="javascript:;" onclick="AjaxAddCart(1,1,1);">立即购买</a>-->
                    <!--<a class="addcar" href="javascript:;" onclick="AjaxAddCart(1,1,0);"><i class="sk"></i>加入购物车</a>-->
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
                                                            <li><a href="/index.php/Home/Goods/search/q/%E9%9C%9C.html">霜</a></li>
                                                            <li><a href="/index.php/Home/Goods/search/q/%E4%B9%B3.html">乳</a></li>
                                                            <li><a href="/index.php/Home/Goods/search/q/%E9%9D%A2%E8%86%9C.html">面膜</a></li>
                                                            <li><a href="/index.php/Home/Goods/search/q/%E5%8E%9F%E6%B6%B2.html">原液</a></li>
                                                            <li><a href="/index.php/Home/Goods/search/q/%E4%BF%AE%E6%8A%A4%E6%B6%B2.html">修护液</a></li>
                                                            <li><a href="/index.php/Home/Goods/search/q/%E5%96%B7%E9%9B%BE.html">喷雾</a></li>
                                                    </ul>
                    </div>
                </div>
                <div class="type_more ma-to-20">
                    <div class="type-top">
                        <h2>推荐热卖</h2>
                    </div>
                    <div class="tjhot-shoplist type-bot">
                                                    <div class="alone-shop">
                                <a href="/index.php/Home/Goods/goodsInfo/id/21.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                                <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/21.html">简约水洗棉四件套   </a></p>
                                <p class="price-tag"><span class="li_xfo">￥</span><span>488.00</span></p>
                                <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                            </div>
                                                    <div class="alone-shop">
                                <a href="/index.php/Home/Goods/goodsInfo/id/20.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                                <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/20.html">饱润肽冰爽夏日喷雾</a></p>
                                <p class="price-tag"><span class="li_xfo">￥</span><span>10.00</span></p>
                                <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                            </div>
                                                    <div class="alone-shop">
                                <a href="/index.php/Home/Goods/goodsInfo/id/19.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                                <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/19.html">饱润肽雪肌焕彩素颜霜</a></p>
                                <p class="price-tag"><span class="li_xfo">￥</span><span>168.00</span></p>
                                <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                            </div>
                                                    <div class="alone-shop">
                                <a href="/index.php/Home/Goods/goodsInfo/id/18.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                                <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/18.html">饱润肽焕颜亮肤面膜</a></p>
                                <p class="price-tag"><span class="li_xfo">￥</span><span>188.00</span></p>
                                <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                            </div>
                                                    <div class="alone-shop">
                                <a href="/index.php/Home/Goods/goodsInfo/id/17.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                                <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/17.html">饱润肽水漾修护面膜</a></p>
                                <p class="price-tag"><span class="li_xfo">￥</span><span>168.00</span></p>
                                <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                            </div>
                                                    <div class="alone-shop">
                                <a href="/index.php/Home/Goods/goodsInfo/id/16.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                                <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/16.html">饱润肽雪肌精华乳</a></p>
                                <p class="price-tag"><span class="li_xfo">￥</span><span>218.00</span></p>
                                <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                            </div>
                                                    <div class="alone-shop">
                                <a href="/index.php/Home/Goods/goodsInfo/id/15.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                                <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/15.html">饱润肽隔离BB霜（象牙白）</a></p>
                                <p class="price-tag"><span class="li_xfo">￥</span><span>128.00</span></p>
                                <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                            </div>
                                                    <div class="alone-shop">
                                <a href="/index.php/Home/Goods/goodsInfo/id/14.html"><img src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
                                <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/14.html">饱润肽清爽修护液</a></p>
                                <p class="price-tag"><span class="li_xfo">￥</span><span>138.00</span></p>
                                <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                            </div>
                                                    <div class="alone-shop">
                                <a href="/index.php/Home/Goods/goodsInfo/id/8.html"><img src="/public/upload/goods/thumb/8/goods_thumb_8_206_206.jpeg" style="display: inline;"></a>
                                <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/8.html">饱润肽丝滑精粹原液</a></p>
                                <p class="price-tag"><span class="li_xfo">￥</span><span>238.00</span></p>
                                <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                            </div>
                                                    <div class="alone-shop">
                                <a href="/index.php/Home/Goods/goodsInfo/id/7.html"><img src="/public/upload/goods/thumb/7/goods_thumb_7_206_206.png" style="display: inline;"></a>
                                <p class="line-two-hidd"><a href="/index.php/Home/Goods/goodsInfo/id/7.html">饱润肽水光精华液</a></p>
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
                            <li><a href="javascript:void(0);">评价<em>(1)</em></a></li>
                            <li><a href="javascript:void(0);">售后服务</a></li>
                        </ul>
                    </div>
                    <!--<div class="he-nav"></div>-->
                    <div class="shop-describe shop-con-describe p">
                        <div class="deta-descri">
                            <p class="shopname_de"><span>商品名称：</span><span>饱润肽焕颜气垫CC霜（自然色）</span></p>
                            <div class="ma-d-uli p">
                                <ul>
                                    <!--<li><span>品牌：</span><span>肽风尚</span></li>-->
                                    <li><span>货号：</span><span>TP0000001</span></li>
                                                                        <li><span>产品规格：</span><span>15g</span></li>
                                                                        <li><span>成分：</span><span>小分子羊胎盘肽-水解胎盘（羊）提取物、烟酰胺、积雪草（CENTELLA ASIATICA）提取物、马齿苋（PORTULACA OLERACEA）提取物</span></li>
                                                                        <li><span>产地：</span><span>广州</span></li>
                                                                        <li><span>功效：</span><span>打造轻薄、服帖的自然妆容，同时配合多种天然成分、深层滋润肌肤，实现由内而外的美</span></li>
                                                                        <li><span>化妆品品类：</span><span>粉底系列</span></li>
                                                                    </ul>
                            </div>

                            <div class="moreparameter">
                                <!--
                                <a href="">跟多参数<em>>></em></a>
                                -->
                            </div>
                        </div>
                        <div class="detail-img-b">
                            <p style="text-align: center;"><img src="/public/upload/temp/2017/09-20/449638006ca3d0dd8412471e0a19fa5e.jpg" title="449638006ca3d0dd8412471e0a19fa5e.jpg" alt="449638006ca3d0dd8412471e0a19fa5e.jpg"/></p>                        </div>
                    </div>
                    <div class="shop-describe shop-con-describe p" style="display: none;">
                        <div class="deta-descri">
                            <!--
                            <p class="shopname_de"><span>如果您发现商品信息不准确，<a class="de_cb" href="">欢迎纠错</a></span></p>
                            -->
                            <h2 class="shopname_de">属性</h2>
                                                            <div class="twic_a_alon">
                                    <p class="gray_t">产品规格</p>
                                    <p>15g</p>
                                </div>
                                                            <div class="twic_a_alon">
                                    <p class="gray_t">成分</p>
                                    <p>小分子羊胎盘肽-水解胎盘（羊）提取物、烟酰胺、积雪草（CENTELLA ASIATICA）提取物、马齿苋（PORTULACA OLERACEA）提取物</p>
                                </div>
                                                            <div class="twic_a_alon">
                                    <p class="gray_t">产地</p>
                                    <p>广州</p>
                                </div>
                                                            <div class="twic_a_alon">
                                    <p class="gray_t">功效</p>
                                    <p>打造轻薄、服帖的自然妆容，同时配合多种天然成分、深层滋润肌肤，实现由内而外的美</p>
                                </div>
                                                            <div class="twic_a_alon">
                                    <p class="gray_t">化妆品品类</p>
                                    <p>粉底系列</p>
                                </div>
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
                                            <a class="jfnuv" href="/index.php/Home/User/comment.html">发表评论</a>
                                            <!--<p class="xja"><span>详见</span><a class="de_cb" href="">积分规则</a></p>-->
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="deta-descri p">
                                <div class="cte-deta">
                                    <ul id="fy-comment-list">
                                        <li data-t="1" class="red">
                                            <a href="javascript:void(0);" class="selected">全部评论（1）</a>
                                        </li>
                                        <li data-t="2">
                                            <a href="javascript:void(0);">好评（1）</a>
                                        </li>
                                        <li data-t="3">
                                            <a href="javascript:void(0);">中评（0）</a>
                                        </li>
                                        <li data-t="4">
                                            <a href="javascript:void(0);">差评（0）</a>
                                        </li>
                                        <li data-t="5">
                                            <a href="javascript:void(0);">有图（1）</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer-s-->
    <div class="footer p">

        <!-- <div class="mod_service_inner">
        <div class="w1224">
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
<div class="w1224">
    <div class="footer-ewmcode">
        <div class="foot-list-fl">
                            <ul>
                    <li class="foot-th">
                        新手上路                    </li>
                                            <li>
                            <a href="/index.php/Home/Article/detail/article_id/1419.html">购物流程</a>
                        </li>
                                            <li>
                            <a href="/index.php/Home/Article/detail/article_id/1420.html">售后服务</a>
                        </li>
                                    </ul>
                            <ul>
                    <li class="foot-th">
                        关于我们                    </li>
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
                        售后服务                    </li>
                                    </ul>
                    </div>
        <div class="QRcode-fr">
            <ul>
                <li class="foot-th">客户端</li>
                <li><img src="/template/pc/rainbow/static/images/qrcode1.jpg"/></li>
            </ul>
            <ul>
                <li class="foot-th">微信</li>
                <li><img src="/template/pc/rainbow/static/images/qrcode2.jpg"/></li>
            </ul>
        </div>
    </div>
    <div class="mod_copyright p">
        <div class="grid-top">
                        <a href="javascript:void (0);">客服热线:020-86210199</a>
        </div>
        <p>Copyright © 2016-2025 肽风尚商城 版权所有 保留一切权利 备案号:粤ICP17092251号</p>

        <p class="mod_copyright_auth">
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_1" href="" target="_blank">经营性网站备案中心</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_2" href="" target="_blank">可信网站信用评估</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_3" href="" target="_blank">网络警察提醒你</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_4" href="" target="_blank">诚信网站</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_5" href="" target="_blank">中国互联网举报中心</a>
            <a class="mod_copyright_auth_ico mod_copyright_auth_ico_6" href="" target="_blank">网络举报APP下载</a>
        </p>
    </div>
</div> -->
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
    </div>
<!--看了又看-s-->
<div style="display: none" id="look_see">
        <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/3.html"><img class="wiahides" src="/public/upload/goods/thumb/3/goods_thumb_3_206_206.png" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/3.html">饱润肽柔肤洁面乳</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>88.00</span>
            </p>
        </div>
    </div>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/7.html"><img class="wiahides" src="/public/upload/goods/thumb/7/goods_thumb_7_206_206.png" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/7.html">饱润肽水光精华液</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>58.00</span>
            </p>
        </div>
    </div>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/14.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/14.html">饱润肽清爽修护液</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>138.00</span>
            </p>
        </div>
    </div>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/4.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/4.html">A套餐-美人柜</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>900.00</span>
            </p>
        </div>
    </div>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/9.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/9.html">B套餐-美人柜</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>1200.00</span>
            </p>
        </div>
    </div>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/10.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/10.html">C套餐-美人柜</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>1500.00</span>
            </p>
        </div>
    </div>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/26.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/26.html">修护液体验装</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>50.00</span>
            </p>
        </div>
    </div>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/27.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/27.html">精华乳体验装</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>62.00</span>
            </p>
        </div>
    </div>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/28.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/28.html">测试赠品</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>0.00</span>
            </p>
        </div>
    </div>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/16.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/16.html">饱润肽雪肌精华乳</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>218.00</span>
            </p>
        </div>
    </div>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/8.html"><img class="wiahides" src="/public/upload/goods/thumb/8/goods_thumb_8_206_206.jpeg" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/8.html">饱润肽丝滑精粹原液</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>238.00</span>
            </p>
        </div>
    </div>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="/index.php/Home/Goods/goodsInfo/id/20.html"><img class="wiahides" src="/public/images/icon_goods_thumb_empty_300.png" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="/index.php/Home/Goods/goodsInfo/id/20.html">饱润肽冰爽夏日喷雾</a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span>10.00</span>
            </p>
        </div>
    </div>
<!--看了又看-s-->
</div>
    <!--footer-e-->
    <script src="/template/pc/rainbow/static/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
    <!--<script src="/template/pc/rainbow/static/js/popt.js" type="text/javascript" charset="utf-8"></script>-->
    <!--------收货地址，物流运费-开始-------------->
    <script src="/template/pc/rainbow/static/js/location.js"></script>
    <!--------收货地址，物流运费--结束-------------->
    <script type="text/javascript" src="/template/pc/rainbow/static/js/headerfooter.js" ></script>
    <script type="text/javascript">
        var commentType = 1;// 默认评论类型
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
            get_goods_price();
            ajaxComment(commentType,1);// ajax 加载评价列表
            replace_look();
        });

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

        var store_count = 30; // 商品起始库存
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
        //切换规格
//        $(function(){
//            $('.colo a').click(function(){
//                $(this).addClass('red').siblings('a').removeClass('red');
//            })
//        })
        $(function() {
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
            num += n;
            num <= 0 ? num = 1 :  num;
            if(num >= maxnum){
                $(this).addClass('no-mins');
                num = maxnum;
            }
            $('#store_count').text(maxnum-num); //更新库存数量
            $('#number').val(num)
        }

        function get_goods_price()
        {
            var goods_price = 178.00; // 商品起始价
            var store_count = 30; // 商品起始库存
            var spec_goods_price = [];  // 规格 对应 价格 库存表   //alert(spec_goods_price['28_100']['price']);
            // 优先显示抢购活动库存
                        // 如果有属性选择项
            if(spec_goods_price != null && spec_goods_price !='')
            {
                goods_spec_arr = new Array();
                $("input[name^='goods_spec']:checked").each(function(){
                    goods_spec_arr.push($(this).val());
                });
                var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key
                goods_price = spec_goods_price[spec_key]['price']; // 找到对应规格的价格
                store_count = spec_goods_price[spec_key]['store_count']; // 找到对应规格的库存
            }

            var goods_num = parseInt($("#goods_num").val());
            // 库存不足的情况
            if(goods_num > store_count)
            {
                goods_num = store_count;
                layer.alert('库存仅剩 '+store_count+' 件',{icon:2});
                $("#goods_num").val(goods_num);
            }
            $('#store_count').html(store_count);    //对应规格库存显示出来
            $('#number').attr('max',store_count); //对应规格最大库存
            $("#goods_price").html('<span>￥</span><span>'+goods_price+'</span>'); // 变动价格显示
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
                    url:"/index.php/Home/Goods/collect_goods.html",
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

        /***用ajax分页显示评论**/
        function ajaxComment(commentType,page){
            $.ajax({
                type : "GET",
                url:"/index.php?m=Home&c=goods&a=ajaxComment&goods_id=1&commentType="+commentType+"&p="+page,//+tab,
                success: function(data){
                    $("#ajax_comment_return").html('');
                    $("#ajax_comment_return").append(data);
                }
            });
        }
        /**
         * 切换图片
         */
        function switch_zooming(img)
        {
            if(img != ''){
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