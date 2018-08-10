<?php
/**
 * tpshop
 * ============================================================================
 * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * 采用TP5助手函数可实现单字母函数M D U等,也可db::name方式,可双向兼容
 * ============================================================================
 * Author: 当燃      
 * Date: 2015-12-21
 */

namespace app\admin\controller;
use app\admin\logic\GoodsLogic;
use think\Db;
use think\Page;

class Report extends Base{
	public $begin;
	public $end;
	public function _initialize(){
		parent::_initialize();
		
		if(I('start_time')){
						$begin = I('start_time');
						$end = I('end_time');
		}else{
						$begin = date('Y-m-d', strtotime("-3 month"));//30天前
						$end = date('Y-m-d', strtotime('+1 days'));
		}
		$this->assign('start_time',$begin);
		$this->assign('end_time',$end);
		$this->begin = strtotime($begin);
		$this->end = strtotime($end)+86399;
	}
	
	public function index(){
		$now = strtotime(date('Y-m-d'));
		$today['today_amount'] = M('order')->where("add_time>$now AND (pay_status=1 or pay_code='cod') and order_status in(1,2,4)")->sum('order_amount');//今日销售总额
		$today['today_order'] = M('order')->where("add_time>$now and (pay_status=1 or pay_code='cod')")->count();//今日订单数
		$today['cancel_order'] = M('order')->where("add_time>$now AND order_status=3")->count();//今日取消订单
		if ($today['today_order'] == 0) {
			$today['sign'] = round(0, 2);
		} else {
			$today['sign'] = round($today['today_amount'] / $today['today_order'], 2);
		}
		$this->assign('today',$today);
		$sql = "SELECT COUNT(*) as tnum,sum(order_amount) as amount, FROM_UNIXTIME(add_time,'%Y-%m-%d') as gap from  __PREFIX__order ";
		$sql .= " where add_time>$this->begin and add_time<$this->end AND (pay_status=1 or pay_code='cod') and order_status in(1,2,4) group by gap ";
		$res = DB::query($sql);//订单数,交易额
		
		foreach ($res as $val){
			$arr[$val['gap']] = $val['tnum'];
			$brr[$val['gap']] = $val['amount'];
			$tnum += $val['tnum'];
			$tamount += $val['amount'];
		}

		for($i=$this->begin;$i<=$this->end;$i=$i+24*3600){
			$tmp_num = empty($arr[date('Y-m-d',$i)]) ? 0 : $arr[date('Y-m-d',$i)];
			$tmp_amount = empty($brr[date('Y-m-d',$i)]) ? 0 : $brr[date('Y-m-d',$i)];
			$tmp_sign = empty($tmp_num) ? 0 : round($tmp_amount/$tmp_num,2);						
			$order_arr[] = $tmp_num;
			$amount_arr[] = $tmp_amount;			
			$sign_arr[] = $tmp_sign;
			$date = date('Y-m-d',$i);
			$list[] = array('day'=>$date,'order_num'=>$tmp_num,'amount'=>$tmp_amount,'sign'=>$tmp_sign,'end'=>date('Y-m-d',$i+24*60*60));
			$day[] = $date;
		}
		rsort($list);
		$this->assign('list',$list);
		$result = array('order'=>$order_arr,'amount'=>$amount_arr,'sign'=>$sign_arr,'time'=>$day);
		$this->assign('result',json_encode($result));
		return $this->fetch();
	}

	public function saleTop(){
		$sql = "select goods_name,goods_sn,sum(goods_num) as sale_num,sum(goods_num*goods_price) as sale_amount from __PREFIX__order_goods ";
		$sql .=" where is_send = 1 group by goods_id order by sale_amount DESC limit 100";
		$res = DB::cache(true,3600)->query($sql);
		$this->assign('list',$res);
		return $this->fetch();
	}
	
