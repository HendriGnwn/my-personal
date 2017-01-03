<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Contact extends BaseActiveRecord
{
    const STATUS_NEW = 5;
	const STATUS_ANSWERED = 10;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'message'], 'required'],
            [['message'], 'string'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['status'], 'default', 'value'=>self::STATUS_NEW],
            [['subject', 'status','created_at', 'updated_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 100],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'message' => 'Message',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public static function statusLabels()
    {
		$labels = [
			self::STATUS_NEW=>'NEW',
			self::STATUS_ANSWERED=>'ANSWERED'
		];
		
        return ArrayHelper::merge($labels, parent::statusLabels());
    }

    public function getStatusWithStyle()
    {
        if(!parent::getStatusWithStyle()) {
            switch ($this->status) {
                case self::STATUS_NEW: return Html::label($this->getStatusLabel(), null, ['class'=>'label label-primary']);
				case self::STATUS_ANSWERED: return Html::label($this->getStatusLabel(), null, ['class'=>'label label-success']);
            }
        }
        return parent::getStatusWithStyle();
    }
}
