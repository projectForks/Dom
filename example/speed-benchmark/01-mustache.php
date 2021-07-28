<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "Mustache speed benchmark test.", PHP_EOL;
echo "Load the php.net homepage, with no manipulation.", PHP_EOL;

$t = microtime(true);
$mustache = new Mustache_Engine([
	"loader" => new Mustache_Loader_FilesystemLoader(__DIR__ . "/html", [
		"extension" => ".html"
	])
]);
echo "OUTPUT START:", PHP_EOL;
echo $mustache->render("php.html");
echo "OUTPUT END.", PHP_EOL;
$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
