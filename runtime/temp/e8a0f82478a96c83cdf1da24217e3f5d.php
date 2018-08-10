<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:42:"./template/pc/rainbow/goods\goodsInfo.html";i:1512439865;s:40:"./template/pc/rainbow/public\header.html";i:1512439865;s:46:"./template/pc/rainbow/public\footer_index.html";i:1512439865;s:46:"./template/pc/rainbow/public\sidebar_cart.html";i:1512439865;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>商品详情</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/jquery.jqzoom.css">
    <script src="__STATIC__/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/layer/layer-min.js"></script>
    <script type="text/javascript" src="__STATIC__/js/jquery.jqzoom.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/pc_common.js"></script>
    <link rel="stylesheet" href="__STATIC__/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
</head>

<body>
<!--header-s-->
<!-- 新浪获取ip地址 -start-->
<?php if(\think\Cookie::get('province_id') <= 0): ?>
    <script src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=<?php echo \think\Request::instance()->ip(); ?>"></script>
    <script type="text/JavaScript">
        doCookieArea(remote_ip_info);
    </script>
<?php endif; ?>
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
                            <a class="red" href="<?php echo U('Home/user/login'); ?>">Hi.请登录</a>
                            <a href="<?php echo U('Home/user/reg'); ?>">免费注册</a>
                        </div>
                        <div class="fl islogin">
                            <a class="red userinfo" href="<?php echo U('Home/user/index'); ?>" ></a>
                            <a  href="<?php echo U('Home/user/logout'); ?>"  title="退出" target="_self">安全退出</a>
                        </div>
                </div>
                <div class="top-ri-header fr">
                    <ul>
                        <li><a target="_blank" href="<?php echo U('/Home/Order/order_list'); ?>">我的订单</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="<?php echo U('Home/User/visit_log'); ?>">我的浏览</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="<?php echo U('/Home/User/coupon'); ?>">我的优惠券</a></li>
                        <li class="spacer"></li>
                        <li><a target="_blank" href="<?php echo U('/Home/User/goods_collect'); ?>">我的收藏</a></li>
                        <!-- <li class="spacer"></li>
                        <li><a target="_blank" title="点击这里给我发消息" href="<?php echo U('Home/Article/detail',array('article_id'=>22)); ?>" target="_blank">在线客服</a></li>
                        <li class="spacer"></li> -->
                        <!--<li class="hover-ba-navdh">-->
                            <!--<div class="nav-dh">-->
                                <!--<span>网站导航</span>-->
                                <!--<i class="share-a_a1"></i>-->
                                <!--<div class="conta-hv-nav">-->
                                    <!--<ul>-->
                                        <!--<li>-->
                                            <!--<a href="<?php echo U('Home/Activity/group_list'); ?>">团购</a>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                            <!--<a href="<?php echo U('Home/Activity/flash_sale_list'); ?>">抢购</a>-->
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
                    <a href="<?php echo U('Index/index'); ?>" class="logo"> <img src="<?php echo $tpshop_config['shop_info_store_logo']; ?>"></a>
                </div>
                <!--搜索-s-->
                <div class="ecsc-search">
                    <form id="searchForm" name="" method="get" action="<?php echo U('Home/Goods/search'); ?>" class="ecsc-search-form">
                        <input autocomplete="off" name="q" id="q" type="text" value="<?php echo \think\Request::instance()->param('q'); ?>" placeholder="搜索关键字" class="ecsc-search-input">
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
                                        url:"<?php echo U('Home/Api/searchKey'); ?>",
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
                            <?php if(is_array($tpshop_config['hot_keywords']) || $tpshop_config['hot_keywords'] instanceof \think\Collection || $tpshop_config['hot_keywords'] instanceof \think\Paginator): if( count($tpshop_config['hot_keywords'])==0 ) : echo "" ;else: foreach($tpshop_config['hot_keywords'] as $k=>$wd): ?>
                                <li>
                                    <a href="<?php echo U('Home/Goods/search',array('q'=>$wd)); ?>" target="_blank"><?php echo $wd; ?></a>
                                </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <!--搜索-e-->
                <!--购物车-s-->
                
                <div class="shopingcar-index fr">
                    <div class="u-g-cart fr fixed" id="hd-my-cart">
                        <a href="<?php echo U('Home/Cart/cart'); ?>">
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
                        <a href="<?php echo U('Home/Goods/all_category'); ?>" target="_blank"><i class="share-a_a2"></i>全部商品分类</a>
                    </div>-->
                    <!--全部商品分类-s-->
                    <!--<div class="dd">
                        <div class="cata-nav">
                            &lt;!&ndash; 外层循环点&ndash;&gt;
                            <?php if(is_array($goods_category_tree) || $goods_category_tree instanceof \think\Collection || $goods_category_tree instanceof \think\Paginator): if( count($goods_category_tree)==0 ) : echo "" ;else: foreach($goods_category_tree as $k=>$v): ?>
                            <div class="item fore1">
                                <?php if($v[level] == 1): ?>
                                <div class="item-left">
                                    <div class="cata-nav-name">
                                        <h3>
                                            <div class="contiw-cer"><span class="share-icon-<?php echo $k; ?>"></span></div>
                                            <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id])); ?>" title="<?php echo $v[name]; ?>"><?php echo $v[name]; ?></a>
                                        </h3>
                                    </div>
                                    <b>&gt;</b>
                                </div>
                                <?php endif; ?>
                                <div class="cata-nav-layer">
                                    <div class="cata-nav-left">
                                        <div class="subitems">
                                            <?php if(is_array($v['tmenu']) || $v['tmenu'] instanceof \think\Collection || $v['tmenu'] instanceof \think\Paginator): if( count($v['tmenu'])==0 ) : echo "" ;else: foreach($v['tmenu'] as $k2=>$v2): if($v2[parent_id] == $v['id']): ?>
                                                <dl>&lt;!&ndash; 2级循环点&ndash;&gt;
                                                    <dt>
                                                        <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id])); ?>" target="_blank"><?php echo $v2[name]; ?><i>&gt;</i></a>
                                                    </dt>
                                                    <dd>
                                                        <?php if(is_array($v2['sub_menu']) || $v2['sub_menu'] instanceof \think\Collection || $v2['sub_menu'] instanceof \think\Paginator): if( count($v2['sub_menu'])==0 ) : echo "" ;else: foreach($v2['sub_menu'] as $k3=>$v3): if($v3[parent_id] == $v2['id']): ?>
                                                            <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id])); ?>" target="_blank"><?php echo $v3[name]; ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                    </dd>
                                                </dl>
                                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            &lt;!&ndash;商品分类底部广告-s&ndash;&gt;
                                            <div class="advertisement_down">
                                                <ul>                                                
                                                    <?php $pid =14;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1513663200 and end_time > 1513663200 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select();
