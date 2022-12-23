<?php


namespace LumturoNet\Globals\Dca\Lists;


/**
 * Class GlobalOperations
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <cw@lumturo.net>
 * @package LumturoNet\Globals\Dca\Lists
 */
class GlobalOperations
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
    private array $globalOperations = [];

    /**
     * GlobalOperations constructor.
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
    public function label($label): GlobalOperations
    {
        $this->globalOperations['label'] = $label;

        return $this;
    }

    /**
     * @param string $fragment
     * @return $this
     */
    public function href(string $fragment): GlobalOperations
    {
        $this->globalOperations['href'] = $fragment;

        return $this;
    }

    /**
     * @param string $cssClass
     * @return $this
     */
    public function class(string $cssClass): GlobalOperations
    {
        $this->globalOperations['class'] = $cssClass;

        return $this;
    }

    /**
     * @param string $attributes
     * @return $this
     */
    public function attributes(string $attributes): GlobalOperations
    {
        $this->globalOperations['attributes'] = $attributes;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function buttonCallback(array $callback): GlobalOperations
    {
        $this->globalOperations['button_callback'] = $callback;

        return $this;
    }

    /**
     * @param string $route
     * @return $this
     */
    public function route(string $route): GlobalOperations
    {
        $this->globalOperations['route'] = $route;

        return $this;
    }

    /**
     * @return Item
     */
    public function compile(): Item
    {
        $this->list->list['global_operations'][$this->key] = $this->globalOperations;

        return $this->list;
    }
}