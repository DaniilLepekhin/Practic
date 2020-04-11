<?php
session_start();
$id = $_SESSION['user']['id'];
require ('config/connection.php');
include ('layouts/header.php');
$search = $_GET['search'];
if($search!='') {
    ?>



    <section class="companies-info">
    <div class="container">
    <div class="company-title">
        <h3>Результаты поиска</h3>
    </div><!--company-title end-->
    <div class="companies-list">
    <div class="row">


    <?php
    $sql = "SELECT * FROM `users` WHERE name LIKE '%$search%'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
while ($row = mysqli_fetch_assoc($query)) {

    ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <div class="company_profile_info">
            <div class="company-up-info">
                <img width="100" height="100px" src="uploads/userphoto/<?=$row['image']?>" alt="">
                <h3><?=$row['name']?></h3>
                <ul>
                    <?
                    $user_id = $row['id'];
                    $check = "SELECT * FROM `folow` WHERE `sender_id`='$id' AND `resiver_id`='$user_id'";
                    $check = mysqli_query($conn,$check);
                    if(mysqli_num_rows($check)>0){
                        $txt = "Unfollow";
                    }else{
                        $txt = "Follow";
                    }
                    ?>
                    <li><a href="#" title="" class="follow" data-id="<?=$row['id']?>" id="user_<?=$row['id']?>"><?=$txt?></a></li>
                    <li><a href="/messages.php?user_id=<?=$row['id']?>" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
            <a href="/user-profile.php?user_id=<?=$row['id']?>" title="" class="view-more-pro">View Profile</a>
        </div><!--company_profile_info end-->
    </div>
        <?
}
        ?>
    </div>
    </div><!--companies-list end-->

    </div>
    </section><!--companies-info end-->


    </div><!--theme-layout end-->


    <?php

    }
}
?>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script>

</script>
</body>
</html>