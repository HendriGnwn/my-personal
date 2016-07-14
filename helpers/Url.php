<?php
/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 6/29/2016
 * Time: 10:15
 */

namespace app\helpers;

/**
 * Url provides a set of static methods for managing URLs.
 */
class Url extends \yii\helpers\Url
{
    const DASH = '-';
    const UNDERSCORE = '_';

    /**
     * Returns slug from passed string. It is usually used to create friendly url.
     *
     * @param string $string
     * @param string $separator
     * @param boolean $lowercase whether to make string result lowercase
     * @return string
     */
    public static function createSlug($string, $separator = self::DASH, $lowercase = true)
    {
        $trans = array(
            '&\#\d+?;'				=> '',
            '&\S+?;'				=> '',
            '\s+'					=> $separator,
            '[^a-z0-9\-\._]'		=> '',
            '[.]'					=> '',
            $separator.'+'			=> $separator,
            $separator.'$'			=> $separator,
            '^'.$separator			=> $separator,
            '\.+$'                  => ''
        );

        $string = strip_tags(stripslashes(trim($string)));

        foreach ($trans as $key => $val) {
            $string = preg_replace("#" . $key . "#i", $val, $string);
        }

        if ($lowercase === TRUE) {
            $string = strtolower($string);
        }

        return $string;
    }
}