    <?php

    $msg = "";
    $tasks_list = array();  // Initializing an empty array to store tasks.;

    if (isset($_COOKIE['tasks_list'])) {
        $tasks_list = json_decode($_COOKIE['tasks_list'], true);  // Retrieving tasks from the cookie.
    }

    if (isset($_GET['task']) && !empty($_GET['task'])) {

        // Adding new task to the cookie.
        $tasks_list[] = $_GET['task'];
        setcookie('tasks_list', json_encode($tasks_list), time() + (86400 * 30), "/");  // Cookie expires in 30 days.
    }

    // Clearing all tasks 
    if (isset($_GET['action']) && $_GET['action'] == 'clear') {
        setcookie('tasks_list', '', time() - 3600, "/");  // Removing all tasks from the session.
        $tasks_list = []; 
        $msg = "Tasks cleared successfully! Please refresh the page to see the changes.";
    }
?>

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

        </header>

        <div class="form-container">

            <form id="taskForm" method="get">
                <fieldset>
                    <legend>New Task</legend>
                    <label for="taskInput">
                        Task:
                        <input type="text" id="taskInput" name="task">
                    </label><br><br>
                    <label for="prioritySelect">
                        Priority:
                        <select name="priority" id="prioritySelector">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </label><br><br>
                    <button type="submit">Add Task</button>
                    <button type="submit" name="action" value="clear">Remove All Tasks</button>
                </fieldset>
            </form>

        </div>

        <?php if ($msg): ?>
            <p><?php echo $msg; ?></p>
        <?php endif; ?>


        <div class="table-container">
            <!-- Displaying tasks  -->
            <table>
                <tr>
                    <th>Tasks List:</th>
                </tr>
                <?php foreach ($tasks_list as $task) : ?>
                    <tr>
                        <td><?php echo $task; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </body>

    </html>