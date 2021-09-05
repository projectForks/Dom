<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "PHP.Gt/Dom speed benchmark test.", PHP_EOL;
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
$document = new \Gt\Dom\HTMLDocument(file_get_contents(__DIR__ . "/html/admin.html"));
$templateLi = $document->querySelector("main li");
$templateLi->remove();

$liNodes = [];
foreach($fakeData as $row) {
	/** @var \Gt\Dom\HTMLElement\HTMLLiElement $li */
	$li = $templateLi->cloneNode(true);
	/** @var \Gt\Dom\HTMLElement\HTMLAnchorElement $a */
	$a = $li->querySelector("a");
	$a->textContent = $row["username"];
	$a->href = str_replace("{id}", $row["id"], $a->href);
	$h3 = $li->querySelector("h3");
	$h3->textContent = $row["type"];
	$li->querySelector("img")->src = $row["photo"];
	$tagUl = $li->querySelector(".tags");

	foreach($row["tags"] as $tag) {
		$innerLi = $document->createElement("li");
		$innerLi->textContent = $tag;
		$tagUl->appendChild($innerLi);
	}

	array_push($liNodes, $li);
}

$document->querySelector("main ul")->append(...$liNodes);

echo "OUTPUT START:", PHP_EOL;
echo $document;
echo "OUTPUT END.", PHP_EOL;

$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
