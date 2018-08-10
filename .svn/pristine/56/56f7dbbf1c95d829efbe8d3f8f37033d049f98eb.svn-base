<?php
/**
 * tpshop
 * ============================================================================
 * * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tpshop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * 采用TP5助手函数可实现单字母函数M D U等,也可db::name方式,可双向兼容
 * ============================================================================
 * $Author: IT宇宙人 2015-08-10 $
 *
 */ 
 
namespace app\home\controller; 
use app\common\logic\UserAddressLogic;
use app\common\model\GoodsActivityLogic;
use app\common\logic\CartLogic;
use app\common\logic\OrderLogic;
use app\common\logic\UsersLogic;
use app\common\logic\PickupLogic;
use app\common\logic\GoodsLogic;
use think\Controller;
use think\Db;
use app\home\model\Store;
use app\common\model\Goods;
use app\common\logic\IntegralLogic;
use app\common\model\SpecGoodsPrice;
class Cart extends Base {

    public $cartLogic; // 购物车逻辑操作类
    public $user_id = 0;
    public $user = array();    
    /**
     * 初始化函数
     */
    public function _initialize()
    {
        parent::_initialize();
        $this->cartLogic = new CartLogic();
        if (session('?user')) {
            $user = session('user');
            $user = M('users')->where("user_id", $user['user_id'])->find();
            session('user', $user);  //覆盖session 中的 user
            $this->user = $user;
            $this->user_id = $user['user_id'];
            $this->assign('user', $user); //存储用户信息
            // 给用户计算会员价 登录前后不一样
            if ($user) {
                $user['discount'] = (empty($user['discount'])) ? 1 : $user['discount'];
                if($user['discount'] != 1)
                {
                    $c = Db::name('cart')->where(['user_id' => $user['user_id'], 'prom_type' => 0])->where('member_goods_price = goods_price')->count();
                    $c && Db::name('cart')->where(['user_id' => $user['user_id'], 'prom_type' => 0])->update(['member_goods_price' => ['exp', 'goods_price*' . $user['discount']]]);
                }
            }
        }
    }

    public function cart(){
        return $this->fetch();
    }
    
    public function index(){
    	return $this->fetch('cart');
    }

    function ajaxAddCart(){
        $goods_id = I("goods_id/d"); // 商品id
        $goods_num = I("goods_num/d");// 商品数量
        $goods_spec = I("goods_spec/a",array()); // 商品规格
        if(empty($goods_id)){
            $this->ajaxReturn(['status'=>-1,'msg'=>'请选择要购买的商品','result'=>'']);
        }
        if(empty($goods_num)){
            $this->ajaxReturn(['status'=>-1,'msg'=>'购买商品数量不能为0','result'=>'']);
        }
        $spec_key = array_values($goods_spec);
        if($spec_key){
            sort($spec_key);
            $goods_spec_key = implode('_', $spec_key);
        }else{
            $goods_spec_key = '';
        }
        $cartLogic = new CartLogic();
        $cartLogic->setGoodsModel($goods_id);
        $cartLogic->setUserId($this->user_id);
        $result = $cartLogic->addGoodsToCart($goods_num,$goods_spec_key);
        $this->ajaxReturn($result);
    }
    
