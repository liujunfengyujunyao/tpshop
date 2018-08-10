<?php
namespace app\mobile\controller;

use app\common\logic\CartLogic;
use app\common\logic\MessageLogic;
use app\common\logic\UsersLogic;
use app\home\model\Message;
use app\common\logic\OrderLogic;
use app\common\logic\CouponLogic;
use think\Page;
use think\Request;
use think\Verify;
use think\db;
use app\home\model;

/**
 * 工厂店管理
 */
class Store extends User
{
    public $store_id = 0;
    public $store = array();

    public function _initialize() {      
        parent::_initialize();
        if($_SESSION['user'])
        {
            $user = $_SESSION['user'];             
            $this->user = $user;
            $this->user_id = $user['user_id'];
            $store = M('Store')->where(array('user_id'=>$user['user_id']))->find();
            $this->store = $store;
            $this->store_id = $store['store_id'];
            $this->assign('store',$store);
            $this->assign('store_id',$store_id);
            $this->assign('user',$user); //存储用户信息
            $this->assign('user_id',$this->user_id);
            //获取用户信息的数量
            $messageLogic = new MessageLogic();
            $user_message_count = $messageLogic->getUserMessageCount();
            $this->assign('user_message_count', $user_message_count);
        }else{
            header("location:".U('Mobile/User/login'));
            exit;
        }
    }

    /**
     * 工厂店模块首页
     */
    public function index(){
        $user = $this->user;
        $store = $this->store;
        $store_id = $store['store_id'];

        $partner_name = M('users')->where(array('user_id'=>$user['first_leader']))->getField('nickname');//合伙人名字
        $pick_up = M('Pick_up')->where(array('store_id'=>$store_id))->find();//自提点信息

        //全部订单获利统计
        $moneys = Db::name('order')
                ->alias('o')
                ->join('__REBATE_LOG__ r', 'r.order_sn = o.order_sn', 'LEFT')
                ->where(array('r.user_id'=>$user['user_id'], 'r.level'=>1, 'r.status'=>3))
                ->sum('r.money');

        //订单分类统计
        $order_db = M('order');
        $where = 'store_id = '.$store_id.' AND '.'shop_way != 1';
        $waitsend = $order_db->where($wswhere = $where.C(strtoupper('WAITSEND')))->count();//待发货
        $shipping = $order_db->where($wswhere = "store_id = $store_id AND shop_way=2 AND order_status!=3 AND order_status!=5 AND pay_status!=3")->count();//配送
        $ziti = $order_db->where($wswhere = "store_id = $store_id AND shop_way=3")->count();//自提
        $return_goods_count = M('return_goods')
                 ->alias('r')
                 ->join('order o', 'o.order_sn = r.order_sn', 'left')
                 ->where(" o.store_id = $this->store_id and r.status = 1")
                 ->count();//退换货

        //获取工厂店地址
        $region_db = M('Region');
        $province = $region_db->where(array('id'=>$pick_up['province_id']))->getField('name');
        $city = $region_db->where(array('id'=>$pick_up['city_id']))->getField('name');
        $district = $region_db->where(array('id'=>$pick_up['district_id']))->getField('name');

        $this->assign('moneys',$moneys);
        $this->assign('shipping',$shipping);
        $this->assign('waitsend',$waitsend);
        $this->assign('ziti',$ziti);
        $this->assign('return_goods_count',$return_goods_count);
        $this->assign('pick_up',$pick_up);
        $this->assign('partner_name',$partner_name);
        $this->assign('store_site', $province.$city.$district.$pick_up['pickup_address']);
        $this->assign('user',$user);
        $this->assign('store',$store);
        return $this->fetch();
    }

