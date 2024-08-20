<?php

declare(strict_types=1);

function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";
        echo "error check";

        foreach ($errors as $error) {
            echo '<p class="form-error">' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
        } 
        
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && isset($_GET["signup"]) == "success") {
        echo '<br>';
        echo '<p class="form-success">Signup success!</p>';
    }
}

function signup_inputs() {

    if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION["signup_data"]["username"] . '">';
    } else {
        echo '<input type="text" name="username" placeholder="Username">';
    }

    echo '<input type="password" name="pwd" placeholder="Password">';

    if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo '<input type="text" name="email" placeholder="E-mail" value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        echo '<input type="text" name="email" placeholder="E-mail">';
    }
}
