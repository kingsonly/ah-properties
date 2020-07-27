<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class VerificationModel extends Model
{
    public $user_validate;
    


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           
            [['user_validate'], 'required', 'requiredValue' => 1, 'message'=>'bla-bla-bla'],
            
        ];
    }


    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    

}

