<?php

/*
 * This file is part of the ColorWorks package.
 *
 * (c) Mikee Franklin <mikeefranklin@gmail.com>
 *
 */

namespace ColorWorks\Formats;

use ColorWorks\ColorWorks;
use ColorWorks\Exceptions\InvalidArgumentException;

/**
 * Yxy represents the Yxy color format
 *
 *
 * @author Mikee Franklin <mikeefranklin@gmail.com>
 */
class Yxy extends ColorWorks
{

    /**
     * The Y
     * @var float
     */
    public $Y;

    /**
     * The x
     * @var float
     */
    public $x;

    /**
     * The y
     * @var float
     */
    public $y;

    /**
     * Create a new Yxy color
     *
     * @param float $Y The Y
     * @param float $x The x
     * @param float $y The y
     */
    public function __construct($Y, $x, $y)
    {
        $this->toSelf = "toYxy";
        $this->Y = $Y;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * Convert the color to Hex format
     *
     * @return \ColorWorks\Formats\Hex the color in Hex format
     */
    public function toHex()
    {
        return $this->toXYZ()->toRGB()->toHex();
    }

    /**
     * Convert the color to RGB format
     *
     * @return \ColorWorks\Formats\RGB the color in RGB format
     */
    public function toRGB()
    {
        return $this->toXYZ()->toRGB();
    }

    /**
     * Convert the color to XYZ format
     *
     * @return \ColorWorks\Formats\XYZ the color in XYZ format
     */
    public function toXYZ()
    {
        $X = ($this->Y == 0) ? 0 : $this->x * ($this->Y / $this->y);
        $Y = $this->Y;
        $Z = ($this->Y == 0) ? 0 : (1 - $this->x - $this->y) * ($this->Y / $this->y);
        return new XYZ($X, $Y, $Z);
    }

    /**
     * Convert the color to Yxy format
     *
     * @return \ColorWorks\Formats\Yxy the color in Yxy format
     */
    public function toYxy()
    {
        return $this;
    }

    /**
     * Convert the color to HSL format
     *
     * @return \ColorWorks\Formats\HSL the color in HSL format
     */
    public function toHSL()
    {
        return $this->toHSV()->toHSL();
    }

    /**
     * Convert the color to HSV format
     *
     * @return \ColorWorks\Formats\HSV the color in HSV format
     */
    public function toHSV()
    {
        return $this->toXYZ()->toHSV();
    }

    /**
     * Convert the color to CMY format
     *
     * @return \ColorWorks\Formats\CMY the color in CMY format
     */
    public function toCMY()
    {
        return $this->toXYZ()->toCMY();
    }

    /**
     * Convert the color to CMYK format
     *
     * @return \ColorWorks\Formats\CMYK the color in CMYK format
     */
    public function toCMYK()
    {
        return $this->toXYZ()->toCMYK();
    }

    /**
     * Convert the color to CIELab format
     *
     * @return \ColorWorks\Formats\CIELab the color in CIELab format
     */
    public function toCIELab()
    {
        return $this->toXYZ()->toCIELab();
    }

    /**
     * Convert the color to CIELCh format
     *
     * @return \ColorWorks\Formats\CIELCh the color in CIELCh format
     */
    public function toCIELCh()
    {
        return $this->toXYZ()->toCIELCh();
    }

    /**
     * A string representation of this color in the current format
     *
     * @return string The color in format: $Y,$x,$y
     */
    public function __toString()
    {
        return sprintf('%01.4f, %01.4f, %01.4f', $this->Y, $this->x, $this->y);
    }
}
