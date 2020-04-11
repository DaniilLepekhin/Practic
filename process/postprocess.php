<?php
session_start();
require ('../config/connection.php');
if(!isset($_SESSION['user'])){
    header('location: sign-in.php');
die;
}
$id = $_SESSION['user']['id'];
if(isset($_POST)){
//    var_dump($_FILES);
    $desc = $_POST['description'];
    $imgname = '';
   {
        if ($_FILES['img']['name'] != '') {
            if($_FILES['img']['type']=='video/mp4'){
                $video = '1';
                $imgname = uniqid() . $_FILES['img']['name'];
                move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/postvideo/' . $imgname);
            }else {
                $video = '';
                $imgname = uniqid() . $_FILES['img']['name'];
                move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/postphoto/' . $imgname);
            }
        }
    }

    $user_img = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id'"));
    $usimg = $user_img['image'];
    $time = time();
    $url ='';
    if($_POST['url']!=''){
        $url = $_POST['url'];
    }
    function generateRandomString($length = 5) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $rnd = generateRandomString();
    $sql = "INSERT INTO `posts` (`user_id`,`text`,`img`,`time`,`video`,`url`,`rnd`)VALUES('$id','$desc','$imgname','$time','$video','$url','$rnd')";
    $query = mysqli_query($conn,$sql);

  
    if($query){
        echo json_encode([
            'status'=>1,
            'image'=>$imgname,
            'desc'=>$desc,
            'video'=>$video,
            'usimg'=>$usimg , 
            'url'=>'http://'.$_SERVER['HTTP_HOST'].'/a?'.$rnd,
        
        ]);
    }else{
        echo 'no';
    }

}