	public function userTop(){
//		$p = I('p',1);
//		$start = ($p-1)*20;
		$mobile = I('mobile');
		$email = I('email');
		if($mobile){
			$where =  "and b.mobile='$mobile'";
		}		
		if($email){
			$where = "and b.email='$email'";
		}
		$sql = "select count(a.order_id) as order_num,sum(a.order_amount) as amount,a.user_id,b.mobile,b.email,b.nickname from __PREFIX__order as a left join __PREFIX__users as b ";
		$sql .= " on a.user_id = b.user_id where a.add_time>$this->begin and a.add_time<$this->end and a.pay_status=1 $where group by user_id order by amount DESC limit 0,100";
		$res = DB::cache(true)->query($sql);
		$this->assign('list',$res);
		$this->assign('count', count($res)); //添加数据总数统计 by Dh 2017-10-19
//		if(empty($where)){
//			$count = M('order')->where("add_time>$this->begin and add_time<$this->end and pay_status=1")->group('user_id')->count();
//			$Page = new Page($count,20);
//			$show = $Page->show();
//			$this->assign('page',$show);
//		}
		return $this->fetch();
	}
	
	public function saleList(){		 
		$cat_id = I('cat_id',0);
		$brand_id = I('brand_id',0);
		$where = "where b.add_time>$this->begin and b.add_time<$this->end ";
		if($cat_id>0){
			$where .= " and g.cat_id=$cat_id";
			$this->assign('cat_id',$cat_id);
		}
		if($brand_id>0){
			$where .= " and g.brand_id=$brand_id";
			$this->assign('brand_id',$brand_id);
		}
				
		$sql2 = "select count(*) as tnum from __PREFIX__order_goods as a left join __PREFIX__order as b on a.order_id=b.order_id ";
		$sql2 .= " left join __PREFIX__goods as g on a.goods_id = g.goods_id $where";
		$total = DB::query($sql2);
		$count =  $total[0]['tnum'];
		$Page = new Page($count,20);
		$show = $Page->show();                
				
		$sql = "select a.*,b.order_sn,b.shipping_name,b.pay_name,b.add_time from __PREFIX__order_goods as a left join __PREFIX__order as b on a.order_id=b.order_id ";
		$sql .= " left join __PREFIX__goods as g on a.goods_id = g.goods_id $where ";
		$sql .= "  order by add_time desc limit {$Page->firstRow},{$Page->listRows}";
		$res = DB::query($sql);
		$this->assign('list',$res);	
		$this->assign('pager',$Page);	
		$this->assign('page',$show);
		
				$GoodsLogic = new GoodsLogic();        
				$brandList = $GoodsLogic->getSortBrands();
				$categoryList = $GoodsLogic->getSortCategory();
				$this->assign('categoryList',$categoryList);
				$this->assign('brandList',$brandList);
				return $this->fetch();
	}
	
	public function user(){
		$today = strtotime(date('Y-m-d'));
		$month = strtotime(date('Y-m-01'));
		$user['today'] = D('users')->where("reg_time>$today")->count();//今日新增会员
		$user['month'] = D('users')->where("reg_time>$month")->count();//本月新增会员
		$user['total'] = D('users')->count();//会员总数
		$user['user_money'] = D('users')->sum('user_money');//会员余额总额
		$res = M('order')->cache(true)->distinct(true)->field('user_id')->select();
		$user['hasorder'] = count($res);
		$this->assign('user',$user);
		$sql = "SELECT COUNT(*) as num,FROM_UNIXTIME(reg_time,'%Y-%m-%d') as gap from __PREFIX__users where reg_time>$this->begin and reg_time<$this->end group by gap";
		$new = DB::query($sql);//新增会员趋势
		foreach ($new as $val){
			$arr[$val['gap']] = $val['num'];
		}
		
		for($i=$this->begin;$i<=$this->end;$i=$i+24*3600){
			$brr[] = empty($arr[date('Y-m-d',$i)]) ? 0 : $arr[date('Y-m-d',$i)];
			$day[] = date('Y-m-d',$i);
		}		
		$result = array('data'=>$brr,'time'=>$day);
		$this->assign('result',json_encode($result));					
		return $this->fetch();
	}
	
