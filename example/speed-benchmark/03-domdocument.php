<?php
require __DIR__ . "/../../vendor/autoload.php";

echo "DOMDocument speed benchmark test.", PHP_EOL;
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
$document = new DOMDocument("1.0", "utf-8");
libxml_use_internal_errors(true);
$document->loadHTML(file_get_contents(__DIR__ . "/html/admin.html"));
$xpath = new DOMXPath($document);
/** @var DOMNode $templateLi */
$templateLi = $xpath->evaluate(".//main//li")->item(0);
$templateLi->parentNode->removeChild($templateLi);
$htmlTemplate = $document->saveHTML($templateLi);

$newHTML = "";
foreach($fakeData as $row) {
	$temp = $htmlTemplate;

	$tagHTML = "";
	foreach($row["tags"] as $tag) {
		$tagHTML .= "<li>$tag</li>";
	}
	$row["tags"] = $tagHTML;

	foreach($row as $key => $value) {
		$temp = str_replace('{' . $key . '}', $value, $temp);
	}

	$newHTML .= $temp;
}

$ul = $xpath->evaluate(".//main//ul")->item(0);

$loadDoc = new DOMDocument("1.0", "utf-8");
$loadDoc->loadHTML("<template>$newHTML</template>");
$templateElement = $loadDoc->documentElement->childNodes->item(0)->childNodes->item(0);

foreach($templateElement->childNodes as $child) {
	$imported = $document->importNode($child, true);
	$ul->appendChild($imported);
}

echo "OUTPUT START:", PHP_EOL;
echo $document->saveHTML();
echo "OUTPUT END.", PHP_EOL;

$dt = microtime(true) - $t;
echo "Completed in $dt seconds.", PHP_EOL;
