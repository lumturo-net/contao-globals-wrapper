<?php

namespace LumturoNet\Globals;

/**
 * Class Cte
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <cw@lumturo.net>
 * @package LumturoNet\Globals
 */
class Cte
{
    /**
     * @var array
     */
    private array $cte;

    /**
     * @var Cte
     */
    private static Cte $instance;

    /**
     * Cte constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param string $namespace
     * @return Cte
     */
    public static function new(string $namespace)
    {
        if(!isset($GLOBALS['TL_CTE'][$namespace])) {
            $GLOBALS['TL_CTE'][$namespace] = [];
        }

        self::$instance      = new self;
        self::$instance->cte = &$GLOBALS['TL_CTE'][$namespace];

        return self::$instance;
    }

    /**
     * @param array $elements
     * @return $this
     */
    public function push(array $elements): Cte
    {
        foreach ($elements as $element => $class) {
            $this->cte[$element] = $class;
        }

        return $this;
    }
}