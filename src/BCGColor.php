<?php

declare(strict_types=1);

/**
 *--------------------------------------------------------------------
 *
 * Holds Color in RGB Format.
 *
 *--------------------------------------------------------------------
 * Copyright (C) Jean-Sebastien Goupil
 * http://www.barcodebakery.com
 */

namespace BarcodeBakery\Common;

class BCGColor
{
    protected int $r;
    protected int $g;
    protected int $b;    // int Hexadecimal Value
    protected bool $transparent = false;

    /**
     * Saves RGB value into the classes.
     *
     * There are 4 way to associate color with this classes :
     *  1. Gives 3 parameters int (R, G, B)
     *  2. Gives 1 parameter string hex value (#ff0000) (preceding with #)
     *  3. Gives 1 parameter int hex value (0xff0000)
     *  4. Gives 1 parameter string color code (white, black, orange...)
     *
     * @param mixed ...
     */
    public function __construct(mixed ...$args)
    {
        $c = count($args);
        if ($c === 3) {
            $this->r = intval($args[0]);
            $this->g = intval($args[1]);
            $this->b = intval($args[2]);
        } elseif ($c === 1) {
            if (is_string($args[0]) && strlen($args[0]) === 7 && $args[0][0] === '#') {        // Hex Value in String
                $this->r = intval(substr($args[0], 1, 2), 16);
                $this->g = intval(substr($args[0], 3, 2), 16);
                $this->b = intval(substr($args[0], 5, 2), 16);
            } else {
                if (is_string($args[0])) {
                    $args[0] = self::getColor($args[0]);
                }

                $args[0] = intval($args[0]);
                $this->r = ($args[0] & 0xff0000) >> 16;
                $this->g = ($args[0] & 0x00ff00) >> 8;
                $this->b = ($args[0] & 0x0000ff);
            }
        } else {
            $this->r = $this->g = $this->b = 0;
        }
    }

    /**
     * Sets the color transparent.
     *
     * @param bool $transparent True if transparent.
     * @return void
     */
    public function setTransparent(bool $transparent): void
    {
        $this->transparent = $transparent;
    }

    /**
     * Returns Red Color.
     *
     * @return int The red color.
     */
    public function r(): int
    {
        return $this->r;
    }

    /**
     * Returns Green Color.
     *
     * @return int The green color.
     */
    public function g(): int
    {
        return $this->g;
    }

    /**
     * Returns Blue Color.
     *
     * @return int The blue color.
     */
    public function b(): int
    {
        return $this->b;
    }

    /**
     * Returns the int value for PHP color.
     *
     * @param \GdImage $image The surface
     * @return int|false
     */
    public function allocate(\GdImage $image): int|false
    {
        $allocated = imagecolorallocate($image, $this->r, $this->g, $this->b);
        if ($this->transparent) {
            return imagecolortransparent($image, $allocated);
        } else {
            return $allocated;
        }
    }

    /**
     * Returns class of BCGColor depending of the string color.
     *
     * If the color doens't exist, it takes the default one.
     *
     * @param string $code The color name.
     * @param string $default The default color name.
     * @return int The color.
     */
    public static function getColor(string $code, string $default = 'white'): int
    {
        return match (strtolower($code)) {
            '', 'white' => 0xffffff,
            'black' => 0x000000,
            'maroon' => 0x800000,
            'red' => 0xff0000,
            'orange' => 0xffa500,
            'yellow' => 0xffff00,
            'olive' => 0x808000,
            'purple' => 0x800080,
            'fuchsia' => 0xff00ff,
            'lime' => 0x00ff00,
            'green' => 0x008000,
            'navy' => 0x000080,
            'blue' => 0x0000ff,
            'aqua' => 0x00ffff,
            'teal' => 0x008080,
            'silver' => 0xc0c0c0,
            'gray' => 0x808080,
            default => self::getColor($default, 'white'),
        };
    }
}
