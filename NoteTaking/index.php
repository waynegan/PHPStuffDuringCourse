<?php 
$mysqli = mysqli_connect('174.79.32.158','PHP07','PHP07','PHP07');
if(mysqli_connect_errno()) {
    die(mysqli_connect_error());
}
$status_message = "";
$error_message = "";
$display_form = true;


if(isset($_GET['do'])) {
	if($_GET['do'] == 'clear') {
		$queryStr = "DELETE FROM notes";
		mysqli_query($mysqli,$queryStr);
		if(mysqli_errno($mysqli)) {
		    $error_message = mysqli_error($mysqli);
		}
		$num_rows = mysqli_affected_rows($mysqli);
		$status_message = "$num_rows deleted.";
		$display_form = false;
	}
}

$queryStr = "SELECT * FROM notes";
$result = mysqli_query($mysqli,$queryStr);

$notes = array();
while($row = mysqli_fetch_array($result)) {
    $notes[] = $row;
}

mysqli_close($mysqli);

include("master.php");

?>