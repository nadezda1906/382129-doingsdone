<?php

require_once 'data.php';
require_once 'functions.php';

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

$index_content = include_template('index.php', [
    'list_tasks' => $list_tasks, 
    'show_complete_tasks' => $show_complete_tasks
]);

$layout_content = include_template('layout.php', [
    'title' => 'doingsdone', 
    'list_tasks' => $list_tasks, 
    'content' => $index_content, 
    'projects' => $projects
]);

echo $layout_content;