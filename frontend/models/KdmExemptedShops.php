<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_exempted_shops".
 *
 * @property int $id
 * @property int $batch_id
 * @property int $shop_id
 * @property int $status
 */
class KdmExemptedShops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_exempted_shops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['batch_id', 'shop_id', 'status'], 'required'],
            [['batch_id', 'shop_id', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'batch_id' => 'Batch ID',
            'shop_id' => 'Shop ID',
            'status' => 'Status',
        ];
    }
	
	public function getBooking(){
		return $this->hasOne(KdmSpaceBooking::className(), ['shop_id' => 'shop_id']);
	}
}
