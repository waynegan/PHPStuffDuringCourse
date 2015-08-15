 <?php 
 include "notes.php" ;
 function displayNotes(){
  
     $mysqli = mysqli_connect('174.79.32.158','PHP07','PHP07','PHP07');//mysqli connect to database
     if(mysqli_connect_errno()) {
         die(mysqli_connect_error());
     }
     $status_message = "";
     $error_message = "";                                    //error checking.
    
     $queryStr = "SELECT * FROM notes";                         // select the data from database.
     $result = mysqli_query($mysqli,$queryStr);
     
     $notes = array();                                          // establish a empty array.
     while($row = mysqli_fetch_array($result)) {
         $notes[] = $row;                                       // fill this array with data.
     }
     
     mysqli_close($mysqli);                                        //closed mysqli.
      
     if(isset($notes)) {
         if(count($notes)) {
             foreach($notes as $note) {
                 ?>   <p><strong><?php echo $note['username']; ?></strong>: <?php echo $note['note']; ?> <?php echo $note['timestamps']; ?></p>
                           <?php 
                                         }                          // if database is not null , echo the data from array.
                            }
                    }
  
   }
 
 session_start();           

if(isset($_SESSION['user']))
    $user = $_SESSION['user'];
else
    $user = false;
                                                                  // jugement for whether login

 ?>
    <!DOCTYPE html>
    <html lang='en'>
       <head>

        <link rel='stylesheet' href='style.css' type='text/css'>
    </head>
    <body>
          
    
        <?php  
        /* Display notes from all users, including username, note, and timestamp. */
      include("HitCounter/counter.php");
        displayNotes();
        
        if($user === false){                                   /*Log in is necessary if one want to add/delete notes */
     
            ?><a href='index1.php'>Login</a><?php
     
        }
                                                               /* ask for login */
        else{
            if(isset($_GET['do'])) {                     // delete specific user's notes
                if($_GET['do'] == 'clear') {
                    $mysqli = mysqli_connect('174.79.32.158','PHP07','PHP07','PHP07');//mysqli connect to database
                    if(mysqli_connect_errno()) {
                        die(mysqli_connect_error());
                    }
                    $status_message = "";
                    $error_message = "";                                    //error checking
                    $queryStr = "DELETE FROM notes where username= '$user'";  /* delete specific users notes use sql */
                    mysqli_query($mysqli,$queryStr);
                    if(mysqli_errno($mysqli)) {
                        $error_message = mysqli_error($mysqli);
                    }
                    $num_rows = mysqli_affected_rows($mysqli);
                    $status_message = "$num_rows deleted.";
                    $display_form = false;
            
                    header('location: index.php');              /* if i dont use this, i need to refresh to see the workout. */
                }
            }
          
                addNotes() ;  
      
              
         deleteNotes();
             /*Display a [delete] button beside notes for the currently logged in user.
             */
        ?> <a href='logout.php'>Log out</a><?php   /* Display a link to Log out*/
         
        }
        
        
        
        
        ?></body></html>
 