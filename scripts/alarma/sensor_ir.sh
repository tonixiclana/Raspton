#!/bin/bash
echo 1 > /home/pi/alarma/interruptor
interruptor=1
contador=0
while [ $interruptor -eq 1 ]
do
interruptor=`cat /home/pi/alarma/interruptor`
echo $interruptor
#analizamos el estado del sensor
sensor=`cat /sys/class/gpio/gpio4/value`
# si el sensor esta detectando activamos la alarma sonara durante 3 minutos

if [ $contador -eq 0 ]
then

if [ $sensor -eq 1 ]
then
omxplayer /home/pi/alarma/alarma.mp3 </tmp/cmd | 2>/dev/null &
echo -n . >/tmp/cmd &
sleep 2
echo -n + >/tmp/cmd &
sleep 1
echo -n + >/tmp/cmd &
sleep 2
echo -n + >/tmp/cmd &
contador=1
fi

fi

done
echo -n q >/tmp/cmd
