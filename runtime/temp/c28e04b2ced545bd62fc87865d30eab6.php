<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:38:"./template/pc/rainbow/tfsapi\test.html";i:1514278058;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>测试页面</title>
</head>
<body>
<form action="<?php echo U('Home/Tfsapi/index'); ?>" method="post">
    key:<input type="text" name="key" value="af074e8dc858c7e8fdd27bb14152f26d" /><br/>
    act:<select name="act">
        <option value="get_qrcode">get_qrcode</option> 
        <option value="get_history">get_history</option>
         <option value="get_history_">get_history_</option>        
    </select><br/>
    <label>openid</label><input type="text" name="openid" /><br />
    sarkcode:<input type="text" name="sarkcode" value="" /><br/>
    <label>登录名</label><input type="text" name="username" /><br />
    <label>密码</label><input type="text" name="password"/><br />
    <input type="submit" />
</form>

</body>
</html>