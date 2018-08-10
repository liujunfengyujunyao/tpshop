<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:46:"./template/mobile/new2/order\order_detail.html";i:1512439864;s:41:"./template/mobile/new2/public\header.html";i:1512439863;s:45:"./template/mobile/new2/public\header_nav.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>订单详情--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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

<div class="classreturn loginsignup ">
    <div class="content">
        <div class="ds-in-bl return">
            <a href="javascript:history.back(-1)"><img src="__STATIC__/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>订单详情</span>
        </div>
        <div class="ds-in-bl menu">
            <a href="javascript:void(0);"><img src="__STATIC__/images/class1.png" alt="菜单"></a>
        </div>
    </div>
</div>
<div class="flool tpnavf">
    <div class="footer">
        <ul>
            <li>
                <a class="yello" href="<?php echo U('Index/index'); ?>">
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
                <!--<a href="shopcar.html">-->
                <a href="<?php echo U('Cart/cart'); ?>">
                    <div class="icon">
                        <i class="icon-gouwuche iconfont"></i>
                        <p>购物车</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo U('User/index'); ?>">
                    <div class="icon">
                        <i class="icon-wode iconfont"></i>
                        <p>我的</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="edit_gtfix">
        <div class="namephone fl">
            <div class="top">
                <div class="le fl"><?php echo $order_info['consignee']; ?></div>
                <div class="lr fl"><?php echo $order_info['mobile']; ?></div>
            </div>
            <div class="bot">
                <i class="dwgp"></i>
                <span><?php echo $region_list[$order_info['province']]; ?>,<?php echo $region_list[$order_info['city']]; ?>,<?php echo $region_list[$order_info['district']]; ?>,<?php echo $order_info['address']; ?></span>
            </div>
        </div>
        <div class="fr youjter">
        </div>
        <div class="ttrebu">
            <img src="__STATIC__/images/tt.png"/>
        </div>
</div>
<div class="packeg p">
    <div class="maleri30">
        <div class="fl">
            <?php if($order_info['order_prom_type'] == 4): ?>
                <h1><span >订单类型：</span><span class="bgnum"></span><span>预售订单</span></h1>
            <?php endif; ?>
            <h1></h1>
        </div>
        <div class="fr">
            <span><?php echo $order_info['order_status_desc']; ?></span>
        </div>
    </div>
</div>
<!--订单商品列表-s-->
<div class="ord_list p">
    <div class="maleri30">
        <?php if(is_array($order_info['goods_list']) || $order_info['goods_list'] instanceof \think\Collection || $order_info['goods_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order_info['goods_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$good): $mod = ($i % 2 );++$i;?>
            <a href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$good[goods_id])); ?>">
                <div class="shopprice">
                    <div class="img_or fl">
                        <img src="<?php echo goods_thum_images($good[goods_id],100,100); ?>"/>
                    </div>
                    <div class="fon_or fl">
                        <h2 class="similar-product-text"><?php echo $good[goods_name]; ?></h2>
                        <div><span class="bac"><?php echo $good['spec_key_name']; ?></span></div>
                    </div>
                    <div class="price_or fr">
                        <p><span>￥</span><span><?php echo $good['member_goods_price']; ?></span></p>
                        <p>x<?php echo $good['goods_num']; ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
<!--订单商品列表-e-->
<div class="qqz">
    <div class="maleri30">
        <a href="mqqwpa://im/chat?chat_type=wpa&uin=<?php echo $tpshop_config['shop_info_qq']; ?>&version=1&src_type=web&web_src=www.chinesestack.com">联系客服</a>
        <?php if($order_info['cancel_btn'] == 1): ?>
            <a class="closeorder_butt" >取消订单</a>
        <?php endif; ?>
    </div>
