<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>user basic information</title>
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
             <a class="layui-btn layui-btn-small" href="/activity_manage/index.php/Home/Obtain/Excels">Download</a>
        </div>
      	<xblock style="height:40px" >
   <!--      <form style="float:right;" class="layui-form" action="/activity_manage/index.php/Home/Obtain/classobtain" method="get">
	        <div class="layui-input-inline" style="width:180px">
		        
		  	  </div>
		  	  <button class="layui-btn" type="submit" lay-filter="formDemo"><i class="layui-icon" style="font-size: 20px;" >&#xe615;</i>search</button>
        	</form> -->
        </xblock>

        <div class="layui-tab">
			<div class="layui-tab-content">
				<div class="layui-tab-item layui-show">
        
					<table class="layui-table">
					  <colgroup>
					    <col width="10%">
					    <col width="10%">
					    <col width="15%">
					    <col width="20%">
					    <col width="20%">
              <col width="15%">
              <col width="10%">
              <col width="15%">
					  </colgroup>
					  <thead>
					    <tr>
					      <th>Id</th>
					      <th>Username</th>
					      <th>Phone</th>
                <th>Activity name</th>
                <th>Activity type</th>
                <th>Activity address</th>
                <th>Sign code</th>
					      <th>Status</th>
					      <th>Operation</th>
					    </tr> 
					  </thead>
					  <tbody>
		            <form class="layui-form" action="" method="post">
		              <?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>
      					      <td><?php echo ($row['enter_id']); ?></td>
      					      <td><?php echo ($row['username']); ?></td>
      					      <td><?php echo ($row['user_phone']); ?></td>
      					      <td><?php echo ($row['name']); ?></td>
                      <td><?php echo ($row['type_name']); ?></td>
                      <td><?php echo ($row['activity_address']); ?></td>
                      <td><?php echo ($row['code']); ?></td>
                      <td><?php echo ($row['msg']); ?></td>
      					      <td class="td-manage">
      		              
                        <a title="pass" href="javascript:;" onclick="admin_pass(this,<?php echo ($row['enter_id']); ?>)" style="text-decoration:none"><i style="font-size: 30px; color: #5FB878;" class="layui-icon">&#xe627;</i></a>
                        <a title="score" href="javascript:;" onclick="admin_edit('SEND EMAIL','/activity_manage/index.php/Home/Homenotice/sendemail/id/<?php echo ($row['enter_id']); ?>','4','','510')" class="ml-5" style="text-decoration:none" id="edit"><i style="font-size:30px; color: #5FB878;" class="layui-icon">&#xe611;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a title="delete" href="javascript:;" onclick="admin_del(this,<?php echo ($row['enter_id']); ?>)" style="text-decoration:none"><i style="font-size: 30px; color: #FF5722;" class="layui-icon">&#xe640;</i></a>
      		                   
      		            </td>
      					    </tr><?php endforeach; endif; ?>
		            </tbody>
		          </table>
					</form>
					<div class="total">Total <?php echo ($total); ?></div>
			      
			        <div id="pages"></div>
				</div>
			</div>
		</div>
	
        <script src="/activity_manage/Public/X-admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/activity_manage/Public/X-admin/js/x-layui.js" charset="utf-8"></script>
        

        <script>

             layui.use(['laydate','element','laypage','layer','form'], function(){
                $ = layui.jquery;
              laydate = layui.laydate;
              lement = layui.element();
              laypage = layui.laypage;
              layer = layui.layer;
              form = layui.form();     

             
              laypage({
                cont: 'pages',
                curr: <?php echo ($curr); ?>,
                groups: 5,
                pages: <?php echo ($page); ?>, 
                skip: true,
                jump: function(obj, first){
                  var url = window.location.href;
                  if (url.indexOf('?') < 0) {
                      url = window.location.href;
                  }else{
                      url=url.substr(0, url.indexOf('?'));
                  }
                  search="<?php echo ($search); ?>";
                  if (!first) {
                    window.location.href=url+search+"/p/"+obj.curr+".html";
                  }
                }
              }); 
              
            });
        
            function admin_add(title,url,w,h){
                x_admin_show(title,url,w,h);
            }

            function admin_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }

            function admin_del(obj,id){
                layer.confirm('Are you sure delete？',function(index){
              
                    $.post("/activity_manage/index.php/Home/Obtain/delete",{id:id},function(data){
                      if(data=="error"){
                          alert('error');
                      }else{
                        layer.msg('detele success',{icon:1,time:2000});
                      }
                    });
                });
            }

             function admin_pass(obj,id){
                layer.confirm('Are you sure Pass？',function(index){
                
                    $.post("/activity_manage/index.php/Home/Obtain/passenter",{id:id},function(data){
                      if(data=="error"){
                          alert('error');
                      }else{
                         layer.msg('pass success',{icon:1,time:2000});
                      }
                    });
                });
            }

            function send_email(){
              layer.confirm('Are you sure send email？',function(index){
      
                      layer.msg('send success',{icon:1,time:2000});              
                });
            }
            </script>
            <script>
                function reload(){
                  location.replace(location.href);
                }
            </script>
    </body>
</html>