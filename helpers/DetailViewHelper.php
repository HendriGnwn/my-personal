<?php
/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 7/1/2016
 * Time: 14:14
 */

namespace app\helpers;

use app\models\User;

class DetailViewHelper
{
    /**
     * @param $model
     * @param $attribute
     * @see User
     */
    public static function author($model, $attribute)
    {
        $user = User::findOne($model->$attribute);
        if($user) {
            $user = $user->username;
        } else {
            $user = $model->$attribute;
        }

        return [
            'attribute' => $attribute,
            'value' => $user,
        ];
    }
}