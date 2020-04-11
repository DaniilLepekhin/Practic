<?php
require ('config/connection.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $link = mysqli_fetch_assoc(mysqli_query($conn,"SELECT `url` FROM `posts` WHERE `id`='$id'"));
    $url = $link['url'];
//    var_dump($url);
    header("location: $url");
}