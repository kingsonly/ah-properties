<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_applicant_organization_bio".
 *
 * @property int $id
 * @property string $applicant_id
 * @property string $organization_name
 * @property string $organization_country
 * @property string $organization_state
 * @property string $organization_local_government
 * @property int $status
 */
class KdmApplicantOrganizationBio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_applicant_organization_bio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'organization_name', 'organization_country', 'organization_state', 'organization_local_government', 'status'], 'required'],
            [['status'], 'integer'],
            [['applicant_id', 'organization_country', 'organization_state', 'organization_local_government'], 'string', 'max' => 255],
            [['organization_name'], 'string', 'max' => 300],
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
            'organization_name' => 'Organization Name',
            'organization_country' => 'Organization Country',
            'organization_state' => 'Organization State',
            'organization_local_government' => 'Organization Local Government',
            'status' => 'Status',
        ];
    }
}
