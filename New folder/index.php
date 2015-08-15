<?php $title=Wayne;?>
<!DOCTYPE>


 <html><head><title> <?php echo $title;?></title></head>
 
 <body>
 <form action='index.php' method='post'><lable for='name'>Username;</lable><input type='text' name='username'>
 <br>
 <input type='submit' value='ENTER' >
 </form>
 
 <?php 

 if (isset($_POST['username'])){
     echo '<h1>'. $_POST['username'].'</h1>';
     
 }
 ?>
 </body>
 
 
 </html>
