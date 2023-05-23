


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data-updation</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css">

</head>
<style>
body{
  background: url(hospital_images/usersPagebg.jpg);
  background-size: cover;
  background-repeat: no-repeat;
}
.container{
  margin:auto;
  width:50%;
}
.btns{
position: relative;
top: 10px;
left:10px;
 
}
input[type="text"]:focus {
  outline: none;
}
input{
  background-color: transparent;
}
input::placeholder{
color:black;
}


</style>
<body>
  <div class="btns">
<a href="addhosp.php"><button style="border-radius:4px" type="submit" class="submit btn">Back</button></a></div>
<?php
include "hospcon.php";
echo'<br>';
 $sql="SELECT * FROM `hcard`";
$result=mysqli_query($hcon,$sql);
$row=mysqli_fetch_assoc($result);
$indemsr=$row['indems'];
$bedsr=$row['beds'];
$unavsr=$row['unavs'];
if(isset($_POST['donebtn'])){
  $beds=$_POST['beds'];
  $unavs=$_POST['unavs'];
  $indems=$_POST['indems'];
  $hosp_id=$_POST['hosp_id'];
  $sql="UPDATE `hcard` SET beds='$beds',unavs='$unavs', indems='$indems' WHERE id=$hosp_id";
  $result=mysqli_query($hcon,$sql);
  if($result){
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
    <div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
     Data Updated!
    </div>
  </div>';
  }
 
}


?>
<form class="updateform"action="dynamicdata.php" method="post" style="border:0;">
<div class="container">
<table class="table"style="width: 70%;border: 3px solid black;">
  <thead class="table-dark">
    <th>Hospital ID</th>
    <th>Beds</th>
    <th>Unavailables</th>
    <th>In-Demands</th>
  </thead>
  <tbody>

  <td><input style="border:none; padding:0;margin:0;"placeholder="Hospital ID" name="hosp_id" type="text"></td>
    <td><input style="border:none; padding:0;margin:0;"placeholder="beds" name="beds" value="100" type="text"></td>
    <td><input style="border:none; padding:0;margin:0;" placeholder="unavailbales" name="unavs" value="None"  type="text"></td>
    <td><input style="border:none; padding:0;margin:0;"placeholder="in_demands" name="indems"value="FMRI 3 Hrs"  type="text">
    </td>
</tbody>
 </table>
<button name="donebtn"type="submit"style="border-radius:4px" class="submit btn">Done!</button>

</div>
</form>
</body>
</html>