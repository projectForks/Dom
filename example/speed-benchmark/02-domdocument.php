<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "DOMDocument speed benchmark test.", PHP_EOL;
echo "Create a <ul> containing 1,000 items from an array of random values.", PHP_EOL;

$t = microtime(true);
$fakeData = [];
for($i = 0; $i < 1_000; $i++) {
	array_push($fakeData, uniqid());
}

$domDoc = new DOMDocument("1.0", "utf-8");
$ul = $domDoc->createElement("ul");

foreach($fakeData as $datum) {
	$li = $domDoc->createElement("li");
	$li->nodeValue = $datum;
	$ul->appendChild($li);
}

$domDoc->appendChild($ul);
echo "OUTPUT START:", PHP_EOL;
echo $domDoc->saveHTML();
echo "OUTPUT END.", PHP_EOL;

$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
