<?php
$array = array(
	"foo" => "bar",
	42 => 24,
);
var_dump($array["foo"]);

$array[42] = 100;
var_dump($array{42});
?>
