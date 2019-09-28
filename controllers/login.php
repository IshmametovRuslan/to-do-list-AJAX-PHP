<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';

if ( ! isset( $_POST['username'], $_POST['password'] ) ) {
	die ( 'Please fill both the username and password field!' );
} else {
	if ( $stmt = $mysqli->prepare( 'SELECT id, password FROM users WHERE username = ?' ) ) {
		$stmt->bind_param( 's', $_POST['username'] );
		$stmt->execute();
		$stmt->store_result();

		if ( $stmt->num_rows > 0 ) {
			$stmt->bind_result( $id, $password );
			$stmt->fetch();

			if ( password_verify( $_POST['password'], $password ) ) {
				session_regenerate_id();
				$_SESSION['loggedin'] = true;
				$_SESSION['name']     = $_POST['username'];
				$_SESSION['id']       = $id;
				header('Location: ../index.php');
			} else {
				echo 'Вы ввели неправильный пароль!';
			}
		} else {
			echo 'Неправильное имя пользователя!';
		}
	}
}

?>