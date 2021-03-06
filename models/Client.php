<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\helpers\Url;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $date
 * @property string $picture
 * @property string $url
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Client extends BaseActiveRecord
{
    public $pictureFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date', 'url'], 'required'],
            [['description'], 'string'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['picture'], 'string', 'max' => 150],
            [['url'], 'string', 'max' => 200],
            ['status', 'default', 'value'=>self::STATUS_ACTIVE],
            [['pictureFile'], 'file', 'extensions'=>['jpg', 'png'], 'skipOnEmpty'=>false, 'checkExtensionByMimeType'=>false, 'maxSize'=>1024*1024*4, 'tooBig'=>'Limit is 4MB', 'on'=>self::SCENARIO_INSERT],
            [['pictureFile'], 'file', 'extensions'=>['jpg', 'png'], 'skipOnEmpty'=>true, 'checkExtensionByMimeType'=>false, 'maxSize'=>1024*1024*4, 'tooBig'=>'Limit is 4MB', 'on'=>self::SCENARIO_UPDATE],
        ];
    }

    public function beforeDelete()
    {
        $this->deletePicture();
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
            'date' => 'Date',
            'picture' => 'Picture',
            'url' => 'Url',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function getPictureName() {
        $label = Url::createSlug($this->name);
        $uploadedFile   = md5(date('Ymd H:i:s')). '.' . $this->pictureFile->extension;
        $fileName       = "{$label}-{$uploadedFile}";  // random number + file name
        return $fileName;
    }

    /**
     * @return string
     */
    public function getPictureUrl()
    {
        $path = 'web/data/images/client/' . $this->picture;

        if (!file_exists(Yii::getAlias('@app/' . $path))) {
            return 'http://placehold.it/400x200';
        }

        return Url::to('@' . $path, true);
    }

    public function getPictureHtml($options=['style'=>'width:20px;'])
    {
        $options = ArrayHelper::merge(['alt'=>$this->name], $options);
        return Html::img($this->getPictureUrl(), $options);
    }

    private function deletePicture()
    {
        @unlink(Yii::$app->basePath."/web/data/images/client/".$this->picture);
    }

    /**
     * @return bool
     */
    public function validatePictureFile()
    {
        if(!$this->validate()) {
            return false;
        }

        if(!$this->isNewRecord) {
            if($this->pictureFile) {
                $this->deletePicture();
            } else {
                return true;
            }
        }

        $this->picture = $this->getPictureName();
        $this->pictureFile->saveAs('data/images/client/'.$this->picture);
        return true;
    }
}