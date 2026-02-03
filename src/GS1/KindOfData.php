<?php

declare(strict_types=1);

/**
 *--------------------------------------------------------------------
 *
 * GS1 Kind of data.
 *
 *--------------------------------------------------------------------
 * Copyright (C) Jean-Sebastien Goupil
 * http://www.barcodebakery.com
 */

namespace BarcodeBakery\Common\GS1;

/**
 * GS1 Kind of data.
 */
class KindOfData
{
    /**
     * The content is only numeric.
     */
    public const NUMERIC = 1;

    /**
     * The content contains number and letters.
     */
    public const ALPHA_NUMERIC = 2;

    /**
     * The content is of a date format yymmdd.
     */
    public const DATE = 3;

    /**
     * The content is of a date and time format yymmddhhii or yymmddhhiiss.
     */
    public const DATETIME = 4;
}
