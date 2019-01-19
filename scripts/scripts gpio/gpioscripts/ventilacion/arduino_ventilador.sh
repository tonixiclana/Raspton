#!/bin/bash

if [ "$1" = "encender" ]
then
python /home/pi/gpioscripts/arduino.py H09
echo 1 > /home/pi/gpioscripts/ventilacion/estado_ventilador
elif [ "$1" = "apagar" ]
then 
python /home/pi/gpioscripts/arduino.py L09
echo 0 > /home/pi/gpioscripts/ventilacion/estado_ventilador
fi
