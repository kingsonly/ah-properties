<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_contact_details".
 *
 * @property int $id
 * @property int $applicant_id
 * @property string $street_name
 * @property string $district
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $email
 * @property int $mobile_number
 */
class KdmContactDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_contact_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'street_name', 'district', 'city', 'state', 'country', 'email', 'mobile_number'], 'required'],
            [['mobile_number'], 'integer'],
            [['status'], 'safe'],
            [['district', 'city', 'state', 'country', 'email','applicant_id'], 'string'],
            [['street_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'applicant_id' => 'Applicant ID',
            'street_name' => 'Street Name',
            'district' => 'District',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'email' => 'Email',
            'mobile_number' => 'Mobile Number',
        ];
    }
	
	public function getStates(){

		return $this->hasOne(KdmState::className(), ['id' => 'state']);
	}
	
	public function getCountrys(){

		return $this->hasOne(KdmCountry::className(), ['id' => 'country']);
	}
	
	public function getLga(){

		return $this->hasOne(KdmCities::className(), ['id' => 'city']);
	}
}
