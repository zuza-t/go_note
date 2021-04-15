<?php
$name = "World";
echo "<h1>Hello, $name!</h1>";

$headerNumber = 1;
while ($headerNumber <= 6) {
	echo "<h$headerNumber>Today is " . date("Y.m.d") . "</h$headerNumber>";
	$headerNumber = $headerNumber + 1;
}

$numberOfHeaders = random_int(10, 100);
while ($numberOfHeaders > 0) {
$typeOfHeader = random_int(1, 6);
$number = random_int(100, 1000000);
echo "<h$typeOfHeader>$number</h$typeOfHeader>";
$numberOfHeaders = $numberOfHeaders - 1;
}


