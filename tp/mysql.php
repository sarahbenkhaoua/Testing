<?php
$host="localhost";
$user="sarah_ben";
$password="2020";
$data="useres";

$link = mysqli_connect( 'localhost', 'sarah_ben', 'Jowel2020','useres');


$connection = mysqli_connect($host,$user,$password,$data);
if(!$connection) die("Data Base Error");






?>