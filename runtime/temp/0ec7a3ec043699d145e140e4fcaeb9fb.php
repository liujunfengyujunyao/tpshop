<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:43:"./template/mobile/new2/goods\goodsInfo.html";i:1512439862;s:41:"./template/mobile/new2/public\header.html";i:1512439863;s:42:"./template/mobile/new2/public\top_nav.html";i:1512439863;s:43:"./template/mobile/new2/public\wx_share.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>商品详情--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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

<style>
    .plusshopcar-buy .dis{
        background: #ebebeb;
        color: #999;
        cursor: not-allowed;
        pointer-events:none;
    }
</style>
<div class="he_sustain">
    <div class="classreturn loginsignup detail">
        <div class="content">
            <div class="ds-in-bl return">
                <a href="javascript:history.back(-1)"><img src="__STATIC__/images/return.png" alt="返回"></a>
            </div>
            <div class="ds-in-bl search center" id="topcenter">
                <span class="sxp">商品</span>
                <span>详情</span>
                <span>评论</span>
            </div>
            <div class="ds-in-bl menu">
                <a href="javascript:void(0);"><img src="__STATIC__/images/class1.png" alt="菜单"></a>
            </div>
        </div>
    </div>
</div>

<!--顶部隐藏菜单-s-->
<div class="flool tpnavf top-header-m">
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
<!--顶部隐藏菜单-e-->
<!--商品抢购 start-->
<!--商品s-->
<div class="xq_details">
    <div class="banner ban1 detailban">
        <div class="mslide" id="slideTpshop">
            <ul>
                <!--图片-s-->
                <?php if(is_array($goods_images_list) || $goods_images_list instanceof \think\Collection || $goods_images_list instanceof \think\Paginator): if( count($goods_images_list)==0 ) : echo "" ;else: foreach($goods_images_list as $key=>$pic): ?>
                    <li><a href="javascript:void(0)"><img src="<?php echo $pic[image_url]; ?>" alt=""></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <!--图片-e-->
            </ul>
        </div>
    </div>
    <div class="de_font p">
        <div class="thirty">
            <div class="fl">
                <span class="similar-product-text"><?php echo $goods['goods_name']; ?></span>
            </div>
            <div class="keep fr">
                <a href="javascript:collect_goods(<?php echo $goods['goods_id']; ?>);" id="favorite_add">
                    <i class=" <?php if($collect > 0): ?>red<?php endif; ?>"></i>
                    <span>收藏</span>
                </a>
            </div>
            <div class="scunde p">
                <p class="red" id="price">￥<?php echo $goods['shop_price']; ?></p>
                <div class="timeafter presale-time" style="display: none">
                    <p class="confinetime" id="activity_type"></p>
                    <p class="confinetime" id="overTime"></p>
                </div>
                <p><span id="market_price_title">市场价：</span><span class="linethr"><?php echo $goods['market_price']; ?></span></p>
                <p>
                    <?php if($goods['prom_type'] != 2): ?>销量：<span><?php echo $goods['sales_sum']; ?></span><?php endif; ?>
                    <span >
                        当前库存：<span class="spec_store_count"><?php echo $goods['store_count']; ?></span>
                    </span>
                </p>
            </div>
        </div>
    </div>
    <div class="floor list7 detailsfloo">
        <!-- 赠品信息-s -->
        <?php if($goods['send_id'] != null): ?>
            <div class="myorder p seedeadei">
                <div class="content30">
                    <div class="order">
                        <div class="fl">
                            <span class="firde red">赠品</span>
                            <span><a href="<?php echo U('Mobile/goods/goodsInfo',array('id'=>$send_goods_info['goods_id'])); ?>" class="red"><?php echo $send_goods_info['goods_name']; ?></a></span>
                        </div>
                        <div class="fr">
                            <i class="Mright"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- 赠品信息-e -->
        <div class="myorder p">
            <div class="content30">
                <a href="javascript:void(0)" onclick="locationaddress(this);">
                    <script type="text/javascript">
                        function locationaddress(e){
                            $('.container').animate({width: '14.4rem', opacity: 'show'}, 'normal',function(){
                                $('.container').show();
                            });
                            if(!$('.container').is(":hidden")){
                                $('body').css('overflow','hidden')
                                cover();
                                $('.mask-filter-div').css('z-index','9999');
                            }
                        }
                        function closelocation(){
                            var province_div = $('.province-list');
                            var city_div = $('.city-list');
                            var area_div = $('.area-list');
                            if(area_div.is(":hidden") == false){
                                area_div.hide();
                                city_div.show();
                                province_div.hide();
                                return;
                            }
                            if(city_div.is(":hidden") == false){
                                area_div.hide();
                                city_div.hide();
                                province_div.show();
                                return;
                            }
                            if(province_div.is(":hidden") == false){
                                area_div.hide();
                                city_div.hide();
                                $('.container').animate({width: '0', opacity: 'show'}, 'normal',function(){
                                    $('.container').hide();
                                });
                                undercover();
                                $('.mask-filter-div').css('z-index','inherit');
                                return;
                            }
                        }
                    </script>
                    <div class="order">
                        <div class="fl">
                            <span class="firde">所在地区</span>
                            <span id="address"></span>
                        </div>
                        <div class="fr">
                            <i class="Mright"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!--配送至-s-->
        <div class="container" >
            <div class="city">
                <div class="screen_wi_loc">
                    <div class="classreturn loginsignup">
                        <div class="content">
                            <div class="ds-in-bl return seac_retu">
                                <a href="javascript:void(0);" onclick="closelocation();"><img src="__STATIC__/images/return.png" alt="返回"></a>
                            </div>
                            <div class="ds-in-bl search center">
                                <span class="sx_jsxz">配送至</span>
                            </div>
                            <div class="ds-in-bl suce_ok">
                                <a href="javascript:void(0);">&nbsp;</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="province-list"></div>
                <div class="city-list" style="display:none"></div>
                <div class="area-list" style="display:none"></div>
            </div>
        </div>
        <!--配送至-e-->

        <!--运费-s-->
        <div class="myorder p">
            <div class="content30">
                <a class="remain" href="javascript:void(0);">
                    <div class="order">
                        <div class="fl">
                            <span class="firde">运费信息</span>
                            <span id="shipping_freight"></span>
                        </div>
                        <div class="fr">
                            <i class="Mright"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div id="balance" class="chidno"></div>
        <!--运费-s-->
        <div class="myorder p choise_num">
            <div class="content30">
                <a href="javascript:void(0)">
                    <div class="order">
                        <div class="fl">
                            <span class="firde">已选</span>
                            <span class="sel"></span>
                        </div>
                        <div class="fr">
                            <i class="Mright"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!--<div class="myorder p">-->
            <!--<div class="content30">-->
                <!--<a href="javascript:void(0)">-->
                    <!--<div class="order">-->
                        <!--<div class="fl">-->
                            <!--<span class="firde">服务</span>-->
                            <!--<span>由商城自营发货并提供售后服务</span>-->
                        <!--</div>-->
                        <!--<div class="fr">-->
                            <!--<i class="Mright gt"></i>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</a>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="myhearders myorder">-->
            <!--<div class="scgz descgz">-->
                <!--<ul>-->
                    <!--<li>-->
                        <!--<a href="javascript:void(0);">-->
                            <!--<img src="__STATIC__/images/hdfk.png">-->
                            <!--<p>货到付款</p>-->
                        <!--</a>-->
                    <!--</li>-->
                    <!--<li>-->
                        <!--<a href="javascript:void(0);">-->
                            <!--<img src="__STATIC__/images/qttk.png">-->
                            <!--<p>七天退款</p>-->
                        <!--</a>-->
                    <!--</li>-->
                    <!--<li>-->
                        <!--<a href="javascript:void(0);">-->
                            <!--<img src="__STATIC__/images/ksd.png">-->
                            <!--<p>极速达</p>-->
                        <!--</a>-->
                    <!--</li>-->
                <!--</ul>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="myorder p seedeadei">-->
        <!--<div class="content30">-->
        <!--<a href="javascript:void(0)">-->
        <!--<div class="order">-->
        <!--<div class="fl">-->
        <!--<span class="firde red">查看商品详情</span>-->
        <!--</div>-->
        <!--<div class="fr">-->
        <!--<i class="Mright"></i>-->
        <!--</div>-->
        <!--</div>-->
        <!--</a>-->
        <!--</div>-->
        <!--</div>-->
        <div class="myorder p tbv">
            <div class="content30">
                <a href="javascript:void(0)">
                    <div class="order">
                        <div class="fl">
                            <span class="firde">用户评价</span>
                            <span>好评率<i>
                                <?php if(!empty($commentStatistics['c1']) and !empty($commentStatistics['c0'])): ?>
                                    <?php echo round($commentStatistics['c1']/$commentStatistics['c0'],3)*100; ?>%
                                    <?php else: ?>0<?php endif; ?>
                            </i></span>
                        </div>
                        <div class="fr">
                            <span><i><?php echo $commentStatistics['c0']; ?></i>人评论</span>
                            <i class="Mright"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="recommed p">
        <h2>为您推荐</h2>
        <div class="floor guesslike">
            <div class="likeshop">
                <ul>
                    <!--商品推荐-->
                    <?php
                                   
                                $md5_key = md5("SELECT * FROM __PREFIX__goods WHERE ( is_recommend=1 and is_on_sale=1 ) ORDER BY goods_id DESC LIMIT 0,4 ");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("SELECT * FROM __PREFIX__goods WHERE ( is_recommend=1 and is_on_sale=1 ) ORDER BY goods_id DESC LIMIT 0,4 "); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>
                        <li>
                            <a href="<?php echo U('Goods/goodsInfo',array('id'=>$v[goods_id])); ?>">
                                <div class="similer-product">
                                    <img src="<?php echo goods_thum_images($v['goods_id'],400,400); ?>">
                                    <span class="similar-product-text"><?php echo $v[goods_name]; ?></span>
                                    <span class="similar-product-price">
                                        ¥<span class="big-price"><?php echo $v[shop_price]; ?></span>
                                    </span>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!--添加购物车JS-->
    <script src="__PUBLIC__/js/mobile_common.js" type="text/javascript" charset="utf-8"></script>
