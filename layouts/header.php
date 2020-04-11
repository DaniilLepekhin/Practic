<?php
session_start();
$name = $_SESSION['user']['name'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>WorkWise Html Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>


<body>


<div class="wrapper">



    <header>
        <div class="container">
            <div class="header-data">
                <div class="logo">
                    <a href="index.php" title=""><img src="images/logo.png" alt=""></a>
                </div><!--logo end-->
                <div class="search-bar">
                    <form action="profiles.php" method="get">
                        <input type="text" name="search" placeholder="Search...">
                        <button type="submit"><i class="la la-search"></i></button>
                    </form>
                </div><!--search-bar end-->
                <nav>
                    <ul>
                        <li>
                            <a href="/index.php" title="">
                                <span><img src="images/icon1.png" alt=""></span>
                                Моя страница
                            </a>
                        </li>
                        <li>
                            <a href="/lenta.php" title="">
                                <span><img src="images/icon7.png" alt=""></span>
                                Лента
                            </a>
                        </li>



                        <li>
                            <a href="/messages.php" title="" class="not-box-open">
                                <span><img src="images/icon6.png" alt=""></span>
                                Сообщения
                            </a>

                        </li>
                    </ul>
                </nav><!--nav end-->
                <div class="menu-btn">
                    <a href="#" title=""><i class="fa fa-bars"></i></a>
                </div><!--menu-btn end-->
                <div class="user-account">
                    <div class="user-info">
                        <img width="30" style="height: 30px"  src="uploads/userphoto/<?=$_SESSION['user']['image']?>" alt="">
                        <a href="#" title=""><?=$name?></a>
                        <i class="la la-sort-down"></i>
                    </div>
                    <div class="user-account-settingss">

                        <h3 class="tc"><a href="logout.php" title="">Logout</a></h3>
                    </div><!--user-account-settingss end-->
                </div>
            </div><!--header-data end-->
        </div>
    </header><!--header end-->