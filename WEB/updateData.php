<?php
include("conn.php");

// get latest data in database
$sql = "SELECT * FROM `marker` ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$id = $row['id'];

if(isset($_GET['satelite']) && isset($_GET['latitude']) && isset($_GET['longitude'])){
  // get data satelite, latitude and longitude
  $satelite = $_GET['satelite'];
  $latitude = $_GET['latitude'];
  $longitude = $_GET['longitude'];
  
  $sqlInsert = " UPDATE `marker` SET jumlah_satelite = '$satelite' , latitude = '$latitude' , longitude = '$longitude' WHERE id = '$id'";
}else if(isset($_GET['warna'])){
  $warna = $_GET['warna'];

  $sqlInsert = " UPDATE `marker` SET warna = '$warna' WHERE id = '$id'";
}else{
  return json_encode('INIT STATE, Waiting Command');
}

if ($conn->query($sqlInsert) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
?>