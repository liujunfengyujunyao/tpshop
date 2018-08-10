<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:40:"./template/pc/tfs/user\edit_address.html";i:1513580608;}*/ ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>收货地址-<?php echo $tpshop_config['shop_info_store_title']; ?></title>
	<meta name="keywords" content="<?php echo $tpshop_config['shop_info_store_keyword']; ?>" />
	<meta name="description" content="<?php echo $tpshop_config['shop_info_store_desc']; ?>" />
	<link href="__STATIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="__STATIC__/css/style.css" type="text/css">
	<script src="__STATIC__/bootstrap/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="__STATIC__/js/slider.js"></script>
	<script src="__PUBLIC__/js/layer/layer.js"></script><!--弹窗js 参考文档 http://layer.layui.com/-->
	<script src="__PUBLIC__/js/global.js"></script>
	<script src="__PUBLIC__/js/pc_common.js"></script>
</head>
<body>
<div class="address-add">
	<div class="ner-reac ol_box_4">
		<div class="box-ct">
			<div class="box-header">
				<span class="box-title">添加地址</span>
			</div>
			<form action="" method="post" onSubmit="return checkForm()">
				<table width="90%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td align="right"><span class="xh">*</span><label for="consignee">收货人：&nbsp;</label></td>
						<td>
							<input class="wi80-BFB" id="consignee" name="consignee" type="text" value="<?php echo $address['consignee']; ?>" maxlength="12" />
						</td>
					</tr>
					<tr>
						<td align="right"><span class="xh">*</span><label for="province">收货地址：&nbsp;</label></td>
						<td>
							<select class="di-bl fl seauii" name="province" id="province" onChange="get_city(this,0)">
								<option value="0">请选择</option>
								<?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?>
									<option
									<?php if($address['province'] == $p['id']): ?>selected<?php endif; ?>
									value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>

							<select class="di-bl fl seauii" name="city" id="city" onChange="get_area(this)">
								<option value="0">请选择</option>
								<?php if(is_array($city) || $city instanceof \think\Collection || $city instanceof \think\Paginator): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?>
									<option
									<?php if($address['city'] == $p['id']): ?>selected<?php endif; ?>
									value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>

							<select class="di-bl fl seauii" name="district" id="district" onChange="get_twon(this)">
								<option value="0">请选择</option>
								<?php if(is_array($district) || $district instanceof \think\Collection || $district instanceof \think\Paginator): $i = 0; $__LIST__ = $district;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?>
									<option
									<?php if($address['district'] == $p['id']): ?>selected<?php endif; ?>
									value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>

							<!--<select class="di-bl fl seauii" name="twon" id="twon" <?php if($address['twon'] > 0): ?>style="display:block;"<?php else: ?>style="display:none;"<?php endif; ?>>-->
							<!--<?php if(is_array($twon) || $twon instanceof \think\Collection || $twon instanceof \think\Paginator): $i = 0; $__LIST__ = $twon;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?>-->
							<!--<option <?php if($address['twon'] == $p['id']): ?>selected<?php endif; ?>  value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>-->
							<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
							<!--</select>-->
							<br>
						</td>
					</tr>
					<tr>
						<td align="right" valign="top"><span class="xh">*</span><label for="address">详细地址：&nbsp;</label></td>
						<td>
							<textarea class="he110 wi80-BFB re-no" name="address" id="address" maxlength="100"><?php echo $address['address']; ?></textarea>
						</td>
					</tr>
					<tr>
						<td align="right"><label for="email">邮编：&nbsp;</label></td>
						<td>
							<input class="wi80-BFB" id="email" type="text" name="zipcode" value="<?php echo $address['zipcode']; ?>" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onKeyUp="this.value=this.value.replace(/[^\d]/g,'')" maxlength="10" />
						</td>
					</tr>
					<tr>
						<td align="right"><span class="xh">*</span><label for="mobile">手机号：&nbsp;</label></td>
						<td>
							<input class="wi40-BFB" type="text" id="mobile" name="mobile" value="<?php echo $address['mobile']; ?>" maxlength="15" />
						</td>
					</tr>
					<tr>
						<td class="pa-50-0">&nbsp;</td>
						<td align="right">
							<button type="submit" class="btn btn-danger"><span>保存收货地址</span></button>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>

<script>
	function checkForm() {
		var consignee = $('input[name="consignee"]').val();
		var province = $('select[name="province"]').find('option:selected').val();
		var city = $('select[name="city"]').find('option:selected').val();
		var district = $('select[name="district"]').find('option:selected').val();
		var address = $('textarea[name="address"]').val();
		var mobile = $('input[name="mobile"]').val();
		var error = '';
		if (consignee == '') {
			error += '收货人不能为空 <br/>';
		}
		if (province == 0) {
			error += '请选择省份 <br/>';
		}
		if (city == 0) {
			error += '请选择城市 <br/>';
		}
		if (district == 0) {
			error += '请选择区域 <br/>';
		}
		if (address == '') {
			error += '请填写地址 <br/>';
		}
		if (mobile == '') {
			error += '请填写手机号 <br/>';
		} else if (!checkMobile(mobile)) {
			error += '手机号格式错误 <br/>';
		}

		if (error) {
			layer.msg(error, {
				icon: 2,   // 成功图标
				time: 2000 //2秒关闭（如果不配置，默认是3秒）
			});
			return false;
		}
		return true;
	}
</script>
</body>
</html>
