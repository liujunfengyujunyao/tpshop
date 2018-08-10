<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./template/mobile/new2/order\comment.html";i:1512439864;s:41:"./template/mobile/new2/public\header.html";i:1512439863;s:45:"./template/mobile/new2/public\header_nav.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>我的评价--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
            <a href="<?php echo U('/Mobile/User/index'); ?>"><img src="__STATIC__/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>我的评价</span>
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
<div class="pjiscion p after-set-li">
    <ul>
        <a href="<?php echo U('Mobile/Order/comment',array('status'=>-1)); ?>">
            <li <?php if(\think\Request::instance()->param('status') == -1): ?>class="red"<?php endif; ?>>
                <p>全部评价</p><p></p>
            </li>
        </a>
        <a href="<?php echo U('Mobile/Order/comment',array('status'=>0)); ?>" >
            <li <?php if(\think\Request::instance()->param('status') == 0): ?>class="red"<?php endif; ?>>
                <p>待评价</p><p></p>
            </li>
        </a>
        <a href="<?php echo U('Mobile/Order/comment',array('status'=>1)); ?>">
            <li <?php if(\think\Request::instance()->param('status') == 1): ?>class="red"<?php endif; ?>>
                <p>已评价</p><p></p>
            </li>
        </a>
    </ul>
</div>
<div class="quedbox bg_white">
    <!--<div class="sonfbst">-->
        <!--<div class="maleri30">-->
            <!--<span><i class="fbs"></i>立即发表评价晒图，最多可获得50积分</span>-->
        <!--</div>-->
    <!--</div>-->
    <?php if(empty($comment_list)): ?>
        <div class="nonenothing">
            <img src="__STATIC__/images/nothing.png"/>
            <p>没找到相关记录</p>
            <a href="<?php echo U('Mobile/Index/index'); ?>">去逛逛</a>
        </div>
<?php else: ?>
    <div class="fukcuid mae">
        <div class="maleri30">
            <?php if(is_array($comment_list) || $comment_list instanceof \think\Collection || $comment_list instanceof \think\Paginator): if( count($comment_list)==0 ) : echo "" ;else: foreach($comment_list as $key=>$v1): ?>
                <div class="shopprice dapco p">
                    <div class="img_or fl"><img src="<?php echo goods_thum_images($v1[goods_id],200,200); ?>"></div>
                    <div class="fon_or fl">
                        <h2 class="similar-product-text">
                            <a href="<?php echo U('Goods/goodsInfo',array('id'=>$v1[goods_id])); ?>"><?php echo $v1[goods_name]; ?></a>
                        </h2>
                        <p class="pall0">购买时间：<?php echo date('Y-m-d H:i',$v1['add_time']); ?></p>
                    </div>
                    <div class="dyeai">
                        <?php if($v1[is_comment] == 0): ?>
                            <a class="compj" href="<?php echo U('Mobile/Order/add_comment',array('rec_id'=>$v1[rec_id])); ?>"><i class="said"></i>评价订单</a>
                        <?php else: ?>
                            <a class="compj nomar" href="<?php echo U('Mobile/Order/order_detail',array('id'=>$v1[order_id])); ?>"><i class="said c23"></i>查看订单</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
<script type="text/javascript" src="__STATIC__/js/sourch_submit.js"></script>
<script type="text/javascript">
    /**
     * ajax加载更多商品
     */
    var  page = 1;
    function ajax_sourch_submit()
    {
        ++page;
        $.ajax({
            type : "GET",
            url:"/index.php?m=Mobile&c=Order&a=comment&is_ajax=1&status=<?php echo \think\Request::instance()->param('status'); ?>&p="+page,
            success: function(data) {
                if ($.trim(data) == '') {
                    $('#getmore').hide();
                    return false;
                } else {
                    $('.maleri30').append(data);
                }
            }
        });
    }
</script>
</body>
</html>
