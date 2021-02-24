<?php
namespace Gt\Dom\Test\TestFactory;

use Gt\Dom\DOMParser;
use Gt\Dom\HTMLDocument;
use Gt\Dom\XMLDocument;

class DocumentTestFactory {
	const HTML_DEFAULT = <<<HTML
<!doctype html>
<h1>Hello, PHP.Gt!</h1>
HTML;
	const HTML_DEFAULT_UTF8 = <<<HTML
<!doctype html>
<meta charset="utf-8" />
<h1>Hello, PHP.Gt!</h1>
HTML;


	const XML_DEFAULT = <<<XML
<?xml version="1.0" ?>
<example/>
XML;

	const XML_BREAKFAST_MENU = <<<XML
<?xml version="1.0" ?>
<menu>
<food>
    <name>Belgian Waffles</name>
    <price>$5.95</price>
    <description>Two of our famous Belgian Waffles 
      with plenty of real maple syrup.</description>
    <calories>650</calories>
  </food>
  <food>
    <name>Strawberry Belgian Waffles</name>
    <price>$7.95</price>
    <description>Light Belgian waffles covered with 
     strawberries and whipped cream.</description>
    <calories>900</calories>
  </food>
  <food>
    <name>Berry-Berry Belgian Waffles</name>
    <price>$8.95</price>
    <description>Light Belgian waffles covered 
      with an assortment of fresh berries 
      and whipped cream.</description>
    <calories>900</calories>
  </food>
  <food>
    <name>French Toast</name>
    <price>$4.50</price>
    <description>Thick slices made from our homemade 
     sourdough bread.</description>
    <calories>600</calories>
  </food>
  <food>
    <name>Homestyle Breakfast</name>
    <price>$6.95</price>
    <description>Two eggs, bacon or sausage, toast, 
      and our ever-popular hash browns.</description>
    <calories>950</calories>
  </food>
</menu>
XML;

	const XML_BOOK = <<<XML
<!DOCTYPE book [<!ENTITY h 'hardcover'>]>
<book genre='novel' ISBN='1-861001-57-5'>
	<title>Pride And Prejudice</title>
	<style>&h;</style>
</book>
XML;


	public static function createHTMLDocument(
		string $html = self::HTML_DEFAULT
	):HTMLDocument {
		$parser = new DOMParser();
		return $parser->parseFromString($html, "text/html");
	}

	public static function createXMLDocument(
		string $xml = self::XML_DEFAULT
	):XMLDocument {
		$parser = new DOMParser();
		return $parser->parseFromString($xml, "text/xml");
	}
}