	//财务统计
	public function finance(){
		$sql = "SELECT sum(b.goods_num*b.member_goods_price) as goods_amount,sum(a.shipping_price) as shipping_amount,sum(b.goods_num*b.cost_price) as cost_price,";
		$sql .= "sum(a.coupon_price) as coupon_amount,FROM_UNIXTIME(a.add_time,'%Y-%m-%d') as gap from  __PREFIX__order a left join __PREFIX__order_goods b on a.order_id=b.order_id ";
		$sql .= " where a.add_time>$this->begin and a.add_time<$this->end AND a.pay_status=1 and a.shipping_status=1 and b.is_send=1 group by gap order by a.add_time";
		$res = DB::cache(true)->query($sql);//物流费,交易额,成本价
		
		foreach ($res as $val){
			$arr[$val['gap']] = $val['goods_amount'];
			$brr[$val['gap']] = $val['cost_price'];
			$crr[$val['gap']] = $val['shipping_amount'];
			$drr[$val['gap']] = $val['coupon_amount'];
		}
			
		for($i=$this->begin;$i<=$this->end;$i=$i+24*3600){
			$date = $day[] = date('Y-m-d',$i);
			$tmp_goods_amount = empty($arr[$date]) ? 0 : $arr[$date];
			$tmp_cost_amount = empty($brr[$date]) ? 0 : $brr[$date];
			$tmp_shipping_amount = empty($crr[$date]) ? 0 : $crr[$date];
			$tmp_coupon_amount = empty($drr[$date]) ? 0 : $drr[$date];
			
			$goods_arr[] = $tmp_goods_amount;
			$cost_arr[] = $tmp_cost_amount;
			$shipping_arr[] = $tmp_shipping_amount;
			$coupon_arr[] = $tmp_coupon_amount;
			$list[] = array('day'=>$date,'goods_amount'=>$tmp_goods_amount,'cost_amount'=>$tmp_cost_amount,
					'shipping_amount'=>$tmp_shipping_amount,'coupon_amount'=>$tmp_coupon_amount,'end'=>date('Y-m-d',$i+24*60*60));
		}
				rsort($list);
		$this->assign('list',$list);
		$result = array('goods_arr'=>$goods_arr,'cost_arr'=>$cost_arr,'shipping_arr'=>$shipping_arr,'coupon_arr'=>$coupon_arr,'time'=>$day);
		$this->assign('result',json_encode($result));
		return $this->fetch();
	}

	/**
	 * 体验品统计
	 * @author: Ly
	 * @date: 2017-9-11
	 */
	public function exp_good(){
		$exp_good_cat = 848;
		$sql = "SELECT og.goods_name,og.goods_sn, sum(og.goods_num) as sale_num FROM __PREFIX__order_goods og INNER JOIN __PREFIX__goods g ON og.goods_id = g.goods_id INNER JOIN __PREFIX__order o ON og.order_id = o.order_id";
		$sql .= " WHERE og.is_send =1 AND g.cat_id = $exp_good_cat AND o.add_time>$this->begin AND o.add_time<$this->end group by og.goods_id ORDER By  sale_num DESC limit 100";
		$res = DB::cache(true,3600)->query($sql);
		$empty = '<tr> <td colspan="5" style="text-align: center; color: red; font-size:16px;">暂无相关数据</td></tr>';
		$this->assign('empty',$empty);
		$this->assign('exp_good',$res);
		return $this->fetch();
	}

