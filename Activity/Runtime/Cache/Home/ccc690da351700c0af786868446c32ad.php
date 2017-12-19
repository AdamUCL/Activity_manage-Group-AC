<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Basic information</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/activity_manage/Public/X-admin/css/x-admin.css" media="all">
    </head>
    <body>
        <div class="x-nav">
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="Refresh"><i class="layui-icon" style="line-height:29px">ဂ</i> <i class="layui-icon" style="line-height:30px">Refresh</i></a>
        </div>
	

        <div class="x-body">
			<div class="layui-tab layui-tab-card">
			  <ul class="layui-tab-title">
			    <li class="layui-this">Basic information</li>
          <li>Person picture</li>
			    <li>Update password</li>
			  </ul>
			  <div class="layui-tab-content" style="height: 360px;">
			    <div class="layui-tab-item layui-show">
		            <table class="layui-table">
					  <colgroup>
					    <col width="150">
					    <col>
					  </colgroup>
					    <tr>
					      <th><img src="/activity_manage/Public/photo/<?php echo ($list['user_pic']); ?>" ></th>
					      <th><?php echo ($list['username']); ?></th>
					    </tr> 
					    <tr>
					      <td>Realname</td>
					      <td><?php echo ($list['realname']); ?></td>
					    </tr>
					    <tr>
					      <td>University</td>
					      <td><?php echo ($list['university']); ?></td>
					    </tr>
					    <tr>
					      <td>Phone</td>
					      <td><?php echo ($list['user_phone']); ?></td>
					    </tr>
					    <tr>
					      <td>Email</td>
					      <td><?php echo ($list['user_email']); ?></td>
					    </tr>
					    <tr>
					      <td>Subject</td>
					      <td><?php echo ($list['performance']); ?></td>
					    </tr>
					    <tr>
					      <td>Status</td>
					      <td><?php echo ($list['status']); ?></td>
					    </tr>
					</table>
			    </div>
			    <div class="layui-tab-item">
			    	<form action="/activity_manage/index.php/Home/User/upload" method="post" enctype="multipart/form-data" >
			    		<input type="hidden" name="user_id" value="<?php echo ($list['user_id']); ?>" >
    						<table class="layui-table">
    					  <colgroup>
    					    <col width="50">
    					    <col>
    					  </colgroup>
    					    <tr>
    					      <th>Oldpic：</th>
    					      <th><img src="/activity_manage/Public/photo/<?php echo ($list['user_pic']); ?>" ></th>
    					    </tr> 
    					    <tr>
    					      <td>Upload pic</td>
    					      <td><input type="file" name="user_pic" ><br></td>
    					    </tr>
    					    <tr>
    					      <td colspan="2" ><button class="layui-btn" type="submit" lay-filter="formDemo">Add</button></td>
    					    </tr>
      					</table>
  			    		
  			    	</form>
			    </div>
          <div class="layui-tab-item">
            <form method="post" action="/activity_manage/index.php/Home/User/updatePass" onsubmit="return demo()" class="layui-form layui-form-pane" >
            <!-- <form method="post" action="" onsubmit="return demo()" class="layui-form layui-form-pane" > -->
              <input type="hidden" name="user_id" value="<?php echo ($list['user_id']); ?>" >
                <div class="layui-form-item">
                  <label class="layui-form-label">Oldpassword：</label>
                  <div class="layui-input-inline">
                    <input type="password" id="old" name="oldpassword" required="" lay-verify="required" placeholder="please input password" autocomplete="off" class="layui-input">
                  </div>
                  <div id="oldpassid" class="layui-form-mid layui-word-aux"></div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">Newpassword：</label>
                  <div class="layui-input-inline">
                    <input type="password" id="newpass" name="newpassword" required="" lay-verify="required" placeholder="please input password" autocomplete="off" class="layui-input">
                  </div>
                  <div id="newpassid" class="layui-form-mid layui-word-aux"> * Any number of letters from six to eighteen digits</div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label">repassword：</label>
                  <div class="layui-input-inline">
                    <input type="password" id="newrepass" name="newrepassword" required="" lay-verify="required" placeholder="please input password" autocomplete="off" class="layui-input">
                  </div>
                  <div id="newrepassid" class="layui-form-mid layui-word-aux"> * Be consistent with the new password</div>
                </div>

                <div class="layui-form-item">
                  <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="formpass">Add</button>
                  </div>
                </div>
                
              </form>
          </div>
			  </div>
			</div>
           

        </div>
        <script src="/activity_manage/Public/X-admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/activity_manage/Public/X-admin/js/x-layui.js" charset="utf-8"></script>
        <script>

            layui.use(['element','laypage','layer','form'], function(){
                $ = layui.jquery;//jquery
              // laydate = layui.laydate;
              lement = layui.element();
              laypage = layui.laypage;
              layer = layui.layer;
              form = layui.form();
              

              oldpass = false;
              newpass = false;
              newrepass = false;
              $("#old").blur(function(){
                oldpassword = $("#old").val();
               
                $.post("/activity_manage/index.php/Home/User/findpass",{oldpassword:oldpassword},function(data){
                  if(data=="success"){
                    $("#oldpassid").text("password");
                    oldpass = true;
                  }else{
                    $("#oldpassid").text("oldpassword error");
                    oldpass = false;
                  }

                });
                
              });

              $("#newpass").blur(function(){
                newpassword = $(this).val();
                  if(newpassword.match(/^[\w]{6,18}$/)){
                    $("#newpassid").text("pass");
                    newpass = true;

                  }else{
                    $("#newpassid").text("oldpassword error");
                    newpass = false;
                  }
                
              });

              $("#newrepass").blur(function(){
                newrepassword = $(this).val();
                newpassword = $("#newpass").val();
                  if(newpassword==newrepassword){
                    $("#newrepassid").text("pass");
                    newrepass = true;

                  }else{
                    $("#newrepassid").text("Password inconsisplease input password");
                    newrepass = false;
                  }
                
              });

              
              
            });

            function demo(){
                  if(oldpass & newpass & newrepass){
                      return true;
                  }else{
                      return false;
                  }
              }

            </script>
    </body>
</html>