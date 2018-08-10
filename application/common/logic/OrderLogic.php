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
 * Date: 2016-03-19
 */

namespace app\common\logic;

use app\common\model\Order;
use think\Db;
/**
 * Class orderLogic
 * @package Common\Logic
 */
class OrderLogic
{
    protected $user_id=0;
    public function setUserId($user_id){
        $this->user_id=$user_id;
    }

	/**
	 * 取消订单
	 * @param $user_id|用户ID
	 * @param $order_id|订单ID
	 * @param string $action_note 操作备注
	 * @return array
	 */
	public function cancel_order($user_id,$order_id,$action_note='您取消了订单'){
		$order = M('order')->where(array('order_id'=>$order_id,'user_id'=>$user_id))->find();
		//检查是否未支付订单 已支付联系客服处理退款
		if(empty($order))
			return array('status'=>-1,'msg'=>'订单不存在','result'=>'');
		if($order['order_status'] == 3){
			return array('status'=>-1,'msg'=>'该订单已取消','result'=>'');
		}
		//检查是否未支付的订单
		if($order['pay_status'] > 0 || $order['order_status'] > 0)
			return array('status'=>-1,'msg'=>'支付状态或订单状态不允许','result'=>'');
		//获取记录表信息
		//$log = M('account_log')->where(array('order_id'=>$order_id))->find();
		//有余额支付的情况
		if($order['user_money'] > 0 || $order['integral'] > 0){
			accountLog($user_id,$order['user_money'],$order['integral'],"订单取消，退回{$order['user_money']}元,{$order['integral']}积分",0,$order['order_id'],$order['order_sn']);
		}

		if($order['coupon_price'] >0){
			$res = array('use_time'=>0,'status'=>0,'order_id'=>0);
			M('coupon_list')->where(array('order_id'=>$order_id,'uid'=>$user_id))->save($res);
		}

		$row = M('order')->where(array('order_id'=>$order_id,'user_id'=>$user_id))->save(array('order_status'=>3));
		if(tpCache('shopping.reduce') == 1){
			$this->alterReturnGoodsInventory($order);
		}
		$data['order_id'] = $order_id;
		$data['action_user'] = 0;
		$data['action_note'] = $action_note;
		$data['order_status'] = 3;
		$data['pay_status'] = $order['pay_status'];
		$data['shipping_status'] = $order['shipping_status'];
		$data['log_time'] = time();
		$data['status_desc'] = '用户取消订单';
		M('order_action')->add($data);//订单操作记录
		if(!$row)
			return array('status'=>-1,'msg'=>'操作失败','result'=>'');
		return array('status'=>1,'msg'=>'操作成功','result'=>'');

	}

	public function addReturnGoods($rec_id,$order)
	{
		$data = I('post.');
		$confirm_time_config = tpCache('shopping.auto_service_date');//后台设置多少天内可申请售后
		$confirm_time = $confirm_time_config * 24 * 60 * 60;
		if ((time() - $order['confirm_time']) > $confirm_time && !empty($order['confirm_time'])) {
			return ['result'=>-1,'msg'=>'已经超过' . $confirm_time_config . "天内退货时间"];
		}
	
		if ($_FILES['return_imgs']['tmp_name'][0]) {
			$files = request()->file("return_imgs");
			$validate = ['size'=>1024 * 1024 * 3,'ext'=>'jpg,png,gif,jpeg'];
			$dir = 'public/upload/return_goods/';
			if (!($_exists = file_exists($dir))){
				$isMk = mkdir($dir);
			}
			$parentDir = date('Ymd');
			foreach($files as $key => $file){
				$info = $file->rule($parentDir)->validate($validate)->move($dir, true);
				if($info){
					$filename = $info->getFilename();
					$new_name = '/'.$dir.$parentDir.'/'.$filename;
					$return_imgs[]= $new_name;
				}else{
					$this->error($info->getError());//上传错误提示错误信息
				}
			}
			if (!empty($return_imgs)) {
				$data['imgs'] = implode(',', $return_imgs);// 上传的图片文件
			}
		}
	
		$data['addtime'] = time();
		$data['user_id'] = $order['user_id'];
		$order_goods = M('order_goods')->where(array('rec_id'=>$rec_id))->find();
		if($data['type'] < 2){
			//退款申请，若该商品有赠送积分或优惠券，在平台操作退款时需要追回
			$rate = round($order_goods['member_goods_price']*$data['goods_num']/$order['goods_price'],2);
			if($order['order_amount']>0 && !empty($order['pay_code'])){
				//$data['refund_deposit'] = $order_goods['member_goods_price']; //该退余额支付部分
				$data['refund_money'] = $rate*$order['order_amount'];//退款金额
				$data['refund_deposit'] = $rate*$order['user_money'];//该退余额支付部分
				$data['refund_integral'] = floor($rate*$order['integral']);//该退积分支付
			}else{
				//$data['refund_deposit'] = $order_goods['member_goods_price']; //该退余额支付部分
				$data['refund_deposit'] = $rate*$order['user_money']+$rate*$order['order_amount'];//该退余额支付部分
				$data['refund_integral'] = floor($rate*$order['integral']);//该退积分支付
			}
		}
		
		if(!empty($data['id'])){
			$result = M('return_goods')->where(array('id'=>$data['id']))->save($data);
		}else{
			$result = M('return_goods')->add($data);
		}
	
		if($result){
			return ['result'=>1,'msg'=>'申请成功'];
		}
		return ['result'=>-1,'msg'=>'申请失败'];
	}
	
