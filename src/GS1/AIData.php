<?php

declare(strict_types=1);

/**
 *--------------------------------------------------------------------
 *
 * Entry about an AI.
 *
 *--------------------------------------------------------------------
 * Copyright (C) Jean-Sebastien Goupil
 * http://www.barcodebakery.com
 */

namespace BarcodeBakery\Common\GS1;

class AIData
{
    /**
     * Constructor creating an entry for an AI.
     *
     * @param string $ai The AI.
     * @param int $kindOfData The type of data.
     * @param int $minLength The minimum length.
     * @param int $maxLength The maximum length.
     * @param bool $checksum Indicates if a checksum is present.
     * @param string $description The description of the AI.
     */
    public function __construct(
        private string $ai,
        private int $kindOfData,
        private int $minLength,
        private int $maxLength,
        private bool $checksum,
        private string $description
    ) {}

    /**
     * Gets the AI.
     *
     * @return string
     */
    public function getAI(): string
    {
        return $this->ai;
    }

    /**
     * Gets the type of data.
     *
     * @return int
     */
    public function getKindOfData(): int
    {
        return $this->kindOfData;
    }

    /**
     * Gets the minimum length.
     *
     * @return int
     */
    public function getMinLength(): int
    {
        return $this->minLength;
    }

    /**
     * Gets the maximum length.
     *
     * @return int
     */
    public function getMaxLength(): int
    {
        return $this->maxLength;
    }

    /**
     * Indicates if a checksum is required.
     *
     * @return bool
     */
    public function getChecksum(): bool
    {
        return $this->checksum;
    }

    /**
     * The description of the AI.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}
