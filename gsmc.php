<?php
error_reporting(0); // 关闭所有报错
include("config.php");
$fb_xiao2 = exec(' sudo cat /opt/ethos/etc/message.txt  | grep 通知 ');
$fb_xiao3 = exec(' sudo cat /opt/ethos/etc/message.txt  | grep 消息 ');
$fb_gsmc = exec(' sudo cat /opt/miners/.bz/gsmc.txt ');
$SN = exec('  head -n 2 /tmp/oraysl.status  | tail -n 1 | cut -d= -f2- ');
$status = exec('  head -n 3 /tmp/oraysl.status  | tail -n 1 | cut -d= -f2- ');

$p = $_POST;
getConf();

if ( isset($p['act']) && $p['act'] == 'save' ){
    unset($p['lang'], $p['act']);
    $CONFIG = $p;
    $errmsg = "自定义信息已经提交完成! ";
    writeConf($CONFIG);
    getConf();
    file_put_contents('/opt/miners/.bz/gsmc.txt',$CONFIG->proxy_name);

}

include("header.php");

?>
    <link rel="stylesheet" href="/css/bs-datetimepicker/bootstrap-datetimepicker.min.css">
    <aside class="right-side">


        <!-- Main content -->
        <section class="content container-fluid">

        <form action="" method="post" class="form-horizontal">


         <section class="panel"  >
         <header class="panel-heading">
               <?php echo $fb_xiao2?><br /><br /><?php echo $fb_xiao3?><br /><br />♦系统时间: &nbsp;<?php echo date('Y-m-d h:i')?><br /><br />♦远程账号:<?php echo $SN?>&nbsp;&nbsp;&nbsp;状态:<?php echo $status?>&nbsp;&nbsp;&nbsp;<a href='https://b.oray.com' target=\"_blank\" >&nbsp;&nbsp;远程后台设置入口</a><br /><br />♦机器名称:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<?php echo $host_name ?>)
         </header>

                                <div class="panel-body">

                                <div class="form-group"id="main_worker" style="display">
                                    <label class="col-sm-2 col-sm-2 control-label">修改自定义发行信息</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="proxy_name" name="proxy_name" class="form-control" placeholder="此处输入开机LOGO信息">
                                     <span class="help-block" style="color: #a94442;">&nbsp;&nbsp;&nbsp;当前值：<?php echo $fb_gsmc?></span>

                                    </div>
                                </div>

                   </section>
                        <?php if(isset($errmsg)): ?>
                                <div class="alert alert-danger">
                                <?php echo isset($errmsg) ? $errmsg : ""; ?>
                                </div>
                        <?php endif;?>

                   <section class="panel">
                                    <div class="form-group">
                                    <div class="col-lg-offset-5 col-lg-6">
                                        <input name="lang" type="hidden" id="lang" value="en"/>
                                        <input name="act" type="hidden" id="act" value="save"/>
                                        <input type="submit" class="btn btn-primary" value=" 提交保存 " />
                                    </div>
                                </div>
                    </section>
</form>
</section>
</aside>

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