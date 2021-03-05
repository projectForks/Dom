<?php
namespace Gt\Dom\Test;

use Gt\Dom\Facade\HTMLCollectionFactory;
use Gt\Dom\Facade\NodeListFactory;
use Gt\Dom\Test\TestFactory\NodeTestFactory;
use PHPUnit\Framework\TestCase;

class HTMLCollectionTest extends TestCase {
	public function testLength():void {
		$sut = HTMLCollectionFactory::create(fn() => NodeListFactory::create(
			NodeTestFactory::createNode("example"),
			NodeTestFactory::createNode("example")
		));
		self::assertEquals(2, $sut->length);
	}

	public function testCount():void {
		$sut = HTMLCollectionFactory::create(fn() => NodeListFactory::create(
			NodeTestFactory::createNode("example"),
			NodeTestFactory::createNode("example")
		));
		self::assertCount(2, $sut);
	}

	public function testItem():void {
		$element1 = NodeTestFactory::createNode("example");
		$element2 = NodeTestFactory::createNode("example");
		$sut = HTMLCollectionFactory::create(fn() => NodeListFactory::create(
			$element1,
			$element2
		));
		self::assertSame($element2, $sut->item(1));
	}

	public function testItemNone():void {
		$element1 = NodeTestFactory::createNode("example");
		$element2 = NodeTestFactory::createNode("example");
		$sut = HTMLCollectionFactory::create(fn() => NodeListFactory::create(
			$element1,
			$element2
		));
		self::assertNull($sut->item(2));
	}
}
