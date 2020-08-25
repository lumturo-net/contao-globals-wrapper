<?php

namespace Lupcom\Globals\Dca\Palettes;

/**
 * Class Palettes
 * @package Lupcom\Globals\Dca\Options
 */
class Item
{
    /**
     * @var null
     */
    private $namespace = null;
    /**
     * @var null
     */
    private $element = null;
    /**
     * @var array
     */
    private $palette = [];
    /**
     * @var null
     */
    private $currentGroup = null;

    /**
     * Palettes constructor.
     * @param $namespace
     * @param $element
     */
    public function __construct($namespace, $element)
    {
        $this->namespace = $namespace;
        $this->element   = $element;
    }

    /**
     * @param $legend
     * @param null $translation
     * @param false $hidden
     * @return Item
     */
    public function group($legend, $translation = null, $hidden = false): Item
    {
        $this->currentGroup     = $legend;
        $this->palette[$legend] = [
            'hidden' => $hidden,
            'fields' => []
        ];

        return $this;
    }

    /**
     * @param array $fields
     * @return Item
     */
    public function fields(array $fields): Item
    {
        $this->palette[$this->currentGroup]['fields'] = $fields;

        return $this;
    }

    /**
     *
     */
    public function compile()
    {
        $compiled = [];

        foreach ($this->palette as $legend => $values) {
            $values['fields'] = implode(',', $values['fields']);
            $compiled[]       = '{' . $legend . ($values['hidden'] ? ':hide' : '') . '},' . $values['fields'];
        }

        $GLOBALS['TL_DCA'][$this->namespace]['palettes'][$this->element] = implode(';', $compiled);
    }
}