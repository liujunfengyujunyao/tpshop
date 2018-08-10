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
 */

namespace app\common\logic;
use app\common\model\Cart;
use app\common\model\Goods;
use think\Model;
use think\Db;
/**
 * 购物车 逻辑定义
 * Class CatsLogic
 * @package Home\Logic
 */
class CartLogic extends Model
{
    protected $goods;//商品模型
    protected $session_id;//session_id
    protected $user_id = 0;//user_id

    public function __construct()
    {
        parent::__construct();
        $this->session_id = session_id();
    }

    /**
     * 将session_id改成unique_id
     * @param $uniqueId|api唯一id 类似于 pc端的session id
     */
    public function setUniqueId($uniqueId){
        $this->session_id = $uniqueId;
    }
    /**
     * 包含一个商品模型
     * @param $goods_id
     */
    public function setGoodsModel($goods_id)
    {
        $goodsModel = new Goods();
        $this->goods = $goodsModel::get($goods_id);
    }

    /**
     * 设置用户ID
     * @param $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * modify ：addCart
     * @param $goods_num|购买商品数量
     * @param $goods_spec_key|购买商品规格
     * @return array
     */
    public function addGoodsToCart($goods_num, $goods_spec_key)
    {
        if(empty($this->goods)){
            return ['status'=>'-3','msg'=>'购买商品不存在','result'=>''];
        }
        if ($this->goods['prom_type'] > 0 && $this->user_id == 0) {
            return array('status' => -101, 'msg' => '购买活动商品必须先登录', 'result' => '');
        }
        $userCartCount = Db::name('cart')->where(['user_id'=>$this->user_id,'session_id'=>$this->session_id])->count();//获取用户购物车的商品有多少种
        if ($userCartCount >= 20) {
            return array('status' => -9, 'msg' => '购物车最多只能放20种商品', 'result' => '');
        }

        if($this->goods['prom_type'] == 1){
            $result = $this->addFlashSaleCart($goods_num, $goods_spec_key);
        }elseif($this->goods['prom_type'] == 2){
            $result = $this->addGroupBuyCart($goods_num);
        }elseif($this->goods['prom_type'] == 3){
            $result = $this->addPromGoodsCart($goods_num, $goods_spec_key);
        }else{
            $result = $this->addNormalCart($goods_num, $goods_spec_key);
        }
        $result['result'] = $UserCartGoodsNum = $this->getUserCartGoodsNum(); // 查找购物车数量
        setcookie('cn', $UserCartGoodsNum, null, '/');
        return $result;
    }


