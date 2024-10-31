
<!DOCTYPE html>
<html lang="pt-br">
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
                <button type="submit" name="action" value="clear">Remove All Tasks</button>
            </fieldset>
        </form>
    </div>


    <div class="table-container">
        <!-- Displaying tasks  -->
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
