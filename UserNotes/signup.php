<?php 
if (strlen($_POST['passwd']) >= 5)
{ 
if ($_POST["passwd"] == $_POST["confirmPasswd"])
        {
            
            $mysqli = mysqli_connect('174.79.32.158','PHP07','PHP07','PHP07');
            if(mysqli_connect_errno()) {
                die(mysqli_connect_error());
            }
            $username = mysqli_real_escape_string($mysqli, $_POST['username']);
            $passwd = mysqli_real_escape_string($mysqli, $_POST['passwd']);
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);
            $result = mysqli_query($mysqli, "select username from users where username='$username' ");
            if(mysqli_num_rows($result)>0){
                echo "username is taken";
                
            }
            else {if (mysqli_query($mysqli,"insert into users (username,passwd,email)  values ('$username','$passwd','$email')"))
            { echo "successful registion!" ;}
            else echo "Failed";}}}?> <!DOCTYPE html><body><a href="index.php">Click me to try again!</a></body>

            
           </html>