#!/bin/bash

if [ "$1" = "up" ]
then
python /home/pi/gpioscripts/arduino.py MUP
elif [ "$1" = "down" ]
then 
python /home/pi/gpioscripts/arduino.py MDO
elif [ "$1" = "off" ]
then
python /home/pi/gpioscripts/arduino.py MOF
fi
