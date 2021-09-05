<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "Twig speed benchmark test.", PHP_EOL;
echo "Bind 1,000 data rows to a template LI.", PHP_EOL;

$fakeData = [];
for($i = 0; $i < 1000; $i++) {
	$tags = [];
	for($j = 0; $j < 10; $j++) {
		array_push($tags, uniqid("tag-"));
	}

	$row = [
		"id" => rand(1_000, 9_999),
		"username" => uniqid("user-"),
		"type" => uniqid("type-"),
		"photo" => uniqid("/img/photo-") . "jpg",
		"tags" => $tags,
	];
	array_push($fakeData, $row);
}

$t = microtime(true);
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/html");
$twig = new \Twig\Environment($loader);

echo "OUTPUT START:", PHP_EOL;
echo $twig->render("admin.twig", ["fakeData" => $fakeData]);
echo "OUTPUT END.", PHP_EOL;

$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
