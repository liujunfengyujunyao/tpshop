<?php
return	array(	
	'system'=>array('name'=>'系统','child'=>array(
				array('name' => '设置','child' => array(
						array('name'=>'商城设置','act'=>'index','op'=>'System'),
						//array('name'=>'支付方式','act'=>'index1','op'=>'System'),
						array('name'=>'地区&配送','act'=>'region','op'=>'Tools'),
						array('name'=>'短信模板','act'=>'index','op'=>'SmsTemplate'),
						//array('name'=>'接口对接','act'=>'index3','op'=>'System'),
						//array('name'=>'验证码设置','act'=>'index4','op'=>'System'),
						array('name'=>'自定义导航栏','act'=>'navigationList','op'=>'System'),
						array('name'=>'友情链接','act'=>'linkList','op'=>'Article'),
						array('name'=>'清除缓存','act'=>'cleanCache','op'=>'System'),
						array('name'=>'自提点','act'=>'index','op'=>'Pickup'),
                        array('name'=>'风尚美人柜','act'=>'index','op'=>'Sark'), //增加后台美人柜菜单 @author:Ly @date:2017-7-15
				)),
				array('name' => '会员','child'=>array(
						array('name'=>'会员列表','act'=>'index','op'=>'User'),
						array('name'=>'会员等级','act'=>'levelList','op'=>'User'),
						array('name'=>'充值记录','act'=>'recharge','op'=>'User'),
						array('name'=>'提现申请','act'=>'withdrawals','op'=>'User'),
						array('name'=>'汇款记录','act'=>'remittance','op'=>'User'),
						array('name'=>'会员签到','act'=>'signList','op'=>'User'),
						//array('name'=>'会员整合','act'=>'integrate','op'=>'User'),
				)),
				array('name' => '广告','child' => array(
						array('name'=>'广告列表','act'=>'adList','op'=>'Ad'),
						array('name'=>'广告位置','act'=>'positionList','op'=>'Ad'),
				)),
				array('name' => '文章','child'=>array(
						array('name' => '文章列表', 'act'=>'articleList', 'op'=>'Article'),
						array('name' => '文章分类', 'act'=>'categoryList', 'op'=>'Article'),
						//array('name' => '帮助管理', 'act'=>'help_list', 'op'=>'Article'),
						//array('name'=>'友情链接','act'=>'linkList','op'=>'Article'),
						//array('name' => '公告管理', 'act'=>'notice_list', 'op'=>'Article'),
						array('name' => '专题列表', 'act'=>'topicList', 'op'=>'Topic'),
				)),
				array('name' => '权限','child'=>array(
						array('name' => '管理员列表', 'act'=>'index', 'op'=>'Admin'),
						array('name' => '角色管理', 'act'=>'role', 'op'=>'Admin'),
						array('name'=>'权限资源列表','act'=>'right_list','op'=>'System'),
						array('name' => '管理员日志', 'act'=>'log', 'op'=>'Admin'),
						array('name' => '供应商列表', 'act'=>'supplier', 'op'=>'Admin'),
				)),
			
				array('name' => '模板','child'=>array(
						array('name' => '模板设置', 'act'=>'templateList', 'op'=>'Template'),
				)),
				array('name' => '数据','child'=>array(
						array('name' => '数据备份', 'act'=>'index', 'op'=>'Tools'),
						array('name' => '数据还原', 'act'=>'restore', 'op'=>'Tools'),
						//array('name' => '数据恢复', 'act'=>'log', 'op'=>'Admin'),
						//array('name' => 'SQL查询', 'act'=>'log', 'op'=>'Admin'),
				))
	)),
		
	'shop'=>array('name'=>'商城','child'=>array(
				array('name' => '商品','child' => array(
					array('name' => '商品分类', 'act'=>'categoryList', 'op'=>'Goods'),
					array('name' => '商品列表', 'act'=>'goodsList', 'op'=>'Goods'),
					array('name' => '库存日志', 'act'=>'stock_list', 'op'=>'Goods'),
					array('name' => '商品模型', 'act'=>'goodsTypeList', 'op'=>'Goods'),
					array('name' => '商品规格', 'act' =>'specList', 'op' => 'Goods'),
					array('name' => '品牌列表', 'act'=>'brandList', 'op'=>'Goods'),
					array('name' => '商品属性', 'act'=>'goodsAttributeList', 'op'=>'Goods'),
					array('name' => '评论列表', 'act'=>'index', 'op'=>'Comment'),
					array('name' => '商品咨询', 'act'=>'ask_list', 'op'=>'Comment'),
                                    
			)),
			array('name' => '订单','child'=>array(
					array('name' => '订单列表', 'act'=>'index', 'op'=>'Order'),
					array('name' => '发货单', 'act'=>'delivery_list', 'op'=>'Order'),
					array('name' => '退款单', 'act'=>'refund_order_list', 'op'=>'Order'),
					array('name' => '退换货', 'act'=>'return_list', 'op'=>'Order'),
					array('name' => '添加订单', 'act'=>'add_order', 'op'=>'Order'),
			        array('name' => '订单日志','act'=>'order_log','op'=>'Order'),
			)),
			array('name' => '促销','child' => array(
					array('name' => '抢购管理', 'act'=>'flash_sale', 'op'=>'Promotion'),
					array('name' => '团购管理', 'act'=>'group_buy_list', 'op'=>'Promotion'),
					array('name' => '优惠促销', 'act'=>'prom_goods_list', 'op'=>'Promotion'),
					array('name' => '订单促销', 'act'=>'prom_order_list', 'op'=>'Promotion'),
					array('name' => '优惠券','act'=>'index', 'op'=>'Coupon'),
					//array('name' => '预售管理','act'=>'pre_sell_list', 'op'=>'Promotion'),
			)),
			
			array('name' => '分销','child' => array(
					array('name' => '分销商品列表', 'act'=>'goods_list', 'op'=>'Distribut'),
					array('name' => '分销商列表', 'act'=>'distributor_list', 'op'=>'Distribut'),
					array('name' => '分销关系', 'act'=>'tree', 'op'=>'Distribut'),
					array('name' => '分销设置', 'act'=>'set', 'op'=>'Distribut'),
					array('name' => '分成日志', 'act'=>'rebate_log', 'op'=>'Distribut'),
			)),
	     
    	    array('name' => '微信','child' => array(
    	        array('name' => '公众号配置', 'act'=>'index', 'op'=>'Wechat'),
    	        array('name' => '微信菜单管理', 'act'=>'menu', 'op'=>'Wechat'),
    	        array('name' => '文本回复', 'act'=>'text', 'op'=>'Wechat'),
    	        array('name' => '图文回复', 'act'=>'img', 'op'=>'Wechat'),
    	    )),

			
			array('name' => '统计','child' => array(
					array('name' => '销售概况', 'act'=>'index', 'op'=>'Report'),
					array('name' => '销售排行', 'act'=>'saleTop', 'op'=>'Report'),
					array('name' => '会员排行', 'act'=>'userTop', 'op'=>'Report'),
					array('name' => '销售明细', 'act'=>'saleList', 'op'=>'Report'),
					array('name' => '会员统计', 'act'=>'user', 'op'=>'Report'),
                    //增加体验品、赠品、合伙人获利、工厂店获利等
                    array('name' => '体验品统计', 'act'=>'exp_good', 'op'=>'Report'),
                    array('name' => '赠品统计', 'act'=>'send_good','op' => 'Report'),
                    array('name' => '合伙人概况', 'act'=>'partner_info','op' => 'Report'),
                    array('name' => '工厂店概况', 'act'=>'store_info','op'=>'Report'),

					array('name' => '运营概览', 'act'=>'finance', 'op'=>'Report'),
					//array('name' => '平台支出记录','act'=>'expense_log','op'=>'Report'),
			)),
	)),
		
	// 'mobile'=>array('name'=>'模板','child'=>array(
	// 		array('name' => '设置','child' => array(
	// 				array('name' => '模板设置', 'act'=>'templateList', 'op'=>'Template'),
	// 				array('name' => '手机支付', 'act'=>'templateList', 'op'=>'Template'),
	// 				array('name' => '微信二维码', 'act'=>'templateList', 'op'=>'Template'),
	// 				array('name' => '第三方登录', 'act'=>'templateList', 'op'=>'Template'),
	// 				array('name' => '导航管理', 'act'=>'finance', 'op'=>'Report'),
	// 				array('name' => '广告管理', 'act'=>'finance', 'op'=>'Report'),
	// 				array('name' => '广告位管理', 'act'=>'finance', 'op'=>'Report'),
	// 		)),
	// )),
		
	'resource'=>array('name'=>'插件','child'=>array(
			array('name' => '云服务','child' => array(
				array('name' => '插件库', 'act'=>'index', 'op'=>'Plugin'),
				//array('name' => '数据备份', 'act'=>'index', 'op'=>'Tools'),
				//array('name' => '数据还原', 'act'=>'restore', 'op'=>'Tools'),
			)),
            array('name' => 'App','child' => array(
				array('name' => '系统更新', 'act'=>'index', 'op'=>'MobileApp'),
			))
	)),

	//增加合伙人模块 @author Dh 2017-7-26
	'partner'=>array('name'=>'合伙人','child'=>array(
			array('name' => '基础管理','child' => array(
				array('name'=>'合伙人列表', 'act'=>'index', 'op'=>'Partner'),
				array('name'=>'提现管理', 'act'=>'withdrawals', 'op'=>'Partner'),
				array('name'=>'汇款记录', 'act'=>'remittance', 'op'=>'Partner')
			)),
			array('name' => '库存管理','child' => array(
				array('name'=>'库存管理', 'act'=>'stockList', 'op'=>'Partner'),
				array('name'=>'库存日志', 'act'=>'stockLog', 'op'=>'Partner'),
				array('name'=>'库存配置', 'act'=>'stockConfig', 'op'=>'Partner'),
				array('name'=>'补货申请', 'act'=>'apply', 'op'=>'Partner')
			)),
			array('name' => '订单管理','child' => array(
				array('name'=>'订单列表', 'act'=>'orderList', 'op'=>'Partner'),
				array('name'=>'配货单', 'act'=>'invoice', 'op'=>'Partner')
			)),
	)),

	//增加工厂店模块 @author ShenCheng 2017-7-27
	'store'=>array('name'=>'工厂店','child'=>array(
			array('name' => '基础管理','child' => array(
				array('name'=>'工厂店列表', 'act'=>'index', 'op'=>'Store'),
				array('name'=>'工厂店分类', 'act'=>'typeList', 'op'=>'Store'),
				array('name'=>'提现管理', 'act'=>'withdrawals', 'op'=>'Store'),
				array('name'=>'汇款记录', 'act'=>'remittance', 'op'=>'Store')
			)),
			array('name' => '库存管理','child' => array(

				array('name'=>'库存管理', 'act'=>'stockList', 'op'=>'Store'),
                array('name'=>'库存日志', 'act'=>'stocklog', 'op'=>'Store')
			)),
			array('name'=>'订单管理','child' => array(
				array('name'=>'订单列表', 'act'=>'orderList', 'op'=>'Store')
				)),
	)),
);