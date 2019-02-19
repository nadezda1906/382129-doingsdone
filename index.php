<?php
require_once 'functions.php';
/*Подключаем, если не подключается БД*/
//require_once 'data.php';

/* Подключаем соединение с БД*/
$con = mysqli_connect('localhost', 'root', '', 'doingsdone');
if ($con == false) {
	print("Ошибка подключения:".mysqli_connect_error());
} else {
	print("Соединение установлено");
}
mysqli_set_charset($con, "utf8");

/*Добавление нового юзера и проверка соединения*/
/*$sql = "INSERT INTO `users`( `registered_at`,`email`, `name`,`password`)values ('2019-08-12 00:00:00', 'sem@mail.ru', 'Сем Семов','15611')";
$result = mysqli_query($con, $sql);
if (!$result) {
	$error = mysqli_error($con);
	print("Ошибка MYSQL:".$error);
}
echo "Задачи:".$result;*/

$projects_sql = 'SELECT * FROM projects';
$projects = mysqli_query($con, $projects_sql);
$projects = mysqli_fetch_all($projects, MYSQLI_ASSOC);
/*Запрос на получение списка из всех проектов для одного пользователя*/
$tasks_sql = 'SELECT t.id, t.name, t.created_at, t.status, t.project_id, t.file, p.name AS project_name FROM tasks AS t LEFT JOIN projects AS p ON p.user_id = t.project_id';
$tasks = mysqli_query($con, $tasks_sql);
$tasks = mysqli_fetch_all($tasks, MYSQLI_ASSOC);

 /* показывать или нет выполненные задачи*/
$show_complete_tasks = rand(0, 1);
$index_content = include_template('index.php', [
    'list_tasks' => $tasks, 
    'show_complete_tasks' => $show_complete_tasks]);

$layout_content = include_template('layout.php', [
    'title' => 'doingsdone', 
    'list_tasks' => $tasks, 
    'content' => $index_content, 
    'projects' => $projects
]);

echo $layout_content;



