<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';

$task_id = strip_tags( $_POST['task_id'] );

mysqli_query( $mysqli, "DELETE FROM tasks WHERE id='$task_id'" );



