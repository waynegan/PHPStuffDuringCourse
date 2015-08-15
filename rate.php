<?php 

session_start();

if(isset($_SESSION['user'])||isset($_SESSION['fb_token']))
{


$mysqli = mysqli_connect('174.79.32.158','PHP07','PHP07','PHP07');
if(mysqli_connect_errno()) {
    die(mysqli_connect_error());
}



if(isset($_GET['name'])){
    
    $TEMP=$_GET['name'];
    
    $name = mysqli_real_escape_string($mysqli, $_GET['name']);
   
    
    $result = mysqli_query($mysqli, "select MARKS from ITEM where NAME='$name' ");
    $result1 = mysqli_query($mysqli, "select MARKPERSONS from ITEM where NAME='$name' ");
   // echo mysqli_fetch_array($result);
   

   $notes = array();
   while($row = mysqli_fetch_array($result)) {
       $notes[] = $row;
   }
   $notesperson = array();
   while($row1 = mysqli_fetch_array($result1)) {
       $notesperson[] = $row1;
   }
    
 
    
    
    
    
    $newmarks=($notes[0][0]*$notesperson[0][0]+$_POST['rate'])/($notesperson[0][0]+1);
    
   
    $notesperson[0][0]=$notesperson[0][0]+1;
    $TEMP1=$notesperson[0][0];
   
    
    $result2 = mysqli_query($mysqli,"UPDATE ITEM  SET MARKS='$newmarks' WHERE NAME ='$TEMP'");
   
    $result3 =mysqli_query($mysqli,"update ITEM  set MARKPERSONS='$TEMP1' WHERE NAME ='$TEMP'");
    
    mysqli_close($mysqli);
    echo "Successed!you will be back in 3 seconds";
   
      
}



}
else
{ 
include("index1.php");}
$now_url = $_SERVER[HTTP_REFERER];
header('location:'.$now_url);



    ?>