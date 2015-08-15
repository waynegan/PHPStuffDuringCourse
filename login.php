<?php
session_start();
$mysqli = mysqli_connect('174.79.32.158','PHP07','PHP07','PHP07');
if(mysqli_connect_errno()) {
  die(mysqli_connect_error());
}
$username = mysqli_real_escape_string($mysqli, $_POST['username']);
$passwd = mysqli_real_escape_string($mysqli, $_POST['passwd']);
$result=mysqli_query($mysqli, "select username,passwd from users where username='$username' and passwd='$passwd'   ");
$row=mysqli_fetch_array($result);
if(!$row){
    
    echo " username or
password are incorrect.";
    
}
else{
   $_SESSION['user'] =$username;
   
   header('location: index.php');
   
}