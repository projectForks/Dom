<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "Twig speed benchmark test.", PHP_EOL;
echo "Load the php.net homepage, with no manipulation.", PHP_EOL;

$t = microtime(true);
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/html");
$twig = new \Twig\Environment($loader);
echo "OUTPUT START:", PHP_EOL;
echo $twig->render("php.html");
echo "OUTPUT END.", PHP_EOL;
$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