    /**
     * 购物车添加普通商品
     * @param $goods_num|购买的商品数量
     * @param $goods_spec_key|购买的商品规格
     * @return array
     */
    private function addNormalCart($goods_num,$goods_spec_key){
        $CartModel = new Cart();
        $goodsLogic = new GoodsLogic();
        // 获取商品对应的规格价钱 库存 条码
        $specGoodsPriceList = M('SpecGoodsPrice')->where("goods_id", $this->goods['goods_id'])->cache(true, TPSHOP_CACHE_TIME)->getField("key,key_name,price,store_count,sku");
        if(!empty($specGoodsPriceList)){
            if(empty($goods_spec_key)){
                return array('status' => -1, 'msg' => '必须传递商品规格', 'result' => '');
            }
            $specPrice = $specGoodsPriceList[$goods_spec_key]['price']; // 获取规格指定的价格
            $specCount = $specGoodsPriceList[$goods_spec_key]['store_count']; // 获取规格指定的库存
        }
        // 查询购物车是否已经存在这商品
        if (!$this->user_id) {
            $userCartGoods = $CartModel::get(['user_id'=>$this->user_id,'session_id'=>$this->session_id,'goods_id'=>$this->goods['goods_id'],'spec_key'=>$goods_spec_key]);
        } else {
            $userCartGoods = $CartModel::get(['user_id'=>$this->user_id,'goods_id'=>$this->goods['goods_id'],'spec_key'=>$goods_spec_key]);
        }
        // 如果该商品已经存在购物车
        if ($userCartGoods) {
            $userWantGoodsNum = $goods_num + $userCartGoods['goods_num'];//本次要购买的数量加上购物车的本身存在的数量
            $store_count = isset($specCount) ? $specCount : $this->goods['store_count'];//有规格库存就使用规格库存。
            if($userWantGoodsNum > $store_count){
                return array('status' => -4, 'msg' => '商品库存不足，剩余'.$store_count.',当前购物车已有'.$userCartGoods['goods_num'].'件', 'result' => '');
            }
            //如果有阶梯价格
            if (!empty($this->goods['price_ladder'])) {
                $price_ladder = unserialize($this->goods['price_ladder']);
                $price = $goodsLogic->getGoodsPriceByLadder($userWantGoodsNum, $this->goods['shop_price'], $price_ladder);
            } else {
                //没有阶梯价格，如果有规格价格，就使用规格价格，否则使用本店价。
                $price = isset($specPrice) ? $specPrice : $this->goods['shop_price'];
            }
            $cartResult = $CartModel->save(['goods_num' => $userWantGoodsNum,'goods_price'=>$price,'member_goods_price'=>$price], ['id' => $userCartGoods['id']]);
        }else{
            //如果有阶梯价格
            if (!empty($this->goods['price_ladder'])) {
                $price_ladder = unserialize($this->goods['price_ladder']);
                $price = $goodsLogic->getGoodsPriceByLadder($goods_num, $this->goods['shop_price'], $price_ladder);
            } else {
                //没有阶梯价格，如果有规格价格，就使用规格价格，否则使用本店价。
                $price = isset($specPrice) ? $specPrice : $this->goods['shop_price'];
            }
            $store_count = isset($specCount) ? $specCount : $this->goods['store_count'];//有规格库存就使用规格库存。
            if($goods_num > $store_count){
                return array('status' => -4, 'msg' => '商品库存不足，剩余'.$store_count, 'result' => '');
            }
            $cartAddData = array(
                'user_id' => $this->user_id,   // 用户id
                'session_id' => $this->session_id,   // sessionid
                'goods_id' => $this->goods['goods_id'],   // 商品id
                'goods_sn' => $this->goods['goods_sn'],   // 商品货号
                'goods_name' => $this->goods['goods_name'],   // 商品名称
                'market_price' => $this->goods['market_price'],   // 市场价
                'goods_price' => $price,  // 购买价
                'member_goods_price' => $price,  // 会员折扣价 默认为 购买价
                'goods_num' => $goods_num, // 购买数量
                'add_time' => time(), // 加入购物车时间
                'prom_type' => 0,   // 0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠
                'prom_id' => 0,   // 活动id
            );
            if($goods_spec_key){
                $cartAddData['spec_key'] = $goods_spec_key;
                $cartAddData['spec_key_name'] = $specGoodsPriceList[$goods_spec_key]['key_name']; // 规格 key_name
            }
            $cartResult = Db::name('Cart')->insert($cartAddData);
        }
        if($cartResult !== false){
            return array('status' => 1, 'msg' => '成功加入购物车', 'result' => '');
        }else{
            return array('status' => -1, 'msg' => '加入购物车失败', 'result' => '');
        }
    }

