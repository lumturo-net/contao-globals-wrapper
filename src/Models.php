<?php

namespace LumturoNet\Globals;

use LumturoNet\Globals\Exceptions\BindingExistsException;

/**
 * Class Models
 * @package LumturoNet\Globals
 */
class Models
{
    /**
     * @param array $bindings
     * @throws BindingExistsException
     */
    public static function bind(array $bindings)
    {
        foreach ($bindings as $table => $model) {
            if (isset($GLOBALS['TL_MODELS'][$table])) {
                throw new BindingExistsException('The binding "' . $table . ' => ' . $model . ' already exist.');
            }

            $GLOBALS['TL_MODELS'][$table] = $model;
        }
    }
}