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
	
	/**
	 * the date format into indonesian
	 * 
	 * @param type $date date or datetime
	 * @param type $format eg. (%Y-%m-%d) 
	 * @see type $format http://php.net/manual/en/function.strftime.php
	 * @return type
	 */
	public static function formatIndoDate($date, $format)
	{
		setLocale(LC_ALL, 'id_ID', 'ind', 'indonesia');
		return strftime($format, strtotime($date));
	}
	
	/**
     * Format number to rupiah
     * @param float $value
     * @return string
     */
    public static function rupiah($value)
    {
        return number_format($value, 0, ',', '.');
    }
}