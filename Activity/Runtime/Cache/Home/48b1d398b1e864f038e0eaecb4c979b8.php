<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/activity_manage/Public/X-admin/css/x-admin.css" media="all">
    <style>
    	#did{
			width:800px;
			height: 410px;
			margin:auto;
			float:right;
			position:absolute;
			top:120px;
			left:430px;

		}
		#back{
			position:absolute;
			left:609px;
			top:354px;
			display:block;
			width:100px;
			height:50px;
			text-align:center;
			line-height:50px;
			font-size:18px;
		    border-radius: 7px;
		    border: 1px solid #5c81e3;
		    background-image: linear-gradient(#779ae9,#5078df);
		    color: #fff;
		    cursor: pointer;


		}
		#back:hover{
			transition: all .15s ease-out;
			box-shadow: inset 0 1px 1px #7696DE, inset 0 0 2px #627DCA, inset 0 -2px 3px #5A77C7, inset 0 0 100px rgba(48,77,147,.4);

		}
    </style>
</head>
<body style="background:#EDEAE5">  
    <div id="did">
		<div style="font-size:100px;"><b>纳尼 ! ?</b></div>
		<br>
		<div style="font-size:50px;width:600px"><b>WHAT ! ?</b>
			<div style="font-size:30px;width:600px">肿么回事 ! ?</div>
		</div><br>
		
		<div style="font-size:100px;width:600px;position:absolute;top:130px;left:230px;"><b>啥 ! ?</b></div><br>
		<div style="font-size:50px;width:600px"><b>页面竟然找不到了 ! ?</b></div><br>
		<div style="font-size:30px;width:600px">我和小伙伴都惊呆了 惊呆了 呆了 了....</div>
		<div style="float:right;position:absolute;top:80px;left:500px"><img src="/activity_manage/Public/photo/404.png" widht="300px" height="310px"></div>
		<a href="/activity_manage/index.php/Home/User/pub" id="back">返回首页</a>
	</div>
	
    	
    
       
</body>
</html>
<script src="/activity_manage/Public/X-admin/lib/layui/layui.js" charset="utf-8"></script>
<script src="/activity_manage/Public/X-admin/js/x-layui.js" charset="utf-8"></script>
<script>
 layui.use(['form','layer'], function(){
	$=layui.jquery;
	//获取屏幕可视宽高
	heights=$(window).height();
	widths=$(window).width();
	didheight=$("#did").css("height");
	didwidth=$("#did").css("width");
	
	Ht=(parseInt(heights)-parseInt(didheight))/2;
	Wt=(parseInt(widths)-parseInt(didwidth))/2;
	$("#did").css("top",Ht-100);
	$("#did").css("left",Wt);
})
</script>