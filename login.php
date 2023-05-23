<?php
$invd=0;
if(isset($_POST['submit'])){
include "hospcon.php";
$name=$_POST['user'];
$pwd=$_POST['pwd'];
$sel="SELECT * FROM `users` WHERE user='$name' and pwd='$pwd'";
$result=mysqli_query($hcon,$sel);
if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
        // echo "login successful";
        session_start();
        $_SESSION['user']=$name;
        header('location:rooms.php');  
    }else{
        $invd=1;
        // echo "invalid data";
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
    <title>signin</title>
    <link rel="stylesheet" href="style2.css">
    <style>
        body{
            background: url(hospital_images/logbg1.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #43875a49;        }
    </style>
</head>
<body>
<?php
if($invd){
    echo '<div class="regFailed">
    <h4><i class="fa-solid fa-circle-exclamation"></i> Invalid username or password. Please Try  Again. </h4>
</div>';
}
?>
<div class="logcontainer">
        <form class="formlog" method="post" action="login.php">
            <p class="formlog-title">Sign in to your account</p>
                <div class="input-container">
                <input name="user"type="text" placeholder="Enter UserName">
                <span>
                </span>
                </div>
                <div class="input-container">
                <input name='pwd' type="password" placeholder="Enter password">
                <span>
                </span>
                </div>
                <button type="submit" class="submit" name="submit">
                Sign in
            </button>

            <p class="signup-link">
                No account?
                <a href="register.php">Sign up</a>
            </p>
        </form>
   </div> 
</body>
</html>