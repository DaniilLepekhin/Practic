<?php
session_start();
$id = $_SESSION['user']['id'];
require ('../config/connection.php');
if(isset($_POST['post_id'])){
    $post_id = $_POST['post_id'];
    $sql = "SELECT `id` FROM `likes` WHERE `user_id`='$id' AND `post_id`='$post_id'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
        mysqli_query($conn,"DELETE FROM `likes` WHERE `user_id`='$id' AND `post_id`='$post_id' ");
        $count = mysqli_num_rows(mysqli_query($conn,"SELECT `id` FROM `likes` WHERE `post_id`='$post_id'"));

        echo json_encode(['status'=>0,'post_id'=>$post_id,'count'=>$count]);

    }else{
        mysqli_query($conn,"INSERT INTO `likes` (`user_id`,`post_id`)VALUES ('$id','$post_id')");
        $count = mysqli_num_rows(mysqli_query($conn,"SELECT `id` FROM `likes` WHERE `post_id`='$post_id'"));

        echo json_encode(['status'=>1,'post_id'=>$post_id,'count'=>$count]);
    }
}