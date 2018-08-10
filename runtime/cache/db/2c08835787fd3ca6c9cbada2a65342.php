<?php
//000000000000s:8982:"<script src="/public/js/viewer/viewer.min.js"></script>
<link rel="stylesheet" href="/public/css/viewer.min.css">
<div class="people-comment">
    <div class="deta-descri p">
        <div class="person-ph-name">
            <div class="per-img-n p">
                                    <div class="img-aroun"><img src="/public/upload/head_pic/2017/12-15/68c54da96d036527c712d8eff3f1e89b.png"/></div>
                    <div class="menb-name">156005...</div>
                            </div>
            <!--<p class="member">金牌会员</p>-->
        </div>
        <!--评论-s-->
        <div class="person-com">
            <!--服务评星-s-->
            <div class="lifr4 p">
                <div class="dstar start5">
                   <i class="start start1" style="width:100%"></i>
                </div>
            </div>

            <!--评论内容-->
            <div class="lifr4 comfis p">
                <span class="faisf">太好了</span>
            </div>
            <!--晒单图-->
            <div class="lifr4 requiimg p">
                <ul class="comment_images" id="comment_images_1">
                                            <a><li><img data-original="/public/upload/comment/2017/10-18/6484275eb18c4ce40e493a936e2975fb.png" src="/public/upload/comment/2017/10-18/6484275eb18c4ce40e493a936e2975fb.png"/></li></a>
                                    </ul>
                <script>
                    var viewer = new Viewer(document.getElementById('comment_images_1'), {
                        url: 'data-original',
                        show: function() {
                            $('.soubao-sidebar').hide();
                        },
                        hide: function() {
                            $('.soubao-sidebar').show();
                        }
                    });
                </script>
            </div>
            <!--评论时间-->
            <div class="lifr4 bolist p">
                <span>2017-10-18 14:58:42</span>
            <!--购买商品规格-->
                <!--<span></span>-->
            <!--评论者评论时间与购买时间差-->
                <!--<span>购买17457天后评价</span>-->
                <!--<span>来自Android客户端</span>-->
            </div>
        </div>
        <!--评论-e-->

    <!--点赞，回复-->
        <div class="g_come">
            <a href="javascript:void(0);"><i class="detai-ico c-cen"></i>1</a>
            <a  onclick="zan(this);"  data-comment-id="1"><i class="detai-ico z-ten"></i><span id="span_zan_1" data-io="0">0</span></a>
        </div>
    </div>
    <!--回复框-->
    <!--<div class="reply-textarea">-->
        <!--<div class="reply-arrow"><b class="layer1"></b><b class="layer2"></b></div>-->
        <!--<div class="inner">-->
            <!--<textarea class="reply-input J-reply-input" data-id="replytext_1" placeholder="回复 ：" maxlength="120"></textarea>-->
            <!--<div class="operate-box">-->
                <!--<span class="txt-countdown">还可以输入<em>120</em>字</span>-->
                <!--<a class="reply-submit J-submit-reply J-submit-reply-lz" href="javascript:void(0);" target="_self">提交</a>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->
<!--商家回复-s-->
    <div class="comment-replylist">
                    <div class="comment-reply-item hide" data-vender="0" data-name="" data-uid="" style="display: block;">
                <div class="reply-infor clearfix">
                    <div class="main">
                        <span class="user-name">商家回复：</span>
                        <span class="words">谢谢</span>
                    </div>
                    <div class="side">
                        <span class="date">2017-10-18 15:03:41</span>
                    </div>
                </div>
                <!--回复商家内容-s-->
                <!--<div class="comment-operate">-->
                    <!--<a class="reply J-reply-trigger" href="#none" target="_self">回复</a>-->
                    <!--<div class="reply-textarea">-->
                        <!--<div class="reply-arrow"><b class="layer1"></b><b class="layer2"></b></div>-->
                        <!--<div class="inner">-->
                            <!--<textarea class="reply-input J-reply-input" data-id="replytext_1" placeholder="回复：" maxlength="120"></textarea>-->
                            <!--<div class="operate-box">-->
                                <!--<span class="txt-countdown">还可以输入<em>120</em>字</span>-->
                                <!--<a class="reply-submit J-submit-reply J-submit-reply-lz" href="javascript:void(0);" data-id="" onclick="" target="_self">提交</a>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
                <!--回复商家内容-e-->
            </div>
                <!---->
    </div>
