<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Feedback list</title>
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
                    <label for="username" class="layui-form-label">Title</label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($list['title']); ?>" disabled>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Score</label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($list['score']); ?>-star" disabled>
                    </div>
                </div>           
                 <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Content</label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo ($list['content']); ?>" disabled>
                    </div>
                </div>
          <!--       <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label"></label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">Sign up</button>
                </div> -->
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
              // 监听提交
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