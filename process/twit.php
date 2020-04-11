<?php
session_start();
require ('../config/connection.php');
if(isset($_GET['id'])){
    $id = $_SESSION['user']['id'];
    $post_id = $_GET['id'];
    $se  ="SELECT * FROM `posts` WHERE `id`='$post_id'";
//    var_dump($se);
    $us = mysqli_fetch_assoc(mysqli_query($conn,$se));
    $post_user_id = $us['user_id'];
    $sql = "INSERT INTO `twit` (`user_id`,`post_id`,`post_user_id`)VALUES('$id','$post_id','$post_user_id')";
    $query = mysqli_query($conn,$sql);
    if($query){

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}