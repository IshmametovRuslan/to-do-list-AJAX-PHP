<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';

$name  = strip_tags( $_POST['name'] );
$email = strip_tags( $_POST['email'] );
$task  = strip_tags( $_POST['task'] );
$date  = date( 'Y-m-d' );
$time  = date( 'H:i:s' );

mysqli_query( $mysqli, "INSERT INTO tasks VALUES ('', '$task', '$date', '$time', '$name', '$email', 'Невыполнено')" );

require $_SERVER['DOCUMENT_ROOT'] . '/models/load-task.php';

