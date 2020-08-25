<?php

namespace Lupcom\Globals;

/**
 * Class Cte
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals
 */
class Cte
{
    /**
     * @var
     */
    private $cte;

    /**
     * @var
     */
    private static $instance;

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
        $GLOBALS['TL_CTE'][$namespace] = [];

        self::$instance      = new self;
        self::$instance->cte = &$GLOBALS['TL_CTE'][$namespace];

        return self::$instance;
    }

    /**
     * @param array $elements
     * @return $this
     */
    public function push(array $elements)
    {
        foreach ($elements as $element => $class) {
            $this->cte[$element] = $class;
        }

        return $this;
    }
}