<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:39:"./template/mobile/new2/store\index.html";i:1513213325;s:41:"./template/mobile/new2/public\header.html";i:1512439863;s:45:"./template/mobile/new2/public\footer_nav.html";i:1512439863;s:43:"./template/mobile/new2/public\wx_share.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>工厂店管理中心--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
    <link rel="stylesheet" href="__STATIC__/css/style.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/iconfont.css"/>
    <script src="__STATIC__/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    <!--<script src="__STATIC__/js/zepto-1.2.0-min.js" type="text/javascript" charset="utf-8"></script>-->
    <script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script>
    <script src="__STATIC__/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__STATIC__/js/layer.js"  type="text/javascript" ></script>
    <script src="__STATIC__/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body class="g4">

<div class="myhearder">
    <div class="person">
        <div class="fl lors" style="margin:0rem; font-size:0.7rem;">
            <span><?php echo $store['store_name']; ?>/<?php echo $pick_up['pickup_name']; ?></span>
        </div>
        <div style="font-size: 0.7rem;color:#fff;margin-top:1.5rem;">
            <img src="__STATIC__/images/dw1.png"/>
            <span><?php echo $store_site; ?></span>
        </div>
    </div>
    <div class="scgz">
        <ul>
            <li>
                <a>
                    <h2><?php echo $store['phone']; ?></h2>
                    <p>合伙人：<?php echo $partner_name; ?></p>
                </a>

            </li>
            <li>
                <a href="<?php echo U('Store/rebate_log'); ?>">
                    <h2>收益资金金额</h2>
                    <p>￥<?php echo $moneys; ?></p>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="floor my p">
    <div class="content">

        <!-- 订单管理Start -->
        <div class="floor myorder ma-to-20 p">
            <div class="content30">
                <div class="order">
                    <div class="fl">
                        <img src="__STATIC__/images/p5.png"/>
                        <span>订单管理</span>
                    </div>
                    <div class="fr">
                        <a href="<?php echo U('Store/order_list'); ?>">
                            <span>全部订单</span>
                            <i class="Mright"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="floor floor_order">
            <ul>
                <li>
                    <a href="<?php echo U('Store/order_list',array('type'=>'WAITSEND')); ?>">
                        <span><?php echo $waitsend; ?></span>
                        <img  src="__STATIC__/images/q2.png"/>
                        <p>待发货</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Store/order_list',array('type'=>'ZITI')); ?>">
                        <span><?php echo $ziti; ?></span>
                        <img  src="__STATIC__/images/q1.png"/>
                        <p>自提</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Store/order_list',array('type'=>'SHIPPING')); ?>">
                        <span><?php echo $shipping; ?></span>
                        <img  src="__STATIC__/images/q2.png"/>
                        <p>配送</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Mobile/Store/return_goods_list'); ?>">
                        <span><?php echo $return_goods_count; ?></span>
                        <img src="__STATIC__/images/q4.png"/>
                        <p>退款/退货</p>
                    </a>
                </li>
            </ul>
        </div>
        <!-- 订单管理 End -->

        <!-- 库存管理 Start-->
        <div class="myorder p">
            <div class="content30">
                <div class="order">
                    <div class="fl">
                        <img src="__STATIC__/images/p1.png"/>
                        <span>库存管理</span>
                    </div>
                    <div class="fr">
                        <a href="<?php echo U('Store/store_stock_list'); ?>">
                            <span>我的库存</span>
                            <i class="Mright"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="floor floor_order">
            <ul>
                <li>
                    <a href="<?php echo U('Store/stock_log'); ?>">
                        <img  src="__STATIC__/images/p3.png"/>
                        <p>库存日志</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Store/apply'); ?>">
                        <img  src="__STATIC__/images/p2.png"/>
                        <p>补货申请</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Store/delivery'); ?>">
                        <img  src="__STATIC__/images/p6.png"/>
                        <p>入库单</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Store/delivery_doc_list'); ?>">
                        <img  src="__STATIC__/images/p7.png"/>
                        <p>出库单</p>
                    </a>
                </li>
            </ul>
        </div>
        <!-- 库存管理 End -->

        <!-- 会员管理 Start -->
        <div class="myorder p">
            <div class="content30">
                <div class="order">
                    <div class="fl">
                        <img src="__STATIC__/images/p1.png"/>
                        <span>会员管理</span>
                    </div>
                    <!--<div class="fr">-->
                        <!--<a href="<?php echo U('Store/store_stock_list'); ?>">-->
                            <!--<span>店会员</span>-->
                            <!--<i class="Mright"></i>-->
                        <!--</a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <div class="floor floor_order">
            <ul>
                <li>
                    <a href="<?php echo U('Store/lower_list'); ?>">
                        <img src="__STATIC__/images/p4.png"/>
                        <p>店会员</p>
                    </a>
                </li>
            </ul>
        </div>
        <!-- 会员管理 End -->
    </div>
