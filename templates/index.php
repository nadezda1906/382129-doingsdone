<h2 class="content__main-heading">Список задач</h2>

<form class="search-form" action="index.php" method="post">
	<input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

	<input class="search-form__submit" type="submit" name="" value="Искать">
</form>

<div class="tasks-controls">
	<nav class="tasks-switch">
		<a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
		<a href="/" class="tasks-switch__item">Повестка дня</a>
		<a href="/" class="tasks-switch__item">Завтра</a>
		<a href="/" class="tasks-switch__item">Просроченные</a>
	</nav>

	<label class="checkbox">
		<!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
		<input class="checkbox__input visually-hidden show_completed" type="checkbox" 
		<?php if ($show_complete_tasks === 1): ?> checked <?php endif; ?>>
		<span class="checkbox__text">Показывать выполненные</span>
	</label>
</div>

<table class="tasks">
	<?php foreach ($list_tasks as $val): ?>
		<?php
			if ($show_complete_tasks !== 1 && $val['perfomance'] === 'Да') {
				continue;
			}

			$tr_class = 'tasks__item task';
			if ($val['perfomance'] === 'Да' && $show_complete_tasks === 1) {
				$tr_class .= ' task--completed';
			}
			if (getDiffHours($val['date']) <= 24) {
				$tr_class .= ' task--important';
			}
		?>
		<tr class="<?= $tr_class ?>">
			<td class="task__select">
				<label class="checkbox task__checkbox">
					<input class="checkbox__input visually-hidden" type="checkbox" <?php if ($val['perfomance'] === 'Да') : ?> checked <?php endif; ?>>
					<span class="checkbox__text"><?= $val['task'] ?></span>
				</label>
			</td>
			<td class="task__file">
				<a class="download-link" href="#">Home.psd</a>
			</td>
			<td class="task__date"><?= $val['date'] ?></td>
			<td class="task__controls">
			</td>
		</tr>
	<?php endforeach; ?>
</table>