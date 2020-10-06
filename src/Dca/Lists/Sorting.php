<?php

namespace Lupcom\Globals\Dca\Lists;

use InvalidArgumentException;

/**
 * Class Sorting
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals\Dca\Lists
 */
class Sorting
{
    /**
     * @var
     */
    private $list;
    /**
     * @var array
     */
    private $sorting = [];

    /**
     * Sorting constructor.
     * @param Item $list
     */
    public function __construct(Item $list)
    {
        $this->list = $list;
    }

    /**
     * @param int $mode
     * @return $this
     */
    public function mode(int $mode): Sorting
    {
        $validModes = [
            0,
            // Not sorted
            1,
            // Sort by fixed field
            2,
            // Sort by switchable field
            3,
            // Sort by parent table
            4,
            // Displays child records of parent table
            5,
            // Displays records as tree
            6
            // Displays child records within tree
        ];

        if (!in_array($mode, $validModes)) {
            throw new InvalidArgumentException('The given sorting mode "' . $mode . '" must be one of the following:' . implode('|',
                    $validModes));
        }

        $this->sorting['mode'] = $mode;

        return $this;
    }

    /**
     * @param int $flag
     * @return $this
     */
    public function flag(int $flag): Sorting
    {
        $validFlags = [
            1,
            // ASC: Sort by initial letter
            2,
            // DESC: Sort by initial letter
            3,
            // ASC: Sort by initial two letters
            4,
            // DESC: Sort by initial two letters
            5,
            // ASC: Sort by day
            6,
            // DESC: Sort by day
            7,
            // ASC: Sort by month
            8,
            // DESC: Sort by month
            9,
            // ASC: Sort by year
            10,
            // DESC: Sort by year
            11,
            // ASC
            12
            // DESC
        ];

        if (!in_array($flag, $validFlags)) {
            throw new InvalidArgumentException('The given sorting flag "' . $flag . '" must be one of the following:' . implode('|',
                    $validFlags));
        }

        $this->sorting['flag'] = $flag;

        return $this;
    }

    /**
     * @param string $layout
     * @return $this
     */
    public function panelLayout(string $layout): Sorting
    {
        $this->sorting['panelLayout'] = $layout;

        return $this;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function fields(array $fields): Sorting
    {
        $this->sorting['fields'] = $fields;

        return $this;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function headerFields(array $fields): Sorting
    {
        $this->sorting['headerFields'] = $fields;

        return $this;
    }

    /**
     * @param string $icon
     * @return $this
     */
    public function icon(string $icon): Sorting
    {
        $this->sorting['icon'] = $icon;

        return $this;
    }

    /**
     * @param array $nodes
     * @return $this
     */
    public function root(array $nodes): Sorting
    {
        $this->sorting['root'] = $nodes;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function rootPaste(bool $value = true): Sorting
    {
        $this->sorting['rootPase'] = $value;

        return $this;
    }

    /**
     * @param array $filter
     * @return $this
     */
    public function filter(array $filter): Sorting
    {
        $this->sorting['filter'] = $filter;

        return $this;
    }

    /**
     * @param bool $value
     * @return $this
     */
    public function disableGrouping(bool $value = true): Sorting
    {
        $this->sorting['disableGrouping'] = $value;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function pasteButtonCallback(array $callback): Sorting
    {
        $this->sorting['paste_button_callback'] = $callback;

        return $this;
    }

    /**
     * @param array $callback
     * @return $this
     */
    public function childRecordCallback(array $callback): Sorting
    {
        $this->sorting['child_record_callback'] = $callback;

        return $this;
    }

    /**
     * @param string $cssClass
     * @return $this
     */
    public function childRecordClass(string $cssClass): Sorting
    {
        $this->sorting['child_record_class'] = $cssClass;

        return $this;
    }

    /**
     * @return Item
     */
    public function compile(): Item
    {
        $this->list->list['sorting'] = $this->sorting;

        return $this->list;
    }
}