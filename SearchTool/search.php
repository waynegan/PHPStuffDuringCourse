
<?php 
 
 session_start();           

if(isset($_SESSION['user']))
{$user = $_SESSION['user'];
?> <a href='../logout.php'>Log out</a><?php
}
elseif(isset($_SESSION['fb_token'])){
    
    $user = $_SESSION['fb_token'];
    ?> <a href='../logout.php'>Log out</a><?php
}
else
    $user = false;
if($user === false){                                   /*Log in is necessary if one want to add/delete notes */
   
    ?><a href='../index1.php'>Login</a>&nbsp
    <a href='../fblogin/index.php'>Login via facebook</a><?php
      
        }



$mysqli = mysqli_connect('174.79.32.158','PHP07','PHP07','PHP07');
if(mysqli_connect_errno()) {
    die(mysqli_connect_error());
}

$error_message = '';
$status_message = '';

$searchs = mysqli_real_escape_string($mysqli, @$_POST['search']);


$queryStr = "SELECT * FROM item  WHERE name like '%$searchs%'";						/*display all notes */
$result = mysqli_query($mysqli,$queryStr);

$notes = array();
while($row = mysqli_fetch_array($result)) {
    $notes[] = $row;
}

mysqli_close($mysqli);

/*if database is empty, it will return empty,but in order to debug ,i add some data to my database. */

?>
	
	
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<link rel="stylesheet" href="../styles/main.css">
<link rel="shortcut icon" href="../images/favicon.png">
</head>
<body>
	<span> <a href="index.html"><img src="http://www.thewawagoose.com/img/TIC.png" alt="Sarnia Warming Goose" style="width:85px;height:85px;"/></a>
</span>


<header>
<h1>Sarnia Warming Goose</h1>
<h2>PROUDLY MADE IN SARNIA SINCE 1958</h2>
	<nav>
    	<ul>
    		<li><a  href="../index.php">Home</a></li>
    		<li><a class="noline" href="../index.php?list=1">Product List</a></li>
    		<li><a href="../Personal.html">Personal</a></li>
    		<li><a href="../Planning.html">Planning</a></li>
			<li><a href="../Email.html">Join Email</a></li>
    	</ul>
   </nav>
</header>

<aside>
<ul>
<li><a href="../index.php?list=2">MEN&#39;S</a></li>
<li><a href="../index.php?list=3">WOMEN&#39;S</a></li>
<li><a href="../index.php?list=4">KID&#39;S</a></li>
<li><a href="../index.php?list=5">ACCESSORIES</a></li>
</ul></aside>
	<section>
	<table>
<caption><h1>Products List</h1></caption>
<tr>
<th>Category</th>
<th>Description</th>
<th>Price</th>
<th>Average Marks</th>
</tr>
	<?php foreach ($notes as $j)
{?><tr>
<td> <?php echo $j[0]?></td>
<td><?php echo $j[1]?></td>
<td><?php echo $j[2]?></td>
<td><?php echo $j[3]?></td>

<br>

</tr><?php }?>
</table>
	</section>


     
<br/>
<footer>&#169; 2015 Wei Gan</footer>  


</body></html>