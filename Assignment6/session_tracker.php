<?php
session_start();
if (isset($_SESSION['access']))
{
 $_SESSION['access'][]=time();   
}
else {$_SESSION['access']=array(time());   }
echo count($_SESSION['access']).'<br>';
foreach($_SESSION['access'] as $j)
{

echo $j.'<br>';}
?>
<!DOCTYPE>
<html>
<a href='clear_access.php'>Clear Access</a>