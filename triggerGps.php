<?php
require "vendor/autoload.php";
const URL = 'https://ta-hendra-f9f06-default-rtdb.firebaseio.com/';
const TOKEN = 'baV0cFwJF5aG62RHvG8o64B8pkYKgH1xk9aICxSU';
const PATH = '/GPS';

use Firebase\FirebaseLib;

$firebase = new FirebaseLib(URL, TOKEN);

// send random number to trigger firebase command
$number = rand(1000000000,9999999999);
$firebase->set(PATH . '/triggerGps', $number);
?>