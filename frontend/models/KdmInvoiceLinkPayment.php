<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kdm_invoice_link_payment".
 *
 * @property int $id
 * @property int $invoice_id
 * @property int $payment_id
 * @property int $amount
 * @property string $date_paid
 * @property int $status
 */
class KdmInvoiceLinkPayment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kdm_invoice_link_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invoice_id', 'payment_id', 'amount', 'date_paid', 'status'], 'required'],
            [['invoice_id', 'payment_id', 'amount', 'status'], 'integer'],
            [['date_paid'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_id' => 'Invoice ID',
            'payment_id' => 'Payment ID',
            'amount' => 'Amount',
            'date_paid' => 'Date Paid',
            'status' => 'Status',
        ];
    }
	
	public function getInvoice(){

		return $this->hasOne(KdmInvoice::className(), ['id' => 'invoice_id']);
	}
	
	public function getPayment(){

		return $this->hasOne(KdmPayment::className(), ['id' => 'payment_id']);
	}
}
