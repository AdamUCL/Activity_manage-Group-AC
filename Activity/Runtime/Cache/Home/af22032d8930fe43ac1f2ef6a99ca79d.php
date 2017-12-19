<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>X-admin v1.0</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/activity_manage/Public/X-admin/css/x-admin.css" media="all">
    </head>
    
    <body>
        <div class="x-body">

            <form class="layui-form" method="post" action="" >
                <input type="hidden" name="id" id="activity_id" value="<?php echo ($list['activity_id']); ?>" >
                <input type="hidden" name="id" id="user_id" value="<?php echo ($list['user_id']); ?>" >
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Name</label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($list['name']); ?>">
                    </div>
                </div>
                <br>
				<label for="username" class="layui-form-label">Score</label>
                <div class="layui-input-inline" style="width:190px;text-align: left">
                    <select id="score" name="score" lay-verify="required">
                        <option value='' >--Please choose--</option>
						 <option value='1' >One star</option>
						 <option value='2' >Two star</option>
						 <option value='3' >Three star</option>
						 <option value='4' >Four star</option>
						 <option value='4' >Five star</option>			 
                    </select>    
                </div>

				
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label"></label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">Edit</button>
                </div>
            </form>

        </div>
        <script src="/activity_manage/Public/X-admin/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/activity_manage/Public/X-admin/js/x-layui.js" charset="utf-8">
        </script>
        <script>

            layui.use(['form','layer'], function(){
              $ = layui.jquery;
              var form = layui.form();
              layer = layui.layer;
              // monitor send
              form.on('submit(add)', function(data){             
               var params={
                        	user_id:$("#user_id").val(),
                            activity_id:$("#activity_id").val(),
                            score:$("#score").val(),
                            name:$("#name").val(),
                            type:1,
                    }
                console.log(params);
                $.post('/activity_manage/index.php/Home/Homenotice/addscore',{params:params},function(data){
                     // console.log(data);
                     // alert(111);
                    if(data=="success"){
                        // alert('edit success');
                    }else{
                        // alert('edit error');
                        return false;
                    }

                     layer.alert("score success",{icon:6},function () {
                                // get frame index
                                var index = parent.layer.getFrameIndex(window.name);
                                //close current frame
                                parent.layer.close(index);
                                parent.reload();
                             });
                                return false;
                });
              });
            }); 
        </script>
    </body>

</html>