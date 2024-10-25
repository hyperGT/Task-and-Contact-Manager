<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts Manager</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body style="background-color:#DA70D6;">
    
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

    <div class="contact-form">

        <form id="contactForm">
            <fieldset>
                <legend>Add New Contact</legend>
                <label for="nameInput">
                    Name:
                    <input type="text" name="contactName">
                    <input type="text">
                </label>
                <label for="emailInput">
                    Email:
                    <input type="text" name="contactEmail">
                <label>
                <label for="phoneInput">
                    Phone:
                    <input type="text" name="contactPhone">
                </label>
                <button type="submit">Add Contact</button>
            </fieldset>
        </form>
    </div>

    <?php

if(isset($_GET['contactName']) && isset($_GET['contactEmail']) && isset($_GET['contactPhone'])){
            // Adding new contact to the array. / Adicionando um novo contato ao array.
            $_SESSION['contacts_name_list'] [] = $_GET['contactName'];
            $_SESSION['contacts_email_list'] = $_GET['contactEmail'];
            $_SESSION['contacts_phone_list'] = $GET['contactPhone'];
        }

        // Initializing an empty array to store contacts.
        $names_list = array();
        $emails_list = array();
        $phones_list = array();

        if(isset($_SESSION['contacts_name_list']) && isset($_SESSION['contacts_email_list']) && isset($_SESSION['contacts_phone_list'])) {
            $names_list = $_SESSION['contacts_name_list'];
            $emails_list = $_SESSION['contacts_email_list'];
            $phones_list = $_SESSION['contacts_phone_list'];  // Retrieving contacts from the session. / Recuperando os contatos do sessão.
        }
    ?>

    <div class="table-container">

        <!-- Displaying contacts / Exibindo os contatos -->
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>

            <?php?>
        </table>
    </div>

</body>
</html>