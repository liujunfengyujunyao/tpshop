<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:42:"./template/pc/rainbow/goods\goodsList.html";i:1512439865;s:40:"./template/pc/rainbow/public\header.html";i:1512439865;s:44:"./template/pc/rainbow/public\new-footer.html";i:1512439865;s:46:"./template/pc/rainbow/public\sidebar_cart.html";i:1512439865;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>商品列表</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
	<script src="__STATIC__/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="__PUBLIC__/js/layer/layer-min.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
	<script src="__PUBLIC__/js/pc_common.js"></script>
	<link rel="stylesheet" href="__STATIC__/css/location.css" type="text/css">
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
                                                    <?php $pid =14;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1513044000 and end_time > 1513044000 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select();
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
                                        <?php $pid =51;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1513044000 and end_time > 1513044000 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select();
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
<div class="search-box p">
	<div class="w1430">
		<div class="search-path fl">
			<a href="<?php echo U('Home/Goods/goodsList',array('id'=>$cat_id)); ?>">全部商品</a>
			<i class="litt-xyb"></i>
			<?php if($goodsCate['parent_id'] == 0): ?>
				<a href="<?php echo U('Home/Goods/goodsList',array('id'=>$goodsCate['id'])); ?>"><?php echo $goodsCate['parent_name']; ?></a>
				<?php else: ?>
				<a href="<?php echo U('Home/Goods/goodsList',array('id'=>$goodsCate['parent_id'])); ?>"><?php echo $goodsCate['parent_name']; ?></a>
			<?php endif; ?>
			<i class="litt-xyb"></i>
			<!--如果当前分类是三级分类 则二级也要显示-->
			<?php if($goodsCate[level] == 3): ?>
				<div class="havedox">
					<div class="disenk"><span><?php echo $goods_category[$goodsCate[parent_id]][name]; ?></span><i class="litt-xxd"></i></div>
					<div class="hovshz">
						<ul>
							<?php if(is_array($goods_category) || $goods_category instanceof \think\Collection || $goods_category instanceof \think\Paginator): if( count($goods_category)==0 ) : echo "" ;else: foreach($goods_category as $k=>$v): if(($v[parent_id] == $goods_category[$goodsCate[parent_id]][parent_id])): ?>
									<li><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v['id'])); ?>"><?php echo $v[name]; ?></a></li>
								<?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>
				<i class="litt-xyb"></i>
			<?php endif; ?>
			<!--如果当前分类是三级分类 则二级也要显示-->
			<?php if($goodsCate[level] == 2): ?>
				<div class="havedox">
					<div class="disenk"><span><?php echo $goodsCate['name']; ?></span><i class="litt-xxd"></i></div>
					<div class="hovshz">
						<ul>
							<?php if(is_array($goods_category) || $goods_category instanceof \think\Collection || $goods_category instanceof \think\Paginator): if( count($goods_category)==0 ) : echo "" ;else: foreach($goods_category as $k=>$v): if(($v[parent_id] == $goodsCate[parent_id])): ?>
									<li><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v['id'])); ?>"><?php echo $v[name]; ?></a></li>
								<?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>
				<i class="litt-xyb"></i>
			<?php endif; ?>
			<!--当前分类-->
			<?php if($goodsCate[level] == 1): ?>
				<div class="havedox">
					<div class="disenk"><span><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$goodsCate['id'])); ?>"><?php echo $goodsCate['name']; ?></a></span><i class="litt-xxd"></i></div>
					<div class="hovshz">
						<ul>
							<?php if(is_array($cateArr) || $cateArr instanceof \think\Collection || $cateArr instanceof \think\Paginator): if( count($cateArr)==0 ) : echo "" ;else: foreach($cateArr as $k=>$v): ?>
								<li><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v['id'])); ?>"><?php echo $v[name]; ?></a></li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>
				<i class="litt-xyb"></i>
			<?php endif; ?>
		</div>
		<?php if(is_array($filter_menu) || $filter_menu instanceof \think\Collection || $filter_menu instanceof \think\Paginator): if( count($filter_menu)==0 ) : echo "" ;else: foreach($filter_menu as $k=>$v): ?> 
		    <a title="<?php echo $v['text']; ?>" href="<?php echo $v['href']; ?>" class="u-av-label"><?php echo $v['text']; ?><i>x</i></a>
	    <?php endforeach; endif; else: echo "" ;endif; ?>
		<div class="search-clear fr">
			<span><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$cat_id)); ?>">清空筛选条件</a></span>
		</div>
	</div>
