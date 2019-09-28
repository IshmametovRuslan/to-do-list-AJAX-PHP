<?php session_start(); ?>
<li id="<?= $task_id; ?>">
	<p class="email"><b>Email:</b> <?= $user_email; ?></p>
	<p class="name"><b>Имя:</b> <?= $user_name; ?></p>
	<p class="task"><b>Текст задачи:</b> <?= $task_name; ?></p>
	<p class="status"><?=
		$status; ?></p>
</li>