    /**
     * 购物车添加秒杀商品
     * @param $goods_num|购买的商品数量
     * @return array
     */
    private function addFlashSaleCart($goods_num,$goods_spec_key){
        $CartModel = new Cart();
        $flashSaleLogic = new FlashSaleLogic($this->goods['prom_id']);
        $flashSale = $flashSaleLogic->getPromModel();
        $flashSaleIsEnd = $flashSaleLogic->checkFlashSaleIsEnd();
        if($flashSaleIsEnd){
            return array('status' => -9, 'msg' => '秒杀活动已结束', 'result' => '');
        }
        $flashSaleIsAble = $flashSaleLogic->checkActivityIsAble();
        if(!$flashSaleIsAble){
            //活动没有进行中，走普通商品下单流程
            return $this->addNormalCart($goods_num,$goods_spec_key);
        }
        //获取用户购物车的抢购商品
        if (!$this->user_id) {
            $userCartGoods = $CartModel::get(['user_id'=>$this->user_id,'session_id'=>$this->session_id,'goods_id'=>$this->goods['goods_id']]);
        } else {
            $userCartGoods = $CartModel::get(['user_id'=>$this->user_id,'goods_id'=>$this->goods['goods_id']]);
        }
        $userCartGoodsNum = empty($userCartGoods) ? 0 : $userCartGoods['goods_num'];///获取用户购物车的抢购商品数量
        $userFlashOrderGoodsNum = $flashSaleLogic->getUserFlashOrderGoodsNum($this->user_id); //获取用户抢购已购商品数量
        $flashSalePurchase = $flashSale['goods_num'] - $flashSale['buy_num'];//抢购剩余库存
        $userBuyGoodsNum = $goods_num + $userFlashOrderGoodsNum + $userCartGoodsNum;
        if($userBuyGoodsNum > $flashSale['buy_limit']){
            return array('status' => -4, 'msg' => '每人限购'.$flashSale['buy_limit'].'件，您已下单'.$userFlashOrderGoodsNum.'件'.'购物车已有'.$userCartGoodsNum.'件', 'result' => '');
        }
        $userWantGoodsNum = $goods_num + $userCartGoodsNum;//本次要购买的数量加上购物车的本身存在的数量
        if($userWantGoodsNum > $flashSalePurchase){
            return array('status' => -4, 'msg' => '商品库存不足，剩余'.$flashSalePurchase.',当前购物车已有'.$userCartGoodsNum.'件', 'result' => '');
        }

        if($userCartGoodsNum > 0){
            $cartResult = $CartModel->save(['goods_num' => $userWantGoodsNum], ['id' => $userCartGoods['id']]);
        }else{
            $cartAddFlashSaleData = array(
                'user_id' => $this->user_id,   // 用户id
                'session_id' => $this->session_id,   // sessionid
                'goods_id' => $this->goods['goods_id'],   // 商品id
                'goods_sn' => $this->goods['goods_sn'],   // 商品货号
                'goods_name' => $this->goods['goods_name'],   // 商品名称
                'market_price' => $this->goods['market_price'],   // 市场价
                'goods_price' => $flashSale['price'],  // 购买价
                'member_goods_price' => $flashSale['price'],  // 会员折扣价 默认为 购买价
                'goods_num' => $userWantGoodsNum, // 购买数量
                'add_time' => time(), // 加入购物车时间
                'prom_type' => 1,   // 0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠
                'prom_id' => $this->goods['prom_id'],   // 活动id
            );
            $cartResult = Db::name('Cart')->insert($cartAddFlashSaleData);
        }
        if($cartResult !== false){
            return array('status' => 1, 'msg' => '成功加入购物车', 'result' => '');
        }else{
            return array('status' => -1, 'msg' => '加入购物车失败', 'result' => '');
        }
    }

