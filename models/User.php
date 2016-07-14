<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property datetime $created_at
 * @property integer $created_by
 * @property datetime $updated_at
 * @property integer $updated_by
 * @property string $password write-only password
 */
class User extends BaseActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVATION = -5;
    const STATUS_ACTIVE = 1;

    public $current_password;
    public $new_password;
    public $confirm_password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            [['username', 'email'], 'unique'],
            [['username', 'email'], 'trim'],
            [['new_password', 'confirm_password'], 'required', 'on'=>self::SCENARIO_INSERT],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_ACTIVATION, self::STATUS_DELETED]],
            ['current_password', 'findPassword', 'on'=>self::SCENARIO_UPDATE],
            ['confirm_password','compare','compareAttribute'=>'new_password'],
            [['current_password', 'new_password', 'confirm_password'], 'safe'],
            [['new_password', 'confirm_password'], 'string', 'min'=>6],
        ];
    }

    public function findPassword($attribute, $params)
    {
        if(!empty($this->new_password) && !empty($this->confirm_password)) {
            if(!empty($this->current_password)) {
                if($this->current_password != $this->password_hash) {
                    $this->addError($attribute, 'Currenct Password does not match.');
                }
            } else {
                $this->addError($attribute, 'Currenct Password cannot be blank.');
            }
        }
    }

    public function beforeSave($insert)
    {
        if($this->isNewRecord) {
            $this->auth_key = $this->generateAuthKey();
            $this->password_reset_token = $this->generatePasswordResetToken();
        }

        if (!empty($this->new_password) && !empty($this->confirm_password)) {
            $this->password_hash = $this->setPassword($this->new_password);
        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function statusLabels() {
        return [
            self::STATUS_ACTIVE => 'STATUS ACTIVE',
            self::STATUS_ACTIVATION => 'STATUS ACTIVATION',
            self::STATUS_DELETED => 'STATUS DELETED',
        ];
    }

    public function getStatusLabel() {
        return $this->statusLabels()[$this->status];
    }
}
