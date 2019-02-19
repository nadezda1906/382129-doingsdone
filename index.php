<?php
require_once 'functions.php';
/*Подключаем, если не подключается БД*/
require_once 'data.php';


/* Подключаем соединение с БД*/
$con = mysqli_connect('localhost', 'root', '', 'doingsdone');
if($con == false){
	print("Ошибка подключения:".mysqli_connect_error());
}
else{
	print("Соединение установлено");
	}
	mysqli_set_charset($con, "utf8");
/*Добавление нового юзера и проверка соединения*/
$sql = "INSERT INTO `users`( `registered_at`,`email`, `name`,`password`)values ('2019-08-12 00:00:00', 'sem@mail.ru', 'Сем Семов','15611')";
$result= mysqli_query($con, $sql);
if(!$result){
	$error = mysqli_error($con);
	print("Ошибка MYSQL:".$error);
}
echo "Задачи:".$result;

$projects_sql = 'SELECT * FROM projects';
$project = mysqli_query($con, $projects_sql);
/*Запрос на получение списка из всех проектов для одного пользователя*/
$tasks_sql = 'SELECT t.id, t.name, t.project_id AS name FROM tasks t LEFT JOIN projects p ON p.user_id = t.name';
$task = mysqli_query($con, $tasks_sql);

 /* показывать или нет выполненные задачи*/
$show_complete_tasks = rand(0, 1);
$index_content = include_template('index.php', [
    'list_tasks' => $list_tasks, 
    'show_complete_tasks' => $show_complete_tasks]);

$layout_content = include_template('layout.php', [
    'title' => 'doingsdone', 
    'list_tasks' => $list_tasks, 
    'content' => $index_content, 
    'projects' => $projects
]);

echo $layout_content;



