<?php

$mysqli = mysqli_connect('174.79.32.158','PHP07','PHP07','PHP07');
if(mysqli_connect_errno()) {
    die(mysqli_connect_error());
}

$error_message = '';
$status_message = '';

if(isset($_POST['username'])) {
    if(strlen($_POST['username']) < 3 || strlen($_POST['note']) < 3) {
        $error_message = 'ERROR: Your username and note must be at least 3 characters long.';
    } else {
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $note = mysqli_real_escape_string($mysqli,$_POST['note']);
         
        $queryStr = "INSERT INTO notes (`username`,`note`) VALUES ('$username','$note')";
        $result = mysqli_query($mysqli, $queryStr);

        if(mysqli_errno($mysqli)) {
            $error_message = mysqli_error($mysqli);
        }
        
        $status_message = 'Note Added Successfully';
        $display_form = 0;
    }
}


mysqli_close($mysqli);

include('master.php');
?>