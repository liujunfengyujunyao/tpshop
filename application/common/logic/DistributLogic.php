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
 * Author: IT宇宙人
 * Date: 2015-09-09
 * 
 * TPshop 公共逻辑类  将放到Application\Common\Logic\   由于很多模块公用 将不在放到某个单独模下面
 */

namespace app\common\logic;

use think\Page;
use think\Db;

/**
 * 分销逻辑层
 * Class CatsLogic
 * @package Home\Logic
 */
class DistributLogic //extends Model
{
     /**
      * 生成分销记录
      */
     public function rebateLog($order)
     {       
         $pattern = tpCache('distribut.pattern'); // 分销模式
         //$own_rate =  tpCache('distribut.own_rate'); //购买者返佣比例
         //按照商品分成 每件商品的佣金拿出来
         if($pattern  == 0) 
         {
             $cat_list =  M('goods_category')->getField('id,parent_id,commission_rate'); //获取所有商品分类            
             $order_goods = M('order_goods')->master()->where("order_id", $order['order_id'])->select(); // 订单所有商品
             $commission = 0;
             foreach($order_goods as $k => $v)
             {
                    $tmp_commission = 0;
                    $goods = M('goods')->where("goods_id", $v['goods_id'])->find(); // 单个商品的佣金
                    $tmp_commission = $goods['commission'];
                    // 如果商品没有设置分佣,则找他所属分类看是否设置分佣
                    if($tmp_commission == 0)
                    {
                       $commission_rate = $cat_list[$goods['cat_id']]['commission_rate']; // 查看分类分佣比例
                       
                       if($commission_rate == 0) // 如果它没有设置分类则找他老爸分类看看是否设置分佣
                       {
                           $parent_id = $cat_list[$goods['cat_id']]['parent_id'];
                           $commission_rate = $cat_list[$parent_id]['commission_rate']; // 查看 老爸分类分佣比例
                       } 
                       if($commission_rate == 0) // 如果它老爸没有设置分类则找他爷爷分类看看是否设置分佣
                       {
                           $grandfather_id = $cat_list[$parent_id]['parent_id'];
                           $commission_rate = $cat_list[$grandfather_id]['commission_rate']; // 查看爷爷分类分佣比例
                       } 
                       $tmp_commission = $v['member_goods_price'] * ($commission_rate / 100); // 这个商品的分佣 =  商品价 诚意商品分类设置的分佣比例
                     }
                                        
                    $tmp_commission = $tmp_commission  * $v['goods_num']; // 单个商品的分佣乘以购买数量                    
                    $commission += $tmp_commission; // 所有商品的累积佣金
             }                        
         }else{
             $order_rate = tpCache('distribut.order_rate'); // 订单分成比例  
             $commission = $order['order_amount'] * ($order_rate / 100); // 用户支付总金额 乘以 订单分成比例   @modify: Ly @date:2017-12-1
         }

         // 如果这笔订单没有分销金额
         if($commission == 0)
             return false;
         
         $user = M('users')->where("user_id", $order['user_id'])->find();
         $store_info = M('store')->field('user_id,partner_id')->where("store_id" ,$order['store_id'])->find();
         $user['first_leader'] = $store_info['user_id'];
         $user['second_leader'] = M('partner')->where("partner_id",$store_info['partner_id'])->getField('user_id');

         $first_rate = tpCache('distribut.first_rate'); // 一级上线获佣比例
         $second_rate = tpCache('distribut.second_rate'); // 二级上线获佣比例
         //$third_rate = tpCache('distribut.third_rate'); // 三级上线获佣比例

         $first_money = $commission * ($first_rate / 100); // 一级赚到的钱
         $second_money = $commission * ($second_rate / 100); // 二级赚到的钱
         //$third_money = $commission * ($third_rate / 100); // 三级赚到的钱
         
         // 微信消息推送
         $wx_user = M('wx_user')->find();
         $jssdk = new JssdkLogic($wx_user['appid'],$wx_user['appsecret']);
		 //$commission_rule = M('distribut_level')->getField('level_id,rate1,rate2,rate3');
         
		 $data = array(             
            'user_id' =>$user['first_leader'],'buy_user_id'=>$user['user_id'],
		 	'nickname'=>$user['nickname'],'order_sn' => $order['order_sn'],
		 	'order_id' => $order['order_id'],'goods_price' => $order['goods_price'],
            'money' => $first_money,'level' => 1,'create_time' => time(),'status' => 1
          );
         // 一级分销商赚 的钱. 小于一分钱的 不存储
         if($user['first_leader'] > 0 && $first_money > 0.01)
         {
         	$first_leader = get_user_info($user['first_leader']);
         	/*if($first_leader['distribut_level']>0){
         		$first_money = $commission*$commission_rule[$first_leader['distribut_level']]['rate1']/100;
         	} */
         	//取消原来分销等级设定    @author: Ly @date:2017-8-25
            $data['money'] = $first_money;
            M('rebate_log')->add($data);
            // 微信推送消息
            if($first_leader['oauth']== 'weixin')
            {
                $wx_content = "你的工厂店,刚刚获得一笔新订单:{$order['order_sn']} 如果交易成功你将获得 ￥".$first_money."奖励 !";
                $jssdk->push_msg($first_leader['openid'],$wx_content);
            }                       
         }
         // 二级 分销商赚 的钱.
         if($user['second_leader'] > 0 && $second_money > 0.01)
         {         
         	$seconde_leader = get_user_info($user['second_leader']);
         	/*if($seconde_leader['distribut_level']>0){
         		$second_money = $commission*$commission_rule[$seconde_leader['distribut_level']]['rate2']/100;
         	}*/
         	$data['user_id'] = $user['second_leader'];
            $data['money'] = $second_money;
            $data['level'] = 2;
            M('rebate_log')->add($data);         
            // 微信推送消息
            $tmp_user = M('users')->where("user_id", $user['second_leader'])->find();
            if($seconde_leader['oauth']== 'weixin')
            {
                $wx_content = "你发展的工厂店,刚刚获得了一笔新订单:{$order['order_sn']} 如果交易成功你将获得 ￥".$second_money."奖励 !";
                $jssdk->push_msg($seconde_leader['openid'],$wx_content);
            }              
         }
         // 三级分销商赚 的钱.  三级位公司,暂时用不到,屏蔽之
         /*if($user['third_leader'] > 0 && $third_money > 0.01)
         {    
         	$third_leader = get_user_info($user['third_leader']);
         	if($third_leader['distribut_level']>0){
         		$third_money = $commission*$commission_rule[$third_leader['distribut_level']]['rate3']/100;
         	}              
            $data['money'] = $third_money;
            $data['level'] = 3;               
            M('rebate_log')->add($data);      
            // 微信推送消息
            if($third_leader['oauth']== 'weixin')
            {
                $wx_content = "你的三级下线,刚刚下了一笔订单:{$order['order_sn']} 如果交易成功你将获得 ￥".$third_money."奖励 !";
                $jssdk->push_msg($third_leader['openid'],$wx_content);
            }              
            
         }*/
         /* 记录返利关系 @author: Ly @date: 2017-8-23 */
         $relation = array(
             'order_sn' => $order['order_sn'],
             'user_id' => $order['user_id'],
             'store_id' => $order['store_id'],
             'partner_id' => M('store')->where('store_id',$order['store_id'])->getfield('partner_id'),
             'addtime' => time()
         );
         M('Relation')->insertGetId($relation);

         M('order')->where("order_id", $order['order_id'])->save(array("is_distribut"=>1));  //修改订单为已经分成
     }
     
