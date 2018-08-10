<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:50:"./application/admin/view2/store\ajaxStoreList.html";i:1512439955;}*/ ?>
<div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
    <table width="100%">
        <tbody>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $k=>$vo): ?>
            <tr>
                <td class="sign">
                    <div style="width: 24px;"><i class="ico-check"></i></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: left; width: 30px;"><?php echo $vo['store_id']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: left; width: 200px;"><?php echo $vo['store_name']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: left; width: 100px;"><?php echo $vo['user_money']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: left; width: 100px;"><?php echo $vo['user']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: left; width: 100px;"><?php echo $vo['partner']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: left; width: 150px;"><?php echo $vo['type_name']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: left; width: 100px;"><?php echo $vo['phone']; ?></div>
                </td>
                <td align="center" class="handle">
                    <div style="text-align: center; width: 150px; max-width:170px;">
                        <a href="<?php echo U('Store/addEditStore',array('act'=>'_EDIT_','id'=>$vo['store_id'])); ?>"
                           class="btn blue"><i class="fa fa-pencil-square-o"></i>编辑</a>
                        <a class="btn red" href="javascript:void(0)" data-url="<?php echo U('Store/addEditStore'); ?>"
                           data-id="<?php echo $vo['store_id']; ?>" onClick="delfunc(this)"><i class="fa fa-trash-o"></i>删除</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="iDiv" style="display: none;"></div>
<!--分页位置-->
<?php echo $page; ?>
<script>
    $(document).ready(function () {
        // 表格行点击选中切换
        $('#flexigrid>table>tbody>tr').click(function () {
            $(this).toggleClass('trSelected');
        });
        $('#count').empty().html("<?php echo $pager->totalRows; ?>");
    });
    // 点击分页触发的事件
    $(".pagination  a").click(function () {
        cur_page = $(this).data('p');
        ajax_get_table('search-form2', cur_page);
    });

    function delfunc(obj) {
        layer.confirm('确认删除？', {
                    btn: ['确定', '取消'] //按钮
                }, function (index) {
                    layer.close(index);
                    // 确定
                    $.ajax({
                        type: 'post',
                        url: $(obj).attr('data-url'),
                        data: {act: '_DEL_', id: $(obj).attr('data-id')},
                        dataType: 'json',
                        success: function (v) {
                            if (v.status == 1) {
                                layer.msg('操作成功', {icon: 1});
                                $(obj).parent().parent().parent().remove();
                            } else {
                                layer.msg(v.msg, {icon: 2, time: 2000});
                            }
                        }
                    })
                }, function (index) {
                    layer.close(index);
                }
        );
    }
</script>