    /**
     * ajax 删除购物车的商品
     */
    public function ajaxDelCart()
    {       
        $ids = I("ids"); // 商品 ids        
        $result = M("Cart")->where("id", "in", $ids)->delete(); // 删除id为5的用户数据
        $return_arr = array('status'=>1,'msg'=>'删除成功','result'=>''); // 返回结果状态       
        exit(json_encode($return_arr));
    }
    
    
    /*
     * ajax 请求获取购物车列表
     */
    public function ajaxCartList()
    {
        $post_goods_num = I("goods_num/a", array()); // goods_num 购物车商品数量
        $post_cart_select = I("cart_select/a", array()); // 购物车选中状态
        $goodsLogic = new GoodsLogic();
        $cartLogic = new CartLogic();
        $where['session_id'] = $this->session_id; // 默认按照 session_id 查询
        //如果这个用户已经登录则按照用户id查询
        if ($this->user_id) {
            unset($where);
            $where['user_id'] = $this->user_id;
        }
        $cartList = M('Cart')->where($where)->getField("id,goods_num,selected,prom_type,prom_id,goods_id,goods_price,spec_key");
        if ($post_goods_num) {
            // 修改购物车数量 和勾选状态
            foreach ($post_goods_num as $key => $val) {
                $data['goods_num'] = $val < 1 ? 1 : $val;
                $data['selected'] = $post_cart_select[$key] ? 1 : 0;
                //普通商品
                if($cartList[$key]['prom_type'] == 0 && (empty($cartList[$key]['spec_key']))){
                    $goods = Db::name('goods')->where('goods_id', $cartList[$key]['goods_id'])->find();
                    // 如果有阶梯价格
                    if (!empty($goods['price_ladder'])) {
                        $price_ladder = unserialize($goods['price_ladder']);
                        $data['member_goods_price'] = $data['goods_price'] = $goodsLogic->getGoodsPriceByLadder($data['goods_num'], $goods['shop_price'], $price_ladder);
                    }
                }
                //限时抢购 不能超过购买数量
                if ($cartList[$key]['prom_type'] == 1) {
                    $FlashSaleLogic = new \app\common\logic\FlashSaleLogic($cartList[$key]['prom_id']);
                    $data['goods_num'] = $FlashSaleLogic->getUserFlashResidueGoodsNum($this->user_id,$data['goods_num']); //获取用户剩余抢购商品数量
                }
                //团购 不能超过购买数量
                if($cartList[$key]['prom_type'] == 2){
                    $groupBuyLogic =  new \app\common\logic\GroupBuyLogic($cartList[$key]['prom_id']);
                    $groupBuySurplus = $groupBuyLogic->getPromotionSurplus();//团购剩余库存
                    if($data['goods_num'] > $groupBuySurplus){
                        $data['goods_num'] = $groupBuySurplus;
                    }
                }
                if ($cartList[$key]['goods_num'] != $data['goods_num'] || $cartList[$key]['selected'] != $data['selected']) {
                    M('Cart')->where("id", $key)->save($data);
                }
            }
            $this->assign('select_all', input('post.select_all')); // 全选框
        }
        $cartLogic->setUserId($this->user_id);
        $result = $cartLogic->getUserCartList(0); // 选中的商品
        if (empty($result['total_price'])) {
            $result['total_price'] = array('total_fee' => 0, 'cut_fee' => 0, 'num' => 0);
        }
        $this->assign('cartList', $result['cartList']); // 购物车的商品
        $this->assign('total_price', $result['total_price']); // 总计
        return $this->fetch('ajax_cart_list');
    }
    /**
     * 购物车第二步确定页面
     */
    public function cart2()
    {
        if($this->user_id == 0){
            $this->error('请先登录',U('Home/User/login'));
        }
        $cartLogic = new CartLogic();
        $cartLogic->setUserId($this->user_id);
        if($cartLogic->getUserCartOrderCount() == 0 ){
            $this->error ('你的购物车没有选中商品','Cart/cart');
        }
        $result =  $cartLogic->getUserCartList(1); // 获取购物车商品
        $shippingList = M('Plugin')->where("`type` = 'shipping' and status = 1")->cache(true,TPSHOP_CACHE_TIME)->select();// 物流公司                

        $ids = array();
        foreach ($result['cartList'] as $key=>$value) {
            $ids[] = $value['goods_id'];
        }

        $goodsWhere['goods_id'] = array('in', $ids);
        $goodsWhere['cat_id'] = 7;
        $goodsCount = DB::name('goods')->where($goodsWhere)->count();
        if ($goodsCount == count($result['cartList'])) {
            $couponWhere['c1.coupon_type'] = 2;
        }else {
            $couponWhere['c1.coupon_type'] = 1;
        }

        // 找出这个用户的优惠券 没过期的  并且 订单金额达到 condition 优惠券指定标准的
        $couponWhere['c2.uid'] = $this->user_id;
        $couponWhere['c1.use_end_time'] = ['gt', time()];
        $couponWhere['c1.use_start_time'] = ['lt', time()];
        $couponWhere['c1.condition'] = ['elt', $result['total_price']['total_fee']];
//        $couponWhere = [
//            'c2.uid' => $this->user_id,
//            'c1.use_end_time' => ['gt', time()],
//            'c1.use_start_time' => ['lt', time()],
//            'c1.condition' => ['elt', $result['total_price']['total_fee']]
//        ];
        $couponList = Db::name('coupon')->alias('c1')
            ->field('c1.name,c1.money,c1.condition,c2.*')
            ->join('__COUPON_LIST__ c2', ' c2.cid = c1.id and c1.type in(0,1,2,3) and order_id = 0', 'inner')
            ->where($couponWhere)
            ->select();
        $this->assign('couponList', $couponList); // 优惠券列表
        $this->assign('shippingList', $shippingList); // 物流公司
        $this->assign('cartList', $result['cartList']); // 购物车的商品                
        $this->assign('total_price', $result['total_price']); // 总计                               
        return $this->fetch();
    }
   
