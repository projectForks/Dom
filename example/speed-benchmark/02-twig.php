<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "Twig speed benchmark test.", PHP_EOL;
echo "Create a <ul> containing 1,000 items from an array of random values.", PHP_EOL;

$t = microtime(true);
$fakeData = [];
for($i = 0; $i < 1_000; $i++) {
	array_push($fakeData, uniqid());
}

$twigContent = <<<TWIG
<!DOCTYPE HTML>
<ul>
	{% for datum in fakeData %}
		<li>{{ datum }}</li>
	{% endfor %} 
</ul>
TWIG;

$loader = new \Twig\Loader\ArrayLoader([
	"index" => $twigContent
]);
$twig = new \Twig\Environment($loader);

echo "OUTPUT START:", PHP_EOL;
echo $twig->render("index", ["fakeData" => $fakeData]);
echo "OUTPUT END.", PHP_EOL;

$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
