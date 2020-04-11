<?php
session_start();
require ('../config/connection.php');
$id = $_SESSION['user']['id'];
if(isset($_POST)){

    $post_id = $_POST['post_id'];
    $text = $_POST['text'];
    $sql = "INSERT INTO `coments`(`user_id`,`post_id`,`comment`)VALUES('$id','$post_id','$text')";
//    var_dump($sql);
    $sql = mysqli_query($conn,$sql);
    if($sql){
        $image = $_SESSION['user']['image'];

        echo json_encode([
            'status'=>1,
            'post_id'=>$post_id,
            'text'=>$text,
           'image'=>$image,
            'name'=>$_SESSION['user']['name'],
        ]);
    }
}