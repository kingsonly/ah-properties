<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_applicant_agent".
 *
 * @property int $id
 * @property int $applicant_id
 * @property int|null $agent_id
 * @property string $agent_title
 * @property string $agent_first_name
 * @property string $agent_last_name
 * @property string $agent_gender
 * @property int $agent_mobile_number
 * @property string $agent_address
 */
class KdmApplicantAgent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_applicant_agent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'agent_first_name',  'agent_mobile_number' ], 'required'],
            [[ 'agent_id', 'agent_mobile_number'], 'integer'],
            [['agent_first_name'], 'string'],
            [['agent_title'], 'string', 'max' => 10],
            [['status','email_address'], 'safe'],
           
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
            'agent_id' => 'Agent ID',
            'agent_title' => "Agent's Title",
            'agent_first_name' => "Agent's  Name",
            'agent_last_name' => "Agent's Last Name",
            'agent_gender' => "Agent's Gender",
            'agent_mobile_number' => "Agent's Mobile Number",
            
            'email_address' => "Agent's Email Address",
            'status' => 'Staus',
        ];
    }
	
	public function getRequestupdate(){

		return $this->hasOne(KdmRequestUpdate::className(), ['table_id' => 'id'])->andWhere(['table_name' =>'kdm_applicant_agent'])->orderBy(['id' => SORT_DESC]);
		//return $this->hasOne(KdmCities::className(), ['id' => 'city']);
	}
}
