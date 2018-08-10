<?php
/**
 * ============================================================================
 * 版权所有2017-2099 北京鑫泰亿联视讯科技有限公司，并保留所有权利。
 * 网站地址: http://www.elvision.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * 采用TP5助手函数可实现单字母函数M D U等,也可db::name方式,可双向兼容
 * ============================================================================
 * @author: Ly
 * Date: 17/8/12
 * Time: 上午10:02
 */
namespace app\home\model;

use think\model;
use think\Page;
use think\AjaxPage;

/**
 * Class StoreModel
 * @package Home\Model
 */
class Store extends model{
    protected $tableName = 'store';

    /**
     * 根据省市区获取相应工厂店列表
     * @param $province_id int
     * @param $city_id int
     * @param $town_id int
     * @return array
     */
    public function getStoreList($province_id,$city_id,$district_id){
        $store_where = array('p.province_id' => $province_id,'p.city_id' => $city_id,'p.district_id' => $district_id, 's.status'=>1);
        $store_list = M('store')->alias('s')
                        ->field('s.store_id,s.store_name,r1.name AS province_name,r2.name AS city_name,r3.name AS district_name,p.pickup_address AS address')
                        ->join('__PICK_UP__ p','p.store_id = s.store_id')
                        ->join('__REGION__ r1','r1.id = p.province_id','LEFT')
                        ->join('__REGION__ r2','r2.id = p.city_id','LEFT')
                        ->join('__REGION__ r3','r3.id = p.district_id','LEFT')
                        ->where($store_where)
                        ->select();
        return $store_list;
    }