    /*
     * 工厂店所拥有订单列表
     * @author ShenCheng
     * update 2017/08/25
     */
    public function order_list(){
        $user_id = $this->user_id;
        $store_id = $this->store_id;
        if (empty($store_id)) {
            $this->error('操作错误，请联系系统管理员！', U('Mobile/Index/index'));
        }
        $where = 'store_id = '.$store_id;

        //条件搜索
        if(I('get.type')){
            switch (I('get.type')) {
                case 'ZITI':
                    $where .= ' AND shop_way=3';
                    break;

                case 'SHIPPING':
                    $where .= ' AND shop_way=2 AND order_status!=3 AND order_status!=5 AND pay_status!=3';
                    break;
                
                default:
                    $where .= C(strtoupper(I('get.type'))).' AND '.'shop_way != 1';
                    break;
            }
            
        }

        $count = M('order')->where($where)->count();

        $order_str = "order_id DESC";
        $order_list = M('order')->order($order_str)->where($where)->select();

        //$order_list = M('order')->order($order_str)->where($where)->bind($bind)->limit($Page->firstRow.','.$Page->listRows)->select();

        //获取订单商品
        $model = new UsersLogic();
        foreach($order_list as $k=>$v)
        {
            $v['income'] = M('Rebate_log')
            ->where(array('order_sn'=>$v['order_sn'], 'level'=>1, 'status'=>3))
            ->getField('money');

            $order_list[$k] = set_btn_order_status($v);  // 添加属性  包括按钮显示属性 和 订单状态显示属性
            //$order_list[$k]['total_fee'] = $v['goods_amount'] + $v['shipping_fee'] - $v['integral_money'] -$v['bonus'] - $v['discount']; //订单总额
            $data = $model->get_order_goods($v['order_id']);
            $order_list[$k]['goods_list'] = $data['result'];
            if($order_list[$k]['order_prom_type'] == 4){
                $pre_sell_item =  M('goods_activity')->where(array('act_id'=>$order_list[$k]['order_prom_id']))->find();
                $pre_sell_item = array_merge($pre_sell_item,unserialize($pre_sell_item['ext_info']));
                $order_list[$k]['pre_sell_is_finished'] = $pre_sell_item['is_finished'];
                $order_list[$k]['pre_sell_retainage_start'] = $pre_sell_item['retainage_start'];
                $order_list[$k]['pre_sell_retainage_end'] = $pre_sell_item['retainage_end'];
            }else{
                $order_list[$k]['pre_sell_is_finished'] = -1;//没有参与预售的订单
            }
        }

        $this->assign('order_status',C('ORDER_STATUS'));
        $this->assign('shipping_status',C('SHIPPING_STATUS'));
        $this->assign('pay_status',C('PAY_STATUS'));
        //$this->assign('page',$show);
        $this->assign('lists',$order_list);
        $this->assign('active','order_list');
        $this->assign('active_status',I('get.type'));
        return $this->fetch();
    }

    /*
     * 订单详情
     */
    public function order_detail(){
        $id = I('get.id/d');
        $map['order_id'] = $id;
        $map['store_id'] = $this->store_id;
        $order_info = M('order')->where($map)->find();

        if(!$order_info){
            $this->error('没有获取到订单信息');
            exit;
        }
        $order_info = set_btn_order_status($order_info);  // 添加属性  包括按钮显示属性 和 订单状态显示属性
        //获取订单商品
        $model = new UsersLogic();
        $data = $model->get_order_goods($order_info['order_id']);
        $order_info['goods_list'] = $data['result'];
        if($order_info['order_prom_type'] == 4){
            $pre_sell_item =  M('goods_activity')->where(array('act_id'=>$order_info['order_prom_id']))->find();
            $pre_sell_item = array_merge($pre_sell_item,unserialize($pre_sell_item['ext_info']));
            $order_info['pre_sell_is_finished'] = $pre_sell_item['is_finished'];
            $order_info['pre_sell_retainage_start'] = $pre_sell_item['retainage_start'];
            $order_info['pre_sell_retainage_end'] = $pre_sell_item['retainage_end'];
            $order_info['pre_sell_deliver_goods'] = $pre_sell_item['deliver_goods'];
        }else{
            $order_info['pre_sell_is_finished'] = -1;//没有参与预售的订单
        }
        //获取订单进度条
        $sql = "SELECT action_id,log_time,status_desc,order_status FROM ((SELECT * FROM __PREFIX__order_action WHERE order_id = :id AND status_desc <>'' ORDER BY action_id) AS a) GROUP BY status_desc ORDER BY action_id";
        $bind['id'] = $id;
        $items = DB::query($sql,$bind);
        $items_count = count($items);

        $ids = $order_info['province'].','.$order_info['city'].','.$order_info['district'];
        $region_list = M('region')->where("id in (".$ids.")")->getField("id,name");
        $invoice_no = M('DeliveryDoc')->where("order_id", $id)->getField('invoice_no',true);
        $order_info['invoice_no'] = implode(' , ', $invoice_no);
        //获取订单操作记录
        $order_action = M('order_action')->where(array('order_id'=>$id))->select();
        $this->assign('order_status',C('ORDER_STATUS'));
        $this->assign('shipping_status',C('SHIPPING_STATUS'));
        $this->assign('pay_status',C('PAY_STATUS'));
        $this->assign('region_list',$region_list);
        $this->assign('order_info',$order_info);
        $this->assign('order_action',$order_action);
        $this->assign('active','order_list');
        //print_r($order_info);
        return $this->fetch();
    }

