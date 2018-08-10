<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:46:"./application/admin/view2/store\orderList.html";i:1512439955;s:44:"./application/admin/view2/public\layout.html";i:1519984569;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="__PUBLIC__/static/css/main.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/css/page.css" rel="stylesheet" type="text/css">
<link href="__PUBLIC__/static/font/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="__PUBLIC__/static/font/css/font-awesome-ie7.min.css">
<![endif]-->
<link href="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="__PUBLIC__/static/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<style type="text/css">html, body { overflow: visible;}</style>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->
<script type="text/javascript" src="__PUBLIC__/static/js/admin.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/jquery.mousewheel.js"></script>
<script src="__PUBLIC__/js/myFormValidate.js"></script>
<script src="__PUBLIC__/js/myAjax2.js"></script>
<script src="__PUBLIC__/js/global.js"></script>
    <script type="text/javascript">
    function delfunc(obj){
    	layer.confirm('确认删除？', {
    		  btn: ['确定','取消'] //按钮
    		}, function(){
    		    // 确定
   				$.ajax({
   					type : 'post',
   					url : $(obj).attr('data-url'),
   					data : {act:'del',del_id:$(obj).attr('data-id')},
   					dataType : 'json',
   					success : function(data){
						layer.closeAll();
   						if(data==1){
   							layer.msg('操作成功', {icon: 1});
   							$(obj).parent().parent().parent().remove();
   						}else{
   							layer.msg(data, {icon: 2,time: 2000});
   						}
   					}
   				})
    		}, function(index){
    			layer.close(index);
    			return false;// 取消
    		}
    	);
    }
    
    function selectAll(name,obj){
    	$('input[name*='+name+']').prop('checked', $(obj).checked);
    }   
    
    function get_help(obj){
        layer.open({
            type: 2,
            title: '帮助手册',
            shadeClose: true,
            shade: 0.3,
            area: ['70%', '80%'],
            content: $(obj).attr('data-url'), 
        });
    }
    
    function delAll(obj,name){
    	var a = [];
    	$('input[name*='+name+']').each(function(i,o){
    		if($(o).is(':checked')){
    			a.push($(o).val());
    		}
    	})
    	if(a.length == 0){
    		layer.alert('请选择删除项', {icon: 2});
    		return;
    	}
    	layer.confirm('确认删除？', {btn: ['确定','取消'] }, function(){
    			$.ajax({
    				type : 'get',
    				url : $(obj).attr('data-url'),
    				data : {act:'del',del_id:a},
    				dataType : 'json',
    				success : function(data){
						layer.closeAll();
    					if(data == 1){
    						layer.msg('操作成功', {icon: 1});
    						$('input[name*='+name+']').each(function(i,o){
    							if($(o).is(':checked')){
    								$(o).parent().parent().remove();
    							}
    						})
    					}else{
    						layer.msg(data, {icon: 2,time: 2000});
    					}
    				}
    			})
    		}, function(index){
    			layer.close(index);
    			return false;// 取消
    		}
    	);	
    }
</script>  

