<?php
include("conn.php");

if(isset($_GET['read'])){
  //parsing incoming data
  $tempRed = [];
  $tempGreen = [];
  $tempBlue = [];

  $redResult = 0;
  $greenResult = 0;
  $blueResult = 0;

  $str = $_GET['read'];
  $checkPoint = 0;
  foreach (str_split($str) as $char) {
    if($checkPoint == 0){
      if($char != '@'){
        array_push($tempRed, $char);
      }else{
        $checkPoint+=1;
      }
    }else if($checkPoint == 1){
      if($char != '@'){
        array_push($tempGreen, $char);
      }else{
        $checkPoint+=1;
      }
    } else if($checkPoint == 2){
      if($char != '@'){
        array_push($tempBlue, $char);
      }else{
        $checkPoint+=1;
      }
    }
  }
  $redResult = implode($tempRed);
  $greenResult = implode($tempGreen);
  $blueResult = implode($tempBlue);

  //store data color to database
  $sqlInsert = "INSERT INTO color (red, green, blue) VALUES ($redResult, $greenResult, $blueResult)";

  if ($conn->query($sqlInsert) === TRUE) {
      echo "data stored successfully";
    } else {
      echo "Error store data: " . $conn->error;
  }
}else if(isset($_GET['red']) && isset($_GET['green']) && isset($_GET['blue']) && isset($_GET['yellow']) && isset($_GET['black']) && isset($_GET['white'])){
  //store data color to database
  // $sqlInsert = "INSERT INTO knowledge (red, green, blue) VALUES (132, 132, 0)";

  // red
  $tempRed = [];
  $tempGreen = [];
  $tempBlue = [];

  $redResult = 0;
  $greenResult = 0;
  $blueResult = 0;

  $str = $_GET['red'];
  $checkPoint = 0;
  foreach (str_split($str) as $char) {
    if($checkPoint == 0){
      if($char != '@'){
        array_push($tempRed, $char);
      }else{
        $checkPoint+=1;
      }
    }else if($checkPoint == 1){
      if($char != '@'){
        array_push($tempGreen, $char);
      }else{
        $checkPoint+=1;
      }
    } else if($checkPoint == 2){
      if($char != '@'){
        array_push($tempBlue, $char);
      }else{
        $checkPoint+=1;
      }
    }
  }
  $redResult = implode($tempRed);
  $greenResult = implode($tempGreen);
  $blueResult = implode($tempBlue);

  $sqlRed = "UPDATE knowledge SET r = $redResult, g = $greenResult, b = $blueResult WHERE id = 1";
  if ($conn->query($sqlRed) === TRUE) {
    echo "data stored successfully";
  } else {
    echo "Error store data: " . $conn->error;
  }
  //-/red

  // green
  $tempRed = [];
  $tempGreen = [];
  $tempBlue = [];

  $redResult = 0;
  $greenResult = 0;
  $blueResult = 0;

  $str = $_GET['green'];
  $checkPoint = 0;
  foreach (str_split($str) as $char) {
    if($checkPoint == 0){
      if($char != '@'){
        array_push($tempRed, $char);
      }else{
        $checkPoint+=1;
      }
    }else if($checkPoint == 1){
      if($char != '@'){
        array_push($tempGreen, $char);
      }else{
        $checkPoint+=1;
      }
    } else if($checkPoint == 2){
      if($char != '@'){
        array_push($tempBlue, $char);
      }else{
        $checkPoint+=1;
      }
    }
  }
  $redResult = implode($tempRed);
  $greenResult = implode($tempGreen);
  $blueResult = implode($tempBlue);

  $sqlGreen = "UPDATE knowledge SET r = $redResult, g = $greenResult, b = $blueResult WHERE id = 2";
  if ($conn->query($sqlGreen) === TRUE) {
    echo "data stored successfully";
  } else {
    echo "Error store data: " . $conn->error;
  }
  //-/green

  // blue
  $tempRed = [];
  $tempGreen = [];
  $tempBlue = [];

  $redResult = 0;
  $greenResult = 0;
  $blueResult = 0;

  $str = $_GET['blue'];
  $checkPoint = 0;
  foreach (str_split($str) as $char) {
    if($checkPoint == 0){
      if($char != '@'){
        array_push($tempRed, $char);
      }else{
        $checkPoint+=1;
      }
    }else if($checkPoint == 1){
      if($char != '@'){
        array_push($tempGreen, $char);
      }else{
        $checkPoint+=1;
      }
    } else if($checkPoint == 2){
      if($char != '@'){
        array_push($tempBlue, $char);
      }else{
        $checkPoint+=1;
      }
    }
  }
  $redResult = implode($tempRed);
  $greenResult = implode($tempGreen);
  $blueResult = implode($tempBlue);

  $sqlBlue = "UPDATE knowledge SET r = $redResult, g = $greenResult, b = $blueResult WHERE id = 3";
  if ($conn->query($sqlBlue) === TRUE) {
    echo "data stored successfully";
  } else {
    echo "Error store data: " . $conn->error;
  }
  //-/blue

  // black
  $tempRed = [];
  $tempGreen = [];
  $tempBlue = [];

  $redResult = 0;
  $greenResult = 0;
  $blueResult = 0;

  $str = $_GET['black'];
  $checkPoint = 0;
  foreach (str_split($str) as $char) {
    if($checkPoint == 0){
      if($char != '@'){
        array_push($tempRed, $char);
      }else{
        $checkPoint+=1;
      }
    }else if($checkPoint == 1){
      if($char != '@'){
        array_push($tempGreen, $char);
      }else{
        $checkPoint+=1;
      }
    } else if($checkPoint == 2){
      if($char != '@'){
        array_push($tempBlue, $char);
      }else{
        $checkPoint+=1;
      }
    }
  }
  $redResult = implode($tempRed);
  $greenResult = implode($tempGreen);
  $blueResult = implode($tempBlue);

  $sqlBlack = "UPDATE knowledge SET r =  $redResult, g =  $greenResult, b =  $blueResult WHERE id = 4";
  if ($conn->query($sqlBlack) === TRUE) {
    echo "data stored successfully";
  } else {
    echo "Error store data: " . $conn->error;
  }
  //-/black

  // yellow
  $tempRed = [];
  $tempGreen = [];
  $tempBlue = [];

  $redResult = 0;
  $greenResult = 0;
  $blueResult = 0;

  $str = $_GET['yellow'];
  $checkPoint = 0;
  foreach (str_split($str) as $char) {
    if($checkPoint == 0){
      if($char != '@'){
        array_push($tempRed, $char);
      }else{
        $checkPoint+=1;
      }
    }else if($checkPoint == 1){
      if($char != '@'){
        array_push($tempGreen, $char);
      }else{
        $checkPoint+=1;
      }
    } else if($checkPoint == 2){
      if($char != '@'){
        array_push($tempBlue, $char);
      }else{
        $checkPoint+=1;
      }
    }
  }
  $redResult = implode($tempRed);
  $greenResult = implode($tempGreen);
  $blueResult = implode($tempBlue);

  $sqlYellow = "UPDATE knowledge SET r = $redResult, g = $greenResult, b = $blueResult WHERE id = 5";
  if ($conn->query($sqlYellow) === TRUE) {
    echo "data stored successfully";
  } else {
    echo "Error store data: " . $conn->error;
  }
  //-/yellow

  // white
  $tempRed = [];
  $tempGreen = [];
  $tempBlue = [];

  $redResult = 0;
  $greenResult = 0;
  $blueResult = 0;

  $str = $_GET['white'];
  $checkPoint = 0;
  foreach (str_split($str) as $char) {
    if($checkPoint == 0){
      if($char != '@'){
        array_push($tempRed, $char);
      }else{
        $checkPoint+=1;
      }
    }else if($checkPoint == 1){
      if($char != '@'){
        array_push($tempGreen, $char);
      }else{
        $checkPoint+=1;
      }
    } else if($checkPoint == 2){
      if($char != '@'){
        array_push($tempBlue, $char);
      }else{
        $checkPoint+=1;
      }
    }
  }
  $redResult = implode($tempRed);
  $greenResult = implode($tempGreen);
  $blueResult = implode($tempBlue);

  $sqlWhite = "UPDATE knowledge SET r = $redResult, g = $greenResult, b = $blueResult WHERE id = 6";
  if ($conn->query($sqlWhite) === TRUE) {
    echo "data stored successfully";
  } else {
    echo "Error store data: " . $conn->error;
  }
  //-/white

}else if(isset($_GET['satelite']) && isset($_GET['latitude']) && isset($_GET['longitude'])){
  //get color data from db
  $sql = "SELECT * FROM color ORDER BY id DESC LIMIT 1";
  $colorResult = $conn->query($sql);
  $dataColor = [];
  if($colorResult->num_rows > 0){
    $dataColor = $colorResult->fetch_assoc();
    
    // read data
    $red = $dataColor["red"];
    $green = $dataColor["green"];
    $blue = $dataColor["blue"];

    //knowledge
    //get color data from db
    $sqlKnowledge = "SELECT * FROM knowledge";
    $colorKnowledge = $conn->query($sqlKnowledge);
    $dataColorKnowledgeRed = [];
    $dataColorKnowledgeGreen = [];
    $dataColorKnowledgeBlue = [];
    $dataColorKnowledgeYellow = [];
    $dataColorKnowledgeBlack = [];
    $dataColorKnowledgeWhite = [];
    if($colorKnowledge->num_rows > 0){
      while($row = $colorKnowledge->fetch_assoc()) {
          if($row["name"] == "Red"){
            $dataColorKnowledgeRed = $row;
          }else if($row["name"] == "Green"){
            $dataColorKnowledgeGreen = $row;
          }else if($row["name"] == "Blue"){
            $dataColorKnowledgeBlue = $row;
          }else if($row["name"] == "Yellow"){
            $dataColorKnowledgeYellow = $row;
          }else if($row["name"] == "Black"){
            $dataColorKnowledgeBlack = $row;
          }else if($row["name"] == "White"){
            $dataColorKnowledgeWhite = $row;
          }
        }
      } else {
      echo "0 results";
    }
    // read data
    $redKnowledge = $dataColorKnowledgeRed;
    $greenKnowledge = $dataColorKnowledgeGreen;
    $blueKnowledge = $dataColorKnowledgeBlue;
    $yellowKnowledge = $dataColorKnowledgeYellow;
    $blackKnowledge = $dataColorKnowledgeBlack;
    $whiteKnowledge = $dataColorKnowledgeWhite;


    $RED_C = [];
    $GREEN_C = [];
    $BLUE_C = [];
    $BLACK_C = [];
    $YELLOW_C = [];
    $WHITE_C = [];

    $RED_C[0] = $redKnowledge["r"];
    $RED_C[1] = $redKnowledge["g"];
    $RED_C[2] = $redKnowledge["b"];

    $GREEN_C[0] = $greenKnowledge["r"];
    $GREEN_C[1] = $greenKnowledge["g"];
    $GREEN_C[2] = $greenKnowledge["b"];

    $BLUE_C[0] = $blueKnowledge["r"];
    $BLUE_C[1] = $blueKnowledge["g"];
    $BLUE_C[2] = $blueKnowledge["b"];

    $BLACK_C[0] = $blackKnowledge["r"];
    $BLACK_C[1] = $blackKnowledge["g"];
    $BLACK_C[2] = $blackKnowledge["b"];

    $YELLOW_C[0] = $yellowKnowledge["r"];
    $YELLOW_C[1] = $yellowKnowledge["g"];
    $YELLOW_C[2] = $yellowKnowledge["b"];

    $WHITE_C[0] = $whiteKnowledge["r"];
    $WHITE_C[1] = $whiteKnowledge["g"];
    $WHITE_C[2] = $whiteKnowledge["b"];
    $toleransi = 10;

    if(($red >= $RED_C[0] - $toleransi && $red <= $RED_C[0] + $toleransi) && ($green >= $RED_C[1] - $toleransi && $green <= $RED_C[1] + $toleransi) && ($blue >= $RED_C[2] - $toleransi && $blue <= $RED_C[2] + $toleransi)){
      $result = "RED";
    }else if (($red >= $GREEN_C[0] - $toleransi && $red <= $GREEN_C[0] + $toleransi) && ($green >= $GREEN_C[1] - $toleransi && $green <= $GREEN_C[1] + $toleransi) && ($blue >= $GREEN_C[2] - $toleransi && $blue <= $GREEN_C[2] + $toleransi)){
      $result = "GREEN";
    }else if(($red >= $BLUE_C[0] - $toleransi && $red <= $BLUE_C[0] + $toleransi) && ($green >= $BLUE_C[1] - $toleransi && $green <= $BLUE_C[1] + $toleransi) && ($blue >= $BLUE_C[2] - $toleransi && $blue <= $BLUE_C[2] + $toleransi)){
      $result = "BLUE";
    }else if(($red >= $BLACK_C[0] - $toleransi && $red <= $BLACK_C[0] + $toleransi) && ($green >= $BLACK_C[1] - $toleransi && $green <= $BLACK_C[1] + $toleransi) && ($blue >= $BLACK_C[2] - $toleransi && $blue <= $BLACK_C[2] + $toleransi)){
      $result = "BLACK";
    }else if(($red >= $YELLOW_C[0] - $toleransi && $red <= $YELLOW_C[0] + $toleransi) && ($green >= $YELLOW_C[1] - $toleransi && $green <= $YELLOW_C[1] + $toleransi) && ($blue >= $YELLOW_C[2] - $toleransi && $blue <= $YELLOW_C[2] + $toleransi)){
      $result = "YELLOW";
    }else if(($red >= $WHITE_C[0] - $toleransi && $red <= $WHITE_C[0] + $toleransi) && ($green >= $WHITE_C[1] - $toleransi && $green <= $WHITE_C[1] + $toleransi) && ($blue >= $WHITE_C[2] - $toleransi && $blue <= $WHITE_C[2] + $toleransi)){
      $result = "WHITE";
    }else {
      $result = "UNKNOWN";
    }
    
    // store data result to database
    $satelite = $_GET['satelite'];
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];

    $sqlInsert = "INSERT INTO marker (warna, jumlah_satelite, latitude, longitude) VALUES ('$result', $satelite, $latitude, $longitude)";

    if ($conn->query($sqlInsert) === TRUE) {
        echo "data stored successfully";
      } else {
        echo "Error store data: " . $conn->error;
      }
  }
}else {
  return json_encode('INIT STATE, Waiting Command');
}
?>