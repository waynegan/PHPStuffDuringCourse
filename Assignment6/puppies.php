<?php
$breedInfo = array('German Shepherd'=>array('origin'=>'Germany','size'=>'Large'));
$breed = $_GET['breed'];

    if(isset($breedInfo[$breed])) {
        echo '<h1>'. $breed .'</h1>';
        echo '<h2>Country of Origin: '.$breedInfo[$breed]['origin'] .'</h2>';
        echo '<h3>Country of Origin: '.$breedInfo[$breed]['size'] .'</h3>';
    }
    else {
        echo "There is no information about $breed.";
    }