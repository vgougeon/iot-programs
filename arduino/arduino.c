#include <sys/types.h>
#include <unistd.h>
#include <stdio.h>
#include <stdlib.h>
#include <fcntl.h>
#include <sys/stat.h>
#define MAX_BUF 1024

void readValue(char* path, char* value) {
	int fd;
	fd = open(path, O_RDWR);
	read(fd, value, MAX_BUF);
	close(fd);
}

void sendToPipe(char* path, char* value) {
	int pipe;
	pipe = open(path, O_RDWR);
	write(pipe, value, 4);
	close(pipe);
}
int main()
{
	int fd;
	char * humidity = "sensor/humidity";
	char * altitude = "sensor/altitude";
	char * temperature = "sensor/temperature";
	char * brightness = "sensor/brightness";
	char * wind = "sensor/wind";
	char * atmospheric_pressure = "sensor/atmospheric_pressure";
	char buf[MAX_BUF];
	int stop = 0;
	while(stop == 0){
		char value[MAX_BUF];
		readValue(humidity, value);
		printf("Humidity : %s\n", value);
		sendToPipe("humidity", value);
		readValue(altitude, value);
		sendToPipe("altitude", value);
		readValue(temperature, value);
		sendToPipe("temperature", value);
		readValue(brightness, value);
		sendToPipe("brightness", value);
		readValue(wind, value);
		sendToPipe("wind", value);
		readValue(atmospheric_pressure, value);
		sendToPipe("atmospheric_pressure", value);
		sleep(2);
	}

	return 0;
}
