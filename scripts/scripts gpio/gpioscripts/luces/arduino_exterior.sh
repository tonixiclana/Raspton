#!/bin/bash

if [ "$1" = "encender" ]
then
python /home/pi/gpioscripts/arduino.py H11
echo 1 > /home/pi/gpioscripts/luces/estado_exterior
elif [ "$1" = "apagar" ]
then 
python /home/pi/gpioscripts/arduino.py L11
echo 0 > /home/pi/gpioscripts/luces/estado_exterior
fi
