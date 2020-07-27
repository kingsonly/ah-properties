<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_organization_contact_details".
 *
 * @property int $id
 * @property string $applicant_id
 * @property string $house_no
 * @property string $street_name
 * @property string $street_extention
 * @property string $district
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $local_government
 * @property string $pobox
 * @property string $c_o
 * @property string $office_number
 * @property string $email
 * @property int $status
 */
class KdmOrganizationContactDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_organization_contact_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'house_no', 'street_name', 'street_extention', 'district', 'city', 'state', 'country', 'pobox', 'c_o', 'office_number', 'email', 'status'], 'required'],
            [['status'], 'integer'],
            [['applicant_id', 'house_no'], 'string', 'max' => 255],
            [['street_name', 'street_extention', 'district', 'city', 'state', 'country', 'local_government', 'c_o'], 'string', 'max' => 300],
            [['pobox', 'office_number', 'email'], 'string', 'max' => 50],
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
            'house_no' => 'House No',
            'street_name' => 'Street Name',
            'street_extention' => 'Street Extention',
            'district' => 'District',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'local_government' => 'Local Government',
            'pobox' => 'Pobox',
            'c_o' => 'C O',
            'office_number' => 'Office Number',
            'email' => 'Email',
            'status' => 'Status',
        ];
    }
}
