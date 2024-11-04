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

                <label for="nameInput">
                    Task:<br>

                    <input type="text" id="taskInput" name="name">
                </label><br><br>

                <label for="descriptionInput">
                    Description(Optional):<br>

                    <textarea id="descInput" name="description" placeholder="Insert a description for this task(optional)"></textarea>
                </label><br>

                <label for="deadlineInput">
                    Deadline:<br>

                    <input type="text" id="deadlineInput" name="deadline">
                </label><br><br>

                <fieldset>
                    <legend>Priority</legend>
                    <label for="prioritySelect">
                        <input type="radio" name="priority" value="low" checked>Low
                        <input type="radio" name="priority" value="medium">Medium
                        <input type="radio" name="priority" value="high">High
                    </label>
                </fieldset><br><br>

                <label for="checkBox">
                    Tarefa Concluída:
                    <input type="checkbox" name="completed" value="y">
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
                <th>Task</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Priority</th>
                <th>Completed</th>
            </tr>

            <?php if (is_array($tasks_list) && !empty($tasks_list)) : ?>
                <?php foreach ($tasks_list as $task) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($task['name']); ?></td>
                        <td><?php echo htmlspecialchars($task['description']); ?></td>
                        <td><?php echo htmlspecialchars($task['deadline']); ?></td>
                        <td><?php echo htmlspecialchars($task['priority']); ?></td>
                        <td><?php echo $task['completed'] === 'y' ? '⭐' : NULL; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">No tasks available.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

    <p><?php echo $feedback;?></p>

</body>

</html>