    /**
     * 发货并生成发货单
     */
    public function send_goods(){
        $order_id = I('post.id');
        $store_id = $this->store_id;
        $data['admin_id'] = $this->user_id;
        $data['order_id'] = $order_id;
        $store = D('Store');
        $order_goods = $store->getOrderGoods($order_id);
        foreach ($order_goods as $v) {
            $now_stock = M('Store_stock')->where(array('store_id'=>$store_id, 'goods_id'=>$v['goods_id']))->getField('goods_num');
            if($now_stock - $v['goods_num'] < 0){
                $this->error('商品库存不足，请及时补货！');
                exit();
            }
        }
        $data['note'] = '工厂店发货生成发货单';
        $data['goods'] = M('Order_goods')->where(array('order_id'=>$order_id))->getField('rec_id', true);
        
        $store->deliveryHandle($data);

        $info = M('Order')->where(array('order_id'=>$order_id))->find();
        if($info !== NULL){
            $data = array('shipping_status'=>1, 'order_status'=>1);
            $res = M('Order')->where(array('order_id'=>$order_id))->save($data);
            if($res){
                $goods = $store->store_delivery($order_id, $this->store_id);
                $this->success('发货成功');
            }else{
                $this->error('发货失败');
            }
        }
    }

    /**
     * 检查提货码是否正确
     * @author ShenCheng
     * update 2017/08/04
     */
    public function check_safecode(){
        if(IS_POST){
            $order_id = I('post.order_id');
            $data['safecode'] = I('post.safecode');
            $data['order_sn'] = I('post.order_sn');
            $info = M('Safecode')->where(array('order_sn'=>$data['order_sn']))->find();

            if($info['safecode'] !== $data['safecode']){
                exit('<script>alert("提货码不正确");history.go(-1);</script>');
            }
            if($info['checktime'] !== NULL){
                exit('<script>alert("提货码已被校验，商品可能已被取走");history.go(-1);</script>');
            }
            if(($info['safecode'] == $data['safecode']) && ($info['checktime'] == NULL)){
                $res = M('Order')->where(array('order_id'=>$order_id))->save(array('order_status'=>6));
                M('Delivery_doc')->where(array('order_id'=>$order_id))->save(array('best_time'=>time()));
                $store = D('store');
                $goods = $store->store_delivery($order_id, $this->store_id);
                M('Safecode')->where($data)->save(array('checktime'=>time()));
                /*生成发货单*/
                $data_['admin_id'] = $this->user_id;
                $data_['order_id'] = $order_id;
                $data_['note'] = '工厂店发货生成发货单';
                $data_['goods'] = M('Order_goods')->where(array('order_id'=>$order_id))->getField('rec_id', true);
                $store = D('Store');
                $store->deliveryHandle($data_);

                if($res){
                    $call_back = $_REQUEST['call_back'];
                    echo "<script>alert('提货码正确，允许提货');</script>";
                    echo "<script>parent.{$call_back}('success');</script>";
                    exit();
                }   
            }
        }else{
            $order_id = I('get.id');
            $order_sn = M('Order')->where(array('order_id'=>$order_id))->getField('order_sn');
            $this->assign('order_sn', $order_sn);
            $this->assign('order_id', $order_id);
            return $this->fetch();
        }
    }

    /**
     * 非自提 工厂店确认收货
     * @author ShenCheng
     * update 2017/09/05
     */
    public function confirm(){
        $order_id = I('post.id');
        $res = M('Order')->where(array('order_id'=>$order_id))->save(array('order_status'=>6));
        M('Delivery_doc')->where(array('order_id'=>$order_id))->save(array('best_time'=>time()));
        $store = D('store');
        //$goods = $store->store_delivery($order_id, $this->store_id);
        if($res){
            $this->success('确认收货成功');
        }
        $this->error('确认收货失败');
    }

