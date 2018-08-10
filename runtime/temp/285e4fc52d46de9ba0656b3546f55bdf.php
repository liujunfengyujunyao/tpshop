<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:54:"./application/admin/view2/partner\ajaxPartnerList.html";i:1512439953;}*/ ?>
<div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
	<table cellspacing="0" cellpadding="0">
		<tbody>
		<?php if(empty($partnerList) == true): ?>
			<tr data-id="0">
				<td class="no-data" align="center" axis="col0" colspan="50">
					<i class="fa fa-exclamation-circle"></i>没有符合条件的记录
				</td>
			</tr>
		<?php else: if(is_array($partnerList) || $partnerList instanceof \think\Collection || $partnerList instanceof \think\Paginator): $i = 0; $__LIST__ = $partnerList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
			<tr>
				<td class="sign">
					<div style="width: 24px;"><i class="ico-check"></i></div>
				</td>
				<td align="left" class="">
					<div style="text-align: center; width: 50px;"><?php echo $list['partner_id']; ?></div>
				</td>
				<td align="left" class="">
					<div style="text-align: center; width: 100px;"><?php echo getSubstr($list['nickname'],0,33); ?></div>
				</td>
				<td align="left" class="">
					<div style="text-align: center; width: 120px;"><?php echo $list['phone']; ?></div>
				</td>
				<td align="left" class="">
					<div style="text-align: center; width: 100px;"><?php echo $list['money']; ?></div>
				</td>
				<td align="left" class="">
					<div style="text-align: center; width: 80px;"><?php echo $list['pay_points']; ?></div>
				</td>
				<td align="left" class="">
					<div style="text-align: center; width: 220px;"><?php echo $list['province_name']; ?> <?php echo $list['city_name']; ?> <?php echo $list['town_name']; ?></div>
				</td>
				<td align="left" class="">
					<div style="text-align: center; width: 80px;"><?php echo $list['addtime']; ?></div>
				</td>
				<td align="center" class="handle">
					<div style="text-align: center; width: 170px; max-width:170px;">
						<a class="btn blue"  href="javascript:void(0)" onclick="view('<?php echo $list[partner_id]; ?>')" ><i class="fa fa-search"></i>查看</a>
						<a class="btn green" href="<?php echo U('Admin/Partner/edit',array('partner_id'=>$list['partner_id'])); ?>"><i class="fa fa-pencil-square-o"></i>编辑</a>
						<a class="btn red"  href="javascript:void(0)" onclick="del('<?php echo $list[partner_id]; ?>')" ><i class="fa fa-trash-o"></i>删除</a>
					</div>
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
		// 表格行点击选中切换
		$('#flexigrid>table>tbody>tr').click(function(){
			$(this).toggleClass('trSelected');
		});
		$('#count').empty().html("<?php echo $pager->totalRows; ?>");
	});
	// 点击分页触发的事件
	$(".pagination  a").click(function(){
		cur_page = $(this).data('p');
		ajax_get_table('search-form2',cur_page);
	});

	//查看操作
	function view(id) {
		layer.open({
			type: 2,
			skin: 'layui-layer-rim',
			title: '工厂店列表',
			area: ['700px', '500px'],
			content: "/index.php?m=Admin&c=Partner&a=view&partner_id="+id+"&p="+1
		})
	}

	// 删除操作
	function del(id) {
		layer.confirm('确定要删除吗？', {btn: ['确定', '取消']}, function(index){
			layer.close(index);
			$.ajax({
				url:"/index.php?m=Admin&c=Partner&a=del&partner_id="+id,
				success: function(v){
					var v = eval('('+v+')');
					if(v.hasOwnProperty('status') && (v.status == 1)){
						layer.msg(v.msg, {icon: 1});
						ajax_get_table('search-form2',cur_page);
					}else {
						layer.msg(v.msg, {icon: 2,time: 1000});
					}
				}
			});
		});
	}
</script>