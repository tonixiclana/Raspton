#!/bin/bash

#exportamos pin4 como in para el sensor de movimiento
echo 4 > /sys/class/gpio/export
echo in > /sys/class/gpio/gpio4/direction

#ESTOS PINES SE ENCUENTRAN COMENTADOS PORQUE SE ESTÁ UTILIZANDO CONEXION SE$
#exportamos pin4 como out
#echo 4 > /sys/class/gpio/export
#echo out > /sys/class/gpio/gpio4/direction

#exportamos pin17 como out
#echo 17 > /sys/class/gpio/export
#echo out > /sys/class/gpio/gpio17/direction

#exportamos pin18 como out
#echo 18 > /sys/class/gpio/export
#echo out > /sys/class/gpio/gpio18/direction

#exportamos pin27 como out
#echo 27 > /sys/class/gpio/export
#echo out > /sys/class/gpio/gpio27/direction

#exportamos pin22 sin dirección
#echo 22 > /sys/class/gpio/export

#exportamos pin23 sin dirección
#echo 23 > /sys/class/gpio/export


