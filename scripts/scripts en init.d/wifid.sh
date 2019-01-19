#!/bin/bash
sudo ifconfig wlan0 10.0.0.1 netmask 255.255.255.0
sudo service udhcpd restart
sudo iptables -t nat -I POSTROUTING -o eth0 -s  10.0.0.0/24 -j MASQUERADE
sudo service bind9 restart
rm /tmp/cmd 
mkfifo /tmp/cmd
chown pi:pi /tmp/cmd
