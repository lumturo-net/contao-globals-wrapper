<?php

namespace LumturoNet\Globals;

/**
 * Class Backend
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <cw@lumturo.net>
 * @package LumturoNet\Globals
 */
class Backend
{
    /**
     * @var array
     */
    private array $backend;

    /**
     * @var Backend
     */
    private static Backend $instance;

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
    public static function new($namespace, $module, int $position = 1): Backend
    {
        if(!isset($GLOBALS['BE_MOD'][$namespace][$module])) {
            array_insert($GLOBALS['BE_MOD'], $position, [$namespace => [$module => []]]);
        }

        self::$instance          = new self;
        self::$instance->backend = &$GLOBALS['BE_MOD'][$namespace][$module];

        return self::$instance;
    }

    /**
     * @param  array  $tables
     * @param  bool  $extend
     * @return $this
     */
    public function tables(array $tables, bool $extend = false): Backend
    {
        $extend ? $this->backend['tables'] = array_merge($this->backend['tables'], $tables) : $this->backend['tables'] = $tables;

        return $this;
    }
}