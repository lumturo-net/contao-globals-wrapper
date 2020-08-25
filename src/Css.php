<?php

namespace Lupcom\Globals;

use Lupcom\Globals\Exceptions\CssExistsException;

/**
 * Class Css
 * @copyright LUPCOM media GmbH
 * @author Christian Wederka <christian.wederka@lupcom.de>
 * @package Lupcom\Globals
 */
class Css
{
    /**
     * @param array $css
     * @throws CssExistsException
     */
    public static function push(array $css)
    {
        foreach ($css as $item) {
            if (in_array($item, $GLOBALS['TL_CSS'])) {
                throw new CssExistsException('The given CSS item "' . $item . '" already exists in TL_CSS');
            }

            $GLOBALS['TL_CSS'][] = $item;
        }
    }
}