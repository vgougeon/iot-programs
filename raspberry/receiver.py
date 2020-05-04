import os
from threading import Thread
import MySQLdb

connection = MySQLdb.connect (host = "localhost",
                              user = "root",
                              passwd = "",
                              database = "iot")

cursor = connection.cursor()
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
            id = cursor.execute("select id from sensors where name = %s" % (cls.sensorName))
            print(id)
            #sql = "insert into data values (sensorId = "+id+", value = "+line+")"
            #cursor.execute(sql)
            #connection.commit()
            print(cls.name + " value : " + line)

threads = []

for i in range(0, len(sensors)):
    threads.append(Sensor("../arduino/sensor/" + sensors[i], sensors[i]))
    threads[i].start()
cursor.close()
connection.close()
