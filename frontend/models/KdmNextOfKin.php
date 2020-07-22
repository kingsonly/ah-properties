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
            [['applicant_id', 'relationship', 'title', 'first_name', 'middle_name', 'last_name', 'mobile_number', 'street_name', 'district', 'city', 'state', 'country'], 'required'],
            [['mobile_number'], 'integer'],
            [['relationship', 'first_name', 'middle_name', 'last_name', 'district', 'city', 'state', 'country','applicant_id'], 'string'],
            [['title'], 'string', 'max' => 3],
            [['status'], 'safe'],
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
}
