<?php
/**
 * 后台合伙人模块
 * Author: Dh
 * Date: 2017-07-26
 */

namespace app\admin\controller;

use app\admin\logic\OrderLogic;
use think\Page;
use think\AjaxPage;
use think\Db;
use think\Loader;

class Partner extends Base {

	public $order_status;
	public $pay_status;
	public $shipping_status;
	public $partner_model;	//合伙人模型

	/**
	 * 初始化操作
	 */
	public function _initialize() {
		parent::_initialize();
		C('TOKEN_ON', false); // 关闭表单令牌验证
		$this->order_status = C('ORDER_STATUS');
		$this->pay_status = C('PAY_STATUS');
		$this->shipping_status = C('SHIPPING_STATUS');

		//订单 支付 发货状态
		$this->assign('order_status', $this->order_status);
		$this->assign('pay_status', $this->pay_status);
		$this->assign('shipping_status', $this->shipping_status);

		$this->partner_model = D('Partner');
	}

	public function index() {
		$this->assign('province', $this->getRegion(0, 1));
		return $this->fetch();
	}

	/* 合伙人列表 */
	public function ajaxPartnerList() {
		$province_id = I('post.province_id');
		$city_id = I('post.city_id');
		$district_id = I('post.district_id');
		$key_word = I('post.key_word');
		$partner_where = array();

		if (!empty($province_id)) {
			$partner_where['p.province_id'] = $province_id;
		}
		if (!empty($city_id)) {
			$partner_where['p.city_id'] = $city_id;
		}
		if (!empty($district_id)) {
			$partner_where['p.town_id'] = $district_id;
		}
		if (!empty($key_word)) {
			$partner_where['u.mobile'] = array('like', "%$key_word%");
		}

		$partner_where['p.status'] = 1;

		$content = $this->partner_model->partnerList($partner_where);

		$this->assign('partnerList', $content['list']);
		$this->assign('page', $content['page']); //赋值 分页输出
		$this->assign('pager', $content['pager']);
		return $this->fetch();
	}

	/* 添加合伙人 */
	public function add() {
		if (IS_POST) {
			$user = I('post.');
			$partner_id = I('post.partner_id');
			$user_id = I('post.user_id');
			$validate = Loader::validate('Partner');

			if (empty($partner_id)) {
				//添加
				if (!$validate->batch()->check($user)) { //数据校验
					$this->ajaxReturn(['status' => 0, 'msg' => '操作失败', 'result' => $validate->getError()]);
				}

				unset($partner_id);
				$user['password'] = encrypt($user['password']);
				$user['level'] = 8;	//会员等级为合伙人
				$user['is_distribut'] = 1;
				$user['mobile_validated'] = 1; //手机号已验证
				$user['reg_time'] = time();
				$user_id = DB::name('users')->add($user); //插入用户表

				if (!$user_id) {
					$this->ajaxReturn(['status' => 0, 'msg' => '添加失败','result' => '']);
				}else {
					$partner['user_id'] = intval($user_id);
					$partner['province_id'] = $user['province'];
					$partner['city_id'] = $user['city'];
					$partner['town_id'] = $user['district'];
					$partner['addtime'] = $user['reg_time'];
					$partner['phone'] = $user['mobile'];
					$partner_id = DB::name('partner')->add($partner); //插入合伙人表
					if (!$partner_id) {
						$this->ajaxReturn(['status' => 0, 'msg' => '添加失败','result' => '']);
					}else {
						adminLog('添加合伙人 ' . $user['nickname']); //记录日志
						$this->ajaxReturn(['status' => 1, 'msg' => '添加成功','result' => '']);
					}
				}
			}else {
				//修改
				if (!$validate->scene('edit')->batch()->check($user)) { //数据校验
					$this->ajaxReturn(['status' => 0, 'msg' => '操作失败', 'result' => $validate->getError()]);
				}

				if(empty($user['password'])){
					unset($user['password']);
				}else{
					$user['password'] = encrypt($user['password']);
				}
				$res1 = DB::name('users')->where(array('user_id' => $user_id))->save($user); //更新用户表

				$partner['province_id'] = $user['province'];
				$partner['city_id'] = $user['city'];
				$partner['town_id'] = $user['district'];
				$partner['phone'] = $user['mobile'];
				$res2 = DB::name('partner')->where(array('partner_id' => $partner_id))->save($partner); //更新合伙人表

				if (($res1 === false) || ($res2 === false)) {
					$this->ajaxReturn(['status' => 0, 'msg' => '编辑失败','result' => '']);
				} else {
					adminLog('编辑合伙人 ' . $user['nickname']); //记录日志
					$this->ajaxReturn(['status' => 1, 'msg' => '编辑成功','result' => '']);
				}
			}
		}

		$this->assign('province', $this->getRegion(0, 1));
		return $this->fetch();
	}