    /*
     * ajax 获取用户收货地址 用于购物车确认订单页面
     */
    public function ajaxAddress(){
        $address_list = M('UserAddress')->where(['user_id'=>$this->user_id,'is_pickup'=>0])->select();
        if($address_list){
        	$area_id = array();
        	foreach ($address_list as $val){
        		$area_id[] = $val['province'];
                        $area_id[] = $val['city'];
                        $area_id[] = $val['district'];
                        $area_id[] = $val['twon'];                        
        	}    
                $area_id = array_filter($area_id);
        	$area_id = implode(',', $area_id);
        	$regionList = M('region')->where("id", "in", $area_id)->getField('id,name');
        	$this->assign('regionList', $regionList);
        }
        $address_where['is_default'] = 1;
        $c = M('UserAddress')->where(['user_id'=>$this->user_id,'is_default'=>1,'is_pickup'=>0])->count(); // 看看有没默认收货地址
        if((count($address_list) > 0) && ($c == 0)) // 如果没有设置默认收货地址, 则第一条设置为默认收货地址
            $address_list[0]['is_default'] = 1;
        $this->assign('address_list', $address_list);
        return $this->fetch('ajax_address');
    }

    /**
     * @author dyr
     * @time 2016.08.22
     * @modify: Ly
     * @date: 2017-8-14
     * 获取自提点信息、工厂店信息
     */
    public function ajaxPickup()
    {
        $province_id = I('province_id/d');
        $city_id = I('city_id/d');
        $district_id = I('district_id/d');
        $address = I('address');
        $province_name = M('region')->where(array('id' => $province_id))->getfield('name');
        $district_name = M('region')->where(array('id' => $district_id))->getfield('name');
        $baidumap = new MapApi('baidu');
        if (empty($province_id) || empty($city_id) || empty($district_id)) {
            exit("<script>alert('参数错误');</script>");
        }
        //获取推荐工厂店ID
        $user_store = $this->user;
        $store_default = M('store')->where(array('user_id' => $user_store['first_leader']))->getfield('store_id');

        $user_address = new UserAddressLogic();
        //$address_list = $user_address->getUserPickup($this->user_id);
        //获取用户默认地址
        $address_default = $user_address->getUserAddress_default($this->user_id);
        $origin = $province_name.$district_name.$address;
        $origins = $baidumap->getGeocoding($origin);

        //获取用户默认地址区域下的工厂店,自提点
        //$pickup = new Pickup();
        //$pickup_list = $pickup->getPickupListByPCD($province_id,$city_id,$district_id);
        $store = new Store();
        $store_list  = $store->getStoreList($province_id,$city_id,$district_id);

        foreach($store_list as &$sl){
            $destination = $sl['province_name'].$sl['district_name'].$sl['address'];
            $destinations = $baidumap->getGeocoding($destination);
            $distance = $baidumap->getDistance($origins,$destinations);
            $sl['distance'] = $distance['text'];
            $sl['value'] = $distance['value'];
        }

        array_multisort(array_column($store_list,'value'),SORT_ASC,$store_list);
        $status = empty($store_list) ? 0 : 1;
        $this->assign('status', $status);
        $this->assign('store_list',$store_list);
        $this->assign('store_default',$store_default);
        //$this->assign('pickup_list', $pickup_list);
        $this->assign('address_default',$address_default);
        //$this->assign('address_list', $address_list);
        return $this->fetch('ajax_pickup');
    }

    /**
     * @author dyr
     * @time 2016.08.22
     * 更换自提点
     */
    public function replace_pickup()
    {
        $province_id = I('get.province_id/d');
        $city_id = I('get.city_id/d');
        $district_id = I('get.district_id/d');
        $region_model = M('region');
        $call_back = I('get.call_back');
        if (IS_POST) {
            echo "<script>parent.{$call_back}('success');</script>";
            exit(); // 成功
        }
        $address = array('province' => $province_id, 'city' => $city_id, 'district' => $district_id);
        $p = $region_model->where(array('parent_id' => 0, 'level' => 1))->select();
        $c = $region_model->where(array('parent_id' => $province_id, 'level' => 2))->select();
        $d = $region_model->where(array('parent_id' => $city_id, 'level' => 3))->select();
        $this->assign('province', $p);
        $this->assign('city', $c);
        $this->assign('district', $d);
        $this->assign('address', $address);
        $this->assign('call_back', $call_back);
        return $this->fetch();
    }

