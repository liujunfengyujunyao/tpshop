<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:38:"./template/pc/tfs/goods\goodsInfo.html";i:1519984596;s:36:"./template/pc/tfs/public\header.html";i:1519984596;s:36:"./template/pc/tfs/public\footer.html";i:1519984596;s:42:"./template/pc/tfs/public\sidebar_cart.html";i:1519984596;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>商品详情</title>
	<link href="__STATIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="__STATIC__/css/style.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="__STATIC__/css/jquery.jqzoom.css">
	<script type="text/javascript" src="__STATIC__/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
	<script src="__PUBLIC__/js/pc_common.js"></script>
	<script type="text/javascript" src="__STATIC__/js/common.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $tpshop_config['shop_info_store_logo']; ?>" media="screen"/>
	<script type="text/javascript" src="__STATIC__/js/kxbdSuperMarquee.js"></script>
	<script type="text/javascript" src="__STATIC__/js/jquery.jqzoom.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/layer/layer.js"></script>
	<script src="__STATIC__/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="__STATIC__/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
	<script src="__STATIC__/js/location.js" type="text/javascript"></script>
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
				<div class="dd dorpdown-layer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Activity/group_list'); ?>">团购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Activity/flash_sale_list'); ?>">抢购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Article/detail', array('article_id'=>1415)); ?>">帮助中心</a></div>
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

