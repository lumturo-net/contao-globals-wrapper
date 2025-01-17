<?php

namespace LumturoNet\Globals;

use LumturoNet\Globals\Dca\Config\Item as ConfigItem;
use LumturoNet\Globals\Dca\Fields\Item as FieldItem;
use LumturoNet\Globals\Dca\Lists\Item as ListItem;
use LumturoNet\Globals\Dca\Palettes\Item as PalettesItem;
use LumturoNet\Globals\Dca\Palettes\Subpalette;

/**
 * Class Dca
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <cw@lumturo.net>
 * @package LumturoNet\Globals
 */
class Dca
{
    /**
     * @var Dca
     */
    public static Dca $instance;
    /**
     * @var string
     */
    public static string $namespace;

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
    public static function new($namespace): Dca
    {
        self::$instance  = new self;
        self::$namespace = $namespace;

        return self::$instance;
    }

    /**
     * @param false $extend
     * @return ConfigItem
     * @throws Exceptions\DcaConfigNotSetException
     */
    public function config(bool $extend = false): ConfigItem
    {
        return new ConfigItem(static::$namespace, $extend);
    }

    /**
     * @param false $extend
     * @return ListItem
     * @throws Exceptions\DcaListNotSetException
     */
    public function list(bool $extend = false): ListItem
    {
        return new ListItem(static::$namespace, $extend);
    }

    /**
     * @param $field
     * @param false $extend
     * @return FieldItem
     * @throws Exceptions\DcaFieldExistsException
     * @throws Exceptions\DcaFieldNotSetException
     */
    public function fields($field, bool $extend = false): FieldItem
    {
        return new FieldItem(static::$namespace, $field, $extend);
    }

    /**
     * @param $element
     * @param bool $extend
     * @return PalettesItem
     */
    public function palettes($element, bool $extend = false): PalettesItem
    {
        return new PalettesItem(static::$namespace, $element, $extend);
    }

    /**
     * @param $element
     * @return Subpalette
     */
    public function subpalette($element): Subpalette
    {
        return new Subpalette(static::$namespace, $element);
    }
}