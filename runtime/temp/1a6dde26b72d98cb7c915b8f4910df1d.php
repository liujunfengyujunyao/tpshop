<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:51:"./template/mobile/new2/store\return_goods_list.html";i:1512439835;s:41:"./template/mobile/new2/public\header.html";i:1512439863;s:45:"./template/mobile/new2/public\header_nav.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>退换货订单--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
            <a href="javascript:history.back(-1);"><img src="__STATIC__/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>退换货订单</span>
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
<!--进度查询-s-->
    <div class="attention-shoppay" id="list" >
        <?php if(empty($list)): ?>
            <!--没有进度-s-->
            <div class="comment_con p">
                <div class="none"><img src="__STATIC__/images/none.png"><br><br>亲，此处还没有进度哦~</div>
            </div>
            <!--没有进度-e-->
        <?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$item): ?>
                <div class="searchsh"></div>
                <div class="severde tuharecha">
                <div class="myorder p">
                    <div class="content30">
                        <div class="order">
                            <div class="fl">
                                <span>服务单号：<em><?php echo $item[id]; ?></em></span>
                            </div>
                            <div class="fr">
                                <span class="red">
                                    <?php echo $state[$item[status]]; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="myorder p">
                    <div class="content30">
                        <a href="<?php echo U('Mobile/Store/return_goods_info',array('id'=>$item[id])); ?>">
                            <div class="order">
                                <div class="fl">
                                    <span>
                                        <?php if($item[status] == -2): ?>该用户的服务单已经取消<?php endif; if($item[status] == -1): ?>很抱歉！该用户的服务单未通过审核<?php endif; if($item[status] == 0): ?>该用户的服务单已申请成功，待售后审核中 <?php endif; if($item[status] == 1): ?>该用户的服务单已通过审核<?php endif; if($item[status] == 2 and $item[type] == 1): ?>卖家已收到该用户寄回的物品,卖家已重新发货<?php endif; if($item[status] == 3): ?>该用户的服务单完成<?php endif; ?>
                                    </span>
                                </div>
                                <div class="fr">
                                    <i class="Mright"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                    <!--商品信息-s-->
                        <div class="sc_list se_sclist paycloseto">
                            <div class="maleri30">
                                <div class="shopimg fl">
                                    <img src="<?php echo goods_thum_images($item['goods_id'],100,100); ?>">
                                </div>
                                <div class="deleshow fr">
                                    <div class="deletes">
                                        <a class="daaloe"><?php echo $goodsList[$item[goods_id]]; ?></a>
                                    </div>
                                    <div class="qxatten">
                                        <p class="weight"><span>申请时间：</span><span><?php echo date('Y-m-d H:i:s',$item[addtime]); ?></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--商品信息-e-->
                <div class="xomjdche">
                    <div class="maleri30">
                        <a href="<?php echo U('Mobile/Store/return_goods_info',array('id'=>$item[id])); ?>">进度查询</a>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
<!--进度查询-e-->
<script type="text/javascript" src="__STATIC__/js/sourch_submit.js"></script>
<script type="text/javascript">
    /**
     *加载更多
     */
    var  page = 1;
    function ajax_sourch_submit()
    {
        ++page;
        $.ajax({
            type : "GET",
            url:"/index.php?m=Mobile&c=User&a=return_goods_list",
            data:{is_ajax:1,p:page},
            success: function(data)
            {
                if(data == '')
                    $('#getmore').hide();
                else
                {
                    $("#list").append(data);
                }
            }
        });
    }
</script>
</body>
</html>