</div>
<!--商品-e-->

<!--详情-s-->
<div class="xq_details" style="display: none;">
    <div class="spxq-ggcs">
        <ul>
            <li class="red">商品详情</li>
            <li>规格参数</li>
        </ul>
    </div>
    <div class="sg">
        <div class="spxq p">
            <?php echo htmlspecialchars_decode($goods['goods_content']); ?>
        </div>
    </div>
    <div class="sg" style="display: none;">
        <div class="spxq p">
            <table class="de_table" border="1" bordercolor="#cbcbcb" style="border-collapse:collapse;">
                <tr>
                    <th colspan="2">主体</th>
                </tr>
                <?php if(is_array($goods_attr_list) || $goods_attr_list instanceof \think\Collection || $goods_attr_list instanceof \think\Paginator): if( count($goods_attr_list)==0 ) : echo "" ;else: foreach($goods_attr_list as $k=>$v): ?>
                    <tr>
                        <td><?php echo $goods_attribute[$v[attr_id]]; ?></td>
                        <td><?php echo $v[attr_value]; ?></td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
    </div>
</div>
<!--详情-e-->

<!--评论列表-s-->
<div class="xq_details" >
    <div class="spxq-ggcs comment_de p"  style="display:none;">
        <ul>
            <!--1 全部 2好评 3 中评 4差评-->
            <li class="red">全部评价 <br /><span ctype="1"><?php echo $commentStatistics['c0']; ?></span></li>
            <li>好评 <br /><span ctype="2"><?php echo $commentStatistics['c1']; ?></span></li>
            <li>中评 <br /><span ctype="3"><?php echo $commentStatistics['c2']; ?></span></li>
            <li>差评 <br /><span ctype="4"><?php echo $commentStatistics['c3']; ?></span></li>
            <li>有图 <br /><span ctype="5"><?php echo $commentStatistics['c4']; ?></span></li>
        </ul>
    </div>
    <!--评论列表-->
    <div class="tab-con-wrapper my_comment_list" > </div>