	/* 编辑合伙人 */
	public function edit() {
		$id = I('get.partner_id/d');
		$partner = DB::name('partner')
					->alias('p')
					->field("p.*, u.nickname")
					->join('__USERS__ u', 'u.user_id = p.user_id', 'LEFT')
					->where(array('partner_id'=>$id))
					->find();
		$this->assign('partner', $partner);
		$this->assign('province', $this->getRegion(0, 1));
		$this->assign('city', $this->getRegion($partner['province_id'], 2));
		$this->assign('district', $this->getRegion($partner['city_id'], 3));
		$this->assign('act', 'edit');
		return $this->fetch('add');
	}

	/* 删除合伙人 */
	public function del(){
		$id = I('get.partner_id/d');
		$info = DB::name('partner')
					->alias('p')
					->join('__USERS__ u', 'u.user_id = p.user_id', 'LEFT')
					->where(array('p.partner_id'=>$id))
					->field('u.user_id, u.nickname')
					->find();
		$res = DB::name('partner')->where(array('partner_id'=>$id))->setField('status', 0);
		$rs = DB::name('users')->where(array('user_id'=>$info['user_id']))->setField('level', 1);
		if (!$res || !$rs){
			DB::name('partner')->where(array('partner_id'=>$id))->setField('status', 1);
			DB::name('users')->where(array('user_id'=>$info['user_id']))->setField('level', 8);
			$this->ajaxReturn(['status' => 0, 'msg' => '删除失败!']);
		}
		adminLog('删除合伙人 ' . $nickname);
		$this->ajaxReturn(['status' => 1, 'msg' => '操作成功!']);
	}

	/* 查看合伙人下的工厂店列表 */
	public function view() {
		$id = I('get.partner_id/d');
		$content = $this->partner_model->getPartnerStore($id);
		
		$this->assign('partner_id', $id);
		$this->assign('page', $content['page']);
		$this->assign('pager', $content['pager']);
		$this->assign('storeList', $content['list']);
		$this->assign('empty', "<div class='empty'>暂无工厂店</div>");
		return $this->fetch('storeList');
	}

	/**
	 * 获取省、市、区列表
	 * @param  int $pid   父级id
	 * @param  int $level 地区等级
	 * @return array      地区列表
	 */
	public function getRegion($pid, $level) {
		$region = M('region')->where(array('parent_id'=>$pid, 'level'=>$level))->select();
		return $region;
	}

