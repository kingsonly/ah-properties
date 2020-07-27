<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_applicant_organization_contact_person_details".
 *
 * @property int $id
 * @property string $applicant_id
 * @property string $title
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $phone_number
 * @property int $status
 */
class KdmApplicantOrganizationContactPersonDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_applicant_organization_contact_person_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'title', 'first_name', 'middle_name', 'last_name', 'phone_number', 'status','designation'], 'required'],
            [['status'], 'integer'],
            [['applicant_id'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 10],
            [['first_name', 'middle_name', 'last_name', 'phone_number'], 'string', 'max' => 50],
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
            'title' => 'Title',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'status' => 'Status',
            'designation' => 'Designation',
        ];
    }
}
