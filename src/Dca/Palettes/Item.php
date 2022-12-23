<?php

namespace LumturoNet\Globals\Dca\Palettes;

use LumturoNet\Globals\Lang;

/**
 * Class Palettes
 * @package LumturoNet\Globals\Dca\Options
 */
class Item
{
    /**
     * @var string|null
     */
    private ?string $namespace = null;
    /**
     * @var string|null
     */
    private ?string $element = null;
    /**
     * @var array
     */
    private array $palette = [];
    /**
     * @var string|null
     */
    private ?string $currentGroup = null;

    /**
     * @var bool
     */
    private bool $extend = false;

    /**
     * @var string|null
     */
    private ?string $strBefore = null;

    /**
     * @var string|null
     */
    private ?string $strAfter = null;

    /**
     * Palettes constructor.
     * @param $namespace
     * @param $element
     * @param $extend
     */
    public function __construct($namespace, $element, $extend)
    {
        $this->namespace = $namespace;
        $this->element   = $element;
        $this->extend    = $extend;
    }

    /**
     * ```
     * ...->group('my_legend', __('my_legend_translation'), [$hidden = true|false])
     * ```
     *
     * @param $legend
     * @param null $translation
     * @param false $hidden
     * @return Item
     */
    public function group($legend, $translation = null, bool $hidden = false): Item
    {
        $this->currentGroup     = $legend;
        $this->palette[$legend] = [
            'hidden' => $hidden,
            'fields' => []
        ];

        if(!is_null($translation)) {
            Lang::set($this->namespace)->trans($legend, $translation);
        }

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
     * @param $strField
     * @return $this
     */
    public function before($strField): Item
    {
        $this->strBefore = $strField;

        return $this;
    }

    /**
     * @param $strField
     * @return $this
     */
    public function after($strField): Item
    {
        $this->strAfter = $strField;

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
            $compiled[]       = (!empty($legend) ? '{' . $legend . ($values['hidden'] ? ':hide' : '') . '},' : '') . $values['fields'];
        }

        $palette = implode(';', $compiled);

        if($this->extend) {
            if($this->strBefore) {
                $GLOBALS['TL_DCA'][$this->namespace]['palettes'][$this->element] = str_replace($this->strBefore, $palette . ',' . $this->strBefore, $GLOBALS['TL_DCA'][$this->namespace]['palettes'][$this->element]);

                return;
            }

            if($this->strAfter) {
                $GLOBALS['TL_DCA'][$this->namespace]['palettes'][$this->element] = str_replace($this->strAfter, $this->strAfter . ',' . $palette, $GLOBALS['TL_DCA'][$this->namespace]['palettes'][$this->element]);

                return;
            }

            $GLOBALS['TL_DCA'][$this->namespace]['palettes'][$this->element] . ';' . $palette;

            return;
        } else {
            $GLOBALS['TL_DCA'][$this->namespace]['palettes'][$this->element] = $palette;
        }
    }
}