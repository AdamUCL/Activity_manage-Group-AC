<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Management</title>
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
                <form style="float:right;" class="layui-form" action="/activity_manage/index.php/Home/Homenotice/index" method="get">
                      <div class="layui-input-inline" >
                        <select id="type_id" name="type_id">
                          <option value='' >--Please choose--</option>
                            <?php if($lists){?>
                            <?php foreach($lists as $val):?>
                              <?php  ?>
                                <option value="<?php echo $val['type_id']?>" ><?php echo $val['type_name']?></option>
                            <?php endforeach;?>
                            <?php }else{?>
                                <option value="<?php echo $val['id']?>" ><?php echo 'No data'?></option>
                            <?php }?>
                      </select>    
                    </div>
                    <div class="layui-input-inline">
                        <div class="layui-input-inline">
                            <input type="datetime-local" name="start_time" placeholder="start time" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                      ~
                    <div class="layui-input-inline">
                        <div class="layui-input-inline">
                            <input type="datetime-local" name="end_time" placeholder="end time" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <button class="layui-btn" type="submit" lay-filter="formDemo"><i class="layui-icon" style="font-size: 20px;" >&#xe615;</i>Search</button>

                </form>
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
                <th>Operation</th>
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
                     
                       <a title="sign up" href="javascript:;" onclick="admin_sign(this,'<?php echo ($row['activity_id']); ?>')" style="text-decoration:none"><i class="layui-icon" style="font-size: 30px; color: #5FB878;" >&#xe608;</i></a>
                     
                 </td>   
						    </tr><?php endforeach; endif; ?>
					  </tbody>
					</table>
					<div class="total">Total <?php echo ($total); ?></div>
          <!-- 分页信息 -->
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
                //发异步，把数据提交给php
                layer.alert("保存成功", {icon: 6},function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
                return false;
              });

            //delete one more data
             function delAll () {
                layer.confirm('Do you want to delete？',function(index){
                    //get all capture information，delete information
                    layer.msg('Delete success', {icon: 1});
                });
             }
              
            function admin_add(title,url,w,h){
                x_admin_show(title,url,w,h);
            }
            //modification
            function admin_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }
          
            function admin_del(obj,id){
                layer.confirm('Do you want to delete？',function(index){
                    //delete data

                    $.post("/activity_manage/index.php/Home/Homenotice/delete",{id:id},function(data){
                      if(data=="error"){
                        // alert('Delete fail');
                      }else{
                        // alert('Delete fail');
                        $(obj).parents("tr").remove();
                        layer.msg('delete success!',{icon:1,time:2000});
                      }
                    });
                });
            }

              function admin_sign(obj,id){
                layer.confirm(' are you sure sign up？',function(index){
                    //delete data
                     
                    $.post("/activity_manage/index.php/Home/Homenotice/sign",{id:id},function(data){
                      console.log(data);
                      if(data=="error"){
                         
                        
                        layer.msg('sign error',{icon:2,time:1000});
                      }else if(data=='reset'){
                        // alert('Delete fail');
                        // $(obj).parents("tr").remove();
                        layer.msg('repeat sign',{icon:2,time:1000});
                       
                      }else if(data=='sss'){
                         layer.msg("Can't sign up for your own activities",{icon:2,time:1000});
                        
                      }else if(data=='total'){
                         layer.msg('sign sss',{icon:2,time:2000});
                      }else if(data=='aaa'){
                         layer.msg('sign aaa',{icon:2,time:2000});
                      }else if(data=='kkk'){
                          layer.msg('The registration time has passed',{icon:2,time:2000});
                      }else if(data=='success'){
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