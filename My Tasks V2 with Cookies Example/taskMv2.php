<?php

session_start();

// Clearing all tasks 
if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    unset($_SESSION['tasks_list']);  // Removing all tasks from the session.
}

// Initializing tasks_list as an empty array if it does not exist
if (!isset($_SESSION['tasks_list'])) {
    $_SESSION['tasks_list'] = []; // Ensuring it is an array
}

// checking if a new task was submitted
if (isset($_GET['name']) && trim($_GET['name']) !== '') {
    
    $new_task = [
        'name' => trim($_GET['name']),
        'description'=> trim($_GET['description'] ?? ''),
        'deadline' => trim($_GET['deadline'] ?? ''),
        'priority' => $_GET['priority'],
        'completed' => isset($_GET['completed']) ? 'Yes' : 'No'
    ];         

    $_SESSION['tasks_list'][] = $new_task;  // Adding the task to the session.
}

// Getting the tasks from the session.
$tasks_list = $_SESSION['tasks_list'];

include './templates/taskTemplatePage.php';  // Including the task template page.