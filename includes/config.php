<?php
$server  = "mysql.zzz.com.ua";
$db_name = "russko90"; // Enter your database name
$db_user = "todolist123"; // Enter your username
$db_pass = "g4pTta4qJy_7KVi"; // Enter your password


$mysqli = mysqli_connect( $server, $db_user, $db_pass ) or die( "Could not connect to server!" );
mysqli_select_db( $mysqli, $db_name ) or die( "Could not connect to database!" );


