<?php
session_start();
require ('../config/connection.php');
if(isset($_POST)){
    $id = $_SESSION['user']['id'];
    $user_id = $_POST['user_id'];
    $text = $_POST['text'];
    $sql = "INSERT INTO `messages` (`sender_id`,`resiver_id`,`message`)VALUES('$id','$user_id','$text') ";
    $query = mysqli_query($conn,$sql);
    if($query){
        $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id'"));
        echo json_encode(['status'=>1,'message'=>$text,'user_id'=>$user_id,'image'=>$user['image']]);
    }
}