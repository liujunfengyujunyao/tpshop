<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:33:"./template/pc/tfs/user\login.html";i:1519984571;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
			<div class="login_entry_tital"><a href="javascript:void(0)" class="login_tital_one">用户登录</a><a href="<?php echo U('Home/User/reg'); ?>">新用户注册</a>
			</div>
			<div class="login_sec">
				<form id="loginform" method="post">
					<div class="text-input">
						<label class="login_user_img"></label>
						<input type="text" class="login_user" placeholder="已验证手机/邮箱" name="username" id="username" >
					</div>
					<div class="text-input">
						<label class="login_key_img"></label>
						<input type="password" placeholder="密码" name="password" id="password" >
					</div>
					<div class="text-input">
						<label class="login_key_img"></label>
						<input type="text" class="login_yanzheng" placeholder="验证码" name="verify_code" id="verify_code" >
						<div class="login_yanzheng_img"><img src="/index.php?m=Home&c=User&a=verify" id="verify_code_img" onclick="verify()" width="102" height="38" /></div>
					</div>
				</form>
				<div class="login_forget"><a href="<?php echo U('Home/User/forget_pwd'); ?>">忘记密码？</a></div>
				<div class="login_get"><a href="javascript:void(0);" onClick="checkSubmit();">登 录</a></div>
				<div class="login_wechat"><a href="<?php echo U('LoginApi/login',array('oauth'=>'weixin')); ?>"><b class="login_wechat_img"></b><span>微信</span></a></div>
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
		<div class="login_footer_txt"><p>Copyright &copy; <?php echo (isset($tpshop_config['shop_info_store_name']) && ($tpshop_config['shop_info_store_name'] !== '')?$tpshop_config['shop_info_store_name']:'肽风尚商城'); ?> 版权所有 </p></div>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
	function checkSubmit() {
		var username = $.trim($('#username').val());
		var password = $.trim($('#password').val());
		var referurl = $('#referurl').val();
		var verify_code = $.trim($('#verify_code').val());
		if (username == '') {
			showErrorMsg('用户名不能为空!');
			return false;
		}
		if (!checkMobile(username) && !checkEmail(username)) {
			showErrorMsg('账号格式不匹配!');
			return false;
		}
		if (password == '') {
			showErrorMsg('密码不能为空!');
			return false;
		}
		if (verify_code == '') {
			showErrorMsg('验证码不能为空!');
			return false;
		}
		$.ajax({
			type: 'post',
			url: '/index.php?m=Home&c=User&a=do_login&t=' + Math.random(),
			data: $('#loginform').serialize(),
			dataType: 'json',
			success: function (res) {
				if (res.status == 1) {
					window.location.href = res.url;
				} else {
					showErrorMsg(res.msg);
					verify();
				}
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				showErrorMsg('网络失败，请刷新页面后重试');
			}
		})
	}
	function checkMobile(tel) {
		var reg = /(^1[3|4|5|7|8][0-9]{9}$)/;
		if (reg.test(tel)) {
			return true;
		} else {
			return false;
		}
		;
	}
	function checkEmail(str) {
		var reg = /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
		if (reg.test(str)) {
			return true;
		} else {
			return false;
		}
	}
	function showErrorMsg(msg) {
		layer.alert(msg, {icon: 2});
	}
	function verify() {
		$('#verify_code_img').attr('src', '/index.php?m=Home&c=User&a=verify&r=' + Math.random());
	}
</script>