if(!in_array($pid,array_keys($ad_position)) && $pid)
{
  M("ad_position")->insert(array(
         "position_id"=>$pid,
         "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ",
         "is_open"=>1,
         "position_desc"=>CONTROLLER_NAME."页面",
  ));
  delFile(RUNTIME_PATH); // 删除缓存
  \think\Cache::clear();  
}


$c = 1- count($result); //  如果要求数量 和实际数量不一样 并且编辑模式
if($c > 0 && I("get.edit_ad"))
{
    for($i = 0; $i < $c; $i++) // 还没有添加广告的时候
    {
      $result[] = array(
          "ad_code" => "/public/images/not_adv.jpg",
          "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid",
          "title"   =>"暂无广告图片",
          "not_adv" => 1,
          "target" => 0,
      );  
    }
}
foreach($result as $key=>$v3):       
    
    $v3[position] = $ad_position[$v3[pid]]; 
    if(I("get.edit_ad") && $v3[not_adv] == 0 )
    {
        $v3[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; // 广告半透明的样式
        $v3[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v3[ad_id]";        
        $v3[title] = $ad_position[$v3[pid]][position_name]."===".$v3[ad_name];
        $v3[target] = 0;
    }
    ?>
                                                        <li>
                                                            <a href="<?php echo $v3[ad_link]; ?>" <?php if($v3['target'] == 1): ?>target="_blank"<?php endif; ?>>
                                                                <img src="<?php echo $v3[ad_code]; ?>" title="<?php echo $v3[title]; ?>" style="<?php echo $v3[style]; ?>" width="129" height="45"/>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>                                                
                                                </ul>
                                            </div>
                                            &lt;!&ndash;商品分类底部广告-e&ndash;&gt;
                                        </div>
                                    </div>
                                    &lt;!&ndash;商品分类右侧广告-s&ndash;&gt;
                                    <div class="cata-nav-rigth">
                                        <?php $pid =51;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1513663200 and end_time > 1513663200 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select();
if(!in_array($pid,array_keys($ad_position)) && $pid)
{
  M("ad_position")->insert(array(
         "position_id"=>$pid,
         "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ",
         "is_open"=>1,
         "position_desc"=>CONTROLLER_NAME."页面",
  ));
  delFile(RUNTIME_PATH); // 删除缓存
  \think\Cache::clear();  
}


$c = 1- count($result); //  如果要求数量 和实际数量不一样 并且编辑模式
if($c > 0 && I("get.edit_ad"))
{
    for($i = 0; $i < $c; $i++) // 还没有添加广告的时候
    {
      $result[] = array(
          "ad_code" => "/public/images/not_adv.jpg",
          "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid",
          "title"   =>"暂无广告图片",
          "not_adv" => 1,
          "target" => 0,
      );  
    }
}
foreach($result as $key=>$v):       
    
    $v[position] = $ad_position[$v[pid]]; 
    if(I("get.edit_ad") && $v[not_adv] == 0 )
    {
        $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; // 广告半透明的样式
        $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]";        
        $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name];
        $v[target] = 0;
    }
    ?>
                                            <a href="<?php echo $v[ad_link]; ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?>>
                                                <img src="<?php echo $v[ad_code]; ?>" title="<?php echo $v[title]; ?>" style="<?php echo $v[style]; ?>"/>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                    &lt;!&ndash;商品分类右侧广告-e&ndash;&gt;
                                </div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>-->
                    <!--全部商品分类-e-->
                </div>
                <!--导航栏-s-->
                 <!--<div class="navitems" id="nav">-->
                     <ul class="navitems clearfix" id="navitems">
                         <li <?php if(CONTROLLER_NAME == 'Index'): ?>class="selected"<?php endif; ?>><a href="<?php echo U('Index/index'); ?>">首页</a></li>
                         <?php
                                   
                                $md5_key = md5("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>
                             <li <?php if($_SERVER['REQUEST_URI']==str_replace('&amp;','&',$v[url])){ echo "class='selected'";}?>>
                             <a href="<?php echo $v[url]; ?>" <?php if($v[is_new] == 1): ?>target="_blank" <?php endif; ?> ><?php echo $v[name]; ?></a>
                             </li>
                         <?php endforeach; ?>
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
                <?php if(is_array($navigate_goods) || $navigate_goods instanceof \think\Collection || $navigate_goods instanceof \think\Paginator): if( count($navigate_goods)==0 ) : echo "" ;else: foreach($navigate_goods as $k=>$v): ?>
                    <a href="<?php echo U('/Home/Goods/goodsList',array('id'=>$k)); ?>"><?php echo $v; ?></a>
                    <i class="litt-xyb"></i>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="havedox">
                    <span><?php echo $goods['goods_name']; ?></span>
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
                            <img id="zoomimg" src="<?php echo goods_thum_images($goods['goods_id'],400,400); ?>" jqimg="<?php echo goods_thum_images($goods['goods_id'],800,800); ?>">
                        </div>
                        <!-- 商品大图介绍 end ]]-->
                        <!-- 商品小图介绍 start [[-->
                        <div class="product-small-img fn-clear"> <a href="javascript:;" class="next-left next-btn fl disabled"></a>
                            <div class="pic-hide-box fl">
                                <ul class="small-pic" style="left:0;">
                                    <?php if(is_array($goods_images_list) || $goods_images_list instanceof \think\Collection || $goods_images_list instanceof \think\Paginator): if( count($goods_images_list)==0 ) : echo "" ;else: foreach($goods_images_list as $k=>$v): ?>
                                        <li class="small-pic-li <?php if($k == 0): ?>active<?php endif; ?>">
                                        <a href="javascript:;">
                                            <img src="<?php echo get_sub_images($v,$v[goods_id],60,60); ?>" data-img="<?php echo get_sub_images($v,$v[goods_id],400,400); ?>" data-big="<?php echo get_sub_images($v,$v[goods_id],800,800); ?>">
                                            <i></i>
                                        </a>
                                        </li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
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
                                url:"http://<?php echo $_SERVER[HTTP_HOST]; ?>/index.php?m=Home&c=Goods&a=goodsInfo&id=<?php echo $_GET[id]; ?>",
                                pic:"http://<?php echo $_SERVER[HTTP_HOST]; ?><?php echo goods_thum_images($goods[goods_id],400,400); ?>",
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
                <h1><?php echo $goods['goods_name']; ?></h1>
                <!--商品抢购 start-->
                <?php if(!(empty($goods['flash_sale']) || (($goods['flash_sale'] instanceof \think\Collection || $goods['flash_sale'] instanceof \think\Paginator ) && $goods['flash_sale']->isEmpty()))): ?>
                    <div class="presale-time">
                        <div class="pre-icon fl">
                            <span class="ys"><i class="detai-ico"></i>抢购活动</span>
                        </div>
                        <div class="pre-icon fr">
                            <!--<span class="per"><i class="detai-ico"></i><em>0</em>人预定</span>-->
                            <span class="ti"><i class="detai-ico"></i>剩余时间：<span id="surplus_text"></span></span>
                        </div>
                        <script>
                            // 倒计时
                            function GetRTime2(){
                                //var text = GetRTime('2016/02/27 17:34:00');
                                    var text = GetRTime('<?php echo date("Y/m/d H:i:s",$goods['flash_sale']['end_time']); ?>');
                                $("#surplus_text").text(text);
                            }
                            setInterval(GetRTime2,1000);
                        </script>
                    </div>
                <?php endif; ?>
                <!--商品抢购  end-->
                <div class="shop-price-cou">
                    <div class="shop-price-le">
                        <ul>
                            <li class="jaj"><span><?php if($goods['prom_type'] == 1): ?> 优惠价：<?php else: ?>商城价：<?php endif; ?></span></li>
                            <li>
                                <span class="bigpri_jj" id="goods_price"><em>￥</em><?php if($goods['prom_type'] == 1): ?><?php echo $goods['flash_sale']['price']; else: ?><?php echo $goods['shop_price']; endif; ?>
                                <!--<a href=""><em class="sale">（降价通知）</em></a>-->
                                </span>
                            </li>
                        </ul>
                        <ul>
                            <li class="jaj"><span>市场价：</span></li>
                            <li class="though-line"><span><em>￥</em><?php echo $goods['market_price']; ?></span></li>
                        </ul>
                        <?php if($goods['give_integral'] > 0): ?>
                            <ul>
                                <li class="jaj ls4"><span>赠送积分：</span></li>
                                <li><span class="fullminus"><?php echo $goods['give_integral']; ?></span></li>
                            </ul>
                        <?php endif; ?>
                        <!-- 赠品展示 -->
                        <?php if($goods['send_id'] != null): ?>
                            <ul>
                                <li class="jaj"><span style="color: red;">赠 &nbsp;品：</span></li>
                                <li><span><a href="<?php echo U('Home/goods/goodsInfo',array('id'=>$send_goods_info['goods_id'])); ?>"><?php echo $send_goods_info['goods_name']; ?></a></span></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <div class="shop-cou-ri">
                        <div class="allcomm"><p>累计评价</p><p class="f_blue"><?php echo $goods['comment_count']; ?></p></div>
                        <div class="br1"></div>
                        <div class="allcomm"><p>累计销量</p><p class="f_blue"><?php echo $goods['sales_sum']; ?></p></div>
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
                        <li class="lawir"><span class="service">由<a ><?php echo $tpshop_config['shop_info_store_name']; ?></a>发货并提供售后服务</span></li>
                    </ul>
                </div>
                <?php if($goods['exchange_integral'] > 0): ?>
                    <div class="standard p">
                        <ul>
                            <li class="jaj"><span>可&nbsp;&nbsp;用：</span></li>
                            <li class="lawir"><span class="service"><?php echo $goods['shop_price']-$goods['exchange_integral']/$point_rate; ?>+<?php echo $goods['exchange_integral']; ?>积分</span></li>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- 规格 start [[-->
                <?php if(empty($goods['flash_sale']) || (($goods['flash_sale'] instanceof \think\Collection || $goods['flash_sale'] instanceof \think\Paginator ) && $goods['flash_sale']->isEmpty())): if(is_array($filter_spec) || $filter_spec instanceof \think\Collection || $filter_spec instanceof \think\Paginator): if( count($filter_spec)==0 ) : echo "" ;else: foreach($filter_spec as $k=>$v): ?>
                        <div class="standard p">
                            <ul>
                                <li class="jaj"><span><?php echo $k; ?>：</span></li>
                                <li class="lawir colo">
                                    <?php if(is_array($v) || $v instanceof \think\Collection || $v instanceof \think\Paginator): if( count($v)==0 ) : echo "" ;else: foreach($v as $k2=>$v2): if($v2[src] != ''): ?>
                                        <input type="radio" style="display: none" rel="<?php echo $v2[item]; ?>" name="goods_spec[<?php echo $k; ?>]" value="<?php echo $v2[item_id]; ?>"  <?php if($k2 == 0): ?>checked="checked"<?php endif; ?>/>
                                        <a   onclick="switch_zooming('<?php echo $v2[src]; ?>');select_filter(this); <?php if(!empty($v2[src])): ?> $('#zoomimg').attr('src','<?php echo $v2[src]; ?>')<?php endif; ?>" <?php if($k2 == 0): ?> class="red"<?php endif; ?>>
                                        <img src="<?php echo $v2[src]; ?>" style="width: 40px;height: 40px;"/>
                                        <span class="dis_alintro"><?php echo $v2[item]; ?></span>
                                        </a>
                                        <?php else: ?>
                                        <input type="radio" style="display: none" rel="<?php echo $v2[item]; ?>" name="goods_spec[<?php echo $k; ?>]" value="<?php echo $v2[item_id]; ?>"  <?php if($k2 == 0): ?>checked="checked"<?php endif; ?>/>
                                        <a   onclick="select_filter(this);" <?php if($k2 == 0): ?> class="red"<?php endif; ?>><?php echo $v2[item]; ?></a>
                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </li>
                            </ul>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
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
                                <input class="buyNum" id="number" type="text" name="goods_num" value="1" onblur="altergoodsnum(0)" max="<?php if(empty($goods['flash_sale']) || (($goods['flash_sale'] instanceof \think\Collection || $goods['flash_sale'] instanceof \think\Paginator ) && $goods['flash_sale']->isEmpty())): ?><?php echo $goods['store_count']; else: ?><?php echo $goods['flash_sale']['goods_num']-$goods['flash_sale']['buy_num']; endif; ?>"/>
                                <a class="add" href="javascript:void(0);" onclick="altergoodsnum(1)">+</a>
                            </div>
                            <div class="sav_shop">剩余库存：<span id="store_count"><?php if(empty($goods['flash_sale']) || (($goods['flash_sale'] instanceof \think\Collection || $goods['flash_sale'] instanceof \think\Paginator ) && $goods['flash_sale']->isEmpty())): ?><?php echo $goods['store_count']-1; else: ?><?php echo $goods['flash_sale']['goods_num']-$goods['flash_sale']['buy_num']-1; endif; ?></span></div>
                        </li>
                    </ul>
                    <script>
                        $('#number').val(1);
                    </script>
                </div>
                <div class="standard p">
                    <input type="hidden" name="goods_id" value="<?php echo $goods['goods_id']; ?>" />
                    <?php if($goods[is_virtual] == 1): ?>
                        <input type="hidden" name="virtual_limit" id="virtual_limit" value="<?php echo $goods['virtual_limit']; ?>"/>
                        <a class="paybybill" href="javascript:;" onclick="virtual_buy();">立即购买</a>
                    <?php elseif($goods['exchange_integral'] > 0): ?>
                        <a id="join_cart_now" class="paybybill" href="javascript:;"  onclick="buyIntegralGoods(<?php echo $goods['goods_id']; ?>,1,1);">立即兑换</a>
                        <a id="no_join_cart_now" class="paybybill" style="display:none;background: #ebebeb;color: #999;cursor: not-allowed">立即兑换</a>
                    <?php else: ?>
                        <a id="join_cart_now" class="paybybill" href="javascript:;" onclick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1,1);">立即购买</a>
                        <a id="join_cart" class="addcar" href="javascript:;" onclick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1,0);"><i class="sk"></i>加入购物车</a>
                        <a id="no_join_cart_now" class="paybybill" style="display:none;background: #ebebeb;color: #999;cursor: not-allowed">立即购买</a>
                        <a id="no_join_cart" class="addcar" style="display:none;background: #ebebeb;color: #999;cursor: not-allowed"><i class="sk"></i>加入购物车</a>
                    <?php endif; ?>
                    <!--<a class="paybybill" href="javascript:;" onclick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1,1);">立即购买</a>-->
                    <!--<a class="addcar" href="javascript:;" onclick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1,0);"><i class="sk"></i>加入购物车</a>-->
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
                            <?php if(is_array($tpshop_config['hot_keywords']) || $tpshop_config['hot_keywords'] instanceof \think\Collection || $tpshop_config['hot_keywords'] instanceof \think\Paginator): if( count($tpshop_config['hot_keywords'])==0 ) : echo "" ;else: foreach($tpshop_config['hot_keywords'] as $k=>$wd): ?>
                                <li><a href="<?php echo U('Home/Goods/search',array('q'=>$wd)); ?>"><?php echo $wd; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="type_more ma-to-20">
                    <div class="type-top">
                        <h2>推荐热卖</h2>
                    </div>
                    <div class="tjhot-shoplist type-bot">
                        <?php
                                   
                                $md5_key = md5("select goods_id,goods_name,shop_price from __PREFIX__goods where is_recommend=1 and is_on_sale = 1 order by goods_id desc limit 10");
                                $result_name = $sql_result_vo = S("sql_".$md5_key);
                                if(empty($sql_result_vo))
                                {                            
                                    $result_name = $sql_result_vo = \think\Db::query("select goods_id,goods_name,shop_price from __PREFIX__goods where is_recommend=1 and is_on_sale = 1 order by goods_id desc limit 10"); 
                                    S("sql_".$md5_key,$sql_result_vo,1);
                                }    
                              foreach($sql_result_vo as $k=>$vo): ?>
                            <div class="alone-shop">
                                <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$vo[goods_id])); ?>"><img src="<?php echo goods_thum_images($vo['goods_id'],206,206); ?>" style="display: inline;"></a>
                                <p class="line-two-hidd"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$vo[goods_id])); ?>"><?php echo getSubstr($vo['goods_name'],0,30); ?></a></p>
                                <p class="price-tag"><span class="li_xfo">￥</span><span><?php echo $vo['shop_price']; ?></span></p>
                                <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="deta-ri-ma">
                <div class="introduceshop">
                    <div class="datail-nav-top">
                        <ul>
                            <li class="red"><a href="javascript:void(0);">商品介绍</a></li>
                            <li><a href="javascript:void(0);">规格及包装</a></li>
                            <li><a href="javascript:void(0);">评价<em>(<?php echo $commentStatistics['c0']; ?>)</em></a></li>
                            <li><a href="javascript:void(0);">售后服务</a></li>
                        </ul>
                    </div>
                    <!--<div class="he-nav"></div>-->
                    <div class="shop-describe shop-con-describe p">
                        <div class="deta-descri">
                            <p class="shopname_de"><span>商品名称：</span><span><?php echo $goods['goods_name']; ?></span></p>
                            <div class="ma-d-uli p">
                                <ul>
                                    <!--<li><span>品牌：</span><span><?php echo $goods['brand_name']; ?></span></li>-->
                                    <li><span>货号：</span><span><?php echo $goods['goods_sn']; ?></span></li>
                                    <?php if(is_array($goods_attr_list) || $goods_attr_list instanceof \think\Collection || $goods_attr_list instanceof \think\Paginator): if( count($goods_attr_list)==0 ) : echo "" ;else: foreach($goods_attr_list as $k=>$v): ?>
                                    <li><span><?php echo $goods_attribute[$v[attr_id]]; ?>：</span><span><?php echo $v[attr_value]; ?></span></li>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>

                            <div class="moreparameter">
                                <!--
                                <a href="">跟多参数<em>>></em></a>
                                -->
                            </div>
                        </div>
                        <div class="detail-img-b">
                            <?php echo htmlspecialchars_decode($goods['goods_content']); ?>
                        </div>
                    </div>
                    <div class="shop-describe shop-con-describe p" style="display: none;">
                        <div class="deta-descri">
                            <!--
                            <p class="shopname_de"><span>如果您发现商品信息不准确，<a class="de_cb" href="">欢迎纠错</a></span></p>
                            -->
                            <h2 class="shopname_de">属性</h2>
                            <?php if(is_array($goods_attr_list) || $goods_attr_list instanceof \think\Collection || $goods_attr_list instanceof \think\Paginator): if( count($goods_attr_list)==0 ) : echo "" ;else: foreach($goods_attr_list as $k=>$v): ?>
                                <div class="twic_a_alon">
                                    <p class="gray_t"><?php echo $goods_attribute[$v[attr_id]]; ?></p>
                                    <p><?php echo $v[attr_value]; ?></p>
                                </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
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
                                    <li class="percen"><span><?php echo $commentStatistics['rate1']; ?>%</span></li>
                                    <li class="co-cen">
                                        <div class="comm_gooba">
                                            <div class="gg_c">
                                                <span class="hps">好评</span>
                                                <span class="hp">（<?php echo $commentStatistics['rate1']; ?>%）</span>
                                                <span class="zz_rg"><i style="width: <?php echo $commentStatistics['rate1']; ?>%;"></i></span>
                                            </div>
                                            <div class="gg_c">
                                                <span class="hps">中评</span>
                                                <span class="hp">（<?php echo $commentStatistics['rate2']; ?>%）</span>
                                                <span class="zz_rg"><i style="width: <?php echo $commentStatistics['rate2']; ?>%;"></i></span>
                                            </div>
                                            <div class="gg_c">
                                                <span class="hps">差评</span>
                                                <span class="hp">（<?php echo $commentStatistics['rate3']; ?>%）</span>
                                                <span class="zz_rg"><i style="width: <?php echo $commentStatistics['rate3']; ?>%;"></i></span>
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
                                            <a class="jfnuv" href="<?php echo U('Home/User/comment'); ?>">发表评论</a>
                                            <!--<p class="xja"><span>详见</span><a class="de_cb" href="">积分规则</a></p>-->
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="deta-descri p">
                                <div class="cte-deta">
                                    <ul id="fy-comment-list">
                                        <li data-t="1" class="red">
                                            <a href="javascript:void(0);" class="selected">全部评论（<?php echo $commentStatistics['c0']; ?>）</a>
                                        </li>
                                        <li data-t="2">
                                            <a href="javascript:void(0);">好评（<?php echo $commentStatistics['c1']; ?>）</a>
                                        </li>
                                        <li data-t="3">
                                            <a href="javascript:void(0);">中评（<?php echo $commentStatistics['c2']; ?>）</a>
                                        </li>
                                        <li data-t="4">
                                            <a href="javascript:void(0);">差评（<?php echo $commentStatistics['c3']; ?>）</a>
                                        </li>
                                        <li data-t="5">
                                            <a href="javascript:void(0);">有图（<?php echo $commentStatistics['c4']; ?>）</a>
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
                    <li class="foot-th">
                        <?php echo $v[cat_name]; ?>
                    </li>
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
                            <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id])); ?>"><?php echo $v2[title]; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </div>
        <div class="QRcode-fr">
            <ul>
                <li class="foot-th">客户端</li>
                <li><img src="__STATIC__/images/qrcode1.jpg"/></li>
            </ul>
            <ul>
                <li class="foot-th">微信</li>
                <li><img src="__STATIC__/images/qrcode2.jpg"/></li>
            </ul>
        </div>
    </div>
    <div class="mod_copyright p">
        <div class="grid-top">
            <?php
                                   
                                $md5_key = md5("select * from `__PREFIX__article` where cat_id = 5 and is_open=1");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from `__PREFIX__article` where cat_id = 5 and is_open=1"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>
                <a href="<?php echo U('Home/Article/detail',array('article_id'=>$v[article_id])); ?>"><?php echo $v[title]; ?></a>
                <span>|</span>
            <?php endforeach; ?>
            <a href="javascript:void (0);">客服热线:<?php echo $tpshop_config['shop_info_phone']; ?></a>
        </div>
        <p>Copyright © 2016-2025 <?php echo (isset($tpshop_config['shop_info_store_name']) && ($tpshop_config['shop_info_store_name'] !== '')?$tpshop_config['shop_info_store_name']:'TPshop商城'); ?> 版权所有 保留一切权利 备案号:<?php echo $tpshop_config['shop_info_record_no']; ?></p>

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
                <?php if($link): ?>
                    <ul>
                        <li class="foot-th">友情链接</li>
                        <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($link) ? array_slice($link,0,6, true) : $link->slice(0,6, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="<?php echo $item['link_url']; ?>" <?php if($item['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $item['link_name']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <?php if(count($link) > 6): ?>
                    <ul>
                        <li class="foot-th">&nbsp;</li>
                        <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($link) ? array_slice($link,6,6, true) : $link->slice(6,6, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="<?php echo $item['link_url']; ?>" <?php if($item['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $item['link_name']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <?php endif; endif; 
                                   
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
                        <li class="foot-th">
                            <?php echo $v[cat_name]; ?>
                        </li>
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
                <ul class="foot-con continue">
                    <li class="foot-th">联系我们</dt>
                    <li>
                        <span class="cellphone_con"><?php echo $tpshop_config['shop_info_phone']; ?></span>
                        <span class="time_con">周一至周日8:00-18:00</span>
                        <span class="cost_con">（仅收市话费）</span>
                        <a class="software_con" href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq2']; ?>&amp;Site=肽风尚商城&amp;Menu=yes" target="_blank">
                            <img src="__STATIC__/images/continue.png"/>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mod_copyright p">
            <p>Copyright © 2016-2025 <?php echo (isset($tpshop_config['shop_info_store_name']) && ($tpshop_config['shop_info_store_name'] !== '')?$tpshop_config['shop_info_store_name']:'肽风尚商城'); ?> 版权所有 保留一切权利 备案号:<?php echo $tpshop_config['shop_info_record_no']; ?></p>
        
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
                <a href="<?php echo U('Home/User/index'); ?>">
                    <i class="share-side share-side1"></i>
                    <i class="share-side tab-icon-tip triangleshow"></i>
                </a>

                <div class="dl_login">
                    <div class="hinihdk">
                        <img src="__STATIC__/images/dl.png"/>

                        <p class="loginafter nologin"><span>你好，请先</span><a href="<?php echo U('Home/user/login'); ?>">登录！</a></p>
                        <!--未登录-e--->
                        <!--登录后-s--->
                        <p class="loginafter islogin">
                            <span class="id_jq userinfo">陈xxxxxxx</span>
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="<?php echo U('Home/user/logout'); ?>" title="点击退出">退出！</a>
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
                <a href="<?php echo U('Home/User/message_notice'); ?>" target="_blank">
                    <i class="share-side share-side1"></i>
                    <!--<i class="share-side tab-icon-tip"></i>-->
                    <span class="tab-tip">消息</span>
                </a>
            </div>
        </div>
        <div class="sider-top-stra sider-midd-2">
            <div class="icon-tabe-chan mmm">
                <a href="<?php echo U('Home/User/goods_collect'); ?>" target="_blank">
                    <i class="share-side share-side1"></i>
                    <!--<i class="share-side tab-icon-tip"></i>-->
                    <span class="tab-tip">收藏</span>
                </a>
            </div>
            <div class="icon-tabe-chan hostry">
                <a href="<?php echo U('Home/User/visit_log'); ?>" target="_blank">
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
            <a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq2']; ?>&amp;Site=肽风尚商城&amp;Menu=yes" target="_blank">
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
                    <img src="__STATIC__/images/qrcode2.jpg"/>
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
<script src="__STATIC__/js/common.js"></script>
    </div>
<!--看了又看-s-->
<div style="display: none" id="look_see">
    <?php if(is_array($look_see) || $look_see instanceof \think\Collection || $look_see instanceof \think\Paginator): if( count($look_see)==0 ) : echo "" ;else: foreach($look_see as $k=>$look): ?>
    <div class="tjhot-shoplist type-bot">
        <div class="alone-shop">
            <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$look[goods_id])); ?>"><img class="wiahides" src="<?php echo goods_thum_images($look['goods_id'],206,206); ?>" style="display: inline;"></a>
            <p class="shop_name2">
                <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$look[goods_id])); ?>"><?php echo $look['goods_name']; ?></a>
            </p>
            <p class="price-tag">
                <span class="li_xfo">￥</span><span><?php echo $look['shop_price']; ?></span>
            </p>
        </div>
    </div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<!--看了又看-s-->
</div>
    <!--footer-e-->
    <script src="__STATIC__/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
    <!--<script src="__STATIC__/js/popt.js" type="text/javascript" charset="utf-8"></script>-->
    <!--------收货地址，物流运费-开始-------------->
    <script src="__STATIC__/js/location.js"></script>
    <!--------收货地址，物流运费--结束-------------->
    <script type="text/javascript" src="__STATIC__/js/headerfooter.js" ></script>
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

        var store_count = <?php echo $goods['store_count']; ?>; // 商品起始库存
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
            var goods_price = <?php echo $goods['shop_price']; ?>; // 商品起始价
            var store_count = <?php echo $goods['store_count']; ?>; // 商品起始库存
            var spec_goods_price = <?php echo $spec_goods_price; ?>;  // 规格 对应 价格 库存表   //alert(spec_goods_price['28_100']['price']);
            // 优先显示抢购活动库存
            <?php if(!(empty($goods['flash_sale']) || (($goods['flash_sale'] instanceof \think\Collection || $goods['flash_sale'] instanceof \think\Paginator ) && $goods['flash_sale']->isEmpty()))): ?>
                store_count = <?php echo $goods['flash_sale']['goods_num'] - $goods['flash_sale']['buy_num'] - 1; ?>;
                var flash_sale_price = parseFloat("<?php echo $goods['flash_sale']['price']; ?>");
                (flash_sale_price > 0) && (goods_price = flash_sale_price);
                spec_goods_price = null;
            <?php endif; ?>
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
                    url:"<?php echo U('Home/Goods/collect_goods'); ?>",
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
                url:"/index.php?m=Home&c=goods&a=ajaxComment&goods_id=<?php echo $goods['goods_id']; ?>&commentType="+commentType+"&p="+page,//+tab,
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
</html>