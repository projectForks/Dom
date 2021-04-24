<?php
namespace Gt\Dom\Test\HTMLElement;

use Gt\Dom\ClientSide\FileList;
use Gt\Dom\Exception\ClientSideOnlyFunctionalityException;
use Gt\Dom\Exception\FunctionalityNotAvailableOnServerException;
use Gt\Dom\HTMLElement\HTMLFormElement;
use Gt\Dom\HTMLElement\HTMLInputElement;
use Gt\Dom\Test\TestFactory\NodeTestFactory;

class HTMLInputElementTest extends HTMLElementTestCase {
	public function testChecked():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelateBool($sut, "checked");
	}

	public function testDefaultChecked():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelateBool($sut, "checked", "defaultChecked");
	}

	public function testIndeterminateGet():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::expectException(FunctionalityNotAvailableOnServerException::class);
		/** @noinspection PhpUnusedLocalVariableInspection */
		$value = $sut->indeterminate;
	}

	public function testIndeterminateSet():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::expectException(FunctionalityNotAvailableOnServerException::class);
		$sut->indeterminate = true;
	}

	public function testAlt():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelate($sut, "alt");
	}

	public function testHeight():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelateInt($sut, true, "height");
	}

	public function testSrc():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelate($sut, "src");
	}

	public function testWidth():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelateInt($sut, true, "width");
	}

	public function testAccept():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelate($sut, "accept");
	}

	public function testFilesGet():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::expectException(ClientSideOnlyFunctionalityException::class);
		/** @noinspection PhpUnusedLocalVariableInspection */
		$value = $sut->files;
	}

	public function testFilesSet():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::expectException(ClientSideOnlyFunctionalityException::class);
		$files = self::createMock(FileList::class);
		$sut->files = $files;
	}

	public function testFormActionDefault():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelate($sut, "formaction", "formAction");
	}

	public function testFormActionWithinForm():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		/** @var HTMLFormElement $form */
		$form = $sut->ownerDocument->createElement("form");
		$form->action = "/example";
		$form->appendChild($sut);
		self::assertEquals("/example", $sut->formAction);
	}

	public function testFormEncTypeDefault():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelate($sut, "formenctype", "formEncType");
	}

	public function testFormEncTypeWithinForm():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		/** @var HTMLFormElement $form */
		$form = $sut->ownerDocument->createElement("form");
		$form->enctype = "test/example";
		$form->appendChild($sut);
		self::assertEquals("test/example", $sut->formEncType);
	}

	public function testFormMethodDefault():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelate($sut, "formmethod");
	}

	public function testFormMethodWithinForm():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		/** @var HTMLFormElement $form */
		$form = $sut->ownerDocument->createElement("form");
		$form->method = "EXAMPLE";
		$form->appendChild($sut);
		self::assertEquals("EXAMPLE", $sut->formMethod);
	}

	public function testFormNoValidate():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelateBool($sut, "formnovalidate", "formNoValidate");
	}

	public function testFormTargetDefault():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelate($sut, "formtarget", "formTarget");
	}

	public function testFormTargetWithinForm():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		/** @var HTMLFormElement $form */
		$form = $sut->ownerDocument->createElement("form");
		$form->target = "/example";
		$form->appendChild($sut);
		self::assertEquals("/example", $sut->formTarget);
	}

	public function testMax():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelate($sut, "max");
	}

	public function testMaxLength():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelateInt($sut, false, "maxlength", "maxLength");
	}

	public function testMin():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelate($sut, "min");
	}

	public function testMinLength():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelateInt($sut, false, "minlength", "minLength");
	}

	public function testPattern():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelate($sut, "pattern");
	}

	public function testPlaceholder():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelate($sut, "placeholder");
	}

	public function testReadOnly():void {
		/** @var HTMLInputElement $sut */
		$sut = NodeTestFactory::createHTMLElement("input");
		self::assertPropertyAttributeCorrelateBool($sut, "readonly", "readOnly");
	}
}
