<?php

    include "../classes/User.php";

    $user_id = $_GET['user_id'];
    // $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];

    if(empty($_POST['new_password'])){
        $password = $_POST['old_password'];
    }else{
        $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    }

    $user = new User;

    $user->updateUser($user_id, $first_name, $last_name, $username, $password);

?>