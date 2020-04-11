<?php
require ('config/connection.php');
foreach ($_GET as $key => $value){
    $query = mysqli_query($conn, "SELECT `url` FROM `posts` WHERE `rnd`='$key'");
    $url = mysqli_fetch_assoc($query);
    $url = $url['url'];
    header("location: $url");
}