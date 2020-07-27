<?php

namespace frontend\models;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "kdm_payment".
 *
 * @property int $id
 * @property string $applicant_id
 * @property string $payment_id
 * @property string $bill_reff
 * @property string $payment_mode
 * @property string $image
 * @property string $bank_branch
 * @property string $payment_date
 * @property string $receipt_date
 * @property string $teller_number
 * @property int $amount
 * @property string $amount_word
 * @property string $payment_for
 * @property string $receit_id
 * @property int $status
 */
class KdmPayment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public $imageFile;
    public static function tableName()
    {
        return 'kdm_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id',  'payment_mode', 'bank_branch', 'payment_date',  'teller_number', 'amount', 'amount_word','file_number_id','imageFile'], 'required'],
            [['payment_date', 'receipt_date','imageFile','image'], 'safe'],
            [['amount', 'status'], 'integer'],
            [['applicant_id'], 'string', 'max' => 25],
            [['payment_id', 'bill_reff', 'payment_mode', 'teller_number', 'receit_id'], 'string', 'max' => 50],
            [['image'], 'string', 'max' => 200],
			[['imageFile'], 'file', 'extensions' => 'png,jpg'],
			[['document_id', 'imageFile','image_path'], 'safe'],
			[['imageFile'], 'file', 'extensions' => 'png,jpg'],
            [['bank_branch', 'amount_word', 'payment_for'], 'string', 'max' => 100],
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
            'payment_id' => 'Payment ID',
            'bill_reff' => 'Bill Reff',
            'payment_mode' => 'Payment Mode',
            'image' => 'Image',
            'bank_branch' => 'Bank Branch',
            'payment_date' => 'Payment Date',
            'receipt_date' => 'Receipt Date',
            'teller_number' => 'Teller Number',
            'amount' => 'Amount',
            'amount_word' => 'Amount Word',
            'payment_for' => 'Payment For',
            'receit_id' => 'Receit ID',
            'status' => 'Status',
        ];
    }
	
	public function upload()
    {
		
        if ($this->validate()) {
			if(!empty($this->imageFile)){
				$newRand = rand(1,1000000000001010);
			
				$filePath = 'uploads/' . $this->imageFile->baseName . $newRand.'.' . $this->imageFile->extension;
				$this->image  = $filePath;
				$this->save();
				$this->imageFile->saveAs($filePath);
			
			}else{
				$this->save();
			}
			
			
            return true;
        } else {
            return false;
        }
    }
	
	public function getFilenumber(){

		return $this->hasOne(KdmApplicantFileNumber::className(), ['id' => 'file_number_id']);
	}
}
