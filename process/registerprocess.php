<?php
session_start();
require ('../config/connection.php');
if(isset($_POST)) {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    $scheck = "SELECT `id` FROM `users` WHERE `email` = '$email'";
    $scheck = mysqli_query($conn, $scheck);
    if (mysqli_num_rows($scheck) > 0) {
        echo json_encode(['status' => 0]);
    } else {
        $password = crypt($password, '');
        $sql = "INSERT INTO `users` (`name`,`email`,`password`)VALUES ('$name','$email','$password')";
        $query = mysqli_query($conn, $sql);
        echo json_encode(['status' => 1]);
    }
}