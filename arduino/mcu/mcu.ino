
#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>

const char* ssid = "niffia";
const char* password = "rosnaini";
float calibration = 0.00; //change this value to calibrate
const int analogInPin = A0;
int sensorValue = 0;
unsigned long int avgValue;
float b;
int buf[10], temp;
void setup() {


  Serial.begin(115200);
  Serial.println();
  Serial.print("Wifi connecting to ");
  Serial.println( ssid );

  WiFi.begin(ssid, password);

  Serial.println();
  Serial.print("Connecting");

  while ( WiFi.status() != WL_CONNECTED ) {
    delay(500);
    Serial.print(".");
  }

  Serial.println();

  Serial.println("Wifi Connected Success!");
  Serial.print("NodeMCU IP Address : ");
  Serial.println(WiFi.localIP() );

}


void loop() {

  for (int i = 0; i < 10; i++)
  {
    buf[i] = analogRead(analogInPin);
    delay(30);
  }
  for (int i = 0; i < 9; i++)
  {
    for (int j = i + 1; j < 10; j++)
    {
      if (buf[i] > buf[j])
      {
        temp = buf[i];
        buf[i] = buf[j];
        buf[j] = temp;
      }
    }
  }
  avgValue = 0;
  for (int i = 2; i < 8; i++)
    avgValue += buf[i];
  float pHVol = (float)avgValue * 5.0 / 1024 / 6;
  float phValue = -5.70 * pHVol + calibration;
  Serial.print("sensor = ");
  Serial.println(phValue);
  HTTPClient http;
  http.begin("http://hackthon1.politanisamarinda.ac.id/api/hasil");
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  http.POST("unit_id=1&jenis_parameter_id=1&value=" + String(phValue));
  http.writeToStream(&Serial);
  delay(1000);
}

