import os
from threading import Thread
import MySQLdb

connection = MySQLdb.connect (host = "localhost",
                              user = "root",
                              passwd = "",
                              database = "iot")

cursor = connection.cursor()
sensors=["humidity","temperature","brightness","wind","altitude","atmospheric_pressure"]

#id = cls.cursor.execute("select id from sensors where name = '%s'" % (cls.sensorName))
#sql = "insert into data (sensorId,value) values (1,200)"
#cursor.execute(sql)
#connection.commit()
fifo = open("../arduino/mainpipe", "r")
while(True): 
    for line in fifo:
        [name, value] = line.split('-')
        sql = ("SELECT id FROM sensors WHERE name = '%s'" % name)
        print(sql)
        cursor.execute("SELECT id FROM sensors WHERE name = '%s'" % name)
        [id] = cursor.fetchone()
        sql = "insert into data (sensorId, value) values (" + str(id) + ", " + str(value) + ")"
        cursor.execute(sql)
        connection.commit()

