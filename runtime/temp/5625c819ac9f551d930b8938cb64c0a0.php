<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:44:"./template/mobile/new2/store\rebate_log.html";i:1512439835;s:41:"./template/mobile/new2/public\header.html";i:1512439863;s:45:"./template/mobile/new2/public\header_nav.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>收益明细--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
<body class="">

<div class="classreturn loginsignup ">
    <div class="content">
        <div class="ds-in-bl return">
            <a href="javascript:history.back(-1)"><img src="__STATIC__/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>收益明细</span>
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
<style>
    .fll_acc ul li{
        font-size: .5rem;
    }
</style>
<div class="allaccounted">
    <div class="maleri30">
        <?php if(empty($lists) || (($lists instanceof \think\Collection || $lists instanceof \think\Paginator ) && $lists->isEmpty())): ?>
            <!--没有内容时-s-->
            <div class="comment_con p">
                <div style="padding:1rem;text-align: center;font-size: .59733rem;color: #777777;"><img src="__STATIC__/images/none.png"/><br /><br />暂无记录</div>
            </div>
            <!--没有内容时-e-->
        <?php else: ?>
            <div class="allpion">
                <div class="fll_acc fll_acc-h">
                    <ul>
                        <li class="orderid-h">订单编号</li>
                        <li class="price-h">分成金额</li>
                        <li class="time-h">分成时间</li>
                    </ul>
                </div>
                <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): if( count($lists)==0 ) : echo "" ;else: foreach($lists as $key=>$v): ?>
                    <div class="fll_acc">
                        <ul>
                            <li class="orderid-h">
                                <p><a href="<?php echo U('/Mobile/Store/order_detail',array('id'=>$v['order_id'])); ?>"><?php echo $v[order_sn]; ?></a></p>
                            </li>
                            <li class="price-h">
                                <p><span class="red">￥<?php echo $v[money]; ?></span></p>
                            </li>
                            <li class="time-h">
                                <p><span><?php echo date('Y-m-d H:i:s',$v[confirm_time]); ?></span></p>
                            </li>
                        </ul>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<script type="text/javascript" src="__STATIC__/js/sourch_submit.js"></script>
</body>
</html>