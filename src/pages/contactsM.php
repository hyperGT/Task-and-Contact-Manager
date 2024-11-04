<?php

session_start();
    

    // cleaning the current session
    if(isset($_GET['action']) && $_GET['action'] === 'clear'){
        // Clear the contacts list
        unset($_SESSION['contacts_list']);
    }

    // Check if the contact form was submitted     
    if(!isset($_SESSION['contacts_list'])) {
        $_SESSION['contacts_list'] = [];
    }

    if(isset($_GET['contactName']) && isset($_GET['contactEmail']) && isset($_GET['contactPhone'])) {
        // Create a new contact 
        $new_contact = [
            'name' => $_GET['contactName'],
            'email' => $_GET['contactEmail'],
            'phone' => $_GET['contactPhone'],
            'description' => $_GET['contactDescription'] ?? '',
            'birthday' => $_GET['contactBirthday'] ?? '',
            'favorite' => isset($_GET['favorite']) ? 'yes' : 'no'
        ];

        $_SESSION['contacts_list'][] = $new_contact; // Add the new contact to the contacts list
    }

    $contacts_list = $_SESSION['contacts_list'];    // Upadate the contacts list with the new contact

    /*var_dump($contacts_list);*/
    include './templates/contactsTemplatePage.php'; // including the template page