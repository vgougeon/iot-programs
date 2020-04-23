import os
from threading import Thread

sensors=["humidity","temperature","brightness","wind","altitude","atmospheric_pressure"]

class Sensor(Thread):
  def __init__(cls, name):
    Thread.__init__(cls)
    cls.name = name
  def run(cls):
    fifo = open(cls.name, "r")
    while True:
        for line in fifo:
            print(cls.name + " value : " + line)

threads = []

for i in range(0, len(sensors)):
    threads.append(Sensor("sensor/" + sensors[i]))
    threads[i].start()
    threads[i].join()
