/**
 * addcart 将商品加入购物车
 * @goods_id  商品id
 * @num   商品数量
 * @form_id  商品详情页所在的 form表单
 * @to_catr 加入购物车后再跳转到 购物车页面 默认不跳转 1 为跳转
 * layer弹窗插件请参考http://layer.layui.com/mobile/
 */
function AjaxAddCart(goods_id,num,to_catr)
{
    //如果有商品规格 说明是商品详情页提交
    if($("#buy_goods_form").length > 0){
        $.ajax({
            type : "POST",
            url:"/index.php?m=Mobile&c=Cart&a=ajaxAddCart",
            data : $('#buy_goods_form').serialize(),// 你的formid 搜索表单 序列化提交
			dataType:'json',
            success: function(data){
				// 加入购物车后再跳转到 购物车页面
			    if(data.status < 0)
				{
					layer.open({content: data.msg,time: 2});
					return false;
				}
			   if(to_catr == 1)  //直接购买
			   {
				   location.href = "/index.php?m=Mobile&c=Cart&a=cart";
			   }
			    var cart_num = parseInt($('#tp_cart_info').html())+parseInt($('#number').val());
			    $('#tp_cart_info').html(cart_num)
			    layer.open({
			        content: '添加成功！',
			        btn: ['再逛逛', '去购物车'],
			        shadeClose: false,
			        yes: function(){
			            layer.closeAll();
			        }, no: function(){
			        	location.href = "/index.php?m=Mobile&c=Cart&a=cart";
			        }
			    });
            }
        });
    }else{ //否则可能是商品列表页 、收藏页商品点击加入购物车
        $.ajax({
            type : "POST",
            url:"/index.php?m=Home&c=Cart&a=ajaxAddCart",
            data :{goods_id:goods_id,goods_num:num} ,
			dataType:'json',
            success: function(data){

				   if(data.status == -1)
				   {
					    //layer.open({content: data.msg,time: 2});
						location.href = "/index.php?m=Mobile&c=Goods&a=goodsInfo&id="+goods_id;
				   }
				   else
				   {
					    if(data.status < 0)
						{
							layer.open({content:data.msg, time:2});
							return false;
						}
					    cart_num = parseInt($('#tp_cart_info').html())+parseInt(num);
					    $('#tp_cart_info').html(cart_num)
				    	layer.open({content: data.msg,time: 1});
						return false;
				   }
            }
        });
    }
}

// 点击收藏商品
function collect_goods(goods_id){
	$.ajax({
		type : "GET",
		dataType: "json",
		url:"/index.php?m=Mobile&c=goods&a=collect_goods&goods_id="+goods_id,//+tab,
		success: function(data){
			alert(data.msg);
		}
	});
}

//购买兑换商品
function buyIntegralGoods(goods_id, num, to_cart){
	var form = $("#buy_goods_form");
	var data;//post数据
	if(getCookie('user_id') == ''){
		layer.open({
			content: '兑换积分商品必须先登录',
			btn: ['去登录', '取消'],
			shadeClose: false,
			yes: function () {
				location.href = "/index.php?m=Mobile&c=User&a=Login";
			}, no: function () {
				layer.closeAll();
			}
		});
		return;
	}
	if (form.length > 0) {
		data = form.serialize();
	} else {
		data = {goods_id: goods_id, goods_num: num};
	}
	$.ajax({
		type: "POST",
		url: "/index.php?m=Mobile&c=Cart&a=buyIntegralGoods",
		data: data,
		dataType: 'json',
		success: function (data) {
			if(data.status == 1){
				location.href = data.result.url;
			}else{
				if(!$.isEmptyObject(data.result)){
					if(!$.isEmptyObject(data.result.url)){
						location.href = data.result.url;
					}
				}else{
					layer.open({content: data.msg, time: 1});
				}
			}
		}
	});
}