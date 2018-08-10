<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:38:"./template/pc/tfs/goods\goodsList.html";i:1512105133;s:36:"./template/pc/tfs/public\header.html";i:1513580608;s:36:"./template/pc/tfs/public\footer.html";i:1512208253;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>商品列表</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <link href="__STATIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="__STATIC__/css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="__STATIC__/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script type="text/javascript" src="__STATIC__/js/common.js"></script>
    <script src="__STATIC__/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $tpshop_config['shop_info_store_logo']; ?>" media="screen"/>
</head>
<body>
<!--header-s-->
<div id="shortcut">
	<div class="w">
		<ul class="fr">
			<li class="fore1" id="ttbar-login">欢迎进入肽风尚商城，</li>
			<li class="fore1 nologin" id="ttbar-login">
				<a href="<?php echo U('Home/user/login'); ?>" class="link-login style-red">请登录</a>&nbsp;&nbsp;<a href="<?php echo U('Home/user/reg'); ?>" class="link-regist">免费注册</a>
			</li>
			<li class="fore1 islogin">
				<a class="style-red userinfo" href="<?php echo U('Home/user/index'); ?>" ></a>&nbsp;&nbsp;
				<a  href="<?php echo U('Home/user/logout'); ?>"  title="退出" target="_self">安全退出</a>
			</li>
			<li class="kong-a"></li>
			<li class="spacer"></li>
			<li class="fore2">
				<div class="dt"><a href="<?php echo U('Home/Order/order_list'); ?>">我的订单</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore4">
				<div class="dt"><a href="<?php echo U('Home/User/visit_log'); ?>">我的浏览</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore4">
				<div class="dt"><a href="<?php echo U('Home/User/coupon'); ?>">我的优惠券</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore5">
				<div class="dt"><a href="<?php echo U('Home/User/goods_collect'); ?>">我的收藏</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore4">
				<div class="dt"><a href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq2']; ?>&amp;Site=<?php echo $tpshop_config['shop_info_store_name']; ?>&amp;Menu=yes">在线客服</a></div>
			</li>
			<li class="spacer"></li>
			<li class="fore9 dorpdown" id="ttbar-navs">
				<div class="dt cw-icon">网站导航<i class="iconfont">&#xe605;</i><i class="ci-right"><s>◇</s></i></div>
				<div class="dd dorpdown-layer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Activity/group_list'); ?>">团购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Activity/flash_sale_list'); ?>">抢购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Article/detail'); ?>">帮助中心</a></div>
			</li>
		</ul>
	</div>
</div>
<!--header start-->
<div id="header">
	<div class="w">
		<div id="logo" class="logo">
			<h1 class="logo_tit"><a href="__ROOT__" class="logo_tit_lk">肽风尚</a></h1>
		</div>

		<div id="search">
			<div class="search-m">
				<div class="form">
				<form id="searchForm" name="" method="get" action="<?php echo U('Home/Goods/search'); ?>" class="ecsc-search-form">
					<input name="q" type="text" autocomplete="off" id="key" accesskey="s" class="text" value="<?php echo \think\Request::instance()->param('q'); ?>" placeholder="请输入搜索关键字"/>
					<button type="submit" class="button"><i class="iconfont"><img src="__STATIC__/images/search.png" /></i></button>
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
				</div>
			</div>

		</div>

		<div id="settleup">
			<div class="cw-icon">
				<i class="iconfont">&#xe607;</i>
				<a href="<?php echo U('Home/Cart/cart'); ?>">我的购物车<b>&nbsp;&nbsp;<span>(<em class="sc_z" id="cart_quantity"></em>)</span></b></a>
			</div>
		</div>

		<div id="hotwords">
			<ul class="tfsclassify">
				<?php if(is_array($tpshop_config['hot_keywords']) || $tpshop_config['hot_keywords'] instanceof \think\Collection || $tpshop_config['hot_keywords'] instanceof \think\Paginator): if( count($tpshop_config['hot_keywords'])==0 ) : echo "" ;else: foreach($tpshop_config['hot_keywords'] as $k=>$wd): ?>
					<li><a href="<?php echo U('Home/Goods/search',array('q'=>$wd)); ?>" target="_blank"><?php echo $wd; ?></a></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>

		<!-- navitems start -->
		<div id="navitems">
			<ul id="navitems-group1">
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
		</div>
		<!-- navitems end -->
	</div>
