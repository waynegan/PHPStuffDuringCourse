<?php 
session_start();
error_reporting(E_ALL || ~E_NOTICE);


if(isset($_GET['do'])&&$_GET['do']='clear')
{
unset($_SESSION['note']);
    
session_destroy();
    
}
?>
<!DOCTYPE>
<html>
    <head>
    </head>

    <body>
    <form action='index.php' method='post'>
        <label for='name'>Username: </label><input type='text' name='username'>
        <br>
        <label for='name'>Note: <input type="text" name="note"><br>
        <input type='submit' value='Add Note'>
       <p><a href='index.php?do=clear'>Clear Session</a></p></a>
       <?php 
       if ($_POST['username']!==null&&$_POST['note']!==null)
       { if ( strlen($_POST['username']) <=3||strlen($_POST['note'])<=3)  
       { echo "Error: Username and note
    must have at least 3 characters.";}
       else{
           $_SESSION['note'][]=$_POST['username'].':'.$_POST['note'];}
       

     if(is_array( $_SESSION['note']))      
     {  foreach ($_SESSION['note'] as $j)
           {
               echo '<p>'.$j.'</p><br>';
           }
     }
     else echo '<p>'.$_SESSION['note'].'</p><br>';}
           
        ?> 
    </form>

  
    
    </body>
</html>

