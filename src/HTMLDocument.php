<?php
namespace Gt\Dom;

use Gt\Dom\Facade\DOMDocumentFacade;
use Gt\Dom\Facade\LazyLoadDomDocument;
use Gt\Dom\HTMLElement\HTMLElement;
use Gt\PropFunc\MagicProp;
use ReflectionObject;

/**
 * @method HTMLElement createElement(string $tagName)
 */
class HTMLDocument extends Document {
	const DEFAULT_DOCTYPE = "<!doctype html>";
	const EMPTY_DOCUMENT_STRING = self::DEFAULT_DOCTYPE . "<html><head></head><body></body></html>";
	const W3_NAMESPACE = "http://www.w3.org/1999/xhtml";

	/** @noinspection PhpMissingParentConstructorInspection */
	public function __construct(string $html = "") {
		$this->content = $html;
		$this->domDocument = new LazyLoadDomDocument(
			fn() => $this->lazyConstruct(),
			$this
		);
	}

	private function lazyConstruct():void {
		parent::__construct();

		if(strlen($this->content) === 0) {
			$this->content = self::EMPTY_DOCUMENT_STRING;
		}

// Default the doctype to HTML5's doctype.
		$posDoctype = stripos($this->content, "<!doctype");
		$posFirstAngleBracket = strpos($this->content, "<");
		if(false === $posDoctype
		|| $posDoctype > $posFirstAngleBracket) {
			$this->content = self::DEFAULT_DOCTYPE . $this->content;
		}

		$this->open();
		/** @noinspection PhpFieldAssignmentTypeMismatchInspection */
		$this->content = preg_replace_callback(
			'/[\x{80}-\x{10FFFF}]/u',
			function($match) {
				return mb_convert_encoding(
					$match[0],
					"HTML-ENTITIES",
					"UTF-8"
				);
			},
			$this->content
		);
		$this->domDocument->loadHTML($this->content, Document::LIBXML_OPTIONS);

		if(!$this->domDocument->documentElement) {
			$html = $this->domDocument->createElement("html");
			$this->domDocument->appendChild($html);
		}

		if(!$this->domDocument->getElementsByTagName("head")->item(0)
		) {
			$head = $this->domDocument->createElement("head");
			$this->domDocument->documentElement->insertBefore(
				$head,
				$this->domDocument->documentElement->firstChild
			);
		}
		if(!$this->domDocument->getElementsByTagName("body")->item(0)
		) {
			$body = $this->domDocument->createElement("body");
			$this->domDocument->documentElement->appendChild($body);
		}
	}

	protected function __prop_get_contentType():string {
		return "text/html";
	}
}