    /**
     *  购物车添加团购商品
     * @param $goods_num|购买的商品数量
     * @return array
     */
    private function addGroupBuyCart($goods_num){
        $CartModel = new Cart();
        $groupBuyLogic = new GroupBuyLogic($this->goods['prom_id']);
        $groupBuy = $groupBuyLogic->getPromModel();
        //活动是否已经结束
        if($groupBuy['is_end'] == 1 || empty($groupBuy)){
            return array('status' => -4, 'msg' => '团购活动已结束', 'result' => '');
        }
        //获取用户购物车的团购商品
        if (!$this->user_id) {
            $userCartGoods = $CartModel::get(['user_id'=>$this->user_id,'session_id'=>$this->session_id,'goods_id'=>$this->goods['goods_id']]);
        } else {
            $userCartGoods = $CartModel::get(['user_id'=>$this->user_id,'goods_id'=>$this->goods['goods_id']]);
        }
        $userCartGoodsNum = empty($userCartGoods) ? 0 : $userCartGoods['goods_num'];///获取用户购物车的团购商品数量
        $userWantGoodsNum = $userCartGoodsNum + $goods_num;//购物车加上要加入购物车的商品数量
        $groupBuyPurchase = $groupBuy['goods_num'] - $groupBuy['buy_num'];//团购剩余库存
        if($userWantGoodsNum > $groupBuyPurchase){
            return array('status' => -4, 'msg' => '商品库存不足，剩余'.$groupBuyPurchase.',当前购物车已有'.$userCartGoodsNum.'件', 'result' => '');
        }
        // 如果该商品已经存在购物车
        if($userCartGoodsNum > 0){
            $cartResult = $CartModel->save(['goods_num' => $userWantGoodsNum], ['id' => $userCartGoods['id']]);
        }else{
            $cartAddFlashSaleData = array(
                'user_id' => $this->user_id,   // 用户id
                'session_id' => $this->session_id,   // sessionid
                'goods_id' => $this->goods['goods_id'],   // 商品id
                'goods_sn' => $this->goods['goods_sn'],   // 商品货号
                'goods_name' => $this->goods['goods_name'],   // 商品名称
                'market_price' => $this->goods['market_price'],   // 市场价
                'goods_price' => $groupBuy['price'],  // 购买价
                'member_goods_price' => $groupBuy['price'],  // 会员折扣价 默认为 购买价
                'goods_num' => $userWantGoodsNum, // 购买数量
                'add_time' => time(), // 加入购物车时间
                'prom_type' => 2,   // 0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠
                'prom_id' => $this->goods['prom_id'],   // 活动id
            );
            $cartResult = Db::name('Cart')->insert($cartAddFlashSaleData);
        }
        if($cartResult !== false){
            return array('status' => 1, 'msg' => '成功加入购物车', 'result' => '');
        }else{
            return array('status' => -1, 'msg' => '加入购物车失败', 'result' => '');
        }
    }

