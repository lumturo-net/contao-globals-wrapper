<?php

namespace Lupcom\Globals\Dca\Palettes;

use InvalidArgumentException;
use Lupcom\Globals\Lang;

/**
 * Class Subpalette
 * @package Lupcom\Globals\Dca\Palettes
 */
class Subpalette
{
    private $namespace;
    private $fields;
    private $palette = [];
    private $currentGroup;
    private $currentField = null;
    private $item;

    /**
     * Subpalette constructor.
     * @param $namespace
     * @param array $fields
     * @param Item $item
     */
    public function __construct($namespace, array $fields, Item $item)
    {
        $this->namespace = $namespace;
        $this->fields    = $fields;
        $this->item      = $item;
    }

    /**
     * @param $field
     * @return $this
     */
    public function palette($field): Subpalette
    {
        if(!in_array($field, $this->fields)) {
            return new InvalidArgumentException('The given field "' . $field . '" is not in the previously defined array of fields for this subpalette.');
        }

        if($this->currentField != $field && !is_null($this->currentField)) {
            $this->buildPalette();

            $this->palette = [];
            $this->currentGroup = null;
        }

        $this->currentField = $this->fields[array_search($field, $this->fields)];

        return $this;
    }

    /**
     * @param $legend
     * @param null $translation
     * @param false $hidden
     * @return $this
     */
    public function group($legend, $translation = null, $hidden = false): Subpalette
    {
        $this->currentGroup     = $legend;
        $this->palette[$legend] = [
            'hidden' => $hidden,
            'fields' => []
        ];

        if(!is_null($translation)) {
            Lang::new($this->namespace)->trans($legend, $translation);
        }

        return $this;
    }

    /**
     * @param array $fields
     * @return Subpalette
     */
    public function fields(array $fields): Subpalette
    {
        $this->palette[$this->currentGroup]['fields'] = $fields;

        return $this;
    }

    /**
     * @return Item
     */
    public function compile()
    {
        $this->buildPalette();

        return $this->item;
    }

    /**
     *
     */
    private function buildPalette()
    {
        $compiled = [];

        foreach ($this->palette as $legend => $values) {
            $values['fields'] = implode(',', $values['fields']);
            $legend = !empty($legend) ? '{' . $legend . ($values['hidden'] ? ':hide' : '') . '},' : '';
            $compiled[]       = $legend . $values['fields'];
        }

        $GLOBALS['TL_DCA'][$this->namespace]['subpalettes'][$this->currentField] = implode(';', $compiled);
    }
}