<?php

declare(strict_types=1);

/**
 *--------------------------------------------------------------------
 *
 * Base class to draw images
 *
 *--------------------------------------------------------------------
 * Copyright (C) Jean-Sebastien Goupil
 * http://www.barcodebakery.com
 */

namespace BarcodeBakery\Common\Drawer;

abstract class BCGDraw
{
    protected \GdImage $image;
    protected ?string $fileName = null;

    /**
     * Constructor.
     *
     * @param \GdImage $image The surface.
     */
    protected function __construct(\GdImage $image)
    {
        $this->image = $image;
    }

    /**
     * Sets the file name.
     *
     * @param string|null $fileName The file name.
     * @return void
     */
    public function setFileName(?string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * Method needed to draw the image based on its specification (JPG, GIF, etc.).
     *
     * @return void
     */
    abstract public function draw(): void;
}
