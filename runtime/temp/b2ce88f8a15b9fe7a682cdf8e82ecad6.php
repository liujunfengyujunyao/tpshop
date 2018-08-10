<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:45:"./template/mobile/new2/skin_report\index.html";i:1514280878;s:41:"./template/mobile/new2/public\header.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>测肤报告--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
    <link rel="stylesheet" href="__STATIC__/css/style.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/iconfont.css"/>
    <script src="__STATIC__/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    <!--<script src="__STATIC__/js/zepto-1.2.0-min.js" type="text/javascript" charset="utf-8"></script>-->
    <script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script>
    <script src="__STATIC__/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__STATIC__/js/layer.js"  type="text/javascript" ></script>
    <script src="__STATIC__/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body class="f3">

        <div class="quedbox">
            <div class="shpmi p" style="background: #f23030;color:white">
                <div class="maleri30" align="center" style="height:100px;padding-top: 20px;">
                    <div class="dinaot">
                        <span class="naem" >测肤报告</span>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <div style="padding:20px;font-size: 20px;background: white">测肤时间<?php echo $time; ?></div>
                    <p style="padding:30px;line-height: 200px" align="center">
                        <span style="font-size:30px;"><?php echo $type; ?>:<em><?php echo $value; ?>%</em></span>
                    </p>
                </div>
            </div>
            <div class="fukcuid">
                <h2 style="padding:40px;border-bottom: 1px solid #f23030;">推荐产品</h2>
                <?php if(is_array($products) || $products instanceof \think\Collection || $products instanceof \think\Paginator): if( count($products)==0 ) : echo "" ;else: foreach($products as $key=>$vol): ?>
                <div class="maleri30" style="padding-top:30px;">
                    <div>
                        <div class="img_or fl"><img height="220px" src="http://54.64.191.2/EZM_Work/trunk/admin/webroot/upload/<?php echo $vol['photo_url']; ?>"></div>
                        <div class="fon_or fl">
                            <h2 style="padding:20px;margin-bottom: 30px;"><a href="#"><?php echo $vol['name']; ?></a></h2>
                            <!-- <p style="color:gray;width: 400px;padding-bottom:20px;line-height:25px">产品优势：<?php echo $vol['advantage']; ?></p> -->
                            <p style="width:420px;line-height:30px">产品简介：<?php echo $vol['comment']; ?></p>
                        </div>
                    </div>
                        
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>

<div class="mask-filter-div" style="display: none;"></div>
</body>
</html>