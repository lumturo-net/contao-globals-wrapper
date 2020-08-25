<?php

namespace Lupcom\Globals;

/**
 * Class Lang
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals
 */
class Lang
{
    /**
     * @var
     */
    private $lang;
    /**
     * @var
     */
    private static $instance;

    /**
     * @param string $namespace
     * @return Lang
     */
    public static function new(string $namespace)
    {
        self::$instance       = new self;
        self::$instance->lang = &$GLOBALS['TL_LANG'][$namespace];

        return self::$instance;
    }

    /**
     * @param string $key
     * @param $translation
     * @return $this
     */
    public function trans(string $key, $translation)
    {
        $this->lang[$key] = $translation;

        return $this;
    }
}