</div>
<div class="comment_con p" id="seedetail">
    <div class="score enkecor" onclick="seedeadei(this)">查看图文详情</div>
</div>
<!--评论列表-e-->

<!--底部按钮-s-->
<div class="podee">
    <div class="cart-concert-btm p">
        <div class="fl">
            <ul>
                <li>
                    <!--<a href="tencent://message/?uin=<?php echo $tpshop_config['shop_info_qq']; ?>&Site=TPshop商城&Menu=yes">-->
                    <a href="mqqwpa://im/chat?chat_type=wpa&uin=<?php echo $tpshop_config['shop_info_qq']; ?>&version=1&src_type=web&web_src=www.chinesestack.com">
                        <i></i>
                        <p>客服</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Mobile/Cart/cart'); ?>" >
                        <span id="tp_cart_info"></span>
                        <i class="gwc"></i>
                        <p>购物车</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="fr">
            <ul>
                <?php if($goods[is_virtual] == 1): ?>
                    <li class="r" style="width: 100%;">
                        <a style="display:block;" href="javascript:void(0);" onclick="virtual_buy();">立即购买</a>
                    </li>
                <?php elseif($goods['exchange_integral'] > 0): ?>
                    <li class="r" style="width: 100%;">
                        <a class="choise_num" style="display:block;" href="javascript:void(0);">立即兑换</a>
                    </li>
                <?php else: ?>
                    <li class="o">
                        <a class="pb_plusshopcar button active_button choise_num" href="javascript:void(0);"> 加入购物车</a>
                    </li>
                    <li class="r">
                        <a class="choise_num" style="display:block;" href="javascript:void(0);">立即购买</a>
                    </li>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<!--底部按钮-e-->

<!--点赞弹窗-s-->
<div class="alert">
    <img src="__STATIC__/images/hh.png"/>
    <p>您已经赞过了！</p>
</div>
<!--点赞弹窗-e-->

