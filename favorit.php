<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: sign-in.php');
    die;
}
$id = $_SESSION['user']['id'];
require ('config/connection.php');
include ('layouts/header.php');
if(isset($_GET['delete'])){
    $delid = $_GET['delete'];
    $sql = "DELETE FROM `likes` WHERE `post_id`='$delid' AND `user_id`='$id'";
//    var_dump($sql);
    mysqli_query($conn,$sql);
}
?>

    <section class="forum-sec">
        <div class="container">

            <div class="forum-links-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </section>

    <section class="forum-page">
        <div class="container">
            <div class="forum-questions-sec">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="forum-questions">


                                <?php
                                $posts = '';
                                $set = "SELECT * FROM `likes` WHERE `user_id`='$id'";
                                $query = mysqli_query($conn,$set);
                                if(mysqli_num_rows($query)>0) {
                                    while ($s = mysqli_fetch_assoc($query)) {
                                        $posts .= $s['post_id'] . ',';
                                    }
                                    $posts = mb_substr($posts, '0', '-1');
                                    $sql = "SELECT * FROM `posts` WHERE `id` IN ($posts) ORDER by `id` DESC";

                                    $query = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <div class="usr-question">

                                            <div class="usr_quest">
                                                <h3><?=$row['text']?></h3>
                                                <?
                                                if($row['img']!='') {
                                                    $image = $row['img'];
                                                    if($row['video']!=1) {
                                                        echo '<img src="uploads/postphoto/' . $image . '" alt="" width="200" style="text-align: center">';
                                                    }else{
                                                        ?>
                                                        <center>
                                                            <video width="400" controls>
                                                                <source src="uploads/postvideo/<?=$row['img']?>" type="video/mp4">
                                                                Your browser does not support HTML5 video.
                                                            </video>
                                                        </center>

                                                        <?
                                                    }
                                                }

                                                ?>
                                            </div><!--usr_quest end-->
                                            <span class="quest-posted-time"><i
                                                        class="fa fa-clock-o"></i><?=$row['date']?><br>
                                                                                        <a href="?delete=<?=$row['id']?>">Удалить</a>

                                            </span>
                                        </div><!--usr-question end-->
                                        <?php
                                    }
                                }

                                  ?>

                        </div><!--forum-questions end-->

                    </div>

                </div>
            </div><!--forum-questions-sec end-->
        </div>
    </section><!--forum-page end-->






</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>


</body>
</html>