    /**
     * 工厂店库存列表
     * @author ShenCheng
     * update 2017/08/06
     */
    public function store_stock_list() {
        $store_id = $this->store_id;
        $store_name = M('Store')->where(array('store_id'=>$store_id))->getField('store_name');

        $list = DB::name('store_stock')
            ->alias('s')
            ->field('s.goods_id, s.goods_num, s.edittime, s.stock_num, g.goods_name')
            ->join('__GOODS__ g', 'g.goods_id = s.goods_id', 'LEFT')
            ->where('s.store_id', $store_id)
            ->order('s.edittime desc, s.goods_id desc')
            ->select();

        $this->assign('store_name', $store_name);
        $this->assign('list', $list);

        $this->assign('count', count($list));
        $this->assign('storeage', tpCache('basic.store_storeage')); //工厂店库存预警比例配置
        return $this->fetch();
    }

    /**
     * 申请补货
     * update 2017/09/08
     */
    public function act_apply() {
        if(IS_POST) {
            $data = I('post.');
            $info['user_id'] = $this->user_id;
            $info['addtime'] = time();
            $info['status'] = 0;

            $id = DB::name('goods_apply')->add($info); //插入补货申请表
            if ($id) {
                foreach ($data['goods'] as $key => $value) {
                    $goods['goods_id'] = $value['goods_id'];
                    $goods['goods_num'] = $value['number'];
                    $goods['apply_id'] = $id;
                    Db::name('goods_apply_info')->add($goods); //插入补货申请详细表
                }
                $this->success('操作成功！', U('Mobile/Store/apply'));
            }else {
                $this->error('操作失败！');
            }

        }
        $list = Db::name('store_stock')
                ->alias('ss')
                ->field('ss.goods_id, g.goods_name, ss.goods_num, ss.stock_num')
                ->join('__GOODS__ g', 'g.goods_id = ss.goods_id', 'LEFT')
                ->where(array('ss.store_id'=>$this->store_id))
                ->select();

        foreach ($list as $key => &$value) {
            $value['max_num'] = $value['stock_num'] - $value['goods_num'];
        }
// print_r($list);
        $this->assign('list', $list);
        return $this->fetch();
    }

     /**
     * 补货申请记录
     */
    public function apply() {
        $where['ga.user_id'] = $this->user_id;
        $status = I('status');

        if ($status == 1) {
            $where['ga.status'] = 0;
        } elseif ($status == 2) {
            $where['ga.status'] = array(in, '1,2');
        }

        $list = DB::name('goods_apply')
                ->alias('ga')
                ->field('ga.id, ga.addtime, ga.status, ga.delivery_id, ga.remark, d.express_name, d.express_code')
                ->join('__DELIVERY__ d', 'd.id = ga.delivery_id', 'LEFT')
                ->where($where)
                ->order('addtime DESC')
                ->select();

        $this->assign('list', $list);
        return $this->fetch();
    }

    /**
     * 补货申请记录明细
     */
    public function apply_info() {
        $id = I('get.id/d');
        $info = DB::name('goods_apply')
                ->alias('ga')
                ->field('ga.id, ga.addtime, ga.status, ga.remark, d.express_name, d.express_code, d.addtime as delivery_time, d.confirm_time, ga.delivery_id, ga.edittime')
                ->join('__DELIVERY__ d', 'd.id = ga.delivery_id', 'LEFT')
                ->where("ga.id=$id")
                ->find();

        $goods = Db::name('goods_apply_info')
                 ->alias('i')
                 ->field('g.goods_id, g.goods_name, g.goods_sn, i.goods_num')
                 ->join('__GOODS__ g', 'g.goods_id = i.goods_id', 'LEFT')
                 ->where("i.apply_id=$id")
                 ->select();

        $this->assign('info', $info);
        $this->assign('goods', $goods);
        return $this->fetch();
    }

    /**
     * 发货单列表（工厂店发给用户）
     */
    public function delivery_doc_list()
    {
        $dd_list = DB::name('delivery_doc')
            ->getField('order_sn', true);
        
        $o_list = DB::name('order')
            ->where(array('store_id'=>$this->store_id))
            ->getField('order_sn', true);

        $_list = array_values(array_intersect($o_list, $dd_list));

        $list = array();
        foreach ($_list as $key => $value) {
            $val = DB::name('delivery_doc')
                    ->field('id, order_sn, create_time, shop_way, consignee')
                    ->where(array('order_sn'=>$value))
                    ->find();
            array_push($list, $val);
        }
       

        $this->assign('list', $list);
        return $this->fetch('delivery_doc_list');
    }

