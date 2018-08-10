<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:44:"./template/mobile/new2/store\order_list.html";i:1512439835;s:41:"./template/mobile/new2/public\header.html";i:1512439863;s:45:"./template/mobile/new2/public\header_nav.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>订单管理--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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

<script src="__PUBLIC__/js/layer/layer.js" type="text/javascript"></script>
<div class="classreturn loginsignup ">
    <div class="content">
        <div class="ds-in-bl return">
            <a href="javascript:history.back(-1)"><img src="__STATIC__/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>订单管理</span>
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
            <a href="<?php echo U('Store/order_list'); ?>" class="tab_head">全部订单</a>
        </li>
        <li id="WAITPAY" <?php if(\think\Request::instance()->param('type') == 'WAITPAY'): ?>class="red"<?php endif; ?>>
            <a href="<?php echo U('Store/order_list',array('type'=>'WAITPAY')); ?>" class="tab_head">待付款</a>
        </li>
        <li id="WAITSEND" <?php if(\think\Request::instance()->param('type') == 'WAITSEND'): ?>class="red"<?php endif; ?>>
            <a href="<?php echo U('Store/order_list',array('type'=>'WAITSEND')); ?>" class="tab_head">待发货</a>
        </li>
        <li id="ZITI" <?php if(\think\Request::instance()->param('type') == 'ZITI'): ?>class="red"<?php endif; ?>>
            <a href="<?php echo U('Store/order_list',array('type'=>'ZITI')); ?>" class="tab_head">自提</a>
        </li>
        <li>
            <a href="<?php echo U('Store/return_goods_list'); ?>" class="tab_head">退换货</a>
        </li>
    </ul>
    </div>
</div>

<!-- 订单列表Start -->
<div class="ajax_return">
    <?php if(empty($lists)): ?>
    <!-- 没有内容 Start -->
    
    <div class="comment_con p">
        <div class="none">
            <img src="__STATIC__/images/non2.png"/>
            <br><br>
            抱歉,未查询到数据!
            <div class="paiton">
                <div class="maleri30">
                    <a class="soon" href="/"><span>去逛逛</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- 没有内容 End -->
    <?php else: ?>
    <!-- 列表Start -->
    <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): if( count($lists)==0 ) : echo "" ;else: foreach($lists as $key=>$vo): ?>
        <div class="mypackeg ma-to-20 getmore">
            <div class="packeg p">
                <div class="maleri30">
                    <div class="fl">
                        <p class="bgnum" style="width: 8.6667rem"><span>订单编号:</span><span><?php echo $vo['order_sn']; ?></span></p>
                    </div>
                    <div class="fr">
                        <span>收益：
                        <?php if($vo['income'] == ''): ?>
                            等待分成
                        <?php else: ?>
                            ￥<?php echo $vo['income']; endif; ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="shop-mfive p">
                <div class="maleri30">
                <?php if(is_array($vo['goods_list']) || $vo['goods_list'] instanceof \think\Collection || $vo['goods_list'] instanceof \think\Paginator): if( count($vo['goods_list'])==0 ) : echo "" ;else: foreach($vo['goods_list'] as $key=>$goods): ?>
                    <div class="sc_list se_sclist paycloseto">
                        <a href="<?php echo U('Store/order_detail',array('id'=>$goods['order_id'])); ?>">
                            <div class="shopimg fl">
                                <img src="<?php echo goods_thum_images($goods[goods_id],200,200); ?>"/>
                            </div>
                            <div class="deleshow fr">
                                <div class="deletes">
                                    <span class="similar-product-text"><?php echo getSubstr($goods[goods_name],0,20); ?></span>
                                </div>
                                <div class="deletes">
                                    <span class="similar-product-text"><?php echo $goods['spec_key_name']; ?></span>
                                </div>
                                <div class="price wiconfine">
                                    <p class="sc_pri"><span>￥<?php echo $goods['member_goods_price']; ?></span></p>
                                </div>
                                <div class="qxatten wiconfine">
                                    <p class="weight"><span>数量</span>&nbsp;<span><?php echo $goods[goods_num]; ?></span></p>
                                </div>
                                <!-- <div class="buttondde">
                                    <a href="#">申请售后</a>
                                </div> -->
                            </div>
                        </a>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <div class="shop-rebuy-price p">
                <div class="maleri30">
                    <span class="price-alln">
                        <span class="red">￥<?php echo $vo['total_amount']; ?></span>
                        <!-- <span class="threel" id="goodsnum">共<?php echo $vo['count_goods_num']; ?>件</span> -->
                    </span>

                    <?php if($vo[pay_status] == 0): ?>
                        <p class="shop-rebuy paysoon">
                            未支付
                        </p>
                    <?php elseif($vo[pay_status] == 1): if($vo[shipping_status] == 0 && $vo[shop_way] == 2): if($vo['order_status'] == 3): ?>
                                <p class="shop-rebuy paysoon">
                                    用户已取消
                                </p>
                            <?php else: ?>
                                <p class="inspect">
                                    <a class="shop-rebuy paysoon" href="javascript:void(0);" onClick="send_goods(<?php echo $vo['order_id']; ?>)">发货</a>
                                </p>
                            <?php endif; elseif($vo[shipping_status] == 1): if($vo[order_status] == 6): ?>
                                <p class="shop-rebuy paysoon">
                                    工厂店已发货
                                </p>
                            <?php elseif($vo[order_status] == 1): if($vo[shop_way] == 3): ?>
                                    <p>
                                        <a class="shop-rebuy paysoon" href="javascript:check_safecode(<?php echo $vo['order_id']; ?>)">自提校验</a>
                                    </p>
                                <?php else: ?>
                                    <p>
                                        <a class="shop-rebuy paysoon" href="javascript:void(0);" onClick="confirm(<?php echo $vo['order_id']; ?>)" >确认收货</a>
                                    </p>
                                <?php endif; elseif($vo[order_status] == 4): ?>
                                <p class="shop-rebuy paysoon">
                                    已完成
                                </p>
                            <?php elseif($vo[order_status] == 3): ?>
                                <p class="shop-rebuy paysoon">
                                    已取消
                                </p>
                            <?php elseif($vo[order_status] == 0): ?>
                                <p class="shop-rebuy paysoon">
                                    待确认
                                </p>
                            <?php elseif($vo[order_status] == 2): ?>
                                <p class="shop-rebuy paysoon">
                                    用户已收货
                                </p>
                            <?php else: ?>
                                <p class="shop-rebuy paysoon">
                                    待处理
                                </p>
                            <?php endif; elseif($vo[shipping_status] == 0): ?>
                            <p class="inspect">
                                <a class="shop-rebuy paysoon" href="javascript:void(0);" onClick="send_goods(<?php echo $vo['order_id']; ?>)">发货</a>
                            </p>
                        <?php else: endif; elseif($vo[pay_status] == 2): ?>
                        <p class="shop-rebuy paysoon">
                            部分支付
                        </p>
                    <?php elseif($vo[pay_status] == 3): ?>
                        <p class="shop-rebuy paysoon">
                            已退款
                        </p>
                    <?php else: ?>
                        <p class="shop-rebuy paysoon">
                            拒绝退款
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <!-- 列表End -->
    <?php endif; ?>
