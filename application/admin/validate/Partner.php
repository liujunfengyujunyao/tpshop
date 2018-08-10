<?php
/**
 * 后台添加合伙人数据验证
 * Author: Dh
 * Date: 2017-07-27
 */

namespace app\admin\validate;
use think\Validate;

class Partner extends Validate {
	// 验证规则
	protected $rule = [
		'nickname'	=> 'require',
		'password'	=> 'require|alphaDash|min:6|max:16',
		'district'	=> 'require|number',
		'mobile'	=> ['require', 'regex'=>'/^1[3|4|5|8][0-9]\d{4,8}$/', 'checkMobile'],
		'goods_id'	=> 'checkGoods',
	];
	//错误信息
	protected $message  = [
		'nickname.require'		=> '合伙人姓名不能为空',
		'password.require'		=> '密码不能为空',
		'password.alphaDash'	=> '只能是字母、数字和下划线的组合',
		'password.min'			=> '密码长度不能少于6位',
		'password.max'			=> '密码长度不能超过16位',
		'district.require'		=> '请选择地址',
		'district.number'		=> '请选择地址',
		'mobile.require'		=> '联系电话不能为空',
		'mobile.regex'			=> '联系电话格式错误',
		'mobile.checkMobile'	=> '手机号已被占用',
		// 'goods_id.checkGoods'	=> '请勿重复设置商品最大库存量'
	];
	//验证场景
	protected $scene = [
		'edit' => [
			'nickname'	=> 'require',
			'password'	=> 'alphaDash|min:6|max:16',
			'district'	=> 'require|number',
			'mobile'	=> ['require', 'regex'=>'/^1[3|4|5|8][0-9]\d{4,8}$/', 'checkMobile']
		],
		'stock' => [
			'goods_id'	=> 'checkGoods',
		],
	];

	/**
	 * 验证合伙人手机号是否唯一
	 * @param $value
	 * @param $rule
	 * @param $data
	 */
	protected function checkMobile($value, $rule, $data) {
		$mobile = M('Users')->where(array('user_id'=>$data['user_id']))->getField('mobile');
		if ($mobile == $value) {
			return true;
		}else {
			$count = M('Users')->where(array('mobile'=>$value))->count();
			return $count>0 ? false : true;
		}
	}

	/**
	 * 验证合伙人默认商品库存量是否唯一
	 * @param $value
	 * @param $rule
	 * @param $data
	 */
	protected function checkGoods($value, $rule, $data) {
		$count = M('Partner_stock_config')->where(array('goods_id'=>$data['goods_id']))->find();
		return $count>0 ? false : true;
	}
}