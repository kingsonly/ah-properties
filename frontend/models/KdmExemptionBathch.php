<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_exemption_bathch".
 *
 * @property int $id
 * @property string $bathch_no
 * @property string $batch_approval
 * @property int $status
 */
class KdmExemptionBathch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_exemption_bathch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bathch_no'], 'required'],
            [['status'], 'integer'],
            [['bathch_no', 'batch_approval'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bathch_no' => 'Bathch No',
            'batch_approval' => 'Batch Approval',
            'status' => 'Status',
        ];
    }
	
	
	public function getCompiledby(){
		return $this->hasOne(KdmStaff::className(), ['staff_user_id' => 'user_id']);
	}
}
