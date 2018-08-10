<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:39:"./template/pc/tfs/cart\ajax_pickup.html";i:1512035405;}*/ ?>
<!-- 工厂店 -->
<div class="row name">
    <?php if(empty($store_list)): ?>
        <span style="color: #f00">暂无相关数据，请选择合作快递</span>
    <?php else: if(is_array($store_list) || $store_list instanceof \think\Collection || $store_list instanceof \think\Paginator): $k = 0; $__LIST__ = $store_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sl): $mod = ($k % 2 );++$k;?>
            <div class="order-address-list">
                <label>
                    <div class="col-sm-3">
                        <input onclick="swidth_address(this)" type="radio" name="store_id" value="<?php echo $sl['store_id']; ?>" />
                        &nbsp;&nbsp;<?php echo $sl['store_name']; ?>
                    </div>
                    <div class="col-sm-6">
                        地址：<?php echo $sl['province_name']; ?><?php echo $sl['district_name']; ?><?php echo $sl['address']; if($sl['store_id'] == $store_default): ?>
                            <label style="margin-left: 10px; padding:5px 10px; border: 1px solid red;font-size: 14px; color: red;">推荐店</label>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-3 mi">
                        <img src="__STATIC__/images/weizhi.png" /> <?php echo $sl['distance']; if($k == 1): ?>
                            <span>（距离最近）</span>
                        <?php endif; ?>
                    </div>
                </label>
            </div>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>
<?php if(\think\Request::instance()->param('show') == 1): ?>
<script>
    $("#ajax_pickup").find("td input[type=radio]:first-child").trigger('click');
</script>
<?php endif; ?>