<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: sign-in.php');
}
include ('layouts/header.php');
require ('config/connection.php');
$id = $_SESSION['user']['id'];
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $check = mysqli_query($conn,"SELECT * FROM `message_details` WHERE `sender_id`='$id' AND `resiver_id`='$user_id' OR `sender_id`='$user_id' AND `resiver_id`='$id' ");
    if(mysqli_num_rows($check)==0){
        mysqli_query($conn,"INSERT INTO `message_details` (`sender_id`,`resiver_id`) VALUES ('$id','$user_id')");
    }
}
if(isset($_GET['delete'])){
    $did = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM `messages` WHERE `sender_id`='$id' AND `resiver_id`='$did' OR `sender_id`='$did' AND `resiver_id`='$id' ");
}
?>



		<section class="messages-page">
			<div class="container">
				<div class="messages-sec">
					<div class="row">
						<div class="col-lg-4 col-md-12 no-pdd">
							<div class="msgs-list">
								<div class="msg-title">
									<h3>Messages</h3>
									<ul>
										<li><a href="#" title=""><i class="fa fa-cog"></i></a></li>
										<li><a href="#" title=""><i class="fa fa-ellipsis-v"></i></a></li>
									</ul>
								</div><!--msg-title end-->
								<div class="messages-list">
									<ul>
                                        <?
                                        $sql = "SELECT * FROM `message_details` WHERE  `sender_id`='$id'  OR `resiver_id`='$id'";
//                                        var_dump($sql);
                                        $query = mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($query)>0) {
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                if ($row['sender_id'] == $id) {
                                                    $usid = $row['resiver_id'];
                                                    $us = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$usid'"))
                                                    ?>
                                                    <li>
                                                        <div class="usr-msg-details">
                                                            <a href="messages.php?user_id=<?=$us['id']?>">
                                                                <div class="usr-ms-img">
                                                                <img width="100" style="height: 50px;" src="uploads/userphoto/<?=$us['image']?>" alt="">
                                                            </div>
                                                            <div class="usr-mg-info">
                                                                <a href="user-profile.php?user_id=<?=$us['id']?>">  <h3><?=$us['name']?></h3></a>
                                                            </div><!--usr-mg-info end--></a>
                                                        </div><!--usr-msg-details end-->
                                                    </li>

                                                    <?
                                                }else{
                                                    $usid = $row['sender_id'];
                                                    $us = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$usid'"))
                                                    ?>
                                                    <li >
                                                          <div class="usr-msg-details">
                                                              <a href="messages.php?user_id=<?=$us['id']?>"><div class="usr-ms-img">
                                                                <img width="100" style="height: 50px;" src="uploads/userphoto/<?=$us['image']?>" alt="">
                                                            </div>
                                                            <div class="usr-mg-info">
                                                                <h3><?=$us['name']?></h3>
                                                            </div><!--usr-mg-info end-->  </a>
                                                        </div><!--usr-msg-details end-->

                                                    </li>

                                                    <?

                                                }
                                            }
                                        }
                                        ?>
									</ul>
								</div><!--messages-list end-->
							</div><!--msgs-list end-->
						</div>
						<div class="col-lg-8 col-md-12 pd-right-none pd-left-none">
							<div class="main-conversation-box">
								<div class="message-bar-head">
                                    <?$us = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$user_id'"));

                                    ?>
									<div class="usr-msg-details">
										<div class="usr-ms-img">
                                            <a href="user-profile.php?user_id=<?=$us['id']?>"><img  width="50"  height="50px" src="uploads/userphoto/<?=$us['image']?>" alt=""></a>
										</div>
										<div class="usr-mg-info">
                                            <a href="user-profile.php?user_id=<?=$us['id']?>"><h3><?=$us['name']?></h3></a>
										</div><!--usr-mg-info end-->
									</div>
                                    <a href="#" title="" class="ed-opts-open"><i
                                                class="la la-ellipsis-v"></i></a>
                                    <ul class="ed-options">
                                        <!--                                                        <li><a href="#" title="">Edit Post</a></li>-->
                                        <!--                                                        <li><a href="#delete" title="Delete" class="delete" data-id="--><?//=$row['id']?><!--">Delete</a></li>-->
                                     <a href="?delete=<?=$us['id']?>"> Удалить историю</a>
                                    </ul>
								</div><!--message-bar-head end-->
								<div class="messages-line" style="margin-top: 150px; ">
                                    <div class="mesi">
                                    <?php
                                    $sql = "SELECT * FROM `messages` WHERE `sender_id`='$id' AND `resiver_id`='$user_id' OR  `sender_id`='$user_id' AND `resiver_id`='$id'";
                                    $query = mysqli_query($conn,$sql);
                                    if(mysqli_num_rows($query)>0){
                                        while ($row = mysqli_fetch_assoc($query)){
                                            $msid = $row['id'];
                                            mysqli_query($conn,"UPDATE `messages` SET `status`='1' WHERE `id`='$msid'");
                                    if($row['sender_id']==$user_id) {
                                        ?>
                                        <div class="main-message-box st3">
                                            <div class="message-dt st3">
                                                <div class="message-inner-dt">
                                                    <p><?=$row['message']?></p>
                                                </div><!--message-inner-dt end-->
                                                <span><?=$row['date']?></span>
                                            </div><!--message-dt end-->
                                            <div class="messg-usr-img">
                                                <a href="user-profile.php?user_id=<?=$us['id']?>"><img width="50" style="height: 50px;" src="uploads/userphoto/<?=$us['image']?>" alt=""></a>
                                            </div><!--messg-usr-img end-->
                                        </div><!--main-message-box end-->

                                        <?
                                    }else{
                                        ?>


									<div class="main-message-box ta-right" style=" margin-top: 25px;" >
										<div class="message-dt">
											<div class="message-inner-dt" >
                                                <?
                                                if(strlen($row['message'])<25){
                                                    $st = "440px";
                                                }else{
                                                    $st = '130px';
                                                }
                                                ?>
												<p class="float-right" style="margin-left: <?=$st?>!important;" ><?=$row['message']?></p>
											</div><!--message-inner-dt end-->
											<span><?=$row['date']?></span>
										</div><!--message-dt end-->
										<div class="messg-usr-img">
											<img width="50" style="height: 50px;"  src="uploads/userphoto/<?=$_SESSION['user']['image']?>" alt="">
										</div>
									</div>
<?}
                                        }
                                    }
