<?php session_start();?>

<?php
include "hospcon.php";
if(isset($_POST['submit'])){
    $hnm=$_POST['hname'];
    $hdes=$_POST['hdes'];
    $hmg=$_FILES['himg'];
    $depart=$_POST['hdept'];
    $details=$_POST['hdets'];
    $gallery=$_FILES['gallery'];
    $doctors=$_POST['doctors'];
    $location=$_POST['hloc'];
    $beds=$_POST['beds'];
    $indems=$_POST['indems'];
    $unavs=$_POST['unavs'];
    $hospadrs=$_POST['hospadrs'];
// hopsital image gallery start
    $image2=$_FILES['himgA'];
    $image3=$_FILES['himgB'];
    $image4=$_FILES['himgC'];
// file names
$img2Fname=$image2['name'];
$img3Fname=$image3['name'];
$img4Fname=$image4['name'];
// temp names
$img2Tname=$image2['tmp_name'];
$img3Tname=$image3['tmp_name'];
$img4Tname=$image4['tmp_name'];


    $galFileName=$gallery['name'];
    $galTempName=$gallery['tmp_name'];
    $galExtSep=explode('.',$galFileName);
    $galFileExt=strtolower($galExtSep[1]);
    $imgFileName=$hmg['name'];
    $imgTempName=$hmg['tmp_name'];
    $seperatExt=explode('.',$imgFileName);
    $fileExtension=strtolower($seperatExt[1]);
    $extensions=array("jpeg","jpg","png","gif");
    $extensionsOne=array("jpeg","jpg","png","gif");
    if(in_array($fileExtension,$extensions)&&in_array($galFileExt,$extensionsOne)){


        // image gallery uploadings
        $uploadImg2='hospital_images/'.$img2Fname;
        $uploadImg3='hospital_images/'.$img3Fname;
        $uploadImg4='hospital_images/'.$img4Fname;

        move_uploaded_file($img2Tname,$uploadImg2);
        move_uploaded_file($img3Tname,$uploadImg3);
        move_uploaded_file($img4Tname,$uploadImg4);
        // image gallery end
        $uploadImage='hospital_images/'.$imgFileName;
        $uploadGallImage='hospital_images/'.$galFileName;
        move_uploaded_file($galTempName,$uploadGallImage);
        move_uploaded_file($imgTempName,$uploadImage);
        $sql="insert into `hcard`(hname,hdes,himg,hdept,hdets,hdocts,gallery,hloc,himgA,himgB,himgC,beds,unavs,indems,hospadrs) values('$hnm','$hdes','$uploadImage','$depart','$details','$doctors','$uploadGallImage','$location','$uploadImg2','$uploadImg3','$uploadImg4','$beds','$unavs','$indems','$hospadrs')";

        $result=mysqli_query($hcon,$sql);
        if($result){
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo '
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
            <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
             Data inserted successfully
            </div>
          </div>';
        }else{
            die(mysqli_error($hcon));
        }
    }

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <script src="https://kit.fontawesome.com/bb9f864293.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <link rel="stylesheet" href="mystyleSheets/style1.css">


    <title>CFP-Add Hopital</title>
    
    <style>
body{
  background: radial-gradient(circle, rgba(235,241,234,1) 0%, rgba(186,207,185,1) 35%, rgba(151,187,156,1) 100%);
  }
.adminButtons{
    display: flex;
  justify-content: center;
  
}
.adminButtons button{
    margin:10px;
}

body button:hover{
    color:red;
}

  
    </style>
</head>
<body>
<!-- header start -->

<header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-5 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                    <li><a href="rooms.php">home</a></li>
                                        <li><a href="reservation.php">Reservations </a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                        <li><a class="active" href="admin.php">Admin</a></li>
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

<br>
<br>
<br>
<br>
<br>
<div class="adminName">
    <h4 style="text-align:center;">Hello Admin</h4>
</div>
<div class="adminButtons">
        <br><br>
        <a href="userappointments.php"><button name="asub-btn" type="submit" class="submit btn">Appointments</button></a>
        <a href="usersin.php"><button name="asub-btn" type="submit" class="submit btn">In-Users</button></a>
        <a href="dynamicdata.php"><button name="asub-btn" type="submit" class="submit btn">Update</button></a>
        <button name="submit" type="submit" class="btn">
    <span class="btn-text-one">Add  Hospitals</span>
    <span class="btn-text-two">Down Here <i class="fa-solid fa-angles-down"></i></span>
</button>
<a style="margin-right:3px" href="delhosp.php"><button  name="asub-btn" type="submit" class="submit btn">Delete Hospital</button></a>
        <br><br>
</div>
<!-- header end -->
<div class="cont">
<div class="inputs">

    <form class="form"action="addhosp.php" method="post" autocomplete="off" enctype="multipart/form-data">

    <div class="input-container">
  <input name="hname" type="text" autocomplete="off" id="input" required="">
  <label for="input" class="label">Hospital Name</label>
  <div class="underline"></div>
</div>
    <div class="input-container">
  <input name="hloc" type="text" autocomplete="off" id="input" required="">
  <label for="input" class="label">Location</label>
  <div class="underline"></div>
</div>
    <div class="input-container">
  <input name="hospadrs" type="text" autocomplete="off" id="input" required="">
  <label for="input" class="label">Direction</label>
  <div class="underline"></div>
</div>
    <div class="input-container">
  <input name="hdes" type="text" autocomplete="off" id="input" required="">
  <label for="input" class="label">Specialized</label>
  <div class="underline"></div>
</div>
<!-- dynamic data -->
<div class="input-container">
  <input name="beds" type="text" autocomplete="off" id="input" required="">
  <label for="input" class="label">Beds</label>
  <div class="underline"></div>
</div>
<div class="input-container">
  <input name="unavs" type="text" autocomplete="off" id="input" required="">
  <label for="input" class="label">Unavailables</label>
  <div class="underline"></div>
</div>
<div class="input-container">
  <input name="indems" type="text" autocomplete="off" id="input" required="">
  <label for="input" class="label">In-Demands</label>
  <div class="underline"></div>
</div>

<!-- dynamic data -->

<span class="form-title">Upload the Logo </span>
    <p class="form-paragraph">File can be jpg  jpeg  png</p>
    <label for="file-input" class="drop-container">
    <span class="drop-title">Drop Logo here</span>
    or
    <input type="file" name="himg" accept="image/*" required="" id="file-input">
    </label>
    <br>
<div class="second_container">
</form>
    <div class="textarea-container">
    <h3>Departments</h3>
 <textarea name="hdept" id="" cols="40" rows="5" required=""   placeholder="dept1,dept2,dep3, ..."></textarea>
  <label for="input" class="label"></label>
  <div class="underline"></div>
  <br>
    <h3>Doctors</h3>
 <textarea name="doctors" id="" cols="40" rows="7" required=""   placeholder="DoctorName1,doctorName2,DoctorName3, ..."></textarea>
  <label for="input" class="label"></label>
  <div class="underline"></div>
  <br>
  <h3>Description</h3>
    <div class="input-container">
<textarea name="hdets" id="" cols="40" rows="10" class="descText"required=""  placeholder="Description"></textarea>
  <div class="underline"></div>
<br>
<span class="form-title">Upload the Images</span>
    <p class="form-paragraph">File can be jpg  jpeg  png</p>
    <label for="file-input" class="drop-container">
    <span class="drop-title">Image 1</span>
    <input type="file" name="gallery" accept="image/*" required="" id="file-input" multiple>
    </label>
    
    <label for="file-input" class="drop-container">
    <span class="drop-title">Image 2</span>
    <input type="file" name="himgA" accept="image/*" required="" id="file-input" multiple>
    </label>
    
    <label for="file-input" class="drop-container">
    <span class="drop-title">Image 3</span>
    <input type="file" name="himgB" accept="image/*" required="" id="file-input" multiple>
    </label>
    
    <label for="file-input" class="drop-container">
    <span class="drop-title">Image 4</span>
    <input type="file" name="himgC" accept="image/*" required="" id="file-input" multiple>
    </label>
    <br>
    <button name="submit" type="submit" class="btn">
    <span class="btn-text-one">Submit</span>
    <span class="btn-text-two">Great!</span>
</button>
<br>
    </form>
</div>
</div>
</div>
</body>
</html>