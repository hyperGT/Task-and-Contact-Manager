<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
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
                </label><br><br>
                <label for="emailInput">
                    Email:
                    <input type="text" name="contactEmail">
                <label>
                <label for="phoneInput">
                    Phone:
                    <input type="text" name="contactPhone">
                </label><br><br>
                <button type="submit">Add Contact</button>
            </fieldset>
        </form>
    </div>

    <?php
        // verifica se a sessão de contatos não existe e cria ela caso não exista
        if(!isset($_SESSION['contacts_list'])) {
            $_SESSION['contacts_list'] = [];
        }

        if(isset($_GET['contactName']) && isset($_GET['contactEmail']) && isset($_GET['contactPhone'])) {
            // cadastra um novo contato 
            $new_contact = [
                'name' => $_GET['contactName'],
                'email' => $_GET['contactEmail'],
                'phone' => $_GET['contactPhone']
            ];
            $_SESSION['contacts_list'][] = $new_contact;  // guarda o novo contato na sessão
        }

        $contacts_list = $_SESSION['contacts_list'];    // atualiza a lista de contatos
    ?>

    <div class="table-container">

        <!-- Displaying contacts / Exibindo os contatos -->
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>

            <?php foreach($contacts_list as $contact) :?>
                <tr>
                    <td><?php echo htmlspecialchars($contact['name'])?></td>
                    <td><?php echo htmlspecialchars($contact['email'])?></td>
                    <td><?php echo htmlspecialchars($contact['phone'])?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>

</body>
</html>