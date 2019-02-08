<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);

 $projects = ["Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];

 $list_tasks = [
                0 => ['task' => 'Собеседование в IT-компании',
                      'date' => '01.12.2019',
                      'category' => 'Работа',
                      'perfomance' => 'Нет'
                ],
                1 => ['task' => 'Выполнить тестовое задание',
                      'date' => '25.12.2019',
                      'category' => 'Работа',
                      'perfomance' => 'Нет'
                ],
                2 => ['task' => 'Сделать задание 1 раздела',
                      'date' => '21.12.2019',
                      'category' => 'Учеба',
                      'perfomance' => 'Нет'
                ],           
                3 => ['task' => 'Встреча с другом',
                      'date' => '22.12.2019',
                      'category' => 'Входящие',
                      'perfomance' => 'Да'
                ],
                4 => ['task' => 'Купить корм для кота',
                      'date' => 'Нет',
                      'category' => 'Домашние дела',
                      'perfomance' => 'Нет'
                ],
                5 => ['task' => 'Заказать пиццу',
                      'date' => 'Нет',
                      'category' => 'Домашние дела',
                      'perfomance' => 'Да'
                ]
               ];

require_once('functions.php');
$index_content = include_template('index.php',['list_tasks' => $list_tasks, 'show_complete_tasks' => '$show_complete_tasks']);
$layout_content = include_template('layout.php', ['title' => 'doingsdone', 'list_tasks' => $list_tasks, 'content' => $index_content, 'projects' => $projects]);
print($layout_content);

?>
  