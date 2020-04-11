<?php
session_start();
require ('../config/connection.php');
if(isset($_POST)){
    $user_id = $_POST['user_id'];
    $id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM `messages` WHERE `sender_id`='$user_id' AND `resiver_id`='$id' AND `status`='0' ORDER by `id` DESC LIMIT 1";
    $query = mysqli_query($conn,$sql);
    if (mysqli_num_rows($query)>0){
        $row = mysqli_fetch_assoc($query);
        $mesid = $row['id'];
        mysqli_query($conn,"UPDATE `messages` SET `status`='1' WHERE `id`='$mesid'");
        $usid = $row['sender_id'];
        $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$usid'"));

        echo json_encode(
            [
                'status'=>1,
                'message'=>$row['message'],
                'image'=>$user['image'],



            ]
        );
    }
}