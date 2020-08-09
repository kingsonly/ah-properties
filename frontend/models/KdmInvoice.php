<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%kdm_invoice}}".
 *
 * @property int $id
 * @property int $shop_id
 * @property int $payment_mode
 * @property int $file_no
 * @property int $amount
 * @property int $payment_status
 * @property string $due_date
 * @property string $date_created
 * @property int $link
 */
class KdmInvoice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%kdm_invoice}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shop_id', 'payment_mode', 'file_no', 'amount', 'payment_status', 'due_date', 'date_created', 'link'], 'required'],
            [['shop_id', 'payment_mode', 'file_no', 'amount', 'payment_status', 'link'], 'integer'],
            [['due_date', 'date_created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shop_id' => 'Shop ID',
            'payment_mode' => 'Payment Mode',
            'file_no' => 'File No',
            'amount' => 'Amount',
            'payment_status' => 'Payment Status',
            'due_date' => 'Due Date',
            'date_created' => 'Date Created',
            'link' => 'Link',
        ];
    }
}
