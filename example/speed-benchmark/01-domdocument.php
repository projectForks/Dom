<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "DOMDocument speed benchmark test.", PHP_EOL;
echo "Load the php.net homepage, with no manipulation.", PHP_EOL;

$t = microtime(true);
$domDoc = new DOMDocument("1.0", "utf-8");
libxml_use_internal_errors(true);
$domDoc->loadHTMLFile(__DIR__ . "/html/php.html");
echo "OUTPUT START:", PHP_EOL;
echo $domDoc->saveHTML();
echo "OUTPUT END.", PHP_EOL;
$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
