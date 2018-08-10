<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:39:"./template/mobile/new2/user\paypwd.html";i:1520235416;s:41:"./template/mobile/new2/public\header.html";i:1519984628;s:45:"./template/mobile/new2/public\header_nav.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>设置支付密码--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
    <link rel="stylesheet" href="__STATIC__/css/style.css">
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/iconfont.css"/>
    <script src="__STATIC__/js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
    <!--<script src="__STATIC__/js/zepto-1.2.0-min.js" type="text/javascript" charset="utf-8"></script>-->
    <script src="__STATIC__/js/style.js" type="text/javascript" charset="utf-8"></script>
    <script src="__STATIC__/js/mobile-util.js" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/js/global.js"></script>
    <script src="__STATIC__/js/layer.js"  type="text/javascript" ></script>
    <script src="__STATIC__/js/swipeSlide.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body class="">

<div class="classreturn loginsignup ">
    <div class="content">
        <div class="ds-in-bl return">
            <a href="<?php echo U('Mobile/User/userinfo'); ?>"><img src="__STATIC__/images/return.png" alt="返回"></a>
        </div>
        <div class="ds-in-bl search center">
            <span>设置支付密码</span>
        </div>
        <div class="ds-in-bl menu">
            <a href="javascript:void(0);"><img src="__STATIC__/images/class1.png" alt="菜单"></a>
        </div>
    </div>
</div>
<div class="flool tpnavf">
    <div class="footer">
        <ul>
            <li>
                <a class="yello" href="<?php echo U('Index/index'); ?>">
                    <div class="icon">
                        <i class="icon-shouye iconfont"></i>
                        <p>首页</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo U('Goods/categoryList'); ?>">
                    <div class="icon">
                        <i class="icon-fenlei iconfont"></i>
                        <p>分类</p>
                    </div>
                </a>
            </li>
            <li>
                <!--<a href="shopcar.html">-->
                <a href="<?php echo U('Cart/cart'); ?>">
                    <div class="icon">
                        <i class="icon-gouwuche iconfont"></i>
                        <p>购物车</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="<?php echo U('User/index'); ?>">
                    <div class="icon">
                        <i class="icon-wode iconfont"></i>
                        <p>我的</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<style>
    /*.fetchcode{
        background-color: #ec5151;
        border-radius: 0.128rem;
        color: white;
        padding: 0.55467rem 0.21333rem;
        vertical-align: middle;
        font-size: 0.59733rem;
    }
    #fetchcode{
        background:#898995;
        border-radius: 0.128rem;
        color: white;
        padding: 0.55467rem 0.21333rem;
        vertical-align: middle;
        font-size: 0.59733rem;
    }*/
</style>
<?php if($step == 1): ?>
        <div class="loginsingup-input">
            <form method="post" >
                <div class="reset-pwd-title">短信修改支付密码</div>
                <div class="lsu">
                    <span class="ico ico-telephone"></span>
                    <input type="text" name="mobile" id="tel" value="<?php echo $user['mobile']; ?>" placeholder="请输入您的手机号" onBlur="checkMobilePhone(this.value);"/>
                </div>
                <div class="v-identity m-t-40">
                    <span class="v-til">验证码 :</span>
                    <div class="v-cont-wrap">
                        <input type="text" name="mobile_code" id="tpcode" value="" placeholder="请输入验证码">
                        <a  class="m_phone" href="javascript:void(0);" rel="mobile" id="fcode" onclick="sendcode(this)">获取验证码</a>
                    </div>
                </div>
                <div class="lsu-submit">
                    <input type="button" onclick="nextstep()" value="下一步" />
                </div>
            </form>
        </div>
    <?php endif; if($step == 2): ?>
    <div class="loginsingup-input">
        <form  method="post"  id="payform">
            <?php if(!empty($user['paypwd'])): ?>
            <div class="reset-pwd-title">修改支付密码</div>
            <div class="lsu">
                <span class="ico ico-old-password"></span>
                <input type="password" name="old_password" id="old_password"  placeholder="请输入原密码"/>
            </div>
            <?php endif; ?>
            <div class="lsu">
                <span class="ico ico-password"></span>
                <input type="password" name="new_password" id="new_password"  placeholder="请输入新密码"/>
            </div>
            <div class="lsu">
                <span class="ico ico-password"></span>
                <input type="password" name="confirm_password" id="confirm_password"  placeholder="再次输入新密码" />
            </div>
            <div class="lsu-submit">
                <input type="button" onclick="submitverify()" value="确认修改" />
            </div>
        </form>
    </div>
