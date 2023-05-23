

<?php
session_start();
if(isset($_POST['submit'])){
include "hospcon.php";
 $comment=$_POST['comment'];
 $commentor=$_POST['commentor'];
 $rating=$_POST['rating'];
 $id = $_GET['id'];
 $timestamp = date('Y-m-d H:i:s');
 $datacon=mysqli_query($hcon,"insert into`rews`(name,comment,rating,fk_hosp_id,time_date)values(' $commentor',' $comment',' $rating','$id','$timestamp')");
 if(!$datacon){
  echo "data insertion failed!!";
 }
 if($datacon){
  header("Location: showhosp.php?id=$id");
 }
}
?>


<!DOCTYPE html>
<html lang="en">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareFinder Pro-KnowMore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <script src="https://kit.fontawesome.com/bb9f864293.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
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
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style1.css">
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Dongle&family=Quicksand:wght@300&display=swap');
</style>
<body>

<!-- header tag -->
<header>
        <div class="header-area " style="background-color:grey;">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-5 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                    <li><a class="active"href="rooms.php">home</a></li>
                                        <li><a href="admin.php">Admin</a></li>

                                        

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="img/logo.png"style="border-radius: 10px;margin-bottom:25px" width="170px"  alt="">
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
                                    <a href="index.php"style="border-radius:7px;">logout</a>
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
<!-- header tag -->
<br><br><br><br><br><br><br><br>
<div class="containershow">

    <div class="rewcont">
        <br>
        <h2>&nbsp;&nbsp;Patients Said s'</h2>
        <br>
        <hr>
        <a href="#rewContainer">
          <button  type="submit" class="rewbtn" onclick="openPopup()">Say Something about </button></a>
          <br>
          <br>
          <br>
          <br>
          <br>
          <?php
          include "hospcon.php";
          $id=$_GET['id'];
          if (isset($_GET['id'])) {
              $id = $_GET['id'];
                          
              $query = "SELECT * FROM rews WHERE fk_hosp_id = '$id'";
              $result = mysqli_query($hcon, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                 $rewID= $row['id'];
                 echo '
                  <div class="cardrew">
                  <div class="textBoxrew">
                    <div class="textContentrew">
                      <p class="h1rew"style="color:black";>'.$row['name'].'<span class="spanrew"> &nbsp;Rated <span class="rated" style="color:#FF9529";>'.$row['rating'].'</span></span></p>
                     

                    </div>
                    <p class="prew">'.$row['comment'].'</p>

                    <div class="delete">
                    <a href="delete.php?updateid='.$rewID.'"><i class="fa-solid fa-trash"></i></a> &nbsp;&nbsp;
                    <div class="updateicon"><a href="update.php?updateid='.$rewID.'"><i class="fa-solid fa-pen-to-square"></i></a></div>
                    </div>
                    
                  <div>
                </div></div></div>
                  
                  ';
              }
          }
        ?>
        <div class="reviews_container">

        </div>
    </div>

    <div class="dept">
        <br>

        <h2>&nbsp;&nbsp;DEPARTMENTS</h2>
        <!-- show departments -->
        <?php
        include 'hospcon.php';
        $id = $_GET['id'];
        $sql = "SELECT * FROM `hcard` WHERE id ='$id'";
        $result = mysqli_query($hcon, $sql);
        // loop through all the records
        while ($row = mysqli_fetch_assoc($result)) {
            $hospital = $row['hname'];
            $description = $row['hdes'];
            $image = $row['himg'];
            $location = $row['hloc'];
            $galleryImg = $row['gallery'];
            $details = $row['hdets'];
            $doctors = $row['hdocts'];
            $hospimage1=$row['himgA'];
            $hospimage2=$row['himgB'];
            $hospimage3=$row['himgC'];
             
            // departments showing start
            $departments = $row['hdept'];
            $depsep=explode(',',$departments);
            echo'<br>';
            echo'<ul >';
            foreach($depsep as $depart){
                echo '<li class="deplst"><i class="fa-solid fa-angles-right"></i>'.$depart.'</li>';
                echo'<br>';
            }
            echo'</ul>';
        }
           // departments showing start
          echo ' <div class="imageGalleryCont">';
          echo' <div class="imageGalleryEle">';

          echo'      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="'.$galleryImg.'" style="width: 700px;height: 500px;" class="d-block w-100" alt="Sorry!! image not uploaded">
    
            </div>
            <div class="carousel-item">
              <img src="'.$hospimage1.'" style="width: 700px;height: 500px;"class="d-block w-100" alt="Sorry!! image not uploaded">
         
            </div>
            <div class="carousel-item">
              <img src="'.$hospimage2.'"style="width: 700px;height: 500px;" class="d-block w-100" alt="Sorry!! image not uploaded">
           
            </div>
            <div class="carousel-item">
              <img src="'.$hospimage3.'"style="width: 700px;height: 500px;" class="d-block w-100" alt="Sorry!! image not uploaded">
           
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>';
          echo '</div>  ';
          echo '</div>  ';
       
        ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="doccards">