     /**
      * 自动分成 符合条件的 分成记录
      */
     function auto_confirm(){
         $switch = tpCache('distribut.switch');
         if($switch == 0)
             return false;
         
         $today_time = time();
         $distribut_date = tpCache('distribut.date');
         $distribut_time = $distribut_date * (60 * 60 * 24); // 计算天数 时间戳
         $rebate_log_arr = M('rebate_log')->where("status = 2 and ($today_time - confirm) >  $distribut_time")->select();
         foreach ($rebate_log_arr as $key => $val)
         {
             accountLog($val['user_id'], $val['money'], 0,"订单:{$val['order_sn']}分佣",$val['money']);             
             $val['status'] = 3;
             $val['confirm_time'] = $today_time;
             $val['remark'] = $val['remark']."满{$distribut_date}天,程序自动分成.";
             M("rebate_log")->where("id", $val['id'])->save($val);
         }
     }
     
    public function lowerList($user_id, $level, $q)
    {
        $condition = [1 => 'first_leader', 2 => 'second_leader', 3 => 'third_leader'];
        $where = "{$condition[$level]} = {$user_id}";
        $bind = [];
        if ($q) {
            $where .= " and (nickname like :q1 or user_id = :q2 or mobile = :q3)";
            $bind['q1'] = "%$q%";
            $bind['q2'] = $q;
            $bind['q3'] = $q;
        }

        $count = Db::name('users')->where($where)->bind($bind)->count();
        $page = new \think\Page($count, 10);
        $lists = Db::name('users')
            ->field('nickname,user_id,distribut_money,reg_time,head_pic')
            ->where($where)->bind($bind)
            ->limit("{$page->firstRow},{$page->listRows}")
            ->order('user_id desc')
            ->select();
        
        foreach ($lists as &$user_v) {
            if ($user_v['nickname'] === null) {
                $user_v['nickname'] = '匿名';
            }
        }

        return [
            'count' => $count,      // 总人数
            'page' => $page->show(),// 赋值分页输出
            'lists' => $lists       // 下线
        ];
    }     
    
