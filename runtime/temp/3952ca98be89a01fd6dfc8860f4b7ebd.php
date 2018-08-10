<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:41:"./template/pc/tfs/order\order_detail.html";i:1519984596;s:34:"./template/pc/tfs/user\header.html";i:1512197568;s:32:"./template/pc/tfs/user\menu.html";i:1519984571;s:36:"./template/pc/tfs/public\footer.html";i:1519984596;s:42:"./template/pc/tfs/public\sidebar_cart.html";i:1519984596;}*/ ?>
<html>
<head>
<meta charset="utf-8">
<title>订单详情</title>
    <meta name="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
    <meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
    <link href="__STATIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="__STATIC__/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="__STATIC__/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__PUBLIC__/js/pc_common.js"></script>
    <script src="__STATIC__/js/common.js"></script>
    <script src="__PUBLIC__/js/layer/layer.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $tpshop_config['shop_info_store_logo']; ?>" media="screen" />
</head>

<body>
<!-- 头部顶栏 start -->
<div class="container jf-header">
	<div class="row">
		<div class="col-md-6 col-sm-6 jf-top">
			<ul>
				<div class="islogin">
					<li class="user"><a class="red userinfo" href="<?php echo U('Home/user/index'); ?>"></a></li>
					<li><a href="<?php echo U('Home/User/message_notice'); ?>">消息</a></li>
					<li><a href="<?php echo U('Home/user/logout'); ?>">退出</a></li>
				</div>
				<div class="nologin">
					<li><a href="<?php echo U('Home/user/login'); ?>">请登录</a></li>
					<li><a href="<?php echo U('Home/user/reg'); ?>">免费注册</a></li>
				</div>
				<li>|</li>
				<li>
					<?php if(strtolower(ACTION_NAME) != 'goodsinfo'): ?>
						<link rel="stylesheet" href="__STATIC__/css/location.css" type="text/css"><!-- 收货地址，物流运费 -->
						<div class="sendaddress pr fl">
							<span style="float: left;">配 送：</span>
							<span class="list1">
								<div class="store-selector" style="margin-top: 2px;">
									<div class="text">
										<div></div>
										<b></b>
									</div>
									<div onclick="$(this).parent().removeClass('hover')" class="close"></div>
								</div>
							</span>
						</div>
						<script src="__STATIC__/js/location.js"></script>
					<?php endif; ?>
				</li>
			</ul>
			<script>
				$(function () {
					var uname = getCookie('uname');
					if (uname == '') {
						$('.islogin').remove();
						$('.nologin').show();
					} else {
						$('.nologin').remove();
						$('.islogin').show();
						$('.userinfo').html(decodeURIComponent(uname));
					}
				})
			</script>
		</div>
		<div class="col-md-6 col-sm-6 w shortcut">
			<ul class="fr">
				<li><a href="<?php echo U('Home/Order/order_list'); ?>">我的订单</a></li>
				<li class="spacer"></li>
				<li><a href="<?php echo U('Home/User/visit_log'); ?>">我的浏览</a></li>
				<li class="spacer"></li>
				<li><a href="<?php echo U('Home/User/goods_collect'); ?>">我的优惠券</a></li>
				<li class="spacer"></li>
				<li><a href="<?php echo U('Home/User/goods_collect'); ?>">我的收藏</a></li>
				<li class="spacer"></li>
				<li><a href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq2']; ?>&amp;Site=<?php echo $tpshop_config['shop_info_store_name']; ?>&amp;Menu=yes">在线客服</a></li>
				<li class="spacer"></li>
				<li class="dorpdown" id="ttbar-navs">
					<div class="dt cw-icon">网站导航<i class="iconfont">&#xe605;</i></div>
					<div class="dd dorpdown-layer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Activity/group_list'); ?>">团购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Activity/flash_sale_list'); ?>">抢购</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Article/detail'); ?>">帮助中心</a></div>
				</li>
			</ul>
		</div>
	</div>
