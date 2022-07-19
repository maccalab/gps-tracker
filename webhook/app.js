const https = require('https');

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
ref.on("value", function(snapshot) {
//   if(snapshot.val().isUpdate == 1){
//     console.log("update",);
//     console.log(snapshot.val());
//   } else {
//     console.log("waiting...",);
//   }
  console.log(snapshot.val());
//   sendWebhook(snapshot.val().Suhu, snapshot.val().Waktu);
}, (errorObject) => {
    console.log("The read failed: " + errorObject.name);
    });

function sendWebhook(suhu, waktu){
  console.log("sending webhook");
  const message = 'Suhu : '+ suhu + ' '+ 'Waktu : '+ waktu
  https.get('https://mrdyman.com/project/macca/monitoring-suhu/main/monitoring-suhu/webhook.php?suhu='+suhu+'&waktu='+waktu, (resp) => {
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