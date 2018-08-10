<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:46:"./template/pc/rainbow/activity\group_list.html";i:1512439864;s:40:"./template/pc/rainbow/public\header.html";i:1512439865;s:46:"./template/pc/rainbow/public\footer_index.html";i:1512439865;s:46:"./template/pc/rainbow/public\sidebar_cart.html";i:1512439865;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>团购</title>
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
		<script src="__STATIC__/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="__PUBLIC__/js/global.js"></script>
	</head>
	<body>
		<style type="text/css">
			.page .fr{float: none;position: relative;left: 50%;right: 50%;margin-left: -350px;}
			.f-total{margin-top: 10px;}
		</style>
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
		<div class="search-box p" style="padding-bottom: 0">
			<div class="w1224">
				<div class="search-path fl">
					<a href="javascript:void(0);">全部结果</a>
					<i class="litt-xyb"></i>
					<span>团购</span>
				</div>
				<!--<div class="search-clear fr">
					<span><a href="<?php echo U('Home/Activity/group_list'); ?>">清空筛选条件</a></span>
				</div>-->
			</div>
		</div>
        <!--分类-s-->
		<!--<div class="search-opt classify">
			<div class="w1224">
				<div class="opt-list">
					<dl class="brand-section">
						<dt>分类:</dt>
						<dd class="ri-section">
							<div class="lf-list">
								<div class="brand-list">
									<div class="clearfix p">
										<a href="<?php echo U('Home/Activity/group_list'); ?>">
											<span>全部</span>
										</a>
										<?php if(is_array($cat_list) || $cat_list instanceof \think\Collection || $cat_list instanceof \think\Paginator): $i = 0; $__LIST__ = $cat_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
										<a href="<?php echo U('Home/Activity/group_list',array('cat_id'=>$vo['id'])); ?>">
											<span><?php echo $vo['name']; ?></span>
										</a>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</div>
							</div>
						</dd>
					</dl>
				</div>
			</div>
		</div>-->
        <!--分类-e-->
    <!--商品列表-s-->
		<div class="shop-list-tour p">
			<div class="w1224">
				<div class="stsho pre-sts" >
					<!--<div class="sx_topb presellall group-act">-->
                        <!--筛选-s-->
					<!--	<div class="f-sort fl">
							<ul>
								<li <?php if(\think\Request::instance()->get('order') == ''): ?>class="red"<?php endif; ?>><a href="<?php echo U('Home/Activity/group_list'); ?>">默认</a></li>
								<li <?php if(\think\Request::instance()->get('order') == 1): ?>class="red"<?php endif; ?>><a href="<?php echo U('Home/Activity/group_list',array('order'=>1)); ?>">最新</a></li>
								<li <?php if(\think\Request::instance()->get('order') == 2): ?>class="red"<?php endif; ?>><a href="<?php echo U('Home/Activity/group_list',array('order'=>2)); ?>">推荐</a></li>
							</ul>
							<div class="actionname">
								<span>活动名称：</span>
								<input class="text-act" type="text" id="title" value="<?php echo \think\Request::instance()->get('title'); ?>" />
								<input class="sub-act" type="submit" onclick="search();" value="确定"/>
							</div>
						</div>-->
                        <!--筛选-e-->
                        <!--当前分页-s-->
						<!--<div class="f-total fr">
							<?php $nowPage = $pages->nowPage;$totalPages = $pages->totalPages; ?>
							<div class="all-fy">
                                <a <?php if($nowPage > 1): ?>href="<?php echo U('Home/Activity/group_list',array('p'=>$nowPage-1)); ?>" <?php endif; ?>>&lt;</a>
                                <p class="fy-y"><span class="z-cur"><?php echo $nowPage; ?></span>/<span><?php echo $totalPages; ?></span></p>
                                <a <?php if(($nowPage+1) < $totalPages): ?>href="<?php echo U('Home/Activity/group_list',array('p'=>$nowPage+1)); ?>"<?php endif; ?>>&gt;</a>
                            </div>
						</div>-->
                        <!--当前分页-e-->
					<!--</div>-->
					<div class="shop-list-splb pre-set-suma groupcy p">
						<ul>
                            <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
                                <p class="ncyekjl" style="font-size: 16px;margin:100px auto;text-align: center;">--暂无团购商品--</p>
                            <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $k=>$v): ?>
							<li>
								<div class="s_xsall">
									<div class="xs_img">
										<a href="<?php echo U('Home/Activity/group',array('id'=>$v[goods_id])); ?>">
											<img class="lazy-list" data-original="<?php echo goods_thum_images($v['goods_id'],262,262); ?>" />
										</a>
									</div>
									<div class="shop_name2">
										<a href="<?php echo U('Home/Activity/group',array('id'=>$v[goods_id])); ?>">
											<?php echo getSubstr($v[title],0,30); ?>
										</a>
									</div>
									<div class="price-tag">
										<span class="now"><!--<em class="li_xfo">5</em><em>分</em>--></span>
										<span class="pre-per"><em><?php echo $v[virtual_num] + $v[order_num]; ?></em>人已参加</span>
										<div class="gb_nastr p">
											<div class="squetrian">
												<div class="arrow-right">
													<em><?php echo $v[rebate]; ?></em>&nbsp;<span>折</span>
												</div>
											</div>
											<div class="old-new-prices">
												<p class="old"><span>￥</span><span><?php echo $v['goods_price']; ?></span></p>
												<p class="new"><span>￥</span><span><?php echo $v['price']; ?></span></p>
											</div>
										</div>
									</div>
								</div>
								<div class="attendgorb-ocl">
									<span>立即团购<i>></i></span>
								</div>
                            </li>
							<?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</ul>
					</div>
					<div class="page p">
						<div class="operating fixed" id="bottom">
							<div class="fn_page clearfix">
								<?php echo $page; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <!--商品列表-e-->
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
		<!--footer-e-->
		<script src="__STATIC__/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="__STATIC__/js/headerfooter.js" type="text/javascript" charset="utf-8"></script>
		<script src="__STATIC__/js/common.js"></script>
		<script>
			function search()
			{
				var title = $('#title').val();
				if(title == ''){
					layer.msg('请输入订单号', {icon: 2});
				}
				window.location.href='/index.php?m=Home&c=Activity&a=group_list&title='+title;
			}
		</script>
	</body>
</html>