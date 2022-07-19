<?php
include("conn.php");
$sql = "SELECT * FROM marker";
$my_array = array();
$result = $conn->query($sql);
if($result->num_rows > 0){
    while ($location = $result->fetch_assoc()) {
        $my_array[] = $location;
    }
    echo json_encode($my_array);
}
?>