#se importan la libreria pyserial y la sys
import serial 
import sys
#-- Se abre el puerto serial correspondiente a la arduino por usb y se 
#establece
# el tiempo de espera maximo
try:
    s = serial.Serial('/dev/ttyACM0', 9600)
    s.timeout=2; 
except serial.SerialException:
    print "Error al abrir el puerto."
    sys.exit()

# Se envia la orden a la arduino mediante serial
orden = sys.argv[1]
s.write(orden)
