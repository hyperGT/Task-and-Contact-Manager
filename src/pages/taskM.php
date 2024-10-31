<?php

session_start();


$feedback = '';

// Clearing all tasks 
if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    unset($_SESSION['tasks_list']);  // Removing all tasks from the session.
}

// Initializing tasks_list as an empty array if it does not exist
if (!isset($_SESSION['tasks_list'])) {
    $_SESSION['tasks_list'] = []; // Ensuring it is an array
}

// checking if a new task was submitted
if (isset($_GET['name']) && $_GET['name'] !== '') {
    
    $new_task = [
        'name' => $_GET['name'],
        'description'=> $_GET['description']?? '',
        'deadline' => $_GET['deadline']?? '',
        'priority' => $_GET['priority'],
        'completed' => isset($_GET['completed']) ? 'Yes' : 'No'
    ];         

    
    if(!empty(($new_task['name']))){
        $_SESSION['tasks_list'][] = $new_task;  // Adding the task to the session.

        // Message indicating successful addition of the task
        $feedback = "Task '{$new_task['name']}' added successfully!";
    }else {
        $feedback = "The task name cannot be empty!";
    }

}

$tasks_list = $_SESSION['tasks_list']??[]; // Getting the tasks from the session.
$tasks_list = array_filter($tasks_list, 'is_array'); // Removing any empty tasks.

/*var_dump($tasks_list); // Debugging purposes.*/
include './templates/taskTemplatePage.php'; // Including the template page.


/*
Especial Note: the function 'trim' can be used to remove leading and trailing whitespaces from the task name and others variables.

Objectives: Resolve the 'Cannot access offset of type string on string Error in PHP' error
*/
