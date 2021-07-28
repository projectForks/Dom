<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "Mustache speed benchmark test.", PHP_EOL;
echo "Create a <ul> containing 1,000 items from an array of random values.", PHP_EOL;

$fakeData = [];
for($i = 0; $i < 1000; $i++) {
	array_push($fakeData, ["name" => uniqid()]);
}

$t = microtime(true);
$mustacheContent = <<<MUSTACHE
<!DOCTYPE HTML>
<ul>
	{{#fakeData}}
		<li>{{name}}</li>
	{{/fakeData}}
</ul>
MUSTACHE;

$mustache = new Mustache_Engine();
$template = $mustache->loadTemplate($mustacheContent);

echo "OUTPUT START:", PHP_EOL;
echo $template->render(["fakeData" => $fakeData]);
echo "OUTPUT END.", PHP_EOL;

$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