    /**
     * @author dyr
     * @time 2016.08.22
     * 更换自提点
     */
    public function ajax_PickupPoint()
    {
        $province_id = I('province_id/d');
        $city_id = I('city_id/d');
        $district_id = I('district_id/d');
        $pick_up_model = new PickupLogic();
        $pick_up_list = $pick_up_model->getPickupListByPCD($province_id,$city_id,$district_id);
        exit(json_encode($pick_up_list));
    }


    /**
     * ajax 获取订单商品价格 或者提交 订单
     * @modify: Ly  增加配送方式以及修改分配订单到工厂店
     */
    public function cart3(){
        if($this->user_id == 0){
            exit(json_encode(array('status'=>-100,'msg'=>"登录超时请重新登录!",'result'=>null))); // 返回结果状态
        }

        $address_id = I("address_id/d"); //  收货地址id
        $shipping_code =  I("shipping_code"); //  物流编号
        $invoice_title = I('invoice_title'); // 发票
        $coupon_id =  I("coupon_id/d"); //  优惠券id
        $couponCode =  I("couponCode"); //  优惠券代码
        $pay_points =  I("pay_points/d",0); //  使用积分
        $user_money =  I("user_money/f",0); //  使用余额
        $user_note =  I("user_note",''); // 用户留言
        $paypwd =  I("paypwd",''); // 支付密码
        $user_money = $user_money ? $user_money : 0;

        $shop_way = I("shop_way/d");    //配送方式  @author: Ly
        $store_id = I("store_id/d");    //获取工厂店ID

        $cartLogic = new CartLogic();
        $cartLogic->setUserId($this->user_id);
        if($cartLogic->getUserCartOrderCount() == 0){
            exit(json_encode(array('status'=>-2,'msg'=>'你的购物车没有选中商品','result'=>null))); // 返回结果状态
        }
        if(!$address_id) exit(json_encode(array('status'=>-3,'msg'=>'请先填写收货人信息','result'=>null))); // 返回结果状态
        if($shop_way ==1){
            if(!$shipping_code) exit(json_encode(array('status'=>-4,'msg'=>'请选择物流信息','result'=>null))); // 返回结果状态
        }

        $address = M('UserAddress')->where("address_id",$address_id)->find();
        $order_goods = M('cart')->where(['user_id'=>$this->user_id,'selected'=>1])->select();
        $result = calculate_price($this->user_id,$order_goods,$shipping_code,0,$address['province'],$address['city'],$address['district'],$pay_points,$user_money,$coupon_id,$couponCode,$shop_way);
        if($result['status'] < 0)
            exit(json_encode($result));         
    // 订单满额优惠活动                     
        $order_prom = get_order_promotion($result['result']['order_amount']);
        $result['result']['order_amount'] = $order_prom['order_amount'] ;
        $result['result']['order_prom_id'] = $order_prom['order_prom_id'] ;
        $result['result']['order_prom_amount'] = $order_prom['order_prom_amount'] ;
        
        $car_price = array(
            'postFee'      => $result['result']['shipping_price'], // 物流费
            'couponFee'    => $result['result']['coupon_price'], // 优惠券            
            'balance'      => $result['result']['user_money'], // 使用用户余额
            'pointsFee'    => $result['result']['integral_money'], // 积分支付            
            'payables'     => number_format($result['result']['order_amount'], 2, '.', ''), // 应付金额
            'goodsFee'     => $result['result']['goods_price'],// 商品价格            
            'order_prom_id' => $result['result']['order_prom_id'], // 订单优惠活动id
            'order_prom_amount' => $result['result']['order_prom_amount'], // 订单优惠活动优惠了多少钱
        );

        // 提交订单
        if ($_REQUEST['act'] == 'submit_order') {
            if(!$shop_way) exit(json_encode(array('status'=>-5,'msg'=>'请选择配送方式','result'=>null)));  //返回结果状态
//            if (empty($store_id) && $shop_way != 1){
//                exit(json_encode(array('status'=>-9,'msg'=>'请选择工厂店','result'=>null)));
//            }
            if($shop_way == 1){
                if((!$shipping_code) || ($shipping_code=='store')) exit(json_encode(array('status'=>-4,'msg'=>'请选择物流信息','result'=>null))); // 返回结果状态
            }

            $pay_name = '';
            if ($pay_points || $user_money) {
                if ($this->user['is_lock'] == 1) {
                    exit(json_encode(array('status'=>-5,'msg'=>"账号异常已被锁定，不能使用余额支付！",'result'=>null))); // 用户被冻结不能使用余额支付
                }
                if (empty($this->user['paypwd'])) {
                    exit(json_encode(array('status'=>-6,'msg'=>'请先设置支付密码','result'=>null)));
                }
                if (empty($paypwd)) {
                    exit(json_encode(array('status'=>-7,'msg'=>'请输入支付密码','result'=>null)));
                }
                if (encrypt($paypwd) !== $this->user['paypwd']) {
                    exit(json_encode(array('status'=>-8,'msg'=>'支付密码错误','result'=>null)));
                }

                $pay_name = $user_money ? '余额支付' : '积分兑换';
            }

            //获取订单分派工厂店ID
            if($shop_way == 1){
                $store_del = 0;
            }else{
                if(!empty($store_id)){
                    $store_del = $store_id;
                }else{
                    $store_del = $this->getStoreId($address_id);
                }
            }

            if(empty($coupon_id) && !empty($couponCode))
               $coupon_id = M('CouponList')->where("code", $couponCode)->getField('id');
            $orderLogic = new OrderLogic();
            $result = $orderLogic->addOrder($this->user_id,$address_id,$shipping_code,$invoice_title,$coupon_id,$car_price,$user_note,$pay_name,$shop_way,$store_del); // 添加订单
            exit(json_encode($result));            
        }
        
        $return_arr = array('status'=>1,'msg'=>'计算成功','result'=>$car_price); // 返回结果状态
        exit(json_encode($return_arr));           
    }
    /**
     * 根据某地址获取最近日工厂店ID
     * @author: Ly
     * @date: 2017-8-21
     * @param: int $address_id
     * @return int store_id
     */
    public function getStoreId($address_id){
        $user_address = new UserAddressLogic();
        $baidumap = new MapApi('baidu');
        $store = new Store();

        $address = $user_address->getAddressDetail($address_id);
        $origin = $address['province_name'] . $address['city_name'] . $address['district_name'] . $address['address'];
        $origins = $baidumap->getGeocoding($origin);
        $store_list  = $store->getStoreList($address['province'],$address['city'],$address['district']);
        foreach($store_list as &$sl){
            $destination = $sl['province_name'].$sl['district_name'].$sl['address'];
            $destinations = $baidumap->getGeocoding($destination);
            $sl['distance'] = $baidumap->getDistance($origins,$destinations);
        }
        array_multisort(array_column($store_list,'distance'),SORT_ASC,$store_list);
        return $store_list[0]['store_id'];
    }
   
