<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Background login</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="/activity_manage/Public/X-admin/favicon.ico" type="image/x-icon" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/activity_manage/Public/X-admin/css/x-admin.css" media="all">
        <link rel="stylesheet" href="/activity_manage/Public/X-admin/bs/css/bootstrap.min.css">
        <script src="/activity_manage/Public/X-admin/bs/js/jquery.min.js"></script>
        <script src="/activity_manage/Public/X-admin/bs/js/bootstrap.min.js"></script>
        <script src="/activity_manage/Public/X-admin/bs/js/holder.min.js"></script>
    </head>
    
    <body style="background-color: #393D49">
        <div class="x-box">
            <div class="x-top">
                <i class="layui-icon x-login-close" style="color:#6F3C04">
                    <b>Admin Login !</b>
                </i>
                <ul class="x-login-right">
                    <li style="background-color: #F1C85F;" color="#F1C85F">
                    </li>
                    <li style="background-color: #EA569A;" color="#EA569A">
                    </li>
                    <li style="background-color: #393D49;" color="#393D49">
                    </li>
                </ul>
            </div>
            <div class="x-mid">
                <div class="x-avtar" style="height:80px;">
                    <img src="/activity_manage/Public/X-admin/images/ggg.jpg" alt="" style="width:80px;height:80px">
                </div>
                <div class="input">
                    <form class="form-horizontal" role="form" action="/activity_manage/index.php/Home/Login/login" method="post">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">
                                <span class="glyphicon glyphicon-user"></span>
                            </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" placeholder="username" name="name">
                        </div>
                        <span style="font-size: 12px" id="username"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">
                                <span class="glyphicon glyphicon-lock"></span>
                            </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="pass" placeholder="password" name="password">
                        </div>
                        <span style="font-size: 12px" id="password"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputVerify" class="col-sm-2 control-label">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </label>
                        <div class="col-sm-3">
                            <img class="verifyimg reloadverify" alt="Click to switch" src="/activity_manage/index.php/Home/Login/verify" onclick="this.src=this.src+='?'+Math.random()">
                        </div>
                      </div>

                      <div class="form-group">
                            <label for="inputVerify" class="col-sm-2 control-label">
                                <!-- <span class="glyphicon glyphicon-pencil"></span> -->
                            </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="inputVerify" placeholder="verify code" name="verify">
                        </div>
                        <span style="font-size: 12px" id="verify"></span>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10 ">
                          <button type="submit" class="btn btn-default col-sm-6">Login</button>
        
                          <a href="/activity_manage/index.php/Home/Index/index" class="btn btn-info col-sm-3">Return</a> 
                        </div>
                          
                      </div>
                    </form>

                    <!-- <a title="Forgot password" href="javascript:;" onclick="admin_edit('Forgot password','/activity_manage/index.php/Home/Login/forget','4','','500')" class="col-sm-3 control-label col-sm-offset-8" style="text-decoration:none">Forgot password?</a> -->
                </div>
            </div>
        </div>
        <p style="color:#fff;text-align: center;">Copyright Group AC 2017 - 2018 Edu Inc.</p>
        <script src="/activity_manage/Public/X-admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/activity_manage/Public/X-admin/js/x-layui.js" charset="utf-8"></script>
        <!-- <script src="/activity_manage/Public/X-admin/js/jquery.min.js" charset="utf-8"></script> -->
            
        <script>

             layui.use(['laydate','element','laypage','layer','form'], function(){
                $ = layui.jquery;//jquery
              laydate = layui.laydate;
              lement = layui.element();
              laypage = layui.laypage;
              layer = layui.layer;
              form = layui.form();     

              
              laypage({
                cont: 'page'
                ,pages: 100
                ,first: 1
                ,last: 100
                ,prev: '<em><</em>'
                ,next: '<em>></em>'
              }); 
              
            });
            //edit
            function admin_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
                // alert("aa");
            }
            </script>
        
        <script>
        flag=1;
        flags=1;
        flagss=1;
            layui.use(['form'],
            function() {
                $ = layui.jquery;
                var form = layui.form(),
                layer = layui.layer;

                $('.x-login-right li').click(function(event) {
                    color = $(this).attr('color');
                    $('body').css('background-color', color);
                });
            });

            $("#name").focus(function(){
                $("#username").html("*Please enter your username!");
                $("#username").css('color','#666');
                flag=1;
            }).blur(function(){
                vv=$(this).val();
                if(vv==''){
                    $("#username").html("*Please enter your password!");
                    $("#username").css('color','red');
                }else{
                    // if(vv==null){
                    //     $("#username").html("*username between 4 - 18 characters!");
                    //     $("#username").css('color','red');
                    // }else{
                        $.get('/activity_manage/index.php/Home/Login/find',{name:vv},function(data){
                            // alert(data);
                            // check if disabled
                            if(data == "Disabled"){
                                $("#username").html("* This username has been disabled!");
                                $("#username").css('color','red');
                            }else{
                                // check if exist
                                if(data == 'user does not exist'){
                                    $("#username").html("* user does not exist!");
                                    $("#username").css('color','red');
                                }else{
                                    $("#username").html("* This user name can be login ^v^");
                                    $("#username").css('color','green');
                                    flag=0;
                                }
                            }
                        });
                    // }
                }
            });

            $("#pass").focus(function(){
                $("#password").html("*Please input your password!");
                $("#password").css('color','#666');
                flags=1;
            }).blur(function(){
                pp=$(this).val();
                // alert(pp);
                if(pp==''){
                    $("#password").html("*Password cannot be empty!");
                    $("#password").css('color','red');
                }else{
                    if(pp.match(/^\w{6,18}$/)==null){
                        $("#password").html("*The password is 6~18 bit character!");
                        $("#password").css('color','red');
                    }else{
                        $("#password").html("* The password format is correct ^v^");
                        $("#password").css('color','green');
                        flags=0;
                    }
                }
            });

            $("#inputVerify").focus(function(){
                $("#verify").html("*Please enter the characters you see!");
                $("#verify").css('color','#666');
                flagss=1;
            }).blur(function(){
                yy=$(this).val();
                if(yy==''){
                    $("#verify").html("*The verification code cannot be empty!");
                    $("#verify").css('color','red');
                }else{
                    $.post('/activity_manage/index.php/Home/Login/yzm',{verifys:yy},function(data){
                        // alert(data);
                        if(data==1){
                            $("#verify").html("* Validation code entered correctly ^v^");
                            $("#verify").css('color','green');
                            flagss=0;
                        }else{
                            $("#verify").html("* Incorrect input of verification code!");
                            $("#verify").css('color','red');
                        }
                    });
                }
            });

            $("form").submit(function(){
                if(flag==1 && flags==1 && flagss==1){
                    return false;//stop list sending
                }
            })
            function reload(){
                location.replace(location.href);
            }
        </script>
    </body>

</html>