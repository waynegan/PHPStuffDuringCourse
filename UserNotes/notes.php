<?php
function getNotes(){
    
  $mysqli = mysqli_connect('174.79.32.158','PHP07','PHP07','PHP07');//mysqli connect to database
    if(mysqli_connect_errno()) {
      die(mysqli_connect_error());
   }                               
   $status_message = "";
   $error_message = "";                                    //error checking

    $queryStr = "SELECT * FROM notes";						/*display all notes */
    $result = mysqli_query($mysqli,$queryStr);
    
    $notes = array();
    while($row = mysqli_fetch_array($result)) {
        $notes[] = $row;
    }
    
  mysqli_close($mysqli);
														/*if database is empty, it will return empty,but in order to debug ,i add some data to my database. */
    
    
    return $notes;

}
function addNotes(){	  /*   in add_note.php, i will  add username,note and timestamp to database use SQL to insert these three variables to database,it will limit notes more than 3 words,otherwise 
							   it will outputs 'ERROR: Your username and note must be at least 3 characters long.'*/
    ?>
    
    <form action='add_note.php' method='post'>

    <input type='text' name='note' placeholder='Note'>
  
    <input type='submit' value='Add Note'>
    </form>
    
    <?php
    
}
function deleteNotes(){
    
   ?> <p><a href='index.php?do=clear'><button type="button">Delete</button></a></p><?php  /*index.php will recieved $_GET['do'] == 'clear' and such will delete notes*/
} ?>