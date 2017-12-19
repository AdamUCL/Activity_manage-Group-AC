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
            <form class="layui-form" method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id">
                <div class="layui-form-item">
                <label for="username" class="layui-form-label">Attend</label>
                <div class="layui-input-inline" style="width:190px;text-align: left">
                    <select id="enter_id" name="enter_id" lay-verify="required">
                        <option value='' >--Please choose--</option>
                        <?php if($list){?>
                        <?php foreach($list as $val):?>
                          <?php  ?>
                            <option value="<?php echo $val['enter_id']?>" ><?php echo $val['activity_name']?></option>
                        <?php endforeach;?>
                        <?php }else{?>
                            <option value="<?php echo $val['id']?>" ><?php echo 'No data'?></option>
                        <?php }?>

                    </select>    
                </div>
                </div>
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Title</label>
                    <div class="layui-input-inline">
                        <input type="text" id="title" name="title" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <label for="username" class="layui-form-label">Score</label>
                <div class="layui-input-inline" style="width:190px;text-align: left">
                    <select id="score" name="score" lay-verify="required">
                        <option value='' >--Please choose--</option>
                         <option value='1' >One star</option>
                         <option value='2' >Two star</option>
                         <option value='3' >Three star</option>
                         <option value='4' >Four star</option>
                         <option value='5' >Five star</option>           
                    </select>    
                </div>   
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Content</label>
                    <div class="layui-input-block">
                      <textarea name="content" id="content" rows="10" class="layui-textarea" required="" lay-verify="required" autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label"></label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="">Add</button>
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
                form.on('submit(add)', function(data){
                        var params={
                            enter_id:$("#enter_id").val(),
                            title:$("#title").val(),
                            content:$("#content").val(),
                            score:$("#score").val(),
                        }
                        $.post('/activity_manage/index.php/Home/Assess/insert',{params:params},function(data){                      
                            if(data=="success"){
                                // layer.msg('add success',{icon:1,time:2000});
                                // var a=6;
                            }else if(data=='error'){
                                alert('error');
                                return false;
                                // var a=2;
                            }else if(data=='reset'){
                                // var a=2;
                                 alert("You've already commented");
                                 return false;
                            }
                               
                      });

                        layer.alert('add success',{icon:6},function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                                parent.reload();
                             });
                        return false;
                    });

                 
                
          }); 
        </script>
    </body>

</html>