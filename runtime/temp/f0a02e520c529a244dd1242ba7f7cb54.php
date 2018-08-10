<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:42:"./template/pc/tfs/activity\get_coupon.html";i:1509018228;s:36:"./template/pc/tfs/public\header.html";i:1519984596;s:36:"./template/pc/tfs/public\footer.html";i:1519984596;s:42:"./template/pc/tfs/public\sidebar_cart.html";i:1519984596;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
		<script src="__STATIC__/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="__PUBLIC__/js/global.js"></script>
		<style type="text/css">
			a{text-decoration: none;}
			.yhqmaincoupan{width: 1224px;margin: 0 auto;background: #fff3e3;}
			.yhqmaincoupan .maitos{width: 1224px;height: 286px;}
			.maleri100{margin: 0 auto;margin: 0 100px;}
			.buttomretuandclos{text-align: center;padding: 30px 0 33px 0;border-bottom: 1px solid #f0e2cf;}
			.buttomretuandclos a{
				display: inline-block;
				width: 120px;
				height: 44px;
				line-height: 44px;
				text-align: center;
				color: white;
				background: #ef465a;
				border-radius: 10px;
				text-decoration: none;
				margin: 0 25px;
				transition: all .2s ease-in 0s;
				-webkit-transition: all .2s ease-in 0s;
				-moz-transition: all .2s ease-in 0s;
				-o-transition: all .2s ease-in 0s;
			}
			.buttomretuandclos a:hover{background: rgba(239,70,90,.8);}
			.questionsany {padding: 40px 0;position: relative;}
			.questionsany p{font-size: 12px;padding:6px 0px;}
			.questionsany p a{color: #015ea8;}
			.title-qsm{font-weight: 600;}
			.rebyikoe{text-align: center;margin-top: -62px;}
			.rebyikoe h1{color: #e7182e;font-size: 28px;}
			.rebyikoe p{color: #906c38;font-size: 14px;}
			.ma-to-50{margin-top: 50px;}
		</style>
	</head>
	<body>
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
		<div class="yhqmaincoupan">
			<img class="maitos" src="__STATIC__/images/getyhq_01.jpg"/>
			<?php if($res[status] == 1): ?>
                <div class="rebyikoe">
                    <h1><?php echo $res['msg']; ?></h1>
                    <p>优惠劵将于3~5分钟后，发送到你的商城账户里。请注意查收哟~</p>
                    <p class="ma-to-50"><em id="wait">5</em><a href="<?php echo $res['return_url']; ?>" id="href">秒后为您自动跳转...</a></p>
                </div>
			<?php else: ?>
			<div class="rebyikoe" style="display: block;">
				<img src="__STATIC__/images/redpack.png" style="display: inline-block;vertical-align: middle;"/>
				<p style="display: inline-block;vertical-align: middle;font-size: 16px;color: #ef465a;"><?php if($res['status'] == 2): ?>您已经参加过此活动，别太贪心哟，下次再来~<?php else: ?><?php echo $res['msg']; endif; ?></p>
				<p class="ma-to-50"><em id="wait">5</em><a href="<?php echo $res['return_url']; ?>" id="href">秒后为您自动跳转...</a></p>
			</div>
			<?php endif; ?>
			<div class="maibos">
				<div class="maleri100">
					<div class="buttomretuandclos">
						<a href="<?php echo $res['return_url']; ?>">返回活动页面</a>
						<a href="javascript:CloseWebPage();">关闭页面</a>
					</div>
					<!--<div class="questionsany">-->
						<!--<p class="title-qsm">说明：快抢优惠券有一定的随机比例，可能存在抢不到的情况。</p>-->
						<!--<p class="title-qsm">常见问题</p>-->
						<!--<p><a href="">1、优惠券有哪些类型？</a></p>-->
						<!--<p><a href="">2、什么品类优惠券？</a></p>-->
						<!--<p><a href="">3、如何查看优惠券？</a></p>-->
						<!--<p><a href="">4、如何使用优惠券？</a></p>-->
						<!--<p><a href="">5、优惠券的使用规则？</a></p>-->
					<!--</div>-->
				</div>
			</div>
		</div>
        <!--footer-s-->
        <div class="footer p">
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
        </div>
        <!--footer-e-->
		<script type="text/javascript">
		(function(){
		var wait = document.getElementById('wait'),href = document.getElementById('href').href;
		var interval = setInterval(function(){
			var time = --wait.innerHTML;
			if(time <= 0) {
				location.href = href;
				clearInterval(interval);
			};
		}, 1000);
		})();

		</script>   
	</body>
</html>
