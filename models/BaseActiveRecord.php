<?php
/**
 * Created by PhpStorm.
 * @author Hendri Gunawan <hendri.gnw@gmail.com>
 * Date: 6/28/2016
 * Time: 13:08
 */

namespace app\models;


use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use app\models\User;
use yii\helpers\Html;

class BaseActiveRecord extends ActiveRecord
{
    const SCENARIO_INSERT = 'insert';
    const SCENARIO_UPDATE = 'update';

    const STATUS_ACTIVE = 1;
    const STATUS_NON_ACTIVE = 0;

    public function behaviors()
    {
        return [
			'hendrignwn\log\behaviors\LoggableBehavior',
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    public function getCreatedBy() {
        return $this->hasOne(User::className(), ['id'=>'created_by']);
    }

    public function getUpdatedBy() {
        return $this->hasOne(User::className(), ['id'=>'updated_by']);
    }

    public static function statusLabels() {
        return [
            self::STATUS_ACTIVE => 'ACTIVE',
            self::STATUS_NON_ACTIVE => 'NON ACTIVE',
        ];
    }

    public function getStatusLabel() {
        return $this->statusLabels()[$this->status];
    }

    public function getStatusWithStyle() {
        switch($this->status) {
            case self::STATUS_ACTIVE: return Html::label($this->getStatusLabel(), null, ['class'=>'label label-success']);
            case self::STATUS_NON_ACTIVE: return Html::label($this->getStatusLabel(), null, ['class'=>'label label-danger']);
        }
    }
	
	/**
     * @inheritdoc
     * @return BaseActiveRecordQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BaseActiveRecordQuery(get_called_class());
    }
}