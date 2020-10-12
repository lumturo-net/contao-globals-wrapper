<?php

namespace Lupcom\Globals;

/**
 * Class Backend
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals
 */
class Backend
{
    /**
     * @var
     */
    private $backend;

    /**
     * @var
     */
    private static $instance;

    /**
     * Backend constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $namespace
     * @param $module
     * @param int $position
     * @return Backend
     */
    public static function new($namespace, $module, $position = 1)
    {
        if(!isset($GLOBALS['BE_MOD'][$namespace][$module])) {
            array_insert($GLOBALS['BE_MOD'], $position, [$namespace => [$module => []]]);
        }

        self::$instance          = new self;
        self::$instance->backend = &$GLOBALS['BE_MOD'][$namespace][$module];

        return self::$instance;
    }

    /**
     * @param array $tables
     * @param $extend
     * @return $this
     */
    public function tables(array $tables, $extend = false)
    {
        $extend ? $this->backend['tables'] = array_merge($this->backend['tables'], $tables) : $this->backend['tables'] = $tables;

        return $this;
    }
}