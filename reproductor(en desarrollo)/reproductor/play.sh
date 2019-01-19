#!/bin/bash

echo -n q >/tmp/cmd &
omxplayer /home/pi/musica/$1 </tmp/cmd &
echo -n . >/tmp/cmd &
