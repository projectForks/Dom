<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "Smarty speed benchmark test.", PHP_EOL;
echo "Create a <ul> containing 100 items from an array of random values.", PHP_EOL;

$t = microtime(true);
$fakeData = [];
for($i = 0; $i < 100; $i++) {
	array_push($fakeData, uniqid());
}

$smartyContent = <<<SMARTY
<!DOCTYPE HTML>
<ul>
	{foreach \$fakeData as \$datum}
		<li>{\$datum}</li>
	{/foreach}
</ul>
SMARTY;


echo "OUTPUT START:", PHP_EOL;
$smarty = new Smarty();
$smarty->assign("fakeData", $fakeData);
$smarty->display("string:$smartyContent");
echo "OUTPUT END.", PHP_EOL;

$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
