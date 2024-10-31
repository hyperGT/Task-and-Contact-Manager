<?php

    session_start();

    // Clearing all tasks 
    if(isset($_GET['action']) && $_GET['action'] == 'clear'){
        unset($_SESSION['tasks_list']);  // Removing all tasks from the session.
    }

    if(isset($_GET['task'])){        
        
        $_SESSION['tasks_list'] [] = $_GET['task'];  // Adding new task to the array. 
    }

    $tasks_list = isset($_SESSION['tasks_list']) ? $_SESSION['tasks_list'] : array();  // Initializing an empty array to store tasks.    

    include './templates/taskTemplatePage.php'; // Including the template page.