    /*
     * 订单支付页面
     */
    public function cart4(){

        $order_id = I('order_id/d');
        $order_where = ['user_id'=>$this->user_id,'order_id'=>$order_id];
        $order = M('Order')->where($order_where)->find();
        if($order['order_status'] == 3){
            $this->error('该订单已取消',U("Home/Order/order_detail",array('id'=>$order_id)));
        }
        if(empty($order) || empty($this->user_id)){
            $order_order_list = U("User/login");
            header("Location: $order_order_list");
            exit;
        }
        // 如果已经支付过的订单直接到订单详情页面. 不再进入支付页面
        if($order['pay_status'] == 1){            
            $order_detail_url = U("Home/Order/order_detail",array('id'=>$order_id));
            header("Location: $order_detail_url");
            exit;
        }
        //如果是预售订单，支付尾款
        if($order['pay_status'] == 2 && $order['order_prom_type'] == 4){
            $pre_sell_info = M('goods_activity')->where(array('act_id'=>$order['order_prom_id']))->find();
            $pre_sell_info = array_merge($pre_sell_info,unserialize($pre_sell_info['ext_info']));
            if($pre_sell_info['retainage_start'] > time()){
                $this->error('还未到支付尾款时间'.date('Y-m-d H:i:s',$pre_sell_info['retainage_start']));
            }
            if($pre_sell_info['retainage_end'] < time()){
                $this->error('对不起，该预售商品已过尾款支付时间'.date('Y-m-d H:i:s',$pre_sell_info['retainage_start']));
            }
        }
        if($order['order_prom_type'] != 4){
            $userlogic = new UsersLogic();
            $res = $userlogic->abolishOrder($order['user_id'],$order['order_id'],$order['add_time']);  //检测是否超时没支付
            if($res['status']==1)
                $this->error('订单超时未支付已自动取消',U("Home/Order/order_detail",array('id'=>$order_id)));
        }

        $payment_where = array(
            'type'=>'payment',
            'status'=>1,
            'scene'=>array('in',array(0,2))
        );
        //预售和抢购暂不支持货到付款
        $orderGoodsPromType = M('order_goods')->where(['order_id'=>$order['order_id']])->getField('prom_type',true);
        if($order['order_prom_type'] == 4 || in_array(1,$orderGoodsPromType)){
            $payment_where['code'] = array('neq','cod');
        }
        $paymentList = M('Plugin')->where($payment_where)->select();
        $paymentList = convert_arr_key($paymentList, 'code');
        
        foreach($paymentList as $key => $val)
        {
            $val['config_value'] = unserialize($val['config_value']);            
            if($val['config_value']['is_bank'] == 2)
            {
                $bankCodeList[$val['code']] = unserialize($val['bank_code']);        
            }
        }
        
        $bank_img = include APP_PATH.'home/bank.php'; // 银行对应图片        
        $this->assign('paymentList',$paymentList);        
        $this->assign('bank_img',$bank_img);
        $this->assign('order',$order);
        $this->assign('bankCodeList',$bankCodeList);        
        $this->assign('pay_date',date('Y-m-d', strtotime("+1 day")));

        return $this->fetch();
    }
 
    
    //ajax 请求购物车列表
    public function header_cart_list()
    {
        $cartLogic = new CartLogic();
        $cartLogic->setUserId($this->user_id);
    	$cart_result = $cartLogic->getUserCartList(0);
    	if(empty($cart_result['total_price']))
    		$cart_result['total_price'] = Array( 'total_fee' =>0, 'cut_fee' =>0, 'num' => 0);
    	
    	$this->assign('cartList', $cart_result['cartList']); // 购物车的商品
    	$this->assign('cart_total_price', $cart_result['total_price']); // 总计
        $template = I('template','header_cart_list');    	 
        return $this->fetch($template);		 
    }

