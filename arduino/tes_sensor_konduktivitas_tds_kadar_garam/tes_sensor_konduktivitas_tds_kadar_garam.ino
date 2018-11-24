/*
tes sensor Konduktivitas / TDS / Kadar Garam 
depoinovasi.com
*/

/*
wiring:
terminal 5V -> 5V arduino
terminal output ->  A0 arduino
terminal GND -> GND arduino
*/

#define analogInPin  A0  // Analog input pin 

//variable
int sensorValue; //adc value
float outputValueConductivity; //conductivity value
float outputValueTDS; //TDS value

#include <ESP8266WiFi.h>

const char* ssid="niffia";
const char* password = "rosnaini";
float calibration = 0.00; //change this value to calibrate
unsigned long int avgValue;
float b;
int buf[10], temp;
void setup() {
  

  Serial.begin(115200);
  Serial.println();
  Serial.print("Wifi connecting to ");
  Serial.println( ssid );

  WiFi.begin(ssid,password);

  Serial.println();
  Serial.print("Connecting");

  while( WiFi.status() != WL_CONNECTED ){
      delay(500);
      Serial.print(".");        
  }

  Serial.println();

  Serial.println("Wifi Connected Success!");
  Serial.print("NodeMCU IP Address : ");
  Serial.println(WiFi.localIP() );

}

void loop() {
  //read the analog in value:
  sensorValue = analogRead(analogInPin);

  //Mathematical Conversion from ADC to conductivity (uSiemens)
  //rumus berdasarkan datasheet
  outputValueConductivity = (0.2142*sensorValue)+494.93;
  
  //Mathematical Conversion from ADC to TDS (ppm)
  //rumus berdasarkan datasheet
  outputValueTDS = (0.3417*sensorValue)+281.08;
  
  //print the results to the serial monitor:
  Serial.print("sensor ADC = ");
  Serial.print(sensorValue);
  Serial.print("  conductivity (uSiemens)= ");
  Serial.print(outputValueConductivity);
  Serial.print("  TDS(ppm)= ");
  Serial.println(outputValueTDS);

  delay(500);
}
