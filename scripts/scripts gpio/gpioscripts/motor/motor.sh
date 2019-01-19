#!/bin/bash

if [ "$1" = "der" ]
then
echo in > /sys/class/gpio/gpio22/direction
echo out > /sys/class/gpio/gpio23/direction
echo 1 > /sys/class/gpio/gpio23/value

elif [ "$1" = "izq" ]
then
echo out > /sys/class/gpio/gpio22/direction
echo in > /sys/class/gpio/gpio23/direction
echo 1 > /sys/class/gpio/gpio22/value

elif [ "$1" = "off" ]
then
gpio22=`cat /sys/class/gpio/gpio22/value`

	if [ $gpio22 -eq 1 ]
	then
	echo 0 > /sys/class/gpio/gpio22/value
	else
	echo 0 > /sys/class/gpio/gpio23/value
	fi

fi
