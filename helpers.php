<?php

use LumturoNet\Globals\Lang;

/**
 * @param string $key
 * @param string|null $namespace
 * @return mixed|string
 */
function __(string $key, string $namespace = null)
{
    return Lang::__($key, $namespace);
}