</div>
<!--header-e-->
<div id="tfs-hu">
    <div class="container tfs-screen">
        <div class="row screen">
            <?php $pid =406;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1513760400 and end_time > 1513760400 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select();
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
                <a href="<?php echo $v['ad_link']; ?>"><img src="<?php echo $v['ad_code']; ?>" width="100%"/></a>
            <?php endforeach; ?>
            <div class="seat">
                <span class="float"> 全部结果 > </span>
                <?php if($goodsCate['parent_id'] == 0): ?>
                    <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$goodsCate['id'])); ?>" class="float"><?php echo $goodsCate['parent_name']; ?></a>
                <?php else: ?>
                    <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$goodsCate['parent_id'])); ?>" class="float"><?php echo $goodsCate['parent_name']; ?></a>
                <?php endif; ?>
                <!--如果当前分类是三级分类 则二级也要显示-->
                <?php if($goodsCate[level] == 2): ?>
                    <span class="float"> > </span>
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
                <?php endif; ?>
                <!--当前分类-->
                <?php if($goodsCate[level] == 1 && $cateArr != null): ?>
                    <span class="float"> > </span>
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
                <?php endif; if($filter_menu != null): ?>
                    <span class="float"> > </span>
                    <?php if(is_array($filter_menu) || $filter_menu instanceof \think\Collection || $filter_menu instanceof \think\Paginator): if( count($filter_menu)==0 ) : echo "" ;else: foreach($filter_menu as $k=>$v): ?>
                        <a title="<?php echo $v['text']; ?>" href="<?php echo $v['href']; ?>" class="u-av-label"><b><?php echo $v['text']; ?></b><i></i></a>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                <div class="clear"></div>
            </div>
            <!-- 品牌筛选 start -->
            <?php if($filter_brand != null): ?>
            <p class="brand">品牌：
                <?php if(is_array($filter_brand) || $filter_brand instanceof \think\Collection || $filter_brand instanceof \think\Paginator): if( count($filter_brand)==0 ) : echo "" ;else: foreach($filter_brand as $k=>$v): ?>
                    <a href="<?php echo $v[href]; ?>" data-href="<?php echo $v[href]; ?>"  data-key='brand' data-val='<?php echo $v[id]; ?>'>
                        <span><?php echo $v[name]; ?></span>
                    </a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
            <?php endif; ?>
            <!-- 品牌筛选 end -->
            <!-- 价格筛选 start -->
            <?php if($filter_price != null): ?>
            <ul class="Price">
                <li>价格 :</li>
                <?php if(is_array($filter_price) || $filter_price instanceof \think\Collection || $filter_price instanceof \think\Paginator): if( count($filter_price)==0 ) : echo "" ;else: foreach($filter_price as $k=>$v): ?>
                    <li><a href="<?php echo $v[href]; ?>"><?php echo $v[value]; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endif; ?>
            <!-- 价格筛选 end -->
            <div class="clear"></div>
            <!-- 规格筛选 start -->
            <?php if(is_array($filter_spec) || $filter_spec instanceof \think\Collection || $filter_spec instanceof \think\Paginator): if( count($filter_spec)==0 ) : echo "" ;else: foreach($filter_spec as $k=>$v): if(!empty($v['name'])): ?>
                    <ul class="Price">
                        <li><?php echo $v['name']; ?></li>
                        <?php if(is_array($v[item]) || $v[item] instanceof \think\Collection || $v[item] instanceof \think\Paginator): if( count($v[item])==0 ) : echo "" ;else: foreach($v[item] as $k2=>$v2): ?>
                            <li><a href="<?php echo $v2[href]; ?>" data-href="<?php echo $v2[href]; ?>" data-key='<?php echo $v2[key]; ?>' data-val='<?php echo $v2[val]; ?>'><?php echo $v2[item]; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div class="clear"></div>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <!-- 规格筛选 end -->
            <!-- 属性筛选 start -->
            <?php if(is_array($filter_attr) || $filter_attr instanceof \think\Collection || $filter_attr instanceof \think\Paginator): if( count($filter_attr)==0 ) : echo "" ;else: foreach($filter_attr as $k=>$v): ?>
                <ul class="Price">
                    <li><?php echo $v['attr_name']; ?>：</li>
                    <?php if(is_array($v[attr_value]) || $v[attr_value] instanceof \think\Collection || $v[attr_value] instanceof \think\Paginator): if( count($v[attr_value])==0 ) : echo "" ;else: foreach($v[attr_value] as $k2=>$v2): ?>
                        <li><a href="<?php echo $v2[href]; ?>" data-href="<?php echo $v2[href]; ?>" data-val='<?php echo $v2[val]; ?>' data-key='<?php echo $v2[key]; ?>'><?php echo $v2[attr_value]; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="clear"></div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <!-- 属性筛选 end -->
        </div>
        <div class="clear"></div>
        <div class="container">
            <div class="row volume">
                <div class="col-xs-10">
                    <ul>
                        <li>
                            <a href="<?php echo urldecode(U("/Home/Goods/goodsList",$filter_param,''));?>" <?php if(\think\Request::instance()->param('sort') == ''): ?>class="current"<?php endif; ?>>综合</a>
                        </li>
                        <li>
                            <a href="<?php echo urldecode(U("/Home/Goods/goodsList",array_merge($filter_param,array('sort'=>'sales_sum')),''));?>" <?php if(\think\Request::instance()->param('sort') == 'sales_sum'): ?>class="current"<?php endif; ?>>销量</a>
                        </li>
                        <?php if(\think\Request::instance()->param('sort_asc') == 'desc'): ?>
                            <li>
                                <a href="<?php echo urldecode(U("/Home/Goods/goodsList",array_merge($filter_param,array('sort'=>'shop_price','sort_asc'=>'asc')),''));?>" <?php if(\think\Request::instance()->param('sort') == 'shop_price'): ?>class="current"<?php endif; ?>>价格<i class="glyphicon glyphicon-chevron-up"></i></a>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo urldecode(U("/Home/Goods/goodsList",array_merge($filter_param,array('sort'=>'shop_price','sort_asc'=>'desc')),''));?>" <?php if(\think\Request::instance()->param('sort') == 'shop_price'): ?>class="current"<?php endif; ?>">价格<i class="glyphicon glyphicon-chevron-down"></i></a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo urldecode(U("/Home/Goods/goodsList",array_merge($filter_param,array('sort'=>'comment_count')),''));?>" <?php if(\think\Request::instance()->param('sort') == 'comment_count'): ?>class="current"<?php endif; ?>>评论</a>
                        </li>
                        <li>
                            <a href="<?php echo urldecode(U("/Home/Goods/goodsList",array_merge($filter_param,array('sort'=>'is_new')),''));?>" <?php if(\think\Request::instance()->param('sort') == 'is_new'): ?>class="current"<?php endif; ?>>新品</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-2">
                    <?php $nowPage = $page->nowPage;$totalPages = $page->totalPages; ?>
                    <div class="commodity">共<?php echo $page->totalRows; ?>件商品
                        &nbsp;&nbsp;&nbsp;<?php echo $nowPage; ?>/<?php echo $totalPages; ?>&nbsp;&nbsp;&nbsp;
                        <a <?php if($nowPage > 1): ?>href="<?php echo U('Home/Goods/goodsList',array_merge($filter_param,array('p'=>$nowPage-1))); ?>" <?php endif; ?>>&lt;</a>
                        <a <?php if($nowPage < $totalPages): ?>href="<?php echo U('Home/Goods/goodsList',array_merge($filter_param,array('p'=>$nowPage+1))); ?>" <?php endif; ?>>&gt;</a>
                    </div>
                </div>
            </div><!--volume-->
            <div class="row general">
                <?php if($goods_list != null): ?>
                    <div class="tfsgeneral">
                        <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): $k = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 5 );++$k;?>
                            <dl <?php if($k%5 == 1): ?>class='borderLeft'<?php endif; ?>>
                                <dt><a href="<?php echo U('/Home/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>"><img src="<?php echo goods_thum_images($v['goods_id'],140,140); ?>" width="140" height="140" /></a></dt>
                                <dd><a href="<?php echo U('/Home/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>"><?php echo $v[goods_name]; ?></a></dd>
                                <dd class="money">￥<?php echo $v[shop_price]; ?></dd>
                            </dl>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                <?php else: ?>
                    <div class="noGoods">
                        抱歉，没有找到您要搜索的商品！
                    </div>
                <?php endif; ?>
            </div><!--general-->
            <div class="clear"></div>
            <div class="container like">
                <div class="row liketop">
                    <div class="col-xs-11 left">猜你喜欢</div>
                    <div class="col-xs-1 right">
                        <img src="__STATIC__/images/huan.png" /><a href="javascript:void(0)" onclick="favourite();">换一批</a>
                    </div>
                </div>
                <div class="row likedown">
                    <div class="tfsgeneral" id="favourite_goods"></div><!--tfsgeneral-->
                </div>
            </div>

            <?php $pid =405;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1513760400 and end_time > 1513760400 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select();
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
                <div class="row purple">
                    <a href="<?php echo $v['ad_link']; ?>"><img src="<?php echo $v['ad_code']; ?>" width="100%"/></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!--footer-s-->
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
</html>