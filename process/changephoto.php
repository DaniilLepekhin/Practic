<?php
session_start();
$id = $_SESSION['user']['id'];
require ('../config/connection.php');
if($_FILES['img']['name']!=''){
    $imgname  = uniqid().$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']["tmp_name"],"../uploads/userphoto/$imgname");
    $sql = mysqli_query($conn,"UPDATE `users` SET `image`='$imgname' WHERE `id`='$id'");
    $_SESSION['user']['image']=$imgname;

    header('location: ../index.php');


}else{
    header('location: ../index.php');

}