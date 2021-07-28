<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "PHP.Gt/Dom speed benchmark test.", PHP_EOL;
echo "Create a <ul> containing 1,000 items from an array of random values.", PHP_EOL;

$fakeData = [];
for($i = 0; $i < 1000; $i++) {
	array_push($fakeData, uniqid());
}

$t = microtime(true);
$document = new \Gt\Dom\Document();
$ul = $document->createElement("ul");

$liNodes = [];
foreach($fakeData as $datum) {
	$li = $document->createElement("li");
	$li->textContent = $datum;
	array_push($liNodes, $li);
}

$ul->append(...$liNodes);

$document->appendChild($ul);
echo "OUTPUT START:", PHP_EOL;
echo $document;
echo "OUTPUT END.", PHP_EOL;

$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
