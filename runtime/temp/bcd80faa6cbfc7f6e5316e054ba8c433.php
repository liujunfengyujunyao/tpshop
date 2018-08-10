<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:44:"./template/mobile/new2/order\order_list.html";i:1512439864;s:41:"./template/mobile/new2/public\header.html";i:1512439863;s:45:"./template/mobile/new2/public\header_nav.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>我的订单--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
            <a href="<?php echo U('/Mobile/User/index'); ?>"><img src="__STATIC__/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>我的订单</span>
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
<div class="tit-flash-sale p mytit_flash">
    <div class="maleri30">
        <ul class="">
            <li <?php if(\think\Request::instance()->param('type') == ''): ?>class="red"<?php endif; ?>>
                <a href="<?php echo U('/Mobile/Order/order_list'); ?>" class="tab_head">全部订单</a>
            </li>
            <li id="WAITPAY" <?php if(\think\Request::instance()->param('type') == 'WAITPAY'): ?>class="red"<?php endif; ?>">
                <a href="<?php echo U('/Mobile/Order/order_list',array('type'=>'WAITPAY')); ?>" class="tab_head" >待付款</a>
            </li>
            <li id="WAITSEND" <?php if(\think\Request::instance()->param('type') == 'WAITSEND'): ?>class="red"<?php endif; ?>>
                <a href="<?php echo U('/Mobile/Order/order_list',array('type'=>'WAITSEND')); ?>"  class="tab_head">待发货</a>
            </li>
            <!--<li id="WAITRECEIVE"><a href="<?php echo U('/Mobile/User/order_list',array('type'=>'WAITRECEIVE')); ?>"  class="tab_head <?php if(\think\Request::instance()->param('type') == 'WAITRECEIVE'): ?>on<?php endif; ?>">待收货</a></li>-->
            <li id="WAITCCOMMENT"  <?php if(\think\Request::instance()->param('type') == 'WAITCCOMMENT'): ?>class="red"<?php endif; ?>>
                <a href="<?php echo U('/Mobile/Order/order_list',array('type'=>'WAITCCOMMENT')); ?>" class="tab_head">已完成</a>
            </li>
        </ul>
    </div>