    /**
     *  购物车添加优惠促销商品
     * @param $goods_num|购买的商品数量
     * @param $goods_spec_key|购买的商品规格
     * @return array
     */
    private function addPromGoodsCart($goods_num,$goods_spec_key){
        $CartModel = new Cart();
        $promGoodsLogic = new PromGoodsLogic($this->goods['prom_id']);
        $promGoods = $promGoodsLogic->getPromModel();
        //活动是否存在，是否关闭，是否处于有效期
        if(empty($promGoods) || $promGoods['is_close'] == 1 || !(time() > $promGoods['start_time'] && time() < $promGoods['end_time'])){
            //活动不存在，已关闭，不处于有效期,走添加普通商品流程
            return $this->addNormalCart($goods_num,$goods_spec_key);
        }
        // 获取商品对应的规格价钱 库存 条码
        $specGoodsPriceList = M('SpecGoodsPrice')->where("goods_id", $this->goods['goods_id'])->cache(true, TPSHOP_CACHE_TIME)->getField("key,key_name,price,store_count,sku");
        if(!empty($specGoodsPriceList)){
            $specPrice = $specGoodsPriceList[$goods_spec_key]['price']; // 获取规格指定的价格
            $store_count = $specGoodsPriceList[$goods_spec_key]['store_count']; // 获取规格指定的库存
        }else{
            //没规格就用商品表的库存，价格
            $specPrice = $this->goods['shop_price']; // 获取商品价格
            $store_count = $this->goods['store_count'];  //获取总库存
        }
        //如果有规格价格，就使用规格价格，否则使用本店价。
        $priceBefore = isset($specPrice) ? $specPrice : $this->goods['shop_price'];
        //计算优惠价格
        $priceAfter = $promGoodsLogic->getPromotionPrice($priceBefore);
        // 查询购物车是否已经存在这商品
        if (!$this->user_id) {
            $userCartGoods = $CartModel::get(['user_id'=>$this->user_id,'session_id'=>$this->session_id,'goods_id'=>$this->goods['goods_id'],'spec_key'=>$goods_spec_key]);
        } else {
            $userCartGoods = $CartModel::get(['user_id'=>$this->user_id,'goods_id'=>$this->goods['goods_id'],'spec_key'=>$goods_spec_key]);
        }
        if($store_count < 1 || $store_count < $goods_num){
            return array('status' => -1, 'msg' => '库存不足', 'result' => '');
        };
        // 如果该商品已经存在购物车
        if ($userCartGoods) {
            $userWantGoodsNum = $goods_num + $userCartGoods['goods_num'];//本次要购买的数量加上购物车的本身存在的数量
            if($userWantGoodsNum > $store_count){
                return array('status' => -1, 'msg' => '库存不足', 'result' => '');
            }
            $cartResult = $CartModel->save(['goods_num' => $userWantGoodsNum,'goods_price'=>$priceAfter,'member_goods_price'=>$priceAfter], ['id' => $userCartGoods['id']]);
        }else{
            $cartAddData = array(
                'user_id' => $this->user_id,   // 用户id
                'session_id' => $this->session_id,   // sessionid
                'goods_id' => $this->goods['goods_id'],   // 商品id
                'goods_sn' => $this->goods['goods_sn'],   // 商品货号
                'goods_name' => $this->goods['goods_name'],   // 商品名称
                'market_price' => $this->goods['market_price'],   // 市场价
                'goods_price' => $priceAfter,  // 购买价
                'member_goods_price' => $priceAfter,  // 会员折扣价 默认为 购买价
                'goods_num' => $goods_num, // 购买数量
                'add_time' => time(), // 加入购物车时间
                'prom_type' => 3,   // 0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠
                'prom_id' => $this->goods['prom_id'],   // 活动id
            );
            if($goods_spec_key){
                $cartAddData['spec_key'] = $goods_spec_key;
                $cartAddData['spec_key_name'] = $specGoodsPriceList[$goods_spec_key]['key_name']; // 规格 key_name
            }
            $cartResult = Db::name('Cart')->insert($cartAddData);
        }
        if($cartResult !== false){
            return array('status' => 1, 'msg' => '成功加入购物车', 'result' => '');
        }else{
            return array('status' => -1, 'msg' => '加入购物车失败', 'result' => '');
        }
    }

    /**
     * 获取用户购物车商品总数
     * @return float|int
     */
    public function getUserCartGoodsNum()
    {
        if ($this->user_id) {
            $goods_num = Db::name('cart')->where(['user_id' => $this->user_id])->sum('goods_num');
        } else {
            $goods_num = Db::name('cart')->where(['session_id' => $this->session_id])->sum('goods_num');
        }
        return empty($goods_num) ? 0 : $goods_num;
    }

