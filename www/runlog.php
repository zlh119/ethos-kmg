<?php

error_reporting(0); // 关闭所有报错
$fb_xiao2 = exec(' sudo cat /opt/ethos/etc/message.txt  | grep 通知 ');
$fb_xiao3 = exec(' sudo cat /opt/ethos/etc/message.txt  | grep 消息 ');
include("header.php");
?>

    <link rel="stylesheet" href="/css/bs-datetimepicker/bootstrap-datetimepicker.min.css">
    <aside class="right-side">

        <!-- Main content -->
        <section class="content container-fluid">

        <form action="" method="post" class="form-horizontal">


         <section class="panel"  >
         <header class="panel-heading">
               <?php echo $fb_xiao2?><br /><br /><?php echo $fb_xiao3?><br /><br />♦系统时间: &nbsp;<?php echo date('Y-m-d h:i')?><br /><br />♦机器名称:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<?php echo $host_name ?>)
         </header>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>系统重启日志</title>
</head>
<body>
<h3>重启信息 仅供参考</h3>
<h4></h4>
<?php

    //打开文件,（只读模式+二进制模式）
    @$fp=fopen("/home/ethos/cron.log",'rb');
    flock($fp,LOCK_SH);
    if(!$fp){
        echo "<p><strong>日志没有产生，请稍后再试</strong></p>";
        exit;
    }
    while(!feof($fp)){
        $order=fgets($fp,999);
        echo $order."<br/>";
    }
    //释放已有的锁定
    flock($fp,LOCK_UN);
    //关闭文件流
    fclose($fp);
?>
 
</body>
</html>
<!-- jQuery 2.0.2 -->
<script src="js/jquery.min.js" type="text/javascript"></script>

<!-- jQuery UI 1.10.3 -->
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="js/plugins/bs-datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- calendar -->
<script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

<!-- Director App -->
<script src="js/Director/app.js" type="text/javascript"></script>

<!-- 引入 echarts.js -->
<script src="js/echarts.min.js"></script>
<script>
            $('#main_worker').fadeIn('show'); // 显示变量

</script>