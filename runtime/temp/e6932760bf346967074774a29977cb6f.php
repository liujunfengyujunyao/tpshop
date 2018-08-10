<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:31:"./template/pc/tfs/user\reg.html";i:1519984571;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
	<meta name="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
	<meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
	<link href="__STATIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="__STATIC__/css/style.css" rel="stylesheet" type="text/css" />
	<link href="__STATIC__/css/icomoon.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="__STATIC__/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="__STATIC__/bootstrap/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/js/layer/layer.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $tpshop_config['shop_info_store_logo']; ?>" media="screen" />
</head>
<body>
<div class="login_icon">
	<div class="login_icon_inner">
		<div class="login_icon_img">
			<a href="/index.php" title="首页"> <img src="<?php echo $tpshop_config['shop_info_store_logo']; ?>" /> </a>
		</div>
		<h3>肽风尚商城</h3>
	</div>
</div>
<div class="login_banner">
	<div class="login_banner_inner">
		<div class="advertisement">
			<?php $pid =9;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->column("position_id,position_name,ad_width,ad_height","position_id");$result = M("ad")->where("pid=$pid  and enabled = 1 and start_time < 1520211600 and end_time > 1520211600 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select();
if(!in_array($pid,array_keys($ad_position)) && $pid)
{
  M("ad_position")->insert(array(
         "position_id"=>$pid,
         "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ",
         "is_open"=>1,
         "position_desc"=>CONTROLLER_NAME."页面",
  ));
  delFile(RUNTIME_PATH); // 删除缓存
  \think\Cache::clear();  
}


$c = 1- count($result); //  如果要求数量 和实际数量不一样 并且编辑模式
if($c > 0 && I("get.edit_ad"))
{
    for($i = 0; $i < $c; $i++) // 还没有添加广告的时候
    {
      $result[] = array(
          "ad_code" => "/public/images/not_adv.jpg",
          "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid",
          "title"   =>"暂无广告图片",
          "not_adv" => 1,
          "target" => 0,
      );  
    }
}
foreach($result as $k=>$v):       
    
    $v[position] = $ad_position[$v[pid]]; 
    if(I("get.edit_ad") && $v[not_adv] == 0 )
    {
        $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; // 广告半透明的样式
        $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]";        
        $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name];
        $v[target] = 0;
    }
    ?>
				<a href="<?php echo $v[ad_link]; ?>">
					<img src="<?php echo $v[ad_code]; ?>" title="<?php echo $v[title]; ?>" style="<?php echo $v[style]; ?>"/>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="login_entry">
			<div class="login_entry_tital">
				<a href="<?php echo U('Home/User/login'); ?>" class="register_tital_one">用户登录</a><a href="javascript:void(0)" class="register_tital_two">新用户注册</a>
			</div>
			<div class="register_sec" id="cont">
				<form id="reg_form2"  method="post">
					<input type="hidden" name="scene" value="1">
					<div class="text-input">
						<label>手机号码：</label><input type="text" class="login_user" placeholder="请输入手机号码" name="username" id="username">
					</div>
					<div class="register_sec_tel text-input">
						<label>图像验证码：</label>
						<input type="text" class="register_identifying" placeholder="请输入验证码" name="verify_code">
						<div class="reg_yanzheng_img">
							<img width="83" height="37" src="/index.php/Home/User/verify/type/user_reg.html" id="reflsh_code2" onclick="verify('reflsh_code2')">
						</div>
					</div>
					<?php if($tpshop_config['sms_regis_sms_enable'] == 1): ?>
						<div class="register_sec_tel text-input">
							<label>手机验证码：</label>
							<input type="text" class="login_user" placeholder="请输入验证码" id="code" name="code">
							<label class="register_getkey"><button type="button" onclick="send_sms_reg_code()" id="count_down">获取验证码</button></label>
						</div>
					<?php endif; ?>
					<div class="text-input">
						<label>设置密码：</label><input type="password" class="login_user" placeholder="6-16位字母、数字或符号的组合" id="password" name="password">
					</div>
					<div class="text-input">
						<label>确认密码：</label><input type="password" class="login_user" placeholder="请再次输入密码" id="password2" name="password2">
					</div>
					<div class="text-input">
						<input id="agreement" type="checkbox" checked />
						我已阅读并同意<a class="itxt" href="<?php echo U('Home/Article/detail',['article_id'=>1415]); ?>" target="_blank"><?php
                                   
                                $md5_key = md5("select title from `__PREFIX__article` where article_id = 1415");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select title from `__PREFIX__article` where article_id = 1415"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): ?>《<?php echo $v['title']; ?>》<?php endforeach; ?></a>
					</div>
				</form>
				<div class="register_get"><a href="javascript:void(0);" onClick="check_submit();">注 册</a></div>
			</div>
		</div>
	</div>
