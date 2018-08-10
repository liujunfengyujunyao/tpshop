<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:48:"./application/admin/view2/sark\ajaxSarkList.html";i:1533876247;}*/ ?>
<div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
    <table>
        <tbody>
        <?php if(is_array($sarkList) || $sarkList instanceof \think\Collection || $sarkList instanceof \think\Paginator): $i = 0; $__LIST__ = $sarkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
            <tr>
                <td class="sign">
                    <div style="width: 24px;"><i class="ico-check"></i></div>
                </td>
                <td align="left">
                    <div style="text-align: center; width: 60px;"><?php echo $list['id']; ?></div>
                </td>
                <td align="left">
                    <div style="text-align: center; width: 100px;"><?php echo $list['sark_code']; ?></div>
                </td>
                <td align="left">
                    <div style="text-align: center; width: 100px;"><?php echo $list['store_name']; ?></div>
                </td>
                <td align="left">
                    <div style="text-align: center; width: 100px;"><?php echo $list['addtime']; ?></div>
                </td>
                <td align="left">
                    <div style="text-align: center; width: 100px;"><?php echo (isset($list['confirm_time']) && ($list['confirm_time'] !== '')?$list['confirm_time']:'未确认'); ?></div>
                </td>
                <td align="center" class="handle">
                    <div style="text-align: center; width: 100px; max-width: 170px;">
                        <a class="btn blue" href="<?php echo U('Admin/Sark/sark_info',array('id'=>$list['id'])); ?>"><i class="fa fa-pencil-square-o"></i>查看编辑</a>
                        <a class="btn red" href="javascript:void(0)" onclick="del('<?php echo $list[id]; ?>')"><i class="fa fa-trash-o"></i>删除</a>
                    </div>
                </td>
                <td align="" class="" style="width: 100%">
                    <?php if($list['wx_image'] == null): ?>
                        <div><a href="<?php echo U('Admin/Sark/getQRcode',array('code' => $list['sark_code'])); ?>">生成二维码</a></div>
                    <?php else: ?>
                        <div><a href="<?php echo U('Admin/Sark/printImg',array('id' => $list['id'])); ?>">查看二维码</a></div>
                    <?php endif; ?>

                </td>
            </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<!-- 分页位置 -->
<?php echo $page; ?>
<script>
    $(document).ready(function(){
        //表格行点击选中切换
        $('#flexigrid>table>tbody>tr').click(function(){
            $(this).toggleClass('trSelected');
        });
        $('#count').empty().html("<?php echo $pager->totalRows; ?>");
    });

    //点击分页触发的事件
    $(".pagination a").click(function(){
        cur_page = $(this).data('p');
        ajax_get_table('search-form1',cur_page);
    });

    //删除操作
    function del(id){
        if(!confirm('确定要删除吗?'))
            return false;
        $.ajax({
            url: "/index.php?m=Admin&c=Sark&a=del&id="+id,
            success: function(v){
                var v = eval('('+v+')');
                if(v.hasOwnProperty('status') && (v.status == 1))
                    ajax_get_table('search-form1',cur_page);
                else
                    layer.msg(v.msg,{icon: 2,time: 1000});
            }
        });
        return false;
    }
</script>