</div>
<!-- 订单列表End -->
<script type="text/javascript" src="__STATIC__/js/sourch_submit.js"></script>
<script type="text/javascript">
    $(function(){
        $('.s5clic').click(function(){
            $('.hid-derei').slideToggle(400);
            $(this).animate({opacity:"1"},200,function(){
                $(this).toggleClass('sxbb')
            })
        })
    })

    $(function() {
        var speed = 380;
        $('#nav ul li').click(function() {
            $(this).find('a').addClass('selected').parent().siblings().find('a').removeClass('selected')
            var pl = $(this).position().left;
            var liw = $(this).width();
            $('.wrap-line').stop().animate({
                left: pl,
                width: liw
            }, speed);
        })
    });

    /**
     * 校验自提码
     * 使用 公共的 layer 弹窗插件  参考官方手册 http://layer.layui.com/
     */
    function check_safecode(id)
    {
        if(id > 0){
            var url = "/index.php?m=Mobile&c=Store&a=check_safecode&call_back=call_back_fun&id="+id;
            layer.open({
                type: 2,
                title: '自提订单',
                shadeClose: true,
                shade: 0.8,
                area: ['250px', '300px'],
                content: url,
            });
        }else{
            alert("订单选择错误");
        }
        
    }
    // 校验自提码正确 回调函数
    function call_back_fun(v){
        layer.closeAll(); // 关闭窗口
        location.href = location.href;
    }

    //非自提 工厂店确认收货
    function confirm(id){
        layer.confirm('确定收货?', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    // 确定
                    location.href = "/index.php?m=Mobile&c=Store&a=confirm&id="+id;
                }, function(index){
                    layer.close(index);
                }
        );
    }

    //工厂店发货并生成发货单
    function send_goods(id){
        layer.confirm('确定收货并生成发货单?', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    // 确定
                    location.href = "/index.php?m=Mobile&c=Store&a=send_goods&id="+id;
                }, function(index){
                    layer.close(index);
                }
        );
    }
    

</script>
</body>
</html>