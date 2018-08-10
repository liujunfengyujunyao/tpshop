<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./template/pc/tfs/index\ajax_favorite.html";i:1512105163;}*/ ?>
<?php if(is_array($favourite_goods) || $favourite_goods instanceof \think\Collection || $favourite_goods instanceof \think\Paginator): $k = 0; $__LIST__ = $favourite_goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
    <dl <?php if($k%5 == 1): ?>class='borderLeft'<?php endif; ?>>
        <dt><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>"><img src="<?php echo goods_thum_images($v['goods_id'],140,140); ?>" width="140" height="140"/></a></dt>
        <dd><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>"><?php echo $v['goods_name']; ?></a></dd>
        <dd class="money">￥<?php echo $v['shop_price']; ?></dd>
    </dl>
<?php endforeach; endif; else: echo "" ;endif; ?>