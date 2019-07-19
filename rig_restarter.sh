#!/bin/bash
#
zxcs=6; 
date=$(date  "+%y%m%d")
read yjyx < /home/ethos/kmg/yjyx.file
read allow < /opt/ethos/etc/allow.file
hash=$(cat /var/run/ethos/status.file | tr -d '\r' | awk '{printf $1} '| awk -F '.' '{print $1}')
uptime=$(sed 's/\..*//' /proc/uptime)
#uptime=300
time=360;
sethash=5; 
#echo $hash  $uptime $time $sethash 

if [ $hash  = "miner" ];
then
hash=0
fi
#echo $hash
if [ $uptime -lt $time ];
then
sleep 330
hash=$(cat /var/run/ethos/status.file | tr -d '\r' | awk '{printf $1} '| awk -F '.' '{print $1}')
uptime=$(sed 's/\..*//' /proc/uptime)
fi
current_time=$(date  "+%F %H:%M")
if [ $uptime -ge $time ] && [ $sethash -gt $hash ] && [ $allow -eq "1" ]  ;
then
    read datex < /home/ethos/kmg/datex.file
    if [ $date  -eq  $datex ] && [ $yjyx -lt $zxcs ];
    then
    echo $((yjyi=yjyx+1)) > /home/ethos/kmg/yjyx.file
	miner_hashes_raw="$(tail -10 /var/run/ethos/miner_hashes.file | sort -V | tail -1)";
         echo "$current_time 详细算力:$miner_hashes_raw  总算力: $hash 低于设定值: $sethash，执行重启,成功,当天"
          sleep 6
         cd /opt/ethos/bin && ./r 1>/dev/null 2>/dev/null
    elif [ $date  -gt  $datex ];
    then
    echo "1" > /home/ethos/kmg/yjyx.file
    echo "$date" > /home/ethos/kmg/datex.file
    miner_hashes_raw="$(tail -10 /var/run/ethos/miner_hashes.file | sort -V | tail -1)";
    echo "$current_time 详细算力:$miner_hashes_raw  总算力: $hash 低于设定值: $sethash，执行重启成功,多天"
    sleep 6
    cd /opt/ethos/bin && ./r 1>/dev/null 2>/dev/null
    else
	miner_hashes_raw="$(tail -10 /var/run/ethos/miner_hashes.file | sort -V | tail -1)";
    echo "$current_time 详细算力:$miner_hashes_raw  总算力: $hash  低于设定值: $sethash 已经达到当天重启上限:( $zxcs )次!等待管理员处理？"
#   echo $datex
    fi

fi
wjsm=$(cat /home/ethos/cron.log | wc -l ) 
#echo "$wjsm"
wjzs=2000
if [ "$wjsm" -ge "$wjzs" ]
then
echo
#echo "文件执行清理!"
qlwj=$(sudo tail -2000 /home/ethos/cron.log) 
echo "$qlwj" > /home/ethos/cron.log
else
#echo  "文件无需清理!"
echo
fi