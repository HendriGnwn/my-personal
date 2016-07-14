<?php

namespace app\models;

use app\helpers\Url;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $icon
 * @property string $slug
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Tag extends \app\models\BaseActiveRecord
{
    /** @var \yii\web\UploadedFile */
    public $iconFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['icon', 'iconFile', 'created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['icon', 'slug'], 'string', 'max' => 150],
            ['status', 'default', 'value'=>self::STATUS_ACTIVE],
            [['iconFile'], 'file', 'extensions'=>['jpg', 'gif', 'png'], 'skipOnEmpty'=>true, 'checkExtensionByMimeType'=>false, 'maxSize'=>512000, 'tooBig'=>'Limit is 500KB'],
        ];
    }

    public function beforeSave($insert)
    {
        $this->slug = (!empty($this->slug)) ? Url::createSlug($this->slug) : Url::createSlug($this->name);
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function beforeDelete()
    {
        $this->deleteIcon();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'icon' => 'Icon',
            'slug' => 'Slug',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public static function findByName($name)
    {
        return self::find()->where(['name'=>$name])->one();
    }

    public function getIconName() {
        $label = Url::createSlug($this->name);
        $uploadedFile   = md5(date('Ymd H:i:s')). '.' . $this->iconFile->extension;
        $fileName       = "icon-{$label}-{$uploadedFile}";  // random number + file name
        return $fileName;
    }

    /**
     * @return string
     */
    public function getIconUrl()
    {
        $path = 'web/data/images/' . $this->icon;

        if (!file_exists(Yii::getAlias('@app/' . $path))) {
            return 'http://placehold.it/20x20';
        }

        return Url::to('@' . $path, true);
    }

    public function getIconHtml($options=['style'=>'width:20px;'])
    {
        $options = ArrayHelper::merge(['alt'=>$this->name], $options);
        return Html::img($this->getIconUrl(), $options);
    }

    private function deleteIcon()
    {
        @unlink(Yii::$app->basePath."/web/data/images/".$this->icon);
    }

    /**
     * @return bool
     */
    public function validateIconFile()
    {
        if(!$this->validate()) {
            return false;
        }

        if(!$this->iconFile) {
            return true;
        }

        if(!$this->isNewRecord) {
            $this->deleteIcon();
        }
        $this->icon = $this->getIconName();
        $this->iconFile->saveAs('data/images/'.$this->icon);
        return true;
    }
}