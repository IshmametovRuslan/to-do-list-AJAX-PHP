<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require $_SERVER['DOCUMENT_ROOT'] . '/controllers/pagination.php';

if ( $_POST['sort_btn'] ) {
	$sort = $_POST['sort'];
} else {
	$sort = 'name';
}

$query   = mysqli_query( $mysqli, "SELECT * FROM tasks ORDER BY date DESC, $sort ASC LIMIT $start, $count_view_task" );
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

if ( $total_count[0] > 3 ) {
	echo '<div class="pagination-nav">' . $pervpage . $page2left . $page1left . '<b>' . $curr_page
	     . '</b>' . $page1right .
	     $page2right . $nextpage . '</div>';
}

?>

