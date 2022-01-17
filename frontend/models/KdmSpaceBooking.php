<?php

namespace frontend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "kdm_space_booking".
 *
 * @property int $id
 * @property int $file_id
 * @property int $user_id
 * @property string $date_created
 */
class KdmSpaceBooking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_space_booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'user_id','shop_id', 'date_created'], 'required'],
            [['file_id', 'user_id'], 'integer'],
            [['date_created','status','date_approved'], 'safe'],
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
            'user_id' => 'User ID',
            'shop_id' => 'User ID',
            'date_created' => 'Date Created',
        ];
    }
	
	public function getShop(){

		return $this->hasOne(KdmShop::className(), ['id' => 'shop_id']);
	}
	
	public function getFile(){

		return $this->hasOne(KdmApplicantFileNumber::className(), ['id' => 'file_id']);
	}
	
	public function getUser(){

		return $this->hasOne(User::className(), ['id' => 'user_id']);
	}
	
	public function getInvoice(){
		return $this->hasOne(KdmInvoice::className(), ['shop_id' => 'shop_id']);
	}
	
	public function getExemptedshops(){
		return $this->hasOne(KdmExemptedShops::className(), ['shop_id' => 'shop_id']);
	}
}
