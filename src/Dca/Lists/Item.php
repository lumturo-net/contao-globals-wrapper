<?php

namespace LumturoNet\Globals\Dca\Lists;

use LumturoNet\Globals\Exceptions\DcaListNotSetException;

/**
 * Class Item
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <cw@lumturo.net>
 * @package LumturoNet\Globals\Dca\Lists
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
     * @param false $extend
     * @throws DcaListNotSetException
     */
    public function __construct($namespace, $extend = false)
    {
        if (!$extend) {
            $GLOBALS['TL_DCA'][$namespace]['list'] = [];
        }

        if($extend) {
            if(!isset($GLOBALS['TL_DCA'][$namespace]['list'])) {
                throw new DcaListNotSetException('The list to be extended does not exist in the namespace "' . $namespace . '".');
            }
        }

        $this->namespace = $namespace;
        $this->list      = &$GLOBALS['TL_DCA'][$namespace]['list'];
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