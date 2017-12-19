<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Base info</title>
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
			  <div class="layui-tab-content" style="height: 640px;">
			    <div class="layui-tab-item layui-show">
			    <!-- form  change personal information -->
          <form class="layui-form" action="/activity_manage/index.php/Home/User/update" method="post" >
			    <!-- <form class="layui-form" action="" method="post" > -->
			    	<input type="hidden" id="ids" name="id" value="<?php echo ($list['user_id']); ?>" >
			    	<table class="layui-table" lay-skin="nob">
					  <colgroup>
					    <col width="20%">
					    <col width="30%">
					    <col width="20%">
					    <col width="30%">
					  </colgroup>
					  <tbody>
					    <tr>
					      <td>Gender</td>
					      <td>
					      	<div class="layui-form-item">
					            <input type="radio" name="sex" value="1" title="M" disabled <?php if($list['sex'] == 1): ?>checked<?php endif; ?> >
					            <input type="radio" name="sex" value="0" title="F" disabled <?php if($list['sex'] == 0): ?>checked<?php endif; ?> >
					        </div>
					      </td>
					    </tr>
					    <tr>
					      <td>Realname</td>
                <td><input type="text" name="realname" value="<?php echo ($list['realname']); ?>" disabled class="layui-input"></td>
					      <td>Username</td>
					      <td><input type="text" name="username" value="<?php echo ($list['username']); ?>"  class="layui-input"></td>
					    </tr>
					    <tr>
					      <td>E-mail</td>
					      <td><input type="text" name="email" value="<?php echo ($list['user_email']); ?>"  class="layui-input"></td>
					      <td>University</td>
					      <td><input type="text" name="university" value="<?php echo ($list['university']); ?>" class="layui-input"></td>
					    </tr>
                <tr>
                <td>Mobile Phone</td>
                <td><input type="text" name="phone" value="<?php echo ($list['user_phone']); ?>" class="layui-input"  ></td>
                <td>Address</td>
                <td><input type="text" name="address" value="<?php echo ($list['user_address']); ?>"  class="layui-input"></td>
              </tr>
					    <tr>
					    	<td>
					    		<button class="layui-btn" lay-submit lay-filter="add" type="submit">Edit</button>&nbsp;&nbsp;<span style="color:#9f9f9f;font-size:12px" >(*Click for information modification)</span>
					    	</td>
              </tr>
            </tbody>
          </table>
          </form>
                  
					
			    </div>
			  </div>
			</div>
           

        </div>
        <script src="/activity_manage/Public/X-admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/activity_manage/Public/X-admin/js/x-layui.js" charset="utf-8"></script>

        <script>

            layui.use(['laydate','element','laypage','layer','form'], function(){
                $ = layui.jquery;//jquery
  				// var form = layui.form();
              laydate = layui.laydate;
              lement = layui.element();
              laypage = layui.laypage;
              layer = layui.layer;
              form = layui.form();
              

            
              // status=0;
              form.on('submit(add)', function(data){
                // if (status == 0) {
                    // $("input").removeAttr("disabled");
                    // $("select").removeAttr("disabled");
                    // $("button").html("add");
                     // status=1;
                     // form.render();
                     // form.render('radio');
                     // form.render('checkbox');
                    // return false;
                // }else{
                    id = $("input[name='ids']").val();
                    sex = $("input[name='sex'").val();
                    username = $("input[name='username'").val();
                    address = $("input[name='address'").val();
                    phone = $("input[name='phone'").val();
                    email = $("input[name='email'").val();
                    university = $("input[name='university'").val();
                    $.post('/activity_manage/index.php/Home/User/insert',{id:id,sex:sex,username:username,address:address,phone:phone,email:email, university: university},function(data){
                        if(data=="success"){
                            // alert("数据增加成功");
                        }else{
                            alert('error');
                            return false;
                        }
                    });
                    // layer.alert("update success", {icon: 6,name:2000},function () {
               
                    //     var index = parent.layer.getFrameIndex(window.name);
                 
                    //     parent.layer.close(index);
                    //     parent.reload();
                    // });

                    $("input").addAttr("disabled");
                    $("button").html("Edit");
                    status=0;
                    return true;
                // }
               
            });

              form.on('switch(filter)', function(data){
                  if(data.elem.checked){
                      
                      $("form input").removeAttr("disabled");
                      
                      $("form select").removeAttr("disabled");
                      form.render();
                  }else{
                      $("form input").attr("disabled",true);
                      $("form select").attr("disabled",true);
                  }
              }); 


              laypage({
                cont: 'page'
                ,pages: 100
                ,first: 1
                ,last: 100
                ,prev: '<em><</em>'
                ,next: '<em>></em>'
              }); 
              
              var start = {
                min: laydate.now()
                ,max: '2099-06-16 23:59:59'
                ,istoday: false
                ,choose: function(datas){
                  end.min = datas; 
                  end.start = datas
                }
              };
              
              var end = {
                min: laydate.now()
                ,max: '2099-06-16 23:59:59'
                ,istoday: false
                ,choose: function(datas){
                  start.max = datas; 
                }
              };
              
              document.getElementById('LAY_demorange_s').onclick = function(){
                start.elem = this;
                laydate(start);
              }
              document.getElementById('LAY_demorange_e').onclick = function(){
                end.elem = this
                laydate(end);
              }
              
            });

            //delete one or more information
             function delAll () {
                layer.confirm('Do you wanna delete？',function(index){
                    //select captured data, delet date
                    layer.msg('delete success', {icon: 1});
                });
             }
          
            function admin_add(title,url,w,h){
                x_admin_show(title,url,w,h);
            }

            function admin_stop(obj,id){
                layer.confirm('Do you wanna stop？',function(index){
        
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_start(this,id)" href="javascript:;" title="start"><i class="layui-icon">&#xe62f;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span>');
                    $(obj).remove();
                    layer.msg('stopped!',{icon: 5,time:1000});
                });
            }

            /*initiation*/
            function admin_start(obj,id){
                layer.confirm('Do you wanna start？',function(index){
                    //c
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_stop(this,id)" href="javascript:;" title="stop"><i class="layui-icon">&#xe601;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>');
                    $(obj).remove();
                    layer.msg('started!',{icon: 6,time:1000});
                });
            }
            //modification
            function admin_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }
            /*delet*/
            function admin_del(obj,id){
                layer.confirm('Do you wanna delete？',function(index){
                    
                    $(obj).parents("tr").remove();
                    layer.msg('deleted!',{icon:1,time:1000});
                });
            }
            </script>
            <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>
</html>