#!/bin/bash
if [ "$1" = "encender" ]
then
echo 1 > /sys/class/gpio/gpio17/value
elif [ "$1" = "apagar" ]
then
echo 0 > /sys/class/gpio/gpio17/value
fi

