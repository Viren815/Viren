<?php

$name_error = $email_error = " ";
$name = $email = $message = $subject = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $name_error = "Name is required";
    } else {
        $name = test_input($_POST["name"]);

        if(!preg_match(" /^[a-zA-Z]*$/", $name)){
            $name_error = "Only Letters and White spaces are allowed";
        }
    }

    if(empty($_POST["email"])){
        $email_error = "Email is required";
    } else {
        $email = test_input($_POST["email"]);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_error = "Invalid email format";
        }
    }

    if(empty($_POST["subject"])){
        $subject = " "; 
    } else {
        $subject = test_input($_POST["subject"]);
    }

    if(empty($_POST["message"])){
        $message = " "; 
    } else {
        $message = test_input($_POST["message"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