    /**
     * 获取用户的购物车列表
     * @param int $selected|是否被用户勾选中的 0 为全部 1为选中  一般没有查询不选中的商品情况
     * @return array
     */
    public function getUserCartList($selected){
        // 如果用户已经登录则按照用户id查询
        if ($this->user_id) {
            $cartWhere['user_id'] = $this->user_id;
            // 给用户计算会员价 登录前后不一样
        } else {
            $cartWhere['session_id'] = $this->session_id;
            $user['user_id'] = 0;
        }
        if ($selected ==1){
            $cartWhere['selected'] = 1;
        }
        $cartList = DB::name('Cart')->where($cartWhere)->select();  // 获取购物车商品
        $total_goods_num = $total_price = $cut_fee = 0;//初始化数据。商品总共数量/商品总额/节约金额
        foreach ($cartList as $k => $val) {
            $cartList[$k]['goods_fee'] = $val['goods_num'] * $val['member_goods_price'];
            $cartList[$k]['store_count'] = getGoodNum($val['goods_id'], $val['spec_key']) ?: 0; // 最多可购买的库存数量
            if($cartList[$k]['goods_num']>$cartList[$k]['store_count']){  //大于库存强制变成库存数
                $cartList[$k]['goods_num']=$cartList[$k]['store_count'];
                DB::name('Cart')->where(['id'=>$cartList[$k]['id']])->save(['goods_num'=>$cartList[$k]['goods_num']]);
            }
            $total_goods_num += $val['goods_num'];

            // 如果要求只计算购物车选中商品的价格 和数量  并且  当前商品没选择 则跳过
            if ($val['selected'] == 0){
                continue;
            }
            $cut_fee += $val['goods_num'] * $val['market_price'] - $val['goods_num'] * $val['member_goods_price'];
            $total_price += $val['goods_num'] * $val['member_goods_price'];
        }
        $total_price = array('total_fee' => $total_price, 'cut_fee' => $cut_fee, 'num' => $total_goods_num,); // 总计
        setcookie('cn', $total_goods_num, null, '/');
        return array('cartList' => $cartList, 'total_price' => $total_price);
    }

    /**
     *  modify ：cart_count
     *  获取用户购物车欲购买的商品有多少种
     * @return int|string
     */
    public function getUserCartOrderCount(){
        $count = Db::name('Cart')->where(['user_id' => $this->user_id , 'selected' => 1])->count();
        return $count;
    }

    /**
     * 用户登录后 对购物车操作
     * modify：login_cart_handle
     */
    public function doUserLoginHandle()
    {
        if (empty($this->session_id) || empty($this->user_id)) {
            return;
        }
        //登录后将购物车的商品的 user_id 改为当前登录的id
        $cart = new Cart();
        $cart->save(['user_id' => $this->user_id], ['session_id' => $this->session_id, 'user_id' => 0]);
        // 查找购物车两件完全相同的商品
        $cart_id_arr = $cart->field('id')->where(['user_id' => $this->user_id])->group('goods_id,spec_key')->having('count(goods_id) > 1')->select();
        if (!empty($cart_id_arr)) {
            $cart_id_arr = get_arr_column($cart_id_arr, 'id');
            M('cart')->delete($cart_id_arr); // 删除购物车完全相同的商品
        }
    }

    /**
     * @param int $selected|是否被用户勾选中的 0 为全部 1为选中  一般没有查询不选中的商品情况
     * 获取用户的购物车列表
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getCartList($selected = 0){
        $cart = new Cart();
        // 如果用户已经登录则按照用户id查询
        if ($this->user_id) {
            $cartWhere['user_id'] = $this->user_id;
        } else {
            $cartWhere['session_id'] = $this->session_id;
        }
        if($selected != 0){
            $cartWhere['selected'] = 1;
        }
        $cartList = $cart->where($cartWhere)->select();  // 获取购物车商品
        $cartCheckAfterList = $this->checkCartList($cartList);
//        $cartCheckAfterList = $cartList;
        $cartGoodsTotalNum = array_sum(array_map(function($val){return $val['goods_num'];}, $cartCheckAfterList));//购物车购买的商品总数
        setcookie('cn', $cartGoodsTotalNum, null, '/');
        return $cartCheckAfterList;
    }

    /**
     * 过滤掉无效的购物车商品
     * @param $cartList
     */
    public function checkCartList($cartList){
        $goodsPromFactory = new GoodsPromFactory();
        foreach($cartList as $cartKey=>$cart){
            //商品不存在或者已经下架
            if(empty($cart['goods']) || $cart['goods']['is_on_sale'] != 1){
                $cart->delete();
                unset($cartList[$cartKey]);
                continue;
            }
            //活动商品的活动是否失效
            if ($goodsPromFactory->checkPromType($cart['prom_type'])) {
                if (!empty($cart['spec_key'])) {
                    $specGoodsPrice = SpecGoodsPrice::get(['goods_id' => $cart['goods_id'], 'key' => $cart['spec_key']], '', true);
                    if($specGoodsPrice['prom_id'] != $cart['prom_id']){
                        $cart->delete();
                        unset($cartList[$cartKey]);
                        continue;
                    }
                } else {
                    if($cart['goods']['prom_id'] != $cart['prom_id']){
                        $cart->delete();
                        unset($cartList[$cartKey]);
                        continue;
                    }
                    $specGoodsPrice = null;
                }
                $goodsPromLogic = $goodsPromFactory->makeModule($cart['goods'], $specGoodsPrice);
                if ($goodsPromLogic && !$goodsPromLogic->isAble()) {
                    $cart->delete();
                    unset($cartList[$cartKey]);
                    continue;
                }

            }
        }
        return $cartList;
    }