	/**
	 * 赠品统计
	 * @author: Ly
	 * @date:2017-9-11
	 */
	public function send_good(){
		$send_good_cat = 846;
		$sql = "SELECT g.send_id, sum(og.goods_num) as sale_num FROM __PREFIX__order_goods og INNER JOIN __PREFIX__goods g ON og.goods_id = g.goods_id INNER JOIN __PREFIX__order o ON og.order_id = o.order_id";
		$sql .= " WHERE og.is_send =1 AND g.send_id > 0 AND o.add_time>$this->begin AND o.add_time<$this->end group by g.send_id ORDER By  sale_num DESC limit 100";
		$res = DB::cache(true, 3600)->query($sql);

		foreach($res as &$k){
			$k['goods_name'] = M('goods')->where(array('goods_id'=>$k['send_id'], 'cat_id'=>$send_good_cat))->getField('goods_name');
			$k['goods_sn'] = M('goods')->where(array('goods_id'=>$k['send_id'], 'cat_id'=>$send_good_cat))->getField('goods_sn');	
		}

		$empty = '<tr> <td colspan="5" style="text-align: center; color: red; font-size:16px;">暂无相关数据</td></tr>';
		$this->assign('empty',$empty);
		$this->assign('send_good',$res);
		return $this->fetch();
	}

	/**
	 * 合伙人概况
	 * @author Dh
	 * @date 2017-9-12
	 */
	public function partner_info() {
		$group_list = [
			'partner_inStock' => '入库',
			'partner_outStock' => '出库',
			'partner_income' => '返利'
		];
		$this->assign('group_list', $group_list);
		$inc_type = I('get.inc_type', 'partner_inStock');
		$this->assign('inc_type', $inc_type);

		$data = I('post.');
		$where = array();
		if (!empty($data['mobile'])) {
			$where['u.mobile'] = array('like', '%' . $data['mobile'] . '%');
		}

		$this->{$inc_type}($where);
		return $this->fetch($inc_type);
	}

	/**
	 * 合伙人入库货物统计
	 * @author Dh
	 * @date 2017-9-12
	 */
	public function partner_inStock($where) {
		//筛选条件
		$where['d.confirm_time'] = array(array('egt', $this->begin), array('elt', $this->end), 'AND');
		$where['d.delivery_type'] = 2;	//公司发给合伙人
		$partner = D('Partner');
		$content = $partner->goodsReport($where);

		$this->assign('list', $content['list']);
		$this->assign('page', $content['page']);
		$this->assign('pager', $content['pager']);
	}

	/**
	 * 合伙人出库货物统计
	 * @author Dh
	 * @date 2017-9-12
	 */
	public function partner_outStock($where) {
		//筛选条件
		$where['d.confirm_time'] = array(array('egt', $this->begin), array('elt', $this->end), 'AND');
		$where['d.delivery_type'] = 3;	//合伙人发给工厂店
		$partner = D('Partner');
		$content = $partner->goodsReport($where);
		$list = $content['list'];
		foreach ($list as $key => &$value) {
			$user = Db::name('users')->where(array('user_id'=>$value['edituser']))->field('nickname, mobile')->find();
			$value['name'] = $user['nickname'];
			$value['phone'] = $user['mobile'];
		}

		$this->assign('list', $list);
		$this->assign('page', $content['page']);
		$this->assign('pager', $content['pager']);
	}

	/**
	 * 合伙人返利统计
	 * @author Dh
	 * @date 2017-9-12
	 */
	public function partner_income($where) {
		//筛选条件
		$where['r.confirm_time'] = array(array('egt', $this->begin), array('elt', $this->end), 'AND');
		$where['r.status'] = 3;	//已分成
		$where['u.level'] = 8;	//用户等级为合伙人

		$count = Db::name('rebate_log')
				->alias('r')
				->join('__USERS__ u', 'u.user_id = r.user_id', 'LEFT')
				->where($where)
				->group('r.user_id')
				->count();
		$Page = new Page($count, 20);
		$show = $Page->show();

		$list = Db::name('rebate_log')
				->alias('r')
				->field('u.nickname, u.mobile, sum(r.money) as money, count(r.id) as count')
				->join('__USERS__ u', 'u.user_id = r.user_id', 'LEFT')
				->where($where)
				->group('r.user_id')
				->cache(true, 3600)
				->select();
		$this->assign('list', $list);
		$this->assign('page', $show);
		$this->assign('pager', $Page);
	}

