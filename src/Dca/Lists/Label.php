<?php

namespace Lupcom\Globals\Dca\Lists;

/**
 * Class Label
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals\Dca\Lists
 */
class Label
{
    /**
     * @var Item
     */
    private $list;
    /**
     * @var array
     */
    private $label = [];

    /**
     * Labels constructor.
     * @param Item $list
     */
    public function __construct(Item $list)
    {
        $this->list = $list;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function fields(array $fields): Label
    {
        $this->label['fields'] = $fields;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function showColumns(bool $value): Label
    {
        $this->label['showColumns'] = $value;

        return $this;
    }

    /**
     * @param string $format
     * @return $this
     */
    public function format(string $format): Label
    {
        $this->label['format'] = $format;

        return $this;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function maxCharacters(int $value): Label
    {
        $this->label['maxCharacters'] = $value;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function groupCallback(array $callback): Label
    {
        $this->label['group_callback'] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function labelCallback(array $callback): Label
    {
        $this->label['label_callback'] = $callback;

        return $this;
    }

    /**
     * @return Item
     */
    public function compile(): Item
    {
        $this->list->list['label'] = $this->label;

        return $this->list;
    }
}