</div>
<div id="my">
	<div class="container mymall">
		<div class="row">
			<div class="col-md-3 col-sm-4">
				<dl>
					<dt><a href="<?php echo U('Home/Index/index'); ?>"><img src="__STATIC__/images/mall.png" /></a></dt>
					<dd class="one">我的商城</dd>
					<dd><a href="<?php echo U('Home/Index/index'); ?>" class="return">返回商城首页</a></dd>
				</dl>
			</div>
			<div class="col-md-3 col-sm-4 account">
				<span class="u-dl">
					<span class="u-dt text-center">
						<a href="#">账户设置 <i class="glyphicon glyphicon-chevron-down"></i></a>
					</span>
					<span class="u-dd">
						<a href="<?php echo U('Home/User/info'); ?>">个人信息</a>
						<a href="<?php echo U('Home/User/address_list'); ?>">收货地址</a>
					</span>
				</span>
				<a href="<?php echo U('Home/User/message_notice'); ?>" style="margin-left: 10%">消息</a>
				<a href="<?php echo U('Home/Goods/integralMall'); ?>" style="margin-left: 10%">积分商城</a>
			</div>
			<div class="col-md-3 col-sm-2">
				<div class="search">
					<div class="search-m">
						<div class="form">
							<form id="sourch_form" id="sourch_form" method="post" action="<?php echo U('Home/Goods/search'); ?>">
								<input type="text" id="q" name="q" class="text" value="<?php echo \think\Request::instance()->param('q'); ?>" />
								<button onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();" class="button"><i class="iconfont"><img src="__STATIC__/images/search.png" /></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-2">
				<div class="settleup">
					<div class="cw-icon">
						<i class="iconfont"><img src="__STATIC__/images/che.png" /></i>
						<a href="<?php echo U('Home/Cart/cart'); ?>">我的购物车<b>&nbsp;&nbsp;<span>(<em class="sc_z" id="cart_quantity"></em>)</span></b></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--mymall end-->
</div>
<!--my end-->

<!-- 头部顶栏 end -->

<!--主要内容开始-->
<div id="per_main">
    <div class="container">
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

    <div class="container mine">
        <div class="row my_mall">
            <div class="col-md-2 col-sm-3 col-lg-2 my_left">
	<ul>
		<p class="top"><img src="__STATIC__/images/xiaoren.png" /> 我的商城</p>

		<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>交易中心</li>
		<li><a href="<?php echo U('Home/Order/order_list'); ?>">我的订单</a></li>
		<li><a href="<?php echo U('Home/Order/comment'); ?>">我的评价</a></li>

		<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>资产中心</li>
		<li><a href="<?php echo U('Home/User/recharge'); ?>">账户余额</a></li>
		<li><a href="<?php echo U('Home/User/account'); ?>">我的积分</a></li>
		<li><a href="<?php echo U('Home/User/coupon'); ?>">我的优惠券</a></li>

		<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>关注中心</li>
		<li><a href="<?php echo U('Home/User/goods_collect'); ?>">我的收藏</a></li>
		<li><a href="<?php echo U('Home/User/visit_log'); ?>">我的足迹</a></li>

		<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>个人中心</li>
		<li><a href="<?php echo U('Home/User/info'); ?>">个人信息</a></li>
		<li><a href="<?php echo U('Home/User/address_list'); ?>">地址管理</a></li>
		<li><a href="<?php echo U('Home/User/safety_settings'); ?>">安全设置</a></li>

		<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>服务中心</li>
		<li><a href="<?php echo U('Home/Order/return_goods_list'); ?>">退货管理</a></li>
	</ul>

	<?php if($user['level'] == 9 || $user['level'] == 8): ?>
	<ul>
		<p class="top"> 管理中心</p>

		<?php if($user['level'] == 9): ?>
			<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>工厂店管理</li>
			<li><a href="<?php echo U('Home/Store/order_list'); ?>">工厂店订单</a></li>
			<li><a href="<?php echo U('Home/Store/return_goods_list'); ?>">退换货管理</a></li>
			<li><a href="<?php echo U('Home/Store/store_stock_list'); ?>">工厂店库存</a></li>
			<li><a href="<?php echo U('Home/Store/stock_log'); ?>">库存日志</a></li>
			<li><a href="<?php echo U('Home/Store/apply'); ?>">补货申请记录</a></li>
			<li><a href="<?php echo U('Home/Store/delivery'); ?>">发货单</a></li>
			<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>会员管理</li>
			<li><a href="<?php echo U('Home/Order/lower_list'); ?>">店会员</a></li>
		<?php endif; if($user['level'] == 8): ?> <!-- 用户等级为合伙人 -->
			<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>工厂店管理</li>
			<li><a href="<?php echo U('Home/Partner/storeList'); ?>">工厂店列表</a></li>
			<li><a href="<?php echo U('Home/Partner/orderList'); ?>">工厂店订单</a></li>
			<li><a href="<?php echo U('Home/Partner/store_apply'); ?>">工厂店补货申请</a></li>
			<li><a href="<?php echo U('Home/Partner/delivery'); ?>">配货单</a></li>

			<li class="dot"><span><i class="glyphicon glyphicon-stop"></i></span>库存管理</li>
			<li><a href="<?php echo U('Home/Partner/stockList'); ?>">库存列表</a></li>
			<li><a href="<?php echo U('Home/Partner/stockLog'); ?>">库存日志</a></li>
			<li><a href="<?php echo U('Home/Partner/apply'); ?>">补货申请</a></li>
			<li><a href="<?php echo U('Home/Partner/invoiceList'); ?>">发货单</a></li>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
