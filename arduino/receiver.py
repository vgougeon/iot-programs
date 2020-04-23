import os
from threading import Thread

class Sensor(Thread):
  def __init__(cls, name):
    Thread.__init__(cls)
    cls.name = name
  def run(cls):
    fifo = open(cls.name, "r")
    while True:
        for line in fifo:
            print("Received" + line)

sensor1 = Sensor("sensor/humidity")

sensor1.start()

sensor1.join()
