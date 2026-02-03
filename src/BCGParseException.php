<?php

declare(strict_types=1);

/**
 *--------------------------------------------------------------------
 *
 * Parse Exception
 *
 *--------------------------------------------------------------------
 * Copyright (C) Jean-Sebastien Goupil
 * http://www.barcodebakery.com
 */

namespace BarcodeBakery\Common;

class BCGParseException extends \Exception
{
    /**
     * Constructor with specific message for a barcode.
     *
     * @param string $barcode The barcode name.
     * @param string $message The message.
     */
    public function __construct(protected string $barcode, string $message)
    {
        parent::__construct($message, 10000);
    }
}