</div>
            <div class="col-md-10 col-sm-9 col-lg-10 per_main_r">
                <div class="or_right_title"><h4><a href="<?php echo U('Home/Order/order_list'); ?>">我的订单</a> / <a href="javascript:();">订单详情</a></h4>
                </div>
                <div class="per_con">
                    <div class="order_survey"><h2>订单概况</h2>
                        <div class="order_survey_main"> 
                        <dl class="dl-horizontal">
                            <dt>订单状态：</dt><dd><span><?php echo $order_info['order_status_desc']; ?></span></dd>
                            <dt>订单金额：</dt><dd><span>￥<?php echo $order_info['order_amount']; ?></span> (含运费￥<?php echo $order_info['shipping_price']; ?>)</dd>
                            <dt>订单编号：</dt><dd><?php echo $order_info['order_sn']; ?></dd>
                            <dt>发货信息：</dt><dd><?php echo $order_info['consignee']; ?>&nbsp;&nbsp;<?php echo $order_info['mobile']; ?>&nbsp;&nbsp;<?php echo $region_list[$order_info['province']]; ?><?php echo $region_list[$order_info['city']]; ?><?php echo $region_list[$order_info['district']]; ?><?php echo $order_info['address']; ?></dd>
                            <dt>支付方式：</dt><dd><?php echo (isset($order_info['pay_name']) && ($order_info['pay_name'] !== '')?$order_info['pay_name']:'第三方代付'); ?></dd>
                            <dt>付款时间：</dt><dd><?php if($order_info[pay_status] == 1 or $order_info[pay_status] == 2): ?><?php echo date('Y-m-d H:i:s',$order_info['pay_time']); else: ?>未支付<?php endif; ?></dd>
                            <dt>发票抬头：</dt><dd><?php echo (isset($order_info['invoice_title']) && ($order_info['invoice_title'] !== '')?$order_info['invoice_title']:''); ?></dd>
                            <dt>配送方式：</dt><dd><?php echo $order_info['shipping_name']; ?></dd>
                            <dt>买家留言：</dt><dd><?php echo (isset($order_info['user_note']) && ($order_info['user_note'] !== '')?$order_info['user_note']:''); ?></dd>
                        </dl>
                        </div>
                    </div>

                    <div class="order_tracer"><h2>订单跟踪</h2>
                    <div class="order_tracer_top">
                        <div class="order_stage_line"></div>
                        <ul>
                            <li><div class="order_stage_bg"><div class="order_stage_btn1"></div></div><p>提交订单</p></li>
                            <li><div class="order_stage_bg"><div class="order_stage_btn1 <?php if($order_info[pay_time] == 0): ?>order_stage_btn2<?php endif; ?>"></div></div><p>支付成功</p></li>
                            <li><div class="order_stage_bg"><div class="order_stage_btn1 <?php if($order_info[shipping_time] == 0): ?>order_stage_btn2<?php endif; ?>"></div></div><p>
                            <?php if(($order_info[shop_way] == 2) or ($order_info[shop_way] == 3)): ?>
                                到达工厂店
                            <?php endif; if($order_info[shop_way] == 1): ?>
                                卖家已发货
                            <?php endif; ?>
                            </p></li>
                            <li><div class="order_stage_bg"><div class="order_stage_btn1 <?php if($order_info[shipping_time] == 0): ?>order_stage_btn2<?php endif; ?>"></div></div><p>等待收货</p></li>
                            <li><div class="order_stage_bg"><div class="order_stage_btn1 <?php if($order_info[confirm_time] == 0): ?>order_stage_btn2<?php endif; ?>"></div></div><p>订单完成</p></li>
                        </ul>
                    </div>

                    <div class="order_tracer_sec">
                        <h3>订单跟踪详情</h3>
                        <?php if(($order_info[shop_way] == 1) and ($order_info[shipping_time] > 0)): ?>
                            <ul id="express_info">
                            </ul>

                            <script>
                                queryExpress();
                                function queryExpress()
                                {
                                    var shipping_code = "<?php echo $order_info['shipping_code']; ?>";
                                    var invoice_no = "<?php echo $order_info['invoice_no']; ?>";
                                    $.ajax({
                                        type : "GET",
                                        dataType: "json",
                                        url:"/index.php?m=Home&c=Api&a=queryExpress&shipping_code="+shipping_code+"&invoice_no="+invoice_no,//+tab,
                                        success: function(data){
                                            var html = '';
                                            if(data.status == 200){
                                                $.each(data.data, function(i,n){
                                                    if(i == 0){
                                                        html += "<li class='first'><i class='node-icon'></i><span class='time'>"+n.time+"</span><span class='txt'>"+n.context+"</span></li>";
                                                    }else{
                                                        html += "<li><i class='node-icon'></i><span class='time'>"+n.time+"</span><span class='txt'>"+n.context+"</span></li>";
                                                    }
                                                });
                                            }else{
                                                html += "<li class='first'><i class='node-icon'></i><span class='txt'>"+data.message+"</span></li>";
                                            }
                                            $("#express_info").html(html);
                                        }
                                    });
                                }
                            </script>
                            
                        <?php else: ?>
                            <ul>
                            <?php if($order_info[confirm_time] > 0): ?>
                                <li><div class="order_dot_bg"><div class="order_dot"></div></div><span class="order_time"><?php echo date('Y-m-d H:i:s',$order_info['confirm_time']); ?></span><span class="order_txt"> 您的订单已完成，欢迎下次购买</span></li>
                            <?php endif; if($order_info[shipping_time] > 0): ?>
                                <li><div class="order_dot_bg"><div class="order_dot"></div></div><span class="order_time"><?php echo date('Y-m-d H:i:s',$order_info['shipping_time']); ?></span><span class="order_txt">商品准备完成，等待收货</span></li>
                            <?php endif; if($order_info[shipping_time] > 0): ?>
                                <li><div class="order_dot_bg"><div class="order_dot"></div></div><span class="order_time"><?php echo date('Y-m-d H:i:s',$order_info['shipping_time']); ?></span><span class="order_txt"> 您的订单
                                <?php if(($order_info[shop_way] == 2) or ($order_info[shop_way] == 3)): ?>
                                已到达工厂店，正在准备商品
                                <?php endif; if($order_info[shop_way] == 1): ?>
                                卖家已发货
                                <?php endif; ?>
                                </span></li>
                            <?php endif; if($order_info[pay_time] > 0): ?>
                                <li><div class="order_dot_bg"><div class="order_dot"></div></div><span class="order_time"><?php echo date('Y-m-d H:i:s',$order_info['pay_time']); ?></span><span class="order_txt">您的订单已完成支付</span></li>    
                            <?php endif; ?>
                                <li><div class="order_dot_bg"><div class="order_dot"></div></div><span class="order_time"><?php echo date('Y-m-d H:i:s',$order_info['add_time']); ?></span><span class="order_txt">您的订单已完成提交</span></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="order_bill"><h2>商品清单</h2>
                    <table>
                    <tr class="order_bill_grop">
                        <th class="order_bill_one">商品</th>
                        <th>单价</th>
                        <th>数量</th>
                        <th>操作</th>
                    </tr>
                    <?php if(is_array($order_info['goods_list']) || $order_info['goods_list'] instanceof \think\Collection || $order_info['goods_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order_info['goods_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?>
                        <tr class="order_bill_goods">
                            <td class="order_goods_img">
                                <div class="order_detail">
                                    <div class="order_detail_img"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>"><img src="<?php echo goods_thum_images($goods['goods_id'],80,80); ?>" width="80" height="80"></a></div>
                                    <div class="order_detail_txt"><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>"><?php echo getSubstr($goods['goods_name'],0,10); ?></a><span>商品货号：<?php echo $goods['goods_sn']; ?></span></div>
                                </div>
                             </td>
                             <td>￥<?php echo $goods['member_goods_price']; ?></td>
                             <td><?php echo $goods['goods_num']; ?></td>
                             <td>
                                <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id'])); ?>">再次购买</a>
                             </td>
                        </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <ul>
                        <li>
                            <span class="order_bill_lable">商品总额 :</span>
                            <span class="order_bill_txt">¥<?php echo $order_info['goods_price']; ?></span>
                        </li>
                        <li>
                            <span class="order_bill_lable">运    费 :</span>
                            <span class="order_bill_txt">¥<?php echo $order_info['shipping_price']; ?></span>
                        </li>
                        <li class="order_bill_bot">
                            <span class="order_bill_lable">订单总额 :</span>
                            <span class="order_bill_txt">¥<?php echo $order_info['order_amount']; ?></span>
                        </li>
                        <?php if($order_info['pay_btn'] == 1): ?>
                        <li class="order_bill_pay"><a href="<?php echo U('Home/Cart/cart4',array('order_id'=>$order_info[order_id])); ?>">立即付款</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--主要内容结束-->

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
</body>
</html>