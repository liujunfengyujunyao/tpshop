/* JS Document*/
/*
 *====================
 *
 *     时尚学院js
 *
 *====================
 */
$(function(){
	/* 时尚学院切换效果 by Dh 2017-5-31 */
	$("#fashion .fashion-nav li a").click(function() {
		$("#fashion .fashion-nav li a img").attr('src', 'images/fashion_03.png');
		$(this).children('img').attr('src', 'images/fashion_02.png');
	});
});