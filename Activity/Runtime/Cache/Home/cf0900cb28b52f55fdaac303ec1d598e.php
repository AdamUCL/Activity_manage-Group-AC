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
                <label for="username" class="layui-form-label">Activity type</label>
                <div class="layui-input-inline" style="width:190px;text-align: left">
                    <select id="articletype" name="articletype" lay-verify="required" disabled>
                        <option value='' >--Please choose--</option>
                        <?php if($lists){?>
                        <?php foreach($lists as $val):?>
                          <?php  ?>
                            <option value="<?php echo $val['type_id']?>" <?php echo $val['type_id']==$list['type_id'] ? 'selected':''; ?>><?php echo $val['type_name']?></option>
                        <?php endforeach;?>
                        <?php }else{?>
                            <option value="<?php echo $val['id']?>" ><?php echo 'No data'?></option>
                        <?php }?>

                    </select>    
                </div>
                <br>
                 <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Name</label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($list['name']); ?>" disabled>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Pic</label>
                    <img src="/activity_manage/Public/photo/<?php echo ($list['activity_pic']); ?>" style="margin-bottom:10px;height:50px" >
                </div>

                 <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Activity title</label>
                    <div class="layui-input-inline">
                        <input type="text" id="titles" name="title" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($list['title']); ?>" disabled>
                    </div>
                </div>

                  <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Start time</label>
                    <div class="layui-input-inline">
                        <input type="datetime-local" id="start_time" name="start_time" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($list['start_time']); ?>" disabled>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">End time</label>
                    <div class="layui-input-inline">
                        <input type="datetime-local" id="end_time" name="end_time" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($list['end_time']); ?>" disabled>
                    </div>
                </div>
                 <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Place</label>
                    <div class="layui-input-inline">
                        <input type="text" id="place" name="place" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($list['location']); ?>" disabled>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Descr</label>
                    <div class="layui-input-block">
                      <textarea name="descr" id="descr" rows="10" class="layui-textarea" required="" lay-verify="required" autocomplete="off" disabled><?php echo ($list['descr']); ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label"></label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">Sign up</button>
                </div>
            </form>

        </div>
        <script src="/activity_manage/Public/X-admin/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/activity_manage/Public/X-admin/js/x-layui.js" charset="utf-8">
        </script>
        <script>

            layui.use(['form','layer','upload'], function(){
              $ = layui.jquery;
              var form = layui.form();
              layer = layui.layer;
            
              form.on('submit(add)', function(data){
                var id = $("#activity_id").val();            
                $.post('/activity_manage/index.php/Home/Homenotice/sign',{id:id},function(data){
                    if(data=="success"){
                        layer.msg('sign success',{icon:1,time:2000});
                        return false;
                    }else if(data=='reset'){
                       alert('repeat sign');
                    }else{
                        alert('error');
                        return false;
                    }
                 });
               });
            });
        </script>
    </body>

</html>