<!--选择属性的弹窗-s-->
<form name="buy_goods_form" method="post" id="buy_goods_form" <?php if($goods['is_virtual'] == 1): ?>action="<?php echo U('Mobile/Virtual/buy_virtual'); ?>"<?php endif; ?>>
    <input type="hidden" name="activity_is_on" value="<?php echo $goods['activity_is_on']; ?>"><!-- 活动是否进行中 -->
    <input type="hidden" name="goods_prom_type" value="<?php echo $goods['prom_type']; ?>"/><!-- 活动类型 -->
    <input type="hidden" name="shop_price" value="<?php echo $goods['shop_price']; ?>"/><!-- 活动价格 -->
    <input type="hidden" name="store_count" value="<?php echo $goods['store_count']; ?>"/><!-- 活动库存 -->
    <input type="hidden" name="market_price" value="<?php echo $goods['market_price']; ?>"/><!-- 商品原价 -->
    <input type="hidden" name="start_time" value="<?php echo $goods['start_time']; ?>"/><!-- 活动开始时间 -->
    <input type="hidden" name="end_time" value="<?php echo $goods['end_time']; ?>"/><!-- 活动结束时间 -->
    <input type="hidden" name="activity_title" value="<?php echo $goods['activity_title']; ?>"/><!-- 活动标题 -->
    <input type="hidden" name="item_id" value="<?php echo \think\Request::instance()->param('item_id'); ?>"/><!-- 商品规格id -->
    <input type="hidden" name="exchange_integral" value="<?php echo $goods['exchange_integral']; ?>"/><!-- 积分 -->
    <input type="hidden" name="point_rate" value="<?php echo $point_rate; ?>"/><!-- 积分兑换比 -->
    <div class="choose_shop_aready p">
        <!--商品信息-s-->
        <div class="shop-top-under p">
            <div class="maleri30">
                <div class="shopprice">
                    <div class="img_or fl"><img id="zoomimg" src="<?php echo $goods['original_img']; ?>"></div>
                    <div class="fon_or fl">
                        <h2 class="similar-product-text"><?php echo $goods['goods_name']; ?></h2>
                        <input type="hidden" id="goods_name" name="goods_id" value="<?php echo $goods['goods_id']; ?>">
                        <div class="price_or" id="goods_price"><span>￥</span><span><?php echo $goods['shop_price']; ?></span></div>
                        <div class="dqkc_or"><span>剩余库存：</span><span id="spec_store_count"><?php echo $goods['store_count']; ?></span></div>
                    </div>
                    <div class="price_or fr">
                        <i class="xxgro"></i>
                    </div>
                </div>
            </div>
        </div>
        <!--商品信息-e-->
        <div class="shop-top-under p">
            <div class="maleri30">
                <div class="shulges p">
                    <p>数量</p>
                    <!--选择数量-->
                    <div class="plus">
                        <span class="mp_minous" onclick="altergoodsnum(-1);initGoodsPrice();">-</span>
                                <span class="mp_mp">
                        <input type="tel" class="num buyNum" id="number" residuenum="<?php echo $goods['store_count']; ?>" name="goods_num" value="1" min="1" max="<?php echo $goods['store_count']; ?>" onblur="altergoodsnum(0)">
                                </span>
                        <span class="mp_plus" onclick="altergoodsnum(1);initGoodsPrice();">+</span>
                    </div>
                </div>
                <?php if($filter_spec != ''): if(is_array($filter_spec) || $filter_spec instanceof \think\Collection || $filter_spec instanceof \think\Paginator): if( count($filter_spec)==0 ) : echo "" ;else: foreach($filter_spec as $key=>$spec): ?>
                        <div class="shulges p choicsel" >
                            <p><?php echo $key; ?></p>
                            <!-------商品属性值-s------->
                            <?php if(is_array($spec) || $spec instanceof \think\Collection || $spec instanceof \think\Paginator): if( count($spec)==0 ) : echo "" ;else: foreach($spec as $k2=>$v2): ?>
                                <div class="plus choic-sel">
                                    <a id="goods_spec_a_<?php echo $v2[item_id]; ?>" title="<?php echo $v2[item]; ?>"
                                       onclick="switch_spec(this); <?php if(!empty($v2['src'])): ?>$('#zoomimg').attr('src','<?php echo $v2[src]; ?>');<?php endif; ?>">
                <input id="goods_spec_<?php echo $v2[item_id]; ?>" type="radio" style="display:none;" name="goods_spec[<?php echo $key; ?>]" value="<?php echo $v2[item_id]; ?>"/><?php echo $v2[item]; ?></a>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <!-------商品属性值-e-------->
        </div>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
    </div>
    <div class="btns-fixed-wrap">
        <div class="plusshopcar-buy p btns-fixed-w100">
            <?php if($goods[is_virtual] == 1): ?>
                <input type="hidden" name="virtual_limit" id="virtual_limit" value="<?php echo $goods['virtual_limit']; ?>"/>
                <a class="pb_buy dis_btn" href="javascript:void(0);" style="width: 100%;"  onclick="virtual_buy();">立即购买 </a>
            <?php elseif($goods['exchange_integral'] > 0): ?>
                <a class="pb_buy dis_btn" href="javascript:void(0);" style="width: 100%;"  onclick="buyIntegralGoods(<?php echo $goods['goods_id']; ?>,1,1);">立即兑换</a>
            <?php else: ?>
                <a class="pb_plusshopcar button active_button dis_btn" href="javascript:void(0);" onClick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1,0);">加入购物车</a>
                <a class="pb_buy dis_btn" href="javascript:void(0);"  onclick="AjaxAddCart(<?php echo $goods['goods_id']; ?>,1,1);">立即购买 </a>
            <?php endif; ?>
        </div>
    </div>
    </div>
