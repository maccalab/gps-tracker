#include "GPS_config.h"
#include "FB_setup.h"
#include "Colour_sens.h"
#include <Thread.h>
#include <ThreadController.h>
//#include <LibPrintf.h>

//#include <FB_setup.h>

//ThreadController that will controll all threads
ThreadController controll = ThreadController();

Thread Thread1 = Thread();
Thread Thread2 = Thread();

unsigned long prevMillis2;
unsigned long prevMillis3;

int data_calibrate = 0;

void setup(void)
{
  Serial.begin(115200);
  mySerial.begin(9600);
  EEPROM.begin(512);

  lcd.init();
  lcd.backlight();

  lcd.setCursor(0, 0);
  lcd.print(" Loading Data.. ");
  delay(500);
  lcd.setCursor(0, 1);
  lcd.print("  Please Wait!  ");

  int new_addr = readStringFromEEPROM(eepromOffset, &REDstring);
  pharse(REDstring, RED_C);
  delay(1000);
  printf("\n\nRED DATA >> R: %i G: %i B: %i\n", RED_C[0], RED_C[1], RED_C[2]);

  readStringFromEEPROM(new_addr, &GREENstring);
  pharse(GREENstring, GREEN_C);
  delay(1000);
  printf("\n\nGREEN DATA >> R: %i G: %i B: %i\n", GREEN_C[0], GREEN_C[1], GREEN_C[2]);

  delay(2000);

  IoT_cloud();

//  Thread1.onRun(readGPS);
//  Thread1.setInterval(10);

  Thread2.onRun(GetColors);
  Thread2.setInterval(100);

  controll.add(&Thread1);
  controll.add(&Thread2);

  delay(2000);

  while (true)
  {
    controll.run();
    readGPS();
    //delay(10);
    display();

    read_button = analogRead(button);

    if (data_calibrate == 1 || read_button == 1024) // if button pressed
    {
      Calibrate();
      Firebase.setInt(firebaseData,  "/Colour/Calibrate", 0);
    }

    if (millis() - prevMillis2 >= 2000)
    {
      prevMillis2 = millis();

//      if(WiFi.status() != WL_CONNECTED){
////        lcd.clear();
////        lcd.setCursor(0,0);
////        lcd.print("Lost Connection!");
//        connectwifi();
//      }
      
      //printf("\nread_button: %i\n", read_button);
      //printf("data calibrate: %i\n", data_calibrate);
      printf("\nGPS >> Lt: %f Lg: %f\n", gpsArray[0], gpsArray[1]);
      printf("Red: %i Green: %i Blue: %i\n", Red, Green, Blue);
      colour_result();

      Firebase.getInt(firebaseData, "/Colour/Calibrate") ? data_calibrate = firebaseData.intData() : Serial.println(firebaseData.errorReason());
      
      // Firebase.setFloat(firebaseData, "/GPS/Latitude", gpsArray[0]);
      // Firebase.setFloat(firebaseData, "/GPS/Longitude", gpsArray[1]);
      // Firebase.setFloat(firebaseData, "/GPS/Num_Satelite", gpsArray[2]);
    }

    if (millis() - prevMillis3 >= 5000)
    {
       prevMillis3 = millis();
       Firebase.setFloat(firebaseData, "/GPS/Latitude", gpsArray[0]) ? printf("Send data Latitude Succes\n") : printf("Failed send data Latitude\n");
       Firebase.setFloat(firebaseData, "/GPS/Longitude", gpsArray[1]) ? printf("Send data Longitude Succes\n") : printf("Failed send data Longitude\n");
       Firebase.setFloat(firebaseData, "/GPS/Num_Satelite", gpsArray[2]) ? printf("Send data Satelite Succes\n") : printf("Failed send data Satelite\n");
    }
  }
}

void loop() {}
