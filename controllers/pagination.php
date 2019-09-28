<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';


global $start;
global $count_view_task;
global $mysqli;

$count_view_task = 3;
$curr_page       = $_GET['page'];

$result      = mysqli_query( $mysqli, "SELECT COUNT(*) FROM tasks" );
$total_count = mysqli_fetch_array( $result );

$count_page = intval( ( $total_count[0] - 1 ) / $count_view_task ) + 1;

$curr_page = intval( $curr_page );

if ( empty( $curr_page ) || $curr_page < 0 ) {
	$curr_page = 1;
}
if ( $curr_page > $count_page ) {
	$curr_page = $count_page;
}


global $count_view_task;
global $curr_page;
global $curr_page;

$start = $curr_page * $count_view_task - $count_view_task;

if ( $curr_page != 1 ) {
	$pervpage = '<a href= ./index.php?page=1><<</a>
                               <a href= ./index.php?page=' . ( $curr_page - 1 ) . '><</a> ';
}
if ( $curr_page != $count_page ) {
	$nextpage = ' <a href= ./index.php?page=' . ( $curr_page + 1 ) . '>></a>
                                   <a href= ./index.php?page=' . $count_page . '>>></a>';
}

if ( $curr_page - 2 > 0 ) {
	$page2left = ' <a href= ./index.php?page=' . ( $curr_page - 2 ) . '>' . (
			$curr_page - 2 ) . '</a> | ';
}
if ( $curr_page - 1 > 0 ) {
	$page1left = '<a href= ./index.php?page=' . ( $curr_page - 1 ) . '>' . (
			$curr_page - 1 ) . '</a> | ';
}
if ( $curr_page + 2 <= $count_page ) {
	$page2right = ' | <a href= ./index.php?page=' . ( $curr_page + 2 ) . '>' . (
			$curr_page + 2 ) . '</a>';
}
if ( $curr_page + 1 <= $count_page ) {
	$page1right = ' | <a href= ./index.php?page=' . ( $curr_page + 1 ) . '>' . (
			$curr_page + 1 ) . '</a>';
}





