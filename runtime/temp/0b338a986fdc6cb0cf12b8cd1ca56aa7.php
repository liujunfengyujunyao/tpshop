<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:42:"./template/pc/tfs/cart\ajax_cart_list.html";i:1512105565;}*/ ?>
<?php if(empty($cartList)): ?>
	<div class="container elect">
		<div style="margin-top: 5%">
			<p class="text-center"><a href="/"><img src="__STATIC__/images/null_cart.jpg"  /></a></p>
		</div>
	</div>
<?php else: ?>
<div class="container elect">
	<div class="row electtop">
		<div class="col-md-2 col-xs-2">
			<label>
				<input type="checkbox" name="select_all" id="select_all" <?php if($select_all == 1): ?>checked="checked"<?php endif; ?> onchange="check_all();" value="1"/>&nbsp;&nbsp;全选
			</label>
		</div>
		<div class="col-md-4 col-xs-4">商品</div>
		<div class="col-md-2 col-xs-2 text-center">单价</div>
		<div class="col-md-2 col-xs-2 text-center">数量</div>
		<div class="col-md-2 col-xs-2 text-center">操作</div>
	</div>
	<?php if(is_array($cartList) || $cartList instanceof \think\Collection || $cartList instanceof \think\Paginator): if( count($cartList)==0 ) : echo "" ;else: foreach($cartList as $k=>$v): ?>
		<div class="row bb">
			<div class="col-md-1 col-xs-1">
				<ul class="list">
					<li><label><input type="checkbox"  name="cart_select[<?php echo $v['id']; ?>]" <?php if($v[selected] == 1): ?>checked="checked"<?php endif; ?> value="1" onclick="ajax_cart_list();" /></label></li>
				</ul>
			</div>
			<div class="col-md-5 col-xs-5">
				<dl>
					<dt>
						<a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>">
							<img class="wi63 hi63" src="<?php echo goods_thum_images($v['goods_id'],78,78); ?>">
						</a>
					</dt>
					<dd><a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$v[goods_id])); ?>"><?php echo $v['goods_name']; ?></a></dd>
					<dd>
						<span>
							<!--团购-->
							<?php if($v[activity_type] == 2): ?>
								<img width="30" src="/public/images/groupby.jpg" style="vertical-align:middle">
							<?php endif; ?>
							<!--抢购-->
							<?php if($v[activity_type] == 1): ?>
								<img width="30" src="/public/images/qianggou2.jpg" style="vertical-align:middle">
							<?php endif; ?>
						</span>
					</dd>
				</dl>
			</div>
			<div class="col-md-2 col-xs-2 text-center money">
				<?php if(($user[discount] != 1) and ($user[discount] != null)): ?>
					￥<?php echo $v['member_goods_price']; ?>/<span style="text-decoration: line-through;color: #bbb;">￥<?php echo $v['market_price']; ?></span>
				<?php else: ?>
					￥<?php echo $v['goods_price']; ?>/<span style="text-decoration: line-through;color: #bbb;">￥<?php echo $v['market_price']; ?></span>
				<?php endif; ?>
			</div>
			<div class="col-md-2 col-xs-2">
				<?php if($v['store_count'] > 0): ?>
					<div class="gw_num">
						<em class="jian" onClick="switch_num(-1,<?php echo $v['id']; ?>,<?php echo $v['store_count']; ?>);">-</em>
						<input type="text" value="<?php echo $v['goods_num']; ?>" name="goods_num[<?php echo $v['id']; ?>]" class="num" />
						<em class="add" onClick="switch_num(1,<?php echo $v['id']; ?>,<?php echo $v['store_count']; ?>);">+</em>
					</div>
				<?php else: ?>
					<div class="money">库存不足</div>
					<input type="hidden" value="0" name="goods_num[<?php echo $v['id']; ?>]" id="goods_num[<?php echo $v['id']; ?>]" />
				<?php endif; ?>
			</div>
			<div class="col-md-2 col-xs-2 text-center deleting">
				<p><a href="javascript:void(0)" onclick="collect(<?php echo $v['goods_id']; ?>)"><img src="__STATIC__/images/fan.png" />移入收藏</a></br><a href="javascript:void(0);" onclick="ajax_del_cart(<?php echo $v['id']; ?>);"><img src="__STATIC__/images/shan.png" />删除商品</a></p>
			</div>
		</div>
	<?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<div class="container total">
	<div class="row totalall">
		<div class="totala">
			<p><a href="javascript:void(0);" onclick="del_cart_more();">删除选中商品</a><a href="<?php echo U('Home/Index/index'); ?>" class="following">继续购物</a></p>
		</div>
		<div class="text-right totalb">
			<p>总计金额：<span>¥<?php echo $total_price['total_fee']; ?></span></p>
			<p>共节省：<span>¥<?php echo $total_price['cut_fee']; ?></span></p>
			<p>合计（不含运费）：<span>¥<?php echo $total_price['total_fee']; ?></span></p>
		</div>
		<div class="clear"></div>
		<div class="clearing">
			<a href="<?php echo U('Home/Cart/cart2'); ?>" class="btn btn-danger">去结算</a>
		</div>
	</div>
</div>
<?php endif; ?>