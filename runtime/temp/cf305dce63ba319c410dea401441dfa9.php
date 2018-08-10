<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:45:"./template/mobile/new2/order\add_comment.html";i:1512439864;s:41:"./template/mobile/new2/public\header.html";i:1512439863;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>评论晒单--<?php echo $tpshop_config['shop_info_store_title']; ?></title>
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
<body class="g4">

<form id="add_comment" method="post" enctype="multipart/form-data">
    <input type="hidden" name="order_prom_type"  value="<?php echo $order_info['order_prom_type']; ?>">
<!--顶部-s-->
    <div class="classreturn loginsignup">
        <div class="content">
            <div class="ds-in-bl return">
                <a href="javascript:history.back(-1);"><img src="__STATIC__/images/return.png" alt="返回"></a>
            </div>
            <div class="ds-in-bl search ">
                <span>评价晒单</span>
            </div>
            <div class="ds-in-bl menu">
                <a class="submit_com" href="javascript:void(0);" onclick="return validate_comment()">提交</a>
            </div>
        </div>
    </div>
<!--顶部-e-->
<!--评分-s-->
    <div class="sp_idear">
        <div class="maleri30">
            <img src="<?php echo goods_thum_images($order_goods['goods_id'],100,100); ?>"/>
            <div class="com_igy p">
                <p class="confine-wsp"><?php echo $order_goods['goods_name']; ?></p>
                <p class="confine-wsp  shuxg"><?php echo $order_goods['spec_key_name']; ?></p>
            </div>
        </div>
    </div>
<!--评分-e-->
<!--评论-s-->
    <div class="customer-messa comm_text_goods">
        <div class="maleri30">
            <textarea class="tapassa" onkeyup="checkfilltextarea('.tapassa','500')" id="content_13" name="content" placeholder="写下购买体会和使用感受来帮助其他小伙伴~"></textarea>
            <span class="xianzd"><em id="zero">500</em>/500</span>
        </div>
    </div>
<!--评论-e-->
<!--上传图片-s-->
    <div class="seravetype">
        <div class="maleri30">
            <ul id="imglen">
                <label>
                    <li class="file">
                        <div class="shcph" id="fileList0">
                            <img src="__STATIC__/images/camera.png">
                        </div>
                        <input  type="file" accept="image/*" name="comment_img_file[]"  onchange="handleFiles(this,0)" style="display:none">
                    </li>
                </label>
                <label>
                    <li class="file">
                        <div class="shcph" id="fileList1">
                            <img src="__STATIC__/images/camera.png">
                        </div>
                        <input  type="file" accept="image/*" name="comment_img_file[]"  onchange="handleFiles(this,1)" style="display:none">
                    </li>
                </label>
                <label>
                    <li class="file">
                        <div class="shcph" id="fileList2">
                            <img src="__STATIC__/images/camera.png">
                        </div>
                        <input  type="file" accept="image/*" name="comment_img_file[]"  onchange="handleFiles(this,2)" style="display:none">
                    </li>
                </label>
                <label>
                    <li class="file">
                        <div class="shcph" id="fileList3">
                            <img src="__STATIC__/images/camera.png">
                        </div>
                        <input  type="file" accept="image/*" name="comment_img_file[]"  onchange="handleFiles(this,3)" style="display:none">
                    </li>
                </label>
                <label>
                    <li class="file">
                        <div class="shcph" id="fileList4">
                            <img src="__STATIC__/images/camera.png">
                        </div>
                        <input  type="file" accept="image/*" name="comment_img_file[]"  onchange="handleFiles(this,4)" style="display:none">
                    </li>
                </label>
            </ul>
            <div class="inspectrepot p">
                <div class="radio">
                    <span class="che"  onclick="hideUserName(this)">
                        <input type="checkbox" name="hide_username" style="display:none;" id="hide_username" value="1">
                        <i></i>
                        <span>匿名评价</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