    /**
     * 获取用户购物车商品总数
     * @return float|int
     */
    public function getUserCartGoodsTypeNum()
    {
        if ($this->user_id) {
            $goods_num = Db::name('cart')->where(['user_id' => $this->user_id])->count();
        } else {
            $goods_num = Db::name('cart')->where(['session_id' => $this->session_id])->count();
        }
        return empty($goods_num) ? 0 : $goods_num;
    }

    /**
     * 设置购买的商品数量
     * @param $goodsBuyNum
     */
    public function setGoodsBuyNum($goodsBuyNum)
    {
        $this->goodsBuyNum = $goodsBuyNum;
    }

    /**
     *  更新购物车，并返回计算结果
     * @param array $cart
     * @return array
     */
    public function AsyncUpdateCart($cart = [])
    {
        $cartList = $cartSelectedId = $cartNoSelectedId = [];
        if (empty($cart)) {
            return ['status' => 0, 'msg' => '购物车没商品', 'result' => compact('total_fee', 'goods_fee', 'goods_num', 'cartList')];
        }
        foreach ($cart as $key => $val) {
            if ($cart[$key]['selected'] == 1) {
                $cartSelectedId[] = $cart[$key]['id'];
            } else {
                $cartNoSelectedId[] = $cart[$key]['id'];
            }
        }
        $Cart = new Cart();
        if ($this->user_id) {
            $cartWhere['user_id'] = $this->user_id;
        } else {
            $cartWhere['session_id'] = $this->session_id;
        }
        if (!empty($cartNoSelectedId)) {
            $Cart->where('id', 'IN', $cartNoSelectedId)->where($cartWhere)->update(['selected' => 0]);
        }
        if (empty($cartSelectedId)) {
            $cartPriceInfo = $this->getCartPriceInfo();
            $cartPriceInfo['cartList'] = $cartList;
            return ['status' => 1, 'msg' => '购物车没选中商品', 'result' => $cartPriceInfo];
        }
        $cartList = $Cart->where('id', 'IN', $cartSelectedId)->where($cartWhere)->select();
        foreach($cartList as $cartKey=>$cartVal){
            if($cartList[$cartKey]['selected'] == 0){
                $Cart->where('id', 'IN', $cartSelectedId)->where($cartWhere)->update(['selected' => 1]);
                break;
            }
        }
        if ($cartList) {
            $cartList = collection($cartList)->append(['cut_fee', 'total_fee', 'goods_fee'])->toArray();
            $cartPriceInfo = $this->getCartPriceInfo($cartList);
            $cartPriceInfo['cartList'] = $cartList;
            return ['status' => 1, 'msg' => '计算成功', 'result' => $cartPriceInfo];
        } else {
            $cartPriceInfo = $this->getCartPriceInfo();
            $cartPriceInfo['cartList'] = $cartList;
            return ['status' => 1, 'msg' => '购物车没选中商品', 'result' => $cartPriceInfo];
        }
    }

}