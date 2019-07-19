<?php
$stats_arr = json_decode(file_get_contents("/var/run/ethos/stats.json"),1); // 机器状态json文件
$fb_xiao1 = exec(' sudo cat /opt/ethos/etc/message.txt  | head -1 ');
$fb_xiao2 = exec(' sudo cat /opt/ethos/etc/message.txt  | grep 通知 ');
$fb_xiao3 = exec(' sudo cat /opt/ethos/etc/message.txt  | grep 消息 ');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($stats_arr['rack_loc']) ? $stats_arr['rack_loc'] : $stats_arr['hostname'] ; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico">
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css"/>
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css"/>
    <!-- Date Picker -->
    <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css"/>
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/all.css" rel="stylesheet" type="text/css"/>
    <link href='css/lato.css' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="css/style.css" rel="stylesheet" type="text/css"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        /* 小屏幕（平板，大于等于 768px） */
        @media (min-width: @screen-sm-min) {
            #nav-hidden {
                display: none;
            }
        }

        @media screen and (max-width: 992px){
            .header {
                margin-bottom: 90px;
            }
            #nav-hidden{
                height: 130px;
            }
        }


        @media only screen and (max-width: 1200px) {
            #main_card {
                text-align: center;
            }
            #vice_card {
                text-align: center;
            }
        }

        .right-side .container-fluid .fan_img {
            width: 25px;
            height: 20px;
        }
        .right-side .container-fluid .gpu_img{
            text-align: center;
        }
        .right-side .container-fluid .fan_img_div{
            text-align: center;
        }
        /*.right-side .container-fluid .gpu_info {
            padding-left: 0px;
        }*/
        .right-side .container-fluid .drop_left_pad {
            padding-left: 0px;
            padding-right: 0px;
        }
    </style>
</head>
<body class="skin-black">

<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="index.php" class="logo">
        <?php echo isset($stats_arr['rack_loc']) ? $stats_arr['rack_loc'] : $stats_arr['hostname'] ; 

exec("cat  /opt/teamviewer/config/global.conf |grep 'ClientID ='|awk -F ' ' '{print $4 }'",$teamviewerid);
exec("/sbin/ifconfig eth0 |grep 'inet'|tr -s ':' ' '|awk '{print $3}'",$lanip);
exec("cat /var/run/ethos/panel.file ",$panel);
?>
    </a>
    <nav style="display: block;" id="nav-hidden" class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"><nspan>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

       <!-- <span style="display: inline-block;margin: 13px 0 0 20px;">时间：<?php echo date('Y-m-d h:i')?> &nbsp;&nbsp;&nbsp;&nbsp;已运行：<span id="m_run_time"></span></span>       
     <a href='wkgsm.html'>&nbsp;&nbsp;自定义信息</a> &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;TVID&nbsp;<?php echo $teamviewerid[0] ?>&nbsp;&nbsp;&nbsp;<?php echo $fb_xiao1?><p class="pull-right" style="margin: 12px 30px 0 0">
-->
<span style="display: inline-block;margin: 13px 0 0 20px;"><?php echo $fb_xiao1?> &nbsp;&nbsp; &nbsp; &nbsp;TVID:&nbsp;<?php echo $teamviewerid[0] ?></span>
 <p class="pull-right" style="margin: 12px 30px 0 0">
            <a href="javascript:;" onclick="if(confirm('是否确认初始化？')){window.location.href='/action.php?a=minestop'}" class="btn btn-success" style="margin-left: 50px;">初始化挖矿</a>

<!--            <a href="javascript:;" onclick="if(confirm('是否确认开启挖矿？')){window.location.href='/action.php?a=minestart'}" class="btn btn-success" style="margin-left: 50px;">开启挖矿</a>
            <a href="javascript:;" onclick="if(confirm('是否确认关闭挖矿？')){window.location.href='/action.php?a=disallow'}" class="btn btn-warning">关闭挖矿</a> -->
            <a href="javascript:;" onclick="if(confirm('是否确认关机？')){window.location.href='/action.php?a=shutdown'}" class="btn btn-primary">关机</a>
            <a href="javascript:;" onclick="if(confirm('是否确认重启？')){window.location.href='/action.php?a=reboot'}" class="btn btn-danger">重启</a>
        </p>
    </nav>
