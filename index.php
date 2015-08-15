 <?php 
 
 
 
 session_start();           

if(isset($_SESSION['user']))
{$user = $_SESSION['user'];
?> <a href='logout.php'>Log out</a><?php
}
elseif(isset($_SESSION['fb_token'])){
    
    $user = $_SESSION['fb_token'];
    ?> <a href='logout.php'>Log out</a><?php
}
else
    $user = false;
if($user === false){                                   /*Log in is necessary if one want to add/delete notes */
   
    ?><a href='index1.php'>Login</a>&nbsp
    <a href='fblogin/index.php'>Login via facebook</a><?php
      
        }
?>
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<link rel="stylesheet" href="styles/main.css">
<link rel="shortcut icon" href="images/favicon.png">
<script type="text/javascript">
    function updateTextInput(val) {
      document.getElementById('textInput').value=val; 
    }
  </script>
</head>
<body>
	<span> <a href="index.html"><img src="http://www.thewawagoose.com/img/TIC.png" alt="Sarnia Warming Goose" style="width:85px;height:85px;"/></a>
</span>


<header>
<h1>Sarnia Warming Goose</h1>
<h2>PROUDLY MADE IN SARNIA SINCE 1958</h2>
	<nav>
    	<ul>
    		<li><a class="noline" href="index.php">Home</a></li>
    		<li><a href="index.php?list=1">Product List</a></li>
    		<li><a href="index.php">Personal</a></li>
    		<li><a href="index.php">Planning</a></li>
			<li><a href="index.php">Join Email</a></li>
    	</ul>
   </nav>
</header>

<aside>
<ul>
<li><a href="index.php?list=2">MEN&#39;S</a></li>
<li><a href="index.php?list=3">WOMEN&#39;S</a></li>
<li><a href="index.php?list=4">KID&#39;S</a></li>
<li><a href="index.php?list=5">ACCESSORIES</a></li>
</ul>
<form method="post" action="SearchTool/search.php" name="search" 	style ="padding-top:20px;
	padding-left:10px;">
<input name="search" type="text" value="" size="20" placeholder="input what you want to search"> <input type="submit" value="Search" style="margin-top:8px;">
</form>
</aside>
	<section>
	<?php 
include ("Hitcounter/counter.php");
if(@$_GET['list']){
    ?>
    <table><tr>
    <th>Description</th>
    <th>Category</th>
    
    <th>Price</th>
    <th>Average Marks</th>
   <th>Scores Display:<input type="text" id="textInput" value="" style="width:20px;"></th>
      </tr><?php 
if($_GET['list']==1){
    $queryStr = "SELECT NAME,CATAGORY,PRICE,MARKS FROM item ";						/*display all notes */
    
}
if($_GET['list']==2){
    $queryStr = "SELECT NAME,CATAGORY,PRICE,MARKS FROM item where CATAGORY='MEN\'S'";
    
}if($_GET['list']==3){
$queryStr = "SELECT NAME,CATAGORY,PRICE,MARKS FROM item where CATAGORY='WOMEN\'S'";}
if($_GET['list']==4){$queryStr = "SELECT NAME,CATAGORY,PRICE,MARKS FROM item where CATAGORY='KID\'S'";}
if($_GET['list']==5){$queryStr = "SELECT NAME,CATAGORY,PRICE,MARKS FROM item where CATAGORY='ACCESSORIES'";}

$mysqli = mysqli_connect('174.79.32.158','PHP07','PHP07','PHP07');
if(mysqli_connect_errno()) {
    die(mysqli_connect_error());
}
$error_message = '';
$status_message = '';
$result = mysqli_query($mysqli,$queryStr);
$notes = array();
while($row = mysqli_fetch_array($result)) {
    $notes[] = $row;
}

mysqli_close($mysqli);
foreach ($notes as $j)
{?><tr>
<td> <?php echo $j[0]?></td>
<td><?php echo $j[1]?></td>
<td><?php echo $j[2]?></td>
<td><?php echo $j[3]?></td>
<td><form method="post" action="rate.php?name=<?php echo $j[0]?>"> <input id="range" type="range" name="rate"  min="1" max="5" value="1" step="1" onchange="updateTextInput(this.value);">
<br>
<input type="submit" value="Submit">
</form></td>
</tr><?php }?>
</table>

	</section>
<?php }?>



</body></html><?php if(!isset($_GET['list'])){?>
	<span>We&#39;ve kept 100% of our production at home in Canada because we are committed to outstanding craftsmanship. We believe it&#39;s critical to the integrity of Sarnia Goose and the quality of our products. We believe that no one can do it better. But there&#39;s a more important reason than that.</span>
<h2>Product of the week</h2>
<a href="products/SOLARIS PARKA.html"> <img src="http://hiltonstentcity.com/images/canada-solaris-09-ws-sand-l.gif" alt="Sarnia Warming Goose" style="width:185px;height:185px;"/></a>
<br><a href="products/SOLARIS PARKA.html" >Solaris parka women's</a>
<h3>My guarantee.</h3>
<a> If there is an update,<b>you can get it for free.</b></a></section>

<?php }?>
     
<br/>
<footer>&#169; 2015 Wei Gan</footer>  


</body></html>