    /**
     * 平台分销商品列表
     */
    public function goodsList($user_id, $sort = '', $order = 'asc', $cat_id = 0, $brand_id = 0, $key_word = '')
    {
        $where = 'is_on_sale =1 and commission > 0 ';
        $bind = [];
        if ($cat_id > 0) { //分类
            $grandson_ids = getCatGrandson($cat_id);
            $where .= " and cat_id in(".  implode(',', $grandson_ids).") "; // 初始化搜索条件
        }
        
        if ($key_word) {  //搜索
            $where = "$where and (goods_name like :key_word1)" ;
            $bind['key_word1'] = "%$key_word%";
        }
        
        if ($brand_id > 0) {
            $where .= " and brand_id = $brand_id ";
        }
        
        if (!in_array($sort, ['goods_id', 'is_new', 'sales_sum', 'distribut'])) {
            $sort = 'goods_id';
        }
        
        $order = $order ? 'desc' : 'asc'; 
        
        //查找用户已添加的商品ID
        $ids1 = M('user_distribution')->field('goods_id')->where('user_id', $user_id)->select();
        $ids1 = array_multi2single($ids1);    
        $ids  = implode(',', $ids1);
        if ($ids) {
            $where .= " and goods_id not in($ids)";
        }
        
        $count = M('goods')->where($where)->bind($bind)->count();
        $page  = new \think\Page($count, 10);
        $goodsList = M('goods')->field('goods_name,goods_id,commission as distribut,shop_price,brand_id,cat_id')
                ->where($where)->bind($bind)->order($sort, $order)
                ->limit($page->firstRow, $page->listRows)
                ->select();
        
        return [
            'goodsList' => $goodsList,
            'page' => $page
        ];
    }
    
    /**
     * 用户未上架商品数量
     */
    public function getUserNotAddGoodsNum($user_id)
    {
        $where = 'is_on_sale =1 and commission > 0 ';
        $ids1 = M('user_distribution')->field('goods_id')->where('user_id', $user_id)->select();
        $ids1 = array_multi2single($ids1);    
        $ids  = implode(',', $ids1);
        if ($ids) {
            $where .= " and goods_id not in($ids)";
        }
        
        $count = M('goods')->where($where)->count();
        return $count;
    }
    
    public function getGoodsListById($ids)
    {
        if (is_string($ids)) {
            $ids = explode(',', $ids);
        }
        $where = [
            'is_on_sale' => 1,
            'commission'  => ['>', 0],
            'goods_id' => ['IN', $ids]
        ];
        $goodsList = M('goods')->field('goods_name,goods_id,shop_price,brand_id,cat_id')
                ->where($where)
                ->select();
        return $goodsList;
    }
    
    public function addGoods($user, $goods_ids)
    {
        $goodsList = $this->getGoodsListById($goods_ids);
        foreach ($goodsList as $goods) {
            $data[] = [
                'user_id'   => $user['user_id'],
                'user_name' => $user['nickname'],
                'addtime'   => time(),
                'goods_id'  => $goods['goods_id'],
                'goods_name' => $goods['goods_name'],
                'cat_id'    => $goods['cat_id'],
                'brand_id'  => $goods['brand_id']
            ];
        }
        
        return M('user_distribution')->insertAll($data);
    }
    
    public function orderList($user_id, $status)
    {
        $where = ['user_id' => $user_id, 'status' => ['in', $status]];
        $count = M('rebate_log')->where($where)->count();
        $page  = new \think\Page($count,10);
        $list = M('rebate_log')->where($where)->order("id desc")->limit($page->firstRow.','.$page->listRows)->select(); //分成订单记录
        foreach ($list as &$user_v) {
            if ($user_v['nickname'] === null) {
                $user_v['nickname'] = '匿名';
            }
        }
        foreach ($list as $k => $v) {
            $data = M('order_goods')->where(['order_id'=>$v['order_id']])->select();
            $list[$k]['goods_list'] = $data;
        }

       return [
           'list' => $list,
           'page' => $page
       ];
    }
    
