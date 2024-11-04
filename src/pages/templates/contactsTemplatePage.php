<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts Manager</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/contacts.css">
</head>

<body>

    <header>
        <div class="title">
            <h1>Contacts Manager</h1>
        </div>

        <div class="nav-bar">
            <ul>
                <li>
                    <a href="taskM.php">Tasks Manager</a>
                </li>
                <li>
                    <a href="index.html">Home</a>
                </li>
            </ul>
        </div>

    </header>

    <div class="form-container">

        <form id="contactForm">
            <fieldset>
                <legend>Add New Contact</legend>
                <label for="nameInput">
                    Name:
                    <input type="text" name="contactName">
                </label>
                <label for="phoneInput">
                    Phone:
                    <input type="text" name="contactPhone">
                </label><br><br>
                <label for="emailInput">
                    Email:
                    <input type="text" name="contactEmail">
                </label><br><br>
                <label for="descriptionInp">
                    Description:
                    <textarea name="contactDescription"></textarea>
                </label><br><br>
                <label for="birthdayInput">
                    Birthday:
                    <input type="date" name="contactBirthday">
                </label><br><br>
                <label for="favoriteCheckbox">
                    Mark as favorite contact:
                    <input type="checkbox" name="favorite" value="y">
                </label><br><br>

                <button type="submit">Add Contact</button>
                <button type="submit" name="action" value="clear">Clear Contacts List</button>
            </fieldset>
        </form>
    </div>


    <div class="table-container">

        <!-- Displaying contacts / Exibindo os contatos -->
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Description</th>
                <th>Birthday</th>
                <th>Favorite</th>
            </tr>

            <?php if (is_array($contacts_list) && !empty($contacts_list)) : ?>
                <?php foreach ($contacts_list as $contact) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($contact['name']) ?></td>
                        <td><?php echo htmlspecialchars($contact['email']) ?></td>
                        <td><?php echo htmlspecialchars($contact['phone']) ?></td>
                        <td><?php echo htmlspecialchars($contact['description']) ?></td>
                        <td><?php echo htmlspecialchars($contact['birthday']) ?></td>
                        <td class="favorite-column"><?php echo $contact['favorite'] === 'yes' ? '⭐' : null ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">No contacts list available</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>

</body>

</html>