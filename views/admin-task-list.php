<?php session_start(); ?>

<li id="<?= $task_id; ?>">
	<img class="delete-button" width="10px"
	     src="images/close.svg"/>
	<p class="email"><b>Email:</b> <?= $user_email; ?></p>
	<p class="name"><b>Имя:</b> <?= $user_name; ?></p>
	<p class="task"><b>Текст задачи:</b> <?= $task_name; ?></p>
	<p class="status"><?=
		$status; ?></p>
	<input class="edit-btn" type="submit" name="edit-btn" value="Редактировать">
	<form class="edit-form" autocomplete="off">
		<p>Обновить задачу:</p>
		<input type="text" name="update-task"
		       placeholder="Текст задачи" value="<?= $task_name; ?>">
		<p>Задача выполнена: <input type="checkbox" name="check-btn"
		                            value="Выполнено"></p>
		<input type="submit" name="submit"
		       class="send-upd-text" value="Ок">
	</form>
</li>
