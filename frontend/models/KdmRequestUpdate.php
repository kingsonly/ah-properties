<?php

namespace frontend\models;

use Yii;


/**
 * This is the model class for table "kdm_request_update".
 *
 * @property int $id
 * @property int $requester_id
 * @property int $approval_id
 * @property string $comment
 * @property int $table_id
 * @property string $table_name
 * @property string $section
 * @property int $status
 * @property string $request_date
 * @property string $update_date
 */
class KdmRequestUpdate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_request_update';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['requester_id', 'comment',  'status' ], 'required'],
            [['requester_id', 'approval_id', 'table_id', 'status'], 'integer'],
            [['comment'], 'string'],
            [['request_date', 'update_date'], 'safe'],
            [['table_name', 'section'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'requester_id' => 'Requester ID',
            'approval_id' => 'Approval ID',
            'comment' => 'Reason For Update',
            'table_id' => 'Table ID',
            'table_name' => 'Table Name',
            'section' => 'Section',
            'status' => 'Status',
            'request_date' => 'Request Date',
            'update_date' => 'Update Date',
        ];
    }
	
	public function getRequester(){

		return $this->hasOne(KdmStaff::className(), ['staff_user_id' => 'requester_id']);
		
		//return $this->hasOne(KdmCities::className(), ['id' => 'city']);
	}
	
	public function getApplicant(){

		return $this->hasOne(KdmStaff::className(), ['staff_user_id' => 'requester_id']);
		
		//return $this->hasOne(KdmCities::className(), ['id' => 'city']);
	}
	
	
}


