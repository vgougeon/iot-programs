import os
import random
import time
sensor_array=["humidity","temperature","brightness","wind","altitude","atmospheric_pressure"]

while True:
    for i in range(0,len(sensor_array)):
        file = os.open(sensor_array[i],os.O_RDWR)
        os.write(file,str.encode(str(random.randint(0,1024))))
        os.close(file)
    time.sleep(1)