    /**
     * 获取工厂店出入库记录
     * @param  array $where where条件
     * @param  int $pagesize 每页条数（默认为20）
     * @return array 库存日志列表
     */
    public function getStockLog($where, $pagesize=20) {
        $count = M('Store_stock_log')
                ->alias('l')
                //->join('__USERS__ u', 'u.user_id = l.partner_id', 'LEFT')
                ->where($where)
                ->count();
        $Page = new Page($count, $pagesize);
        $show = $Page->show();

        $list = M('Store_stock_log')
                ->alias('l')
                ->field('l.*, g.goods_name, l.store_id,g.goods_sn')
                //->join('__USERS__ u', 'u.user_id = l.partner_id', 'LEFT')
                ->join('__GOODS__ g', 'g.goods_id = l.goods_id', 'LEFT')
                ->where($where)
                ->order('l.ctime DESC')
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->select();

        $content['page'] = $show;
        $content['pager'] = $Page;
        $content['list'] = $list;
        return $content;
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

    /*
     * 获取订单信息
     * @modify: Ly
     * @date:2017-8-28
     * @add: 增加工厂店查询
     */
    public function getOrderInfo($order_id)
    {
        //  订单总金额查询语句      
        $order = M('order')->where("order_id = $order_id")->find();
        $order['address2'] = $this->getAddressName($order['province'],$order['city'],$order['district']);
        $order['address2'] = $order['address2'].$order['address'];
        if($order['shop_way'] == 2 || $order['shop_way'] == 3 ){
            $order['store_name'] = M('store')->where('store_id',$order['store_id'])->getfield('store_name');
        }
        return $order;
    }

    /**
     * 获取订单商品详情  2017-4-28 lxl 改
     * @param $order_id
     * @param string $is_send
     * @return mixed
     */
    public function getOrderGoods($order_id,$is_send =''){
        if($is_send){
            $where=" and o.is_send < $is_send";
        }
        $sql = "SELECT g.*,o.*,(o.goods_num * o.member_goods_price) AS goods_total FROM __PREFIX__order_goods o ".
            "LEFT JOIN __PREFIX__goods g ON o.goods_id = g.goods_id WHERE o.order_id = $order_id ".$where;
        $res = M('Order_goods')->query($sql);
        return $res;
    }

    /**
     * 得到发货单流水号
     */
    public function get_delivery_sn()
    {
//        /* 选择一个随机的方案 */send_http_status('310');
        mt_srand((double) microtime() * 1000000);
        return date('YmdHi') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
    }

    /**
     * 获取地区名字
     * @param int $p
     * @param int $c
     * @param int $d
     * @return string
     */
    public function getAddressName($p=0,$c=0,$d=0){
        $p = M('region')->where(array('id'=>$p))->field('name')->find();
        $c = M('region')->where(array('id'=>$c))->field('name')->find();
        $d = M('region')->where(array('id'=>$d))->field('name')->find();
        return $p['name'].','.$c['name'].','.$d['name'].',';
    }

    /**
     * 工厂店点击发货并生成发货单
     * @author ShenCheng
     * update 2017/09/14
     */
    public function deliveryHandle($data){
        $order = $this->getOrderInfo($data['order_id']);
        $orderGoods = $this->getOrderGoods($data['order_id']);
        // print_r($orderGoods);
        // die;
        $selectgoods = $data['goods'];
        $data['order_sn'] = $order['order_sn'];
        $data['delivery_sn'] = $this->get_delivery_sn();
        $data['zipcode'] = $order['zipcode'];
        $data['user_id'] = $order['user_id'];
        $data['admin_id'] = $data['admin_id'];
        $data['consignee'] = $order['consignee'];
        $data['mobile'] = $order['mobile'];
        $data['country'] = $order['country'];
        $data['province'] = $order['province'];
        $data['city'] = $order['city'];
        $data['district'] = $order['district'];
        $data['address'] = $order['address'];
        $data['shipping_code'] = $order['shipping_code'];
        $data['shipping_name'] = $order['shipping_name'];
        $data['shipping_price'] = $order['shipping_price'];
        $data['create_time'] = time();
        $data['shop_way'] = $order['shop_way']; //配送方式

        $did = M('delivery_doc')->add($data);
        $is_delivery = 0;
        foreach ($orderGoods as $k=>$v){
            if($v['is_send'] >= 1){
                $is_delivery++;
            }           
            if($v['is_send'] == 0 && in_array($v['rec_id'],$selectgoods)){
                $res['is_send'] = 1;
                $res['delivery_id'] = $did;
                $r = M('order_goods')->where("rec_id=".$v['rec_id'])->save($res);//改变订单商品发货状态
                $is_delivery++;
            }
        }
        $updata['shipping_time'] = time();
        if($is_delivery == count($orderGoods)){
            $updata['shipping_status'] = 1;
        }else{
            $updata['shipping_status'] = 2;
        }
        M('order')->where("order_id=".$data['order_id'])->save($updata);//改变订单状态
        $s = $this->orderActionLog($order['order_id'],'delivery',$data['note']);//操作日志
        
        //商家发货, 根据配送方式选择使用场景，发送短信给用户 By Dh 2017-9-29
        if ($order['shop_way'] == 2) { //工厂店配送
            $res = checkEnableSendSms("7");
            if($res && $res['status'] ==1){
                $user_id = $data['user_id'];
                $users = M('users')->where('user_id', $user_id)->getField('user_id , nickname , mobile' , true);
                $store = M('store')->alias('s')
                        ->field('s.store_name, u.nickname, u.mobile')
                        ->join('users u', 'u.user_id = s.user_id', 'left')
                        ->where('s.store_id', $order['store_id'])
                        ->find();
                if($users && $store){
                    $nickname = $users[$user_id]['nickname'];
                    $sender = $users[$user_id]['mobile'];
                    $store_name = $store['store_name'];
                    $phone = $store['mobile'];
                    $store_username = $store['nickname'];
                    $params = array('user_name'=>$nickname , 'order_sn'=>$data['order_sn'], 'store_name'=>$store_name, 'phone'=>$phone, 'store_user'=>$store_username);
                    $resp = sendSms("7", $sender, $params,'');
                }
            }
        }elseif ($order['shop_way'] == 3) { //工厂店自提
            $res = checkEnableSendSms("8");
            if($res && $res['status'] ==1){
                $user_id = $data['user_id'];
                $users = M('users')->where('user_id', $user_id)->getField('user_id , nickname , mobile' , true);
                $store = M('pick_up')->alias('p')
                        ->field('r1.name as province, r2.name as city, r3.name as town, p.pickup_address')
                        ->join('__REGION__ r1', 'r1.id = p.province_id', 'LEFT')
                        ->join('__REGION__ r2', 'r2.id = p.city_id', 'LEFT')
                        ->join('__REGION__ r3', 'r3.id = p.district_id', 'LEFT')
                        ->where('p.store_id', $order['store_id'])
                        ->find();
                $safecode = M('safecode')->where('order_sn', $data['order_sn'])->getField('safecode');
                if($users && $store){
                    $nickname = $users[$user_id]['nickname'];
                    $sender = $users[$user_id]['mobile'];
                    $address = $store['province'] . $store['city'] . $store['town'] . $store['pickup_address'];
                    $params = array('user_name'=>$nickname , 'order_sn'=>$data['order_sn'], 'address'=>$address, 'safecode'=>$safecode);
                    $resp = sendSms("8", $sender, $params,'');
                }
            }
        }

        return $s && $r;
    }

    /**
     * 工厂店自提和确认发货操作出库操作
     * @author ShenCheng
     * update 2017/09/13
     */
    public function store_delivery($order_id, $store_id){
        $goods = M('Order_goods')->where(array('order_id'=>$order_id))->getField('goods_id, goods_num');
        foreach ($goods as $k => $v) {
            M('Store_stock')->where(array('store_id'=>$store_id, 'goods_id'=>$k))->dec('goods_num', $v)->data('edittime', time())->update(); //直接扣除工厂店商品库存数量
            $log = array(
                'store_id' => $store_id,
                'goods_id' => $k,
                'delivery_id' => M('Delivery_doc')->where(array('order_id'=>$order_id))->getField('id'),
                'stock' => '-'.$v,
                'ctime' => time()
            );
            M('Store_stock_log')->add($log);
        }
        return $goods;
    }
}