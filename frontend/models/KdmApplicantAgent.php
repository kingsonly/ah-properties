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
            [['applicant_id', 'agent_title', 'agent_first_name', 'agent_last_name', 'agent_gender', 'agent_mobile_number', 'agent_address','email_address'], 'required'],
            [[ 'agent_id', 'agent_mobile_number'], 'integer'],
            [['agent_first_name', 'agent_last_name', 'agent_gender'], 'string'],
            [['agent_title'], 'string', 'max' => 3],
            [['status'], 'safe'],
            [['agent_address'], 'string', 'max' => 255],
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
            'agent_title' => 'Agent Title',
            'agent_first_name' => 'Agent First Name',
            'agent_last_name' => 'Agent Last Name',
            'agent_gender' => 'Agent Gender',
            'agent_mobile_number' => 'Agent Mobile Number',
            'agent_address' => 'Agent Address',
            'email_address' => 'Agent Email Address',
            'status' => 'Staus',
        ];
    }
}
