<?php
session_start();
require ('../config/connection.php');
if(isset($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `users` WHERE `email`='$email'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0) {
        $row = mysqli_fetch_assoc($query);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user']['id'] = $row['id'];
            $_SESSION['user']['name'] = $row['name'];
            $_SESSION['user']['email'] = $row['email'];
            $_SESSION['user']['password'] = $row['password'];
            $_SESSION['user']['image'] = $row['image'];
            echo json_encode(['status'=>1]);
        }else{
            echo json_encode(['status'=>0]);

        }
    }else{
        echo json_encode(['status'=>0]);

    }
}