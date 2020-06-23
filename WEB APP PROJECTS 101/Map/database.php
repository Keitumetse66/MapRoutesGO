<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "testing";

$dbconn = mysql_connect($dbServername, $dbUsername, $dbPassword, $dbName);

echo('database connected!');