    /**
     * 获取用户分销店的商品列表
     * @param type $user_id
     * @return type
     */
    public function getStoreGoods($user_id)
    {      
        $count = M('user_distribution')->where(['user_id'=>$user_id])->count();
        $page  = new \think\Page($count,10);
        $list = M('user_distribution')->alias('ud')
                ->field('ud.*,g.shop_price')
                ->join('__GOODS__ g', 'g.goods_id = ud.goods_id')
                ->where(['user_id'=>$user_id])
                ->limit($page->firstRow, $page->listRows)
                ->select(); //用户分销商品
        
        return [
            'page' => $page,
            'list' => $list,
        ];
    }
    
    /**
     * 获取商店销售情况
     */
    public function getStoreSales()
    {
        $countWhere = 'is_on_sale = 1 and commission > 0'; //公共统计条件
        $goods_num = M('goods')->where($countWhere)->count('goods_id'); //全部
        $prom_num = M('goods')->where("prom_type=1 and $countWhere")->count();  //促销
        $new_num = M('goods')->where("is_new=1 and $countWhere")->count();  //新品
        
        return [
            'goods_num' => $goods_num,
            'prom_num' => $prom_num,
            'new_num' => $new_num
        ];
    }
    
    /**
     * 分成记录
     * @param type $user_id 
     * @param type $status 日志状态
     * @param type $sort 排序
     * @param type $order 排序条件
     */
    public function getRebateLog($user_id, $status, $sort, $order)
    {
        $where['user_id'] = $user_id;
        
        if ($status != '') {
            $where['status'] = $status;
        }
        
        $count = Db::name('rebate_log')->where($where)->count();
        $page = new \think\Page($count,10);
        $list = Db::name('rebate_log')->where($where)->order($sort, $order)
                ->limit($page->firstRow, $page->listRows)->cache(true)
                ->select();
        
        return ['page' => $page, 'list' => $list];
    }
    
    public function setStoreInfo($user_id, $storeName, $trueName, $mobile, $qq)
    {
        // 上传图片
        if (!empty($_FILES['store_img']['tmp_name'])) {
            $files = request()->file('store_img');
            $save_url = 'public/upload/user_store';
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $files->rule('uniqid')->validate(['size' => 1024 * 1024 * 3, 'ext' => 'jpg,png,gif,jpeg'])->move($save_url);
            if ($info) {
                // 成功上传后 获取上传信息
                $return_imgs[] = '/'.$save_url . '/' . $info->getFilename();
            } else {
                // 上传失败获取错误信息
                return ['status' => -1, 'msg' => $files->getError()];
            }
        }
        
        if (!empty($return_imgs)) {
            $data['store_img'] = implode(',', $return_imgs);
        }
        $data['store_name'] = $storeName;
        $data['true_name'] = $trueName;
        $data['mobile'] = $mobile;
        $data['qq'] = $qq;
        
        $user_store = Db::name('user_store')->where("user_id", $user_id)->find();
        if ($user_store == null) { 
            //添加
            $data['user_id'] = $user_id;
            $data['store_time'] = time();
            $addres = Db::name('user_store')->add($data);
            if (!$addres) {
                return ['status' => -1, 'msg' => '添加店铺信息失败'];
            }
        } else {
            //修改
            $upres = Db::name('user_store')->where(['user_id' => $user_id])->update($data);
            if (!$upres) {
                return ['status' => -1, 'msg' => '修改店铺信息失败'];
            }
        }
        
        return ['status' => 1, 'msg' => '添加店铺信息成功'];
    }
    
    public function getStoreInfo($user_id)
    {
        $store = M('user_store')->where(['user_id' => $user_id])->find();
        if (!$store) {
            return ['status' => -1, 'msg' => '店铺不存在'];
        }
        
        return ['status' => 1, 'msg' => '获取成功', 'result' => $store];
    }
    
    public function rankings($user, $sort, $p = 1)
    {
        if ($p < 1) {
            $p = 1;
        }
        if (!in_array($sort, ['distribut_money', 'underling_number'])) {
            $sort = 'distribut_money';
        }

        $where['is_distribut'] = 1;
        $lists = Db::name('users')->field('head_pic,nickname,distribut_money,underling_number')
                ->where($where)->order($sort, "desc")->page($p, 10)->select(); //获排行列表
        $where["$sort"] = ['gt', $user["$sort"]];
        $place = Db::name('users')->where($where)->count($sort); //用户排行名
        
        return [
            'lists' => $lists,
            'firstRow' => ($p - 1) * 10, //当前分页开始数
            'place' => $place + 1   //当前分页开始数
        ];
    }
}
