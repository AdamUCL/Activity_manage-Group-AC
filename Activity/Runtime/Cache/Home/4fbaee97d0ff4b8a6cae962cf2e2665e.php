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
                <label for="username" class="layui-form-label">Activity type</label>
                <div class="layui-input-inline" style="width:190px;text-align: left">
                    <select id="articletype" name="articletype" lay-verify="required">
                        <option value='' >--Please choose--</option>
                        <?php if($list){?>
                        <?php foreach($list as $val):?>
                          <?php  ?>
                            <option value="<?php echo $val['type_id']?>" ><?php echo $val['type_name']?></option>
                        <?php endforeach;?>
                        <?php }else{?>
                            <option value="<?php echo $val['id']?>" ><?php echo 'No data'?></option>
                        <?php }?>

                    </select>    
                </div>
                </div>
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Name</label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                 <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Picture</label>
                    <div class="layui-input-inline">
                       <input type="file" id="activity_pic" name="activity_pic" class="layui-upload-file">    
                    </div>
                </div>

                 <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Activity title</label>
                    <div class="layui-input-inline">
                        <input type="text" id="titles" name="title" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Start time</label>
                    <div class="layui-input-inline">
                        <input type="datetime-local" id="start_time" name="start_time" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">End time</label>
                    <div class="layui-input-inline">
                        <input type="datetime-local" id="end_time" name="end_time" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                 <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Place</label>
                    <div class="layui-input-inline">
                        <input type="text" id="place" name="place" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                 <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Ticket number</label>
                    <div class="layui-input-inline">
                        <input type="text" id="remark" name="remark" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="username" class="layui-form-label">Description</label>
                    <div class="layui-input-block">
                      <textarea name="descr" id="descr" rows="10" class="layui-textarea" required="" lay-verify="required" autocomplete="off"></textarea>
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
            layui.use(['form','upload','layer'], function(){ 
              $ = layui.jquery;
              var form = layui.form(); 
              upload=layui.upload();
              layer = layui.layer; 
              layui.upload({
                  url: '/activity_manage/index.php/Home/Homenotice/uploadpic'
                  ,ext: 'jpg|png|gif'
                  ,before: function(input){
                    console.log('file uploading');
                  }
                  ,success: function(res){
                    console.log(res);
                    var activity_pic=res.activity_pic;
                    // alert(activity_pic);   
                form.on('submit(add)', function(data){
                        // console.log(activity_pic);
                        var params={
                            articletype:$("#articletype").val(),
                            name:$("#name").val(),
                            titles:$("#titles").val(),
                            start_time:$("#start_time").val(),
                            end_time:$("#end_time").val(),
                            place:$("#place").val(),
                            descr:$("#descr").val(),
                            remark:$("#remark").val(),
                            activity_pic:res.activity_pic
                        }
                        place=$("#place").val();
                        descr = $("#descr").val();
                        $.post('/activity_manage/index.php/Home/Homenotice/insert',{params:params,place:place,descr:descr},function(data){                            
                            if(data=="success"){

                            }else{
                                alert('error');
                                return false;
                            }
                        });
                                layer.alert("add success",{icon:6},function () {
                                // get frame index
                                var index = parent.layer.getFrameIndex(window.name);
                                //close current frame
                                parent.layer.close(index);
                                parent.reload();
                             });
                                return false;
                      }) 
                  }
              });
          }); 
        </script>
    </body>

</html>