    /**
     * 预售商品下单流程
     */
    public function pre_sell_cart()
    {
        $act_id = I('act_id/d');
        $goods_num = I('goods_num/d');
        if(empty($act_id)){
            $this->error('没有选择需要购买商品');
        }
        if(empty($goods_num)){
            $this->error('购买商品数量不能为0', U('Home/Activity/pre_sell', array('act_id' => $act_id)));
        }
        if($this->user_id == 0){
            $this->error('请先登录');
        }
        $pre_sell_info = M('goods_activity')->where(array('act_id' => $act_id, 'act_type' => 1))->find();
        if(empty($pre_sell_info)){
            $this->error('商品不存在或已下架',U('Home/Activity/pre_sell_list'));
        }
        $pre_sell_info = array_merge($pre_sell_info, unserialize($pre_sell_info['ext_info']));
        if ($pre_sell_info['act_count'] + $goods_num > $pre_sell_info['restrict_amount']) {
            $buy_num = $pre_sell_info['restrict_amount'] - $pre_sell_info['act_count'];
            $this->error('预售商品库存不足，还剩下' . $buy_num . '件', U('Home/Activity/pre_sell', array('id' => $act_id)));
        }
        $goodsActivityLogic = new GoodsActivityLogic();
        $pre_count_info = $goodsActivityLogic->getPreCountInfo($pre_sell_info['act_id'], $pre_sell_info['goods_id']);//预售商品的订购数量和订单数量
        $pre_sell_price['cut_price'] =$goodsActivityLogic->getPrePrice($pre_count_info['total_goods'], $pre_sell_info['price_ladder']);//预售商品价格
        $pre_sell_price['goods_num'] = $goods_num;
        $pre_sell_price['deposit_price'] = floatval($pre_sell_info['deposit']);
        // 提交订单
        if ($_REQUEST['act'] == 'submit_order') {
            $invoice_title = I('invoice_title'); // 发票
            $shipping_code =  I("shipping_code"); //  物流编号
            $address_id = I("address_id/d"); //  收货地址id
            if(empty($address_id)){
                exit(json_encode(array('status'=>-3,'msg'=>'请先填写收货人信息','result'=>null))); // 返回结果状态
            }
            if(empty($shipping_code)){
                exit(json_encode(array('status'=>-4,'msg'=>'请选择物流信息','result'=>null))); // 返回结果状态
            }
            $orderLogic = new OrderLogic();
            $result = $orderLogic->addPreSellOrder($this->user_id, $address_id, $shipping_code, $invoice_title, $act_id, $pre_sell_price); // 添加订单
            exit(json_encode($result));
        }
        $shippingList = M('Plugin')->where("`type` = 'shipping' and status = 1")->select();// 物流公司
        $this->assign('pre_sell_info', $pre_sell_info);// 购物车的预售商品
        $this->assign('shippingList', $shippingList); // 物流公司
        $this->assign('pre_sell_price',$pre_sell_price);
        return $this->fetch();
    }

