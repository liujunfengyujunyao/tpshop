<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:50:"./template/mobile/new2/goods\ajaxIntegralMall.html";i:1512439862;}*/ ?>
<?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$good): ?>
    <div class="sc_list se_sclist paycloseto">
        <div class="maleri30">
            <div class="shopimg fl">
                <img src="<?php echo $good[original_img]; ?>">
            </div>
            <div class="deleshow fr">
                <a href="<?php echo U('Mobile/Goods/goodsInfo', array('id'=>$good[goods_id])); ?>">
                    <div class="deletes">
                        <span class="similar-product-text"><?php echo $good[goods_name]; ?></span>
                    </div>
                    <div class="prices">
                        <p class="sc_pri"><span><?php echo round($good[shop_price]-$good[exchange_integral]/$point_rate,2); ?></span><span class="cobl">+<?php echo $good[exchange_integral]; ?>积分</span></p>
                    </div>
                </a>
                <div class="qxatten">
                    <p class="weight"><span>市场价</span>&nbsp;<span>￥<?php echo $good[market_price]; ?></span></p>
                    <a class="closeannten" href="<?php echo U('Mobile/Goods/goodsInfo',array('id'=>$good['goods_id'])); ?>" >立即兑换</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; endif; else: echo "" ;endif; ?>