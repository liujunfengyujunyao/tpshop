<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"./application/admin/view2/partner\ajaxOrderList.html";i:1512439953;}*/ ?>
<div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
	<table>
		<tbody>
			<?php if(empty($orderList) == true): ?>
			<tr data-id="0">
				<td class="no-data" align="center" axis="col0" colspan="10">
					<i class="fa fa-exclamation-circle"></i>没有符合条件的记录
				</td>
			</tr>
			<?php else: if(is_array($orderList) || $orderList instanceof \think\Collection || $orderList instanceof \think\Paginator): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
				<tr>
					<td class="sign">
						<div style="width: 24px;"><i class="ico-check"></i></div>
					</td>
					<td align="left" class="">
						<div style="text-align: center; width: 150px;"><?php echo $v['store_name']; ?></div>
					</td>
					<td align="left" class="">
						<div style="text-align: center; width: 150px;"><?php echo $v['order_sn']; ?></div>
					</td>
					<td align="left" class="">
						<div style="text-align: center; width: 150px;"><?php echo $v['consignee']; ?>:<?php echo $v['mobile']; ?></div>
					</td>
					<td align="left" class="">
						<div style="text-align: center; width: 80px;" class=""><?php echo $v['total_amount']; ?></div>
					</td>
					<td align="left" class="">
						<div style="text-align: center; width: 100px;" class=""><?php echo $order_status[$v['order_status']]; ?></div>
					</td>
					<td align="left" class="">
						<div style="text-align: center; width: 150px;"><?php echo date("Y-m-d H:i:s",$v['add_time']); ?></div>
					</td>
					<td align="left" class="">
						<div style="text-align: center; width: 100px;" class=""><a class="btn green" href="<?php echo U('Admin/Partner/order_info',array('order_id'=>$v['order_id'])); ?>"><i class="fa fa-list-alt"></i>查看详情</a></div>
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
