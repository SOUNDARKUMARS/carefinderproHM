<?php
session_start();
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CareFinder Pro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <script src="https://kit.fontawesome.com/bb9f864293.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="mystyleSheets/style1.css">
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-5 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                    <li><a class="active"href="rooms.php">home</a></li>
                                        <li><a href="reservation.php">Reservations </a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                        <li><a  href="admin.php">Admin</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="img/logo.png"style="border-radius: 10px;" width="170px"  alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 d-none d-lg-block">
                            <div class="book_room">
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="book_btn d-none d-lg-block">
                                    <a href="index.php" style="border-radius:7px;">logout</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg_1">
        <h3>All kind of Hospitals</h3>
    </div>
    <!-- bradcam_area_end -->
<div class="loginSession">

</div>
    <!-- hospitals_area_start -->
    <div class="offers_area padding_top">
        <div class="container">
            <div class="hellouser">
                <h2>Hello <span style="color: #1a75ff">
                    <?php
                    echo ucwords(''.$_SESSION['user'].'');
                    ?></span>.&nbsp;Welcome!
                </h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <h3>select</h3>
                        <span>As you need</span>
                        <!-- search str -->

                        <div class="searchcont">
                            <div class="search">


<div class="src">
                            <form action="rooms.php" method="post" autocomplete="off">
                            <input name="search" placeholder="Search..." type="text" class="inputsss" required="" >
                           <button type="submit" name="searchSubmit"> <i class="fa-solid fa-magnifying-glass"></i></button>
                           </form>
</div>
                            </div>
                        </div>
<br>
<br>
<?php
if(isset($_POST['searchSubmit'])){
    include "hospcon.php";
    $search=$_POST['search'];
       $sql = "SELECT * FROM `hcard` WHERE id LIKE '%$search%' OR hname LIKE '%$search%' OR hloc LIKE '%$search%' OR hdes LIKE '%$search%'";

    $result=mysqli_query($hcon,$sql);
    if(mysqli_num_rows($result)>0){
        echo '<h4>Showing Results For <span class="searched">'.$search.'</span></h4>';
        echo'<div class="row1">';
        echo'<div class="col">';
        while($row=mysqli_fetch_assoc($result)) {


        echo'<div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="'.$row['himg'].'"style=" border-radius:20px;  height: 180px; width: 240px;; alt="" >
                        <p class="title">'.$row['hname'].'</p>
                        <p>'.$row['hdes'].'</p>
                        <p><strong>Location:</strong>'.$row['hloc'].'</p>
                    </div>
                    <div class="flip-card-back">
                        <p class="title">'.$row['hdets'].'</p>
                        <p><a href="showhosp.php?id='.$row['id'].'">Know more...</a>
                        </p>
                    </div>
                </div>
            </div>';
}
echo '</div>';
echo '</div>';
echo'<br>';
echo "<hr>";
    }else{
        echo '<h3 class="text-danger">Data not Found</h3>';
        echo "<hr>";
    }
    
}
?>
                        <!-- search end -->
                    </div>

                </div>
            </div>
       
    <!-- -----hospitals cards----start----------->

    <?php
include "hospcon.php";

$sql="Select * from `hcard`";
$result=mysqli_query($hcon,$sql);
echo'<div class="row1">';
echo'<div class="col">';

while($row=mysqli_fetch_assoc($result)){
$hospital=$row['hname'];
$decsription=$row['hdes'];
$image=$row['himg'];
$location=$row['hloc'];
$details=$row['hdets'];
$id=$row['id'];
$details=$row['hdets'];
echo'<div class="flip-card">
<div class="flip-card-inner">
    <div class="flip-card-front">
    <img src="'.$image.'"style=" border-radius:20px;  height: 180px; width: 240px;; alt="" >

        <p class="title">'.$hospital.'</p>
        <p>'.$decsription.'</p>
        <p><strong>Location:</strong>'.$location.'</p>
    </div>
    <div class="flip-card-back">
        <h5 class="title">'.$details.'</h5>
        <p class="knowmore"><a href="showhosp.php?id='.$id.'">Know more...</a></p>
        <p><span style="font-weight:bold;"><strong>'.$row['id'].'</strong></span></p>
    </div>
</div>
</div>';


}
echo '</div>';
echo '</div>';
?>

    <!-- -----hospitals cards----end----------->
    

    <!-- forQuery_start -->
    <div class="forQuery">
        <div class="containerrom">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-md-12">
                    <div class="Query_border">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="Query_text">
                                        <p>For Reservation 0r Query?</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="phone_num">
                                        <a href="#" class="mobile_no">871 735 8990 000 </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- forQuery_end-->

    
    <footer class="footer" style="margin:2px;">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Reservation
                            </h3>
                            <p class="footer_text">+91 735 8997 258 <br>
                                reservation@carefinder.com</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                       
                        <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Navigation
                            </h3>
                            <ul>
                                <li><a href="about.html">About</a></li>
                                <li><a href="contact.php">contact</a></li>                              
                            </ul>
                        </div>
                    </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Newsletter
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Sign Up</button>
                            </form>
                            <p class="newsletter_text">Subscribe newsletter to get updates</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-8 col-md-7 col-lg-9">
                        <p class="copy_right">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://colorlib.com" target="_blank">Soundarkumar S</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="col-xl-4 col-md-5 col-lg-3">
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/facebookIndia/">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/?lang=en-in">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



  <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
    </script>



</body>

</html>