    /**
     * 获取可申请退换货订单商品
     * @param $sale_t
     * @param $keywords
     * @param $user_id
     * @return array
     */
    public function getReturnGoodsIndex($sale_t, $keywords, $user_id)
    {
        if($keywords){
            $condition['order_sn'] = $keywords;
        }
        if($sale_t == 1){
            //三个月内
            $condition['add_time'] = array('gt' , 'DATE_SUB(CURDATE(), INTERVAL 3 MONTH)');
        }else if($sale_t == 2){
            //三个月前
            $condition['add_time'] = array('lt' , 'DATE_SUB(CURDATE(), INTERVAL 3 MONTH)');
        }
    	$condition['user_id'] = $user_id;
    	$condition['pay_status'] = 1;
    	$condition['shipping_status'] = 1;
    	$condition['deleted'] = 0;
    	$count = M('order')->where($condition)->count();
    	$Page  = new \think\Page($count,10);
    	$show = $Page->show();
    	$order_list = M('order')->where($condition)->order('order_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	
    	foreach ($order_list as $k=>$v) {
            $order_list[$k] = set_btn_order_status($v);  // 添加属性  包括按钮显示属性 和 订单状态显示属性
            $data = M('order_goods')->where(['order_id'=>$v['order_id'],'is_send'=>['lt',2]])->select();
            if(!empty($data)){
                $order_list[$k]['goods_list'] = $data;
            }else{
                unset($order_list[$k]);  //除去没有可申请的订单
            }

    	}

        return [
            'order_list' => $order_list,
            'page' => $show
        ];
    }

    /**
     * 获取退货列表
     * @param type $keywords
     * @param type $addtime
     * @param type $status
     * @return type
     */
    public function getReturnGoodsList($keywords, $addtime, $status, $user_id = 0)
	{
		if($keywords){
            $where['order_sn|goods_name'] = array('like',"%$keywords%");
    	}
    	if($status === '0' || !empty($status)){
            $where['status'] = $status;
    	}
    	if($addtime == 1){
            $where['addtime'] = array('gt',(time()-90*24*3600));
    	}
    	if($addtime == 2){
            $where['addtime'] = array('lt',(time()-90*24*3600));
    	}
    	$query = M('return_goods')->alias('r')->field('r.*,g.goods_name')
                ->join('__ORDER__ o', 'r.order_id = o.order_id AND o.deleted = 0 AND o.user_id='.$user_id)
                ->join('__GOODS__ g', 'r.goods_id = g.goods_id', 'LEFT')
                ->where($where);
        $query2 = clone $query;
        $count = $query->count();
    	$page = new \think\Page($count,10);
    	$list = $query2->order("id desc")->limit($page->firstRow, $page->listRows)->select();
    	$goods_id_arr = get_arr_column($list, 'goods_id');
    	if(!empty($goods_id_arr)) {
            $goodsList = M('goods')->where("goods_id in (".  implode(',',$goods_id_arr).")")->getField('goods_id,goods_name');
        }
        
        return [
            'goodsList' => $goodsList,
            'return_list' => $list,
            'page' => $page->show()
        ];
	}
    
    /**
     * 删除订单
     * @param type $order_id
     * @return type
     */
    public function delOrder($order_id)
    {
        $validate = validate('order');
        if (!$validate->scene('del')->check(['order_id' => $order_id])) {
            return ['status' => 0, 'msg' => $validate->getError()];
        }
     
        $row = M('order')->where('order_id' ,$order_id)->update(['deleted'=>1]);
        if (!$row) {
            return ['status'=>-1,'msg'=>'删除失败'];
        }
        
        return ['status'=>1,'msg'=>'删除成功'];
    }
    
    /**
     * 记录取消订单
     */
    public function recordRefundOrder($user_id, $order_id, $user_note, $consignee, $mobile)
    {
    	$order = M('order')->where(['order_id' => $order_id, 'user_id' => $user_id])->find();
    	if (!$order) {
    		return ['status' => -1, 'msg' => '订单不存在'];
    	}
    	$order_return_num = M('return_goods')->where(['order_id' => $order_id, 'user_id' => $user_id,'status'=>['neq',5]])->count();
    	if($order_return_num > 0){
    		return ['status' => -1, 'msg' => '该订单中有商品正在申请售后'];
    	}
    	$order_status = 3;//已取消
    	$order_info = [
    	'user_note' => $user_note,
    	'consignee' => $consignee,
    	'mobile'    => $mobile,
    	'order_status'=> $order_status,
    	];
    
    	$result = M('order')->where(['order_id' => $order_id])->update($order_info);
    	if (!$result) {
    		return ['status' => 0, 'msg' => '操作失败'];
    	}
    
    	$data['order_id'] = $order_id;
    	$data['action_user'] = $user_id;
    	$data['action_note'] = $user_note;
    	$data['order_status'] = $order_status;
    	$data['pay_status'] = $order['pay_status'];
    	$data['shipping_status'] = $order['shipping_status'];
    	$data['log_time'] = time();
    	$data['status_desc'] = '用户取消已付款订单';
    	M('order_action')->add($data);//订单操作记录
    	return ['status' => 1, 'msg' => '提交成功'];
    }
	/**
	 * 自动取消订单
	 */
	public function abolishOrder(){
		$set_time=1; //自动取消时间/天 默认1天
		$abolishtime = strtotime("-$set_time day");
		$order_where = [
				'user_id'      =>$this->user_id,
				'add_time'     =>['lt',$abolishtime],
				'pay_status'   =>0,
				'order_status' => 0
		];
		$order = Db::name('order')->where($order_where)->getField('order_id',true);
		foreach($order as $key =>$value){
			$result = $this->cancel_order($this->user_id,$value);
		}
		return $result;
	}
	/**
	 * 添加一个订单
	 * @param $user_id|用户id
	 * @param $address_id|地址id
	 * @param $shipping_code|物流编号
	 * @param $invoice_title|发票
	 * @param int $coupon_id|优惠券id
	 * @param $car_price|各种价格
	 * @param string $user_note|用户备注
     * @param int $shop_way 配送方式
     * @param int $store_id 工厂店ID
     * @modify: Ly
     * @data: 2017-8-22
	 * @return array
	 */
	public function addOrder($user_id,$address_id,$shipping_code,$invoice_title,$coupon_id = 0,$car_price,$user_note='',$pay_name='',$shop_way,$store_id)
	{

		// 仿制灌水 1天只能下 50 单  // select * from `tp_order` where user_id = 1  and order_sn like '20151217%'
		//$order_count = M('Order')->where("user_id",$user_id)->where('order_sn', 'like', date('Ymd')."%")->count(); // 查找购物车商品总数量
		//if($order_count >= 50)
		//    return array('status'=>-9,'msg'=>'一天只能下50个订单','result'=>'');

        /**
         * 查询用户推荐工厂店ID
         * @author: Ly
         * @date: 2017-8-23
         */
        $store_default = M('store')->alias('s')->join('__USERS__ u','u.first_leader = s.user_id')->where(array('u.user_id'=>$user_id, 's.status'=>1))->getfield('s.store_id');
        //$sql = "SELECT s.store_id FROM __PREFIX__store AS s LEFT JOIN __PREFIX__users AS u ON s.user_id=u.first_leader WHERE u.user_id= $user_id";
        $store_default = $store_default ? $store_default : 0;

		// 0插入订单 order
		$address = M('UserAddress')->where("address_id", $address_id)->find();
		$shipping = M('Plugin')->where("code", $shipping_code)->cache(true,TPSHOP_CACHE_TIME)->find();
		if (!$shipping || $shop_way == 3) {
			$shipping['name'] = M('Store')->where("store_id=$store_id")->getField('store_name');
		}
		$data = array(
				'order_sn'         => date('YmdHis').rand(1000,9999), // 订单编号
				'user_id'          =>$user_id, // 用户id
				'consignee'        =>$address['consignee'], // 收货人
				'province'         =>$address['province'],//'省份id',
				'city'             =>$address['city'],//'城市id',
				'district'         =>$address['district'],//'县',
				'twon'             =>$address['twon'],// '街道',
				'address'          =>$address['address'],//'详细地址',
				'mobile'           =>$address['mobile'],//'手机',
				'zipcode'          =>$address['zipcode'],//'邮编',
				'email'            =>$address['email'],//'邮箱',
				'shipping_code'    =>$shipping_code,//'物流编号',
				'shipping_name'    =>$shipping['name'], //'物流名称',                为照顾新手开发者们能看懂代码，此处每个字段加于详细注释
				'invoice_title'    =>$invoice_title, //'发票抬头',
				'goods_price'      =>$car_price['goodsFee'],//'商品价格',
				'shipping_price'   =>$car_price['postFee'],//'物流价格',
				'user_money'       =>$car_price['balance'],//'使用余额',
				'coupon_price'     =>$car_price['couponFee'],//'使用优惠券',
				'integral'         =>($car_price['pointsFee'] * tpCache('shopping.point_rate')), //'使用积分',
				'integral_money'   =>$car_price['pointsFee'],//'使用积分抵多少钱',
				'total_amount'     =>($car_price['goodsFee'] + $car_price['postFee']),// 订单总额
				'order_amount'     =>$car_price['payables'],//'应付款金额',
				'add_time'         =>time(), // 下单时间
				'order_prom_id'    =>$car_price['order_prom_id'],//'订单优惠活动id',
				'order_prom_amount'=>$car_price['order_prom_amount'],//'订单优惠活动优惠了多少钱',
				'user_note'        =>$user_note, // 用户下单备注
				'pay_name'         =>$pay_name,//支付方式，可能是余额支付或积分兑换，后面其他支付方式会替换
                //@add by Ly @date: 2017-8-22
                'shop_way'         =>$shop_way,//配送方式
                'store_id'         =>$store_id//工厂店ID
		);
		
		$data['order_id'] = $order_id = M("Order")->insertGetId($data);
		$order = $data;//M('Order')->where("order_id", $order_id)->find();
		if(!$order_id)
			return array('status'=>-8,'msg'=>'添加订单失败','result'=>NULL);

		// 记录订单操作日志
		$action_info = array(
				'order_id'        =>$order_id,
				'action_user'     =>0,
				'action_note'     => '您提交了订单，请等待系统确认',
				'status_desc'     =>'提交订单', //''
				'log_time'        =>time(),
		);
		M('order_action')->insertGetId($action_info);

		// 1插入order_goods 表
		$cartList = M('Cart')->where(['user_id'=>$user_id,'selected'=>1])->select();
        foreach($cartList as $key => $val)
        {
            $goods = M('goods')->where("goods_id", $val['goods_id'])->cache(true,TPSHOP_CACHE_TIME)->find();
            $data2['order_id']           = $order_id; // 订单id
            $data2['goods_id']           = $val['goods_id']; // 商品id
            $data2['goods_name']         = $val['goods_name']; // 商品名称
            $data2['goods_sn']           = $val['goods_sn']; // 商品货号
            $data2['goods_num']          = $val['goods_num']; // 购买数量
            $data2['market_price']       = $val['market_price']; // 市场价
            $data2['goods_price']        = $val['goods_price']; // 商品价               为照顾新手开发者们能看懂代码，此处每个字段加于详细注释
            $data2['spec_key']           = $val['spec_key']; // 商品规格
            $data2['spec_key_name']      = $val['spec_key_name']; // 商品规格名称
            $data2['member_goods_price'] = $val['member_goods_price']; // 会员折扣价
            $data2['cost_price']         = $goods['cost_price']; // 成本价
            //$data2['give_integral']      = $goods['give_integral']; // 购买商品赠送积分
            //增加是否是由推荐店服务,是推荐店才获得积分 @author: Ly @date: 2017-8-23
            $data2['give_integral']      = ($store_default == $store_id)? $goods['give_integral'] : 0; //购买商品赠送积分
            /* 增加订单由非推荐店服务,推荐店获得积分 @author: Ly @date: 2017-12-05 */
            $data2['invite_give_integral'] = ($store_default == $store_id)? 0 : $goods['invite_give_integral'];
            $data2['prom_type']          = $val['prom_type']; // 0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠
            $data2['prom_id']            = $val['prom_id']; // 活动id
            $order_goods_id              = M("OrderGoods")->insertGetId($data2);
            // 扣除商品库存  扣除库存移到 付完款后扣除
            //M('Goods')->where("goods_id = ".$val['goods_id'])->setDec('store_count',$val['goods_num']); // 商品减少库存
        }

		// 2修改优惠券状态
		if($coupon_id > 0){
			$data3['uid'] = $user_id;
			$data3['order_id'] = $order_id;
			$data3['use_time'] = time();
			$data3['store_id'] = $store_id;
			M('CouponList')->where("id", $coupon_id)->save($data3);
			$cid = M('CouponList')->where("id", $coupon_id)->getField('cid');
			M('Coupon')->where("id", $cid)->setInc('use_num'); // 优惠券的使用数量加一
		}

		// 如果应付金额为0  可能是余额支付 + 积分 + 优惠券 这里订单支付状态直接变成已支付
		if($data['order_amount'] == 0)
		{
			update_pay_status($order['order_sn']);
		}

		// 3 扣除积分 扣除余额
		if($car_price['pointsFee']>0)
			M('Users')->where("user_id", $user_id)->setDec('pay_points',($car_price['pointsFee'] * tpCache('shopping.point_rate'))); // 消费积分
		if($car_price['balance']>0)
			M('Users')->where("user_id", $user_id)->setDec('user_money',$car_price['balance']); // 抵扣余额
		// 4 删除已提交订单商品
		M('Cart')->where(['user_id' => $user_id,'selected' => 1])->delete();

		// 5 记录log 日志
		$data4['user_id'] = $user_id;
		$data4['user_money'] = -$car_price['balance'];
		$data4['pay_points'] = -($car_price['pointsFee'] * tpCache('shopping.point_rate'));
		$data4['change_time'] = time();
		$data4['desc'] = '下单消费';
		$data4['order_sn'] = $order['order_sn'];
		$data4['order_id'] = $order_id;
		// 如果使用了积分或者余额才记录
		($data4['user_money'] || $data4['pay_points']) && M("AccountLog")->add($data4);

		// 如果有微信公众号 则推送一条消息到微信
		$user = M('users')->where("user_id", $user_id)->find();
		if($user['oauth']== 'weixin')
		{
			$wx_user = M('wx_user')->find();
			$jssdk = new JssdkLogic($wx_user['appid'],$wx_user['appsecret']);
			$wx_content = "你刚刚下了一笔订单:{$order['order_sn']} 尽快支付,过期失效!";
			$jssdk->push_msg($user['openid'],$wx_content);
		}
		//用户下单, 发送短信给商家
		$res = checkEnableSendSms("3");
		$sender = tpCache("shop_info.mobile");

		if($res && $res['status'] ==1 && !empty($sender)){

			$params = array('consignee'=>$order['consignee'] , 'mobile' => $order['mobile']);
			$resp = sendSms("3", $sender, $params);
		}
		return array('status'=>1,'msg'=>'提交订单成功','result'=>$order_id); // 返回新增的订单id
	}

	/**
	 * 添加预售商品订单
	 * @param $user_id
	 * @param $address_id
	 * @param $shipping_code
	 * @param $invoice_title
	 * @param $act_id
	 * @param $pre_sell_price
	 * @return array
	 */
	public function addPreSellOrder($user_id,$address_id,$shipping_code,$invoice_title,$act_id,$pre_sell_price)
	{
		// 仿制灌水 1天只能下 50 单
		$order_count = M('Order')->where("user_id= $user_id and order_sn like '".date('Ymd')."%'")->count(); // 查找购物车商品总数量
		if($order_count >= 50){
			return array('status'=>-9,'msg'=>'一天只能下50个订单','result'=>'');
		}
		$address = M('UserAddress')->where(array('address_id' => $address_id))->find();
		$shipping = M('Plugin')->where(array('code' => $shipping_code))->find();
		$data = array(
				'order_sn'         => date('YmdHis').rand(1000,9999), // 订单编号
				'user_id'          =>$user_id, // 用户id
				'consignee'        =>$address['consignee'], // 收货人
				'province'         =>$address['province'],//'省份id',
				'city'             =>$address['city'],//'城市id',
				'district'         =>$address['district'],//'县',
				'twon'             =>$address['twon'],// '街道',
				'address'          =>$address['address'],//'详细地址',
				'mobile'           =>$address['mobile'],//'手机',
				'zipcode'          =>$address['zipcode'],//'邮编',
				'email'            =>$address['email'],//'邮箱',
				'shipping_code'    =>$shipping_code,//'物流编号',
				'shipping_name'    =>$shipping['name'], //'物流名称',
				'invoice_title'    =>$invoice_title, //'发票抬头',
				'goods_price'      =>$pre_sell_price['cut_price'] * $pre_sell_price['goods_num'],//'商品价格',
				'total_amount'     =>$pre_sell_price['cut_price'] * $pre_sell_price['goods_num'],// 订单总额
				'add_time'         =>time(), // 下单时间
				'order_prom_type'  => 4,
				'order_prom_id'    => $act_id
		);
		if($pre_sell_price['deposit_price'] == 0){
			//无定金
			$data['order_amount'] = $pre_sell_price['cut_price'] * $pre_sell_price['goods_num'];//'应付款金额',
		}else{
			//有定金
			$data['order_amount'] = $pre_sell_price['deposit_price'] * $pre_sell_price['goods_num'];//'应付款金额',
		}
		$order_id = Db::name('order')->insertGetId($data);
//        M('goods_activity')->where(array('act_id'=>$act_id))->setInc('act_count',$pre_sell_price['goods_num']);
		if($order_id === false){
			return array('status'=>-8,'msg'=>'添加订单失败','result'=>NULL);
		}
		logOrder($order_id,'您提交了订单，请等待系统确认','提交订单',$user_id);
		$order = M('Order')->where("order_id = $order_id")->find();
		$goods_activity = M('goods_activity')->where(array('act_id'=>$act_id))->find();
		$goods = M('goods')->where(array('goods_id'=>$goods_activity['goods_id']))->find();
		$data2['order_id']           = $order_id; // 订单id
		$data2['goods_id']           = $goods['goods_id']; // 商品id
		$data2['goods_name']         = $goods['goods_name']; // 商品名称
		$data2['goods_sn']           = $goods['goods_sn']; // 商品货号
		$data2['goods_num']          = $pre_sell_price['goods_num']; // 购买数量
		$data2['market_price']       = $goods['market_price']; // 市场价
		$data2['goods_price']        = $goods['shop_price']; // 商品团价
		$data2['cost_price']         = $goods['cost_price']; // 成本价
		$data2['member_goods_price'] = $pre_sell_price['cut_price']; //预售价钱
		$data2['give_integral']      = $goods_activity['integral']; // 购买商品赠送积分
		$data2['prom_type']          = 4; // 0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠 ,4 预售商品
		$data2['prom_id']    = $goods_activity['act_id'];
		Db::name('order_goods')->insert($data2);
		// 如果有微信公众号 则推送一条消息到微信
		$user = M('users')->where("user_id = $user_id")->find();
		if($user['oauth']== 'weixin')
		{
			$wx_user = M('wx_user')->find();
			$jssdk = new JssdkLogic($wx_user['appid'],$wx_user['appsecret']);
			$wx_content = "你刚刚下了一笔预售订单:{$order['order_sn']} 尽快支付,过期失效!";
			$jssdk->push_msg($user['openid'],$wx_content);
		}
		return array('status'=>1,'msg'=>'提交订单成功','result'=>$order_id); // 返回新增的订单id
	}

    /*
     * 订单操作记录
     */
    public function orderActionLog($order_id,$action,$note=''){
        $order = M('order')->where(array('order_id'=>$order_id))->find();
        $data['order_id'] = $order_id;
        $data['action_user'] = session('admin_id');
        $data['action_note'] = $note;
        $data['order_status'] = $order['order_status'];
        $data['pay_status'] = $order['pay_status'];
        $data['shipping_status'] = $order['shipping_status'];
        $data['log_time'] = time();
        $data['status_desc'] = $action;
        return M('order_action')->add($data);//订单操作记录
    }
	/**
	 * 取消订单后改变库存，根据不同的规格，商品活动修改对应的库存
	 * @param $order
     * @param $rec_id|订单商品表id 如果有只返还订单某个商品的库存,没有返还整个订单
     */
    public function alterReturnGoodsInventory($order, $rec_id='')
	{
		$orderGoodsWhere = ['order_id'=>$order['order_id']];
        if($rec_id){
            $orderGoodsWhere['rec_id'] = $rec_id;
        }
		$order_goods = Db::name('order_goods')->where($orderGoodsWhere)->select(); //查找购买数量和购买规格
		foreach($order_goods as $key=>$val){
			if(!empty($val['spec_key'])){ // 先到规格表里面扣除数量
				$SpecGoodsPrice = new SpecGoodsPrice();
				$specGoodsPrice = $SpecGoodsPrice::get(['goods_id' => $val['goods_id'], 'key' => $val['spec_key']]);
				$specGoodsPrice->where(['goods_id' => $val['goods_id'], 'key' => $val['spec_key']])->setInc('store_count', $val['goods_num']);//有规格则增加商品对应规格的库存
			}else{
				M('goods')->where(['goods_id' => $val['goods_id']])->setInc('store_count', $val['goods_num']);//没有规格则增加商品库存
			}
			update_stock_log($order['user_id'], $val['goods_num'], $val, $order['order_sn']);//库存日志

			Db::name('Goods')->where("goods_id", $val['goods_id'])->setDec('sales_sum', $val['goods_num']); // 减少商品销售量
			//更新活动商品购买量
			if ($val['prom_type'] == 1 || $val['prom_type'] == 2) {
				$GoodsPromFactory = new GoodsPromFactory();
				$goodsPromLogic = $GoodsPromFactory->makeModule($val, $specGoodsPrice);
				$prom = $goodsPromLogic->getPromModel();
				if ($prom['is_end'] == 0) {
					$tb = $val['prom_type'] == 1 ? 'flash_sale' : 'group_buy';
					M($tb)->where("id", $val['prom_id'])->setDec('buy_num', $val['goods_num']);
					M($tb)->where("id", $val['prom_id'])->setDec('order_num',$val['goods_num']);
				}
			}
		}
	}

	/**
	 * 获取订单 order_sn
	 * @return string
	 */
	public function get_order_sn()
	{
		$order_sn = null;
		// 保证不会有重复订单号存在
		while(true){
			$order_sn = date('YmdHis').rand(1000,9999); // 订单编号
			$order_sn_count = M('order')->where("order_sn = ".$order_sn)->count();
			if($order_sn_count == 0)
				break;
		}

		return $order_sn;
	}
}