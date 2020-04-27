import os
from threading import Thread

sensors=["humidity","temperature","brightness","wind","altitude","atmospheric_pressure"]

class Sensor(Thread):
  def __init__(cls, name, sensorName):
    Thread.__init__(cls)
    cls.name = name
    cls.sensorName = sensorName
  def run(cls):
    fifo = open(cls.name, "r")
    while True:
        for line in fifo:
            #id = select id from sensor where name = cls.sensorName
            #insert into data values (sensorId = id, value = line)
            print(cls.name + " value : " + line)

threads = []

for i in range(0, len(sensors)):
    threads.append(Sensor("../arduino/sensor/" + sensors[i], sensors[i]))
    threads[i].start()
