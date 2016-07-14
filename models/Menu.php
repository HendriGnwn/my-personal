<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $category
 * @property integer $order
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 *
 * @property MenuChild $menuChildren
 */
class Menu extends BaseActiveRecord
{
    const CATEGORY_LANDING = 'Landing';
    const CATEGORY_MAIN = 'Main';
    const CATEGORY_BACKEND = 'Backend';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', 'order', 'category'], 'required'],
            [['order', 'status', 'created_by', 'updated_by'], 'integer'],
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
            'name' => 'Name',
            'url' => 'Url',
            'category' => 'Category',
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
    public function getMenuChildren()
    {
        return $this->hasMany(MenuChild::className(), ['menu_id'=>'id'])
			->active()->ordered();
    }

    public static function categoryLabels()
    {
        return [
            self::CATEGORY_LANDING => self::CATEGORY_LANDING,
            self::CATEGORY_MAIN => self::CATEGORY_MAIN,
            self::CATEGORY_BACKEND => self::CATEGORY_BACKEND,
        ];
    }

    public static function listLanding()
    {
        $query = self::find();

        $query->active();
		
		$query->andWhere([
			'category' => self::CATEGORY_LANDING,
		]);

        $query->ordered();
		
		return $query->all();
    }
	
	public static function listMain()
    {
        $query = self::find();

        $query->active();
		
		$query->andWhere([
			'category' => self::CATEGORY_MAIN,
		]);

        $query->ordered();
		
		return $query->all();
    }
	
	public static function listBackend()
    {
        $query = self::find();

        $query->active();
		
		$query->andWhere([
			'category' => self::CATEGORY_BACKEND,
		]);

        $query->ordered();
		
		return $query->all();
    }
}
