<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "PHP.Gt/Dom speed benchmark test.", PHP_EOL;
echo "Load the php.net homepage, with no manipulation.", PHP_EOL;

$t = microtime(true);
$document = new \Gt\Dom\HTMLDocument(file_get_contents(__DIR__ . "/html/php.html"));
echo "OUTPUT START:", PHP_EOL;
echo $document;
echo "OUTPUT END.", PHP_EOL;
$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
