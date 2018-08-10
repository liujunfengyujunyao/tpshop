<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:55:"./template/mobile/new2/user\ajax_return_goods_list.html";i:1512439863;}*/ ?>
<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$rg): ?>
    <div class="searchsh"></div>
    <div class="severde tuharecha">
        <div class="myorder p">
            <div class="content30">
                <div class="order">
                    <div class="fl">
                        <span>服务单号：<em><?php echo $rg[id]; ?></em></span>
                    </div>
                    <div class="fr">
                        <span class="red">
                            <?php if($rg[status] == -2): ?>已取消<?php endif; if($rg[status] == -1): ?>审核不通过<?php endif; if($rg[status] == 0): ?>待审核<?php endif; if($rg[status] == 1): ?>审核通过<?php endif; if($rg[status] == 2): ?>卖家发货<?php endif; if($rg[status] == 3): ?>已完成<?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="myorder p">
            <div class="content30">
                <a href="<?php echo U('Mobile/User/return_goods_info',array('id'=>$rg[id])); ?>">
                    <div class="order">
                        <div class="fl">
                                    <span>
                                        <?php if($rg[status] == -2): ?>您的服务单已经取消<?php endif; if($rg[status] == -1): ?>很抱歉！您的服务单未通过审核<?php endif; if($rg[status] == 0): ?>您的服务单已申请成功，待售后审核中 <?php endif; if($rg[status] == 1): ?>您的服务单已通过审核<?php endif; if($rg[status] == 2 and $rg[type] == 1): ?>卖家已收到您寄回的物品,卖家已重新发货<?php endif; if($rg[status] == 3): ?>您的服务单完成<?php endif; ?>
                                    </span>
                        </div>
                        <div class="fr">
                            <i class="Mright"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!--商品信息-s-->
        <div class="sc_list se_sclist paycloseto">
            <div class="maleri30">
                <div class="shopimg fl">
                    <img src="<?php echo goods_thum_images($rg['goods_id'],100,100); ?>">
                </div>
                <div class="deleshow fr">
                    <div class="deletes">
                        <a class="daaloe"><?php echo $goodsList[$rg[goods_id]]; ?></a>
                    </div>
                    <div class="qxatten">
                        <p class="weight"><span>申请时间：</span><span><?php echo date('Y-m-d H:i:s',$rg[addtime]); ?></span></p>
                    </div>
                </div>
            </div>
        </div>
        <!--商品信息-e-->
        <div class="xomjdche">
            <div class="maleri30">
                <a href="<?php echo U('Mobile/User/return_goods_info',array('id'=>$rg[id])); ?>">进度查询</a>
            </div>
            <?php if($rg[status] == 2 and $rg['type'] == 1): ?>
                <div class="maleri30">
                    <a href="<?php echo U('Mobile/User/receiveConfirm',array('id'=>$rg[id])); ?>">确认收货</a>
                </div>
            <?php endif; if($rg[status] != -2 and $rg[status] < 1): ?>
                <div class="maleri30">
                    <a href="<?php echo U('Mobile/User/return_goods_cancel',array('id'=>$rg[id])); ?>">取消申请</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; endif; else: echo "" ;endif; ?>