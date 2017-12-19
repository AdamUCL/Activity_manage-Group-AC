<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>Snail team</title>

        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="/activity_manage/Public/Admins/favicon.ico" type="image/x-icon" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/activity_manage/Public/X-admin/css/x-admin.css" media="all">
    </head>
    <body>
        <div class="layui-layout layui-layout-admin">
            <div class="layui-header header header-demo">
                <div class="layui-main">
                    <a class="logo" href="/activity_manage/index.php/Home/User/pub" >
                        <img src="/activity_manage/Public/X-admin/images/ggg.jpg" style="margin-bottom:10px;height:40px" >
                    </a>
                    <ul class="layui-nav" lay-filter="">
                      <li class="layui-nav-item"><img src="/activity_manage/Public/photo/<?php echo ($pic); ?>" height="35px" width="35px" class="layui-circle" style="border: 2px solid #A9B7B7;" width="35px" height="35px" alt=""></li>
                      <li class="layui-nav-item">
                        <a href="javascript:;"><?php echo ($username); ?></a>
                        <dl class="layui-nav-child"> <!-- second level menu -->
                          <dd><a href="/activity_manage/index.php/Home/Login/outLogin">Log out</a></dd>
                        </dl>
                      </li>
                     
                      <li class="layui-nav-item x-index"></li>
                    </ul>
                </div>
            </div>

            <div class="layui-side layui-bg-black x-side">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="side">
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe612;</i><cite>User</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/activity_manage/index.php/Home/User/basic">
                                            <cite>Essential information</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/activity_manage/index.php/Home/User/preInfo">
                                            <cite>Details information</cite>
                                        </a>
                                    </dd>
                                </dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe600;</i><cite>Activity</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/activity_manage/index.php/Home/Homenotice/index">
                                            <cite>Activity list</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/activity_manage/index.php/Home/Homenotice/myindex">
                                            <cite>My Hosting activity</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/activity_manage/index.php/Home/Homenotice/myactivity">
                                            <cite>Sign activity</cite>
                                        </a>
                                    </dd>
                                </dd>
                            </dl>
                        </li>
                        
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe62e;</i><cite>Registration</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/activity_manage/index.php/Home/Obtain/classobtain">
                                            <cite>Sign list</cite>
                                        </a>
                                    </dd>
                                </dd>
                            </dl>
                        </li>
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe611;</i><cite>Feedback</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="/activity_manage/index.php/Home/Assess/index">
                                            <cite>Feedback list</cite>
                                        </a>
                                    </dd>
                                </dd>
                            </dl>
                        </li>

			
            <div class="layui-tab layui-tab-card site-demo-title x-main" lay-filter="x-tab" lay-allowclose="true">


                <div class="x-slide_left"></div>
                <ul class="layui-tab-title">
                    <li class="layui-this">
                        My desktop
                        <i class="layui-icon layui-unselect layui-tab-close">ဆ</i>
                    </li>
                </ul>
                <div class="layui-tab-content site-demo site-demo-body">
                    <div class="layui-tab-item layui-show">
                        <iframe frameborder="0" src="/activity_manage/index.php/Home/User/index" class="x-iframe"></iframe>
                    </div>
                </div>


            </div>
            <div class="site-mobile-shade">
            </div>
        </div>
        <script src="/activity_manage/Public/X-admin/lib/layui/layui.js" charset="utf-8"></script>
        <script src="/activity_manage/Public/X-admin/js/x-admin.js"></script>
        
    </body>
</html>