</div>

<!-- 底部导航Start -->
<div class="foohi">
    <div class="footer">
        <ul>
            <li>
                <a <?php if(CONTROLLER_NAME == 'Index'): ?>class="yello" <?php endif; ?>  href="<?php echo U('Index/index'); ?>">
                    <div class="icon">
                        <i class="icon-shouye iconfont"></i>
                        <p>首页</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Goods/categoryList'); ?>">
                    <div class="icon">
                        <i class="icon-fenlei iconfont"></i>
                        <p>分类</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Cart/cart'); ?>">
                    <div class="icon">
                        <i class="icon-gouwuche iconfont"></i>
                        <p>购物车</p>
                    </div>
                </a>
            </li>
            <li>
                <a <?php if(CONTROLLER_NAME == 'User'): ?>class="yello" <?php endif; ?> href="<?php echo U('User/index'); ?>">
                    <div class="icon">
                        <i class="icon-wode iconfont"></i>
                        <p>我的</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	  var cart_cn = getCookie('cn');
	  if(cart_cn == ''){
		$.ajax({
			type : "GET",
			url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
			success: function(data){								 
				cart_cn = getCookie('cn');
				$('#cart_quantity').html(cart_cn);						
			}
		});	
	  }
	  $('#cart_quantity').html(cart_cn);
});
</script>
<!-- 微信浏览器 调用微信 分享js-->
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="__PUBLIC__/js/global.js"></script>
<script type="text/javascript">
<?php if(ACTION_NAME == 'goodsInfo'): ?>
	var ShareLink = "<?php echo U('Mobile/Goods/goodsInfo',['id'=>$goods[goods_id]],'',true); ?>"; //默认分享链接
	var ShareImgUrl = "http://<?php echo \think\Request::instance()->server('SERVER_NAME'); ?><?php echo goods_thum_images($goods[goods_id],400,400); ?>"; // 分享图标
	var ShareTitle = "<?php echo (isset($goods['goods_name']) && ($goods['goods_name'] !== '')?$goods['goods_name']:$tpshop_config['shop_info_store_title']); ?>"; // 分享标题
	var ShareDesc = "<?php echo (isset($goods['goods_remark']) && ($goods['goods_remark'] !== '')?$goods['goods_remark']:$tpshop_config['shop_info_store_desc']); ?>"; // 分享描述
<?php elseif(ACTION_NAME == 'info'): ?>
	var ShareLink = "<?php echo U('Mobile/Team/info',['goods_id'=>$team[goods_id],'team_id'=>$team[team_id]]); ?>"; //默认分享链接
	var ShareImgUrl = "http://<?php echo \think\Request::instance()->server('SERVER_NAME'); ?><?php echo $team[share_img]; ?>"; //分享图标
	var ShareTitle = "<?php echo $team[share_title]; ?>"; //分享标题
	var ShareDesc = "<?php echo $team[share_desc]; ?>"; //分享描述
<?php elseif(ACTION_NAME == 'found'): ?>
	var ShareLink = "<?php echo U('Mobile/Team/found',['id'=>$teamFound[found_id]],'',true); ?>"; //默认分享链接
	var ShareImgUrl = "http://<?php echo \think\Request::instance()->server('SERVER_NAME'); ?><?php echo $team[share_img]; ?>"; //分享图标
	var ShareTitle = "<?php echo $team[share_title]; ?>"; //分享标题
	var ShareDesc = "<?php echo $team[share_desc]; ?>"; //分享描述