</div>
<div class="information_dr ma-to-20">
    <div class="maleri30">
        <div class="tit">
            <h2>基本信息</h2>
        </div>
        <div class="xx-list">
            <p class="p">
                <span class="fl">订单编号</span>
                <span class="fr"><?php echo $order_info['order_sn']; ?></span>
            </p>
            <p class="p">
                <span class="fl">下单时间</span>
                <span class="fr"><span><?php echo date('Y-m-d  H:i:s', $order_info['add_time']); ?></span></span>
            </p>
            <p class="p">
                <span class="fl">收货地址</span>
                <span class="fr"><?php echo $region_list[$order_info[province]]; ?>&nbsp;<?php echo $region_list[$order_info[city]]; ?>&nbsp;<?php echo $region_list[$order_info[district]]; ?>&nbsp;<?php echo $order_info[address]; ?></span>
            </p>
            <p class="p">
                <span class="fl">收货人</span>
                <span class="fr"><span><?php echo $order_info['consignee']; ?></span><span><?php echo $order_info['mobile']; ?></span></span>
            </p>
            <p class="p">
                <span class="fl">支付方式</span>
                <span class="fr">
                    <?php if($order_info[pay_status] == 1 and empty($order_info['pay_name'])): ?>
                        其他支付
                        <?php else: ?>
                        <?php echo $order_info['pay_name']; endif; ?>
                </span>
            </p>
            <p class="p">
                <span class="fl">配送方式</span>
                <?php if($order_info['shop_way'] == 1): ?>
                    <span class="fr"><?php echo $order_info['shipping_name']; ?></span>
                <?php elseif($order_info['shop_way'] == 2): ?>
                    <span class="fr">工厂店配送</span>
                <?php elseif($order_info['shop_way'] == 3): ?>
                    <span class="fr">工厂店自提</span>
                <?php endif; ?>
            </p>
            <?php if($order_info['shop_way'] == 2 || $order_info['shop_way'] == 3): ?>
                <p class="p">
                    <span class="fl">服务工厂店</span>
                    <span class="fr"><?php echo $order_info['shipping_name']; ?></span>
                </p>
            <?php endif; ?>
            <p class="p">
                <span class="fl">买家留言</span>
                <span class="fr"><?php echo $order_info['user_note']; ?></span>
            </p>
            <?php if($order_info['order_prom_type'] == 4): if($order_info['pre_sell_is_finished'] == 2): ?>
                    <p class="p">
                        <span class="fl">订单关闭</span>
                        <span class="fr">商家取消活动，返还订金</span>
                    </p>
                <?php endif; if($order_info['pre_sell_is_finished'] == 1): if(time() > $order_info['pre_sell_retainage_end']): ?>
                        <p class="p">
                            <span class="fl">订单关闭</span>
                            <span class="fr">已过支付尾款时间</span>
                        </p>
                    <?php endif; endif; endif; ?>
        </div>
    </div>
</div>
<div class="information_dr ma-to-20">
    <div class="maleri30">
        <div class="tit">
            <h2>价格信息</h2>
        </div>
        <div class="xx-list">
            <?php if($order_info['order_prom_type'] != 4): ?>
                <p class="p">
                    <span class="fl">商品总价</span>
                    <span class="fr"><span>￥</span><span><?php echo $order_info['goods_price']; ?></span>元</span>
                </p>
                <p class="p">
                    <span class="fl">运费</span>
                    <span class="fr"><span>￥</span><span><?php echo $order_info['shipping_price']; ?></span>元</span>
                </p>
                <p class="p">
                    <span class="fl">优惠券</span>
                    <span class="fr"><span>-￥</span><span><?php echo $order_info['coupon_price']; ?></span>元</span>
                </p>
                <p class="p">
                    <span class="fl">活动优惠</span>
                    <span class="fr"><span>-￥</span><span><?php echo $order_info['order_prom_amount']; ?></span>元</span>
                </p>
                <p class="p">
                    <span class="fl">积分</span>
                    <span class="fr"><span>-￥</span><span><?php echo $order_info['integral_money']; ?></span>元</span>
                </p>
            <?php endif; ?>
            <p class="p">
                <span class="fl">余额</span>
                <span class="fr"><span>-￥</span><span><?php echo $order_info['user_money']; ?></span>元</span>
            </p>
            <!-- 预售商品 start -->
            <?php if($order_info['order_prom_type'] == 4 AND $order_info['paid_money'] > 0): if($order_info['pay_status'] == 1): ?>
                    <p class="p">
                        <span class="fl">已付尾款</span>
                        <span class="fr"><span>-￥</span><span><?php echo $order_info['order_amount']; ?></span>元</span>
                    </p>
                <?php endif; ?>
                <p class="p">
                    <span class="fl">已付订金</span>
                    <span class="fr"><span>-￥</span><span><?php echo $order_info['paid_money']; ?></span>元</span>
                </p>
                <p class="p">
                    <span class="fl">发货时间</span>
                    <span class="fr"><span><?php echo $order_info['pre_sell_deliver_goods']; ?></span></span>
                </p>
            <?php endif; ?>
            <!-- 预售商品 end -->
            <p class="p">
                <span class="fl">应付总额</span>
                <span class="fr red"><span>￥</span><span><?php echo $order_info['order_amount']; ?></span>元</span>
            </p>
        </div>
    </div>
