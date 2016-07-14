<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portfolio_has_tag".
 *
 * @property integer $id
 * @property integer $portfolio_id
 * @property integer $tag_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class PortfolioHasTag extends \app\models\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_has_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['portfolio_id', 'tag_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'portfolio_id' => 'Portfolio ID',
            'tag_id' => 'Tag ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