	/**
	 * 合伙人提现申请记录列表
	 */
	public function withdrawals() {
		$data = I('post.');

		//筛选条件
		if (!empty($data['create_time'])) {
			$create_time2 = explode(',', $data['create_time']);
			$where['w.create_time'] = array(array('egt', strtotime($create_time2[0])), array('elt', strtotime($create_time2[1])), 'AND');
			$this->assign('start_time', $create_time2[0]);
			$this->assign('end_time', $create_time2[1]);
		}
		if (!empty($data['mobile'])) {
			$where['u.mobile'] = array('like', "%" . $data['mobile'] . "%");
		}
		if (!empty($data['account_bank'])) {
			$where['w.account_bank'] = array('like', "%" . $data['account_bank'] . "%");
		}
		if($data['status'] === '0' || $data['status'] > 0) {
			$where['w.status'] = $data['status'];
		}
		$where['u.level'] = 8;

		$count = DB::name('withdrawals')
				->alias('w')
				->join('__USERS__ u', 'u.user_id = w.user_id', 'LEFT')
				->where($where)
				->count();
		$Page = new Page($count, 20);
		$show = $Page->show();

		$list = DB::name('withdrawals')
				->alias('w')
				->join('__USERS__ u', 'u.user_id = w.user_id', 'LEFT')
				->where($where)
				->order("w.create_time desc")
				->limit($Page->firstRow . ',' . $Page->listRows)
				->select();
		
		$this->assign('page', $show);
		$this->assign('pager', $Page);
		$this->assign('list', $list);
		C('TOKEN_ON', false); //关闭表单令牌验证
		return $this->fetch();
	}

	/**
	 * 编辑合伙人提现申请
	 */
	public function editWithdrawals() {
		$id = I('get.id/d');

		$record = DB::name('withdrawals')
				->alias('w')
				->field('w.*, u.nickname, u.user_money')
				->join('__USERS__ u', 'u.user_id = w.user_id', 'LEFT')
				->where(array('w.id'=>$id))
				->find();

		if (IS_POST) {
			$data = I('post.');
			// 如果是已经给用户转账 则生成转账流水记录
			if ($data['status'] == 1 && $record['status'] != 1) {
				if ($record['user_money'] < $record['money']) {
					$this->error('用户余额不足' . $record['money'] . '，不够提现！');
					exit;
				}
				accountLog($record['user_id'], ($record['money'] * -1), 0, "平台提现");

				$remittance = array(
					'user_id' => $record['user_id'],
					'bank_name' => $record['bank_name'],
					'account_bank' => $record['account_bank'],
					'account_name' => $record['account_name'],
					'money' => $record['money'],
					'status' => 1,
					'create_time' => time(),
					'admin_id' => session('admin_id'),
					'withdrawals_id' => $record['id'],
					'remark' => $data['remark'],
				);
				M('remittance')->add($remittance);
			}
			$r = DB::name('withdrawals')->update($data);

			if ($r) {
				if ($data['status'] == 1 && $record['status'] != 1) {
					adminLog('管理员通过了合伙人-' . $record['nickname'] . '的提现申请');
				}else if ($data['status'] == 2) {
					adminLog('管理员拒绝了合伙人-' . $record['nickname'] . '的提现申请');
				}
				$this->success("操作成功!", U('Admin/Partner/remittance'), 3);
			}else {
				$this->error("操作失败!");
			}
			exit;
		}

		$this->assign('data', $record);
		return $this->fetch();
	}

	/**
	 * 删除合伙人提现申请记录
	 */
	public function delWithdrawals() {
		$id = I('get.id/d');
		$nickname = DB::name('withdrawals')
					->alias('w')
					->join('__USERS__ u', 'u.user_id = w.user_id', 'LEFT')
					->where(array('w.id'=>$id))
					->getField('u.nickname');
		$res = DB::name('withdrawals')->where(array('id'=>$id))->delete();
		if (!$res){
			$this->ajaxReturn(array('status'=>0, 'msg'=>'操作失败！'));
		}
		adminLog('管理员删除了合伙人-' . $nickname . '的提现申请');
		$this->ajaxReturn(array('status'=>1, 'msg'=>'操作成功！'));
	}

