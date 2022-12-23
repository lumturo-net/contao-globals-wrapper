<?php

namespace LumturoNet\Globals\Dca\Palettes;

/**
 * Class Subpalette
 * @package LumturoNet\Globals\Dca\Palettes
 */
class Subpalette
{
    /**
     * @var string
     */
    private string $namespace;
    /**
     * @var string
     */
    private string $element;
    /**
     * @var array
     */
    private array $fields = [];

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
    public function fields(array $fields): Subpalette
    {
        $this->fields[$this->element] = $fields;

        return $this;
    }

    /**
     * @return $this
     */
    public function compile(): Subpalette
    {
        $GLOBALS['TL_DCA'][$this->namespace]['subpalettes'][$this->element] = implode(',', $this->fields[$this->element]);

        return $this;
    }
}