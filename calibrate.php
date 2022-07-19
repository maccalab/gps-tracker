<?php
require "vendor/autoload.php";
const URL = 'https://ta-hendra-f9f06-default-rtdb.firebaseio.com/';
const TOKEN = 'baV0cFwJF5aG62RHvG8o64B8pkYKgH1xk9aICxSU';
const PATH = '/GPS';

use Firebase\FirebaseLib;

$firebase = new FirebaseLib(URL, TOKEN);

// send calibrate command
$firebase->set(PATH . '/Num_Satelite', 1);
?>