</div>
<!-- 筛选 start -->
<div class="search-opt troblect">
    <div class="w1430">
        <div class="opt-list">
            <!-- 品牌筛选 start -->
            <?php if($filter_brand != null): ?>
                <dl class="brand-section m-tr">
                    <dt>品牌</dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-box brand-list">
                                <div class="clearfix p">
                                    <?php if(is_array($filter_brand) || $filter_brand instanceof \think\Collection || $filter_brand instanceof \think\Paginator): if( count($filter_brand)==0 ) : echo "" ;else: foreach($filter_brand as $k=>$v): ?>
                                        <a href="<?php echo $v[href]; ?>" data-href="<?php echo $v[href]; ?>"  data-key='brand' data-val='<?php echo $v[id]; ?>'>
                                            <i class="litt-zd"></i>
                                            <img src="<?php echo $v[logo]; ?>"/>
                                            <span>品牌-<?php echo $v[name]; ?></span>
                                        </a>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <div class="surclofix p">
                                    <a href="javascript:;" class="u-confirm" onClick="submitMoreFilter('brand',this);">确定</a>
                                    <a href="javascript:;" class="u-cancel">取消</a>
                                </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <a href="javascript:void(0)"><span class="dx_choice">多选</span><i class="litt-pluscr"></i></a>
                            <?php if(count($filter_brand) > 10): ?>
                                <a href="javascript:void(0)"><span class="gd_more">更多</span><i class="litt-tcr"></i></a>
                            <?php endif; ?>
                        </div>
                    </dd>
                </dl>
            <?php endif; ?>
            <!-- 品牌筛选 end -->
            <!-- 规格筛选 start -->
            <?php if(is_array($filter_spec) || $filter_spec instanceof \think\Collection || $filter_spec instanceof \think\Paginator): if( count($filter_spec)==0 ) : echo "" ;else: foreach($filter_spec as $k=>$v): if(!empty($v['name'])): ?>
                    <dl class="brand-section m-tr">
                        <dt><?php echo $v['name']; ?></dt>
                        <dd class="ri-section">
                            <div class="lf-list">
                                <div class="brand-list">
                                    <div class="clearfix p">
                                        <?php if(is_array($v[item]) || $v[item] instanceof \think\Collection || $v[item] instanceof \think\Paginator): if( count($v[item])==0 ) : echo "" ;else: foreach($v[item] as $k2=>$v2): ?>
                                            <a href="<?php echo $v2[href]; ?>" data-href="<?php echo $v2[href]; ?>" data-key='<?php echo $v2[key]; ?>' data-val='<?php echo $v2[val]; ?>'>
                                                <input class="shaix_la" type="checkbox" style="display: none"/>
                                                <span><?php echo $v2[item]; ?></span>
                                            </a>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                    <div class="surclofix p">
                                        <a href="javascript:;" class="u-confirm" onClick="submitMoreFilter('spec',this);">确定</a>
                                        <a href="javascript:;" class="u-cancel">取消</a>
                                    </div>
                                </div>
                            </div>
                            <div class="lr-more">
                                <a href="javascript:void(0)"><span class="dx_choice">多选</span><i class="litt-pluscr"></i></a>
                                <?php if(count($v['item']) > 11): ?>
                                    <a href="javascript:void(0)"><span class="gd_more">更多</span><i class="litt-tcr"></i></a>
                                <?php endif; ?>
                            </div>
                        </dd>
                    </dl>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <!-- 规格筛选 end -->
            <!-- 属性筛选 start -->
            <?php if(is_array($filter_attr) || $filter_attr instanceof \think\Collection || $filter_attr instanceof \think\Paginator): if( count($filter_attr)==0 ) : echo "" ;else: foreach($filter_attr as $k=>$v): ?>
                <dl class="brand-section m-tr">
                    <dt><?php echo $v['attr_name']; ?></dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-list">
                                <div class="clearfix p">
                                    <?php if(is_array($v[attr_value]) || $v[attr_value] instanceof \think\Collection || $v[attr_value] instanceof \think\Paginator): if( count($v[attr_value])==0 ) : echo "" ;else: foreach($v[attr_value] as $k2=>$v2): ?>
                                        <a href="<?php echo $v2[href]; ?>" data-href="<?php echo $v2[href]; ?>" data-val='<?php echo $v2[val]; ?>' data-key='<?php echo $v2[key]; ?>'>
                                            <input class="shaix_la" type="checkbox" style="display: none"/>
                                            <span ><?php echo $v2[attr_value]; ?></span>
                                        </a>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <div class="surclofix p">
                                    <a href="javascript:;" class="u-confirm"  onClick="submitMoreFilter('attr',this);">确定</a>
                                    <a href="javascript:;" class="u-cancel">取消</a>
                                </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <a href="javascript:void(0)"><span class="dx_choice">多选</span><i class="litt-pluscr"></i></a>
                            <?php if(count($v['attr_value']) > 11): ?>
                                <a href="javascript:void(0)"><span class="gd_more">更多</span><i class="litt-tcr"></i></a>
                            <?php endif; ?>
                        </div>
                    </dd>
                </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <!-- 属性筛选 end -->
            <!-- 价格筛选 start -->
            <?php if($filter_price != null): ?>
                <dl class="brand-section m-tr">
                    <dt>价格</dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-list">
                                <div class="clearfix p">
                                    <?php if(is_array($filter_price) || $filter_price instanceof \think\Collection || $filter_price instanceof \think\Paginator): if( count($filter_price)==0 ) : echo "" ;else: foreach($filter_price as $k=>$v): ?>
                                        <a href="<?php echo $v[href]; ?>">
                                            <span><?php echo $v[value]; ?></span>
                                        </a>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <!--<a href="javascript:void(0)"><span class="dx_choice">多选</span><i class="litt-pluscr"></i></a>-->
                            <!--<a href="javascript:void(0)"><span class="gd_more">更多</span><i class="litt-tcr"></i></a>-->
                            <!--填写筛选价格区间-s-->
                            <form action="<?php echo urldecode(U('/Home/Goods/goodsList',$filter_param,''));?>" method="post" id="price_form">
                                <input type="text" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" name="start_price" id="start_price" value=""/>
                                <span>-</span>
                                <input type="text" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onkeyup="this.value=this.value.replace(/[^\d]/g,'')"  name="end_price" id="end_price" value=""/>
                                <input type="submit" value="确定" onClick="if($('#start_price').val() !='' && $('#end_price').val() !='' ) $('#price_form').submit();"/>
                            </form>
                            <!--填写筛选价格区间-e-->
                        </div>
                    </dd>
                </dl>
            <?php endif; ?>
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
                <?php
                                   
                                $md5_key = md5("select goods_id,goods_name,shop_price from `__PREFIX__goods` where  is_recommend = 1 and is_on_sale = 1 limit 5");
                                $result_name = $sql_result_vo = S("sql_".$md5_key);
                                if(empty($sql_result_vo))
                                {                            
                                    $result_name = $sql_result_vo = \think\Db::query("select goods_id,goods_name,shop_price from `__PREFIX__goods` where  is_recommend = 1 and is_on_sale = 1 limit 5"); 
                                    S("sql_".$md5_key,$sql_result_vo,1);
                                }    
                              foreach($sql_result_vo as $k=>$vo): ?>
                    <div class="alone-shop">
                        <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$vo['goods_id'])); ?>"><img class="lazy" data-original="<?php echo goods_thum_images($vo['goods_id'],180,180); ?>"/></a>
                        <p class="line-two-hidd"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$vo['goods_id'])); ?>"><?php echo $vo['goods_name']; ?></a></p>
                        <p class="price-tag"><span class="li_xfo">￥</span><span><?php echo $vo['shop_price']; ?></span></p>
                        <p class="store-alone"><a href="<?php echo U('Home/Store/index',array('id'=>$vo['store_id'])); ?>"><?php echo $vo['store_name']; ?></a></p>
                    </div>
                <?php endforeach; ?>
			</div>
		</div>
		<div class="stsho fr">
			<div class="sx_topb ba-dark-bg">
				<div class="f-sort fl">
					<ul>
						<li class="<?php if(\think\Request::instance()->param('sort') == ''): ?>red<?php endif; ?>">
                            <a href="<?php echo urldecode(U("/Home/Goods/goodsList",$filter_param,''));?>">综合</a>
                        </li>
						<li class="<?php if(\think\Request::instance()->param('sort') == 'sales_sum'): ?>red<?php endif; ?>">
                            <a href="<?php echo urldecode(U("/Home/Goods/goodsList",array_merge($filter_param,array('sort'=>'sales_sum')),''));?>">销量</a>
                        </li>
						<?php if(\think\Request::instance()->param('sort_asc') == 'desc'): ?>
							<li class="<?php if(\think\Request::instance()->param('sort') == 'shop_price'): ?>red<?php endif; ?>">
                                <a href="<?php echo urldecode(U("/Home/Goods/goodsList",array_merge($filter_param,array('sort'=>'shop_price','sort_asc'=>'asc')),''));?>">价格<i class="litt-zzx1"></i></a>
                            </li>
						<?php else: ?>
							<li class="<?php if(\think\Request::instance()->param('sort') == 'shop_price'): ?>red<?php endif; ?>">
                                <a href="<?php echo urldecode(U("/Home/Goods/goodsList",array_merge($filter_param,array('sort'=>'shop_price','sort_asc'=>'desc')),''));?>">价格<i class="litt-zzx1"></i></a>
                            </li>
						<?php endif; ?>
						<li class="<?php if(\think\Request::instance()->param('sort') == 'comment_count'): ?>red<?php endif; ?>">
                            <a href="<?php echo urldecode(U("/Home/Goods/goodsList",array_merge($filter_param,array('sort'=>'comment_count')),''));?>">评论</a>
                        </li>
						<li class="<?php if(\think\Request::instance()->param('sort') == 'is_new'): ?>red<?php endif; ?>">
                            <a href="<?php echo urldecode(U("/Home/Goods/goodsList",array_merge($filter_param,array('sort'=>'is_new')),''));?>">新品</a>
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
					<?php $nowPage = $page->nowPage;$totalPages = $page->totalPages; ?>
					<div class="all-sec">共<span><?php echo $page->totalRows; ?></span>个商品<?php echo $var; ?></div>
					<div class="all-fy">
						<a <?php if($nowPage > 1): ?>href="<?php echo U('Home/Goods/goodsList',array_merge($filter_param,array('p'=>$nowPage-1))); ?>" <?php endif; ?>>&lt;</a>
							<p class="fy-y"><span class="z-cur"><?php echo $nowPage; ?></span>/<span><?php echo $totalPages; ?></span></p>
						<a <?php if(($nowPage+1) < $totalPages): ?>href="<?php echo U('Home/Goods/goodsList',array_merge($filter_param,array('p'=>$nowPage+1))); ?>" <?php endif; ?>>&gt;</a>
					</div>
				</div>
			</div>
			<div class="shop-list-splb p">
				<ul>
                    <?php if(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty())): ?>
                        <p class="ncyekjl" style="font-size: 16px;margin:100px auto;text-align: center;">-- 抱歉没找到您要搜索的商品，换个条件试试！--</p>
                    <?php else: if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $k=>$v): ?>
                            <li>
                                <div class="s_xsall">
                                    <div class="xs_img">
                                        <a href="<?php echo U('/Home/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>">
                                            <img class="lazy-list" data-original="<?php echo goods_thum_images($v['goods_id'],236,236); ?>"/>
                                        </a>
                                    </div>
                                    <div class="xs_slide">
                                        <div class="small-xs-shop">
                                            <ul>
                                                <?php if(is_array($goods_images) || $goods_images instanceof \think\Collection || $goods_images instanceof \think\Paginator): if( count($goods_images)==0 ) : echo "" ;else: foreach($goods_images as $k2=>$v2): if($v2[goods_id] == $v[goods_id]): ?>
                                                        <li>
                                                            <a href="javascript:void(0);">
                                                                <img class="lazy-list" data-original="<?php echo $v2[image_url]; ?>"/>
                                                            </a>
                                                        </li>
                                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price-tag">
                                        <span class="now"><em class="li_xfo">￥</em><em><?php echo $v[shop_price]; ?></em></span>
                                        <span class="old"><em>￥</em><em><?php echo $v[market_price]; ?></em></span>
                                    </div>
                                    <div class="shop_name2">
                                        <a href="<?php echo U('/Home/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>">
                                            <?php echo $v[goods_name]; ?>
                                        </a>
                                    </div>
                                    <div class="shop_name2">
                                        <a class="co_hchh" href="<?php echo U('/Home/Store/index',array('id'=>$v[store_id])); ?>">
                                            <?php echo $v[store_name]; ?>
                                        </a>
                                    </div>
                                    <div class="J_btn_statu">
                                        <div class="p-num">
                                            <input class="J_input_val" id="number_<?php echo $v['goods_id']; ?>" type="text" value="1">
                                            <p class="act">
                                                <a href="javascript:void(0);" onClick="goods_add(<?php echo $v['goods_id']; ?>);" class="litt-zzyl1"></a>
                                                <a href="javascript:void(0);" onClick="goods_cut(<?php echo $v['goods_id']; ?>);"  class="litt-zzyl2"></a>
                                            </p>
                                        </div>
                                        <div class="p-btn">
                                            <a href="javascript:void(0);" onclick="AjaxAddCart(<?php echo $v[goods_id]; ?>,$('#number_'+<?php echo $v['goods_id']; ?>).val(),0);">加入购物车</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>

				</ul>
			</div>
			<div class="page p">
				<?php echo $page->show(); ?>
			</div>
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
		                <?php endif; 
                                   
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
		                <?php endforeach; ?>
		            </ul>
		        <?php endforeach; ?>
		        <ul class="foot-con continue">
                    <li class="foot-th">联系我们</dt>
                    <li>
                        <span class="cellphone_con"><?php echo $tpshop_config['shop_info_phone']; ?></span>
                        <span class="time_con">周一至周日8:00-18:00</span>
                        <span class="cost_con">（仅收市话费）</span>
                        <a class="software_con" href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq2']; ?>&amp;Site=<?php echo $tpshop_config['shop_info_store_name']; ?>&amp;Menu=yes" target="_blank">
                            <img src="__STATIC__/images/continue.png"/>
                        </a>
                    </li>
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
		        <!-- <a href="javascript:void (0);">客服热线:<?php echo $tpshop_config['shop_info_phone']; ?></a> -->
		    </div>
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
                    <li><img src="__STATIC__/images/qrcode.png"/></li>
                </ul>
                <ul>
                    <li class="foot-th">微信</li>
                    <li><img src="__STATIC__/images/qrcode.png"/></li>
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
<script src="__STATIC__/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
<script src="__STATIC__/js/popt.js" type="text/javascript" charset="utf-8"></script>
<script src="__STATIC__/js/headerfooter.js" type="text/javascript" charset="utf-8"></script>
<script src="__STATIC__/js/location.js"></script>
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
get_parment = <?php echo json_encode($_GET); ?>;
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
</html>