<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:44:"./template/mobile/new2/store\lower_list.html";i:1513213325;s:41:"./template/mobile/new2/public\header.html";i:1512439863;s:45:"./template/mobile/new2/public\header_nav.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的团队</title>
    <link rel="stylesheet" type="text/css" href="__STATIC__/distribut/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/style.css"/>
    <script src="__STATIC__/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="__STATIC__/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>
</head>
<body class="bag_gray2">
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>店会员--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
            <a href="<?php echo U('Mobile/Store/index'); ?>"><img src="__STATIC__/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>店会员</span>
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
<?php if(!empty($lists)): ?>
    <div id="lower-list">
        <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): if( count($lists)==0 ) : echo "" ;else: foreach($lists as $key=>$v): ?>
            <div class="my_team_alon p">
                    <div class="team_head">
                        <img src="<?php echo (isset($v[head_pic]) && ($v[head_pic] !== '')?$v[head_pic]:'__STATIC__/images/headpic.jpg'); ?>"/>
                    </div>
                    <div class="team_name_time">
                        <span class="t_n"><?php echo $v[nickname]; ?></span>
                    </div>
                    <span class="team_price"><?php echo $v[mobile]; ?></span>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
<?php else: ?>
    <!--没有内容时-s-->
    <div class="comment_con p">
        <div style="padding:1rem;text-align: center;font-size: .59733rem;color: #777777;"><img src="__STATIC__/images/none.png"/><br /><br />您还没有下线，快去邀请好友吧~</div>
    </div>
    <!--没有内容时-e-->
<?php endif; ?>
</body>
</html>