<?php
echo'<div class="row2">';
echo'<div class="cola">';
    $docsep=explode(",",$doctors);
    foreach($docsep as $doctor){
        echo '<div class="card">
        <center>
        <div class="profileimage">
          <svg class="pfp" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.88"><g><path d="M61.44,0c8.32,0,16.25,1.66,23.5,4.66l0.11,0.05c7.47,3.11,14.2,7.66,19.83,13.3l0,0c5.66,5.65,10.22,12.42,13.34,19.95 c3.01,7.24,4.66,15.18,4.66,23.49c0,8.32-1.66,16.25-4.66,23.5l-0.05,0.11c-3.12,7.47-7.66,14.2-13.3,19.83l0,0 c-5.65,5.66-12.42,10.22-19.95,13.34c-7.24,3.01-15.18,4.66-23.49,4.66c-8.31,0-16.25-1.66-23.5-4.66l-0.11-0.05 c-7.47-3.11-14.2-7.66-19.83-13.29L18,104.87C12.34,99.21,7.78,92.45,4.66,84.94C1.66,77.69,0,69.76,0,61.44s1.66-16.25,4.66-23.5 l0.05-0.11c3.11-7.47,7.66-14.2,13.29-19.83L18.01,18c5.66-5.66,12.42-10.22,19.94-13.34C45.19,1.66,53.12,0,61.44,0L61.44,0z M16.99,94.47l0.24-0.14c5.9-3.29,21.26-4.38,27.64-8.83c0.47-0.7,0.97-1.72,1.46-2.83c0.73-1.67,1.4-3.5,1.82-4.74 c-1.78-2.1-3.31-4.47-4.77-6.8l-4.83-7.69c-1.76-2.64-2.68-5.04-2.74-7.02c-0.03-0.93,0.13-1.77,0.48-2.52 c0.36-0.78,0.91-1.43,1.66-1.93c0.35-0.24,0.74-0.44,1.17-0.59c-0.32-4.17-0.43-9.42-0.23-13.82c0.1-1.04,0.31-2.09,0.59-3.13 c1.24-4.41,4.33-7.96,8.16-10.4c2.11-1.35,4.43-2.36,6.84-3.04c1.54-0.44-1.31-5.34,0.28-5.51c7.67-0.79,20.08,6.22,25.44,12.01 c2.68,2.9,4.37,6.75,4.73,11.84l-0.3,12.54l0,0c1.34,0.41,2.2,1.26,2.54,2.63c0.39,1.53-0.03,3.67-1.33,6.6l0,0 c-0.02,0.05-0.05,0.11-0.08,0.16l-5.51,9.07c-2.02,3.33-4.08,6.68-6.75,9.31C73.75,80,74,80.35,74.24,80.7 c1.09,1.6,2.19,3.2,3.6,4.63c0.05,0.05,0.09,0.1,0.12,0.15c6.34,4.48,21.77,5.57,27.69,8.87l0.24,0.14 c6.87-9.22,10.93-20.65,10.93-33.03c0-15.29-6.2-29.14-16.22-39.15c-10-10.03-23.85-16.23-39.14-16.23 c-15.29,0-29.14,6.2-39.15,16.22C12.27,32.3,6.07,46.15,6.07,61.44C6.07,73.82,10.13,85.25,16.99,94.47L16.99,94.47L16.99,94.47z"></path></g></svg>
        </div>
        <div class="Name">
      
          <p class="docname"> '.strtoupper($doctor).'</p>
        </div>
        <div class="socialbar">
         
          <a id="instagram" href="#"><svg viewBox="0 0 16 16" class="bi bi-instagram" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
      </svg></a>
          &nbsp;
          &nbsp;
          &nbsp;
          <a id="facebook" href="#"><svg viewBox="0 0 16 16" class="bi bi-facebook" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
      </svg></a>
          &nbsp;
          &nbsp;
          &nbsp;
          <a id="twitter" href="#"><svg viewBox="0 0 16 16" class="bi bi-twitter" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
      </svg></a>
          </div></center>
        </div>
        
        ';
    }
    echo '</div>';
    echo '</div>';
    ?>
    </div>
