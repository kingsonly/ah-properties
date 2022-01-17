<?php

namespace frontend\models;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "kdm_document_upload".
 *
 * @property int $id
 * @property int $applicant_id
 * @property string $document_type
 * @property string $image_path
 * @property int $status
 */
class KdmDocumentUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public $imageFile;
    public static function tableName()
    {
        return 'kdm_document_upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'document_type','imageFile'], 'required'],
            [[ 'status'], 'integer'],
            [['document_id', 'imageFile','image_path'], 'safe'],
			[['imageFile'], 'file', 'extensions' => 'png,jpg'],
            [['document_type', 'image_path','applicant_id'], 'string', 'max' => 255],
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
            'document_type' => 'Document Type',
            'image_path' => 'Image Path',
            'status' => 'Status',
        ];
    }
	
	public function upload()
    {
		
        if ($this->validate()) {
			if(!empty($this->imageFile)){
				$newRand = rand(1,1000000000001010);
			
				$filePath = 'uploads/' . preg_replace('/[^A-Za-z0-9\-]/', '',str_replace(' ','_',trim($this->imageFile->baseName))) . $newRand.'.' . $this->imageFile->extension;
				$this->image_path  = $filePath;
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
	
	public function getRequestupdate(){

		return $this->hasOne(KdmRequestUpdate::className(), ['table_id' => 'id'])->andWhere(['table_name' =>'kdm_document_upload'])->orderBy(['id' => SORT_DESC]);
		//return $this->hasOne(KdmCities::className(), ['id' => 'city']);
	}
}
