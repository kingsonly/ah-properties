<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class RootModel extends Model
{
    public $applicanttype;
    public $numberofproperties;
    public $applicantId;
    


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           
            [['applicanttype','numberofproperties','applicantId'], 'safe'],
            
        ];
    }


    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function proccessStage1()
    {
        if (!$this->validate()) {
            return null;
        }
        
            
        $kdmRoot = new KdmRootApplicant();
        
        // set KdmRootApplicant attributes
		$kdmRoot->user_id = Yii::$app->user->identity->id;
		$kdmRoot->applicant_type = $this->applicanttype;
		$kdmRoot->stage_status = 1;
		$kdmRoot->verification_status = 0;
		$kdmRoot->status = 0;
		if($kdmRoot->save()){
			
			for ($x = 1; $x <= $this->numberofproperties; $x++) {
				
				$kdmFileNumber = new KdmApplicantFileNumber();
				$kdmFileNumber->applicant_id = $kdmRoot->id;
				$kdmFileNumber->status = 0;
				$kdmFileNumber->file_number = 'KDM/'.time().Yii::$app->user->identity->id;
				$kdmFileNumber->save();
				sleep(1);
			} 
			$this->applicantId = $kdmRoot->id;
			return $kdmRoot;
		}
        //return $user->save() && $this->sendEmail($user);

    }

}