    /**
     * 发货单详情（工厂店发给用户）
     * @author SC
     * @date 2017-12-2
     */
    public function delivery_doc_info() {
        $id = I('get.id/d');
        $where['dd.id'] = $id;

        $info = DB::name('delivery_doc')
                ->alias('dd')
                ->field("dd.id, dd.order_id, dd.order_sn, u.nickname, dd.consignee, FROM_UNIXTIME(dd.create_time, '%Y-%m-%d %H:%i:%s') as create_time, r1.name as city, r2.name as province, r3.name as district, dd.address, dd.mobile, dd.shop_way")
                ->join('__USERS__ u', 'u.user_id = dd.user_id', 'LEFT')
                ->join('__REGION__ r1', 'r1.id = dd.city', 'LEFT')
                ->join('__REGION__ r2', 'r2.id = dd.province', 'LEFT')
                ->join('__REGION__ r3', 'r3.id = dd.district', 'LEFT')
                ->where($where)
                ->find();

        if (!$info) {
            $this->error('没有获取到发货单信息');
            exit;
        }

        $goods = DB::name('order_goods')
                ->alias('og')
                ->field('g.goods_id, g.goods_name, og.goods_num')
                ->join('__GOODS__ g', 'og.goods_id = g.goods_id', 'LEFT')
                ->where(array('og.order_id'=>$info['order_id']))
                ->select();

        $this->assign('info', $info);
        $this->assign('goods', $goods);
        return $this->fetch('delivery_doc_info');
    }

    /**
     * 收益明细
     */
    public function rebate_log()
    {
        $where['user_id'] = $this->user_id;
        $where['status'] = 3;
        $lists = Db::name('rebate_log')->where($where)->order('confirm_time desc')->select(); //查询日志
        $this->assign('lists', $lists);
        return $this->fetch();
    }

    /**
     * 发货单列表（合伙人配货给工厂店）
     */
    public function delivery()
    {
        $list = DB::name('delivery')
            ->alias('d')
            ->field("d.id, d.addtime, d.confirm_time, d.express_name, d.express_code, u.nickname")
            ->join('__USERS__ u', 'u.user_id = d.edituser', 'LEFT')
            ->order('d.addtime desc')
            ->where(array('d.delivery_type' => 3, 'd.user_id' => $this->user_id))
            ->select();

        $this->assign('list', $list);
        return $this->fetch('delivery_list');
    }

    /**
     * 发货单详情（合伙人发给工厂店）
     * @author Dh
     * @date 2017-9-23
     */
    public function delivery_info() {
        $id = I('get.id/d');
        $where['d.delivery_id'] = $id;

        $info = DB::name('delivery')
                ->alias('d')
                ->field("d.id, d.express_name, d.express_code, d.addtime, FROM_UNIXTIME(d.confirm_time, '%Y-%m-%d %H:%i:%s') as confirm_time, u.nickname")
                ->join('__USERS__ u', 'u.user_id = d.edituser', 'LEFT')
                ->where(array('d.id'=>$id))
                ->find();
        if (!$info) {
            $this->error('没有获取到发货单信息');
            exit;
        }

        $goods = DB::name('delivery_goods')
                ->alias('dg')
                ->field('g.goods_id, g.goods_name, dg.goods_num')
                ->join('__GOODS__ g', 'dg.goods_id = g.goods_id', 'LEFT')
                ->where(array('dg.delivery_id'=>$id))
                ->select();

        $this->assign('info', $info);
        $this->assign('goods', $goods);
        return $this->fetch('delivery_info');
    }

