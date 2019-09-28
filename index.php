<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Simple To-Do List</title>
	<link rel="stylesheet"
	      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	      crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="ajax/ajax.js"></script>
	<script src="scripts/scripts.js"></script>
</head>
<body>
<div class="wrap">
	<div class="admin-head">
		<?php
		if ( $_SESSION['loggedin'] ) {
			echo '<h4>Добро пожаловать <span class="green">' . $_SESSION['name'] . '</span></h4>';
			echo '<div class="logout"><a href="controllers/logout.php">Выйти</a></div>';
		} else {
			echo '<div class="login"><a href="controllers/login-form.php">Войти</a></div>';
		}
		?>
	</div>
	<form class="add-new-task" autocomplete="off">
		<input type="text" name="user-name" placeholder="Имя пользователя" required/>
		<input type="email" name="email" placeholder="Email" required/>
		<input type="text" name="new-task" placeholder="Добавить запись" required/>
		<input type="submit" name="submit" value="Добавить задачу"/>
	</form>
	<form method="post" class="sort-list">
		<select name="sort" id="sort">
			<option value="name" selected>По имени</option>
			<option value="email">По email</option>
			<option value="status">По статусу</option>
		</select>
		<input type="submit" name="sort_btn" value="Сортировать">
	</form>
	<div class="task-list">
		<ul>
			<?php
			require $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
			require $_SERVER['DOCUMENT_ROOT'] . '/models/load-task.php';
			?>
		</ul>
	</div>

</div><!-- #wrap -->
</body>
<!-- JavaScript Files Go Here -->


</html>