</div>
<div class="login_footer">
	<div class="login_footer_inner">
		<ul>
			<?php
                                   
                                $md5_key = md5("select * from `__PREFIX__article_cat` where parent_id = 2");
                                $result_name = $sql_result_v = S("sql_".$md5_key);
                                if(empty($sql_result_v))
                                {                            
                                    $result_name = $sql_result_v = \think\Db::query("select * from `__PREFIX__article_cat` where parent_id = 2"); 
                                    S("sql_".$md5_key,$sql_result_v,1);
                                }    
                              foreach($sql_result_v as $k=>$v): 
                                   
                                $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1");
                                $result_name = $sql_result_v2 = S("sql_".$md5_key);
                                if(empty($sql_result_v2))
                                {                            
                                    $result_name = $sql_result_v2 = \think\Db::query("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1"); 
                                    S("sql_".$md5_key,$sql_result_v2,1);
                                }    
                              foreach($sql_result_v2 as $k2=>$v2): ?>
					<li><a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id])); ?>"><?php echo $v2[title]; ?></a></li>
				<?php endforeach; endforeach; ?>
		</ul>
		<div class="login_footer_txt">
			<p>Copyright &copy; <?php echo (isset($tpshop_config['shop_info_store_name']) && ($tpshop_config['shop_info_store_name'] !== '')?$tpshop_config['shop_info_store_name']:'肽风尚商城'); ?> 版权所有 </p></div>
	</div>
</div>
</body>
</html>

<script>
	// 普通 图形验证码
	function verify(id) {
		$('#' + id).attr('src', '/index.php?m=Home&c=User&a=verify&type=user_reg&r=' + Math.random());
	}
	function check_submit() {
		if($('#agreement').is(':checked') == false) {
			layer.alert('请阅读用户协议并勾选', {icon: 2});
			return;
		}
		$.ajax({
			type: "POST",
			url: "<?php echo U('Home/User/reg'); ?>",
			dataType: "json",
			data: $('#reg_form2').serialize(),
			success: function (data) {
				if (data.status == 1) {
					layer.msg(data.msg, {icon: 1}, function () {
						window.location.href = "<?php echo U('Home/Index/index'); ?>";
					});
				} else {
					layer.alert(data.msg, {icon: 2}, function (index) {
						//$('.verifyImg').trigger('click');
						layer.close(index);
					});
				}
			}
		});
	}
	// 发送手机短信
	function send_sms_reg_code() {
		var mobile = $('input[name="username"]').val();
		var verify_code = $('input[name="verify_code"]').val();
		if (!checkMobile(mobile)) {
			layer.alert('请输入正确的手机号码', {icon: 2});//alert('请输入正确的手机号码');
			return;
		}
		if (verify_code == '') {
			layer.alert('请输入图像验证码', {icon: 2});//alert('请输入正确的手机号码');
			return;
		}

		var url = "/index.php?m=Home&c=Api&a=send_validate_code&scene=1&type=mobile&mobile=" + mobile + "&verify_code=" + verify_code;
		$.ajax({
			url: url,
			dataType: "json",
			success: function (res) {
				if (res.status == 1) {
					$('#count_down').attr("disabled", "disabled");
					intAs = 60; // 手机短信超时时间
					jsInnerTimeout('count_down', intAs);
					layer.alert(res.msg, {icon: 1});
				} else {
					layer.alert(res.msg, {icon: 2});
					verify('reflsh_code2')
				}
			}
		});
	}
	$('#count_down').removeAttr("disabled");
	//倒计时函数
	function jsInnerTimeout(id, intAs) {
		var codeObj = $("#" + id);
		intAs--;
		if (intAs <= -1) {
			codeObj.removeAttr("disabled");
			codeObj.text("获取验证码");
			return true;
		}
		codeObj.text('重新获取' + intAs + '秒');
		setTimeout("jsInnerTimeout('" + id + "'," + intAs + ")", 1000);
	}
	function checkMobile(tel) {
		var reg = /(^1[3|4|5|7|8][0-9]{9}$)/;
		if (reg.test(tel)) {
			return true;
		} else {
			return false;
		}
	}
</script>