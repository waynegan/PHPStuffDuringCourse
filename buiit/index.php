<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

include('templates/head.php');

include('templates/nav.php');

include("templates/$page.php");

include('templates/foot.php');