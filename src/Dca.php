<?php

namespace Lupcom\Globals;

use Lupcom\Globals\Dca\Config\Item as ConfigItem;
use Lupcom\Globals\Dca\Fields\Item as FieldItem;
use Lupcom\Globals\Dca\Lists\Item as ListItem;
use Lupcom\Globals\Dca\Palettes\Item as PalettesItem;

/**
 * Class Dca
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals
 */
class Dca
{
    /**
     * @var
     */
    public static $instance;
    /**
     * @var
     */
    public static $namespace;

    /**
     * Dca constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $namespace
     * @return Dca
     */
    public static function new($namespace)
    {
        self::$instance  = new self;
        self::$namespace = $namespace;

        return self::$instance;
    }

    /**
     * @return ConfigItem
     */
    public function config(): ConfigItem
    {
        return new ConfigItem(static::$namespace);
    }

    /**
     * @return ListItem
     */
    public function list(): ListItem
    {
        return new ListItem(static::$namespace);
    }

    /**
     * @param $field
     * @return FieldItem
     * @throws Exceptions\DcaFieldExistsException
     */
    public function fields($field): FieldItem
    {
        return new FieldItem(static::$namespace, $field);
    }

    /**
     * @param $element
     * @return PalettesItem
     */
    public function palettes($element): PalettesItem
    {
        return new PalettesItem(static::$namespace, $element);
    }
}