<!--上传图片-e-->
<!--服务评价-s-->
    <div class="wlcomenser ma-to-20">
        <div class="maleri30">
            <div class="p_zyft p">
                <p class="fl">评分</p>
                <p class="fr lifi">满意请给5分哦</p>
            </div>
        </div>
    </div>
    <div class="thirs_commen">
        <div class="maleri30">
            <div class="al_comentaid p">
                <div class="taidh">商品符合度</div>
                <div class="star_click">
                   <span class="comment-item-star_wr" title="1">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="2">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="3">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="4">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="5">
                        <span class="real-star_wr" ></span>
                    </span>
                    <input name="goods_rank" value="0" type="hidden">
                </div>
            </div>
            <div class="al_comentaid p">
                <div class="taidh">店家服务态度</div>
                <div class="star_click">
                    <span class="comment-item-star_wr" title="1">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="2">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr">
                        <span class="real-star_wr" title="3"></span>
                    </span>
                    <span class="comment-item-star_wr" title="4">
                        <span class="real-star_wr" ></span>
                    </span>
                    <span class="comment-item-star_wr" title="5">
                        <span class="real-star_wr" ></span>
                    </span>
                    <input name="service_rank" value="0" type="hidden">
                </div>
            </div>
            <?php if($order_info['order_prom_type'] != 5): ?>
                <div class="al_comentaid p">
                <div class="taidh">物流发货速度</div>
                <div class="star_click">
                    <span class="comment-item-star_wr" title="1">
                        <span class="real-star_wr"  ></span>
                    </span>
                    <span class="comment-item-star_wr" title="2">
                        <span class="real-star_wr"  ></span>
                    </span>
                    <span class="comment-item-star_wr" title="3">
                        <span class="real-star_wr"  ></span>
                    </span>
                    <span class="comment-item-star_wr" title="4">
                        <span class="real-star_wr"  ></span>
                    </span>
                    <span class="comment-item-star_wr" title="5">
                        <span class="real-star_wr"  ></span>
                    </span>
                    <input name="deliver_rank" value="0" type="hidden">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
<!--服务评价-e-->
    <input type="hidden" name="order_id" value="<?php echo $order_goods['order_id']; ?>">
    <input type="hidden" name="goods_id" value="<?php echo $order_goods['goods_id']; ?>">
</form>
<script type="text/javascript">
    $(function(){
        //评分
        $('.comment-item-star_wr').click(function(e){
            var obj = $(this);
            obj.find('span').addClass('comment-stars-width5');
            obj.prevAll().find('span').addClass('comment-stars-width5').parent();
            obj.nextAll().find('span').removeClass('comment-stars-width5');
            obj.siblings('input').val(obj.attr('title'));
        })
    })
    function hideUserName(obj){
        if($(obj).hasClass('check_t')){
            $('#hide_username').prop('checked',false);
        }else{
            $('#hide_username').prop('checked',true);
        }

    }

    function validate_comment(){
        var content = $("#content_13").val();
        var error = [];
        var img_num = 0;
        var AllImgExt=".jpg|.jpeg|.gif|.bmp|.png|";//全部图片格式类型
        //var title = document.getElementById("title").value;
        $(".file input").each(function(index){
            FileExt = this.value.substr(this.value.lastIndexOf(".")).toLowerCase();
            if(this.value!=''){
                img_num++;
                if(AllImgExt.indexOf(FileExt+"|")==-1){
                    error.push("第"+(index+1)+"张图片格式错误");
                }
            }
        });
        $(".jsstar input").each(function(index){
            if(this.value == '0'){
                if(this.name == 'goods_rank'){
                    error.push('请给描述评分！');
                };
                if(this.name == 'service_rank'){
                    error.push('请给服务评分！');
                };
                if(this.name == 'deliver_rank'){
                    error.push('请给物流评分！');
                };
            }
        });
        if(content == ''){
            error.push('评价内容不能为空！');
        }

        if(error.length>0){
            showErrorMsg(error);
            return false;
        }else{
            $('#add_comment').submit();
            return true;
        }
    }

    //显示上传照片
    window.URL = window.URL || window.webkitURL;
    function handleFiles(obj,id) {
        fileList = document.getElementById("fileList"+id);
        var files = obj.files;
        img = new Image();
        if(window.URL){

            img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
            img.width = 60;
            img.height = 60;
            img.onload = function(e) {
                window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
            }
            if(fileList.firstElementChild){
                fileList.removeChild(fileList.firstElementChild);
            }
            fileList.appendChild(img);
        }else if(window.FileReader){
            //opera不支持createObjectURL/revokeObjectURL方法。我们用FileReader对象来处理
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onload = function(e){
                img.src = this.result;
                img.width = 60;
                img.height = 60;
                fileList.appendChild(img);
            }
        }else
        {
            //ie
            obj.select();
            obj.blur();
            var nfile = document.selection.createRange().text;
            document.selection.empty();
            img.src = nfile;
            img.width = 60;
            img.height = 60;
            img.onload=function(){

            }
            fileList.appendChild(img);
        }
    }
</script>
</body>
</html>
