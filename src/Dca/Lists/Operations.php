<?php


namespace LumturoNet\Globals\Dca\Lists;


/**
 * Class Operations
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <cw@lumturo.net>
 * @package LumturoNet\Globals\Dca\Lists
 */
class Operations
{
    /**
     * @var Item
     */
    private Item $list;
    /**
     * @var string
     */
    private string $key;
    /**
     * @var array
     */
    private array $operations = [];

    /**
     * Operations constructor.
     * @param Item $item
     * @param $key
     */
    public function __construct(Item $item, $key)
    {
        $this->list = $item;
        $this->key  = $key;
    }

    /**
     * @param $label
     * @return $this
     */
    public function label($label): Operations
    {
        $this->operations['label'] = $label;

        return $this;
    }

    /**
     * @param string $fragment
     * @return $this
     */
    public function href(string $fragment): Operations
    {
        $this->operations['href'] = $fragment;

        return $this;
    }

    /**
     * @param string $icon
     * @return $this
     */
    public function icon(string $icon): Operations
    {
        $this->operations['icon'] = $icon;

        return $this;
    }

    /**
     * @param string $attributes
     * @return $this
     */
    public function attributes(string $attributes): Operations
    {
        $this->operations['attributes'] = $attributes;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function buttonCallback(array $callback): Operations
    {
        $this->operations['button_callback'] = $callback;

        return $this;
    }

    /**
     * @param string $route
     * @return $this
     */
    public function route(string $route): Operations
    {
        $this->operations['route'] = $route;

        return $this;
    }

    /**
     * @return Item
     */
    public function compile(): Item
    {
        $this->list->list['operations'][$this->key] = $this->operations;

        return $this->list;
    }
}