	/**
	 *  转账汇款记录
	 */
	public function remittance(){
		$data = I('post.');

		//筛选条件
		if (!empty($data['create_time'])) {
			$create_time2 = explode('-', $data['create_time']);
			$where['r.create_time'] = array(array('egt', strtotime($create_time2[0])), array('elt', strtotime($create_time2[1])), 'AND');
			$this->assign('start_time', $create_time2[0]);
			$this->assign('end_time', $create_time2[1]);
		}
		if (!empty($data['mobile'])) {
			$where['u.mobile'] = array('like', "%" . $data['mobile'] . "%");
		}
		if (!empty($data['account_bank'])) {
			$where['r.account_bank'] = array('like', "%" . $data['account_bank'] . "%");
		}
		$where['u.level'] = 8;

		$count = DB::name('remittance')
				->alias('r')
				->join('__USERS__ u', 'u.user_id = r.user_id', 'LEFT')
				->where($where)
				->count();
		$Page = new Page($count, 20);
		$show = $Page->show();

		$list = DB::name('remittance')
				->alias('r')
				->join('__USERS__ u', 'u.user_id = r.user_id', 'LEFT')
				->where($where)
				->order("r.create_time desc")
				->limit($Page->firstRow . ',' . $Page->listRows)
				->select();
		
		$this->assign('page', $show);
		$this->assign('pager', $Page);
		$this->assign('list', $list);
		C('TOKEN_ON', false); //关闭表单令牌验证
		return $this->fetch();
	}

	/**
	 * 库存管理
	 */
	public function stockList() {
		$data = I('post.');
		$where = array();

		if (!empty($data['province_id'])) {
			$where['p.province_id'] = $data['province_id'];
		}
		if (!empty($data['city_id'])) {
			$where['p.city_id'] = $data['city_id'];
		}
		if (!empty($data['town_id'])) {
			$where['p.town_id'] = $data['town_id'];
		}
		if (!empty($data['mobile'])) {
			$where['u.mobile'] = array('like', '%' . $data['mobile'] . '%');
		}

		$content = $this->partner_model->partnerList($where);

		$this->assign('list', $content['list']);
		$this->assign('page', $content['page']); //赋值 分页输出
		$this->assign('pager', $content['pager']);
		$this->assign('province', $this->getRegion(0, 1));
		return $this->fetch();
	}

	public function ajaxStockList() {
		$id = I('get.id/d');

		$count = DB::name('partner_stock')->where(array('partner_id'=>$id))->count();
		$Page = new AjaxPage($count, 10);
		$show = $Page->show();

		$content = $this->partner_model->getPartnerStock($id, $Page);

		$this->assign('page', $show);
		$this->assign('pager', $Page);
		$this->assign('list', $content);
		$this->assign('storeage', tpCache('basic.partner_storeage')); //合伙人库存预警比例配置
		return $this->fetch();
	}

	/**
	 * 管理员补货
	 */
	public function delivery() {
		$id = I('get.id/d');

		if (IS_POST) {
			$data = I('post.');
			$partner = DB::name('partner')
						->alias('p')
						->field('p.user_id, p.province_id, p.city_id, p.town_id, p.phone, u.nickname as name')
						->join('__USERS__ u', 'u.user_id = p.user_id', 'LEFT')
						->where(array('partner_id'=>$id))
						->find();
			$partner['addtime'] = time();
			$partner['express_name'] = $data['express_name'];
			$partner['express_code'] = $data['express_code'];
			$partner['delivery_type'] = 2; //公司发给合伙人
			$partner['edituser'] = $_SESSION['admin_id'];
			$id = DB::name('delivery')->add($partner); //插入发货单表

			if ($id) {
				foreach ($data['goods'] as $key => $value) {
					$goods['goods_id'] = $value['goods_id'];
					$goods['goods_num'] = $value['number'];
					$goods['delivery_id'] = $id;
					DB::name('delivery_goods')->add($goods); //插入发货单详细商品表
					DB::name('goods')->where("goods_id", $value['goods_id'])->setDec('store_count', $value['number']); // 直接扣除商品总数量
					$name = DB::name('goods')->where("goods_id", $value['goods_id'])->getField('goods_name');
					$code = $data['express_code'] . "(" . $data['express_name'] . ")";
					$log = array('goods_id'=>$value['goods_id'], 'goods_name'=>$name, 'muid'=>$_SESSION['admin_id'], 'order_sn'=>$code, 'stock'=>'-'.$value['number'], 'ctime'=>time());
					DB::name('stock_log')->add($log);
				}
				adminLog('管理员对合伙人-' . $partner['name'] . '进行补货操作！');
				$this->ajaxReturn(array('status'=>1, 'msg'=>'操作成功！'));
			}else {
				$this->ajaxReturn(array('status'=>0, 'msg'=>'操作失败！'));
			}
		}else {
			$list = DB::name('goods')->field('goods_id, goods_name, store_count')->select();
			foreach ($list as $key => &$value) {
				$max = $this->partner_model->max_stock($id, $value['goods_id']);
				$value['max_num'] = empty($max) ? $value['store_count'] : $max;
			}

			$this->assign('list', $list);
			$this->assign('id', $id);
			return $this->fetch();
		}
	}

