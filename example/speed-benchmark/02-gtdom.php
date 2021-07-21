<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "PHP.Gt/Dom speed benchmark test.", PHP_EOL;
echo "Create a <ul> containing 1,000 items from an array of random values.", PHP_EOL;

$t = microtime(true);
$fakeData = [];
for($i = 0; $i < 1_000; $i++) {
	array_push($fakeData, uniqid());
}

$document = new \Gt\Dom\Document();
$ul = $document->createElement("ul");

foreach($fakeData as $datum) {
	$li = $document->createElement("li");
	$li->innerHTML = $datum;
	$ul->appendChild($li);
}

$document->appendChild($ul);
echo "OUTPUT START:", PHP_EOL;
echo $document;
echo "OUTPUT END.", PHP_EOL;

$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
