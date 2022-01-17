<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_notification".
 *
 * @property int $id
 * @property int|null $file_id
 * @property string|null $description
 * @property string|null $link
 * @property int|null $status
 */
class KdmNotification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'status'], 'integer'],
            [['description', 'link'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_id' => 'File ID',
            'description' => 'Description',
            'link' => 'Link',
            'status' => 'Status',
        ];
    }
	
	public function getFile(){

		return $this->hasOne(KdmApplicantFileNumber::className(), ['id' => 'file_id']);
	}
}
