<?php

namespace LumturoNet\Globals;

/**
 * Class Lang
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <cw@lumturo.net>
 * @package LumturoNet\Globals
 */
class Lang
{
    /**
     * @var array|null
     */
    private ?array $lang = null;
    /**
     * @var Lang
     */
    private static Lang $instance;

    /**
     * @param string $namespace
     * @deprecated Lang::new($namespace) is deprecated and will be removed in the next version. Use Lang::set($namespace) instead
     * @return Lang
     */
    public static function new(string $namespace): Lang
    {
        return self::set($namespace);
    }

    /**
     * @param string $key
     * @param $translation
     * @return $this
     */
    public function trans(string $key, $translation): Lang
    {
        $this->lang[$key] = $translation;

        return $this;
    }

    /**
     * @param string $namespace
     * @return Lang
     */
    public static function set(string $namespace): Lang
    {
        self::$instance       = new self;
        self::$instance->lang = &$GLOBALS['TL_LANG'][$namespace];

        return self::$instance;
    }

    /**
     * @param string $namespace
     * @param string $key
     * @return mixed|string
     * @deprecated Lang::get($namespace, $key) is deprecated and will be removed in the next version. Use Lang::set($namespace) to set namespace before and __($key) to get translations.
     */
    public static function get(string $namespace, string $key)
    {
        return self::__($namespace, $key);
    }

    /**
     * @param string $key
     * @param string|null $namespace
     * @return mixed|string
     */
    public static function __(string $key, string $namespace = null)
    {
        if(!is_null($namespace)) {
            return $GLOBALS['TL_LANG'][$namespace][$key] ?? '[MISSING TRANSLATION STRING]';
        }

        return self::$instance->lang[$key] ?? '[MISSING TRANSLATION STRING]';
    }
}