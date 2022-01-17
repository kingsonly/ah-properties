<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_next_of_kin".
 *
 * @property int $id
 * @property int $applicant_id
 * @property string $relationship
 * @property string $title
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property int $mobile_number
 * @property string $street_name
 * @property string $district
 * @property string $city
 * @property string $state
 * @property string $country
 */
class KdmNextOfKin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_next_of_kin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'relationship', 'title', 'first_name', 'last_name', 'mobile_number', 'street_name', 'district', 'city', 'state', 'country'], 'required'],
            [['mobile_number'], 'integer'],
            [['relationship', 'first_name', 'middle_name', 'last_name', 'district', 'city', 'state', 'country','applicant_id'], 'string'],
            [['title'], 'string', 'max' => 10],
            [['status', 'middle_name'], 'safe'],
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
            'relationship' => 'Relationship',
            'title' => 'Title',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'mobile_number' => 'Mobile Number',
            'street_name' => 'Street Name',
            'district' => 'District',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
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
	public function getRequestupdate(){

		return $this->hasOne(KdmRequestUpdate::className(), ['table_id' => 'id'])->andWhere(['table_name' =>'kdm_next_of_kin'])->orderBy(['id' => SORT_DESC]);
		//return $this->hasOne(KdmCities::className(), ['id' => 'city']);
	}
}
