<?php
namespace Gt\Dom\HTMLElement;

/**
 * The HTMLLabelElement interface gives access to properties specific to <label>
 * elements. It inherits methods and properties from the base HTMLElement
 * interface.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLLabelElement
 *
 * @property-read HTMLElement $control Is a HTMLElement representing the control with which the label is associated.
 * @property-read HTMLFormElement $form Is a HTMLFormElement object representing the form with which the labeled control is associated, or null if there is no associated control, or if that control isn't associated with a form. In other words, this is just a shortcut for HTMLLabelElement.control.form.
 * @property string $htmlFor Is a string containing the ID of the labeled control. This reflects the for attribute.
 */
class HTMLLabelElement extends HTMLElement {
	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLLabelElement/control */
	protected function __prop_get_control():HTMLElement {

	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLLabelElement/form */
	protected function __prop_get_form():HTMLFormElement {

	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLLabelElement/htmlFor */
	protected function __prop_get_htmlFor():string {

	}

	/** @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLLabelElement/htmlFor */
	protected function __prop_set_htmlFor(string $value):void {

	}
}