	/**
	 * 库存日志
	 */
	public function stockLog() {
		$data = I('post.');

		$where = array();
		//筛选条件
		if (!empty($data['ctime'])) {
			$create_time2 = explode(',', $data['ctime']);
			$where['l.ctime'] = array(array('egt', strtotime($create_time2[0])), array('elt', strtotime($create_time2[1])), 'AND');
			$this->assign('start_time', $create_time2[0]);
			$this->assign('end_time', $create_time2[1]);
		}
		if (!empty($data['mobile'])) {
			$where['u.mobile'] = array('like', '%' . $data['mobile'] . '%');
		}

		$content = $this->partner_model->getStockLog($where);

		$this->assign('page', $content['page']);
		$this->assign('pager', $content['pager']);
		$this->assign('list', $content['list']);
		return $this->fetch('stock_log');
	}

	/**
	 * 合伙人下所有工厂店的订单列表
	 */
	public function orderList() {
		$data = I('post.');
		$where = array();

		if (!empty($data['province_id'])) {
			$where['p.province_id'] = $data['province_id'];
		}
		if (!empty($data['city_id'])) {
			$where['p.city_id'] = $data['city_id'];
		}
		if (!empty($data['town_id'])) {
			$where['p.town_id'] = $data['town_id'];
		}
		if (!empty($data['mobile'])) {
			$where['u.mobile'] = array('like', '%' . $data['mobile'] . '%');
		}

		$content = $this->partner_model->partnerList($where);

		$this->assign('orderList', $content['list']);
		$this->assign('page', $content['page']); //赋值 分页输出
		$this->assign('pager', $content['pager']);
		$this->assign('province', $this->getRegion(0, 1));
		return $this->fetch('order_list');
	}

	public function ajaxOrderList() {
		$id = I('get.id/d');

		$count = DB::name('relation')->alias('r')->join('__ORDER__ o', 'r.order_sn = o.order_sn', 'LEFT')->where(array('r.partner_id'=>$id, 'o.order_status'=>2))->count();
		$Page = new AjaxPage($count, 10);
		$show = $Page->show();

		$order = DB::name('relation')
				->alias('r')
				->field('o.order_id, s.store_name, r.order_sn, o.consignee, o.mobile, o.total_amount, o.order_status, o.add_time')
				->join('__ORDER__ o', 'r.order_sn = o.order_sn', 'LEFT')
				->join('__STORE__ s', 's.store_id = o.store_id', 'LEFT')
				->where(array('r.partner_id'=>$id, 'o.order_status'=>2))
				->limit($Page->firstRow . ',' . $Page->listRows)
				->select();

		$this->assign('page', $show);
		$this->assign('pager', $Page);
		$this->assign('orderList', $order);
		return $this->fetch();
	}

	/**
	 * 订单详情
	 */
	public function order_info() {
		$order_id = I('get.order_id');
		$orderLogic = new OrderLogic();
        $order = $orderLogic->getOrderInfo($order_id);
        $orderGoods = $orderLogic->getOrderGoods($order_id);

        $order['store_id'] = DB::name('store')->where(array('store_id'=>$order['store_id']))->getField('store_name');
        $order['safecode'] = DB::name('safecode')->where(array('order_sn'=>$order['order_sn']))->getField('safecode');

        $this->assign('order', $order);
        $this->assign('orderGoods', $orderGoods);
		return $this->fetch();
	}


