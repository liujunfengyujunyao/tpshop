<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:50:"./template/mobile/new2/user\ajax_collect_list.html";i:1512439863;}*/ ?>
<?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$good): ?>
    <li>
        <div class="similer-product">
            <a class="simidibl" href="<?php echo U('Goods/goodsInfo',array('id'=>$good[goods_id])); ?>">
                <img src="<?php echo goods_thum_images($good['goods_id'],400,400); ?>"/>
                <span class="similar-product-text"><?php echo getSubstr($good[goods_name],0,20); ?></span>
            </a>
            <span class="similar-product-price">
                ¥<span class="big-price"><?php echo $good[shop_price]; ?></span>
                <a href="<?php echo U('Goods/goodsList',['id'=>$good['cat_id']]); ?>"><span class="guess-button dele-button J_ping">看相似</span></a>
                <a href="<?php echo U('Mobile/User/cancel_collect', ['collect_id'=>$good[collect_id]]); ?>"><span class="guess-button dele-button J_ping">删除</span></a>
            </span>
        </div>
    </li>
<?php endforeach; endif; else: echo "" ;endif; ?>