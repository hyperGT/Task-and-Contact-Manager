<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Task Manager</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    
    <header>
        <div class="title">
            <h1>Task Manager</h1>
        </div>
    
        <div class="nav-bar">
            <ul>
                <li>
                    <a href="contactsM.php">Contacts Manager</a>
                </li>
                <li>
                    <a href="index.html">Home</a>
                </li>        
            </ul>
        </div>

    </header>

    <div class="form-container">
        
        <form id="taskForm">
            <fieldset>
                <legend>New Task</legend>
                <label for="taskInput">
                    Task:
                    <input type="text" id="taskInput" name="task">
                </label><br><br>
                <button type="submit">Add Task</button>
            </fieldset>
        </form>
    </div>

    <?php   
    if(isset($_GET['task'])){
        $_SESSION['tasks_list'] [] = $_GET['task'];  // Adding new task to the array. / Adicionando uma nova tarefa ao array.        
    }

    $tasks_list = array();  // Initializing an empty array to store tasks. / Inicializando um array vazio para armazenar as tarefas. 

    if(isset($_SESSION['tasks_list'])) {
        $tasks_list = $_SESSION['tasks_list'];  // Retrieving tasks from the session. / Recuperando as tarefas do sessão.
    }
    ?>

    <div class="table-container">
        <!-- Displaying tasks / Exibindo as tarefas -->
        <table>
            <tr>
                <th>Tasks List:</th>            
            </tr>
            <?php foreach($tasks_list as $task) : ?>
                <tr>
                    <td><?php echo $task;?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
    
</body>
</html>
