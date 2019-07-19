#!/bin/bash
#

if [ "$1" == "install" ] 
    then
    cp -rf /home/ethos/kmg/rig_restarter.sh /home/ethos/rig_restarter.sh
    chmod 775 /home/ethos/rig_restarter.sh
    crontab jobkmg.txt
    echo
     echo "安装成功，请重启机器生效！"	
elif [ "$1" == "uninstall" ]
      then
      crontab -r 
      rm -rf /home/ethos/rig_restarter.sh
      echo
      echo "卸载成功，请重新启动机器生效！"     
elif [ "$1" == " " ] ||  [ "$1" != " " ]
      then
      echo
      echo '错误：请用参数[install] 或者[uninstall]运行此程序!'

fi
exit 0
