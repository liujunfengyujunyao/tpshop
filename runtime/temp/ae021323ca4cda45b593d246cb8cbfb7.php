<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:47:"./template/pc/tfs/activity\ajax_flash_sale.html";i:1519984571;}*/ ?>
<div class="seckill_img_one">
    <?php if(empty($flash_sale_goods) || (($flash_sale_goods instanceof \think\Collection || $flash_sale_goods instanceof \think\Paginator ) && $flash_sale_goods->isEmpty())): ?>
        <p style="font-size: 16px;margin:50px 500px;text-align: center;">--暂无秒杀商品--</p>
    <?php else: if(is_array($flash_sale_goods) || $flash_sale_goods instanceof \think\Collection || $flash_sale_goods instanceof \think\Paginator): $i = 0; $__LIST__ = $flash_sale_goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="seckill_img_left">
        <a <?php if($vo['percent'] < 100): ?>href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$vo['goods_id'])); ?>"<?php endif; ?>>
        <div class="seckill_img_pic"><img src="<?php echo goods_thum_images($vo['goods_id'],250,250); ?>" width="250" height="250"/></div>
        <h3><?php echo $vo['goods_name']; ?></h3><h5><?php echo $vo['goods_remark']; ?></h5><div class="seckill_price"><p>秒杀价</p></div><h6>￥<?php echo $vo['price']; ?></h6>
        </a>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>
