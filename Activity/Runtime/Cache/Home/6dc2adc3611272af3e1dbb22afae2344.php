<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/activity_manage/Public/X-admin/css/x-admin.css" media="all">
	<style>
		body{
              background-color:#F3F3F3;
            }
        #content{
        	width:100%;
        	overflow:auto;
        }
        .news{
        	margin-top:100px;
        	margin-left:8%;
        	margin-bottom:10px;
        	/*margin:10% 100px 10px auto;*/
        	border-radius:10px;
        	box-shadow:0 3px 10px 0 #9f9f9f;
        	float:left;
        	width:260px;
        	height:300px;
        	border:1px solid #cfcfcf;
        }
        .header{
        	width:100%;
        	height:60px;
        	font-size:16px;
        	line-height:60px;
        	text-align:center;
        	border-radius:10px;
        	box-shadow:0 0 10px 0 #9f9f9f;
        	/*border:1px solid #cfcfcf;*/
        }
        .content{
        	padding:5px;
        }
        .content ul li a{
            /*border:1px solid red;*/
            display:block;
            padding:2px;
        }
        .content ul li a:hover{
            color:#01AAED;
        }
        .xinwen{
            position: relative;
            width: 245px;
            height: 230px;
            overflow: hidden;
            /*border:1px solid red;*/
        }
        .xw{
            left: 0px;
            top: 0px;
        }

        .xinwen li{
            display: block;
        }
        .xinwen li a{
            display: block;
            width: 330px;
            height: 30px;
            line-height: 30px;
            /*color: black;*/
            overflow: hidden;
            border-bottom: 1px dashed #858585;
            font-size: 16px;
        }

	</style>
</head>
<body>
	<!-- <div style="float: right;margin: 10px 0px;">
		<iframe allowtransparency="true" frameborder="0" width="400" height="100" scrolling="no" src="//tianqi.2345.com/plugin/widget/index.htm?s=1&z=3&t=1&v=0&d=1&bd=0&k=000000&f=&q=1&e=1&a=1&c=58238&w=565&h=100&align=center"></iframe>
		<br>
	</div> -->
	<div id="content" >
<!-- 		<div class="news" >
			<div class="header" >Enter</div>
			<div class="content" >
                <div id="xinwen1" class="xinwen" >
                    <ul id="xw1" class="xw" >
                        <?php if(is_array($list2)): foreach($list2 as $key=>$row): ?><li>
                                <a href="javascript:;" onclick="admin_edit('look','/activity_manage/index.php/Home/User/enterdetails/id/<?php echo ($row['enter_id']); ?>','4','','510')" class="ml-5" style="text-decoration:none"><?php echo ($row['username']); ?></a>
                            </li><?php endforeach; endif; ?>
                    </ul>
                    <ul id="xw21" class="xw2">

                    </ul>
                </div>      
            </div>
		</div> -->
		<div class="news" >
            <div class="header" >Incoming Events</div>
            <div class="content" >
                <div id="xinwen2" class="xinwen" >
                    <ul id="xw2" class="xw" >
                    <?php if(is_array($list1)): foreach($list1 as $key=>$row): ?><li>
                            <a href="javascript:;" onclick="admin_edit('look','/activity_manage/index.php/Home/User/noticedetails/id/<?php echo ($row['activity_id']); ?>','4','','510')" class="ml-5" style="text-decoration:none"><?php echo ($row['name']); ?></a>
                        </li><?php endforeach; endif; ?>
                    </ul>
                     <ul id="xw22" class="xw2">

                    </ul>
                </div>      
            </div>
        </div>
		<div class="news" >
            <div class="header" >All Feedback</div>
            <div class="content" >
                <div id="xinwen3" class="xinwen" >
                    <ul id="xw3" class="xw" >
                        <?php if(is_array($list3)): foreach($list3 as $key=>$row): ?><li>
                                <a href="javascript:;" onclick="admin_edit('look','/activity_manage/index.php/Home/User/feeddetails/id/<?php echo ($row['assess_id']); ?>','4','','510')" class="ml-5" style="text-decoration:none"><?php echo ($row['title']); ?></a>
                            </li><?php endforeach; endif; ?>
                    </ul>  
                    <ul id="xw23" class="xw2">

                    </ul>
                </div>       
            </div>
        </div>
	</div>

	<div style="position:absolute;bottom:10px;width: 100%">
	<center>
	  <p>Copyright Group AC 2017 - 2018 Edu Inc.</p>
	  Powered by <a href="javascript:;" title="">Snail team</a></center>
	</div>
</body>
	<script src="/activity_manage/Public/X-admin/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/activity_manage/Public/X-admin/js/x-layui.js" charset="utf-8"></script>
    <!-- <script src="/activity_manage/Public/js/jquery-2.2.2.min.js" charset="utf-8"></script> -->

    <script>
        layui.use(['laydate','element','laypage','layer','form'], function(){
            $ = layui.jquery;//jquery
            laydate = layui.laydate;
            lement = layui.element();
            laypage = layui.laypage;
            layer = layui.layer;
            form = layui.form();     
              
        });
        //edit
        function admin_edit (title,url,id,w,h) {
            x_admin_show(title,url,w,h); 
        }
    </script>

    <script>

        var xinwen1=document.getElementById("xinwen1");
        var xw1=document.getElementById("xw1");
        var xw21=document.getElementById("xw21");
        xw21.innerHTML=xw1.innerHTML;
        var time=50;
        xinwen1.scrollTop=0;
        function scrollUp1(){
            if(xinwen1.scrollTop>=xw1.scrollHeight){
                xinwen1.scrollTop=0;
            }else{
                xinwen1.scrollTop++;
            }
        }
        var myScroll1=setInterval("scrollUp1()",time);
        xinwen1.onmouseover=function (){
            clearInterval(myScroll1);
        }
        xinwen1.onmouseout=function(){
            myScroll1=setInterval("scrollUp1()",time);
        }


        var xinwen2=document.getElementById("xinwen2");
        var xw2=document.getElementById("xw2");
        var xw22=document.getElementById("xw22");
        xw22.innerHTML=xw2.innerHTML;
        var time=50;
        xinwen2.scrollTop=0;
        function scrollUp2(){
            if(xinwen2.scrollTop>=xw2.scrollHeight){
                xinwen2.scrollTop=0;
            }else{
                xinwen2.scrollTop++;
            }
        }
        var myScroll2=setInterval("scrollUp2()",time);
        xinwen2.onmouseover=function (){
            clearInterval(myScroll2);
        }
        xinwen2.onmouseout=function(){
            myScroll2=setInterval("scrollUp2()",time);
        }



        var xinwen3=document.getElementById("xinwen3");
        var xw3=document.getElementById("xw3");
        var xw23=document.getElementById("xw23");
        xw23.innerHTML=xw3.innerHTML;
        var time=50;
        xinwen3.scrollTop=0;
        function scrollUp3(){
            if(xinwen3.scrollTop>=xw3.scrollHeight){
                xinwen3.scrollTop=0;
            }else{
                xinwen3.scrollTop++;
            }
        }
        var myScroll3=setInterval("scrollUp3()",time);
        xinwen3.onmouseover=function (){
            clearInterval(myScroll3);
        }
        xinwen3.onmouseout=function(){
            myScroll3=setInterval("scrollUp3()",time);
        }



    </script>

    <script>
		// layui.use('element', function(){
		// 	var $ = layui.jquery
		// 	,element = layui.element();
		// })
	</script>
</html>