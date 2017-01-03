<?php

namespace app\models;

/**
 * This is the model class for table "bio_profile".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $service_description
 * @property string $about_us_description
 * @property string $employement_description
 * @property string $portfolio_description
 * @property string $education_description
 * @property string $blog_description
 * @property string $contact_description
 * @property string $short_contact_description
 * @property string $metakey
 * @property string $metakey_en
 * @property string $metadesc
 * @property string $metadesc_en
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $latitude
 * @property string $longitude
 * @property string $bio
 * @property string $website
 * @property string $skype
 * @property string $facebook
 * @property string $twitter
 * @property string $dribbble
 * @property string $instagram
 * @property string $linked_in
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class BioProfile extends BaseActiveRecord
{
	const DEFAULT_ID = 1;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bio_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'service_description', 'about_us_description', 'employement_description', 'portfolio_description', 'education_description', 'blog_description', 'contact_description', 'short_contact_description', 'metakey', 'metakey_en', 'metadesc', 'metadesc_en', 'phone', 'email', 'address', 'latitude', 'longitude', 'bio', 'website', 'skype', 'facebook', 'twitter', 'dribbble', 'instagram', 'linked_in'], 'required'],
            [['description', 'service_description', 'about_us_description', 'employement_description', 'portfolio_description', 'education_description', 'blog_description', 'contact_description', 'short_contact_description', 'metadesc', 'metadesc_en'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['name', 'email', 'website'], 'string', 'max' => 100],
            [['metakey', 'metakey_en', 'address'], 'string', 'max' => 300],
            [['phone', 'latitude', 'longitude'], 'string', 'max' => 20],
            [['bio'], 'string', 'max' => 500],
            [['skype', 'facebook', 'twitter', 'dribbble', 'instagram', 'linked_in'], 'string', 'max' => 70],
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
            'description' => 'Description',
            'service_description' => 'Service Description',
            'about_us_description' => 'About Us Description',
            'employement_description' => 'Employement Description',
            'portfolio_description' => 'Portfolio Description',
            'education_description' => 'Education Description',
            'blog_description' => 'Blog Description',
            'contact_description' => 'Contact Description',
            'short_contact_description' => 'Short Contact Description',
            'metakey' => 'Metakey',
            'metakey_en' => 'Metakey En',
            'metadesc' => 'Metadesc',
            'metadesc_en' => 'Metadesc En',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'bio' => 'Bio',
            'website' => 'Website',
            'skype' => 'Skype',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'dribbble' => 'Dribbble',
            'instagram' => 'Instagram',
            'linked_in' => 'Linked In',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
	
	/**
	 * get data
	 * 
	 * @return type
	 */
	public function getData()
	{
		return self::findOne(self::DEFAULT_ID);
	}
}
