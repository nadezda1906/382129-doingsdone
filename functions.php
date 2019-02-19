<?php


function include_template($name, $data) {
    $name = 'templates/'.$name;
    $result = '';
    if (!is_readable($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require $name;
    $result = ob_get_clean();
    return $result;
}

function countTasks($project_id, $tasks) {
    $n = 0;
    foreach ($tasks as $key => $val) {
        if ($project_id == $val['project_id']) {
            $n++;
        }
    }
    return $n;
}

function getDiffHours($task_date) {
    $task_timestamp = strtotime($task_date);
    $now = strtotime('now');
    $diff_hours = floor(($task_timestamp - $now) / 3600);
    return $diff_hours;
}