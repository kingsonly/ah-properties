<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_root_applicant".
 *
 * @property int $id
 * @property string $applicant_id
 * @property int $user_id
 * @property int $applicant_type
 * @property int $stage_status
 * @property int $verification_status
 * @property string $date_created
 * @property int $status
 */
class KdmRootApplicant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_root_applicant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'applicant_type', 'stage_status', 'verification_status', 'status'], 'required'],
			//[['user_validate'], 'required', 'requiredValue' => 1, 'message'=>'bla-bla-bla'],
            [['user_id', 'applicant_type', 'stage_status', 'verification_status', 'status'], 'integer'],
            [['date_created'], 'safe'],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'applicant_type' => 'Applicant Type',
            'stage_status' => 'Stage Status',
            'verification_status' => 'Verification Status',
            'date_created' => 'Date Created',
            'status' => 'Status',
            'user_validate' => '',
        ];
    }
	
	public function getFilenumber(){

		return $this->hasMany(KdmApplicantFileNumber::className(), ['applicant_id' => 'id']);
	}
	
	public function getIndividual(){

		return $this->hasOne(KdmApplicantBioData::className(), ['applicant_id' => 'id']);
	}
	
	public function getOrganization(){

		return $this->hasOne(KdmApplicantOrganizationBio::className(), ['applicant_id' => 'id']);
	}
}