</form>
<!--选择属性的弹窗-e-->
<a onclick="$('html,body').animate({'scrollTop':0},600)" style="display: block;width: 1.5rem;height:1.5rem;position: fixed; bottom: 3rem;right:0.4rem; background-color: rgba(243,241,241,0.5);border: 1px solid #CCC;-webkit-border-radius: 50%;-moz-border-radius: 50%;border-radius: 50%;" id="topup">
    <img src="__STATIC__/images/topup.png" style="display: block;width: 1.45rem;height:1.45rem;">
</a>
<div class="mask-filter-div" style="display: none;"></div>
<script type="text/javascript" src="__STATIC__/js/mobile-location.js"></script>
<script type="text/javascript">
    var commentType = 1;// 默认评论类型
    var spec_goods_price = <?php echo (isset($spec_goods_price) && ($spec_goods_price !== '')?$spec_goods_price:'null'); ?>;//规格库存价格
    //页面加载后执行
    $(document).ready(function () {
        ajax_header_cart();
        ajaxComment(commentType, 1);// ajax 加载评价列表
        initSpec();
        sel(); //在已选栏中显示默认选择属性，数量
        initGoodsPrice();
    });
    //有规格id的时候，解析规格id选中规格
    function initSpec() {
        var item_id = $("input[name='item_id']").val();
        if (item_id > 0 && !$.isEmptyObject(spec_goods_price)) {
            var item_arr = [];
            $.each(spec_goods_price, function (i, o) {
                item_arr.push(o.item_id);
            })
            //规格id不存在商品里
            if ($.inArray(parseInt(item_id), item_arr) < 0) {
                initFirstSpec();
            } else {
                $.each(spec_goods_price, function (i, o) {
                    if (o.item_id == item_id) {
                        var spec_key_arr = o.key.split("_");
                        $.each(spec_key_arr, function (index, item) {
                            var spec_radio = $("#goods_spec_" + item);
                            var goods_spec_a = $("#goods_spec_a_" + item);
                            spec_radio.attr("checked", "checked");
                            goods_spec_a.addClass('red');
                        })
                    }
                })
            }
        } else {
            initFirstSpec();
        }
    }
    function initFirstSpec(){
        $('.choicsel').each(function (i, o) {
            var firstSpecRadio = $(this).find("input[type='radio']").eq(0);
            firstSpecRadio.attr('checked','checked');
            firstSpecRadio.parents('.choic-sel').find('a').eq(0).addClass('red');
        })
    }
    //初始化商品价格库存
    function initGoodsPrice() {
        var goods_id = $('input[name="goods_id"]').val();
        var goods_num = parseInt($('#number').val());
        if (!$.isEmptyObject(spec_goods_price)) {
            var goods_spec_arr = [];
            $("input[name^='goods_spec']").each(function () {
                if($(this).attr('checked') == 'checked'){
                    goods_spec_arr.push($(this).val());
                }
            });
            var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key
            var item_id = spec_goods_price[spec_key]['item_id'];
            $('input[name=item_id]').val(item_id);
        }
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: {goods_id: goods_id, item_id: item_id, goods_num : goods_num},
            url: "<?php echo U('Mobile/Goods/activity'); ?>",
            success: function (data) {
                if (data.status == 1) {
                    $('input[name="goods_prom_type"]').attr('value', data.result.goods.prom_type);//商品活动类型
                    $('input[name="shop_price"]').attr('value', data.result.goods.shop_price);//商品价格
                    $('input[name="store_count"]').attr('value', data.result.goods.store_count);//商品库存
                    $('input[name="market_price"]').attr('value', data.result.goods.market_price);//商品原价
                    $('input[name="start_time"]').attr('value', data.result.goods.start_time);//活动开始时间
                    $('input[name="end_time"]').attr('value', data.result.goods.end_time);//活动结束时间
                    $('input[name="activity_title"]').attr('value', data.result.goods.activity_title);//活动标题
                    $('input[name="prom_detail"]').attr('value', data.result.goods.prom_detail);//促销详情
                    $('input[name="buy_limit"]').attr('value', data.result.goods.buy_limit);//促销详情
                    $('input[name="activity_is_on"]').attr('value', data.result.goods.activity_is_on);//活动是否正在进行中
                    if(data.result.goods.is_virtual){
                        $('.buy_limit').show();
                    }
                    goods_activity_theme();
                }
            }
        });
    }
    //点击收藏商品
    function collect_goods(goods_id){
        $.ajax({
            type : "GET",
            dataType: "json",
            url:"/index.php?m=Home&c=goods&a=collect_goods&goods_id="+goods_id,//+tab,
            success: function(data){
                layer.open({content:data.msg, time:2});
                if(data.status == '1'){
                    //收藏点亮
                    $('.de_font .keep').find('i').addClass('red');
                }
            }
        });
    }
    //将选择的属性添加到已选
    function sel() {
        var residuenum = parseInt($('.buyNum').attr('residuenum'));
        var title = '';
        $('.choicsel').find('a').each(function (i, o) {   //获取已选择的属性，规格
            if ($(o).hasClass('red')) {
                title += $(o).attr('title') + '&nbsp;&nbsp;';
            }
        })
        var num = $('.buyNum').val();
        if (num > residuenum) {
            num = residuenum;
        }
        var sel = title + '&nbsp;&nbsp;' + num + '件';
        $('.sel').html(sel);
    }

    $(function () {
        // 内部导航随鼠标滑动显示隐藏
        var h1 = $('.detail').height();
        var h2 = $('.detail').height() + $('.spxq-ggcs').height();
        var ss = $(document).scrollTop();//上一次滚轮的高度
        $(window).scroll(function(){
            var s = $(document).scrollTop();////本次滚轮的高度
            if(s< h1){
                $('.spxq-ggcs').removeClass('po-fi');
            }if(s > h1){
                $('.spxq-ggcs').addClass('po-fi');
            }if(s > h2){
                $('.spxq-ggcs').addClass('gizle');
                if(s > ss){
                    $('.spxq-ggcs').removeClass('sabit');
                }else{
                    $('.spxq-ggcs').addClass('sabit');
                }
                ss = s;
            }
        });
    })
    //ajax请求购物车列表
    function ajax_header_cart(){
        var cart_cn = getCookie('cn');
        if (cart_cn == '') {
            $.ajax({
                type: "GET",
                url: "/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
                success: function (data) {
                    cart_cn = getCookie('cn');
                }
            });
        }
        $('#tp_cart_info').html(cart_cn);
    }
    function virtual_buy() {
        var store_count = $("input[name='store_count']").attr('value');// 商品原始库存
        var buynum = parseInt($('.buyNum').val());  //要购买数量
        var virtual_limit = parseInt($('#virtual_limit').val());
        if ((buynum <= store_count && buynum <= virtual_limit) || (buynum < store_count && virtual_limit == 0)) {
            $('#buy_goods_form').submit();
        } else {
            layer.open({content:'购买数量超过此商品购买上限',time: 2});
        }
    }
    //评论
    $('.tbv').click(function(){
        $('.xq_details').eq(0).hide();
        $('.xq_details').eq(2).show();
        $('html,body').animate({'scrollTop':0},600)
        $('.detail').find('.center').find('span').eq(2).addClass('sxp');
        $('.detail').find('.center').find('span').eq(0).removeClass('sxp');
        $('.gizle').show();
    })
    /**
     * 已选
     */
    $('.choise_num').click(function () {
        cover();
        $('.choose_shop_aready').show();
        $('.podee').hide();
    })
    //关闭属性选择
    $('.xxgro').click(function () {
        undercover();
        $('.choose_shop_aready').hide();
        $('.podee').show();
        sel();
    })
    /**
     * 规格选择
     */
    $('.choic-sel a').click(function(){
        //切换选择
        $(this).addClass('red').parent().siblings().find('a').removeClass('red');
    });
    /**
     * 顶部导航切换
     */
    $(document).on('click','.detail .search span',function(){
        $(this).addClass('sxp').siblings().removeClass('sxp');
        var a = $('.detail .search span').index(this);
        $('.xq_details').eq(a).show().siblings('.xq_details').hide();
        $('.xq_details').eq(2).show();
        if($('.detail .search span').eq(2).hasClass('sxp')){
            $('.comment_de').show();
        }else{
            $('.comment_de').hide();
        }
        if($('.detail .search span').eq(1).hasClass('sxp')){
            $('.tab-con-wrapper').hide();
            $('.comment_con').hide();
        }else{
            $('.tab-con-wrapper').show();
            $('.comment_con').show();
        }
    });
    /**
     * 内部导航切换
     */
    $('.spxq-ggcs ul li').click(function(){
        $(this).addClass('red').siblings().removeClass('red');
        var sg = $('.spxq-ggcs ul li').index(this);
        $('.sg').eq(sg).show().siblings('.sg').hide();
        var $commentType= $(this).children('span').attr('ctype');
        //切换到评论按钮才加载评论列表
        if($('.detail .search span').eq(2).hasClass('sxp')){
            ajaxComment($commentType,1);// ajax 加载评价列表
        }
    });
    //查看商品详情
    function seedeadei(obj){
        $('.xq_details').eq(1).show(); //显示详情
        $('.xq_details').eq(0).hide();
        $('.xq_details').eq(2).hide();
        $(obj).parent('div').hide();
        $('body').animate({'scrollTop': 0}, 0);
        $('#topcenter').html('<span>图文详情</span>');
        $('.detail').find('.center').find('span').eq(1).addClass('sxp');
        $('.detail').find('.center').find('span').eq(0).removeClass('sxp');
        $('#topup').attr('onclick',"topup()");
    }

    //详情下的返回按钮
    function topup(){
        $('.xq_details').eq(0).show(); //显示详情
        $('.xq_details').eq(1).hide();
        $('.xq_details').eq(2).show();
        $('#seedetail').show();
        $('html,body').animate({'scrollTop':0},600)
        $('#topcenter').html('<span class="sxp">商品</span><span>详情</span><span>评论</span>');
        $('#topup').attr('onclick',"$('html,body').animate({'scrollTop':0},600)");
    }
    /**
     * 加载更多评论
     */
    function ajaxComment(commentType,page){
        $.ajax({
            type : "GET",
            url:"/index.php?m=Mobile&c=goods&a=ajaxComment&goods_id=<?php echo $goods['goods_id']; ?>&commentType="+commentType+"&p="+page,//+tab,
            success: function(data){
                $(".my_comment_list").empty().append(data);
            }
        });
    }

    //切换规格
    function switch_spec(spec) {
        $(spec).siblings().removeClass('hover');
        $(spec).addClass('hover');
        $(spec).parent().parent().find('input').removeAttr('checked');
        $(spec).children('input').attr('checked', 'checked');
        //商品价格库存显示
        initGoodsPrice();
    }
    //商品价格库存显示
    function goods_activity_theme(){
        var goods_prom_type = $('input[name="goods_prom_type"]').attr('value');
        var activity_is_on = $('input[name="activity_is_on"]').attr('value');
        if(activity_is_on == 0){
            setNormalGoodsPrice();
        }else {
            if (goods_prom_type == 0) {
                //普通商品
                setNormalGoodsPrice();
            } else if (goods_prom_type == 1) {
                //抢购
                setFlashSaleGoodsPrice();
            } else if (goods_prom_type == 2) {
                //团购
                setGroupByGoodsPrice();
            } else if (goods_prom_type == 3) {
                //优惠促销
                setPromGoodsPrice();
            } else {

            }
        }
        var buy_num  = parseInt($('#number').val());//购买数
        var store = $('#spec_store_count').html();//实际库存数量
        $('#number').attr('residuenum',store);
        if(store<=0){
            $('.dis_btn').addClass('dis');
        }else{
            $('.dis_btn').removeClass('dis');
        }
        if(buy_num > store){
            $('.buyNum').val(store);
        }
    }
    //普通商品库存和价格
    function setNormalGoodsPrice() {
        var goods_price = $("input[name='shop_price']").attr('value');// 商品本店价
        var market_price =  $("input[name='market_price']").attr('value');// 商品市场价
        var store_count = $("input[name='store_count']").attr('value');// 商品库存
        var exchange_integral = $("input[name='exchange_integral']").attr('value');// 兑换积分
        var point_rate = $("input[name='point_rate']").attr('value');// 积分金额比
        // 如果有属性选择项
        if (!$.isEmptyObject(spec_goods_price) && spec_goods_price != '') {
            var goods_spec_arr = [];
            $("input[name^='goods_spec']").each(function () {
                if($(this).attr('checked') == 'checked'){
                    goods_spec_arr.push($(this).val());
                }
            });
            var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key
            goods_price = spec_goods_price[spec_key]['price']; // 找到对应规格的价格
            store_count = spec_goods_price[spec_key]['store_count']; // 找到对应规格的库存
        }
        var goods_num = parseInt($("input[name='goods_num']").attr('value'));
        if (goods_num > store_count) {
            goods_num = store_count;
            $("#goods_num").val(goods_num);
        }
        var integral = round(goods_price - (exchange_integral / point_rate),2);
        if(exchange_integral > 0){
            $("#goods_price").html(integral + '+' +exchange_integral + '积分'); //变动价格显示
            $("#price").html("<em>￥</em>" + integral + '+' +exchange_integral + '积分'); //积分显示
        }else{
            $("#goods_price").html(goods_price); //变动价格显示
            $("#price").html("<em>￥</em>" + goods_price); //变动价格显示
        }
        $('#market_price_title').html('市场价：');
        $('#spec_store_count').html(store_count);
        $('#number').attr('max', store_count);
        $('.spec_store_count').html(store_count);
        $('.presale-time').hide();
    }
    //团购商品库存和价格
    function setFlashSaleGoodsPrice() {
        var flash_sale_price = $("input[name='shop_price']").attr('value');
        var flash_sale_count = $("input[name='store_count']").attr('value');
        var goods_num = parseInt($("input[name='goods_num']").attr('value'));
        var buy_limit = parseInt($("input[name='buy_limit']").attr('value'));
        if (goods_num > flash_sale_count) {
            goods_num = flash_sale_count;
//            layer.open({content:'库存仅剩 ' + flash_sale_count + ' 件',time: 2});
            $("#goods_num").val(goods_num);
        }
        $('#number').attr('max', flash_sale_count);
        $("#goods_price").html(flash_sale_price); //变动价格显示
        $("#price").html("抢购价￥" + flash_sale_price); //变动价格显示
        $('#market_price_title').html('原价：');
        $('#activity_type').html('限时抢购');
        $('#spec_store_count').html(flash_sale_count);
        $('.spec_store_count').html(flash_sale_count);
        $('#buy_limit').html(buy_limit).show();
        $('.presale-time').show();
        setInterval(activityTime, 1000);
    }
    //秒杀商品库存和价格
    function setGroupByGoodsPrice() {
        var group_by_price = $("input[name='shop_price']").attr('value');
        var group_by_count = $("input[name='store_count']").attr('value');
        var goods_num = parseInt($("input[name='goods_num']").attr('value'));
        if (goods_num > group_by_count) {
            goods_num = group_by_count;
//            layer.open({content:'库存仅剩 ' + group_by_count + ' 件',time: 2});
            $("#goods_num").val(goods_num);
        }
        $('#number').attr('max', group_by_count);
        $("#goods_price").html(group_by_price); //变动价格显示
        $("#price").html("团购价￥" + group_by_price); //变动价格显示
        $('#market_price_title').html('原价：');
        $('#activity_type').html('限时团购');
        $('#spec_store_count').html(group_by_count);
        $('.spec_store_count').html(group_by_count);
        $('.presale-time').show();
        setInterval(activityTime, 1000);
    }
    //秒杀商品库存和价格
    function setPromGoodsPrice() {
        var prom_goods_price = $("input[name='shop_price']").attr('value');
        var prom_goods_count = $("input[name='store_count']").attr('value');
        var goods_num = parseInt($("input[name='goods_num']").attr('value'));
        if (goods_num > prom_goods_count) {
            goods_num = prom_goods_count;
//            layer.open({content:'库存仅剩 ' + prom_goods_count + ' 件',time: 2});
            $("#goods_num").val(goods_num);
        }
        $('#number').attr('max', prom_goods_count);
        $("#goods_price").html(prom_goods_price); //变动价格显示
        $("#price").html("促销价￥" + prom_goods_price); //变动价格显示
        $('#market_price_title').html('原价：');
        $('#activity_type').html('促销');
        $('#spec_store_count').html(prom_goods_count);
        $('.spec_store_count').html(prom_goods_count);
        $('.presale-time').show();
        setInterval(activityTime, 1000);
    }
    // 倒计时
    function activityTime() {
        var end_time = parseInt($("input[name='end_time']").attr('value'));
        var timestamp = Date.parse(new Date());
        var now = timestamp/1000;
        var end_time_date = formatDate(end_time*1000);
        var text = GetRTime(end_time_date);
        //活动时间到了就刷新页面重新载入
        if(now > end_time){
            layer.open({content:'该商品活动已结束',time: 2});
            location.reload();
        }
        $("#overTime").text(text);
    }
    //时间戳转换
    function add0(m){return m<10?'0'+m:m }
    function  formatDate(now)   {
        var time = new Date(now);
        var y = time.getFullYear();
        var m = time.getMonth()+1;
        var d = time.getDate();
        var h = time.getHours();
        var mm = time.getMinutes();
        var s = time.getSeconds();
        return y+'/'+add0(m)+'/'+add0(d)+' '+add0(h)+':'+add0(mm)+':'+add0(s);
    }

    function sortNumber(a,b)
    {
        return a - b;
    }
    //运费
    $(function(){
        $('.remain').click(function(){
            $('#balance').toggle(300);
        })
        $('#balance').on('click','a',function(){
            $('#shipping_freight').text($(this).find('span').text());
            $('#balance').toggle(300);
        })
    })
    /**
     * 点赞ajax
     * dyr
     * @param obj
     */
    function zan(obj) {
        var user_id = getCookie('user_id');
        if (user_id == '') {
            layer.open({content:'请先登录',time:2});
            return ;
        }
        var comment_id = $(obj).attr('data-comment-id');
        var zan_num = parseInt($("#span_zan_" + comment_id).text());
        $.ajax({
            type: "POST",
            data: {comment_id: comment_id},
            dataType: 'json',
            url: "/index.php?m=Mobile&c=User&a=ajaxZan",
            success: function (res) {
                if (res.success) {
                    $("#span_zan_" + comment_id).text(zan_num + 1);
                    $('#'+comment_id).find('.like').addClass('like_ani'); //显示点赞效果
                    $('#'+comment_id).find('.btn-like-icon').addClass('like-red');
                } else {
                    $('.alert').show(200);
                    $('.alert').animate({opacity:"1"},600,hde());
                }
            },
            error : function(res) {
                if( res.status == "200"){ // 兼容调试时301/302重定向导致触发error的问题
                    layer.open({content:'请先登录!',time:2})
                    return;
                }
                layer.open({content:'请求失败!',time:2})
                return;
            }
        });
    }
</script>

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
</body>
</html>
