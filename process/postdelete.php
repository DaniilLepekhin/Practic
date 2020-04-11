<?php
session_start();
$user_id = $_SESSION['user']['id'];
require ('../config/connection.php');
if(isset($_POST['id'])){

    $id = $_POST['id'];
   
    $sql = "SELECT `id` FROM `posts` WHERE `id`='$id' AND `user_id`='$user_id'";
//    var_dump($sql);
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
        mysqli_query($conn,"DELETE FROM `posts` WHERE `id`='$id' AND `user_id`='$user_id' ");
        echo json_encode(['status'=>1,'id'=>$id]);
    }
}