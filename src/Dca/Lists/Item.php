<?php

namespace Lupcom\Globals\Dca\Lists;

/**
 * Class Item
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals\Dca\Lists
 */
class Item
{
    /**
     * @var
     */
    private $namespace;
    /**
     * @var
     */
    public $list;

    /**
     * Item constructor.
     * @param $namespace
     */
    public function __construct($namespace)
    {
        $this->namespace = $namespace;

        $GLOBALS['TL_DCA'][$namespace]['list'] = [];
        $this->list                            = &$GLOBALS['TL_DCA'][$namespace]['list'];
    }

    /**
     * @return Sorting
     */
    public function sorting(): Sorting
    {
        return new Sorting($this);
    }

    /**
     * @return Label
     */
    public function label(): Label
    {
        return new Label($this);
    }

    /**
     * @param $key
     * @return GlobalOperations
     */
    public function globalOperations($key): GlobalOperations
    {
        return new GlobalOperations($this, $key);
    }

    /**
     * @param $key
     * @return Operations
     */
    public function operations($key): Operations
    {
        return new Operations($this, $key);
    }
}