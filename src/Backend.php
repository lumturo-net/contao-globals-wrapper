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
     * @return Backend
     */
    public static function new($namespace, $module)
    {
        $GLOBALS['BE_MOD'][$namespace][$module] = [];

        self::$instance          = new self;
        self::$instance->backend = &$GLOBALS['BE_MOD'][$namespace][$module];

        return self::$instance;
    }

    /**
     * @param array $tables
     * @return $this
     */
    public function tables(array $tables)
    {
        $this->backend['tables'] = $tables;

        return $this;
    }
}