<!--商家回复-e-->
</div>
<div class="operating fixed" id="bottom">
    <div class="fn_page clearfix">
        <div class='dataTables_paginate paging_simple_numbers'><ul class='pagination'>    </ul></div>    </div>
</div>
<script>
    // 点击分页触发的事件
    $("#ajax_comment_return .pagination  a").click(function(){
        ajaxComment(commentType,$(this).data('p'));
    });
    /**
     * 点赞ajax
     * dyr
     * @param obj
     */
    function zan(obj) {
        var comment_id = $(obj).attr('data-comment-id');
        var zan_num = parseInt($("#span_zan_" + comment_id).text());
        $.ajax({
            type: "POST",
            data: {comment_id: comment_id},
            dataType: 'json',
            url: "/index.php?m=Home&c=user&a=ajaxZan",//
            success: function (res) {
                if (res.success) {
                    $("#span_zan_" + comment_id).text(zan_num + 1);
                } else {
                    layer.msg('只能点赞一次哟~', {icon: 2});
                }
            },
            error : function(res) {
                console.log(res);
                if( res.status == "200"){ // 兼容调试时301/302重定向导致触发error的问题
                    layer.msg("请先登录!", {icon: 2});
                    return;
                }
                layer.msg("请求失败!", {icon: 2});
                return;
            }
        });
    }
    //字数限制
    $(function() {
        $('.c-cen').click(function() {
            $(this).parents('.deta-descri').siblings('.reply-textarea').toggle();
        })
        $('.J-reply-trigger').click(function(){
            $(this).siblings('.reply-textarea').toggle();
        })
        $('.reply-input').keyup(function() {
            var nums = 120;
            var len = $(this).val().length;
            if(len > nums) {
                $(this).val($(this).val().substring(0, nums));
                layer.msg("超过字数限制！" , {icon: 2});
            }
            var num = nums - len;
            var su = $(this).siblings().find('.txt-countdown em');
            su.text(num);
        })

        $(document).on('click','.operate-box .reply-submit',function() {
            var content = $(this).parents('.inner').find('.reply-input').val();
            var comment_id = $(this).parents('.inner').find('.reply-input').attr('data-id').substr(10);
            var comment_name = $(this).parents('.comment-operate').siblings('.reply-infor').find('.main .user-name').text();
            var reply_id = $(this).attr('data-id');
            submit_reply(comment_id,content,comment_name,reply_id);
            $(this).parents('.reply-textarea').hide();
        });
    })

    /**
     * 回复
     * @param comment_id
     * @param content
     * @param to_name
     * @param reply_id
     */
//    function submit_reply(comment_id,content,to_name,reply_id)
//    {
//        $.ajax({
//            type: 'post',
//            dataType: 'json',
//            data: {comment_id: comment_id,content:content,to_name:to_name,reply_id:reply_id,goods_id:''},
//            url: "/index.php/Home/User/reply_add.html",
//            success: function (res) {
//                if (res.success) {
//                    layer.msg('回复已提交', {icon: 1});
//                } else {
//                    layer.msg(res.msg, {icon: 2});
//                }
//            },
//            error : function(res) {
//                if( res.status == "200"){ // 兼容调试时301/302重定向导致触发error的问题
//                    layer.msg("请先登录!",{icon: 2});
//                    return;
//                }
//                layer.msg("请求失败!",{icon: 2});
//            }
//        });
//    }

</script>
";
?>