<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: sign-in.php');
}
$name = $_SESSION['user']['name'];
$id = $_SESSION['user']['id'];
$image = $_SESSION['user']['image'];
require ('config/connection.php');
include('layouts/header.php');
if(isset($_GET['td'])){
    $td = $_GET['td'];
    mysqli_query($conn,"DELETE FROM `twit` WHERE `user_id`='$id' AND `post_id`='$td'");
}
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
												<div class="usr-pic">
													<img style="height: 100px"   width="100" src="uploads/userphoto/<?=$image?>" alt="">
												</div>
											</div><!--username-dt end-->
											<div class="user-specs">
												<h3><?=$name?></h3>
											</div>
                                            <style>
                                               #imagechange {
                                                    display: none
                                               }
                                            </style>
                                            <button id='val' class="btn btn-success">изменить фото</button>
                                            <form action="process/changephoto.php" method="post" enctype="multipart/form-data" id="change">
                                            <input type="file"  id="imagechange" value="изменить фото" class="btn btn-success" width="100" name="img" accept="image/jpeg, image/png">
                                            </form>
										</div><!--user-profile end-->
										<ul class="user-fw-status">
											<li>
                                                <h4><a href="/folowing.php?id=<?=$id?>"> Following</a></h4>
                                                <?
                                                $count = mysqli_num_rows(mysqli_query($conn,"SELECT `id` FROM `folow` WHERE `sender_id`='$id'"));
                                                echo "<span>$count</span>"
                                                ?>
											</li>
											<li>
												<h4><a href="/folowers.php?id=<?=$id?>"> Followers</a></h4>
                                                <?
                                                $count = mysqli_num_rows(mysqli_query($conn,"SELECT `id` FROM `folow` WHERE `resiver_id`='$id'"));
                                                echo "<span>$count</span>"
                                                ?>
											</li>
											<li>
												<a href="/favorit.php" title="избранное записи">Избранные записи</a>
											</li>
										</ul>
									</div><!--user-data end-->
								</div><!--main-left-sidebar end-->
							</div>
							<div class="col-lg-6 col-md-8 no-pd">
								<div class="main-ws-sec">
									<div class="post-topbar">
										<div class="user-picy">
											<img width="100" style="height: 50px;" src="uploads/userphoto/<?=$_SESSION['user']['image']?>" alt="">
										</div>
										<div class="post-st">
											<ul>
												<li><a class="post_project" href="#" title="">Добавить пост</a></li>
											</ul>
										</div><!--post-st end-->
									</div><!--post-topbar end-->
									<div class="posts-section">

                                <?php
                                $us = "$id,";
//                                $setflw = "SELECT `resiver_id` FROM `folow` WHERE `sender_id`='$id'";
//                                $setflw = mysqli_query($conn,$setflw);
//                                if(mysqli_num_rows($setflw)>0){
//                                    while ($set = mysqli_fetch_assoc($setflw)){
//                                        $us .= $set['resiver_id'].',';
//                                    }
//                                }
                                $ch = mysqli_query($conn,"SELECT * FROM `twit` WHERE `user_id`='$id'");
                                while($t = mysqli_fetch_assoc($ch)){
                                    $us .=$t['post_user_id'].',';

                                }
                                $us = mb_substr($us,'0','-1');
//                                    var_dump($us);
                                $sql = "SELECT * FROM `posts` WHERE `user_id` IN ($us) ORDER by `id` DESC";
//                                var_dump($sql);
                                $query = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($query)>0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        $ps_id = $row['id'];
                                        $us_id = $row['user_id'];
                                        $tset = mysqli_num_rows(mysqli_query($conn,"SELECT `id` FROM `twit` WHERE `user_id`='$id' AND `post_id`='$ps_id'"));
//                                        var_dump($tset);
                                    $user_id = $row['user_id'];
                                    $us = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$user_id'"));

                                        ?>
                                        <!--post-bar start-->

                                        <div class="post-bar" id="post_<?=$row['id']?>">
                                            <?
 $pdid =  $row['id'];
                                            if($tset>0){
                                                echo '<div style="padding: 25px"> You Retweeted</div>';
                                                $pdid =  $row['id'];
                                                $link = "<li><a href='?td=$pdid'>Delete</a></li>";
                                            }else{

                                                $link = "<li><a href=\"#delete\" title=\"Delete\" class=\"delete\" data-id=\"$pdid\">Delete</a></li>";
                                            }
                                            ?>
                                            <div class="post_topbar">
                                                <div class="usy-dt">
                                                    <img width="100" style="height: 100px" height="100" src="uploads/userphoto/<?=$us['image']?>" alt="">
                                                    <div class="usy-name">
                                                        <a href="user-profile.php?user_id=<?=$us['id']?>"><h3><?=$us['name']?></h3></a>
                                                        <span><img src="images/clock.png"
                                                                   alt=""><?=$row['date']?></span>
                                                    </div>
                                                </div>
                                                <div class="ed-opts">
                                                    <a href="#" title="" class="ed-opts-open"><i
                                                                class="la la-ellipsis-v"></i></a>
                                                    <ul class="ed-options">
<!--                                                        <li><a href="#" title="">Edit Post</a></li>-->
<!--                                                        <li><a href="#delete" title="Delete" class="delete" data-id="--><?//=$row['id']?><!--">Delete</a></li>-->
                                                        <?=$link;?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="epi-sec">

                                                <ul class="bk-links">

                                                    <li><a href="#" title=""><i class="la la-retweet"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
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
                                            <div class="job_descp">

                                                <p><?=$row['text']?> </p>
                                                <?
                                                if($row['url']!=''){
                                                    $url =$row['rnd'];
                                                    $host = $_SERVER['HTTP_HOST'];
                                                    echo "<a href='/a?$url' target='_blank'>http://$host/$url</a>";
                                                }
                                                ?>
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


                                                        <span style="margin-left:25px " id="count_<?=$row['id']?>"><?=$likecount?></span>
                                                        <div style="margin-left:25px; display: inline-block; " class="btn btn-warning comblock" data-id="<?=$row['id']?>">Коментария</div>
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
                                                                    <h3>Добавить коментарии</h3>
                                                                    <div class="user-poster">

                                                                        <div class="post_comment_sec">
                                                                            <form class="addcoment" method="post" action="process/addcoment.php" data-id="<?=$row['id']?>">
                                                                                <textarea placeholder="Текст коментарии" class="comText" id="comarea_<?=$row['id']?>"></textarea>
                                                                                <button  type="submit">Добавит</button>
                                                                            </form>
                                                                        </div><!--post_comment_sec end-->
                                                                    </div><!--user-poster end-->
                                                                </div><!--post-comment-box end-->
                                                    <!--mycoment-->
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?
                                    }
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




		<div class="post-popup pst-pj">
			<div class="post-project">
				<h3>Добавить пост</h3>
				<div class="post-project-fields">
					<form action="process/postprocess.php" method="post" id="addpost" enctype="multipart/form-data">
						<div class="row">





                            <div class="col-lg-12">
								<textarea name="description" placeholder="Текст"></textarea>
							</div>

                            <div class="col-lg-12">
                                <input type="file" name="img" accept="image/jpeg, image/png,video/mp4 ">
                            </div>
                            <div class="col-lg-12">
                                <input name="url" placeholder="Ссылка">
                            </div>
							<div class="col-lg-12">
								<ul>
									<li><button class="active" type="submit" value="post">Post</button></li>
									<li><a href="#" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->




		</div><!--chatbox-list end-->

	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>