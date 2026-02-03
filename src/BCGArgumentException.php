<?php

declare(strict_types=1);

/**
 *--------------------------------------------------------------------
 *
 * Argument Exception
 *
 *--------------------------------------------------------------------
 * Copyright (C) Jean-Sebastien Goupil
 * http://www.barcodebakery.com
 */

namespace BarcodeBakery\Common;

class BCGArgumentException extends \Exception
{
    /**
     * Constructor with specific message for a parameter.
     *
     * @param string $message The message.
     * @param string $param The parameter.
     */
    public function __construct(string $message, protected string $param)
    {
        parent::__construct($message, 20000);
    }
}
