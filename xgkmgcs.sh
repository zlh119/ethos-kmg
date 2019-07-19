#!/bin/bash
#
echo
myFile1="/home/ethos/rig_restarter.sh" 
myFile2="/home/ethos/kmg/yjyx.file" 

if [ -f "$myFile1" ]  ; then 
           read -t 50 -p "请输入最小总算力值: " answer 
           [[ ${answer} =~ ^[0-9]+$ ]] && sed -i "s/^sethash=.*/sethash=$answer; /g" /home/ethos/rig_restarter.sh && echo "修改成功!" || echo "错误，请输入数字!"
fi
echo
if [ -f "$myFile2" ]  ; then 
           read -t 50 -p "请输入24小时重启上限值（建议6）: " answer2 
           [[ ${answer} =~ ^[0-9]+$ ]] && sed -i "s/^zxcs=.*/zxcs=$answer2; /g" /home/ethos/rig_restarter.sh && echo "修改成功!" || echo "错误，请输入数字!"
fi
echo
exit 0
