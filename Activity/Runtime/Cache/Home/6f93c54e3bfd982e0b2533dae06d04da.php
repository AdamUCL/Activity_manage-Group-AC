<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>homenotice</title>
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
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="Refresh"><i class="layui-icon" style="line-height:29px"></i> <i class="layui-icon" style="line-height:30px">Refresh</i></a>
        </div>
      <xblock>
          <button class="layui-btn" onclick="admin_add('Add Feedback','/activity_manage/index.php/Home/Assess/add','600','500')"><i class="layui-icon">&#xe608;</i>Add assess</button>
          
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
					    <col>
					  </colgroup>
					  <thead>
					    <tr>
					      <th>Id</th>
                <th>User</th>
					      <th>Activity name</th>
					      <th>Title</th>
                <th>Score</th>
                <th>Content</th>
                <th>Addtime</th>
                <th>Operation</th>
					    </tr> 
					  </thead>
					  <tbody>
					  	<?php if(is_array($list)): foreach($list as $key=>$row): ?><tr>
						      <td><?php echo ($row['assess_id']); ?></td>
                  <td><?php echo ($row['username']); ?></td>
						      <td><?php echo ($row['name']); ?></td>
                  <td><?php echo ($row['title']); ?></td>
                  <td><?php echo ($row['score']); ?>-star</td>
                  <td><textarea class="layui-textarea" disabled><?php echo ($row['content']); ?></textarea></td>
                  <td><?php echo ($row['addtime']); ?></td>
						      <td class="td-manage">
                    <a title="delete" href="javascript:;" onclick="admin_del(this,'<?php echo ($row['assess_id']); ?>')" style="text-decoration:none"><i class="layui-icon" style="font-size: 30px; color: #FF5722;" >&#xe640;</i></a>
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

            layui.use(['laydate','element','laypage','layer'], function(){
                $ = layui.jquery;//jquery
  				// var form = layui.form();
              laydate = layui.laydate;
              lement = layui.element();
              laypage = layui.laypage;
              layer = layui.layer;

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

            //delete one more part
             function delAll () {
                layer.confirm('do you wanna delete？',function(index){
                    layer.msg('detele success', {icon: 1});
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
                    //delete data

                    $.post("/activity_manage/index.php/Home/Assess/delete",{id:id},function(data){
                      if(data=="error"){
                      
                      }else{
                     
                        $(obj).parents("tr").remove();
                        layer.msg('delete success!',{icon:1,time:2000});
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