	/**
	 * 配货单列表（合伙人配货给工厂店）
	 */
	public function invoice() {
		$data = I('post.');
		$where = array();

		//筛选条件
		if (!empty($data['addtime'])) {
			$create_time2 = explode(',', $data['addtime']);
			$where['d.addtime'] = array(array('egt', strtotime($create_time2[0])), array('elt', strtotime($create_time2[1])), 'AND');
			$this->assign('start_time', $create_time2[0]);
			$this->assign('end_time', $create_time2[1]);
		}
		// if (!empty($data['mobile'])) {
		// 	$where['u.mobile'] = array('like', '%' . $data['mobile'] . '%');
		// }

		$content = $this->partner_model->delivery($where);

		$this->assign('page', $content['page']);
		$this->assign('pager', $content['pager']);
		$this->assign('list', $content['list']);
		return $this->fetch();
	}

	/**
	 * 配货单详情
	 */
	public function invoice_info() {
		$id = I('get.id/d');
		$content = $this->partner_model->delivery_info($id);

		$this->assign('info', $content['info']);
		$this->assign('orderGoods', $content['goods']);
		return $this->fetch();
	}

	/**
	 * 库存配置
	 */
	public function stockConfig() {
		$count = DB::name('partner_stock_config')->count();
		$Page = new Page($count, 10);
		$show = $Page->show();

		$list = DB::name('partner_stock_config')
				->alias('p')
				->field('p.goods_id, g.goods_name, p.stock')
				->join('__GOODS__ g', 'g.goods_id = p.goods_id', 'LEFT')
				->limit($Page->firstRow . ',' . $Page->listRows)
				->select();

		$this->assign('page', $show);
		$this->assign('pager', $Page);
		$this->assign('list', $list);
		return $this->fetch('stock_config');
	}

	/**
	 * 添加、编辑库存配置
	 */
	public function add_config() {
		$id = I('get.id');

		if (IS_POST) {
			$data = I('post.');

			if (empty($id)) {
				$validate = Loader::validate('Partner');
				$result = array();
				foreach ($data['goods'] as $key => $value) {
					if (!$validate->scene('stock')->batch()->check($value)) {
						$result[] = $key;
					}
				}
				if (!$result) {
					DB::name('partner_stock_config')->insertAll($data['goods']);
					$this->ajaxReturn(array('status'=>1, 'msg'=>'操作成功！'));
				}else {
					$this->ajaxReturn(array('status'=>0, 'msg'=>'操作失败,请勿重复设置商品最大库存量！'));
				}
			}else {
				//编辑
				$result = DB::name('partner_stock_config')->where(array('goods_id'=>$id))->update($data);
				if ($result) {
					$this->ajaxReturn(array('status'=>1, 'msg'=>'操作成功！'));
				}else {
					$this->ajaxReturn(array('status'=>0, 'msg'=>'操作失败！'));
				}
			}
		}else {
			if (!empty($id)) {
				$stock = DB::name('partner_stock_config')->where(array('goods_id'=>$id))->getField('stock');
				$this->assign('stock', $stock);
				$this->assign('act', 'edit');
			}else {
				$this->assign('act', 'add');
			}
			$goods = DB::name('goods')->field('goods_id, goods_name')->select();
			$this->assign('list', $goods);
			return $this->fetch();
		}
	}

	/* 删除库存配置 */
	public function del_config(){
		$id = I('get.id/d');
		$res = DB::name('partner_stock_config')->where(array('goods_id'=>$id))->delete();
		if (!$res){
			$this->ajaxReturn(['status' => 0, 'msg' => '操作失败!']);
		}
		$this->ajaxReturn(['status' => 1, 'msg' => '操作成功!']);
	}