</div>

<!--取消订单-s-->
<div class="losepay closeorder" style="display: none;">
    <div class="maleri30">
        <p class="con-lo">取消订单后,存在促销关系的子订单及优惠可能会一并取消。是否继续？</p>
        <div class="qx-rebd">
            <a class="ax">取消</a>
            <?php if($order_info['pay_status'] == 0): ?>
                <a class="are" onclick="cancel_order(<?php echo $order_info['order_id']; ?>)">确定</a>
            <?php endif; if($order_info['pay_status'] == 1): ?>
                <a class="are" href="<?php echo U('Order/refund_order', ['order_id'=>$order_info['order_id']]); ?>">取消订单</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--取消订单-e-->

<div class="mask-filter-div" style="display: none;"></div>

<!--底部支付栏-s-->
<div class="payit ma-to-20">
    <!--<div class="fl">-->
            <!--<p><span class="pmo">实付金额：</span>-->
                <!--<span>￥</span><span><?php echo $order_info['order_amount']+$order_info['shipping_price']; ?></span>-->
            <!--</p>-->
            <!--<p class="lastime"><span>付款剩余时间：</span><span id="lasttime"></span></p>-->
            <!--&lt;!&ndash;<p class="deel"><a href="<?php echo U('Mobile/User/order_del',array('order_id'=>$order_info['order_id'])); ?>">删除订单</a></p>&ndash;&gt;-->
    <!--</div>-->
    <div class="fr s">
        <?php if($order_info['pay_btn'] == 1): ?>
            <a href="<?php echo U('Mobile/Cart/cart4',array('order_id'=>$order_info['order_id'])); ?>">立即付款</a>
            <?php else: ?>
            <!--<a><?php echo $order_info['order_status_desc']; ?></a>-->
        <?php endif; if($order_info['receive_btn'] == 1): ?>
            <a href="<?php echo U('Mobile/Order/order_confirm',array('id'=>$order_info['order_id'])); ?>">收货确认</a>
        <?php endif; if($order_info['shipping_btn'] == 1): ?>
            <a href="<?php echo U('Mobile/User/express',array('order_id'=>$order_info['order_id'])); ?>" >查看物流</a>
        <?php endif; if($order_info['order_prom_type'] == 4 AND $order_info['pay_status'] == 2 AND $order_info['pre_sell_is_finished'] == 1 AND (time() >= $order_info['pre_sell_retainage_start'] AND time() <= $order_info['pre_sell_retainage_end'])): ?>
            <a href="<?php echo U('/Home/Cart/cart4',array('order_id'=>$order_info[order_id])); ?>'">支付尾款</a>
        <?php endif; ?>
    </div>
</div>
<!--底部支付栏-d-->

<script type="text/javascript">
    //取消订单按钮
    $('.closeorder_butt').click(function(){
        $('.mask-filter-div').show();
        $('.losepay').show();
    })
    //取消取消订单
    $('.qx-rebd .ax').click(function(){
        $('.mask-filter-div').hide();
        $('.losepay').hide();
    })

    //确认取消订单
    function cancel_order(id){
        $.ajax({
            type: 'GET',
            dataType:'JSON',
            url:"/index.php?m=Mobile&c=Order&a=cancel_order&id="+id,
            success:function(data){
                if(data.code == 1){
                    layer.open({content:data.msg,time:2});
                    location.href = "/index.php?m=Mobile&c=Order&a=order_detail&id="+id;
                }else{
                    layer.open({content:data.msg,time:2});
                    location.href = "/index.php?m=Mobile&c=Order&a=order_detail&id="+id;
                    return false;
                }
            },
            error:function(){
                layer.open({content:'网络异常，请稍后重试',time:3});
            },
        });
        $('.mask-filter-div').hide();
        $('.losepay').hide();
    }


    //        $('.loginsingup-input .lsu i').click(function(){
    //            $(this).toggleClass('eye');
    //            if ($(this).hasClass('eye')) {
    //                $(this).siblings('input').attr('type','text')
    //            } else{
    //                $(this).siblings('input').attr('type','password')
    //            }
    //        });
</script>
</body>
</html>
