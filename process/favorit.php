<?php
session_start();
require ('../config/connection.php');
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $user_id = $_SESSION['user']['id'];
    $check = "SELECT * FROM `favorit` WHERE `user_id`='$user_id' AND `post_id`='$id'";
    $check = mysqli_query($conn,$check);
    if(mysqli_num_rows($check)>0){
        mysqli_query($conn,"DELETE FROM `favorit` WHERE `user_id`='$user_id' AND `post_id`='$id'");
        echo json_encode(['status'=>0,'post_id'=>$id]);
    }else{
        $sql = "INSERT INTO `favorit` (`user_id`,`post_id`) VALUES ('$user_id','$id')";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo json_encode(['status'=>1,'post_id'=>$id]);
        }
    }
}