</div>

    <!--订单列表-s-->
    <div class="ajax_return">
        <?php if(count($lists) == 0): ?>
            <!--没有内容时-s--->
            <div class="comment_con p">
                <div class="none">
                    <img src="__STATIC__/images/none2.png">
                    <br><br>
                    抱歉未查到数据！
                    <div class="paiton">
                        <div class="maleri30">
                            <a class="soon" href="/"><span>去逛逛</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--没有内容时-e--->
        <?php endif; if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
            <div class="mypackeg ma-to-20 getmore">
                <div class="packeg p">
                    <div class="maleri30">
                        <div class="fl">
                            <h1><span></span><span class="bgnum"></span></h1>
                            <p class="bgnum"><span>订单编号:</span><span><?php echo $list['order_sn']; ?></span></p>
                        </div>
                        <div class="fr">
                            <span><?php echo $list['order_status_desc']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="shop-mfive p">
                    <div class="maleri30">
                        <?php if(is_array($list['goods_list']) || $list['goods_list'] instanceof \think\Collection || $list['goods_list'] instanceof \think\Paginator): if( count($list['goods_list'])==0 ) : echo "" ;else: foreach($list['goods_list'] as $key=>$good): ?>
                            <div class="sc_list se_sclist paycloseto">
                                <a <?php if($list['receive_btn'] == 1): ?>href="<?php echo U('/Mobile/Order/order_detail',array('id'=>$list['order_id'],'waitreceive'=>1)); ?>" <?php else: ?> href="<?php echo U('/Mobile/Order/order_detail',array('id'=>$list['order_id'])); ?>"<?php endif; ?>>
                                <div class="shopimg fl">
                                    <img src="<?php echo goods_thum_images($good[goods_id],200,200); ?>">
                                </div>
                                <div class="deleshow fr">
                                    <div class="deletes">
                                        <span class="similar-product-text"><?php echo getSubstr($good[goods_name],0,20); ?></span>
                                    </div>
                                    <div class="deletes">
                                        <span class="similar-product-text"><?php echo $good['spec_key_name']; ?></span>
                                    </div>
                                    <div class="prices  wiconfine">
                                        <p class="sc_pri"><span>￥</span><span><?php echo $good[member_goods_price]; ?></span></p>
                                    </div>
                                    <div class="qxatten  wiconfine">
                                        <p class="weight"><span>数量</span>&nbsp;<span><?php echo $good[goods_num]; ?></span></p>
                                    </div>
                                    <div class="buttondde">
                                        <?php if(($list[return_btn] == 1) and ($good[is_send] < 2)): ?>
                                            <a href="<?php echo U('Mobile/Order/return_goods',['rec_id'=>$good['rec_id']]); ?>">申请售后</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                </a>
                            </div>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="shop-rebuy-price p">
                    <div class="maleri30">
                <span class="price-alln">
                    <!--<span class="red">￥<?php echo $list['order_amount']; ?></span><span class="threel">共<?php echo count($list['goods_list']); ?>件</span>-->
                    <span class="red">￥<?php echo $list['order_amount']; ?></span><span class="threel" id="goodsnum">共<?php echo $list['count_goods_num']; ?>件</span>
                </span>
                        <?php if($list['pay_btn'] == 1): ?>
                            <a class="shop-rebuy paysoon" href="<?php echo U('Mobile/Cart/cart4',array('order_id'=>$list['order_id'])); ?>">立即付款</a>
                        <?php endif; if($list['cancel_btn'] == 1): if($list['pay_status'] == 0): ?>
                                <a class="shop-rebuy " onClick="cancel_order(<?php echo $list['order_id']; ?>)">取消订单</a>
                            <?php endif; if($list['pay_status'] == 1): ?>
                                <a class="shop-rebuy" href="<?php echo U('Order/refund_order', ['order_id'=>$list['order_id']]); ?>">取消订单</a>
                            <?php endif; endif; if($list['receive_btn'] == 1): ?>
                            <a class="shop-rebuy paysoon" onclick="orderConfirm(<?php echo $list['order_id']; ?>)">确认收货</a>
                        <?php endif; if($list['comment_btn'] == 1): ?>
                            <a class="shop-rebuy" href="<?php echo U('/Mobile/Order/comment'); ?>">评价</a>
                        <?php endif; if($list['shipping_btn'] == 1): ?>
                            <a class="shop-rebuy" class="shop-rebuy" href="<?php echo U('Mobile/User/express',array('order_id'=>$list['order_id'])); ?>">查看物流</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!--订单列表-e-->
<script type="text/javascript" src="__STATIC__/js/sourch_submit.js"></script>
<script type="text/javascript">
    /**
     * 取消订单
     */
    function cancel_order(id){
        if(!confirm("确定取消订单?"))
            return false;
        $.ajax({
            type: 'GET',
            dataType:'JSON',
            url:"/index.php?m=Mobile&c=Order&a=cancel_order&id="+id,
            success:function(data){
                if(data.code == 1){
                    layer.open({content:data.msg,time:2});
                    location.href = "/index.php?m=Mobile&c=Order&a=order_list";
                }else{
                    layer.open({content:data.msg,time:2});
                    location.href = "/index.php?m=Mobile&c=Order&a=order_list";
                    return false;
                }
            },
            error:function(){
                layer.open({content:'网络异常，请稍后重试',time:3});
            },
        });
    }

    /**
     * 确定收货
     */
    function orderConfirm(id){
        if(!confirm("确定收到该订单商品吗?"))
            return false;
        location.href = "/index.php?m=Mobile&c=Order&a=order_confirm&id="+id;
    }

    var  page = 1;
    /**
     *加载更多
     */
    function ajax_sourch_submit()
    {
        page += 1;
        $.ajax({
            type : "GET",
            url:"/index.php?m=Mobile&c=Order&a=order_list&type=<?php echo \think\Request::instance()->param('type'); ?>&is_ajax=1&p="+page,//+tab,
            success: function(data)
            {
                if(data == '')
                    $('#getmore').hide();
                else
                {
                    $(".ajax_return").append(data);
                    $(".m_loading").hide();
                }
            }
        });
    }
</script>
</body>
</html>
