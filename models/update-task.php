<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/controllers/pagination.php';

$id       = strip_tags( $_POST['id'] );
$upd_task = strip_tags( $_POST['upd_task'] );
$date     = date( 'Y-m-d' );
$time     = date( 'H:i:s' );
if ( ( $_POST['status'] ) == 'false' ) {
	$status = 'Невыполнено';
} else {
	$status = 'Выполнено';
};

mysqli_query( $mysqli, "UPDATE tasks SET id='$id', task='$upd_task', date='$date', time='$time', status='$status' WHERE id='$id'" );

if ( $_POST['sort_btn'] ) {
	$sort = $_POST['sort'];
} else {
	$sort = 'name';
}

$query   = mysqli_query( $mysqli, "SELECT * FROM tasks WHERE id='$id'" );
$numrows = mysqli_num_rows( $query );

if ( $numrows > 0 ) {
	while ( $row = mysqli_fetch_assoc( $query ) ) {
		$task_id    = $row['id'];
		$user_email = $row['email'];
		$user_name  = $row['name'];
		$task_name  = $row['task'];
		$status     = $row['status'];

		if ( $_SESSION['loggedin'] == true ) {
			require $_SERVER['DOCUMENT_ROOT'] . '/views/admin-task-list.php';
		} else {
			require $_SERVER['DOCUMENT_ROOT'] . '/views/task-list.php';
		}
	}
}

mysqli_close( $mysqli );


