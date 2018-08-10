<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"./application/admin/view2/partner\ajaxStockList.html";i:1512439953;}*/ ?>
<div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
	<table>
		<tbody>
			<?php if(empty($list) == true): ?>
			<tr data-id="0">
				<td class="no-data" align="center" axis="col0" colspan="10">
					<i class="fa fa-exclamation-circle"></i>没有符合条件的记录
				</td>
			</tr>
			<?php else: if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
				<tr>
					<td class="sign">
						<div style="width: 24px;"><i class="ico-check"></i></div>
					</td>
					<td align="left" class="">
						<div style="text-align: center; width: 50px;"><?php echo $v['goods_id']; ?></div>
					</td>
					<td align="left" class="">
						<div style="text-align: center; width: 400px;"><?php echo $v['goods_name']; ?></div>
					</td>
					<td align="left" class="">
						<div style="text-align: center; width: 200px; <?php if($v['goods_num'] <= ($storeage/100)*($v['stock_num'])): ?>color:#D91222;font-weight:bold<?php endif; ?>"><?php echo (isset($v['goods_num']) && ($v['goods_num'] !== '')?$v['goods_num']:"0"); ?> / <?php echo $v['stock_num']; ?></div>
					</td>
					<td align="left" class="">
						<div style="text-align: center; width: 150px;"><?php echo (isset($v['edittime']) && ($v['edittime'] !== '')?$v['edittime']:"无"); ?></div>
					</td>
				</tr>
			<?php endforeach; endif; else: echo "" ;endif; endif; ?>
		</tbody>
	</table>
</div>
<!--分页位置-->
<?php echo $page; ?>
<script>
$(document).ready(function(){
	$('#flexigrid>table>tbody>tr').click(function(){
		$(this).toggleClass('trSelected');
	});
});

$(".pagination a").click(function(){
	var page = $(this).data('p');
	ajax_get_list(cur_id, page);
});
</script>
