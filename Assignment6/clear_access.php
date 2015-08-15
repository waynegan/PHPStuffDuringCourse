 <?php 
 session_start();

 session_destroy();
 header('location: session_tracker.php');
 ?>