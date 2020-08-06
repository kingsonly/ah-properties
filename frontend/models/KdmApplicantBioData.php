<?php

namespace frontend\models;
use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "kdm_applicant_bio_data".
 *
 * @property int $id
 * @property int $applicant_id
 * @property string $title
 * @property string $image
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $gender
 * @property string $date_of_birth
 * @property string $occupation
 * @property string $nationality
 * @property string $state_of_origin
 * @property string $local_government_of_origin
 * @property string $marital_status
 * @property string $highest_education
 * @property int $stage_status
 * @property int $verification_status
 * @property int $status
 */
class KdmApplicantBioData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public $imageFile;
    public static function tableName()
    {
        return 'kdm_applicant_bio_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['applicant_id', 'title',  'first_name', 'middle_name', 'last_name', 'gender', 'date_of_birth', 'occupation', 'nationality', 'state_of_origin', 'local_government_of_origin', 'marital_status', 'highest_education'], 'required'],
            [['stage_status', 'verification_status', 'status'], 'integer'],
            [['first_name', 'middle_name', 'last_name', 'gender', 'occupation', 'nationality', 'state_of_origin', 'local_government_of_origin', 'marital_status', 'highest_education','applicant_id'], 'string'],
            [['date_of_birth','image','imageFile','user_id'], 'safe'],
			[['imageFile'], 'file', 'extensions' => 'png,jpg'],
            [['title'], 'string', 'max' => 10],
            [['image'], 'string', 'max' => 200],
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
            'title' => 'Title',
            'image' => 'Image',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'date_of_birth' => 'Date Of Birth',
            'occupation' => 'Occupation',
            'nationality' => 'Nationality',
            'state_of_origin' => 'State Of Origin',
            'local_government_of_origin' => 'LGA',
            'marital_status' => 'Marital Status',
            'highest_education' => 'Highest Education',
            'stage_status' => 'Stage Status',
            'verification_status' => 'Verification Status',
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
	
	public function getStates(){

		return $this->hasOne(KdmState::className(), ['id' => 'state_of_origin']);
	}
	
	public function getCountrys(){

		return $this->hasOne(KdmCountry::className(), ['id' => 'nationality']);
	}
	
	public function getLga(){

		return $this->hasOne(KdmCities::className(), ['id' => 'local_government_of_origin']);
	}
}
