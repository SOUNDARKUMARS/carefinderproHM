<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usersApppointments</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body{
        background: url(hospital_images/usersPagebg.jpg);
        background-size:cover;
  background-repeat: no-repeat;
    }
</style>
</head>
<body>
<a href="addhosp.php"><button class="submit btn" style="color:white;">Back</button></a>

    <h2 style="text-align:center; margin-top:15px;">In Users</h2>
<?php
include "hospcon.php";
$sql="SELECT * FROM `users`";
$result=mysqli_query($hcon,$sql);
$nums=mysqli_num_rows($result);
echo'<div class="container"style="width: 60%;">
<table class="table" style="border: 3px solid rgb(0, 0, 0);">
  <thead class="table-dark">
  <th>DB ID</th>
  <th>User Name</th>
  <th>Email</th>
  </thead>';
while($row=mysqli_fetch_assoc($result)){
    echo'<tr style="font-size: 18px;">
    <td>'.$row['id'].'</td>
    <td>'.$row['user'].'</td>
    <td>'.$row['email'].'</td>
  </tr>';  
  }
  echo'</tbody>
  </table>
  </div>';
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>