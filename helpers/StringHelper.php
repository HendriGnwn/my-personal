<?php

namespace app\helpers;

use yii\helpers\StringHelper as BaseStringHelper;

/**
 * Provides a set of static methods for manipulating string.
 */
class StringHelper extends BaseStringHelper
{
    /**
     * Format string as date
     *
     * @param string $date
     * @param string $format
     * @return string
     */
    public static function formatDate($date, $format)
    {
        $date = new \DateTime($date);

        return $date->format($format);
    }
}