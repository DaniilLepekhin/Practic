<?php
session_start();
$id = $_SESSION['user']['id'];
require ('../config/connection.php');
if(isset($_POST['user_id'])){
$user_id = $_POST['user_id'];
    $sql = "SELECT `id` FROM `folow` WHERE `sender_id`='$id' AND `resiver_id`='$user_id'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
        mysqli_query($conn,"DELETE FROM `folow` WHERE `sender_id`='$id' AND `resiver_id`='$user_id' ");
        echo json_encode(['status'=>0,'user_id'=>$user_id]);

    }else{
        mysqli_query($conn,"INSERT INTO `folow` (`sender_id`,`resiver_id`)VALUES ('$id','$user_id')");
        echo json_encode(['status'=>1,'user_id'=>$user_id]);
    }
}