<?php else: ?>
	var ShareLink = "http://<?php echo $_SERVER[HTTP_HOST]; ?>/index.php?m=Mobile&c=Index&a=index"; //默认分享链接
	var ShareImgUrl = "http://<?php echo \think\Request::instance()->server('SERVER_NAME'); ?><?php echo $tpshop_config['shop_info_store_logo']; ?>"; //分享图标
	var ShareTitle = "<?php echo $tpshop_config['shop_info_store_title']; ?>"; //分享标题
	var ShareDesc = "<?php echo $tpshop_config['shop_info_store_desc']; ?>"; //分享描述
<?php endif; ?>

var is_distribut = getCookie('is_distribut'); // 是否分销代理
var user_id = getCookie('user_id'); // 当前用户id
//alert(is_distribut+'=='+user_id);
// 如果已经登录了, 并且是分销商
if(parseInt(is_distribut) == 1 && parseInt(user_id) > 0)
{									
	ShareLink = ShareLink + "&first_leader="+user_id;									
}

$(function() {
	if(isWeiXin() && parseInt(user_id)>0){
		$.ajax({
			type : "POST",
			url:"/index.php?m=Mobile&c=Index&a=ajaxGetWxConfig&t="+Math.random(),
			data:{'askUrl':encodeURIComponent(location.href.split('#')[0])},		
			dataType:'JSON',
			success: function(res)
			{
				//微信配置
				wx.config({
				    debug: false, 
				    appId: res.appId,
				    timestamp: res.timestamp, 
				    nonceStr: res.nonceStr, 
				    signature: res.signature,
				    jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage','onMenuShareQQ','onMenuShareQZone','hideOptionMenu'] // 功能列表，我们要使用JS-SDK的什么功能
				});
			},
			error:function(){
				return false;
			}
		}); 

		// config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在 页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready 函数中。
		wx.ready(function(){
		    // 获取"分享到朋友圈"按钮点击状态及自定义分享内容接口
		    wx.onMenuShareTimeline({
		        title: ShareTitle, // 分享标题
		        link:ShareLink,
		        desc: ShareDesc,
		        imgUrl:ShareImgUrl // 分享图标
		    });

		    // 获取"分享给朋友"按钮点击状态及自定义分享内容接口
		    wx.onMenuShareAppMessage({
		        title: ShareTitle, // 分享标题
		        desc: ShareDesc, // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
		    });
			// 分享到QQ
			wx.onMenuShareQQ({
		        title: ShareTitle, // 分享标题
		        desc: ShareDesc, // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
			});	
			// 分享到QQ空间
			wx.onMenuShareQZone({
		        title: ShareTitle, // 分享标题
		        desc: ShareDesc, // 分享描述
		        link:ShareLink,
		        imgUrl:ShareImgUrl // 分享图标
			});

		   <?php if(CONTROLLER_NAME == 'User'): ?> 
				wx.hideOptionMenu();  // 用户中心 隐藏微信菜单
		   <?php endif; ?>	
		});
	}
});

function isWeiXin(){
    var ua = window.navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == 'micromessenger'){
        return true;
    }else{
        return false;
    }
}
</script>
<!--微信关注提醒 start-->
<?php if(\think\Session::get('subscribe') == 0): endif; ?>
<button class="guide" style="display:none;" onclick="follow_wx()">关注公众号</button>
<style type="text/css">
.guide{width:1rem;height:4rem;text-align: center;border-radius: 0.2rem ;font-size:0.5rem;padding:0.2rem 0;border:1px solid #adadab;color:#000000;background-color: #fff;position: fixed;right: 0.1rem;bottom: 10rem;}
#cover{display:none;position:absolute;left:0;top:0;z-index:18888;background-color:#000000;opacity:0.7;}
#guide{display:none;position:absolute;top:0.1rem;z-index:19999;}
#guide img{width: 70%;height: auto;display: block;margin: 0 auto;margin-top: 0.2rem;}
</style>
<script type="text/javascript">
  //关注微信公众号二维码	 
function follow_wx()
{
	layer.open({
		type : 1,  
		title: '关注公众号',
		content: '<img src="<?php echo $wx_qr; ?>" width="100%">',
		style: ''
	});
}
  
$(function(){
	if(isWeiXin()){
		var subscribe = getCookie('subscribe'); // 是否已经关注了微信公众号		
		if(subscribe == 0)
			$('.guide').show();
	}else{
		$('.guide').hide();
	}
})
 
</script> 

<!--微信关注提醒  end-->
<!-- 微信浏览器 调用微信 分享js  end-->
<!-- 底部导航End -->
<script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>