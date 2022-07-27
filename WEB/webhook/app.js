const https = require('https');
const http = require('http');

var admin = require("firebase-admin");

// Fetch the service account key JSON file contents
var serviceAccount = require("C:/xampp/htdocs/maps-gps-tracker/webhook/services-account-file.json");

// Initialize the app with a service account, granting admin privileges
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  // The database URL depends on the location of the database
  databaseURL: "https://ta-hendra-f9f06-default-rtdb.firebaseio.com/"
});

var db = admin.database();
var ref = db.ref("GPS");
var colour = db.ref('Colour');
ref.on("value", function(snapshot) {
  console.log(snapshot.val());
  sendGPS(snapshot.val().Num_Satelite, snapshot.val().Latitude, snapshot.val().Longitude);
}, (errorObject) => {
    console.log("The read failed: " + errorObject.name);
    });

colour.on("value", function(snapshot) {
        console.log(snapshot.val());
        sendColor(snapshot.val().result);
    }, (errorObject) => {
        console.log("The read failed: " + errorObject.name);
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

function sendColor(warna){
  console.log("sending color");
  http.get('http://localhost/maps-gps-tracker/updateData.php?warna='+warna, (resp) => {
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