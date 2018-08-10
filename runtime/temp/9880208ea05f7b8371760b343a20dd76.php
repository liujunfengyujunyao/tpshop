<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:42:"./application/admin/view2/store\index.html";i:1512439955;s:44:"./application/admin/view2/public\layout.html";i:1519984569;}*/ ?>
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
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>工厂店管理</h3>
        <h5>工厂店列表与管理</h5>
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
      <li>操作时请仔细核对工厂店信息！</li>
    </ul>
  </div>
  <div class="flexigrid">
    <div class="mDiv">
      <div class="ftitle">
        <h3>工厂店列表</h3>
        <h5>(共<span id="count"></span>条记录)</h5>
      </div>
      <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
      <form class="navbar-form form-inline" id="search-form2" method="get" onsubmit="return false" action="<?php echo U('/Admin/Store/ajaxStoreList'); ?>">
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
                            <?php if(is_array($brandList) || $brandList instanceof \think\Collection || $brandList instanceof \think\Paginator): if( count($brandList)==0 ) : echo "" ;else: foreach($brandList as $k=>$v): ?>
                                <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="sDiv2" style="margin-right: 10px;border: none;">
                        <select name="district_id" id="district">
                            <option value="">所有区域</option>
                            <?php if(is_array($brandList) || $brandList instanceof \think\Collection || $brandList instanceof \think\Paginator): if( count($brandList)==0 ) : echo "" ;else: foreach($brandList as $k=>$v): ?>
                                <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                    <div class="sDiv2">
                        <input size="30" name="key_word" value="<?php echo \think\Request::instance()->param('key_word'); ?>" placeholder="工厂店名称" class="qsbox" type="text">
                        <input class="btn" value="搜索" onclick="ajax_get_table('search-form2',1)" type="submit">
                    </div>
                </div>
            </form>
    </div>
    <div class="hDiv">
      <div class="hDivBox">
        <table cellspacing="0" cellpadding="0" width="100%">
          <thead>
          <tr>
            <th class="sign" axis="col0">
              <div style="width: 24px;"><i class="ico-check"></i></div>
            </th>
            <th align="left" abbr="store_id" axis="col3" class="">
              <div style="text-align: left; width: 30px;" class="">ID</div>
            </th>
            <th align="left" abbr="store_name" axis="col3" class="">
              <div style="text-align: left; width: 200px;" class="">工厂店名称</div>
            </th>
            <th align="left" abbr="user_money" axis="col3" class="">
              <div style="text-align: left; width: 100px;" class="">账户余额</div>
            </th>
            <th align="left" abbr="user" axis="col3" class="">
              <div style="text-align: left; width: 100px;" class="">负责人</div>
            </th>
            <th align="left" abbr="partner" axis="col3" class="">
              <div style="text-align: left; width: 100px;" class="">合伙人</div>
            </th>
            <th align="left" abbr="type_name" axis="col4" class="">
              <div style="text-align: left; width: 150px;" class="">类型</div>
            </th>
            <th align="center" abbr="phone" axis="col5" class="">
              <div style="text-align: left; width: 100px;" class="">联系方式</div>
            </th>
            <th align="center" axis="col1" class="handle">
              <div style="text-align: left; width: 150px;">操作</div>
            </th>
          </tr>
          </thead>
        </table>
      </div>
    </div>
    <div class="tDiv">
      <div class="tDiv2">
        <div class="fbutton"> <a href="<?php echo U('Store/addEditStore',array('act'=>'_ADD_')); ?>">
          <div class="add" title="新增工厂店分类">
            <span><i class="fa fa-plus"></i>新增工厂店</span>
          </div>
        </a> </div>
      </div>
      <div style="clear:both"></div>
    </div>
    <div class="bDiv" style="height: auto;" id="ajax_return">
      
    </div>
    <!--分页位置-->
    <?php echo $show; ?> </div>
</div>
<script>
    $(document).ready(function() {
        // 点击刷新数据
        $('.fa-refresh').click(function() {
            location.href = location.href;
        });
        ajax_get_table('search-form2', 1);
    });


    // ajax 抓取页面 form 为表单id  page 为当前第几页
    function ajax_get_table(form,page) {
        cur_page = page; //当前页面 保存为全局变量
        $.ajax({
            type: "POST",
            url: "/index.php?m=Admin&c=Store&a=ajaxStoreList&p="+page,
            data: $('#'+form).serialize(),// 你的formid
            success: function(data){
                $("#ajax_return").html('');
                $("#ajax_return").append(data);
            }
        });
    }
</script>
</body>
</html>