</header>
<script type="text/javascript">
    // 机器运行时间
    var run_time = <?php echo $stats_arr['uptime'];?>;
    setInterval(function () {
        run_time = run_time + 1;
        var stamp_run_time = timeStamp(run_time);
        $('#m_run_time').html(stamp_run_time);
    }, 1000);

    function timeStamp( second_time ){

        var time = parseInt(second_time) + "秒";
        if( parseInt(second_time )> 60){

            var second = parseInt(second_time) % 60;
            var min = parseInt(second_time / 60);
            time = min + "分" + second + "秒";

            if( min > 60 ){
                min = parseInt(second_time / 60) % 60;
                var hour = parseInt( parseInt(second_time / 60) /60 );
                time = hour + "小时" + min + "分" + second + "秒";

                if( hour > 24 ){
                    hour = parseInt( parseInt(second_time / 60) /60 ) % 24;
                    var day = parseInt( parseInt( parseInt(second_time / 60) /60 ) / 24 );
                    time = day + "天" + hour + "小时" + min + "分" + second + "秒";
                }
            }


        }

        return time;
    }
</script>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <?php
            $host_name = exec("hostname");
//            $host_name = substr(md5($host_name), 8, 16);
            ?>

            <ul class="sidebar-menu">
                <li <?php
                    if($_SERVER['SCRIPT_NAME']=="/index.php")
                    {

                        echo ' class="active" ';
                    } ?>
                >
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i> <span>矿机状态</span>
                    </a>
                </li>
                <li
                    <?php
                    if($_SERVER['SCRIPT_NAME']=="/setup.php")
                    {

                        echo ' class="active" ';
                    } ?>
                >
<!--                    <a href="wk01.html">
                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"> </span><span>设置BTM钱包</span>
                    </a>

                    <a href="wkbcd.html">
                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"> </span><span>设置BCD钱包</span>
                    </a> -->

                    <a href="setup.php">
                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"> </span><span>挖矿设置</span>
                    </a>

                </li>

                <li>
                    <a target="_blank" href="http://<?php echo $lanip[0] ?>:8090">
                        <span class="glyphicon glyphicon-align-justify" aria-hidden="true"> </span><span>命令窗口</span>
                    </a>
                </li>
<!--          
   <li>
                    <a href="software.php">
                        <span class="glyphicon glyphicon-flag" aria-hidden="true"> </span><span>版本更新</span>
                    </a>
                </li>
--> 

<!--                <li>
                    <a target="_blank" href="http://<?php echo $lanip[0] ?>:9009">
                        <span class="glyphicon glyphicon-align-justify" aria-hidden="true"> </span><span>挖矿监控</span>
                    </a>
                </li>-->
              
            <!--    <li>
                    <a target="_blank" href="http://<?php echo $lanip[0] ?>:16666">
                        <span class="glyphicon glyphicon-align-justify" aria-hidden="true"> </span><span>AE币 监控</span>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://<?php echo $lanip[0] ?>:3333">
                        <span class="glyphicon glyphicon-align-justify" aria-hidden="true"> </span><span>Grin币 监控</span>
                    </a>
                </li>
 
--> 

                <!-- <li>
                    <a href="https://rigstat.online/<?php echo $panel[0] ?>/" target="_blank">
                        <span class="glyphicon glyphicon-th-large" aria-hidden="true"> </span><span>矿机监控</span>
                    </a>
                </li>-->
                 <li
                    <?php
                    if($_SERVER['SCRIPT_NAME']=="/gsmc.php")
                    {

                        echo ' class="active" ';
                    } ?>
                >

                    <a href="gsmc.php">
                        <span class="glyphicon glyphicon-th-large" aria-hidden="true"> </span><span>定义信息</span>
                    </a>
                </li>
                 <li
                    <?php
                    if($_SERVER['SCRIPT_NAME']=="/xgmm.php")
                    {

                        echo ' class="active" ';
                    } ?>
                >

                    <a href="xgmm.php">
                        <span class="glyphicon glyphicon-th-large" aria-hidden="true"> </span><span>修改密码</span>
                    </a>
                </li>
                 <li
                    <?php
                    if($_SERVER['SCRIPT_NAME']=="/runlog.php")
                    {

                        echo ' class="active" ';
                    } ?>
                >

                    <a href="runlog.php">
                        <span class="glyphicon glyphicon-th-large" aria-hidden="true"> </span><span>重启日志</span>
                    </a>
                </li>


                <!--                <li>
                    <a href="bois.php">
                        <span class="glyphicon glyphicon-bold" aria-hidden="true"> </span><span>BOIS</span>
                    </a>
                </li>
                <li>
                    <a href="manual.php">
                        <span class="glyphicon glyphicon-book" aria-hidden="true"> </span><span>手册</span>
                    </a>
                </li>
            <li>
                    <a href="update_log.php">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"> </span><span>更新日志</span>
                    </a>
                </li>
-->
                </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
