<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "Smarty speed benchmark test.", PHP_EOL;
echo "Create a <ul> containing 1,000 items from an array of random values.", PHP_EOL;

$fakeData = [];
for($i = 0; $i < 1000; $i++) {
	array_push($fakeData, uniqid());
}

$t = microtime(true);
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
$smarty->setCompileDir("/tmp/smarty/" . uniqid());
$smarty->assign("fakeData", $fakeData);
$smarty->display("string:$smartyContent");
echo "OUTPUT END.", PHP_EOL;

$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
