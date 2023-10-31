<?php
$firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : null;
$lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : null;
$email = isset($_POST["email"]) ? $_POST["email"] : null;

$errors = [
    'FirstNameError' => null,
    'LastNameError' => null,
    'EmailAddressError' => null,

];

if (isset($_POST["submit"])) {


    if (empty($firstName) || preg_match('/\d/', $firstName)) {
        $errors['FirstNameError'] = 'First Name empty or wrong';
    }

    if (empty($lastName) || preg_match('/\d/', $lastName)) {
        $errors['LastNameError'] = 'Last Name empty or wrong';
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['EmailAddressError'] = 'Email Address empty or wrong';
    }

    if (!array_filter($errors)) {
        $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
        $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);

        $sql = "INSERT INTO users(firstName, lastName, email) VALUES ('$firstName', '$lastName', '$email')";

        if (mysqli_query($conn, $sql)) {
            header('location:' . $_SERVER['PHP_SELF']);
        } else {
            echo mysqli_error($conn);
        }
    }
}