<div id="goodsInfo">
	<div class="inner_banner">
		<?php $pid =406;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1520211600 and end_time > 1520211600 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select();
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
	</div>

	<div class="inner_nav">
		<p>
			<?php if(is_array($navigate_goods) || $navigate_goods instanceof \think\Collection || $navigate_goods instanceof \think\Paginator): if( count($navigate_goods)==0 ) : echo "" ;else: foreach($navigate_goods as $k=>$v): ?>
				<a href="<?php echo U('/Home/Goods/goodsList',array('id'=>$k)); ?>"><?php echo $v; ?></a>
				<span> > </span>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			<span><?php echo $goods['goods_name']; ?></span>
		</p>
	</div>

	<section>
		<div class="inner_sec">
			<div class="section_left">
				<div class="pic">
					<div id="marquee">
						<ul>
							<?php if(is_array($goods_images_list) || $goods_images_list instanceof \think\Collection || $goods_images_list instanceof \think\Paginator): if( count($goods_images_list)==0 ) : echo "" ;else: foreach($goods_images_list as $k=>$v): ?>
								<li class="jqzoom"><img id="zoomimg" src="<?php echo get_sub_images($v,$v[goods_id], 425, 425); ?>" jqimg="<?php echo get_sub_images($v,$v[goods_id], 600, 600); ?>" width="425" height="425" /></li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<div id="marqueeNav">
						<ul>
							<?php if(is_array($goods_images_list) || $goods_images_list instanceof \think\Collection || $goods_images_list instanceof \think\Paginator): $k = 0;$__LIST__ = is_array($goods_images_list) ? array_slice($goods_images_list,0,4, true) : $goods_images_list->slice(0,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
								<li><img src="<?php echo get_sub_images($v,$v[goods_id], 80, 80); ?>" width="80" height="80" /></li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>
				<div class="detail-ggsl">
					<form id="buy_goods_form" name="buy_goods_form" method="post" >
						<h2><?php echo $goods['goods_name']; ?></h2>
						<h3><?php echo $goods['goods_remark']; ?></h3>

						<!--商品抢购 start-->
						<?php if(!(empty($goods['flash_sale']) || (($goods['flash_sale'] instanceof \think\Collection || $goods['flash_sale'] instanceof \think\Paginator ) && $goods['flash_sale']->isEmpty()))): ?>
							<div class="presale-time">
								<div class="pull-left ys">
									<span><i class="detai-ico"></i>抢购活动</span>
								</div>
								<div class="pull-right ti">
									<span><i class="detai-ico"></i>剩余时间：<span id="surplus_text"></span></span>
								</div>
								<script>
									// 倒计时
									function GetRTime2(){
										var text = GetRTime('<?php echo date("Y/m/d H:i:s",$goods['flash_sale']['end_time']); ?>');
										$("#surplus_text").text(text);
									}
									setInterval(GetRTime2,1000);
								</script>
							</div>
						<?php endif; ?>
						<!--商品抢购  end-->

						<div class="price">
							<?php if($goods['exchange_integral'] > 0): ?>
								<div class="pri_send">
									<span class="pri_l">积&nbsp;&nbsp;&nbsp;分：</span><span class="pri_r"><?php echo $goods['exchange_integral']; ?></span>
								</div>
							<?php else: ?>
								<div class="pri_send">
									<span class="pri_l">市场价：</span><span class="pri_m">￥<?php echo $goods['market_price']; ?></span>
								</div>
								<div class="pri_send">
									<span class="pri_l"><?php if($goods['prom_type'] == 1): ?>优惠价：<?php else: ?>商城价：<?php endif; ?></span><span class="pri_r" id="goods_price">￥<?php if($goods['prom_type'] == 1): ?><?php echo $goods['flash_sale']['price']; else: ?><?php echo $goods['shop_price']; endif; ?></span>
								</div>
							<?php endif; ?>
							<div class="clearfix"></div>
							<?php if($goods['send_id'] != null): ?>
								<div class="pri_send">
									<span class="pri_l">赠&nbsp;&nbsp;&nbsp;品：</span><span><a href="<?php echo U('Home/goods/goodsInfo',array('id'=>$send_goods_info['goods_id'])); ?>"><?php echo $send_goods_info['goods_name']; ?></a></span>
								</div>
							<?php endif; ?>
							<div class="pri_txt">本商品由<?php echo $tpshop_config['shop_info_store_name']; ?>直接发货 并且提供售后服务</div>
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
							<div class="sale_one"><h5>累计销量</h5><h6><?php echo $goods['sales_sum']; ?></h6></div>
							<div class="sale_one"><h5>累计评价</h5><h6><?php echo $goods['comment_count']; ?></h6></div>
							<div class="sale_thr"><h5>赠送积分</h5><h6><span><?php echo $goods['give_integral']; ?></span></h6></div>
						</div>
						<div class="content">
							<!-- 规格 Start -->
							<?php if(empty($goods['flash_sale']) || (($goods['flash_sale'] instanceof \think\Collection || $goods['flash_sale'] instanceof \think\Paginator ) && $goods['flash_sale']->isEmpty())): if(is_array($filter_spec) || $filter_spec instanceof \think\Collection || $filter_spec instanceof \think\Paginator): if( count($filter_spec)==0 ) : echo "" ;else: foreach($filter_spec as $k=>$v): ?>
									<div class="net">
										<span class="net-l"><?php echo $k; ?></span>
										<div class="net-r">
											<ul class="list-inline">
												<?php if(is_array($v) || $v instanceof \think\Collection || $v instanceof \think\Paginator): if( count($v)==0 ) : echo "" ;else: foreach($v as $k2=>$v2): if($v2[src] != ''): else: ?>
														<input type="radio" class="hidden" rel="<?php echo $v2[item]; ?>" name="goods_spec[<?php echo $k; ?>]" value="<?php echo $v2[item_id]; ?>" <?php if($k2 == 0): ?>checked="checked"<?php endif; ?> />
														<li onclick="select_filter(this);" <?php if($k2 == 0): ?> class="red"<?php endif; ?>><?php echo $v2[item]; ?></li>
													<?php endif; endforeach; endif; else: echo "" ;endif; ?>
											</ul>
										</div>

									</div>
								<?php endforeach; endif; else: echo "" ;endif; endif; ?>
							<!-- 规格 End -->
							<div class="clearfix"></div>

							<div class="cont_sl">
								<div><h5>数量</h5></div>
								<input class="cont_cho" id="number" type="text" name="goods_num" value="1" onblur="altergoodsnum(0)" onkeyup="this.value=this.value.replace(/[^\d]/g, '')" max="<?php if(empty($goods['flash_sale']) || (($goods['flash_sale'] instanceof \think\Collection || $goods['flash_sale'] instanceof \think\Paginator ) && $goods['flash_sale']->isEmpty())): ?><?php echo $goods['store_count']; else: ?><?php echo $goods['flash_sale']['goods_num']-$goods['flash_sale']['buy_num']; endif; ?>" />
								<div class="cont_bnt">
									<a href="javascript:void(0);" onclick="altergoodsnum(1)"><div class="bnt_top"></div></a>
									<a href="javascript:void(0);" onclick="altergoodsnum(-1)"><div class="bnt_bot"></div></a>
								</div>
								<div class="cont_txt">
									<p>件</p>
									<p>库存<span id="store_count"><?php if(empty($goods['flash_sale']) || (($goods['flash_sale'] instanceof \think\Collection || $goods['flash_sale'] instanceof \think\Paginator ) && $goods['flash_sale']->isEmpty())): ?><?php echo $goods['store_count']-1; else: ?><?php echo $goods['flash_sale']['goods_num']-$goods['flash_sale']['buy_num']-1; endif; ?></span>件</p>
								</div>
							</div>
						</div>
						<div class="bnt_shop">
							<input type="hidden" name="goods_id" value="<?php echo $goods['goods_id']; ?>" />
							<?php if($goods[is_virtual] == 1): ?>
								<input type="hidden" name="virtual_limit" id="virtual_limit" value="<?php echo $goods['virtual_limit']; ?>"/>
								<a class="bnt bnt_shop_l" href="javascript:;" onclick="virtual_buy();">立即购买</a>
							<?php elseif($goods['exchange_integral'] > 0): ?>
								<a class="bnt bnt_shop_l" href="javascript:;"  onclick="buyIntegralGoods(<?php echo $goods['goods_id']; ?>,1,1);">立即兑换</a>
							<?php else: ?>
								<a class="bnt bnt_shop_l" href="javascript:;" onclick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1,1);">立即购买</a>
								<a class="bnt bnt_shop_r" href="javascript:;" onclick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1,0);"><i class="glyphicon glyphicon-shopping-cart"></i> 加入购物车</a>
							<?php endif; ?>
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
							<a href="javascript:void(0);" id="collectLink">收藏商品（<?php echo $goods['click_count']; ?>人气）</a>
						</div>
					</form>
				</div>
				<div class="clearfix"></div>
				<!-- 热销宝贝 Start -->
				<div class="selling">
					<div class="sell_txt"><p>热销宝贝</p></div>
					<div class="sell_pic">
						<?php if(is_array($selling) || $selling instanceof \think\Collection || $selling instanceof \think\Paginator): if( count($selling)==0 ) : echo "" ;else: foreach($selling as $key=>$vo): ?>
							<div>
								<div class="sellpic_one"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$vo[goods_id])); ?>"><img src="<?php echo goods_thum_images($vo['goods_id'],150,150); ?>" width="150" height="150"/></a></div>
								<div class="text-center"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$vo[goods_id])); ?>"><?php echo getSubstr($vo['goods_name'],0,30); ?></a></div>
								<p>￥<?php echo $vo['shop_price']; ?></p>
							</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
				<!-- 热销宝贝 End -->
				<div class="sec_two_main">
					<div class="introduceshop">
						<ul class="tab_ul">
							<li class="tab_one"><a href="#new1" class="gal">商品详情</a></li>
							<li><a href="#new2">累计评价 <span><?php echo $commentStatistics['c0']; ?></span></a></li>
						</ul>
						<div class="cont" id="new1">
							<div class="cont_one">
								<h6>产品名称：<?php echo $goods['goods_name']; ?></h6>

								<div class="cont_txet">
									<ul>
										<?php if(is_array($goods_attr_list) || $goods_attr_list instanceof \think\Collection || $goods_attr_list instanceof \think\Paginator): if( count($goods_attr_list)==0 ) : echo "" ;else: foreach($goods_attr_list as $k=>$v): ?>
											<li <?php if(strlen($v[attr_value]) > 20): ?>style="width:100%"<?php endif; ?>><span><?php echo $goods_attribute[$v[attr_id]]; ?>：</span><span><?php echo $v[attr_value]; ?></span></li>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
							</div>
							<div class="cont_detail">
								<?php echo htmlspecialchars_decode($goods['goods_content']); ?>
							</div>
						</div>
						<div class="cont" id="new2">
							<div class="evaluate">
								<div class="eva_title"><h3>商品评价</h3></div>
								<div class="eva_praise">
									<div class="eva_praise_l"><p>好评度</p><h5><?php echo $commentStatistics['rate1']; ?></h5><h6>%</h6></div>
									<div class="eva_praise_r">
										<?php if($goods['comment_count'] > 5): ?>
											<ul>
												<li>性价比高</li>
												<li>质量不错</li>
												<li>品质还不错</li>
												<li>保湿效果不错</li>
											</ul>
										<?php else: ?>
											该商品暂无买家印象
										<?php endif; ?>
									</div>
								</div>
								<div class="eva_main cte-deta">
									<div class="eva_mian_nav">
										<ul>
											<li data-t="1" class="red"><a href="javascript:void(0);">全部评价(<?php echo $commentStatistics['c0']; ?>)</a></li>
											<li data-t="5"><a href="javascript:void(0);">晒图(<?php echo $commentStatistics['c4']; ?>)</a></li>
											<li data-t="2"><a href="javascript:void(0);">好评(<?php echo $commentStatistics['c1']; ?>)</a></li>
											<li data-t="3"><a href="javascript:void(0);">中评(<?php echo $commentStatistics['c2']; ?>)</a></li>
											<li data-t="4"><a href="javascript:void(0);">差评(<?php echo $commentStatistics['c3']; ?>)</a></li>
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
					<div class="text-center"><a href="javascript:void(0)" onclick="replace_look()"><img src="__STATIC__/images/other.png" /></a></div>
				</div>
			</div>
			<!-- 看了又看 End -->
		</div>
	</section>
