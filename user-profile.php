<?php
session_start();
require('config/connection.php');

if(!isset($_SESSION['user'])){
    header('location: sign-in.php');
}
include('layouts/header.php');

if(isset($_GET['user_id']) && $_GET['user_id']!='') {
    $id = $_GET['user_id'];
    $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id'"));
//var_dump($user);
    $name = $user['name'];

    ?>

    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                            <div class="main-left-sidebar no-margin">
                                <div class="user-data full-width">
                                    <div class="user-profile">
                                        <div class="username-dt">
                                            <div  class="usr-pic">
                                                <img width="100" style="height: 100px" src="/uploads/userphoto/<?=$user['image']?>" alt="">
                                            </div>
                                        </div><!--username-dt end-->
                                        <div class="user-specs">
                                            <h3><?= $name ?></h3>
                                        </div>
                                    </div><!--user-profile end-->
                                    <ul class="user-fw-status">
                                        <li>
                                            <h4>Following</h4>
                                            <?
                                            $count = mysqli_num_rows(mysqli_query($conn, "SELECT `id` FROM `folow` WHERE `sender_id`='$id'"));
                                            echo "<span>$count</span>"
                                            ?>
                                        </li>
                                        <li>
                                            <h4>Followers</h4>
                                            <?
                                            $count = mysqli_num_rows(mysqli_query($conn, "SELECT `id` FROM `folow` WHERE `resiver_id`='$id'"));
                                            echo "<span>$count</span>"
                                            ?>
                                        </li>
                                        <li>
                                            <?
                                            if($id!=$_SESSION['user']["id"]){
                                                $myid = $_SESSION['user']["id"];
                                                $co = mysqli_num_rows(mysqli_query($conn,"SELECT `id` FROM `folow` WHERE `sender_id`='$myid' AND `resiver_id`='$id'"));
                                                if($co>0){
                                                    $txt = "Unfollow";
                                                }else{
                                                    $txt = "Follow";

                                                }
                                                echo "<a href=\"#\" title=\"\" class=\"btn btn-success follow\" data-id=\"$id\" id=\"user_$id\">$txt</a>";
                                            }
                                            ?>
                                        </li>
                                    </ul>
                                </div><!--user-data end-->

                            </div><!--main-left-sidebar end-->
                        </div>
                        <div class="col-lg-6 col-md-8 no-pd">
                            <div class="main-ws-sec">
                                <div class="posts-section">

                                    <?php
                                    $us = "$id,";
                                    $setflw = "SELECT `resiver_id` FROM `folow` WHERE `sender_id`='$id'";
                                    $setflw = mysqli_query($conn, $setflw);
                                    if (mysqli_num_rows($setflw) > 0) {
                                        while ($set = mysqli_fetch_assoc($setflw)) {
                                            $us .= $set['resiver_id'] . ',';
                                        }
                                    }
                                    $us = mb_substr($us, '0', '-1');

                                    $sql = "SELECT * FROM `posts` WHERE `user_id` IN ($us) ORDER by `id` DESC";
                                    $query = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row = mysqli_fetch_assoc($query)) {
                                            $user_id = $row['user_id'];
                                            $us = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `users` WHERE `id`='$user_id'"));
                                            ?>
                                            <!--post-bar start-->

                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img style="height: 100px"  width="100" src="uploads/userphoto/<?=$us['image']?>" alt="">
                                                        <div class="usy-name">
                                                            <?
                                                            $ussid = $_GET['user_id'];
                                                            if($us['id']!=$ussid){?>    <h3><a href="/user-profile.php?user_id=<?=$row['user_id']?>"><?= $us['name'] ?></a></h3><?}else{?>
                                                          <h3><?= $us['name'] ?></h3>
                                                            <?}?>
                                                            <span><img src="images/clock.png"
                                                                       alt=""><?= $row['date'] ?></span>
                                                        </div>
                                                    </div>
                                                    <!--                                                    <div class="ed-opts">-->
                                                    <!--                                                        <a href="#" title="" class="ed-opts-open"><i-->
                                                    <!--                                                                    class="la la-ellipsis-v"></i></a>-->
                                                    <!--                                                        <ul class="ed-options">-->
                                                    <!--                                                            <li><a href="#" title="" >Edit Post</a></li>-->
                                                    <!--                                                            <li><a href="#" title="Delete">Delete</a></li>-->
                                                    <!--                                                        </ul>-->
                                                    <!--                                                    </div>-->
                                                </div>
                                                <div class="epi-sec">

                                                    <ul class="bk-links">

                                                        <li><a href="/process/twit.php?id=<?=$row['id']?>" title=""><i class="la la-retweet"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <?
                                                if ($row['img'] != '') {
                                                    $image = $row['img'];
                                                    echo '<img src="uploads/postphoto/' . $image . '" alt="" width="200" style="text-align: center">';
                                                }

                                                ?>
                                                <div class="job_descp">

                                                    <p><?= $row['text'] ?> </p>

                                                </div>
                                                <div class="job-status-bar">
                                                    <ul class="like-com">
                                                        <li>
                                                            <?
                                                            $psid = $row['id'];
                                                            $s = mysqli_num_rows(mysqli_query($conn,"SELECT `id` FROM `likes` WHERE `user_id`='$id' AND `post_id`='$psid'"));
                                                            $sty = '';
                                                            if($s>0){
                                                                $sty = "style='color:#e44d3a'";
                                                            }
                                                            $likecount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `likes` WHERE `post_id`='$psid' "))
                                                            ?>
                                                            <a href="#like" class="like" data-id="<?=$row['id']?>" id="posts_<?=$row['id']?>"><i <?=$sty;?>class="la la-heart"></i>Like </a>

                                                            <?
                                                            $psid = $row['id'];
                                                            $likecount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `likes` WHERE `post_id`='$psid' "))

                                                            ?>
                                                            <span style="margin-left:25px " id="count_<?=$row['id']?>"><?=$likecount?></span>
                                                            <div style="margin-left:25px; display: inline-block; " class="btn btn-warning comblock" data-id="<?=$row['id']?>">Комментарии</div>
                                                            <br>
                                                            <div class="com" id="com_<?=$row['id']?>" style="display: none">

                                                                <div class="comment-section">
                                                                    <div class="comment-sec">
                                                                        <ul>
                                                                            <?
                                                                            $com = mysqli_query($conn,"SELECT * FROM `coments` WHERE `post_id`='$psid'");
                                                                            if(mysqli_num_rows($com)>0) {
                                                                                while ($c = mysqli_fetch_assoc($com)) {
                                                                                    $usid = $c['user_id'];
                                                                                    $uss = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$usid'"));
                                                                                    ?>
                                                                                    <li>
                                                                                        <div class="comment-list">
                                                                                            <div class="bg-img">
                                                                                                <img width="50" style="height: 50px;" src="uploads/userphoto/<?=$uss['image']?>"
                                                                                                     alt="">
                                                                                            </div>
                                                                                            <div class="comment">
                                                                                                <h3><?=$uss['name']?></h3>
                                                                                                <div style="display:inline-block;">
                                                                                                    <img src="images/clock.png"
                                                                                                         alt=""> <?=$c['date']?>
                                                                                                </div>
                                                                                                <p><?=$c['comment']?></p>
                                                                                            </div>
                                                                                        </div><!--comment-list end-->
                                                                                    </li>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            ?>

                                                                        </ul>
                                                                    </div><!--comment-sec end-->
                                                                    <div class="post-comment-box">
                                                                        <h3>Добавить комемнтарий</h3>
                                                                        <div class="user-poster">

                                                                            <div class="post_comment_sec">
                                                                                <form class="addcoment" method="post" action="process/addcoment.php" data-id="<?=$row['id']?>">
                                                                                    <textarea placeholder="Текст комментария" class="comText" id="comarea_<?=$row['id']?>"></textarea>
                                                                                    <button  type="submit">Добавить</button>
                                                                                </form>
                                                                            </div><!--post_comment_sec end-->
                                                                        </div><!--user-poster end-->
                                                                    </div><!--post-comment-box end-->
                                                                    <!--mycoment-->
                                                                </div>
                                                        </li>
                                                        <!--													<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>-->
                                                    </ul>
                                                    <!--												<a><i class="la la-eye"></i>Views 50</a>-->
                                                </div>
                                            </div>

                                            <!--post-bar end-->
                                            <?
                                        }
                                    }else{
                                        echo '<p class="alert alert-danger">У пользователя ещё нет постов</p>';
                                    }
                                    ?>


                                </div><!--posts-section end-->
                            </div><!--main-ws-sec end-->
                        </div>
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
        </div>
    </main>


    </div><!--post-project-popup end-->


    </div><!--chatbox-list end-->

    </div><!--theme-layout end-->


    <?php
}
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>