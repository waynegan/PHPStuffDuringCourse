<?php
$coon=mysqli_connect('174.79.32.158','PHP07','PHP07','PHP07');
$query="SELECT * FROM users";
$result=mysqli_query($coon,$query);
while($row=mysqli_fetch_array($result)){
    
    echo 'Username:'.$row['username'].'<br>Email:'.$row['email'].'<br>';
    
}
mysqli_close($coon);
?>