</div>
<div class="hidden" id="look_see">
	<?php if(is_array($look_see) || $look_see instanceof \think\Collection || $look_see instanceof \think\Paginator): if( count($look_see)==0 ) : echo "" ;else: foreach($look_see as $k=>$look): ?>
		<div class="otherpic_one">
			<div>
				<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$look[goods_id])); ?>"><img src="<?php echo goods_thum_images($look['goods_id'],150,150); ?>" width="150" height="150"/></a>
			</div>
			<div class="text-center"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$look[goods_id])); ?>"><?php echo $look['goods_name']; ?></a></div>
			<p>￥<?php echo $look['shop_price']; ?></p>
		</div>
	<?php endforeach; endif; else: echo "" ;endif; ?>
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
<div id="sidebar">
	<div class="sidebar-bg"></div>
	<div class="sidertabs tab-lis-1">
		<div class="sider-top-stra sider-midd-1">
			<div class="icon-tabe-chan icon-tabe-user">
				<a href="<?php echo U('Home/User/index'); ?>">
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
				<a href="<?php echo U('Home/User/message_notice'); ?>" target="_blank">
					<i class="share-side share-side1"></i>
					<span class="tab-tip">消息</span>
				</a>
			</div>
		</div>
		<div class="sider-top-stra sider-midd-2">
			<div class="icon-tabe-chan collect">
				<a href="<?php echo U('Home/User/goods_collect'); ?>" target="_blank">
					<i class="share-side share-side1"></i>
					<span class="tab-tip">收藏</span>
				</a>
			</div>
			<div class="icon-tabe-chan hostry">
				<a href="<?php echo U('Home/User/visit_log'); ?>" target="_blank">
					<i class="share-side share-side1"></i>
					<span class="tab-tip">足迹</span>
				</a>
			</div>
		</div>
	</div>
	<div class="sidertabs tab-lis-2">
		<div class="icon-tabe-chan advice">
			<a title="点击这里给我发消息" href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq2']; ?>&amp;Site=肽风尚商城&amp;Menu=yes" target="_blank">
				<i class="share-side share-side1"></i>
				<span class="tab-tip">在线咨询</span>
			</a>
		</div>
		<div class="icon-tabe-chan qrcode">
				<i class="share-side share-side1"></i>
                <span class="tab-tip qrewm">
                    <img src="__STATIC__/images/qrcode.jpg" width="100" height="100"/>关注公众号
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
				url: "<?php echo U('Home/Goods/collect_goods'); ?>",
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
			url: "/index.php?m=Home&c=goods&a=ajaxComment&goods_id=<?php echo $goods['goods_id']; ?>&commentType=" + commentType + "&p=" + page,//+tab,
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
</html>