<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>acticity</title>
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
      <xblock>
          <button class="layui-btn" onclick="admin_add('Add activity','/activity_manage/index.php/Home/Homenotice/add','600','500')"><i class="layui-icon">&#xe608;</i>Add activity</button>
        
      </xblock>

        <div class="layui-tab">
			<div class="layui-tab-content" style="height: 500px;">
				<div class="layui-tab-item layui-show">
					<table class="layui-table">
					  <colgroup>
					    <col width="5%">
              <col width="10%">
					    <col width="10%">
              <col width="10%">
              <col width="10%">
              <col width="10%">
              <col width="15%">
              <col width="10%">
              <col width="15%">
              <col width="10%">
              <col width="10%">
					    <col>
					  </colgroup>
					  <thead>
					    <tr>
					      <th>Id</th>
                <th>User</th>
					      <th>Type</th>
					      <th>Name</th>
					      <th>Title</th>
                <th>Pic</th>
                <th>Description</th>
                <th>Start time</th>
                <th>End time</th>
                <th>Place</th>
                <th>Ticket number</th>
                <th>Surplus</th>
                <th>Status</th>
                <th>Sign up</th>
					    </tr> 
					  </thead>
					  <tbody>
					  	<?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>
						      <td><?php echo ($row['activity_id']); ?></td>
                  <td><?php echo ($row['username']); ?></td>
						      <td><?php echo ($row['type_name']); ?></td>
						      <td><?php echo ($row['name']); ?></td>
                  <td><?php echo ($row['title']); ?></td>
                  <td><img src="/activity_manage/Public/photo/<?php echo ($row['activity_pic']); ?>" style="margin-bottom:10px;height:50px" ></td>
                  <td><textarea class="layui-textarea" disabled><?php echo ($row['descr']); ?></textarea></td>
                  <td><?php echo ($row['start_time']); ?></td>
                  <td><?php echo ($row['end_time']); ?></td>
                  <td><?php echo ($row['location']); ?></td>
                  <td><?php echo ($row['over']); ?></td>
                  <td><?php echo ($row['remark']); ?>/<?php echo ($row['over']); ?></td>
                  <td><?php echo ($row['status']); ?></td>
						      <td class="td-manage">
                        <a title="edit" href="javascript:;" onclick="admin_edit('EDIT ACTIVITY','/activity_manage/index.php/Home/Homenotice/edit/id/<?php echo ($row['activity_id']); ?>','4','','510')" class="ml-5" style="text-decoration:none" id="edit"><i style="font-size:30px; color: #5FB878;" class="layui-icon">&#xe642;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                   
                        <a title="delete" href="javascript:;" onclick="admin_del(this,'<?php echo ($row['activity_id']); ?>')" style="text-decoration:none"><i class="layui-icon" style="font-size: 30px; color: #FF5722;" id="delete">&#xe640;</i></a>
                 </td>   
						    </tr><?php endforeach; endif; ?>
					  </tbody>
					</table>
					<div class="total">Total <?php echo ($total); ?></div>
          <!-- page information -->
          <div id="pages"></div>
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
              

              laypage({
                cont: 'pages',
                curr: <?php echo ($curr); ?>,
                groups: 5,
                pages: <?php echo ($page); ?>,
                skip: true,
                jump: function(obj, first){
                  var url = window.location.href;
                  if (!first) {
                    window.location.href=url+"/p/"+obj.curr+".html";
                  }
                }
              });  
              
            });

            //monitor send
              form.on('submit(save)', function(data){
                console.log(data);
                //send data to php
                layer.alert("save success", {icon: 6},function () {
                    // get frame index
                    var index = parent.layer.getFrameIndex(window.name);
                    //close current frame
                    parent.layer.close(index);
                });
                return false;
              });

             function delAll () {
                layer.confirm('Do you wanna delete？',function(index){
                
                    layer.msg('delete success', {icon: 1});
                });
             }
       
            function admin_add(title,url,w,h){
                x_admin_show(title,url,w,h);
            }

            function admin_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }
       
            function admin_del(obj,id){
                layer.confirm(' are you sure delete？',function(index){
       

                    $.post("/activity_manage/index.php/Home/Homenotice/delete",{id:id},function(data){
                      if(data=="error"){
                        // alert('delete fail');
                      }else{
                        // alert('delete fail');
                        $(obj).parents("tr").remove();
                        layer.msg('delete success!',{icon:1,time:2000});
                      }
                    });
                });
            }

              function admin_sign(obj,id){
                layer.confirm(' are you sure sign up？',function(index){
                   
                     
                    $.post("/activity_manage/index.php/Home/Homenotice/sign",{id:id},function(data){
                      console.log(data);
                      if(data=="error"){
                         
                        
                        layer.msg('sign error',{icon:2,time:1000});
                      }else if(data=='reset'){
                        // alert('delete fail');
                        // $(obj).parents("tr").remove();
                        layer.msg('repeat sign',{icon:2,time:1000});
                       
                      }else{
                         layer.msg('sign success',{icon:1,time:2000});
                      }
                    });
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