?></div>
                                    <div id="last"></div>


								</div><!--messages-line end-->
								<div class="message-send-area">
									<form id="mesform">
										<div class="mf-field">
											<input type="text" name="message" id="message" placeholder="Type a message here" autocomplete="off">
											<button type="submit" class="send" data-id="<?=$user_id?>">Send</button>
										</div>
<!--										<ul>-->
<!--											<li><a href="#" title=""><i class="fa fa-smile-o"></i></a></li>-->
<!--											<li><a href="#" title=""><i class="fa fa-camera"></i></a></li>-->
<!--											<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>-->
<!--										</ul>-->
									</form>
								</div><!--message-send-area end-->
							</div><!--main-conversation-box end-->
						</div>
					</div>
				</div><!--messages-sec end-->
			</div>
		</section><!--messages-page end-->



		

	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script>
    $('#mesform').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var text = $('#message').val();
        var user_id = $('.send').data('id');
        if (text != '') {
            $.ajax({
                url: "process/messages.php",
                type: "POST",
                dataType: "JSON",
                data: {
                    user_id: user_id,
                    text: text,
                },
                success: function (data) {
                    $('#message').val('');
                    // data = JSON.parse(data);
                    if (data.status == 1) {

                        var divs = "<div class=\"main-message-box ta-right\">" +
                            "<div class=\"message-dt\">" +
                            "<div class=\"message-inner-dt\">" +
                            "<p class=\"float-right\" style=\"margin-left: 440px!important;\">" + data.message + "</p>" +
                            "</div><!--message-inner-dt end-->" +
                            "<span>0 минут назат</span>" +
                            "</div><!--message-dt end-->" +
                            "<div class=\"messg-usr-img\">" +
                            "<img src='uploads/userphoto/" + data.image + "' alt=\"\" class=\"mCS_img_loaded\">" +
                            "</div>" +
                            "</div>";
                        $('.mesi').append(divs);

                    }
                }
            })
        }
    })
    setInterval(function () {
        $.ajax({
            url:"process/checkmess.php",
            type: "POST",
            dataType: "JSON",
            data:{
                user_id:<?echo $user_id;?>
            },
            success:function (data) {
                if(data.status==1){
                    var aps = "<div class=\"main-message-box st3\">\n" +
                        "<div class=\"message-dt st3\">\n" +
                        "<div class=\"message-inner-dt\">\n" +
                        "<p>"+data.message+"</p>\n" +
                        "</div><!--message-inner-dt end-->\n" +
                        "<span>0 мин назад</span>\n" +
                        "</div><!--message-dt end-->\n" +
                        "<div class=\"messg-usr-img\">\n" +
                        "<img width=\"100\" src=\"uploads/userphoto/"+data.image+"\" alt=\"\" class=\"mCS_img_loaded\">\n" +
                        "</div><!--messg-usr-img end-->\n" +
                        "</div>";
                    $('.mesi').append(aps);

                    var container = $('.messages-line '),
                        scrollTo = $('#last');

                    container.scrollTop(
                        scrollTo.offset().top - container.offset().top
                    );
                }
            }
        })
    },1000)
</script>
</body>
</html>