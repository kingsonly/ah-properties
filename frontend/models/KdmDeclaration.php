<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_declaration".
 *
 * @property int $id
 * @property int $applicant_id
 * @property int $declaration
 * @property int $status
 */
class KdmDeclaration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_declaration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'declaration', 'status'], 'required'],
            [['applicant_id', 'declaration', 'status'], 'integer'],
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
            'declaration' => 'Declaration',
            'status' => 'Status',
        ];
    }
	
	public function getApplicant(){

		return $this->hasOne(KdmRootApplicant::className(), ['id' => 'applicant_id']);
	}
	
	
}
