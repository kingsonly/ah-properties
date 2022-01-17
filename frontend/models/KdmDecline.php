<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_decline".
 *
 * @property int $id
 * @property int $document_id
 * @property string $document_location
 * @property string $comment
 * @property int $status
 */
class KdmDecline extends \yii\db\ActiveRecord
{
	public $applicant_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_decline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_id', 'document_location', 'comment', 'status'], 'required'],
            [['document_id', 'status'], 'integer'],
            [['comment'], 'string'],
            [['applicant_id'], 'safe'],
            [['document_location'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_id' => 'Document ID',
            'document_location' => 'Document Location',
            'comment' => 'Comment',
            'status' => 'Status',
        ];
    }
}
