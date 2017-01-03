<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
	public $phone;
    public $subject;
    public $message;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'message', 'phone'], 'required'],
			[['phone'], 'integer'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
	 * 
     * @return boolean whether the model passes validation
     */
    public function contact()
    {
		$subject = Yii::$app->params['subjectMail'].' '.Yii::$app->params['subjectMailContact'];
        if ($this->validate() && $this->saveToDb()) {
			
			$email = [$this->email, Yii::$app->params['adminEmail']];
            $sendMail = Yii::$app->mailer->compose('contact/contact', ['model' => $this])
					->setTo($email)
					->setSubject($subject)
					->send();
			
			if($sendMail) {
				return true;
			}
        }
        return false;
    }
	
	/**
	 * save data to db (table contact)
	 * 
	 * @return boolean
	 */
	private function saveToDb()
	{
		$contact = new Contact();
		$contact->attributes = $this->attributes;
		
		if($contact->validate()) {
			return $contact->save();
		}
		return false;
	}
}
