<?php

namespace Lupcom\Globals\Dca\Palettes;

/**
 * Class Subpalette
 * @package Lupcom\Globals\Dca\Palettes
 */
class Subpalette
{
    private $namespace;
    private $element;
    private $fields = [];

    /**
     * Subpalette constructor.
     * @param $namespace
     * @param $element
     */
    public function __construct($namespace, $element)
    {
        $this->namespace = $namespace;
        $this->element   = $element;

        $this->fields[$element] = [];

        $GLOBALS['TL_DCA'][$this->namespace]['palettes']['__selector__'][] = $element;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function fields(array $fields)
    {
        $this->fields[$this->element] = $fields;

        return $this;
    }

    /**
     * @return $this
     */
    public function compile()
    {
        $GLOBALS['TL_DCA'][$this->namespace]['subpalettes'][$this->element] = implode(',', $this->fields[$this->element]);

        return $this;
    }
}