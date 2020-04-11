$(window).on("load", function() {
    "use strict";

    

    //  ============= POST PROJECT POPUP FUNCTION =========

    $(".post_project").on("click", function(){
        $(".post-popup.pst-pj").addClass("active");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".post-project > a").on("click", function(){
        $(".post-popup.pst-pj").removeClass("active");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= POST JOB POPUP FUNCTION =========

    $(".post-jb").on("click", function(){
        $(".post-popup.job_post").addClass("active");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".post-project > a").on("click", function(){
        $(".post-popup.job_post").removeClass("active");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= SIGNIN CONTROL FUNCTION =========

    $('.sign-control li').on("click", function(){
        var tab_id = $(this).attr('data-tab');
        $('.sign-control li').removeClass('current');
        $('.sign_in_sec').removeClass('current');
        $(this).addClass('current animated fadeIn');
        $("#"+tab_id).addClass('current animated fadeIn');
        return false;
    });

    //  ============= SIGNIN TAB FUNCTIONALITY =========

    $('.signup-tab ul li').on("click", function(){
        var tab_id = $(this).attr('data-tab');
        $('.signup-tab ul li').removeClass('current');
        $('.dff-tab').removeClass('current');
        $(this).addClass('current animated fadeIn');
        $("#"+tab_id).addClass('current animated fadeIn');
        return false;
    });

    //  ============= SIGNIN SWITCH TAB FUNCTIONALITY =========

    $('.tab-feed ul li').on("click", function(){
        var tab_id = $(this).attr('data-tab');
        $('.tab-feed ul li').removeClass('active');
        $('.product-feed-tab').removeClass('current');
        $(this).addClass('active animated fadeIn');
        $("#"+tab_id).addClass('current animated fadeIn');
        return false;
    });

    //  ============= COVER GAP FUNCTION =========

    // var gap = $(".container").offset().left;
    // $(".cover-sec > a, .chatbox-list").css({
    //     "right": gap
    // });

    //  ============= OVERVIEW EDIT FUNCTION =========

    $(".overview-open").on("click", function(){
        $("#overview-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function(){
        $("#overview-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EXPERIENCE EDIT FUNCTION =========

    $(".exp-bx-open").on("click", function(){
        $("#experience-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function(){
        $("#experience-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EDUCATION EDIT FUNCTION =========

    $(".ed-box-open").on("click", function(){
        $("#education-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function(){
        $("#education-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= LOCATION EDIT FUNCTION =========

    $(".lct-box-open").on("click", function(){
        $("#location-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function(){
        $("#location-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= SKILLS EDIT FUNCTION =========

    $(".skills-open").on("click", function(){
        $("#skills-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function(){
        $("#skills-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= ESTABLISH EDIT FUNCTION =========

    $(".esp-bx-open").on("click", function(){
        $("#establish-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function(){
        $("#establish-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= CREATE PORTFOLIO FUNCTION =========

    $(".gallery_pt > a").on("click", function(){
        $("#create-portfolio").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function(){
        $("#create-portfolio").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  ============= EMPLOYEE EDIT FUNCTION =========

    $(".emp-open").on("click", function(){
        $("#total-employes").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function(){
        $("#total-employes").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });

    //  =============== Ask a Question Popup ============

    $(".ask-question").on("click", function(){
        $("#question-box").addClass("open");
        $(".wrapper").addClass("overlay");
        return false;
    });
    $(".close-box").on("click", function(){
        $("#question-box").removeClass("open");
        $(".wrapper").removeClass("overlay");
        return false;
    });


    //  ============== ChatBox ============== 


    $(".chat-mg").on("click", function(){
        $(this).next(".conversation-box").toggleClass("active");
        return false;
    });
    $(".close-chat").on("click", function(){
        $(".conversation-box").removeClass("active");
        return false;
    });

    //  ================== Edit Options Function =================


    $(".ed-opts-open").on("click", function(){
        $(this).next(".ed-options").toggleClass("active");
        return false;
    });


    // ============== Menu Script =============

    $(".menu-btn > a").on("click", function(){
        $("nav").toggleClass("active");
        return false;
    });


    //  ============ Notifications Open =============

    $(".not-box-open").on("click", function(){
        $(this).next(".notification-box").toggleClass("active");
    });

    // ============= User Account Setting Open ===========

    $(".user-info").on("click", function(){
        $(this).next(".user-account-settingss").toggleClass("active");
    });

    //  ============= FORUM LINKS MOBILE MENU FUNCTION =========

    $(".forum-links-btn > a").on("click", function(){
        $(".forum-links").toggleClass("active");
        return false;
    });
    $("html").on("click", function(){
        $(".forum-links").removeClass("active");
    });
    $(".forum-links-btn > a, .forum-links").on("click", function(){
        e.stopPropagation();
    });

    //  ============= PORTFOLIO SLIDER FUNCTION =========

    $('.profiles-slider').slick({
        slidesToShow: 3,
        slck:true,
        slidesToScroll: 1,
        prevArrow:'<span class="slick-previous"></span>',
        nextArrow:'<span class="slick-nexti"></span>',
        autoplay: true,
        dots: false,
        autoplaySpeed: 2000,
        responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]


    });


$('#register').submit(function (e) {
e.preventDefault();
if(this.password.value!=this.cpassword.value){
    $('#error_reg').css('display','block');
    $('#error_reg').html('введенные пароли не совпадают');
    setTimeout(function (e) {
        $( "#error_reg" ).fadeOut( "slow", function() {
            $('#error_reg').html('');
        });
    },4000)

}else {
    $.ajax({
        url: "../process/registerprocess.php",
        type: "POST",
        dataTypes: "JSON",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,

        success: function (data) {
            data = JSON.parse(data);
            console.log(data.status)
            if(data.status==0){
                $('#error_reg').css('display','block');
                $('#error_reg').html('данный email уже зарегистрирован');
                setTimeout(function (e) {
                    $( "#error_reg" ).fadeOut( "slow", function() {
                        $('#error_reg').html('');
                    });
                },4000)
            }else if(data.status==1){
                $('#succes_reg').css('display','block');
                $('#succes_reg').html('поздравляем вы успешно зарегистрировались');
                setTimeout(function (e) {
                    $( "#succes_reg" ).fadeOut( "slow", function() {
                        $('#succes_reg').html('');
                        $('.tab-1').addClass('current');
                        $('.tab-1').removeClass('current');
                    });
                },4000)
            }
        }

    })
}
});

$('#login').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "../process/loginprocess.php",
        type: "POST",
        dataTypes: "JSON",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,

        success:function (data) {
            data = JSON.parse(data);
            if(data.status==0){
                $('#error_log').css('display','block');
                $('#error_log').html('Не правильно емейл или пароль');
                setTimeout(function (e) {
                    $( "#error_log" ).fadeOut( "slow", function() {
                        $('#error_log').html('');
                    });
                },4000)
            }else if(data.status==1){
                $('#succes_log').css('display','block');
                $('#succes_log').html('Вы успешно авторизованы');
                setTimeout(function (e) {
                    $( "#succes_log" ).fadeOut( "slow", function() {
                        $('#succes_log').html('');
                        window.location.href = "../index.php";

                    });
                },4000)
            }

        }
    })

})

    $('#addpost').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "../process/postprocess.php",
        type: "POST",
        dataTypes: "JSON",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,

        success:function (data) {
            data = JSON.parse(data);
        if(data.status==1){
            $('.wrapper').removeClass('overlay');
            $('.post-popup').removeClass('active');
            var name  = $('.user-specs').children().html();
            var image = data.image;
            var video = data.video;
            var apimg ='';
            if(image!=''){
                if(video!=1) {
                     apimg = "<img src='uploads/postphoto/" + image + "' width='200' style='height: 250px'>";
                }else{
                    apimg ="  <center>\n" +
                        "<video width=\"400\" controls>\n" +
                        "<source src='uploads/postvideo/"+image+"' type=\"video/mp4\">\n" +
                        "Your browser does not support HTML5 video.\n" +
                        "</video>\n" +
                        " </center>"
                }
            }else{
                apimg = '';
            }
            var divs = "<div class=\"post-bar\">\n" +
                "                                            <div class=\"post_topbar\">\n" +
                "                                                <div class=\"usy-dt\">\n" +
                "                                                    <img width='100' style='height:100px' src='uploads/userphoto/"+data.usimg+"' alt=\"\">\n" +
                "                                                    <div class=\"usy-name\">\n" +
                "                                                        <h3>"+name+"</h3>\n" +
                "                                                        <span><img src=\"images/clock.png\"\n" +
                "                                                                   alt=\"\">0 min ago</span>\n" +
                "                                                    </div>\n" +
                "                                                </div>\n" +
                "                                                <div class=\"ed-opts\">\n" +
                "                                                    <a href=\"#\" title=\"\" class=\"ed-opts-open\"><i\n" +
                "                                                                class=\"la la-ellipsis-v\"></i></a>\n" +
                "                                                    <ul class=\"ed-options\">\n" +
                "                                                        <li><a href=\"#\" title=\"\">Edit Post</a></li>\n" +
                "                                                        <li><a href=\"#\" title=\"\">Delete</a></li>\n" +
                "                                                    </ul>\n" +
                "                                                </div>\n" +
                "                                            </div>\n" +
                "                                            <div class=\"epi-sec\">\n" +apimg+
                "\n" +
                "                                                <ul class=\"bk-links\">\n" +
                "                                                    <li><a href=\"#\" title=\"\"><i class=\"la la-bookmark\"></i></a>\n" +
                "                                                    </li>\n" +
                "                                                    <li><a href=\"#\" title=\"\"><i class=\"la la-retweet\"></i></a>\n" +
                "                                                    </li>\n" +
                "                                                </ul>\n" +
                "                                            </div>\n" +

                "                                            <div class=\"job_descp\">\n" +
                "\n" +
                "                                                <p>"+data.desc+" </p>\n" +
                "\n" +"<a href='"+data.url+"' target='_blank'>"+data.url+"</a>" +
                "                                            </div>\n" +
                "                                            <div class=\"job-status-bar\">\n" +
                "                                                <ul class=\"like-com\">\n" +
                "                                                    <li>\n" +
                "                                                        <a href=\"#\"><i class=\"la la-heart\"></i>Like </a>\n" +
                "                                                        <span style=\"margin-left:25px \">0</span>\n" +
                "                                                    </li>\n" +
                "                                                </ul>\n" +
                "                                            </div>\n" +
                "                                        </div>";
            $('.posts-section').prepend(divs);
        }

        }
    })

})
//
    $('.follow').click(function (e) {

        $.ajax({
            url: "process/folowprocess.php",
            type: "POST",
            dataType: "JSON",
            data: {
                user_id: $(this).data("id"),
            },
            success: function (data) {
                // data = JSON.parse(data);
                console.log(data.status)
                if(data.status==0){
                    $('#user_'+data.user_id).html('Follow')
                }else if(data.status==1){
                    $('#user_'+data.user_id).html('Unfolow')

                }

            }
        })

    })
    $('#val').click(function(){
        $("#imagechange").trigger('click');
    })

    $("#imagechange").change(function(){
        $('#change').submit();
    })
$('.bookmark').click(function (e) {
    var id = $(this).data('id');
    $.ajax({
        url: "../process/favorit.php",
        type:"POST",
        dataType:"JSON",
        data:{
            'id':id,
        },
        success:function (data) {
            // data = JSON.parse(data);
            if(data.status==0){
                $('#bookmark_' + data.post_id).children().css('color','red');

            }else if(data.status==1){
                $('#bookmark_' + data.post_id).children().css('color','white');


            }

        }
    })
})
  // $('#post_12').remove();
    $('.delete').click(function (e) {
        e.preventDefault();
        var post_id = $(this).data('id');
        console.log(post_id)
        $.ajax({
            url:"process/postdelete.php",
            type: "POST",
            dataType:"JSON",
            data: {
                id: post_id,
            },
            success:function (data) {
                // data = JSON.parse(data);
                if(data.status==1) {
                    $('#post_' + data.id).remove();
                }

            }
        })

    })

    $('.like').click(function (e) {
        e.preventDefault();
        $.ajax({
            url:"process/like.php",
            type:"POST",
            dataType: "JSON",
            data:{
                post_id:$(this).data('id'),
            },
            success:function (data) {
                if(data.status==1){
                    $('#posts_'+data.post_id).children().css('color','#e44d3a');
                    $('#count_'+data.post_id).html(data.count);
                }else{
                    $('#posts_'+data.post_id).children().css('color','#b2b2b2');
                    $('#count_'+data.post_id).html(data.count);


                }
            }

        })
    })
    $('.comblock').click(function (e) {

        // alert($(this).data('id'));
        var id = $(this).data('id');
        if($( "#com_" + id ).css('display')=='none') {
            $("#com_" + id).fadeIn("slow", function () {
                // Animation complete
            });
        }else{
            $("#com_" + id).fadeOut("slow", function () {
                // Animation complete
            });
        }
    })

    $('.addcoment').submit(function (e) {
        e.preventDefault();
        var post_id = $(this).data('id');
        var text =  $(this).children().val();

        $.ajax({
            url:"process/addcoment.php",
            type:"POST",
            dataType:"JSON",
            data:{
                post_id:post_id,
                text:text,
            },
            success:function (data) {
                // data = JSON.parse(data);
                $('#comarea_' + data.post_id).val('');
            var addc = "  <li>\n" +
                "<div class=\"comment-list\">\n" +
                "<div class=\"bg-img\">\n" +
                "<img width='100' style='height: 100px' src='uploads/userphoto/"+data.image+"'" +
                "alt=\"\">\n" +
                "</div>\n" +
                "<div class=\"comment\">\n" +
                "<h3>"+data.name+"</h3>\n" +
                "<div style=\"display:inline-block;\">\n" +
                "<img src=\"images/clock.png\"\n" +
                "alt=\"\"> 0 минут назад\n" +
                "</div>\n" +
                "<p>"+data.text+"</p>\n" +
                "</div>\n" +
                "</div><!--comment-list end-->\n" +
                "</li>";
                $('.comment-sec').children().append(addc);
            }

        })
    })
});


