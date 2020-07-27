<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_applicant_file_number".
 *
 * @property int $id
 * @property int $applicant_id
 * @property string $file_number
 * @property int $status
 */
class KdmApplicantFileNumber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_applicant_file_number';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'file_number', 'status'], 'required'],
            [['applicant_id', 'status'], 'integer'],
            [['file_number'], 'string', 'max' => 100],
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
            'file_number' => 'File Number',
            'status' => 'Status',
        ];
    }
}