<?php endif; ?>
<script>
    //手机验证
    function checkMobilePhone(mobile){
        if(mobile == ''){
            showErrorMsg('请输入您的手机号');
            return false;
        }else  if(!checkMobile(mobile)) {
            showErrorMsg('手机号码格式不正确！');
            return false;
        }
    }


    //发送短信验证码
    function sendcode(obj){
        var tel = $.trim($('#tel').val());
        var obj = $(obj);
        if(tel == ''){
            showErrorMsg('请输入您的号码！');
            return false;
        }
        var s = <?php echo $tpshop_config['sms_sms_time_out']; ?>;
        //改变按钮状态
        obj.unbind('click');
        //添加样式
        obj.attr('id','fetchcode');
        callback();
        //循环定时器
        var T = window.setInterval(callback,1000);
        function callback()
        {
            if(s <= 0){
                //移除定时器
                window.clearInterval(T);
                obj.bind('click',sendcode)
                obj.removeAttr('id','fetchcode');
                obj.text('获取验证码');
            }else{
                obj.text(--s + '秒后再获取');
            }
        }
        $.ajax({
            url : "/index.php?m=Home&c=Api&a=send_validate_code&scene=6&type=mobile&send="+tel,
            type:'post',
            dataType:'json',
            data:{type:obj.attr('rel'),send:tel},
            success:function(res){
                if(res.status==1){
                    //成功
                    showErrorMsg(res.msg);
                }else{
                    //失败
                    showErrorMsg(res.msg);
                    //移除定时器
                    window.clearInterval(T);
                    obj.removeAttr('id','fetchcode');
                    obj.text('获取验证码');
                }
            }
        })
    }

    //第一步验证
    function nextstep(){
    	
    	
        var tpcode = $('#tpcode').val();
        if(tpcode == ''){
            showErrorMsg('验证码不能为空');
            return false;
        }
        if(tpcode.length != 4){
            showErrorMsg('验证码错误');
            return false;
        }
        $.ajax({
            url:'/index.php?m=Home&c=Api&a=check_validate_code&t='+Math.random(),
            type:'post',
            dataType:'json',
            data:{type:$('#sender').val(),code:tpcode,send:$('#tel').val(),scene:6},
            success:function(data){
                if(data.status==1){
                    is_check = true;
                    window.location.href='/index.php?m=Mobile&c=User&a=paypwd&step=2&t='+Math.random();
                }else{
                    showErrorMsg(data.msg);
                    return false;
                }
            }
        })
    }

    //提交前验证表单
    function submitverify(){
        var new_password = $('#new_password').val();
        var confirm_password = $('#confirm_password').val();
        if(new_password == ''){
            showErrorMsg('新支付密码不能为空');
            return false;
        }
        if(new_password.length<6 || new_password.length>18){
            showErrorMsg('密码长度不符合规范');
            return false;
        }
        if(new_password != confirm_password){
            showErrorMsg('两次密码不一致');
            return false;
        }
        $.ajax({
            url:'/index.php?m=Mobile&c=User&a=paypwd&step=2&t='+Math.random(),
            type:'post',
            dataType:'json',
            data:$('#payform').serialize(),
            success:function(data){
                if(data.status==1){
                    showErrorMsg(data.msg);
                    window.location.href=data.url;
                }else{
                    showErrorMsg(data.msg);
                    return false;
                }
            }
        })
    }
    /**
     * 提示弹窗
     * */
    function showErrorMsg(msg){
        layer.open({content:msg,time:2});
    }
</script>
</body>
</html>
