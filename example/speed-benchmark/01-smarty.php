<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "Smarty speed benchmark test.", PHP_EOL;
echo "Load the php.net homepage, with no manipulation.", PHP_EOL;

$t = microtime(true);
$smarty = new Smarty();
echo "OUTPUT START:", PHP_EOL;
$smarty->display(__DIR__ . "/html/php.html");
echo "OUTPUT END.", PHP_EOL;
$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
