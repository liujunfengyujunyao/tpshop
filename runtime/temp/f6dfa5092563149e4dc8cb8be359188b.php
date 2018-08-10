<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"./application/admin/view2/pickup\ajaxPickupList.html";i:1533876247;}*/ ?>
<div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
    <table>
        <tbody>
        <?php if(is_array($pickupList) || $pickupList instanceof \think\Collection || $pickupList instanceof \think\Paginator): $i = 0; $__LIST__ = $pickupList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
            <tr>
                <td class="sign">
                    <div style="width: 24px;"><i class="ico-check"></i></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: center; width: 50px;"><?php echo $list['pickup_id']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: center; width: 100px;"><?php echo getSubstr($list['pickup_name'],0,33); ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: center; width: 100px;"><?php echo getSubstr($list['pickup_address'],0,33); ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: center; width: 100px;"><?php echo $list['pickup_phone']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: center; width: 80px;"><?php echo $list['pickup_contact']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: center; width: 80px;"><?php echo $list['province_name']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: center; width: 80px;"><?php echo $list['city_name']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: center; width: 80px;"><?php echo $list['district_name']; ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: center; width: 80px;"><?php echo (isset($list['suppliers_name']) && ($list['suppliers_name'] !== '')?$list['suppliers_name']:'无供应商'); ?></div>
                </td>
                <td align="left" class="">
                    <div style="text-align: center; width: 120px;"><?php echo (isset($list['store_name']) && ($list['store_name'] !== '')?$list['store_name']:'未绑定工厂店'); ?></div>
                </td>
                <td align="center" class="handle">
                    <div style="text-align: center; width: 170px; max-width:170px;">
                        <a class="btn blue" href="<?php echo U('Admin/Pickup/edit_address',array('pickup_id'=>$list['pickup_id'])); ?>"><i class="fa fa-pencil-square-o"></i>查看编辑</a>
                        <a class="btn red"  href="javascript:void(0)" onclick="del('<?php echo $list[pickup_id]; ?>')" ><i class="fa fa-trash-o"></i>删除</a>
                    </div>
                </td>
                <td align="" class="" style="width: 100%;">
                    <div>&nbsp;</div>
                </td>
            </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<!--分页位置-->
<?php echo $page; ?>
<script>
    $(document).ready(function(){
        // 表格行点击选中切换
        $('#flexigrid >table>tbody>tr').click(function(){
            $(this).toggleClass('trSelected');
        });
        $('#count').empty().html("<?php echo $pager->totalRows; ?>");
    });
    // 点击分页触发的事件
    $(".pagination  a").click(function(){
        cur_page = $(this).data('p');
        ajax_get_table('search-form2',cur_page);
    });

    // 删除操作
    function del(id)
    {
        if(!confirm('确定要删除吗?'))
            return false;
        $.ajax({
            url:"/index.php?m=Admin&c=Pickup&a=del&pickup_id="+id,
            success: function(v){
                var v =  eval('('+v+')');
                if(v.hasOwnProperty('status') && (v.status == 1))
                    ajax_get_table('search-form2',cur_page);
                else
                    layer.msg(v.msg, {icon: 2,time: 1000}); //alert(v.msg);
            }
        });
        return false;
    }
</script>