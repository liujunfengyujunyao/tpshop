<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:41:"./template/pc/tfs/goods\integralMall.html";i:1512109153;s:36:"./template/pc/tfs/public\header.html";i:1519984596;s:36:"./template/pc/tfs/public\footer.html";i:1519984596;s:42:"./template/pc/tfs/public\sidebar_cart.html";i:1519984596;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>积分商城-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
	<link href="__STATIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="__STATIC__/css/style.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="__STATIC__/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/js/layer/layer-min.js"></script>
	<script src="__PUBLIC__/js/global.js"></script>
	<script src="__PUBLIC__/js/pc_common.js"></script>
	<script src="__STATIC__/js/common.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $tpshop_config['shop_info_store_logo']; ?>" media="screen" />
</head>
<body>
<!-- 头部顶栏 start -->
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
<!-- 头部顶栏 end -->

<div id="jf-page">
	<div class="container">
		<div class="row">
			<?php $pid =406;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1520218800 and end_time > 1520218800 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select();
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
	</div>
	<!--gift start-->
	<div id="gift">
		<div class="container biggift">
			<?php if($recommend): ?>
				<div class="row headings">
					<div class="col-xs-12">
						<p><span class="deliver">积分送大礼</span> &nbsp;&nbsp;&nbsp;<span class="English">INTEGRAL GIFT PACK</span> <!--<img src="img/lihe.png" />--></p>
					</div>
				</div>
				<div class="row sell">
					<div class="col-md-5 sella">
						<img src="<?php echo goods_thum_images($recommend['goods_id'],240,450); ?>" />
					</div>
					<div class="col-md-7 sellb">
						<p class="tai"><?php echo $recommend['goods_name']; ?></p>
						<p class="rang"><i class="glyphicon glyphicon-stop"></i> &nbsp;让小积分实现大作用 冰爽夏日不是梦</p>
						<p class="huan"><span><?php echo $recommend['exchange_integral']; ?></span> 积分</p>
						<p class="li"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$recommend['goods_id'])); ?>">立即兑换</a></p>
						<p class="xian"></p>
						<!--向上滚动特效start-->
						<ul class="gun">
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜王**以218 积分成功兑换饱润肽雪肌精华乳</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜张**以98 积分成功兑换饱润肽夏日冰爽喷雾</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜刘**以168 积分成功兑换饱润肽水漾修护面膜</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜李**以98 积分成功兑换饱润肽夏日冰爽喷雾</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜曹**以168 积分成功兑换饱润肽雪肌焕彩素颜霜</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜何**以218 积分成功兑换饱润肽雪肌精华乳</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜王**以218 积分成功兑换饱润肽雪肌精华乳</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜张**以98 积分成功兑换饱润肽夏日冰爽喷雾</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜吴**以168 积分成功兑换饱润肽水漾修护面膜</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜李**以98 积分成功兑换饱润肽夏日冰爽喷雾</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜沈**以168 积分成功兑换饱润肽雪肌焕彩素颜霜</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜范**以218 积分成功兑换饱润肽雪肌精华乳</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜王**以218 积分成功兑换饱润肽雪肌精华乳</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜左**以98 积分成功兑换饱润肽夏日冰爽喷雾</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜刘**以168 积分成功兑换饱润肽水漾修护面膜</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜李**以98 积分成功兑换饱润肽夏日冰爽喷雾</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜霍**以168 积分成功兑换饱润肽雪肌焕彩素颜霜</li>
							<li><i class="glyphicon glyphicon-volume-up"></i>&nbsp;恭喜朱**以218 积分成功兑换饱润肽雪肌精华乳</li>
						</ul>
						<script type="text/javascript">
							setInterval(function () {
								var newList = $('.gun :first').clone(true);
								$('.gun').append(newList);
								$('.gun :first').remove();
							}, 1000);
						</script>
						<!--向上滚动特效end-->
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>
	<!--gift end-->
	<!--exchange start-->
	<div id="exchange">
		<div class="container">
			<div class="row headings">
				<div class="col-xs-12">
					<p><span class="deliver">兑换专区</span> &nbsp;&nbsp;&nbsp;<span class="English">EXCHANGE ZONE</span></p>
				</div>
			</div>
			<div class="row news">
				<p><span class="xin">【新品专区】</span></br><span class="the">THE NEWS ZONE</span>
				</p>
			</div>
			<div class="row products">
				<div>
					<?php if(is_array($new) || $new instanceof \think\Collection || $new instanceof \think\Paginator): if( count($new)==0 ) : echo "" ;else: foreach($new as $key=>$v): ?>
						<div class="col-md-4">
							<dl>
								<dt class="text-center"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v['goods_id'])); ?>"><img src="<?php echo goods_thum_images($v['goods_id'],300,200); ?>" width="300" height="200"/></a></dt>
								<dd class="tai"><?php echo $v['goods_name']; ?></dd>
								<dd class="now">
									<p class="one">积分 <span><?php echo $v['exchange_integral']; ?></span></p>
									<p class="two"><br><span>原价：￥<?php echo $v['shop_price']; ?>元</span></p>
									<p class="three"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v['goods_id'])); ?>">立即兑换</a></p>
								</dd>
							</dl>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>

				<div class="clear"></div>

				<div class="row news">
					<p><span class="xin">【护养专区】</span></br><span class="the">THE NEWS ZONE</span>
					</p>
				</div>
				<div>
					<?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): if( count($category)==0 ) : echo "" ;else: foreach($category as $key=>$v): ?>
						<div class="col-md-4">
							<dl>
								<dt class="text-center"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v['goods_id'])); ?>"><img src="<?php echo goods_thum_images($v['goods_id'],300,200); ?>" width="300" height="200"/></a></dt>
								<dd class="tai"><?php echo $v['goods_name']; ?></dd>
								<dd class="now">
									<p class="one">积分 <span><?php echo $v['exchange_integral']; ?></span></p>
									<p class="two"><br><span>原价：￥<?php echo $v['shop_price']; ?>元</span></p>
									<p class="three"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v['goods_id'])); ?>">立即兑换</a></p>
								</dd>
							</dl>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
		</div>
	</div>
	<!--exchange end-->
	<!--cash start-->
	<div id="cash">
		<div class="container flow">
			<div class="row headings">
				<div class="col-xs-12">
					<p><span class="deliver">兑换流程</span> &nbsp;&nbsp;&nbsp;<span class="English">CASH FLOW</span> <!--<img src="img/lihe.png" />--></p>
				</div>
			</div>
			<div class="row cas">
				<img src="__STATIC__/images/dui.png" />
			</div>
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

<script src="__STATIC__/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
<script src="__STATIC__/js/headerfooter.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){
        $('.f-sort ul li').click(function(){
            $(this).find('i').addClass('jta-w').parents('li').siblings().find('i').removeClass('jta-w');
        })
    })
</script>
</body>
</html>