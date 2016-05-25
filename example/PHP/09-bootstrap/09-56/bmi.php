
<?php
$height = $_POST['height'];
$weight = $_POST['weight'];

$query = "INSERT INTO  `bmi`.`bmi` (`bid` ,`height` ,`weight` ,`btime`) VALUES (
NULL , " . $height . ", " . $weight . ",  '2015-03-02')";



?>
