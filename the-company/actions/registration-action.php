<?php
    include "../classes/User.php";

    # GATHER THE FORM DATA
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $username   = $_POST['username'];
    $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);
                // password_hash(target, hash_method)

    # CREATE THE OBJECT
    $user = new User;

    # CALL THE METHOD
    $user->createUser($first_name, $last_name, $username, $password);
?>