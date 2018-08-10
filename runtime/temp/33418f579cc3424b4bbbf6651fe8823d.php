<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./template/mobile/new2/user\ajax_points.html";i:1512439863;}*/ ?>
<?php if(is_array($account_log) || $account_log instanceof \think\Collection || $account_log instanceof \think\Paginator): if( count($account_log)==0 ) : echo "" ;else: foreach($account_log as $key=>$v): ?>
    <div class="fll_acc">
        <ul>
            <li class="orderid-h"><?php echo (isset($v[order_sn]) && ($v[order_sn] !== '')?$v[order_sn]:'无'); ?></li>
            <li class="price-h"><?php echo $v[pay_points]; ?></li>
            <li class="time-h"><?php echo date('Y-m-d H:i:s',$v[change_time]); ?></li>
        </ul>
        <div class="des-h">描述:<?php echo $v[desc]; ?></div> 
    </div>
<?php endforeach; endif; else: echo "" ;endif; ?>