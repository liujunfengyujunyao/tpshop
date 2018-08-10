<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:41:"./application/admin/view2/sark\index.html";i:1533876247;s:44:"./application/admin/view2/public\layout.html";i:1533876247;}*/ ?>
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
<script src="__ROOT__/public/static/js/layer/laydate/laydate.js"></script>
<body style="background-color: rgb(255,255,255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>风尚美人柜管理</h3>
                <h5>风尚美人柜的索引与管理</h5>
            </div>
        </div>
    </div>

    <!-- 操作说明 -->
    <div id="explanation" class="explanation" style="color:#2CA8A3; background-color: #EDFBF8; width:99%; height:100%;">
        <div id="checkZoom" class="title">
            <i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span title="收起提示" id="explanationZoom" style="display: block;"></span>
        </div>
        <ul>
            <li>风尚美人柜操作,在此管理.</li>
        </ul>
    </div>

    <!-- 风尚美人柜列表 -->
    <div class="flexigrid">
        <div class="mDiv">
            <div class="ftitle">
                <h3>风尚美人柜列表</h3>
                <h5>(共<span id="count"></span>条记录)</h5>
            </div>
            <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
            <form class="navbar-form form-inline" id="search-form1" method="post" onsunbmit="return false">
                <div class="sDiv">
                    <div class="sDiv2">
                        <input size="30" name="key_word" value="<?php echo \think\Request::instance()->param('key_word'); ?>" placeholder="美人柜编号" class="qsbox" type="text"/>
                        <input class="btn" value="搜索" onclick="ajax_get_table('search-form1',1)" type="submit"/>
                    </div>
                </div>
            </form>
        </div>
        <div class="hDiv">
            <div class="hDivBox">
                <table cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="sign" axis="colo">
                            <div style="width:24px;"><i class="ico-check"></i></div>
                        </th>
                        <th align="center" abbr="sark_id" axis="col3">
                            <div style="text-align: center; width: 60px;">ID</div>
                        </th>
                        <th align="center" abbr="sark_code" axis="col4">
                            <div style="text-align: center; width: 100px;">风尚美人柜编号</div>
                        </th>
                        <th align="center" abbr="store_name" axis="col5">
                            <div style="text-align: center; width:100px;">工厂店名字</div>
                        </th>
                        <th align="center" abbr="add_time" axis="col6">
                            <div style="text-align: center; width: 100px;">添加时间</div>
                        </th>
                        <th align="center" abbr="confirm_time" axis="col7">
                            <div style="text-align: center; width: 100px;">工厂店确认时间</div>
                        </th>
                        <th align="center" axis="col8" class="handle">
                            <div style="text-align: center; width: 100px;">操作</div>
                        </th>
                        <th style="width: 100%" axis="col9">
                            <div></div>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="tDiv">
            <div class="tDiv2">
                <div class="fbutton">
                    <a href="<?php echo U('Admin/Sark/sark_info'); ?>">
                        <div class="add" title="添加风尚美人柜">
                            <span><i class="fa fa-plus">添加风尚美人柜</i></span>
                        </div>
                    </a>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="bDiv" style="height:auto;" id="ajax_return"></div>

        <!-- 分页位置 -->
        <?php echo $show; ?>
    </div>
</div>
<script>
    $(document).ready(function(){
        //点击刷新页面
        $('.fa-refresh').click(function(){
            location.href = location.href;
        });
        ajax_get_table('search-form1',1);
    });

    //ajax抓取页面form为表单id,page为当前第几页
    function ajax_get_table(form,page){
        cur_page = page;
        $.ajax({
            type: "POST",
            url:"/index.php?m=Admin&c=Sark&a=ajaxSarkList&p="+page,
            data: $('#'+form).serialize(),
            success: function(data){
                $("#ajax_return").html('');
                $("#ajax_return").append(data);
            }
        });
    }
</script>
</body>
</html>