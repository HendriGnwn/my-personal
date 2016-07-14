<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_child".
 *
 * @property integer $id
 * @property integer $menu_id
 * @property string $name
 * @property string $url
 * @property integer $order
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property Menu $menu
 */
class MenuChild extends BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_child';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id', 'name', 'url', 'order'], 'required'],
            [['menu_id', 'order', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            ['order', 'default', 'value'=>0],
            ['status', 'default', 'value'=>self::STATUS_ACTIVE],
            [['name', 'url'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_id' => 'Menu ID',
            'name' => 'Name',
            'url' => 'Url',
            'order' => 'Order',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id'=>'menu_id']);
    }
}