    /**
     * 兑换积分商品
     */
    public function buyIntegralGoods(){
        $goods_id = input('goods_id/d');
        $item_id = input('item_id/d');
        $goods_num = input('goods_num');
        if(empty($this->user)){
            $this->ajaxReturn(['status'=>0,'msg'=>'请登录']);
        }
        if(empty($goods_id)){
            $this->ajaxReturn(['status'=>0,'msg'=>'非法操作']);
        }
        if(empty($goods_num)){
            $this->ajaxReturn(['status'=>0,'msg'=>'购买数不能为零']);
        }
        $goods = Goods::get($goods_id);
        if(empty($goods)){
            $this->ajaxReturn(['status'=>0,'msg'=>'该商品不存在']);
        }
        $Integral = new IntegralLogic();
        if(!empty($item_id)){
            $specGoodsPrice = SpecGoodsPrice::get($item_id);
            $Integral->setSpecGoodsPrice($specGoodsPrice);
        }
        $Integral->setUser($this->user);
        $Integral->setGoods($goods);
        $Integral->setBuyNum($goods_num);
        $result = $Integral->buy();
        $this->ajaxReturn($result);
    }

    /**
     *  积分商品结算页
     * @return mixed
     */
    public function integral(){
        $goods_id = input('goods_id/d');
        $item_id = input('item_id/d');
        $goods_num = input('goods_num/d');
        if(empty($this->user)){
            $this->error('请登录');
        }
        if(empty($goods_id)){
            $this->error('非法操作');
        }
        if(empty($goods_num)){
            $this->error('购买数不能为零');
        }
        $Goods = new Goods();
        $goods = $Goods->where(['goods_id'=>$goods_id])->find();
        if(empty($goods)){
            $this->error('该商品不存在');
        }
        if (empty($item_id)) {
            $goods_spec_list = SpecGoodsPrice::all(['goods_id' => $goods_id]);
            if (count($goods_spec_list) > 0) {
                $this->error('请传递规格参数');
            }
            $goods_price = $goods['shop_price'];
            //没有规格
        } else {
            //有规格
            $specGoodsPrice = SpecGoodsPrice::get(['item_id'=>$item_id,'goods_id'=>$goods_id]);
            if ($goods_num > $specGoodsPrice['store_count']) {
                $this->error('该商品规格库存不足，剩余' . $specGoodsPrice['store_count'] . '份');
            }
            $goods_price = $specGoodsPrice['price'];
            $this->assign('specGoodsPrice', $specGoodsPrice);
        }
        $shippingList = Db::name('Plugin')->where("`type` = 'shipping' and status = 1")->cache(true,TPSHOP_CACHE_TIME)->select();// 物流公司
        $point_rate = tpCache('shopping.point_rate');
        $this->assign('point_rate', $point_rate);
        $this->assign('goods', $goods);
        $this->assign('goods_price', $goods_price);
        $this->assign('goods_num',$goods_num);
        $this->assign('shippingList', $shippingList);
        //print_r($goods);
        return $this->fetch();
    }

