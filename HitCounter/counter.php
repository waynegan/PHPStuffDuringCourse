<?php
$counts = ("Hitcounter/hitcounter.txt");
$hits = file($counts);
$hits[0] ++;
$fp = fopen($counts , "w");
fputs($fp , "$hits[0]");
fclose($fp);
echo "<h2>now,the hit counts is:</h2>"."<h1>".$hits[0]."</h1>";?>