	/**
	 * 合伙人补货申请
	 */
	public function apply() {
		$data = I('post.');
		$where = array();

		//筛选条件
		if (!empty($data['addtime'])) {
			$create_time2 = explode(',', $data['addtime']);
			$where['ga.addtime'] = array(array('egt', strtotime($create_time2[0])), array('elt', strtotime($create_time2[1])), 'AND');
			$this->assign('start_time', $create_time2[0]);
			$this->assign('end_time', $create_time2[1]);
		}
		if (!empty($data['mobile'])) {
			$where['u.mobile'] = array('like', '%' . $data['mobile'] . '%');
		}
		if($data['status'] === '0' || $data['status'] > 0) {
			$where['ga.status'] = $data['status'];
		}
		$where['u.level'] = 8; //会员等级为合伙人

		$content = $this->partner_model->apply($where);

		$this->assign('page', $content['page']);
		$this->assign('pager', $content['pager']);
		$this->assign('list', $content['list']);
		return $this->fetch();
	}

	/**
	 * 补货申请记录明细
	 */
	public function apply_info() {
		$id = I('get.id/d');
		$content = $this->partner_model->apply_info($id);

		if (IS_POST) {
			$data = I('post.');
			if ($data['act'] == 'cancel') { //拒绝申请
				$data['status'] = 2;
				$data['edituser'] = session('admin_id');
				$data['edittime'] = time();
				$result = DB::name('goods_apply')->where("id=$id")->update($data);
				if ($result) {
					adminLog('管理员处理合伙人补货申请！');
					$this->ajaxReturn(array('status'=>1, 'msg'=>'操作成功！'));
				}else {
					$this->ajaxReturn(array('status'=>0, 'msg'=>'操作失败！'));
				}
			}else if ($data['act'] == 'delivery') {
				$partner = DB::name('partner')
						->alias('p')
						->field('p.user_id, p.province_id, p.city_id, p.town_id, p.phone, u.nickname as name')
						->join('__USERS__ u', 'u.user_id = p.user_id', 'LEFT')
						->join('__GOODS_APPLY__ g', 'g.user_id = p.user_id', 'LEFT')
						->where(array('g.id'=>$data['id']))
						->find();
				$delivery = DB::name('delivery')->field('id, status')->where(array('express_code'=>$data['express_code']))->find();
				$delivery_id = empty($delivery) ? '' : $delivery['id'];
				if (!empty($delivery) && ($delivery['status'] == 1)) {
					$this->ajaxReturn(array('status'=>0, 'msg'=>'无效的物流单号，请重新填写！'));
				} else if (empty($delivery)) {
					$partner['addtime'] = time();
					$partner['express_name'] = $data['express_name'];
					$partner['express_code'] = $data['express_code'];
					$partner['delivery_type'] = 2; //公司发给合伙人
					$partner['edituser'] = session('admin_id');
					$delivery_id = DB::name('delivery')->add($partner); //插入发货单表

					foreach ($content['goods'] as $key => $value) {
						$g['goods_id'] = $value['goods_id'];
						$g['goods_num'] = $value['goods_num'];
						$g['delivery_id'] = $delivery_id;
						DB::name('delivery_goods')->add($g); //插入发货单详细商品表
						DB::name('goods')->where("goods_id", $value['goods_id'])->setDec('store_count', $value['goods_num']); // 直接扣除商品总数量
					}
				}

				$result['delivery_id'] = $delivery_id;
				$result['status'] = 1;
				$result['edituser'] = session('admin_id');
				$result['edittime'] = time();
				$result['remark'] = $data['remark'];

				$res = DB::name('goods_apply')->where(array('id'=>$data['id']))->update($result);
				if ($res) {
					DB::name('delivery')->where('id', $delivery_id)->setField('status', 1);
					adminLog('管理员处理合伙人补货申请！');
					$this->ajaxReturn(array('status'=>1, 'msg'=>'操作成功！'));
				}else {
					$this->ajaxReturn(array('status'=>0, 'msg'=>'操作失败！'));
				}
			}
		}

		$this->assign('info', $content['info']);
		$this->assign('goods', $content['goods']);
		return $this->fetch();
	}
}