#!/bin/bash
echo
echo  "ClayMore远控软件升级向导"
echo
read -t 50 -n1 -p "请确认要升级ClayMore [Y/N]?" answer
echo
if [ "$answer" == "y" -o "$answer" == "Y" ]
then
echo
disallow
minestop
# sudo killall miner
rm -rf /opt/miners/claymore/Data3.bin
rm -rf /opt/miners/claymore/Datapack.bin
rm -rf /opt/miners/claymore/History.txt
rm -rf /opt/miners/claymore/Readme!!!.txt

wget https://github.com/zlh119/ethos-kmg/blob/master/claymore/Data3.bin -O /opt/miners/claymore/Data3.bin
wget https://github.com/zlh119/ethos-kmg/blob/master/claymore/Datapack.bin -O /opt/miners/claymore/Datapack.bin
wget https://github.com/zlh119/ethos-kmg/blob/master/claymore/History.txt -O /opt/miners/claymore/History.txt
wget https://github.com/zlh119/ethos-kmg/blob/master/claymore/Readme!!!.txt -O /opt/miners/claymore/Readme!!!.txt

cd /opt/miners/claymore
sudo chmod 755 /opt/miners/claymore/Data3.bin
sudo chmod 755 /opt/miners/claymore/Datapack.bin
sudo chmod 755 /opt/miners/claymore/Readme!!!.txt
sudo chmod 755 /opt/miners/claymore/History.txt
sudo allow &
echo  "升级完成，请重启机器完成最后的设置!!!"
echo
else
echo  "退出向导，想要继续重新升级请在次运行本程序"
fi
