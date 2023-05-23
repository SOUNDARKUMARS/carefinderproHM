<?php
$succ=0;
$existuser=0;
if(isset($_POST['submit'])){
include "hospcon.php";
$name=$_POST['user'];
$pwd=$_POST['pwd'];
$email=$_POST['email'];
$sel="SELECT * FROM `users` WHERE user='$name'";
$result=mysqli_query($hcon,$sel);
if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
            // user exists
            $existuser=1;
    }else{
        $sql="INSERT INTO `users`(user,pwd,email)values('$name','$pwd','$email')";
        $datacon=mysqli_query($hcon,$sql); 
        $succ=1; 
        // echo "succeed";
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
    <title>Register</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <script src="https://kit.fontawesome.com/bb9f864293.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body{
            background: url(hospital_images/logbg2.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #43875a49;}
    </style>
</head>
<body>

<?php
if($succ){
 echo '<div class="success">
 <h4>Registration Successful <i class="fa-solid fa-check"></i></h4>
</div>';   
}
?>
<?php
if($existuser){
    echo '<div class="regFailed">
    <h4>This UserName Already Exists <i class="fa-solid fa-circle-exclamation"></i> Try  another. </h4>
</div>';
}
?>


<div class="logcontainer">
        <form method="post" action="register.php"class="formlog">
            <p class="formlog-title">Create New Account</p>
                <div class="input-container">
                <input name="user" type="text" placeholder="Enter UserName">
                <span>
                </span>
                </div>
                <div class="input-container">
                <input name="pwd" type="password" placeholder="Enter password">
                <span>
                </span>
                </div>
            <div class="input-container">
                <input name="email" type="email" placeholder="Enter email">
                </div>
                <button type="submit" name="submit" class="submit">
                Sign up
            </button>

            <p class="signup-link">
            Return to
                <a href="login.php"> Login</a>
            </p>
        </form>
   </div> 
</body>
</html>