<?php
/**
 * For these tests to complete, you must first install the dependencies for the
 * libraries that are not part of the codebase:
 *
 * composer require "twig/twig:^3.0"
 */
require __DIR__ . "/../../vendor/autoload.php";

$startAt = $argv[1] ?? 1;

$files = array_filter(glob(__DIR__ . "/*.php"), fn(string $phpFile):bool => is_numeric(pathinfo($phpFile, PATHINFO_FILENAME)[0]));
sort($files);

$descriptorSpec = [
	0 => array("pipe", "r"),
	1 => array("pipe", "w"),
	2 => array("pipe", "w"),
];

$averageTimeList = [];

foreach($files as $filePath) {
	$fileName = pathinfo($filePath, PATHINFO_FILENAME);
	[$num, $library] = explode("-", $fileName);
	if(!isset($averageTimeList[$library])) {
		$averageTimeList[$library] = [];
	}

	if($num < $startAt) {
		continue;
	}

	echo "Running test number $num for $library...", PHP_EOL;

	$timeList = [];
	for($i = 1; $i <= 100; $i++) {
		$proc = proc_open(["php", $filePath], $descriptorSpec, $pipes, __DIR__);
		$output = false;
		do {
			$line = fgets($pipes[1], 1024);

			if(strlen($line) > 0) {
				if(preg_match("/Completed in (\d\.\d+)/", $line, $matches)) {
					array_push($timeList, $matches[1]);
					if($i % 5 === 0) {
						echo ".";
					}
				}
				elseif($i === 1) {
					if(strpos($line, "OUTPUT START:") === 0) {
						$output = true;
					}

					if(!$output) {
						echo $line;
					}

					if(strpos($line, "OUTPUT END") === 0) {
						$output = false;
					}
				}
			}

			$status = proc_get_status($proc);
		}
		while($status["running"]);
	}
	echo PHP_EOL;
	$averageTime = number_format(
		array_sum($timeList) / count($timeList),
		4
	);
	array_push($averageTimeList[$library], $averageTime);
	echo "Average time: $averageTime", PHP_EOL, PHP_EOL;
}

echo PHP_EOL, PHP_EOL;
echo "Average times across all libraries:", PHP_EOL;

$libraryNames = array_keys($averageTimeList);
foreach($libraryNames as $library) {
	echo str_pad($library, 20);
}
echo PHP_EOL;
for($i = 0, $len = count($averageTimeList[$libraryNames[0]]); $i < $len; $i++) {
	foreach($libraryNames as $library) {
		echo str_pad($averageTimeList[$library][$i], 20);
	}
	echo PHP_EOL;
}