<!-- </div>
</div> -->
<br>
<br>
<br>
<br>

<?php
include "hospcon.php";
$eid=$_GET['id'];

$sql="SELECT * FROM `hcard`where id=$eid ";
$result=mysqli_query($hcon,$sql);
$row=mysqli_fetch_assoc($result);

echo "<h3 style='text-align: center;'>Hospital <span style='color:green; '>".ucwords($row['hname'])."'s</span> ID number : ".$row['id']."</h3>";
echo'
<div class="container"style="width: 70%;">
<table class="table" style="border: 3px solid rgb(0, 0, 0);">
  <thead class="table-dark">
  <th>Beds count <a  class="edit"href="admin.php">&nbsp; &nbsp;<i class="fa-solid fa-pen-to-square"></i></a></th>
  <th>Unavailables  <a  class="edit"href="admin.php">&nbsp; &nbsp;<i class="fa-solid fa-pen-to-square"></i></a></th>
  <th>In-Demands  <a  class="edit"href="admin.php">&nbsp; &nbsp;<i class="fa-solid fa-pen-to-square"></i></a></th>
  </thead>
<tr style="font-size: 18px;">
    <td>'.$row['beds'].'</td>
    <td>'.$row['unavs'].'</td>
    <td>'.$row['indems'].'</td>
  </tr>
  </tbody>
  </table>
  </div>';
?>
<!-- dynamic data were here==================================== -->
<br>
<br>
<div id="rewContainer" class="rewContainer">
  <div class="addRew" id="popup">
  <div class="Rewcard">
  <span class="Rewtitle">Leave a Comment</span>
  <form class="Rewform" method="post">
    <div class="Rewgroup">
    <input name="commentor" placeholder="‎" type="text" required="">
    <label for="name">Name</label>
    </div>
  <div class="Rewgroup">

    <input placeholder="‎" type="text" name="rating" required="">
    <label for="rating" autocomplete="off">Rate for 5</label>
    </div>
  <div class="Rewgroup">
    <textarea placeholder="‎" id="comment" name="comment" rows="5" required=""></textarea>
    <label for="comment">Comment</label>
  </div><a href="#">
    <button name="submit"type="submit"required="" onclick="closePopup()">Submit</button></a>
  </form>
</div>
  </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br>
<footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">


                        <div class="footer_widget">
                            <h3 class="footer_title">
                                address
                            </h3>
                            <a href="<?php echo $row['hospadrs']?>" name="hospadrs"class="line-button">Get Direction  </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Reservation
                            </h3>
                            <p class="footer_text">+10 0909868 <br>
                                reservation@carefinder.com</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Navigation
                            </h3>
                            <ul>
                                <li><a href="rooms.php">Home</a></li>
                                <li><a href="contact.php">contact</a></li>
                                <li><a href="About">About</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Newsletter
                            </h3>
                            <div class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button>Sign Up</button>
                            </div>
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


</body>
</html>