<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:39:"./template/mobile/new2/store\apply.html";i:1512439835;s:41:"./template/mobile/new2/public\header.html";i:1512439863;s:45:"./template/mobile/new2/public\header_nav.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>工厂店补货申请--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
            <span>工厂店补货申请</span>
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

<div class="allaccounted" id="apply">
    <div class="maleri30">
        <?php if(empty($list)): ?>
            <div class="ma-to-20">
                <div class="nonenothing">
                    <img src="__STATIC__/images/none.png"/>
                    <p>暂无记录</p>
                </div>
            </div>
        <?php else: ?>
            <div class="allpion">
                <div class="fll_acc fll_acc-h storenav">
                    <ul>
                        <li class="orderid-h">申请时间</li>
                        <li class="price-h"><span class="lb"></span><i></i></li>
                        <li class="time-h">操作</li>
                    </ul>
                </div>
                <div class="fil_all_comm">
                    <div class="maleri30">
                        <ul>
                            <li class="<?php if(\think\Request::instance()->param('status') == ''): ?>on<?php endif; ?>" style="display:none">状态</li>
                            <li>
                                <a href="<?php echo U('Mobile/Store/apply',array('status'=>0)); ?>" class="<?php if(\think\Request::instance()->param('status') == '0'): ?>on red<?php endif; ?>">全部</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Mobile/Store/apply',array('status'=>1)); ?>" class="<?php if(\think\Request::instance()->param('status') == 1): ?>on red <?php endif; ?>">处理中</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Mobile/Store/apply',array('status'=>2)); ?>" class="<?php if(\think\Request::instance()->param('status') == 2): ?>on red<?php endif; ?>">已处理</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
                    <div class="fll_acc">
                        <div class="des-h">
                            <span>物流名称：<?php echo (isset($vo['express_name']) && ($vo['express_name'] !== '')?$vo['express_name']:"无"); ?></span>
                            <span style="float: right;">物流单号：<?php echo (isset($vo['express_code']) && ($vo['express_code'] !== '')?$vo['express_code']:"无"); ?></span>
                        </div>
                        <ul>
                            <li class="orderid-h">
                                <?php if($vo['addtime'] == null): ?>
                                    无
                                <?php else: ?>
                                    <p><?php echo date("Y-m-d H:i:s",$vo['addtime']); ?></p>
                                <?php endif; ?>
                            </li>
                            <li class="price-h">
                                <?php if($vo[status] == 0): ?>处理中<?php endif; if($vo[status] == 1): ?>已处理<?php endif; if($vo[status] == 2): ?>申请失败<?php endif; ?>
                            </li>
                            <li class="time-h">
                                <a href="<?php echo U('Mobile/Store/apply_info', array('id'=>$vo['id'])); ?>">查看详情</a>
                                <?php if($vo['delivery_id']): ?>
                                    <span>|</span>
                                    <a href="<?php echo U('Mobile/Store/delivery_info', array('id'=>$vo['delivery_id'])); ?>">发货单</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    $(function(){
        //显示综合筛选弹窗
        $('.storenav .lb').click(function(){
            $('.fil_all_comm').show();
            cover();
            $('.classreturn,.fll_acc-h').addClass('pore');
        });
        $('.lb').text($('.on').text());
    })
</script>