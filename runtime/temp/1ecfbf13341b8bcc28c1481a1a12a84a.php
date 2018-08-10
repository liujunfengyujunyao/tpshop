<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:46:"./template/mobile/new2/order\wait_receive.html";i:1512439864;s:41:"./template/mobile/new2/public\header.html";i:1512439863;s:45:"./template/mobile/new2/public\header_nav.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>待收货订单--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
<body class="f3">

<div class="classreturn loginsignup ">
    <div class="content">
        <div class="ds-in-bl return">
            <a href="javascript:history.back(-1)"><img src="__STATIC__/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>待收货订单</span>
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
<?php if(empty($order_list)): ?>
    <div class="nonenothing">
        <img src="__STATIC__/images/nothing.png"/>
        <p>暂无待收货商品</p>
        <a href="<?php echo U('Mobile/Index/index'); ?>">去逛逛</a>
    </div>
<?php else: if(is_array($order_list) || $order_list instanceof \think\Collection || $order_list instanceof \think\Paginator): if( count($order_list)==0 ) : echo "" ;else: foreach($order_list as $k=>$order): ?>
        <div class="quedbox">
            <div class="shpmi p">
                <div class="maleri30">
                    <div class="dinaot">
                        <span class="naem">订单号：<?php echo $order[order_sn]; ?></span>
                        <span class="red"><?php echo $order[order_status_desc]; ?></span>
                    </div>
                    <!--物流信息-s-->
                    <div class="wuliumess" id="wuliumess<?php echo $order['order_id']; ?>">
                        <?php if($order['shipping_status'] > 0): ?>
                        <script>
                            queryExpress();
                            function queryExpress()
                            {
                                var shipping_code = "<?php echo $order['shipping_code']; ?>";
                                var invoice_no = "<?php echo $order['invoice_no']; ?>";
                                var order_id = "<?php echo $order['order_id']; ?>"
                                $.ajax({
                                    type : "GET",
                                    dataType: "json",
                                    url:"/index.php?m=Home&c=Api&a=queryExpress&shipping_code="+shipping_code+"&invoice_no="+invoice_no,
                                    success: function(data){
                                        var html = '';
                                        if(data.status == 200){
                                            html +="<i class='yg'></i><p class='naem'>"+ data.data[0].context +"</p><p class='time'><span>"+ data.data[0].time +"</span></p>";
                                        }else{
                                            html +="<i class='yg'></i><p class='naem'>"+  data.message +"</p><p class='time'><span>  </span></p>";
                                        }
                                        $("#wuliumess"+order_id).html(html);
                                    },
                                });
                            }
                        </script>
                        <?php endif; ?>
                    </div>
                    <!--物流信息-e-->
                </div>
            </div>
            <?php if(is_array($order['goods_list']) || $order['goods_list'] instanceof \think\Collection || $order['goods_list'] instanceof \think\Paginator): if( count($order['goods_list'])==0 ) : echo "" ;else: foreach($order['goods_list'] as $key=>$good): ?>
                <div class="fukcuid">
                    <div class="maleri30">
                        <div class="shopprice">
                            <div class="img_or fl"><img src="<?php echo goods_thum_images($good[goods_id],200,200); ?>"></div>
                            <div class="fon_or fl">
                                <h2 class="similar-product-text"><a href="<?php echo U('Goods/goodsInfo',array('id'=>$good[goods_id])); ?>"><?php echo $good[goods_name]; ?></a></h2>
                            </div>
                            <div class="buttondde inherflo">
                                <?php if(($order[return_btn] == 1) and ($good[is_send] < 2)): ?>
                                    <a href="<?php echo U('Mobile/Order/return_goods',array('order_id'=>$order['order_id'],'order_sn'=>$order['order_sn'],'goods_id'=>$good['goods_id'],'spec_key'=>$good['spec_key'])); ?>">申请售后</a>
                                <?php endif; if($good[is_send] > 1): ?>
                                    <a class="applyafts">已申请售后</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="shijefu">
                <div class="maleri30">
                    <p>
                        <span class="fs24">共<em><?php echo $order['count_goods_num']; ?></em>件</span>
                        <span>实付款￥<em><?php echo $order['order_amount']; ?></em></span>
                    </p>
                    <p class="butna">
                        <!--<a href="">再次购买</a>-->
                        <a href="<?php echo U('Mobile/Order/order_detail',array('id'=>$order['order_id'],'waitreceive'=>1)); ?>">查看详情</a>
                        <a style="display: none" class="tuid" href="javascript:void(0);" onclick="expedite('<?php echo $order['order_id']; ?>')">我要催单</a>
                        <!--<a href="<?php echo U('Mobile/User/express',array('order_id'=>$order['order_id'])); ?>">查看物流</a>-->
                        <a class="red receipt" href="javascript:void(0);" >确认收货</a>
                    </p>
                </div>
            </div>
        </div>

        <!--我要催单弹窗-s-->
        <div class="cuidd" id="cuidd<?php echo $order['order_id']; ?>" >
            <p>您的订单已经交由<span class="red"><?php echo $order['shipping_name']; ?></span>进行配送，运单号为<span class="red"><?php echo $order['invoice_no']; ?></span></p>
            <div class="weiyi p">
                <a href="javascript:void(0);">取消</a>
                <a class="eno" href="<?php echo U('Mobile/User/express',array('order_id'=>$order['order_id'])); ?>">查看物流</a>
            </div>
        </div>
        <!--我要催单弹窗-e-->

        <!--确认收货弹窗-s-->
        <div class="surshko" id="surshko<?php echo $order['order_id']; ?>">
            <p>是否收到该订单商品？</p>
            <div class="weiyi p">
                <a href="javascript:void(0);">未收货</a>
                <a class="eno" href="<?php echo U('Mobile/Order/order_confirm',array('id'=>$order['order_id'])); ?>">已收货</a>
            </div>
        </div>
        <!--确认收货弹窗-e-->
    <?php endforeach; endif; else: echo "" ;endif; ?>

    <!--加载更多-s-->
    <!--<?php if(!(empty($order_list) || (($order_list instanceof \think\Collection || $order_list instanceof \think\Paginator ) && $order_list->isEmpty()))): ?>-->
        <!--<div id="getmore" style="font-size:.24rem;text-align: center;color:#888;padding:.25rem .24rem .4rem; clear:both">-->
            <!--<a href="javascript:void(0)" onClick="ajax_sourch_submit()"  style="color: #000000;font-size: 18px;text-decoration: none;">点击加载更多</a>-->
        <!--</div>-->
    <!--<?php endif; ?>-->
    <!--加载更多-e-->
<?php endif; ?>
<div class="mask-filter-div" style="display: none;"></div>
<script>
    var  page = 1;
    /**
     *加载更多
     */
    function ajax_sourch_submit()
    {
        page += 1;
        $.ajax({
            type : "GET",
            url:"/index.php?m=Mobile&c=Order&a=wait_receive&type=WAITRECEIVE&is_ajax=1&p="+page,
            success: function(data)
            {
                if(data == '')
                    $('#getmore').hide();
                else
                {
                    $("#getmore").before(data);
                }
            }
        });
    }
</script>
</body>
</html>
