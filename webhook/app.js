const https = require('https');
const http = require('http');

var admin = require("firebase-admin");

// Fetch the service account key JSON file contents
var serviceAccount = require("C:/xampp/htdocs/maps-gps-tracker/webhook/services-account-file.json");
// var serviceAccount = require("C:/laragon/www/maps-gps-tracker/webhook/services-account-file.json");

// Initialize the app with a service account, granting admin privileges
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  // The database URL depends on the location of the database
  databaseURL: "https://ta-hendra-f9f06-default-rtdb.firebaseio.com/"
});

var db = admin.database();
var ref = db.ref("GPS");
var colour = db.ref('Colour');
var knowledge = db.ref('Colour/Calibrate');
ref.on("value", function(snapshot) {
  // console.log(snapshot.val());
  sendGPS(snapshot.val().Num_Satelite, snapshot.val().Latitude, snapshot.val().Longitude);
}, (errorObject) => {
    console.log("The read failed: " + errorObject.name);
    });

colour.on("value", function(snapshot) {
        // console.log(snapshot.val());
        sendColor(snapshot.val().read);
        triggerGps();
    }, (errorObject) => {
        console.log("The read failed: " + errorObject.name);
        });

knowledge.on("value", function(snapshot){
  var data = snapshot.val();
  var red = data.RED;
  var green = data.GREEN;
  var blue = data.BLUE;
  var yellow = data.YELLOW;
  var black = data.BLACK;
  var white = data.WHITE;
  sendKnowledge(red, green, blue, yellow, black, white);
}, (errorObject) => {
  console.log("The read failed : "+ errorObject.name);
});


function sendGPS(satelite, latitude, longitude){
  console.log("sending gps");
  http.get('http://localhost/maps-gps-tracker/updateData.php?satelite='+satelite+'&latitude='+latitude+'&longitude='+longitude, (resp) => {
  let data = '';

  // A chunk of data has been received.
  resp.on('data', (chunk) => {
    data += chunk;
  });

  // The whole response has been received. Print out the result.
  resp.on('end', () => {
    // console.log(JSON.parse(data).result);
    console.log(data);
  });

  }).on("error", (err) => {
  console.log("Error: " + err.message);
});
}

function sendColor(read){
  console.log("sending color");
  http.get('http://localhost/maps-gps-tracker/updateData.php?read='+read, (resp) => {
  let data = '';

  // A chunk of data has been received.
  resp.on('data', (chunk) => {
    data += chunk;
  });

  // The whole response has been received. Print out the result.
  resp.on('end', () => {
    // console.log(JSON.parse(data).result);
    console.log(data);
  });

  }).on("error", (err) => {
  console.log("Error: " + err.message);
});
}

function triggerGps(){
  console.log("trigger gps");
  http.get('http://localhost/maps-gps-tracker/triggerGps.php', (resp) => {
  let data = '';

  // A chunk of data has been received.
  resp.on('data', (chunk) => {
    data += chunk;
  });

  // The whole response has been received. Print out the result.
  resp.on('end', () => {
    // console.log(JSON.parse(data).result);
    console.log(data);
  });

  }).on("error", (err) => {
  console.log("Error: " + err.message);
});
}

function sendKnowledge(red, green, blue, yellow, black, white){
  console.log("sending knowledge");
  http.get('http://localhost/maps-gps-tracker/updateData.php?red='+red+'&green='+green+'&blue='+blue+'&yellow='+yellow+'&black='+black+'&white='+white, (resp) => {
  let data = '';

  // A chunk of data has been received.
  resp.on('data', (chunk) => {
    data += chunk;
  });

  // The whole response has been received. Print out the result.
  resp.on('end', () => {
    // console.log(JSON.parse(data).result);
    console.log(data);
  });

  }).on("error", (err) => {
  console.log("Error: " + err.message);
});
}