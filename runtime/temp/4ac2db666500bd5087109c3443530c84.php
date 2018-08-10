<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:43:"./template/pc/tfs/public\dispatch_jump.html";i:1509018228;s:36:"./template/pc/tfs/public\header.html";i:1519984596;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
    <script src="__STATIC__/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__STATIC__/js/common.js"></script>
</head>
<body>
<!--header-s-->
<div class="tpshop-tm-hander p">
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
</div>
<!--header-e-->
<div class="operation_success_fail w710" >
    <?php if($code == 1) {?>
    <!--操作成功-s--->
    <div class="boxoperation p" >
        <div class="success_fial_img fl">
            <img src="__STATIC__/images/right_06.jpg"/>
        </div>
        <div class="success_describe fl">
            <div class="sd1">
                <i class="suc"></i>
                <span><?php echo(strip_tags($msg)); ?></span>
            </div>
            <div class="sd2">
                <a id="href" href="<?php echo($url); ?>">页面跳转中...</a>
                <span>等待时间：<em id="wait"><?php echo($wait); ?></em></span>
            </div>
            <div class="sd3">
                <a href="/">首页</a>
                <a href="/index.php?m=Home&c=Cart&a=index">购物车</a>
                <a href="/index.php?m=Home&c=User&a=index">用户中心</a>
            </div>
        </div>
    </div>
    <!--操作成功-s--->
<?php }else{?>
    <!--操作失败-s--->
    <div class="boxoperation p" >
        <div class="success_fial_img fl">
            <img src="__STATIC__/images/wrong_05.jpg"/>
        </div>
        <div class="success_describe fl">
            <div class="sd1">
                <i class="wro"></i>
                <span><?php echo(strip_tags($msg)); ?></span>
            </div>
            <div class="sd2">
                <a id="href" href="<?php echo($url); ?>">页面跳转中...</a>
                <span>等待时间：<em id="wait"><?php echo($wait); ?></em></span>
            </div>
            <div class="sd3">
                <a href="/">首页</a>
                <a href="/index.php?m=Home&c=Cart&a=index">购物车</a>
                <a href="/index.php?m=Home&c=User&a=index">用户中心</a>
            </div>
        </div>
    </div>
    <!--操作失败-e--->
    <?php }?>
</div>
<script src="__STATIC__/js/headerfooter.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    /**/
    (function () {
        var wait = document.getElementById('wait'), href = document.getElementById('href').href;
        var interval = setInterval(function () {
            var time = --wait.innerHTML;
            if (time <= 0) {
                location.href = href;
                clearInterval(interval);
            }
            ;
        }, 1000);
    })();

</script>
</body>
</html>