    /**
     * 发货单确认收货（合伙人配货给工厂店）
     */
    public function invoice_confirm() {
        $id = I('get.id/d');
        $store_id = $this->store_id;
        //$partner = D('Partner');
        $goods = Db::name('delivery_goods')->where(array('delivery_id'=>$id))->field('goods_id, goods_num')->select();

        $data['store_id'] = $store_id;
        $log['delivery_id'] = $id;
        $log['store_id'] = $store_id;

        foreach ($goods as $key => $value) {
            $isset = Db::name('store_stock')->where(array('store_id'=>$store_id, 'goods_id'=>$value['goods_id']))->find();
            $log['goods_id'] = $data['goods_id'] = $value['goods_id'];
            $log['stock'] = $data['goods_num'] = $value['goods_num'];
            $log['ctime'] = $data['edittime'] = time();
            if ($isset) { //更新库存
                //当前库存和当前最大库存
                $stock = M('Store_stock')->where(array('store_id'=>$store_id, 'goods_id'=>$value['goods_id']))->field('goods_num,stock_num')->find();
                $st['goods_num'] = $value['goods_num'] + $stock['goods_num'];
                if($st['goods_num'] > $stock['stock_num']){
                    $st['stock_num'] = $st['goods_num'];
                }
                Db::name('store_stock')->where(array('store_id'=>$store_id, 'goods_id'=>$value['goods_id']))->save($st);
            }else { //新增
                $data['stock_num'] = $data['goods_num'];
                Db::name('store_stock')->add($data);
            }

            //插入合伙人库存日志表
            Db::name('store_stock_log')->add($log);
        }

        $res = Db::name('delivery')->where(array('id'=>$id))->setField('confirm_time', time());

        if ($res) {
            $this->ajaxReturn(['status'=>1, 'msg'=> '操作成功！']);
        }else {
            $this->ajaxReturn(['status'=>0, 'msg'=> '操作失败！']);
        }
    }

    /**
     * 工厂店库存日志
     * @date 2017/09/09
     */
    public function stock_log() {
        $list = DB::name('store_stock_log')
            ->alias('l')
            ->field('l.goods_id, l.stock, l.ctime, g.goods_name, dd.order_sn')
            ->join('__GOODS__ g', 'g.goods_id = l.goods_id', 'LEFT')
            ->join('__DELIVERY_DOC__ dd', 'dd.id = l.delivery_id', 'LEFT')
            ->where('l.store_id', $this->store_id)
            ->order('l.ctime desc')
            ->select();

        $this->assign('list', $list);
        return $this->fetch('stock_log');
    }

    /**
     * 工厂店下退换货订单
     * @author Dh 2017-10-19
     */
    public function return_goods_list()
    {
        $where = " o.store_id = $this->store_id and r.status = 1";
        // 搜索订单 根据商品名称 或者 订单编号
        // $search_key = trim(I('search_key'));
        // if($search_key)
        // {
        //     $where .= " and r.order_sn=$search_key";
        // }
        $count = M('return_goods')->alias('r')->join('order o', 'o.order_sn = r.order_sn', 'left')->where($where)->count();
        $page = new Page($count,10);
        $list = M('return_goods')->alias('r')->join('order o', 'o.order_sn = r.order_sn', 'left')->where($where)->order("r.id desc")->limit("{$page->firstRow},{$page->listRows}")->select();
        $goods_id_arr = get_arr_column($list, 'goods_id');
        if(!empty($goods_id_arr))
            $goodsList = M('goods')->where("goods_id","in", implode(',',$goods_id_arr))->getField('goods_id,goods_name');
        $state = C('REFUND_STATUS');
        $this->assign('state',$state);
        $this->assign('goodsList', $goodsList);
        $this->assign('list', $list);
        $this->assign('page', $page->show());// 赋值分页输出
        return $this->fetch();
    }

    /**
     * 工厂店下退换货订单详情
     * @author Dh 2017-10-20
     */
    public function return_goods_info() {
        $id = I('id/d',0);
        $return_goods = M('return_goods')->alias('r')->join('order o', 'o.order_sn = r.order_sn', 'left')->where(['r.id'=>$id,'o.store_id'=>$this->store_id,'r.status'=>1])->find(); //暂时只显示换货的订单，退货的订单由后台处理
        if(empty($return_goods)) $this->error('参数错误');
        $return_goods['seller_delivery'] = unserialize($return_goods['seller_delivery']);  //订单的物流信息，服务类型为换货会显示
        if($return_goods['imgs'])
            $return_goods['imgs'] = explode(',', $return_goods['imgs']);
        $goods = M('goods')->where("goods_id", $return_goods['goods_id'])->find();
        $state = C('REFUND_STATUS');
        $this->assign('state',$state);
        $this->assign('goods',$goods);
        $this->assign('return_goods',$return_goods);
        return $this->fetch();
    }

    /**
     * 下线列表
     * @author Dh 2017-12-12
     */
    public function lower_list(){
        $lists = Db::name('users')
            ->field('nickname, mobile, head_pic')
            ->where('first_leader', $this->user_id)
            ->order('user_id desc')
            ->select();
        $this->assign('lists',$lists); // 下线
        return $this->fetch();
    }
}

?>