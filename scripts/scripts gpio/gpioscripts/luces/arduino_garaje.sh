#!/bin/bash

if [ "$1" = "encender" ]
then
python /home/pi/gpioscripts/arduino.py H10
echo 1 > /home/pi/gpioscripts/luces/estado_garaje
elif [ "$1" = "apagar" ]
then 
python /home/pi/gpioscripts/arduino.py L10
echo 0 > /home/pi/gpioscripts/luces/estado_garaje
fi
