<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:51:"./template/mobile/new2/order\ajax_comment_list.html";i:1512439864;}*/ ?>
<?php if(is_array($comment_list) || $comment_list instanceof \think\Collection || $comment_list instanceof \think\Paginator): if( count($comment_list)==0 ) : echo "" ;else: foreach($comment_list as $key=>$v1): ?>
    <!--待评价-s-->
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
    <!--待评价-e-->
<?php endforeach; endif; else: echo "" ;endif; ?>