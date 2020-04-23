import os

sensor_array=["humidity","temperature","brightness","wind","altitude","atmospheric_pressure"]

for i in range(0,len(sensor_array)):
    file = os.open(sensor_array[i],os.O_RDWR)
    os.write(file,b"Hello")
    os.close(file)
