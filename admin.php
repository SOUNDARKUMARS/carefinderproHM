<?php
include "hospcon.php";
if(isset($_POST['submit'])){
$name=$_POST['admin'];
$pwd=$_POST['pwd'];
$sql="SELECT * FROM `admintable` WHERE admn='$name' and pwd='$pwd'";
$result=mysqli_query($hcon,$sql);
if($result){
    // echo "admin login successful";
    session_start();
    $_SESSION['name']=$name;
    header("location:addhosp.php");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_login</title>
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
<div class="logcontainer">
        <form class="formlog" method="post" action="admin.php">
            <p class="formlog-title">Admin Login</p>
                <div class="input-container">
                <input name="admin" type="text" placeholder="Admin Name">
                <span>
                </span>
                </div>
                <div class="input-container">
                <input name="pwd" type="password" placeholder="Enter password">
                <span>
                </span>
                </div>
                <button name="submit" type="submit" class="submit">
                Sign in
            </button>
               
        </form>
   </div>   
</body>
</html>