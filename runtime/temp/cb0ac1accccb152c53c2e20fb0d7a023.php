<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"./template/pc/tfs/goods\ajaxComment.html";i:1513580609;}*/ ?>
<script src="__PUBLIC__/js/viewer/viewer.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="__PUBLIC__/css/viewer.min.css" type="text/css">
<?php if($commentlist): if(is_array($commentlist) || $commentlist instanceof \think\Collection || $commentlist instanceof \think\Paginator): $i = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
		<div class="eva_main_txt">
			<div class="eva_txt_l">
				<?php if($v[is_anonymous] == 1): ?>
					<div><img src="__STATIC__/images/lan.png" width="30" /></div>
					<p>匿名用户</p>
					<?php else: ?>
					<div><img src="<?php echo (isset($v['head_pic']) && ($v['head_pic'] !== '')?$v['head_pic']:'__STATIC__/images/lan.png'); ?>" width="30" /></div>
					<p><?php echo getsubstr($v['username'],0,6); ?></p>
				<?php endif; ?>
			</div>
			<div class="eva_txt_r">
				<div class="eva_start eva_start<?php echo $v['goods_rank']; ?>"></div>
				<div class="eva_txt_text">
					<p><?php echo htmlspecialchars_decode($v['content']); ?></p>
					<div id="comment_images_<?php echo $v[comment_id]; ?>">
						<?php if(is_array($v['img']) || $v['img'] instanceof \think\Collection || $v['img'] instanceof \think\Paginator): if( count($v['img'])==0 ) : echo "" ;else: foreach($v['img'] as $key=>$v2): ?>
							<div class="eve_main_pic"><img data-original="<?php echo $v2; ?>" src="<?php echo $v2; ?>" width="50" height="50" />
							</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<script>
						var viewer = new Viewer(document.getElementById('comment_images_<?php echo $v[comment_id]; ?>'), {
							url: 'data-original',
							show: function () {
								$('.soubao-sidebar').hide();
							},
							hide: function () {
								$('.soubao-sidebar').show();
							}
						});
					</script>
				</div>
				<div class="eva_txt_time"><p><?php echo date("Y-m-d H:i:s",$v['add_time']); ?></p></div>

				<!--商家回复 Start -->
				<?php if(is_array($replyList[$v['comment_id']]) || $replyList[$v['comment_id']] instanceof \think\Collection || $replyList[$v['comment_id']] instanceof \think\Paginator): if( count($replyList[$v['comment_id']])==0 ) : echo "" ;else: foreach($replyList[$v['comment_id']] as $k=>$v3): ?>
					<div class="eva_txt_reply"><p>商家回复：</p><p><?php echo $v3['content']; ?></p></div>
					<div class="eva_txt_reply_time"><p><?php echo date('Y-m-d H:i:s',$v3['add_time']); ?></p></div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				<!--商家回复 End -->
			</div>
		</div>
	<?php endforeach; endif; else: echo "" ;endif; ?>
	<div class="eva_page">
		<?php echo $page; ?>
	</div>
<?php else: ?>
	<div class="text-center" style="padding: 10px 0;">
		暂无评价
	</div>
<?php endif; ?>
<script>
	// 点击分页触发的事件
	$("#ajax_comment_return .pagination a").click(function(){
		ajaxComment(commentType, $(this).data('p'));
	});
</script>