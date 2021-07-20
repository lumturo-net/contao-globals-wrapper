<?php

namespace LumturoNet\Globals;

use LumturoNet\Globals\Exceptions\CssExistsException;

/**
 * Class Css
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <cw@lumturo.net>
 * @package LumturoNet\Globals
 */
class Css
{
    /**
     * @param array $css
     * @throws CssExistsException
     */
    public static function push(array $css)
    {
        is_array($GLOBALS['TL_CSS']) ? null : $GLOBALS['TL_CSS'] = [];

        foreach ($css as $item) {
            if (in_array($item, $GLOBALS['TL_CSS'])) {
                throw new CssExistsException('The given CSS item "' . $item . '" already exists in TL_CSS');
            }

            $GLOBALS['TL_CSS'][] = $item;
        }
    }
}