    /**
     *  积分商品价格提交
     * @return mixed
     */
    public function integral2(){
        if ($this->user_id == 0){
            $this->ajaxReturn(['status' => -100, 'msg' => "登录超时请重新登录!", 'result' => null]);
        }
        $goods_id = input('goods_id/d');
        $item_id = input('item_id/d');
        $goods_num = input('goods_num/d');
        $address_id = input("address_id/d"); //  收货地址id
        $shipping_code = input("shipping_code/s"); //  物流编号
        $user_note = input('user_note'); // 给卖家留言
        $invoice_title = input('invoice_title'); // 发票
        $user_money = input("user_money/f", 0); //  使用余额
        $pwd = input('pwd');
        $user_money = $user_money ? $user_money : 0;

        $shop_way = I("shop_way/d");    //配送方式  @author: Ly
        $store_id = I("store_id/d");    //获取工厂店ID

        if (empty($address_id)){
            $this->ajaxReturn(['status' => -3, 'msg' => '请先填写收货人信息', 'result' => null]);
        }
        if(empty($shipping_code)){
            $this->ajaxReturn(['status' => -4, 'msg' => '请选择物流信息', 'result' => null]);
        }
        $address = Db::name('user_address')->where("address_id", $address_id)->find();
        if(empty($address)){
            $this->ajaxReturn(['status' => -3, 'msg' => '请先填写收货人信息', 'result' => null]);
        }
        $Goods = new Goods();
        $goods = $Goods::get($goods_id);
        $Integral = new IntegralLogic();
        $Integral->setUser($this->user);
        $Integral->setGoods($goods);
        if($item_id){
            $specGoodsPrice = SpecGoodsPrice::get($item_id);
            $Integral->setSpecGoodsPrice($specGoodsPrice);
        }
        $Integral->setAddress($address);
        $Integral->setShippingCode($shipping_code);
        $Integral->setBuyNum($goods_num);
        $Integral->setUserMoney($user_money);
        $result = $Integral->order();
        if ($result['status'] != 1){
            $this->ajaxReturn($result);
        }
        $car_price = array(
            'postFee' => $result['result']['shipping_price'], // 物流费
            'balance' => $result['result']['user_money'], // 使用用户余额
            'payables' => number_format($result['result']['order_amount'], 2, '.', ''), // 订单总额 减去 积分 减去余额 减去优惠券 优惠活动
            'pointsFee' => $result['result']['integral_money'], // 积分抵扣的金额
            'points' => $result['result']['total_integral'], // 积分支付
            'goodsFee' => $result['result']['goods_price'],// 总商品价格
            'goods_shipping'=>$result['result']['goods_shipping']
        );

        // 提交订单
        if ($_REQUEST['act'] == 'submit_order') {
            if(!$shop_way) exit(json_encode(array('status'=>-5,'msg'=>'请选择配送方式','result'=>null)));  //返回结果状态
//            if (empty($store_id) && $shop_way != 1){
//                exit(json_encode(array('status'=>-9,'msg'=>'请选择工厂店','result'=>null)));
//            }
            if($shop_way == 1){
                if((!$shipping_code) || ($shipping_code=='store')) exit(json_encode(array('status'=>-4,'msg'=>'请选择物流信息','result'=>null))); // 返回结果状态
            }

            //获取订单分派工厂店ID
            if($shop_way == 1){
                $store_del = 0;
            }else{
                if(!empty($store_id)){
                    $store_del = $store_id;
                }else{
                    $store_del = $this->getStoreId($address_id);
                }
            }

            // 排队人数
            $queue = \think\Cache::get('queue');
            if($queue >= 100){
                $this->ajaxReturn(['status' => -99, 'msg' => "当前人数过多请耐心排队!".$queue, 'result' => null]);
            }else{
                \think\Cache::inc('queue',1);
            }
            //购买设置必须使用积分购买，而用户的积分足以支付
            if($this->user['pay_points'] >= $car_price['points'] || $user_money>0){
                if($this->user['is_lock'] == 1){
                    $this->ajaxReturn(['status'=>-5,'msg'=>"账号异常已被锁定，不能使用积分或余额支付！",'result'=>null]);// 用户被冻结不能使用余额支付
                }
                $payPwd =trim($pwd);
                if(encrypt($payPwd) != $this->user['paypwd']  && ($user_money>0 || $car_price['points']>0)){
                    $this->ajaxReturn(['status'=>-5,'msg'=>"支付密码错误！",'result'=>null]);
                }
            }
            $result = $Integral->addOrder($invoice_title,$user_note,$shop_way,$store_del); // 添加订单
            // 这个人处理完了再减少
            \think\Cache::dec('queue');
            $this->ajaxReturn(['status' => 1, 'msg' => '计算成功', 'result' => $result['order_id']]);
        }
        $this->ajaxReturn(['status' => 1, 'msg' => '计算成功', 'result' => $car_price]);
    }
}
