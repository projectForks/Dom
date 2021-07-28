<?php
namespace Gt\Dom\Facade;

class LazyLoadDomDocument {
	/** @var callable */
	private $callback;
	private object $context;

	public function __construct(callable $callback, object $context) {
		$this->callback = $callback;
		$this->context = $context;
	}

	/** @param array<mixed> $args */
	public function __call(string $name, array $args):mixed {
		$domDocument = $this->lazyInstantiate();
		return call_user_func_array([$domDocument, $name], $args);
	}

	public function __get(string $name):mixed {
		$domDocument = $this->lazyInstantiate();
		return $domDocument->$name;
	}

	public function lazyInstantiate():DOMDocumentFacade {
		call_user_func($this->callback);
		$refObject = new \ReflectionObject($this->context);
		$refProperty = $refObject->getProperty("domDocument");
		$refProperty->setAccessible(true);
		return $refProperty->getValue($this->context);
	}
}
