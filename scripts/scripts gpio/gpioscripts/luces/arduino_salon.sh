#!/bin/bash

if [ "$1" = "encender" ]
then
python /home/pi/gpioscripts/arduino.py H12
echo 1 > /home/pi/gpioscripts/luces/estado_salon
elif [ "$1" = "apagar" ]
then 
python /home/pi/gpioscripts/arduino.py L12
echo 0 > /home/pi/gpioscripts/luces/estado_salon
fi