</head>
<style>
.flexigrid .bDiv {min-height: 10px}
.ui-accordion .ui-accordion-header {height: 30px; line-height: 30px;}
.ui-state-default {background: #f5f5f5; border: 1px solid #ddd;}
.ui-state-default span {color: #222; font-weight: bold;}
.ui-state-active a:link {color: #555;}
.ui-state-default a {float: right; margin-right: 5em; background: #fff; border: 1px solid #f5f5f5; border-radius: 4px; padding: 0px 15px; font-size: 14px; }
.ui-state-default a.red:hover {background-color: rgba(196, 24, 45, 0.8); border-color: rgba(196, 24, 45, 0.8); color: #fff;}
</style>
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>工厂店订单管理</h3>
        <h5>网站系统工厂店订单管理</h5>
      </div>
    </div>
  </div>
  <!-- 操作说明 -->
  <div id="explanation" class="explanation" style="color: rgb(44, 188, 163); background-color: rgb(237, 251, 248); width: 99%; height: 100%;">
    <div id="checkZoom" class="title"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span title="收起提示" id="explanationZoom" style="display: block;"></span>
    </div>
    <ul>
      <li>工厂店订单列表</li>
    </ul>
  </div>
  <div class="flexigrid">
    <div class="mDiv">
      <div class="ftitle">
        <h3>工厂店订单列表</h3>
        <h5>(共<?php echo $pager->totalRows; ?>条记录)</h5>
      </div>
      <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
      <form class="navbar-form form-inline" id="search-form" method="post" action="<?php echo U('/Admin/Store/orderList'); ?>">
        <div class="sDiv">
          <div class="sDiv2" style="margin-right: 10px;border: none;">
            <select name="province_id" id="province_id" onChange="get_city(this)">
              <option value="">所有省</option>
              <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): if( count($province)==0 ) : echo "" ;else: foreach($province as $k=>$v): ?>
                <option value="<?php echo $v['id']; ?>"> <?php echo $v['name']; ?></option>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
          </div>
          <div class="sDiv2" style="margin-right: 10px;border: none;">
            <select name="city_id" id="city" onChange="get_area(this)">
              <option value="">所有城市</option>
              <?php if($brandList): if(is_array($brandList) || $brandList instanceof \think\Collection || $brandList instanceof \think\Paginator): if( count($brandList)==0 ) : echo "" ;else: foreach($brandList as $k=>$v): ?>
                <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
              <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </select>
          </div>
          <div class="sDiv2" style="margin-right: 10px;border: none;">
            <select name="district_id" id="district">
              <option value="">所有区域</option>
              <?php if($brandList): if(is_array($brandList) || $brandList instanceof \think\Collection || $brandList instanceof \think\Paginator): if( count($brandList)==0 ) : echo "" ;else: foreach($brandList as $k=>$v): ?>
                <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
              <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </select>
          </div>
          <div class="sDiv2">
            <input size="30" placeholder="工厂店姓名" value="<?php echo \think\Request::instance()->request('store_name'); ?>" name="store_name" class="qsbox" type="text">
            <input class="btn" value="搜索" type="submit">
          </div>
        </div>
      </form>
    </div>
    <div id="accordion">
      <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
        <h3 onclick="ajaxOrder(<?php echo $val['store_id']; ?>, 1)" value="0" id="h3-<?php echo $val['store_id']; ?>">
          <span><?php echo $val['store_name']; ?></span>
          <span style="display:block; float:right; margin-right:20px;"><?php echo $val['mobile']; ?></span>
          <span style="display:block; float:right; margin-right:500px;"><?php echo $val['address']; ?></span>
        </h3>
        <div class="hDiv" style="background-color:#FFF">
        <div id="ajax_return-<?php echo $val['store_id']; ?>" class="ajax_return hDiv">
          
        </div>
        </div>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    
  </div> 
  <!--分页位置-->
    <?php echo $page; ?>
</div>
<script>
$(document).ready(function(){
    // 点击刷新数据
    $('.fa-refresh').click(function(){
        location.href = location.href;
    });
    $('#flexigrid >table>tbody>tr').click(function(){
        $(this).toggleClass('trSelected');
    });

    $( "#accordion" ).accordion({
        heightStyle: "content",
        collapsible: true,
        active: '',
    });

});

function ajaxOrderList(id, page){
    cur_page = page; //当前页面 保存为全局变量
    cur_id = id;    //当前选中的工厂店id，保存为全局变量
        $.ajax({
            type: "POST",
            url: "/index.php?m=Admin&c=Store&a=ajaxOrderList&id="+id+"&p="+page,
            data: {id:id},
            success: function(data){
                $("#accordion div.ajax_return").html('');
                $("#ajax_return-"+id).append(data);
            }
        });

}

function ajaxOrder(id, page){
    cur_page = page; //当前页面 保存为全局变量
    cur_id = id;    //当前选中的工厂店id，保存为全局变量
    var status = $('#h3-'+id).attr('value');
    if(status == 0){
        $('#h3-'+id).attr('value','1');
        $("h3").not('#h3-'+id).attr('value','0');
        $.ajax({
            type: "POST",
            url: "/index.php?m=Admin&c=Store&a=ajaxOrderList&id="+id+"&p="+page,
            data: {id:id},
            success: function(data){
                $("#accordion div.ajax_return").html('');
                $("#ajax_return-"+id).append(data);
            }
        });
    }else{
        $('#h3-'+id).attr('value','0');
    }
}

</script>
</body>
</html>