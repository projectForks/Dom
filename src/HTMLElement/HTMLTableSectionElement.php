<?php
namespace Gt\Dom\HTMLElement;

use Gt\Dom\HTMLCollection;

/**
 * The HTMLTableSectionElement interface provides special properties and methods
 * (beyond the HTMLElement interface it also has available to it by inheritance)
 * for manipulating the layout and presentation of sections, that is headers,
 * footers and bodies, in an HTML table.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLTableSectionElement
 *
 * @property-read HTMLCollection $rows Returns a live HTMLCollection containing the rows in the section. The HTMLCollection is live and is automatically updated when rows are added or removed.
 */
class HTMLTableSectionElement extends HTMLElement {
	/**
	 * Removes the row at the given position in the section. If the given
	 * position is greater (or equal as it starts at zero) than the amount
	 * of rows in the section, or is smaller than 0, it raises a
	 * DOMException with the IndexSizeError value.
	 *
	 * @param int $index
	 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLTableSectionElement/deleteRow
	 */
	public function deleteRow(int $index):void {

	}

	/**
	 * Inserts a new row just before the given position in the section. If
	 * the given position is not given or is -1, it appends the row to the
	 * end of section. If the given position is greater (or equal as it
	 * starts at zero) than the amount of rows in the section, or is smaller
	 * than -1, it raises a DOMException with the IndexSizeError value.
	 *
	 * @param ?int $index
	 * @return HTMLTableRowElement
	 * @link https://developer.mozilla.org/en-US/docs/Web/API/HTMLTableSectionElement/insertRow
	 */
	public function insertRow(int $index = null):HTMLTableRowElement {

	}

	protected function __prop_get_rows():HTMLCollection {

	}
}
