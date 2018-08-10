<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"./template/pc/tfs/cart\ajax_address.html";i:1512109963;}*/ ?>
<?php if(is_array($address_list) || $address_list instanceof \think\Collection || $address_list instanceof \think\Paginator): if( count($address_list)==0 ) : echo "" ;else: foreach($address_list as $k=>$v): if($v[is_default] == 1): ?> <!-- 默认选中的地址 -->
        <div class="row receivea">
            <div class="col-xs-7 order-address-list address_current">
                <label>
                    <input type="radio" name="address_id" value="<?php echo $v[address_id]; ?>" data-province-id="<?php echo $v[province]; ?>" data-city-id="<?php echo $v[city]; ?>" data-district-id="<?php echo $v[district]; ?>" onclick="swidth_address(this);" checked="checked">
                    <span class="xing">
                        <?php echo $v[consignee]; ?> <?php echo $regionList[$v[province]]; ?> <?php echo $regionList[$v[city]]; ?> <?php echo $regionList[$v[district]]; ?> <?php echo $regionList[$v[twon]]; ?> <?php echo $v[address]; ?>
                        <span class="call"><?php echo $v[mobile]; ?></span>
                    </span>
                </label>
            </div>
            <div class="col-xs-5 address">
                <a href="javascript:void(0)" onclick="add_edit_address(<?php echo $v[address_id]; ?>);">修改地址</a></div>
            </div>
            <script>
                ajax_pickup(<?php echo $v[province]; ?>, <?php echo $v[city]; ?>, <?php echo $v[district]; ?>, 0);
            </script>
    <?php else: ?>
        <div class="row receivea <?php if($k > 2): ?>hidden-address<?php endif; ?>">
            <div class="col-xs-7 order-address-list">
                <label>
                    <input type="radio" data-province-id="<?php echo $v[province]; ?>" data-city-id="<?php echo $v[city]; ?>" data-district-id="<?php echo $v[district]; ?>" onclick="swidth_address(this);" name="address_id" value="<?php echo $v[address_id]; ?>">
                    <span class="xing">
                        <?php echo $v[consignee]; ?> <?php echo $regionList[$v[province]]; ?> <?php echo $regionList[$v[city]]; ?> <?php echo $regionList[$v[district]]; ?> <?php echo $regionList[$v[twon]]; ?> <?php echo $v[address]; ?>
                        <span class="call"><?php echo $v[mobile]; ?></span>
                    </span>
                </label>
            </div>
            <div class="col-xs-5 address">
                <a href="javascript:void(0)" onclick="add_edit_address(<?php echo $v[address_id]; ?>);">修改地址</a></div>
        </div>
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