	/**
	 * 工厂店概况
	 * update 2017/09/15
	 */
	public function store_info() {
		$group_list = [
			'store_inStock' => '入库',
			'store_outStock' => '出库',
			'store_income' => '返利'
		];
		$this->assign('group_list', $group_list);
		$inc_type = I('get.inc_type', 'store_inStock');
		$this->assign('inc_type', $inc_type);

		$data = I('post.');
		$where = array();
		if (!empty($data['mobile'])) {
			$where['d.user_id'] = Db::name('Store')->where(array('phone'=>$data['mobile']))->getField('user_id');
		}
		$this->{$inc_type}($where);
		return $this->fetch($inc_type);
	}

	/**
	 * 工厂店入库货物统计
	 * update 2017/09/15
	 */
	public function store_inStock($where) {
		//筛选条件
		$where['d.confirm_time'] = array(array('egt', $this->begin), array('elt', $this->end), 'AND');
		$where['d.delivery_type'] = 3;	//发给工厂店

		$store = D('Store');
		$content = $store->goodsReport($where);

		$this->assign('list', $content['list']);
		$this->assign('page', $content['page']);
		$this->assign('pager', $content['pager']);
	}

	/**
	 * 工厂店出库货物统计
	 * update 2017/09/15
	 */
	public function store_outStock($where) {
		//筛选条件
		if($where['d.user_id'] > 0){
			$user_id = $where['d.user_id'];
			$condition['ssl.store_id'] = M('Store')->where(array('user_id'=>$user_id))->getField('store_id');
		}
		$condition['ssl.ctime'] = array(array('egt', $this->begin), array('elt', $this->end), 'AND');
		$condition['ssl.stock'] = array('lt', 0);
		
		$count = M('Store_stock_log')->alias('ssl')->where($condition)->count();
		$Page = new Page($count, 20);
        $show = $Page->show();

		$list = M('Store_stock_log')
				->alias('ssl')
				->field('ssl.id, s.store_name, g.goods_name, sum(ssl.stock)*(-1) as stock, s.phone, g.goods_sn')
				->join('__GOODS__ g', 'g.goods_id = ssl.goods_id', 'LEFT')
				->join('__STORE__ s', 's.store_id = ssl.store_id', 'LEFT')
		        ->where($condition)
		        ->group('ssl.store_id,ssl.goods_id')
		        ->limit($Page->firstRow . ',' . $Page->listRows)
		        ->select();

		$this->assign('list', $list);
		$this->assign('page', $content['page']);
		$this->assign('pager', $content['pager']);
	}

	/**
	 * 工厂店返利统计
	 * update 2017/09/18
	 */
	public function store_income($where) {
		//筛选条件
		$where['r.confirm_time'] = array(array('egt', $this->begin), array('elt', $this->end), 'AND');
		$where['r.status'] = 3;	//已分成
		$where['u.level'] = 9;	//用户等级为工厂店
		if(!empty($where['d.user_id'])) {
			$where['r.user_id'] = $where['d.user_id'];
			unset($where['d.user_id']); 
		}

		$count = Db::name('rebate_log')
				->alias('r')
				->join('__USERS__ u', 'u.user_id = r.user_id', 'LEFT')
				->where($where)
				->group('r.user_id')
				->count();
		$Page = new Page($count, 20);
		$show = $Page->show();

		$list = Db::name('rebate_log')
				->alias('r')
				->field('s.store_name, s.phone, sum(r.money) as money, count(r.id) as count')
				->join('__USERS__ u', 'u.user_id = r.user_id', 'LEFT')
				->join('__STORE__ s', 's.user_id = r.user_id', 'LEFT')
				->where($where)
				->group('r.user_id')
				->cache(true, 3600)
				->select();

		$this->assign('list', $list);
		$this->assign('page', $show);
		$this->assign('pager', $Page);
	}
}